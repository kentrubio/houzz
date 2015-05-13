<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * @package App\Eloquent
 */
class Photo extends Model {

    /**
     * @var string
     */
    protected $table = 'photos';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Eloquent\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function type()
    {
        return $this->hasOne('App\Eloquent\PhotoType', 'id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributeData()
    {
        return $this->belongsToMany('App\Eloquent\AttributeData');
    }
}
