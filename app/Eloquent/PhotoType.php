<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PhotoType
 * @package App\Eloquent
 */
class PhotoType extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photo_types';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function attributes()
    {
        return $this->belongsToMany('App\Eloquent\Attribute');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Eloquent\Photo');
    }

}
