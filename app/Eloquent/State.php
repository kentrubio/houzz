<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class State extends Model {

	//
    protected $table = 'states';

    public $timestamps = false;

    protected $fillable = ['country', 'subdivision', 'name', 'level'];}
