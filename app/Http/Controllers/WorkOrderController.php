<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Yajra\DataTables\DataTables;
use Auth;

use App\Type;
use App\Model;
use App\DocRunning;
use App\WorkOrder;
use App\PartsUse;
use App\Service;
use App\WorkOrderPic;
use App\WorkOrderRemark;
use App\Item;
use App\PoIRFBody;

class WorkOrderController extends Controller
{
    public function index()
    {
        $types = Type::all();
        return view('workorder', compact('types'));
    }

    public function add()
    {
        $types = Type::all();
        $models = Model::all();
        $nextNumber = DocRunning::getNextNumber('workorder');

        return view('workorder-add', compact('types', 'models', 'nextNumber'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'create_time' => 'required|date',
            'wo_no' => 'required|unique:work_orders',
            'type' => 'required',
            'model' => 'required',
            'reg_no' => 'required|unique:work_orders',
            'title' => 'required',
            'assign_to' => 'required',
            'estimate_time' => 'required|date',
            'service_type' => 'required'
        ]);

        $data = $request->only(['create_time', 'wo_no', 'reg_no', 'title', 'assign_to', 'estimate_time']);
        $data['type_id'] = $request->type;
        $data['model_id'] = $request->model;
        $data['last_update_by'] = Auth::user()->id;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');
        $data['remarks'] = '';
        $data['status'] = 'new';

        if ($request->has('pre_maintenance_id')) {
            $data['pre_maintenance_id'] = $request->pre_maintenance_id;
        }

        $workorder = WorkOrder::create($data);

        if ($workorder->premaintenance) {
            $workorder->premaintenance->status = 'pending';
            $workorder->premaintenance->save();
        }

        Docrunning::increaseNumber('workorder');

        Auth::user()->trail('work order', 'add');

        return redirect()->route('workorder.edit', ['id' => $workorder->id]);
    }

    public function edit($id)
    {
        $workorder = WorkOrder::find($id);
        $types = Type::all();
        $models = Model::all();
        $items = Item::all();
        return view('workorder-edit', compact('types', 'models', 'workorder', 'items'));
    }

    public function detail($id)
    {
        $workorder = WorkOrder::find($id);

        return view('workorder-detail', compact('workorder'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'create_time' => 'required|date',
            'wo_no' => 'required',
            'type' => 'required',
            'model' => 'required',
            'reg_no' => 'required',
            'title' => 'required',
            'assign_to' => 'required',
            'estimate_time' => 'required|date'
        ]);

        $workorder = WorkOrder::find($request->id);

        $data = $request->only(['create_time', 'wo_no', 'reg_no', 'title', 'assign_to', 'estimate_time']);
        $data['type_id'] = $request->type;
        $data['model_id'] = $request->model;
        $data['last_update_by'] = Auth::user()->id;
        $data['last_update'] = Carbon::now()->format('Y-m-d H:i:s');

        $workorder->update($data);

        Auth::user()->trail('work order', 'edit');

        return redirect()->route('workorder.edit', ['id' => $workorder->id]);
    }

