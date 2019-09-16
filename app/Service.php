<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function workorder()
    {
        return $this->belongsTo('App\WorkOrder','work_order_id');
    }
}