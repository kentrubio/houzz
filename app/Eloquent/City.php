<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class City extends Model {

    //
    protected $table = 'cities';

    public $timestamps = false;

    protected $fillable = [
        'locode',
        'name',
        'name_wo_diacritics',
        'sub_div',
        'function',
        'status',
        'date',
        'iata',
        'coordinates',
        'remarks'
    ];
}
