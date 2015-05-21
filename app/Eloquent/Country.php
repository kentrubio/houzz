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

    protected $fillable = ['name', 'alpha_2_code', 'alpha_3_code', 'numeric_code', 'iso_3166_2'];
}
