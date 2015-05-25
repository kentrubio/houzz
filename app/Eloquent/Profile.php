<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Profile
 * @package App\Eloquent
 */
class Profile extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'profiles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['about_me', 'my_favorite_style', 'my_next_project'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->belongsTo('App\Eloquent\User', 'id', 'user_id');
    }
}
