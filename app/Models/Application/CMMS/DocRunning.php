<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocRunning extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public static function getNextNumber($type)
    {
        $doc = Docrunning::where('type', $type)->first();

        if (empty($doc)) {
            $doc = Docrunning::create(['type' => $type, 'prefix' => $type, 'next_number' => 1, 'digit_number' => 5]);
        }

        return $doc->prefix . sprintf('%0' . $doc->digit_number . 'd', $doc->next_number);
    }

    public static function increaseNumber($type)
    {
        $doc = Docrunning::where('type', $type)->first();
        $doc->next_number = $doc->next_number + 1;
        $doc->save();
    }
}