<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function job_access($job_id)
    {
        return JobAccess::where('page_id', $this->id)->where('job_id', $job_id)->first();
    }
}