<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkOrderPic extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['delete_url'];

    public function getDeleteUrlAttribute()
    {
        return route('workorder.picture.delete', ['id' => $this->id]);
    }
}