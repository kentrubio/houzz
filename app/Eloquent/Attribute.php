<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 * @package App\Eloquent
 */
class Attribute extends Model {

    /**
     * @var string
     */
    protected $table = 'attributes';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photoTypes()
    {
        return $this->belongsToMany('App\Eloquent\PhotoType');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function data()
    {
        return $this->hasMany('App\Eloquent\AttributeData');
    }
}
