<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartsUse extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function workorder()
    {
        return $this->belongsTo('App\WorkOrder','work_order_id');
    }
}