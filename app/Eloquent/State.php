<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * @package App\Eloquent
 */
class State extends Model {

    /**
     * @var string
     */
    protected $table = 'states';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = ['name', 'code', 'country_code'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
        return $this->belongsTo('App\Eloquent\Country', 'country_code', 'code');
    }
}
