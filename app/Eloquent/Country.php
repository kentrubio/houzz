<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Eloquent
 */
class Country extends Model {

    /**
     * @var string
     */
    protected $table = 'countries';

    public $timestamps = false;

    protected $fillable = ['code', 'name'];
}
