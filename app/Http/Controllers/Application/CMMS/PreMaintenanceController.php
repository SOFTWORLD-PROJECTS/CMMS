<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Auth;
use App\Type;
use App\Brand;
use App\Model;
use App\WorkOrder;
use App\PreMaintenance;
use App\Docrunning;

class PreMaintenanceController extends Controller
{
    public function index()
    {
        $types = Type::all();
        $brands = Brand::all();
        return view('premaintenance', compact('types', 'brands'));
    }

    public function add()
    {
        $types = Type::all();
        $brands = Brand::all();
        $models = Model::all();
//        $nextNumber = Docrunning::getNextNumber('premaintenance');

        return view('premaintenance-add', compact('types', 'brands', 'models'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'reg_no' => 'required',
            'service_type' => 'required',
            'service_unit' => 'required',
            'routine_service' => 'required|numeric|min:0',
            'current' => 'required|numeric|min:0',
            'last_service_date' => 'required|date'
        ]);

        $data = $request->only(['reg_no', 'service_unit', 'service_type', 'routine_service', 'current', 'last_service_date']);
        $data['type_id'] = $request->type;
        $data['brand_id'] = $request->brand;
        $data['model_id'] = $request->model;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;
        $data['reason'] = '';
        $data['status'] = 'preset';
        $data['left'] = $request->routine_service - $request->current;

        $premaintenance = PreMaintenance::create($data);
//        Docrunning::increaseNumber('premaintenance');
        $premaintenance->updateStatus();

        Auth::user()->trail('prevent maintenance', 'add');

        return redirect()->route('premaintenance');
    }

    public function edit($id)
    {
        $premaintenance = PreMaintenance::find($id);
        $types = Type::all();
        $brands = Brand::all();
        $models = Model::all();

        return view('premaintenance-edit', compact('types', 'brands', 'models', 'premaintenance'));
    }

    public function detail($id)
    {
        $premaintenance = PreMaintenance::find($id);

        return view('premaintenance-detail', compact('premaintenance'));
    }

    public function post($id)
    {
        $premaintenance = PreMaintenance::find($id);

        $types = Type::all();
        $models = Model::all();
        $regNo = $premaintenance->reg_no;
        $nextNumber = DocRunning::getNextNumber('workorder');

        return view('premaintenance-workorder-add', compact('types', 'models', 'regNo', 'nextNumber', 'premaintenance'));
    }

    public function delete($id)
    {
        $premaintenance = PreMaintenance::find($id);
        $premaintenance->delete();

        WorkOrder::where('pre_maintenance_id', $premaintenance->id)->update(['pre_maintenance_id' => null]);

        Auth::user()->trail('prevent maintenance', 'delete');

        return redirect()->route('premaintenance');
    }

