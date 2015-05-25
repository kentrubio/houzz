<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Attribute
 * @package App\Eloquent
 */
class AttributeData extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'attribute_data';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function attribute()
    {
        return $this->belongsTo('App\Eloquent\Attribute');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function photos()
    {
        return $this->belongsToMany('App\Eloquent\Photo');
    }
}
