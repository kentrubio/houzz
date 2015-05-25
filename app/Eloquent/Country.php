<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package App\Eloquent
 */
class Country extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
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
