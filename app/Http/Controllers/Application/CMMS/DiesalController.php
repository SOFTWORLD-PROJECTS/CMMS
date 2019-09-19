<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Auth;
use App\Docrunning;
use App\Type;
use App\DieselStock;
use App\DieselRequest;
use App\Diesel;
use App\DieselItem;
use App\PoSupplier;
use App\Setting;

class DiesalController extends Controller
{
    public function index(Request $request)
    {
        $types = Type::all();

        if ($request->has('type')) {
            $show_type = $request->type;
        } else {
            $show_type = 'diesel';
        }

        return view('diesal', compact('types', 'show_type'));
    }

    public function add()
    {
        $types = Type::all();
//        $nextNumber = Docrunning::getNextNumber('diesel');

        return view('diesal-add', compact('types'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'reg_no' => 'required|unique:diesels',
            'type' => 'required',
            'create_date' => 'required|date',
            'month_year' => 'required',
            'driver' => 'required',
            'diesels.*.date' => 'required|date',
            'diesels.*.litre' => 'required|numeric|min:0',
            'diesels.*.by' => 'required'
        ]);

        $data = $request->only(['reg_no', 'create_date', 'month_year', 'driver']);
        $data['type_id'] = $request->type;
        $data['litres'] = 0;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $d = Diesel::create($data);

        $litres = 0;
        if ($request->has('diesels')) {
            foreach ($request->diesels as $diesel) {
                $data = [];
                $data['diesel_id'] = $d->id;
                $data['create_date'] = $diesel['date'];
                $data['by'] = $diesel['by'];
                $data['litre'] = $diesel['litre'];
                $litres += $diesel['litre'];
                DieselItem::create($data);
            }
        }

        $d->litres = $litres;
        $d->save();

//        Docrunning::increaseNumber('diesel');

        Auth::user()->trail('diesel', 'add');

        return redirect()->route('diesal', ['type' => 'diesel']);
    }

    public function edit($id)
    {
        $diesel = Diesel::find($id);
        $types = Type::all();

        return view('diesal-edit', compact('types', 'diesel'));
    }

    public function detail($id)
    {
        $diesel = Diesel::find($id);
        $types = Type::all();

        return view('diesal-detail', compact('types', 'diesel'));
    }

