<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
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
}