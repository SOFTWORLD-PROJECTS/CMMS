<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Auth;
use App\Docrunning;
use App\Renewal;

class RenewalController extends Controller
{
    public function index()
    {
        Renewal::updateAllStatus();
        return view('renewal');
    }

    public function add()
    {
//        $nextNumber = Docrunning::getNextNumber('renewal');

        return view('renewal-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'reg_no' => 'required|unique:renewals'
        ]);

        if ($request->post('road_tax') != '' || $request->post('road_tax_routine') != '' || $request->post('road_tax_last_renewal') != '') {
            $this->validate($request, [
                'road_tax' => 'required',
                'road_tax_routine' => 'required|integer|min:0',
                'road_tax_last_renewal' => 'required|date',
            ]);
        }

        if ($request->post('puspakom') != '' || $request->post('puspakom_routine') != '' || $request->post('puspakom_last_renewal') != '') {
            $this->validate($request, [
                'puspakom' => 'required',
                'puspakom_routine' => 'required|integer|min:0',
                'puspakom_last_renewal' => 'required|date',
            ]);
        }

        if ($request->post('insurance') != '' || $request->post('insurance_routine') != '' || $request->post('insurance_last_renewal') != '') {
            $this->validate($request, [
                'insurance' => 'required',
                'insurance_routine' => 'required|integer|min:0',
                'insurance_last_renewal' => 'required|date',
            ]);
        }

        if ((!$request->post('insurance') && !$request->post('puspakom') && !$request->post('road_tax'))) {
            return redirect()->back()
                ->withErrors(['You have to input one of insurance, puspakom and road tax.'])
                ->withInput();
        }

        $data = $request->only(['reg_no', 'insurance', 'road_tax', 'puspakom', 'insurance_routine', 'road_tax_routine', 'puspakom_routine',
            'insurance_last_renewal', 'road_tax_last_renewal', 'puspakom_last_renewal']);
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');

        if(!$request->insurance)
            $data['insurance'] = '';

        if(!$request->puspakom)
            $data['puspakom'] = '';

        if(!$request->road_tax)
            $data['road_tax'] = '';

        $data['insurance_left'] = 0;
        $data['road_tax_left'] = 0;
        $data['puspakom_left'] = 0;
        $data['insurance_upload'] = '';
        $data['road_tax_upload'] = '';
        $data['puspakom_upload'] = '';
        $data['status'] = 'preset';

        $renewal = Renewal::create($data);
        $renewal->updateStatus();

//        Docrunning::increaseNumber('renewal');

        Auth::user()->trail('renewal', 'add');

