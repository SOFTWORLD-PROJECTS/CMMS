<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Renewal extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['last_update_name'];

    public function getLastUpdateNameAttribute()
    {
        if ($this->last_update_user)
            return $this->last_update_user->name;
        else
            return "";
    }

    public function last_update_user()
    {
        return $this->belongsTo('App\User', 'last_update_by');
    }

    public static function updateAllStatus()
    {
        $renewals = Renewal::where('status', '!=', 'complete')->get();

        $setting = Setting::first();

        $days = 0;

        if (empty($setting)) {
            $days = 30;
        } else {
            $days = $setting->renewal_days;
        }

        foreach ($renewals as $renewal) {
            if ($renewal->insurance_last_renewal) {
                $insuranceLastRenewalWithRoutine = Carbon::parse($renewal->insurance_last_renewal)->addMonthNoOverflow($renewal->insurance_routine);
                $daysInsuranceLeft = Carbon::now()->diffInDays($insuranceLastRenewalWithRoutine, false);
            } else {
                $daysInsuranceLeft = null;
            }

            if ($renewal->road_tax_last_renewal) {
                $roadTaxLastRenewalWithRoutine = Carbon::parse($renewal->road_tax_last_renewal)->addMonthNoOverflow($renewal->road_tax_routine);
                $daysRoadTaxLeft = Carbon::now()->diffInDays($roadTaxLastRenewalWithRoutine, false);
            } else {
                $daysRoadTaxLeft = null;
            }

            if ($renewal->puspakom_last_renewal) {
                $puspakomLastRenewalWithRoutine = Carbon::parse($renewal->puspakom_last_renewal)->addMonthNoOverflow($renewal->puspakom_routine);
                $daysPuspakomLeft = Carbon::now()->diffInDays($puspakomLastRenewalWithRoutine, false);
            } else {
                $daysPuspakomLeft = null;
            }


            $renewal->insurance_left = $daysInsuranceLeft;
            $renewal->road_tax_left = $daysRoadTaxLeft;
            $renewal->puspakom_left = $daysPuspakomLeft;

            if (($daysInsuranceLeft < $days && $daysInsuranceLeft > 0) || ($daysRoadTaxLeft < $days && $daysRoadTaxLeft > 0) || ($daysPuspakomLeft < $days && $daysPuspakomLeft > 0)) {
                $renewal->status = 'upcoming';
            }

            if ($daysRoadTaxLeft > $days && $daysInsuranceLeft > $days && $daysPuspakomLeft > $days) {
                $renewal->status = 'complete';
            }

            $renewal->save();
        }
    }

    public function updateStatus()
    {
        if ($this->insurance_last_renewal) {
            $insuranceLastRenewalWithRoutine = Carbon::parse($this->insurance_last_renewal)->addMonthNoOverflow($this->insurance_routine);
            $daysInsuranceLeft = Carbon::now()->diffInDays($insuranceLastRenewalWithRoutine, false);
        } else {
            $daysInsuranceLeft = null;
        }

        if ($this->road_tax_last_renewal) {
            $roadTaxLastRenewalWithRoutine = Carbon::parse($this->road_tax_last_renewal)->addMonthNoOverflow($this->road_tax_routine);
            $daysRoadTaxLeft = Carbon::now()->diffInDays($roadTaxLastRenewalWithRoutine, false);
        } else {
            $daysRoadTaxLeft = null;
        }

        if ($this->puspakom_last_renewal) {
            $puspakomLastRenewalWithRoutine = Carbon::parse($this->puspakom_last_renewal)->addMonthNoOverflow($this->puspakom_routine);
            $daysPuspakomLeft = Carbon::now()->diffInDays($puspakomLastRenewalWithRoutine, false);
        } else {
            $daysPuspakomLeft = null;
        }


        $this->insurance_left = $daysInsuranceLeft;
        $this->road_tax_left = $daysRoadTaxLeft;
        $this->puspakom_left = $daysPuspakomLeft;

        $setting = Setting::first();

        $days = 0;

        if (empty($setting)) {
            $days = 30;
        } else {
            $days = $setting->renewal_days;
        }

        if (($daysInsuranceLeft < $days && $daysInsuranceLeft > 0) || ($daysRoadTaxLeft < $days && $daysRoadTaxLeft > 0) || ($daysPuspakomLeft < $days && $daysPuspakomLeft > 0)) {
            $this->status = 'upcoming';
        }

        if ($daysRoadTaxLeft > $days && $daysInsuranceLeft > $days && $daysPuspakomLeft > $days) {
            $this->status = 'complete';
        }

        $this->save();
    }
}