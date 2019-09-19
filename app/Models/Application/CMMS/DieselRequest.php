<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DieselRequest extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = [ 'last_update_name'];

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

    public function supplier()
    {
        return $this->belongsTo('App\PoSupplier', 'supplier_id');
    }
}