<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'books';

    protected $fillable = ['name', 'description', 'updated_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Eloquent\User');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->belongsToMany('App\Eloquent\Photo', 'book_photos');

    }



}
