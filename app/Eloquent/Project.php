<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'projects';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Eloquent\User', 'id', 'user_id');
    }


}