    public function delete($id)
    {
        $diesel = Diesel::find($id);
        $diesel->delete();

        DieselItem::where('diesel_id', $diesel->id)->delete();

        Auth::user()->trail('diesel', 'delete');

        return redirect()->route('diesal', ['type' => 'diesel']);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'reg_no' => 'required',
            'type' => 'required',
            'create_date' => 'required|date',
            'month_year' => 'required',
            'driver' => 'required',
            'diesels.*.date' => 'required|date',
            'diesels.*.litre' => 'required|numeric|min:0',
            'diesels.*.by' => 'required'
        ]);

        $d = Diesel::find($request->id);

        $data = $request->only(['reg_no', 'create_date', 'month_year', 'driver']);

        $data['type_id'] = $request->type;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $d->update($data);

        DieselItem::where('diesel_id', $d->id)->delete();

        $litres = 0;
        if ($request->has('diesels')) {
            foreach ($request->diesels as $diesel) {
                $data = [];
                $data['diesel_id'] = $d->id;
                $data['create_date'] = $diesel['date'];
                $data['by'] = $diesel['by'];
                $data['litre'] = $diesel['litre'];
                $litres += $diesel['litre'];
                DieselItem::create($data);
            }
        }

        $d->litres = $litres;
        $d->save();

        Auth::user()->trail('diesel', 'edit');

        return redirect()->route('diesal', ['type' => 'diesel']);
    }

    public function addStock()
    {
        $setting = Setting::first();
        $suppliers = PoSupplier::all();
        $before_balance = $setting->current_balance;
        return view('diesal-stock-add', compact('suppliers', 'before_balance'));
    }

    public function createStock(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'purchased' => 'required|numeric|min:0',
            'actual' => 'required|numeric|min:0',
            'before_balance' => 'required|numeric|min:0',
            'before_cm' => 'required|numeric|min:0',
            'after_cm' => 'required|numeric|min:0',
            'supplier' => 'required',
        ]);

        $data = $request->only(['purchased', 'actual', 'before_balance', 'before_cm', 'after_cm']);
        $data['supplier_id'] = $request->supplier;
        $data['variance'] = $request->actual - $request->purchased;
        $data['after_balance'] = $request->actual + $request->before_balance;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $stock = DieselStock::create($data);

        Auth::user()->trail('diesel', 'stock add', 'stock add');

        $setting = Setting::first();
        $setting->current_balance += $request->actual;
        $setting->save();

        return redirect()->route('diesal', ['type' => 'stock']);
    }

    public function editStock($id)
    {
        $suppliers = PoSupplier::all();
        $stock = DieselStock::find($id);

        return view('diesal-stock-edit', compact('stock','suppliers'));
    }

    public function detailStock($id)
    {
        $stock = DieselStock::find($id);

        return view('diesal-stock-detail', compact('stock'));
    }

    public function deleteStock($id)
    {
        $stock = DieselStock::find($id);
        $stock->delete();

        Auth::user()->trail('diesel', 'stock delete', 'stock delete');

        return redirect()->route('diesal', ['type' => 'stock']);
    }

    public function updateStock(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'purchased' => 'required|numeric|min:0',
            'actual' => 'required|numeric|min:0',
            'after_balance' => 'required|numeric|min:0',
            'before_balance' => 'required|numeric|min:0',
            'before_cm' => 'required|numeric|min:0',
            'after_cm' => 'required|numeric|min:0',
            'supplier' => 'required',
        ]);

        $stock = DieselStock::find($request->id);

        $data = $request->only(['purchased', 'actual', 'before_balance', 'after_balance', 'before_cm', 'after_cm']);

        $data['supplier_id'] = $request->supplier;
        $data['variance'] = $request->actual - $request->purchased;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $stock->update($data);

        Auth::user()->trail('diesel', 'stock edit', 'stock edit');

        return redirect()->route('diesal', ['type' => 'stock']);
    }

    public function addRequest()
    {
        $suppliers = PoSupplier::all();
        return view('diesal-request-add', compact('suppliers'));
    }

    public function createRequest(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'request_no' => 'required',
            'supplier' => 'required',
            'remaining_cm' => 'required|numeric|min:0',
            'remaining_litre' => 'required|numeric|min:0',
            'request_quality' => 'required|numeric|min:0',
        ]);

        $data = $request->only(['request_no', 'remaining_cm', 'remaining_litre', 'request_quality']);
        $data['supplier_id'] = $request->supplier;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;
        $data['status'] = 'pending';

        DieselRequest::create($data);

        Auth::user()->trail('diesel', 'request add', 'request add');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function editRequest($id)
    {
        $request = DieselRequest::find($id);
        $suppliers = PoSupplier::all();

        return view('diesal-request-edit', compact('request', 'suppliers'));
    }

    public function detailRequest($id)
    {
        $request = DieselRequest::find($id);

        return view('diesal-request-detail', compact('request'));
    }

    public function deleteRequest($id)
    {
        $request = DieselRequest::find($id);
        $request->delete();

        Auth::user()->trail('diesel', 'request delete', 'request delete');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function completeRequest($id)
    {
        $request = DieselRequest::find($id);
        $request->status = 'complete';
        $request->save();

        Auth::user()->trail('diesel', 'request complete', 'request complete');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function updateRequest(Request $request)
    {
        $this->validate($request, [
            'date' => 'required|date',
            'request_no' => 'required',
            'supplier' => 'required',
            'remaining_cm' => 'required|numeric|min:0',
            'remaining_litre' => 'required|numeric|min:0',
            'request_quality' => 'required|numeric|min:0',
        ]);

        $r = DieselRequest::find($request->id);

        $data = $request->only(['request_no', 'remaining_cm', 'remaining_litre', 'request_quality']);
        $data['supplier_id'] = $request->supplier;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $r->update($data);

        Auth::user()->trail('diesel', 'request edit', 'request edit');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function usagedata(Request $request)
    {
        $diesels = Diesel::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('driver', 'like', '%' . $request->by . '%')
            ->where('litres', 'like', '%' . $request->litres . '%')
            ->where('create_date', 'like', '%' . $request->date . '%')
            ->where('month_year', 'like', '%' . $request->month_year . '%');

        if ($request->type) {
            $diesels = $diesels->where('type_id', '=', $request->type);
        }

        $diesels = $diesels->get();

        return DataTables::of($diesels)
            ->addColumn('actions', function ($diesel) {
                if (Auth::user()->hasAccess('diesal', 'edit')) {
                    $actions = '<a href="' . route('diesal.edit', ['id' => $diesel->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('diesal.detail', ['id' => $diesel->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('diesal.delete', ['id' => $diesel->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('diesal.detail', ['id' => $diesel->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function stockdata(Request $request)
    {
        $stocks = DieselStock::leftJoin("po_supplier", "po_supplier.id", "=", 'diesel_stocks.supplier_id')
            ->where('purchased', 'like', '%' . $request->purchased . '%')
            ->where('create_date', 'like', '%' . $request->date . '%')
            ->where('variance', 'like', '%' . $request->variance . '%')
            ->where('after_balance', 'like', '%' . $request->balance . '%')
            ->where('actual', 'like', '%' . $request->actual . '%');

        if ($request->supplier != '') {
            $stocks = $stocks->where('po_supplier.name', 'like', '%' . $request->supplier . '%');
        }

        $stocks = $stocks->get(['diesel_stocks.*']);

        return DataTables::of($stocks)
            ->addColumn('actions', function ($stock) {
                if (Auth::user()->hasAccess('diesal', 'edit')) {
                    $actions = '<a href="' . route('diesal.stock.edit', ['id' => $stock->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('diesal.stock.detail', ['id' => $stock->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('diesal.stock.delete', ['id' => $stock->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('diesal.stock.detail', ['id' => $stock->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function requestdata(Request $request)
    {
        $requests = DieselRequest::leftJoin("users", "users.id", "=", 'diesel_requests.last_update_by')
            ->where('request_no', 'like', '%' . $request->request_no . '%')
            ->where('create_date', 'like', '%' . $request->date . '%')
            ->where('remaining_cm', 'like', '%' . $request->remaining_cm . '%')
            ->where('remaining_litre', 'like', '%' . $request->remaining_litre . '%')
            ->where('request_quality', 'like', '%' . $request->request_quality . '%')
            ->where('status', 'like', '%' . $request->status . '%');

        if ($request->last_update_by != '') {
            $requests = $requests->where('users.name', 'like', '%' . $request->last_update_by . '%');
        }

        $requests = $requests->get(['diesel_requests.*']);

        return DataTables::of($requests)
            ->addColumn('actions', function ($request) {
                if (Auth::user()->hasAccess('diesal', 'edit')) {
                    $actions = '<a href="' . route('diesal.request.edit', ['id' => $request->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('diesal.request.detail', ['id' => $request->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        ($request->status != 'complete' ? '<a href="' . route('diesal.request.complete', ['id' => $request->id]) . '" class="btn btn-xs white"><i class="fa fa-check"></i></a>' : '') .
                        '<a href="' . route('diesal.request.delete', ['id' => $request->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('diesal.request.detail', ['id' => $request->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
