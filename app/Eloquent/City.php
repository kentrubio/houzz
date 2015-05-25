<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class City
 * @package App\Eloquent
 */
class City extends Model {

    /**
     * @var string
     */
    protected $table = 'cities';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'country_code', 'state_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Eloquent\Country', 'code', 'country_code');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo('App\Eloquent\State', 'code', 'state_code');
    }
}
