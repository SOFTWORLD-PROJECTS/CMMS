<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\MachineryPic;
use App\Type;
use App\Brand;
use App\Model;
use App\Machinery;
use App\Docrunning;
use App\Company;
use Auth;

class MachineryController extends Controller
{
    public function index($type = 'machinery')
    {
        $types = Type::all();
        $brands = Brand::all();
        $models = Model::all();

        return view('machinery', compact('type', 'types', 'brands', 'models'));
    }

    public function add()
    {
        $types = Type::all();
        $brands = Brand::all();
        $models = Model::all();
        $companies = Company::all();
        $nextNumber = Docrunning::getNextNumber('machinery');

        return view('machinery-add', compact('types', 'brands', 'models', 'companies', 'nextNumber'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'company' => 'required',
            'reg_no' => 'required|unique:machineries',
            'serial_no' => 'required',
            'chasis_no' => 'required',
            'engine_no' => 'required',
            'acc_code' => 'required|unique:machineries',
            'year_made' => 'required',
            'date_purchase' => 'required|date',
            'purchase_price' => 'required|numeric|min:0',
            'reg_card' => 'required|image'
        ]);

        if ($request->hasFile('reg_card')) {
            $reg_card = $request->reg_card;
            $reg_card_new_name = time() . $reg_card->getClientOriginalName();
            $reg_card->move('uploads/machinery/', $reg_card_new_name);
            $reg_card_url = 'uploads/machinery/' . $reg_card_new_name;
        }

        $data = $request->only(['reg_no', 'serial_no', 'serial_no', 'chasis_no',
            'engine_no', 'acc_code', 'year_made', 'date_purchase', 'purchase_price', 'remarks']);
        $data['reg_card_url'] = $reg_card_url;
        $data['type_id'] = $request->type;
        $data['brand_id'] = $request->brand;
        $data['model_id'] = $request->model;
        $data['company_id'] = $request->model;

        $machinery = Machinery::create($data);
        Docrunning::increaseNumber('machinery');
        if ($request->has('pictures')) {
            $index = 0;
            foreach ($request->file('pictures') as $key => $file) {
                if (!empty($file)) {
                    $file_new_name = time() . $index++ . $file->getClientOriginalName();
                    $file->move('uploads/machinery/', $file_new_name);
                    $file_new_name = 'uploads/machinery/' . $file_new_name;

                    MachineryPic::create(['machinery_id' => $machinery->id, 'pic_url' => $file_new_name, 'number' => $key]);
                }
            }
        }

        Auth::user()->trail('machinery', 'add');

        return redirect()->route('machinery');
    }

    public function edit($id)
    {
        $types = Type::all();
        $brands = Brand::all();
        $models = Model::all();
        $companies = Company::all();
        $machinery = Machinery::find($id);

        return view('machinery-edit', compact('types', 'brands', 'models', 'companies', 'machinery'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'company' => 'required',
            'reg_no' => 'required',
            'serial_no' => 'required',
            'chasis_no' => 'required',
            'engine_no' => 'required',
            'acc_code' => 'required',
            'year_made' => 'required',
            'date_purchase' => 'required|date',
            'purchase_price' => 'required|numeric|min:0',
        ]);

        $machinery = Machinery::find($request->id);


        $data = $request->only(['reg_no', 'serial_no', 'serial_no', 'chasis_no',
            'engine_no', 'acc_code', 'year_made', 'date_purchase', 'purchase_price', 'remarks']);
        $data['type_id'] = $request->type;
        $data['brand_id'] = $request->brand;
        $data['model_id'] = $request->model;
        $data['company_id'] = $request->company;

        if ($request->hasFile('reg_card')) {
            $reg_card = $request->reg_card;
            $reg_card_new_name = time() . $reg_card->getClientOriginalName();
            $reg_card->move('uploads/machinery/', $reg_card_new_name);
            $reg_card_url = 'uploads/machinery/' . $reg_card_new_name;
            $data['reg_card_url'] = $reg_card_url;
        }

        $machinery->update($data);


        if ($request->has('pictures')) {
            $index = 0;
            foreach ($request->file('pictures') as $key => $file) {
                if (!empty($file)) {
                    $file_new_name = time() . $index++ . $file->getClientOriginalName();
                    $file->move('uploads/machinery/', $file_new_name);
                    $file_new_name = 'uploads/machinery/' . $file_new_name;

                    MachineryPic::updateOrCreate(['machinery_id' => $machinery->id, 'number' => $key],
                        ['machinery_id' => $machinery->id, 'number' => $key, 'pic_url' => $file_new_name]);
                }
            }
        }

        Auth::user()->trail('machinery', 'update');

        return redirect()->route('machinery');
    }

    public function detail($id)
    {
        $machinery = Machinery::find($id);
        return view('machinery-detail', ['machinery' => $machinery]);
    }

    public function delete($id)
    {
        $machinery = Machinery::find($id);
        $machinery->delete();

        MachineryPic::where('machinery_id', $machinery->id)->delete();

        Auth::user()->trail('machinery', 'delete');

        return redirect()->route('machinery');
    }

