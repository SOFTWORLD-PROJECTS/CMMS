<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Machinery extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    protected $appends = ['brand_name', 'type_name', 'model_name', 'company_name'];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function type()
    {
        return $this->belongsTo('App\Type');
    }

    public function model()
    {
        return $this->belongsTo('App\Model');
    }

    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    public function getBrandNameAttribute()
    {
        if ($this->brand)
            return $this->brand->name;
        else
            return "";
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

    public function getCompanyNameAttribute()
    {
        if ($this->company)
            return $this->company->name;
        else
            return "";
    }

    public function getPicture($number) {
        $machinePic = MachineryPic::where('machinery_id', $this->id)->where('number', $number)->first();

        if(empty($machinePic))
            return '';
        else
            return $machinePic->pic_url;
    }
}