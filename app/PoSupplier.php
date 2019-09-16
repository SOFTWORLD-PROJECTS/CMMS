<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PoSupplier extends Model
{
    public $table = 'po_supplier';

    protected $guarded = [];

    public $timestamps = false;

    public function company()
    {
        return $this->belongsTo('App\Company');
    }
}