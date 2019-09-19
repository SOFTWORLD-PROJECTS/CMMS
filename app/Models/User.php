<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    public $timestamps = false;

    protected $guarded = [];

    protected $hidden = [
        'password', 'remember_token'
    ];

    protected $appends = [ 'job_name'];

    public function job()
    {
        return $this->belongsTo('App\Job');
    }

    public function getJobNameAttribute()
    {
        if ($this->job)
            return $this->job->position;
        else
            return "";
    }

    public function hasAccess($page, $mode) {
        $jobAccess = JobAccess::leftJoin("pages", "pages.id", "=", 'job_accesses.page_id')
        ->where('job_id', $this->job->id)->where('pages.module', $page)->first();
        if($jobAccess) {
            switch($mode) {
                case 'add' :
                    return $jobAccess->is_add > 0 ? true : false;
                case 'edit' :
                    return $jobAccess->is_edit > 0 ? true : false;
                case 'view' :
                    return $jobAccess->is_view > 0 ? true : false;
            }
        }else
        {
            return false;
        }
    }

    public function profile() {
        return $this->hasOne('App\Profile');
    }

    public function trail($module, $action, $reference = null) {
        AuditTrail::create([
            'date_time' => Carbon::now()->format('Y-m-d H:i:s'),
            'user' => $this->name,
            'level' => $this->job->position,
            'module' => $module,
            'action' => $action,
            'reference' => $reference ? $reference : $module . ' - ' . $action
            ]);
    }
}
