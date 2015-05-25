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

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['code', 'name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function states()
    {
        return $this->hasMany('App\Eloquent\State', 'country_code', 'code');
    }
}
