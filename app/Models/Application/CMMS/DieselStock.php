<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DieselStock extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = [ 'last_update_name', 'supplier_name'];

    public function supplier()
    {
        return $this->belongsTo('App\PoSupplier');
    }

    public function getSupplierNameAttribute()
    {
        if ($this->supplier)
            return $this->supplier->name;
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