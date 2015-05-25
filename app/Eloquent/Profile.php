<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App\Eloquent
 */
class Profile extends Model {

    /**
     * @var string
     */
    protected $table = 'profiles';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Eloquent\User', 'id', 'user_id');
    }
}
