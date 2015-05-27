<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Photo
 * @package App\Eloquent
 */
class Photo extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'photos';

    protected $fillable = ['title', 'filename'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Eloquent\User', 'id', 'user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function books()
    {
        return $this->belongsToMany('App\Eloquent\Book', 'book_photos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Eloquent\Project');
    }
}
