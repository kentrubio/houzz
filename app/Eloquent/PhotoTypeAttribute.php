<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PhotoTypeAttribute
 * @package App\Eloquent
 */
class PhotoTypeAttribute extends Model {

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $table = 'attribute_photo_type';

}
