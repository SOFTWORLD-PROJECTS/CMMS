<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diesel extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['type_name', 'last_update_name'];

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function getTypeNameAttribute()
    {
        if ($this->type)
            return $this->type->name;
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

    public function items()
    {
        return $this->hasMany('App\DieselItem');
    }
}