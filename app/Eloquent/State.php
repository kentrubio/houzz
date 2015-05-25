<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class State
 * @package App\Eloquent
 */
class State extends Model {

    use HasPlaceholder;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'states';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
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