    public function machinerydata(Request $request)
    {
        $machineries = Machinery::where('reg_no', 'like', '%' . $request->reg_no . '%')
            ->where('acc_code', 'like', '%' . $request->acc_code . '%')
            ->where('serial_no', 'like', '%' . $request->serial_no . '%')
            ->where('date_purchase', 'like', '%' . $request->date_purchase . '%');

        if ($request->type) {
            $machineries = $machineries->where('type_id', '=', $request->type);
        }

        if ($request->brand) {
            $machineries = $machineries->where('brand_id', '=', $request->brand);
        }

        if ($request->model) {
            $machineries = $machineries->where('model_id', '=', $request->model);
        }

        $machineries = $machineries->get();

        return DataTables::of($machineries)
            ->addColumn('actions', function ($machinery) {
                if (Auth::user()->hasAccess('machinery', 'edit')) {
                    $actions = '<a href="' . route('machinery.detail', ['id' => $machinery->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>' .
                        '<a href="' . route('machinery.edit', ['id' => $machinery->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('machinery.delete', ['id' => $machinery->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '<a href="' . route('machinery.detail', ['id' => $machinery->id]) . '" class="btn btn-xs white"><i class="fa fa-search"></i></a>';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addType()
    {
        return view('machinery-type-add');
    }

    public function createType(Request $request)
    {
        $this->validate($request, [
            'type' => 'required|unique:types,name',
            'acc_code' => 'required|unique:types',
        ]);

        Type::create([
            'name' => $request->type,
            'acc_code' => $request->acc_code,
            'description' => $request->description ? $request->description : '',
        ]);


        Auth::user()->trail('machinery', 'type add', 'type add');

        return redirect()->route('machinery', ['type' => 'type']);
    }

    public function editType($id)
    {
        $type = Type::find($id);
        return view('machinery-type-edit', ['type' => $type]);
    }

    public function updateType(Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'acc_code' => 'required',
        ]);

        $type = Type::find($request->id);

        $type->name = $request->type;
        $type->acc_code = $request->acc_code;
        $type->description = $request->description ? $request->description : '';

        $type->save();

        Auth::user()->trail('machinery', 'type edit', 'type edit');

        return redirect()->route('machinery', ['type' => 'type']);
    }

    public function deleteType($id)
    {
        Type::destroy($id);

        Auth::user()->trail('machinery', 'type delete', 'type delete');

        return redirect()->route('machinery', ['type' => 'type']);
    }

    public function typedata(Request $request)
    {
        $types = Type::where('name', 'like', '%' . $request->type . '%')
            ->where('acc_code', 'like', '%' . $request->acc_code . '%')
            ->where('description', 'like', '%' . $request->description . '%')
            ->get();

        return DataTables::of($types)
            ->addColumn('actions', function ($type) {
                if (Auth::user()->hasAccess('machinery', 'edit')) {
                    $actions = '<a href="' . route('machinery.type.edit', ['id' => $type->id]) . '" class="btn btn-sm white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('machinery.type.delete', ['id' => $type->id]) . '" class="btn btn-sm white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function addBrand()
    {
        return view('machinery-brand-add');
    }

    public function createBrand(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required|unique:brands,name',
        ]);

        Brand::create([
            'name' => $request->brand,
            'description' => $request->description ? $request->description : '',
        ]);

        Auth::user()->trail('machinery', 'brand add', 'brand add');

        return redirect()->route('machinery', ['type' => 'brand']);
    }

    public function editBrand($id)
    {
        $brand = Brand::find($id);
        return view('machinery-brand-edit', ['brand' => $brand]);
    }

    public function updateBrand(Request $request)
    {
        $this->validate($request, [
            'brand' => 'required',
        ]);
        $brand = Brand::find($request->id);

        $brand->name = $request->brand;
        $brand->description = $request->description ? $request->description : '';

        $brand->save();

        Auth::user()->trail('machinery', 'brand edit', 'brand edit');

        return redirect()->route('machinery', ['type' => 'brand']);
    }

    public function deleteBrand($id)
    {
        Brand::destroy($id);

        Auth::user()->trail('machinery', 'brand delete', 'brand delete');

        return redirect()->route('machinery', ['type' => 'brand']);
    }

    public function branddata(Request $request)
    {
        $brands = Brand::where('name', 'like', '%' . $request->brand . '%')
            ->where('description', 'like', '%' . $request->description . '%')
            ->get();

        return DataTables::of($brands)
            ->addColumn('actions', function ($brand) {
                if (Auth::user()->hasAccess('machinery', 'edit')) {
                    $actions = '<a href="' . route('machinery.brand.edit', ['id' => $brand->id]) . '" class="btn btn-sm white"><i class="fa fa-pencil"></i></a>' .
                        '<a href="' . route('machinery.brand.delete', ['id' => $brand->id]) . '" class="btn btn-sm white"><i class="fa fa-trash"></i></a>';
                } else {
                    $actions = '';
                }
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