    public function data(Request $request, $status)
    {
        $workorders = WorkOrder::leftJoin("users", "users.id", "=", 'work_orders.last_update_by')
            ->where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('title', 'like', '%' . $request->title . '%')
            ->where('create_time', 'like', '%' . $request->create_time . '%')
            ->where('wo_no', 'like', '%' . $request->wo_no . '%')
            ->where('reg_no', 'like', '%' . $request->wo_no . '%')
            ->where('estimate_time', 'like', '%' . $request->wo_no . '%')
            ->where('last_update', 'like', '%' . $request->last_update . '%')
            ->where('assign_to', 'like', '%' . $request->assign_to . '%')
            ->where('status', '=', $status);


        if ($request->last_update_by != '') {
            $workorders = $workorders->where('users.name', 'like', '%' . $request->last_update_by . '%');
        }

        if ($request->type) {
            $workorders = $workorders->where('type_id', '=', $request->type);
        }

        $workorders = $workorders->get(['work_orders.*']);

        return DataTables::of($workorders)
            ->addColumn('actions', function ($workorder) {
                $actions = '';

                if (Auth::user()->hasAccess('workorder', 'edit')) {
                    if ($workorder->status != 'complete') {
                        $actions .= '<a href="' . route('workorder.complete', ['id' => $workorder->id]) . '" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="Complete" ><i class="fa fa-check"></i></a>';
                    }

                    if ($workorder->status != 'kiv') {
                        $actions .= '<a href="' . route('workorder.kiv', ['id' => $workorder->id]) . '" class="btn btn-xs white tooltips" data-toggle="tooltip" data-placement="right" title="KIV"><i class="fa fa-arrow-right"></i></a>';
                    }

                    $actions .= '<a href="' . route('workorder.edit', ['id' => $workorder->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('workorder.detail', ['id' => $workorder->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('workorder.delete', ['id' => $workorder->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></a>';
                } else {

                    $actions = '<a href="' . route('workorder.detail', ['id' => $workorder->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function complete($id)
    {
        $workorder = WorkOrder::find($id);
        $workorder->status = 'complete';
        $workorder->last_update_by = Auth::user()->id;
        $workorder->last_update = Carbon::now()->format('Y-m-d H:i:s');
        $workorder->save();

        Service::where('work_order_id', $workorder->id)->update(['status' => 'complete']);


        Auth::user()->trail('work order', 'complete');

        return redirect()->route('workorder');
    }

    public function kiv($id)
    {
        $workorder = WorkOrder::find($id);
        $workorder->status = 'kiv';
        $workorder->last_update_by = Auth::user()->id;
        $workorder->last_update = Carbon::now()->format('Y-m-d H:i:s');
        $workorder->save();


        Auth::user()->trail('work order', 'kiv');

        return redirect()->route('workorder');
    }

    public function delete($id)
    {
        $workorder = WorkOrder::find($id);
        WorkOrderPic::where('work_order_id', $workorder->id)->delete();
        WorkOrderRemark::where('work_order_id', $workorder->id)->delete();
        Service::where('work_order_id', $workorder->id)->delete();
        PartsUse::where('work_order_id', $workorder->id)->delete();
        $workorder->delete();

        Auth::user()->trail('work order', 'delete');

        return redirect()->route('workorder');
    }

    public function createPartsUse(Request $request, $id)
    {
        $data = $request->only(['required_qty', 'order_qty', 'u_price', 'onhand_qty']);

        $data['work_order_id'] = $id;
        $data['part_no'] = Item::find($request->part_no)->partno;
        $data['part_name'] = Item::find($request->part_name)->name;
        $data['status'] = 'pending';
        $data['amount'] = $request->required_qty * $request->u_price;
        $data['service_type'] = $request->service_type;
        $data['irf'] = $request->irf > 0 ? $request->irf : 0;

        PartsUse::create($data);

        if ($data['irf'] > 0) {
            PoIRFBody::create([
                'quantity' => $data['required_qty'],
                'unit' => $request->unit_measure,
                'remarks' => $request->remarks,
                'price' => $data['u_price']
            ]);
        }

        Auth::user()->trail('work order', 'part user add');

        return json_encode(['success' => true]);
    }

    public function updatePartsUse(Request $request, $id)
    {
        $partsUse = PartsUse::find($id);
        $partsUse->fill($request->all());
        $partsUse->save();


        Auth::user()->trail('work order', 'part user edit');

        return json_encode(['success' => true]);
    }

    public function deletePartsUse($id)
    {
        PartsUse::destroy($id);

        Auth::user()->trail('work order', 'part user delete');

        return json_encode(['success' => true]);
    }

    public function partsusedata(Request $request, $id)
    {
        $partsUses = PartsUse::where('work_order_id', $id)->where('service_type', $request->service_type)->get();

        return DataTables::of($partsUses)
            ->addColumn('irf_check', function ($partsUse) {
                $irfCheck = '<input type="checkbox" value="1" data-url="' . route('workorder.partsuse.update', ['id' => $partsUse->id]) . '" data-partuseid="' . $partsUse->id . '" ' . ($partsUse->irf > 0 ? "checked" : "") . ' onchange="updatePartsUseIRF(this)">';
                return $irfCheck;
            })
            ->addColumn('actions', function ($partsUse) {
                $actions = '<a href="javascript::" class="btn btn-xs red btn-circle" data-url="' . route('workorder.partsuse.delete', ['id' => $partsUse->id]) . '" data-partuseid="' . $partsUse->id . '" onclick="deletePartsUse(this)"><i class="fa fa-close"></i></a>';
                if ($partsUse->status == 'pending')
                    $actions .= '<a href="javascript::" class="btn btn-xs btn-danger btn-circle" data-url="' . route('workorder.partsuse.update', ['id' => $partsUse->id]) . '" data-partuseid="' . $partsUse->id . '" onclick="completePartsUse(this)" style=" padding-left: 3px; padding-right: 3px;"><i class="fa fa-check"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions', 'irf_check'])
            ->make(true);
    }

    public function createService(Request $request, $id)
    {
        $data = $request->only(['service_no', 'service_name', 'vendor', 'amount', 'assigned_to']);
        $data['work_order_id'] = $id;
        $data['status'] = 'pending';
        $data['service_type'] = $request->service_type;
        $data['rfs'] = $request->rfs > 0 ? $request->rfs : 0;

        $service = Service::create($data);

        $service->workorder->updateStatus();

        Auth::user()->trail('work order', 'service add');

        return json_encode(['success' => true]);
    }

    public function updateService(Request $request, $id)
    {
        $service = Service::find($id);
        $service->fill($request->all());
        $service->save();

        $service->workorder->updateStatus();

        Auth::user()->trail('work order', 'service edit');

        return json_encode(['success' => true]);
    }

    public function deleteService($id)
    {
        Service::destroy($id);

        Auth::user()->trail('work order', 'service delete');

        return json_encode(['success' => true]);
    }

    public function servicedata(Request $request, $id)
    {
        $services = Service::where('work_order_id', $id)->where('service_type', $request->service_type)->get();

        return DataTables::of($services)
            ->addColumn('rfs_check', function ($service) {
                $irfCheck = '<input type="checkbox" value="1" data-url="' .
                    route('workorder.service.update', ['id' => $service->id]) .
                    '" data-serviceid="' . $service->id . '" ' .
                    ($service->rfs > 0 ? "checked" : "")
                    . ' onchange="updateServiceRFS(this)">';
                return $irfCheck;
            })
            ->addColumn('actions', function ($service) {
                $actions = '<a href="javascript::" class="btn btn-xs red btn-circle" data-url="' .
                    route('workorder.service.delete', ['id' => $service->id]) .
                    '" data-serviceid="' . $service->id .
                    '" onclick="deleteService(this)"><i class="fa fa-close"></i></a>';
                if ($service->status == 'pending')
                    $actions .= '<a href="javascript::" class="btn btn-xs btn-danger btn-circle" data-url="' .
                        route('workorder.service.update', ['id' => $service->id]) .
                        '" data-serviceid="' . $service->id .
                        '" onclick="completeService(this)" style=" padding-left: 3px; padding-right: 3px;"><i class="fa fa-check"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions', 'rfs_check'])
            ->make(true);
    }

    public function createPicture(Request $request, $id)
    {
        if ($request->has('pictures')) {
            $index = 0;
            foreach ($request->file('pictures') as $file) {
                if (!empty($file)) {
                    $file_new_name = time() . $index++ . $file->getClientOriginalName();
                    $file->move('uploads/workorder/', $file_new_name);
                    $file_new_name = 'uploads/workorder/' . $file_new_name;

                    WorkOrderPic::create(['work_order_id' => $id, 'pic_url' => $file_new_name]);
                }
            }
        }

        return json_encode(['success' => true]);
    }

    public function deletePicture($id)
    {
        WorkOrderPic::destroy($id);

        return json_encode(['success' => true]);
    }

    public function picturedata($id)
    {
        $pictures = WorkOrderPic::where('work_order_id', $id)->get();

        return json_encode(['success' => true, 'pictures' => $pictures]);
    }

    public function createRemark(Request $request, $id)
    {
        $data = $request->all();

        $data['work_order_id'] = $id;
        $data['text'] = $request->text;
        $data['created_date'] = Carbon::now()->format('Y-m-d');
        $data['created_by'] = Auth::user()->id;

        WorkOrderRemark::create($data);
        return json_encode(['success' => true]);
    }

    public function remarkdata($id)
    {
        $remarks = WorkOrderRemark::where('work_order_id', $id)->get();

        $html = '';
        foreach ($remarks as $remark) {
            $html .= '<li><p class="no-margin margin-bottom-10"><span class="remark-date">' . Carbon::parse($remark->date)->format('d/m/Y') . ' </span>';
            $html .= '<span class="remark-name pull-right">' . $remark->user->name . '</span></p><p class="no-margin margin-bottom-10">' . $remark->text . '</p></li>';
        }
        return json_encode(['success' => true, 'html' => $html]);
    }
}