        return redirect()->route('renewal');
    }

    public function edit($id)
    {
        $renewal = Renewal::find($id);
        return view('renewal-edit', compact('renewal'));
    }

    public function detail($id)
    {
        $renewal = Renewal::find($id);
        return view('renewal-detail', compact('renewal'));
    }


    public function update(Request $request)
    {
        $this->validate($request, [
            'reg_no' => 'required'
        ]);

        if ($request->post('road_tax') != '' || $request->post('road_tax_routine') != '' || $request->post('road_tax_last_renewal') != '') {
            $this->validate($request, [
                'road_tax' => 'required',
                'road_tax_routine' => 'required|integer|min:0',
                'road_tax_last_renewal' => 'required|date',
            ]);
        }

        if ($request->post('puspakom') != '' || $request->post('puspakom_routine') != '' || $request->post('puspakom_last_renewal') != '') {
            $this->validate($request, [
                'puspakom' => 'required',
                'puspakom_routine' => 'required|integer|min:0',
                'puspakom_last_renewal' => 'required|date',
            ]);
        }

        if ($request->post('insurance') != '' || $request->post('insurance_routine') != '' || $request->post('insurance_last_renewal') != '') {
            $this->validate($request, [
                'insurance' => 'required',
                'insurance_routine' => 'required|integer|min:0',
                'insurance_last_renewal' => 'required|date',
            ]);
        }

        if ((!$request->post('insurance') && !$request->post('puspakom') && !$request->post('road_tax'))) {
            return redirect()->back()
                ->withErrors(['You have to input one of insurance, puspakom and road tax.'])
                ->withInput();
        }

        $renewal = Renewal::find($request->id);

        if ($renewal->insurance_last_renewal && $renewal->insurance_last_renewal > $request->insurance_last_renewal) {
            return redirect()->back()
                ->withErrors(['insurance last renewal should be bigger than original value.'])
                ->withInput();
        }

        if ($renewal->road_tax_last_renewal && $renewal->road_tax_last_renewal > $request->road_tax_last_renewal) {
            return redirect()->back()
                ->withErrors(['road tax last renewal should be bigger than original value.'])
                ->withInput();
        }

        if ($renewal->puspakom_last_renewal && $renewal->puspakom_last_renewal > $request->puspakom_last_renewal) {
            return redirect()->back()
                ->withErrors(['puspakom last renewal should be bigger than original value.'])
                ->withInput();
        }

        $data = $request->only(['reg_no', 'insurance', 'road_tax', 'puspakom', 'insurance_routine', 'road_tax_routine', 'puspakom_routine',
            'insurance_last_renewal', 'road_tax_last_renewal', 'puspakom_last_renewal']);

        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $renewal->update($data);
        $renewal->updateStatus();

        Auth::user()->trail('renewal', 'edit');

        return redirect()->route('renewal');
    }


    public function delete($id)
    {
        $renewal = Renewal::find($id);
        $renewal->delete();

        Auth::user()->trail('renewal', 'delete');

        return redirect()->route('renewal');
    }

    public function upcomingdata(Request $request)
    {
        $renewals = Renewal::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('insurance', 'like', '%' . $request->insurance . '%')
            ->where('road_tax', 'like', '%' . $request->road_tax . '%')
            ->where('puspakom', 'like', '%' . $request->puspakom . '%')
            ->where('status', '=', 'upcoming');

        if($request->insurance_left) {
            $renewals = $renewals->where('insurance_left', 'like', '%' . $request->insurance_left . '%');
        }
        
        if($request->puspakom_left) {
            $renewals = $renewals->where('puspakom_left', 'like', '%' . $request->puspakom_left . '%');
        }

        if($request->road_tax_left) {
            $renewals = $renewals->where('road_tax_left', 'like', '%' . $request->road_tax_left . '%');
        }

        $renewals = $renewals->get();

        return DataTables::of($renewals)
            ->addColumn('actions', function ($renewal) {
                if (Auth::user()->hasAccess('renewal', 'edit')) {
                    $actions = '<a href="' . route('renewal.edit', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('renewal.detail', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('renewal.delete', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('renewal.detail', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function completedata(Request $request)
    {
        $renewals = Renewal::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('status', '=', 'complete');

        $renewals = $renewals->get();

        return DataTables::of($renewals)
            ->addColumn('insurance_upload_col', function ($renewal) {
                if ($renewal->insurance_upload != '')
                    return '<a href="' . asset($renewal->insurance_upload) . '" class="btn btn-xs white"><i class="fa fa-download"></i></a>';
                else
                    return '<a href="javascript::" onclick="uploadFile(this)" data-url="' . route('renewal.upload') . '" data-id="' . $renewal->id . '" data-type="insurance_upload" class="btn btn-sm white"><i class="fa fa-upload"></i></a>';
            })
            ->addColumn('road_tax_upload_col', function ($renewal) {
                if ($renewal->road_tax_upload != '')
                    return '<a href="' . asset($renewal->road_tax_upload) . '" class="btn btn-xs white"><i class="fa fa-download"></i></a>';
                else
                    return '<a href="javascript::" onclick="uploadFile(this)" data-url="' . route('renewal.upload') . '" data-id="' . $renewal->id . '" data-type="road_tax_upload" class="btn btn-sm white"><i class="fa fa-upload"></i></a>';
            })
            ->addColumn('puspakom_upload_col', function ($renewal) {
                if ($renewal->puspakom_upload != '')
                    return '<a href="' . asset($renewal->puspakom_upload) . '" class="btn btn-xs white"><i class="fa fa-download"></i></a>';
                else
                    return '<a href="javascript::" onclick="uploadFile(this)" data-url="' . route('renewal.upload') . '" data-id="' . $renewal->id . '" data-type="puspakom_upload" class="btn btn-sm white"><i class="fa fa-upload"></i></a>';
            })
            ->addColumn('actions', function ($renewal) {
                if (Auth::user()->hasAccess('renewal', 'edit')) {
                    $actions = '<a href="' . route('renewal.edit', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('renewal.detail', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('renewal.delete', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('renewal.detail', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions', 'insurance_upload_col', 'road_tax_upload_col', 'puspakom_upload_col'])
            ->make(true);
    }


    public function presetdata(Request $request)
    {
        $renewals = Renewal::get();

        return DataTables::of($renewals)
            ->addColumn('actions', function ($renewal) {
                if (Auth::user()->hasAccess('renewal', 'edit')) {
                    $actions = '<a href="' . route('renewal.edit', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('renewal.delete', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('renewal.detail', ['id' => $renewal->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function uploadFile(Request $request)
    {
        $renewal = Renewal::find($request->id);

        if ($request->hasFile('file')) {
            $file_new_name = time() . $request->file->getClientOriginalName();
            $request->file->move('uploads/renewal/', $file_new_name);
            $file_new_name = 'uploads/renewal/' . $file_new_name;

            $renewal->update([$request->type => $file_new_name]);

            return json_encode(['success' => true]);
        } else {
            return json_encode(['success' => false]);
        }
    }
}
