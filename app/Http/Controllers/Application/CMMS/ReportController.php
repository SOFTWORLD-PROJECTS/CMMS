<?php

namespace App\Http\Controllers\Application\CMMS;
use App\Http\Controllers\Controller;

use App\Diesel;
use App\DieselItem;
use App\Record;
use App\Renewal;
use App\Type;
use Carbon\Carbon;
use Excel;

use App\DieselStock;
use App\PreMaintenance;
use App\Machinery;
use App\WorkOrder;

class ReportController extends Controller
{
    public function index()
    {
        return view('report');
    }

    public function woReport()
    {
        $data = array();

        $workorders = WorkOrder::all();

        foreach ($workorders as $workorder) {
            $machinery = Machinery::where('reg_no', $workorder->reg_no)->first();

            $company = $machinery ? $machinery->company->name : '';
            $machine = $machinery ? $machinery->model->name . ' ' . $machinery->reg_no : '';
            $down_since_date = Carbon::parse($workorder->create_time)->format('d M Y');
            $variance_days = Carbon::parse($workorder->create_time)->diffInDays(Carbon::now(), false);
            $estimate_time = Carbon::parse($workorder->estimate_time)->format('d M Y');
            $work_description = $workorder->title;
            $supplier = ' ';
            $work_status = strtoupper($workorder->status);
            $amount = 100;
            $remark = '';

            array_push($data, [$company, $machine, $down_since_date, $variance_days, $estimate_time, $work_description, $supplier, $work_status, $amount, $remark]);
        }

        ob_end_clean();

        Excel::create('W.O.REPORT', function ($excel) use ($data) {
            $excel->sheet("Report", function ($sheet) use ($data) {
                $sheet->loadView('exports.wo-report')->with('data', $data);
            });
        })->download('xlsx');
    }

    public function upcomingPMReport()
    {
        $data = array();

        $types = Type::all();

        $index = 1;
        foreach ($types as $type) {
            $machineries = Machinery::where('type_id', $type->id)->get();

            $sub_data = array();
            if (count($machineries) > 0) {
                foreach ($machineries as $machinery) {
                    $no = $index++;
                    $type_model = $machinery->type->name . ' ' . $machinery->model->name;
                    $reg_no = $machinery->reg_no;

                    $premaintenance = PreMaintenance::where('reg_no', $reg_no)->first();

                    $possible_working = $premaintenance ? $premaintenance->routine_service : 0;
                    $possible_working_unit = $premaintenance ? $premaintenance->service_unit : 'km';

                    $record = Record::where('reg_no', $machinery->reg_no)->first();

                    $starting_working = $record ? $record->last_meter : 0;
                    $starting_working_unit = $possible_working_unit;
                    $ending_working = $record ? $record->current_meter : 0;
                    $ending_working_unit = $possible_working_unit;
                    $smu = $ending_working - $starting_working;
                    $smu_unit = $possible_working_unit;
                    $utilization = sprintf("%.2f", $smu * 100 / ($possible_working == 0 ? 1 : $possible_working));

                    $diesels = Diesel::where('reg_no', $machinery->reg_no)->get();
                    $total_diesel = 0;
                    if(count($diesels)){
                        foreach($diesels as $diesel)
                        {
                            $total_diesel += $diesel->litres;
                        }
                    }
                    

                    // $total_diesel = $diesel ? $diesel->litres : 0;
                    $ideal_fuel_consumption_val = 0.14;
                    $ideal_fuel_consumption = '< ' . $ideal_fuel_consumption_val;
                    $ideal_fuel_consumption_unit = 'L/KM';
                    $actual_fuel_consumption_val = $total_diesel / ($smu == 0 ? 1 : $smu);
                    $actual_fuel_consumption = sprintf("%.2f", $total_diesel / ($smu == 0 ? 1 : $smu));
                    $actual_fuel_consumption_unit = 'L/KM';
                    $variance_val = ($actual_fuel_consumption_val - $ideal_fuel_consumption_val) * 100 / $ideal_fuel_consumption_val;
                    $variance = sprintf("%.2f", $variance_val);
                    $intime = 'In Time';
                    $remaining_smu_hrs = random_int(1000, 9999);
                    $comment = '';

                    array_push($sub_data, [$no, $type_model, $reg_no, $possible_working, $possible_working_unit, $starting_working, $starting_working_unit,
                        $ending_working, $ending_working_unit, $smu, $smu_unit, $utilization, $total_diesel, $ideal_fuel_consumption, $ideal_fuel_consumption_unit,
                        $actual_fuel_consumption, $actual_fuel_consumption_unit, $variance, $intime, $remaining_smu_hrs, $comment]);
                }
            }
            $data[$type->name] = $sub_data;
        }

        ob_end_clean();

        Excel::create('UPCOMING P.M REPORT', function ($excel) use ($data) {
            $excel->sheet("Report", function ($sheet) use ($data) {
                $sheet->loadView('exports.upcoming-pm-report')->with('data', $data);
            });
        })->download('xlsx');
    }