    public function kiv(Request $request, $id)
    {
        $premaintenance = PreMaintenance::find($id);
        $premaintenance->status = 'kiv';
        $premaintenance->reason = $request->reason;
        $premaintenance->save();

        Auth::user()->trail('prevent maintenance', 'kiv');

        return redirect()->route('premaintenance');
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'reg_no' => 'required',
            'service_type' => 'required',
            'service_unit' => 'required',
            'routine_service' => 'required|numeric|min:0',
            'current' => 'required|numeric|min:0',
            'last_service_date' => 'required|date'
        ]);

        $premaintenance = PreMaintenance::find($request->id);

        $data = $request->only(['reg_no', 'service_unit', 'service_type', 'routine_service', 'current', 'last_service_date']);
        $data['type_id'] = $request->type;
        $data['brand_id'] = $request->brand;
        $data['model_id'] = $request->model;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;
        $data['left'] = $request->routine_service - $request->current;

        $premaintenance->update($data);
        $premaintenance->updateStatus();

        Auth::user()->trail('prevent maintenance', 'edit');

        return redirect()->route('premaintenance');
    }

    public function upcomingdata(Request $request)
    {
        $premaintenances = PreMaintenance::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('current', 'like', '%' . $request->current . '%')
            ->where('last_service_date', 'like', '%' . $request->last_service_date . '%')
            ->where('left', 'like', '%' . $request->left . '%')
            ->where('service_type', 'like', '%' . $request->service_type . '%')
            ->where('status', '=', 'upcoming');

        if ($request->type) {
            $premaintenances = $premaintenances->where('type_id', '=', $request->type);
        }

        $premaintenances = $premaintenances->get();

        return DataTables::of($premaintenances)
            ->addColumn('actions', function ($premaintenance) {
                if(Auth::user()->hasAccess('premaintenance', 'edit')) {
                   $actions = '<a href="' . route('premaintenance.edit', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                    '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                    '<a href="' . route('premaintenance.post', ['id' => $premaintenance->id]) . '" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="Post"><i class="fa fa-arrow-left"></i></a>' .
                    '<a data-url="' . route('premaintenance.kiv', ['id' => $premaintenance->id]) . '" href="javascript::" onclick="updateKiv(this);" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="KIV"><i class="fa fa-arrow-right"></i></a>' .
                    '<a href="' . route('premaintenance.delete', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }else {
                    $actions = '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }
               return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function postdata(Request $request)
    {
        $premaintenances = PreMaintenance::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('current', 'like', '%' . $request->current . '%')
            ->where('last_service_date', 'like', '%' . $request->last_service_date . '%')
            ->where('left', 'like', '%' . $request->left . '%')
            ->where('service_type', 'like', '%' . $request->service_type . '%')
            ->whereIn('status', ['servicing', 'pending'] );

        if ($request->type) {
            $premaintenances = $premaintenances->where('type_id', '=', $request->type);
        }

        $premaintenances = $premaintenances->get();

        return DataTables::of($premaintenances)
            ->addColumn('actions', function ($premaintenance) {
                if(Auth::user()->hasAccess('premaintenance', 'edit')) {
                    $actions = '<a href="' . route('premaintenance.edit', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' ;
                    $actions .= '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                    $actions .= '<a href="' . route('premaintenance.delete', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>' ;
                }else{
                   $actions = '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' ;
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function presetdata(Request $request)
    {
        $premaintenances = PreMaintenance::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('current', 'like', '%' . $request->current . '%')
            ->where('last_service_date', 'like', '%' . $request->last_service_date . '%')
            ->where('routine_service', 'like', '%' . $request->routine_service . '%')
            ->where('service_unit', 'like', '%' . $request->service_unit . '%')
            ->where('service_type', 'like', '%' . $request->service_type . '%');

        if ($request->type) {
            $premaintenances = $premaintenances->where('type_id', '=', $request->type);
        }

        if ($request->brand) {
            $premaintenances = $premaintenances->where('brand_id', '=', $request->brand);
        }

        $premaintenances = $premaintenances->get();

        return DataTables::of($premaintenances)
            ->addColumn('actions', function ($premaintenance) {
                if(Auth::user()->hasAccess('premaintenance', 'edit')) {
                    $actions = '<a href="' . route('premaintenance.edit', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                    '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                    '<a data-url="' . route('premaintenance.kiv', ['id' => $premaintenance->id]) . '" href="javascript::" onclick="updateKiv(this);" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="KIV"><i class="fa fa-arrow-right"></i></a>' .
                    '<a href="' . route('premaintenance.delete', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }else {
                    $actions = '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function kivdata(Request $request)
    {
        $premaintenances = PreMaintenance::leftJoin("users", "users.id", "=", 'pre_maintenances.last_update_by')
            ->where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('last_update', 'like', '%' . $request->date . '%')
            ->where('reason', 'like', '%' . $request->reason . '%')
            ->where('status', '=', 'kiv');

        if ($request->last_update_by != '') {
            $premaintenances = $premaintenances->where('users.name', 'like', '%' . $request->last_update_by . '%');
        }

        if ($request->type) {
            $premaintenances = $premaintenances->where('type_id', '=', $request->type);
        }

        if ($request->brand) {
            $premaintenances = $premaintenances->where('brand_id', '=', $request->brand);
        }

        $premaintenances = $premaintenances->get(['pre_maintenances.*']);

        return DataTables::of($premaintenances)
            ->addColumn('actions', function ($premaintenance) {
                if(Auth::user()->hasAccess('premaintenance', 'edit')) {
                    $actions = '<a href="' . route('premaintenance.edit', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('premaintenance.post', ['id' => $premaintenance->id]) . '" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="POST"><i class="fa fa-arrow-left"></i></a>' .
                        '<a href="' . route('premaintenance.delete', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }else {
                    $actions = '<a href="' . route('premaintenance.detail', ['id' => $premaintenance->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
