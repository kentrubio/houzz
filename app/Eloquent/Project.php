<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {

	//
    protected $table = 'projects';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Eloquent\User', 'id', 'user_id');
    }


}
