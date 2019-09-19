<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrder extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['type_name', 'model_name', 'last_update_name'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function last_update_user()
    {
        return $this->belongsTo('App\User', 'last_update_by');
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

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function premaintenance()
    {
        return $this->hasOne('App\Premaintenance', 'id', 'pre_maintenance_id');
    }

    function updateStatus()
    {
        $serviceCount = $this->services->count();

        if ($serviceCount == 0) {
            $this->status = 'new';
            $this->save();
        } else {
            $completeServiceCount = $this->services->where('status', 'complete')->count();

            if($completeServiceCount == 0) {
                $this->status = 'new';
                $this->save();
            }else{
                if ($serviceCount == $completeServiceCount) {
                    $this->status = 'complete';
                    $this->save();
                } else {
                    $this->status = 'waiting';
                    $this->save();
                }

                if($this->premaintenance) {
                    $this->premaintenance->status = 'servicing';
                    $this->premaintenance->save();
                }
            }
        }
    }
}