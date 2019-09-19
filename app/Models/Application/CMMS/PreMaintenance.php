<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreMaintenance extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['brand_name', 'type_name', 'model_name', 'last_update_name'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function getBrandNameAttribute()
    {
        if ($this->brand)
            return $this->brand->name;
        else
            return "";
    }

    public function getTypeNameAttribute()
    {
        if ($this->type)
            return $this->type->name;
        else
            return "";
    }

    public function getModelNameAttribute()
    {
        if ($this->model)
            return $this->model->name;
        else
            return "";
    }

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

    function updateStatus()
    {
        $setting = Setting::first();

        if (empty($setting)) {
            $limitArray = ['km' => 100, 'date' => 1, 'hour' => 50];
        } else {
            $limitArray = ['km' => $setting->pm_km, 'date' => $setting->pm_date, 'hour' => $setting->pm_hour];
        }

        if ($this->routine_service - $this->current < $limitArray[$this->service_unit]) {
            $this->status = 'upcoming';
            $this->save();
        }
    }
}