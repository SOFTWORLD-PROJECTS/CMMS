<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;
use Auth;
use App\Type;
use App\Model;
use App\Docrunning;
use App\Record;

class RecordController extends Controller
{
    public function index(Request $request)
    {
        if ($request->type) {
            $type = $request->type;
        } else {
            $type = 'smu';
        }
        $types = Type::all();
        $models = Model::all();

        return view('record', compact('types', 'models', 'type'));
    }

    public function add(Request $request)
    {
        if ($request->type) {
            $type = $request->type;
        } else {
            $type = 'smu';
        }

        $types = Type::all();
        $models = Model::all();
//        $nextNumber = Docrunning::getNextNumber('record');

        return view('record-add', compact('types', 'models', 'type'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'record_type' => 'required',
            'reg_no' => 'required|unique:records',
            'current_meter' => 'required',
            'last_meter' => 'required',
            'date' => 'required'
        ]);

        $data = $request->only(['record_type', 'reg_no', 'current_meter', 'last_meter']);
        $data['type_id'] = $request->type;
        if ($data['record_type'] == 'smu')
            $data['model_id'] = $request->model;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $record = Record::create($data);
//        Docrunning::increaseNumber('record');

        Auth::user()->trail('record', 'add');

        return redirect()->route('record', ['type' => $record->record_type]);
    }

    public function edit($id)
    {
        $record = Record::find($id);
        $types = Type::all();
        $models = Model::all();

        return view('record-edit', compact('types', 'models', 'record'));
    }

    public function delete($id)
    {
        $record = Record::find($id);
        $record->delete();

        Auth::user()->trail('record', 'delete');

        return redirect()->route('record', ['type' => $record->record_type]);
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'reg_no' => 'required',
            'current_meter' => 'required',
            'last_meter' => 'required',
            'date' => 'required'
        ]);

        $record = Record::find($request->id);

        $data = $request->only(['reg_no', 'current_meter', 'last_meter']);

        $data['type_id'] = $request->type;
        if ($record->record_type == 'smu')
            $data['model_id'] = $request->model;
        $data['create_date'] = $request->date;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['last_update_by'] = Auth::user()->id;

        $record->update($data);

        Auth::user()->trail('record', 'edit');

        return redirect()->route('record', ['type' => $record->record_type]);
    }

    public function smudata(Request $request)
    {
        $records = Record::leftJoin("users", "users.id", "=", 'records.last_update_by')
            ->where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('current_meter', 'like', '%' . $request->current_meter . '%')
            ->where('last_meter', 'like', '%' . $request->last_meter . '%')
            ->where('create_date', 'like', '%' . $request->date . '%')
            ->where('record_type', '=', 'smu');

        if ($request->type) {
            $records = $records->where('type_id', '=', $request->type);
        }

        if ($request->model) {
            $records = $records->where('model_id', '=', $request->model);
        }

        if ($request->by) {
            $records = $records->where('users.name', 'like', '%' . $request->by . '%');
        }

        $records = $records->get(['records.*']);

        return DataTables::of($records)
            ->addColumn('actions', function ($record) {
                if (Auth::user()->hasAccess('record', 'edit')) {
                    $actions = '<a href="' . route('record.edit', ['id' => $record->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('record.delete', ['id' => $record->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function mileagedata(Request $request)
    {
        $records = Record::leftJoin("users", "users.id", "=", 'records.last_update_by')
            ->where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('current_meter', 'like', '%' . $request->current_meter . '%')
            ->where('last_meter', 'like', '%' . $request->last_meter . '%')
            ->where('create_date', 'like', '%' . $request->date . '%')
            ->where('record_type', '=', 'mileage');

        if ($request->type) {
            $records = $records->where('type_id', '=', $request->type);
        }

        if ($request->by) {
            $records = $records->where('users.name', 'like', '%' . $request->by . '%');
        }

        $records = $records->get(['records.*']);

        return DataTables::of($records)
            ->addColumn('actions', function ($record) {
                if (Auth::user()->hasAccess('record', 'edit')) {
                    $actions = '<a href="' . route('record.edit', ['id' => $record->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('record.delete', ['id' => $record->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
