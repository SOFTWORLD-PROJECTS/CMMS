<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Carbon\Carbon;

use Auth;
use App\DocRunning;
use App\Job;
use App\JobAccess;
use App\User;
use App\Page;
use App\Profile;
use App\AuditTrail;
use App\Backup;
use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('setting-profile', compact('user'));
    }

    public function saveProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'company_name' => 'required',
            'co_reg_no' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'fax' => 'required',
            'email' => 'required',
            'website' => 'required',
            'category' => 'required'
        ]);

        $profile = $user->profile;

        $data = $request->only(['company_name', 'co_reg_no', 'address', 'contact', 'fax', 'website', 'category']);

        if ($request->hasFile('avatar')) {
            $avatar = $request->avatar;
            $avatar_new_name = time() . $avatar->getClientOriginalName();
            $avatar->move('uploads/user/', $avatar_new_name);
            $avatar_url = 'uploads/user/' . $avatar_new_name;
            $data['avatar'] = $avatar_url;
        }

        if (empty($profile)) {
            $data['user_id'] = $user->id;
            Profile::create($data);
        } else {
            $profile->fill($data);
            $profile->save();
        }

        $user->email = $request->email;
        $user->save();

        return redirect()->route('setting.profile');

    }

    public function usermaintain()
    {
        return view('setting-usermaintain');
    }

    public function docrunning()
    {
        $machinery = DocRunning::where('type', 'machinery')->first();
        $workorder = DocRunning::where('type', 'workorder')->first();
//        $record = DocRunning::where('type', 'record')->first();
//        $renewal = DocRunning::where('type', 'renewal')->first();
//        $diesel = DocRunning::where('type', 'diesel')->first();
//        $premaintenance = DocRunning::where('type', 'premaintenance')->first();

        return view('setting-docrunning', compact('machinery', 'workorder'));//, 'record', 'renewal', 'diesel', 'premaintenance'));
    }

    public function saveDocrunning(Request $request)
    {
        $this->validate($request, [
            'machinery.*' => 'required',
            'workorder.*' => 'required',
            'record.*' => 'required',
            'renewal.*' => 'required',
            'premaintenance.*' => 'required',
            'diesel.*' => 'required'
        ]);

        $machinery = $request->machinery;
        $machinery['type'] = 'machinery';
        DocRunning::updateOrCreate(['type' => 'machinery'], $machinery);

        $workorder = $request->workorder;
        $workorder['type'] = 'workorder';
        DocRunning::updateOrCreate(['type' => 'workorder'], $workorder);

//        $record = $request->record;
//        $record['type'] = 'record';
//        DocRunning::updateOrCreate(['type' => 'record'], $record);
//
//        $renewal = $request->renewal;
//        $renewal['type'] = 'renewal';
//        DocRunning::updateOrCreate(['type' => 'renewal'], $renewal);
//
//        $diesel = $request->diesel;
//        $diesel['type'] = 'diesel';
//        DocRunning::updateOrCreate(['type' => 'diesel'], $diesel);
//
//        $premaintenance = $request->premaintenance;
//        $premaintenance['type'] = 'premaintenance';
//        DocRunning::updateOrCreate(['type' => 'premaintenance'], $premaintenance);

        Auth::user()->trail('setting', 'docrunning save', 'docrunning save');

        return redirect()->route('setting.docrunning');
    }

    public function jobtitle()
    {
        return view('setting-jobtitle');
    }

    public function createJobTitle(Request $request)
    {
        $this->validate($request, [
            'position' => 'required',
            'description' => 'required',
        ]);

        $data = $request->only(['position', 'description']);

        Job::create($data);

        Auth::user()->trail('setting', 'jobtitle save', 'jobtitle save');

        return redirect()->route('setting.jobtitle');
    }

    public function editJobTitle($id)
    {
        $job = Job::find($id);

        return view('setting-jobtitle', compact('job'));
    }

    public function deleteJobTitle($id)
    {
        $request = DieselRequest::find($id);
        $request->delete();

        Auth::user()->trail('setting', 'jobtitle delete', 'jobtitle delete');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function updateJobTitle(Request $request)
    {
        $this->validate($request, [
            'position' => 'required',
            'description' => 'required',
        ]);

        $Job = Job::find($request->id);
        $data = $request->only(['position', 'description']);
        $Job->update($data);

        Auth::user()->trail('setting', 'jobtitle edit', 'jobtitle edit');

        return redirect()->route('setting.jobtitle');
    }

    public function jobtitledata(Request $request)
    {
        $jobs = Job::where('position', 'like', '%' . $request->position . '%')
            ->where('description', 'like', '%' . $request->description . '%');

        $jobs = $jobs->get();

        return DataTables::of($jobs)
            ->addColumn('actions', function ($job) {
                $actions = '<a href="' . route('setting.jobtitle.edit', ['id' => $job->id]) . '" class="btn btn-sm white"><i class="fa fa-pencil"></i></a>';
                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function useraccess(Request $request)
    {
        $pages = Page::all();
        $jobs = Job::all();

        if ($request->has('job')) {
            $job = Job::find($request->job);
        } else {
            if (count($jobs) > 0)
                $job = $jobs[0];
            else
                $job = null;
        }

        return view('setting-useraccess', compact('pages', 'jobs', 'job'));
    }

    public function useraccessCreate(Request $request)
    {
        $this->validate($request, [
            'job' => 'required'
        ]);

        if ($request->has('job_access')) {
            JobAccess::where('job_id', $request->job)->delete();

            foreach ($request->job_access as $key => $job_access) {
                $jobAccess = JobAccess::updateOrCreate(['page_id' => $key, 'job_id' => $request->job]);
                $jobAccess->update([
                    'is_edit' => isset($job_access['is_edit']) ? $job_access['is_edit'] : 0,
                    'is_add' => isset($job_access['is_add']) ? $job_access['is_add'] : 0,
                    'is_view' => isset($job_access['is_view']) ? $job_access['is_view'] : 0
                ]);
            }
        }

        Auth::user()->trail('setting', 'useraccess add', 'useraccess add');

        return redirect()->route('setting.useraccess', ['job' => $request->job]);
    }

    public function usermanage()
    {
        return view('setting-usermanage');
    }

    public function addUserManage()
    {
        $jobs = Job::all();
        return view('setting-usermanage-add', compact('jobs'));
    }

    public function createUserManage(Request $request)
    {
        $this->validate($request, [
            'position' => 'required',
            'name' => 'required',
            'password' => 'required',
            'department' => 'required',
            'status' => 'required',
            'email' => 'required|email|unique:users',
        ]);

        $data = $request->only(['name', 'department', 'email']);

        $data['u_status'] = $request->status;
        $data['password'] = bcrypt($request->password);
        $data['job_id'] = $request->position;

        User::create($data);

        Auth::user()->trail('setting', 'usermanage add', 'usermanage add');

        return redirect()->route('setting.usermanage');
    }

    public function editUserManage($id)
    {
        $jobs = Job::all();
        $user = User::find($id);

        return view('setting-usermanage-edit', compact('user', 'jobs'));
    }

    public function deleteUserManage($id)
    {
        $request = DieselRequest::find($id);
        $request->delete();

        Auth::user()->trail('setting', 'usermanage delete', 'usermanage delete');

        return redirect()->route('diesal', ['type' => 'request']);
    }

    public function updateUserManage(Request $request)
    {
        $this->validate($request, [
            'position' => 'required',
            'name' => 'required',
            'department' => 'required',
            'status' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($request->id);
        $data = $request->only(['name', 'department', 'email']);
        if ($request->password != '')
            $data['password'] = bcrypt($request->password);
        $data['u_status'] = $request->status;
        $data['job_id'] = $request->position;

        $user->update($data);

        Auth::user()->trail('setting', 'usermanage edit', 'usermanage edit');

        return redirect()->route('setting.usermanage');
    }

    public function usermanagedata(Request $request)
    {
        $users = User::leftJoin("jobs", "jobs.id", "=", 'users.job_id')
            ->where('name', 'like', '%' . $request->name . '%')
            ->where('department', 'like', '%' . $request->department . '%')
            ->where('email', 'like', '%' . $request->email . '%')
            ->where('u_status', 'like', '%' . $request->status . '%');

        if ($request->has('position'))
            $users = $users->where('jobs.position', 'like', '%' . $request->position . '%');

        $users = $users->get(['users.*']);

        return DataTables::of($users)
            ->addColumn('actions', function ($user) {
                $actions = '';

                if (Auth::user()->hasAccess('setting', 'edit')) {
                    $actions = '<a href="' . route('setting.usermanage.edit', ['id' => $user->id]) . '" class="btn btn-xs white"><i class="fa fa-pencil"></i></a>';
//                    '<a href="' . route('setting.usermanage.delete', ['id' => $user->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function preset()
    {
        return view('setting-preset');
    }

    public function pmrenewal()
    {
        $setting = Setting::first();

        return view('setting-pmrenewal', compact('setting'));
    }

    public function savePmRenewal(Request $request)
    {
        $this->validate($request, [
            'pm_km' => 'required|numeric|min:0',
            'pm_hour' => 'required|numeric|min:0',
            'pm_date' => 'required|numeric|min:0',
            'renewal_days' => 'required|numeric|min:0',
            'current_balance' => 'required|numeric|min:0'
        ]);

        $setting = Setting::first();

        if (empty($setting)) {
            Setting::create($request->all());
        } else {
            $setting->update($request->all());
        }

        return redirect()->route('setting.pm-renewal');
    }


    public function backuprestore()
    {
        return view('setting-backuprestore');
    }

    public function addBackupRestore()
    {
        return view('setting-backuprestore-add');
    }

    public function createBackupRestore(Request $request)
    {
        $this->validate($request, [
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file;
            $file_new_name = time() . $file->getClientOriginalName();
            $file->move('uploads/backup/', $file_new_name);
            $file_url = 'uploads/backup/' . $file_new_name;


            Backup::create([
                'create_time' => Carbon::now()->format('Y-m-d H:i:s'),
                'name' => $file->getClientOriginalName(),
                'url' => $file_url
            ]);
        }

        Auth::user()->trail('setting', 'backup restore add', 'backup restore add');

        return redirect()->route('setting.backuprestore');
    }

    public function deleteBackupRestore($id)
    {
        $backup = Backup::find($id);
        $backup->delete();

        Auth::user()->trail('setting', 'backup restore delete', 'backup restore delete');

        return redirect()->route('setting.backuprestore');
    }

    public function audittrail()
    {
        return view('setting-audittrail');
    }

    public function deleteAuditTrail($id)
    {
        $auditTrail = AuditTrail::find($id);
        $auditTrail->delete();

        Auth::user()->trail('setting', 'audittrail delete', 'audittrail delete');

        return redirect()->route('setting.audittrail');
    }

    public function audittraildata(Request $request)
    {
        $auditTrails = AuditTrail::where('date_time', 'like', '%' . $request->date_time . '%')
            ->where('user', 'like', '%' . $request->user . '%')
            ->where('level', 'like', '%' . $request->level . '%')
            ->where('module', 'like', '%' . $request->module . '%')
            ->where('action', 'like', '%' . $request->action . '%')
            ->where('reference', 'like', '%' . $request->reference . '%');

        if ($request->date_from != '') {
            $auditTrails = $auditTrails->where('date_time', '>=', $request->date_from);
        }

        if ($request->date_to != '') {
            $auditTrails = $auditTrails->where('date_time', '<=', $request->date_to);
        }

        return DataTables::of($auditTrails)
            ->addColumn('actions', function ($auditTrail) {
                $actions = '';

                if (Auth::user()->hasAccess('setting', 'edit')) {
                    $actions = '<a href="' . route('setting.audittrail.delete', ['id' => $auditTrail->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }

    public function backuprestoredata(Request $request)
    {
        $backups = Backup::where('name', 'like', '%' . $request->name . '%')
            ->where('create_time', 'like', '%' . $request->create_time . '%');

        return DataTables::of($backups)
            ->addColumn('actions', function ($backup) {
                $actions = '';

                if (Auth::user()->hasAccess('setting', 'edit')) {
                    $actions = '<a href="' . route('setting.backuprestore.delete', ['id' => $backup->id]) . '" class="btn btn-xs white"><i class="fa fa-trash"></i></a>';
                }

                return $actions;
            })
            ->rawColumns(['actions'])
            ->make(true);
    }
}