    public function upcomingRenewalReport()
    {
        $data = array();

        $renewals = Renewal::all();

        foreach ($renewals as $renewal) {
            $machinery = Machinery::where('reg_no', $renewal->reg_no)->first();

            $company = $machinery ? $machinery->company->name : '';
            $reg_no = $renewal->reg_no;

            if ($renewal->road_tax_last_renewal) {
                $road_tax = Carbon::parse($renewal->road_tax_last_renewal)->addMonthNoOverflow($renewal->road_tax_routine)->format('d-M-Y');
                $road_tax_variance = 0 - Carbon::now()->diffInDays(Carbon::parse($renewal->road_tax_last_renewal)->addMonthNoOverflow($renewal->road_tax_routine), false);
            } else {
                $road_tax = '-';
                $road_tax_variance = '-';
            }

            if ($renewal->insurance_last_renewal) {
                $insurance = Carbon::parse($renewal->insurance_last_renewal)->addMonthNoOverflow($renewal->insurance_routine)->format('d-M-Y');
                $insurance_variance = 0 - Carbon::now()->diffInDays(Carbon::parse($renewal->insurance_last_renewal)->addMonthNoOverflow($renewal->insurance_routine), false);
            } else {
                $insurance = '-';
                $insurance_variance = '-';
            }


            if ($renewal->puspakom_last_renewal) {
                $puspakom = Carbon::parse($renewal->puspakom_last_renewal)->addMonthNoOverflow($renewal->puspakom_routine)->format('d-M-Y');
                $puspakom_variance = 0 - Carbon::now()->diffInDays(Carbon::parse($renewal->puspakom_last_renewal)->addMonthNoOverflow($renewal->puspakom_routine), false);
            } else {
                $puspakom = '-';
                $puspakom_variance = '-';
            }

            array_push($data, [$company, $reg_no, $road_tax, $insurance, $puspakom, $road_tax_variance, $insurance_variance, $puspakom_variance]);
        }

        ob_end_clean();

        Excel::create('UPCOMING RENEWAL REPORT', function ($excel) use ($data) {
            $excel->sheet("Report", function ($sheet) use ($data) {
                $sheet->loadView('exports.upcoming-renewal-report')->with('data', $data);
            });
        })->download('xlsx');
    }

    public function expenseReport()
    {
        $data = array();

        $machineries = Machinery::all();

        $headers = [];
        $footers = [];

        foreach ($machineries as $machinery) {
            array_push($headers, $machinery->company->name . '<br/>' . $machinery->model->name . '<br/>' . $machinery->reg_no);
            array_push($footers, 0);
        }

        array_push($footers, 0, 'Litre', 0, 'Litre');

        ob_end_clean();

        $totalBalance = 300;

        $nowDate = Carbon::now();
        $daysInMonth = $nowDate->daysInMonth;

        $balanceInDay = $totalBalance;

        for ($i = 0; $i < $daysInMonth; $i++) {
            $rowData = array();

            array_push($rowData, '', $i);
            $date = Carbon::now()->setDate($nowDate->year, $nowDate->month, ($i + 1));

            $dieselUsedInDay = 0;
            foreach ($machineries as $key => $machinery) {
                $diesel = Diesel::where('reg_no', $machinery->reg_no)->first();

                if ($diesel) {
                    $dieselUsed = DieselItem::where('diesel_id', $diesel->id)->where('create_date', $date->format('Y-m-d'))->sum('litre');
                    $dieselUsedInDay += $dieselUsed;
                    $footers[$key] += $dieselUsed ? $dieselUsed : 0;
                    $footers[count($machineries)] += $dieselUsedInDay;

                    array_push($rowData, $dieselUsed ? $dieselUsed : '');
                } else {
                    array_push($rowData, '');
                }
            }

            $balanceInDay -= $dieselUsedInDay;
            array_push($rowData, $dieselUsedInDay, 'Litre', $balanceInDay, 'Litre');

            array_push($data, $rowData);
        }

        $footers[2 + count($machineries)] = $balanceInDay;

        Excel::create('EXPENSE REPORT', function ($excel) use ($data, $headers, $totalBalance, $footers) {
            $excel->sheet("Report", function ($sheet) use ($data, $headers, $totalBalance, $footers) {
                $sheet->loadView('exports.expense-report')->with('data', $data)->with('headers', $headers)
                    ->with('totalBalance', $totalBalance)->with('footers', $footers);
            });
        })->download('xlsx');
    }

    public function dieselUsageReport()
    {        
        $data = array();

        $dieselStocks = DieselStock::all();

        foreach ($dieselStocks as $dieselStock) {
            $date = Carbon::parse($dieselStock->create_time)->format('d/m/Y');
            $company = $dieselStock->supplier->company->name;
            $supplier = $dieselStock->supplier->name;
            $purchased = number_format($dieselStock->purchased, '2','.','');
            $actual = number_format($dieselStock->actual, '2','.','');
            $variance = number_format($dieselStock->variance, '2','.','');
            $before_diesel = $dieselStock->before_cm;
            $before_actual = $dieselStock->before_balance;
            $after_diesel = $dieselStock->after_cm;
            $after_actual = $dieselStock->after_balance;
            //$variance = random_int(10,100);
            $weight_bridge = 'N/A';
            $calculated = '-';
            $variance_of = '-';
            $from_miri_hq = 'N/A';

            array_push($data, [$date, $company, $supplier, $purchased, $actual, $variance, $before_diesel,
                $before_actual, $after_diesel, $after_actual, $variance, $weight_bridge, $calculated, $variance_of, $from_miri_hq]);
        }

        ob_end_clean();

        Excel::create('DIESEL.USAGE.REPORT', function ($excel) use ($data) {
            $excel->sheet("Report", function ($sheet) use ($data) {
                $sheet->loadView('exports.diesel-usage-report')->with('data', $data);
            });
        })->download('xlsx');
    }

    public function dieselStockReport()
    {        
        $data = array();

        ob_end_clean();

        Excel::create('DIESEL.STOCK.REPORT', function ($excel) use ($data) {
            $excel->sheet("Report", function ($sheet) use ($data) {
                $sheet->loadView('exports.diesel-stock-report')->with('data', $data);
            });
        })->download('xlsx');
    }
}
