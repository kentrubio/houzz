<?php namespace App\Http\Controllers\User;

use App\Eloquent\Book;
use App\Eloquent\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class BookController
 * @package App\Http\Controllers\User
 */
class BookController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     * @Get("book/{id}")
     * @param  int $id
     * @return Response
     */
    public function show(Request $request, $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @Get("/book/edit/{id}")
     * @param  int $id
     * @return Response
     */
    public function edit(Request $request, $id)
    {
        //
        $photos = [];
        if ($request->has('photo'))
        {
            $photos = explode(',', $request->get('photo'));
        }
        //$book = Book::whereUserId($this->logged_user->id)->whereId($id)->with('photos')->first();
        $book = Book::whereUserId($this->logged_user->id)->whereId($id)->first();

        //TODO: master Alex please make this eloquent

        $photo = DB::table('photos');
        $photo->leftJoin('book_photos', 'book_photos.photo_id', '=', 'photos.id');
        $photo->where('book_photos.book_id', $id);
        $edit_book = true;
        if (count($photos) > 0)
        {
            $photo->whereIn('photos.id', $photos);
            $edit_book = false;
        }
        $photo = $photo->get();

        if ( ! $book)
        {
            return Response::make('errors.404', 404);
        }
        $directory = '/uploads/' . $this->logged_user->id . '/book/' . $book->id;
        $this->data['directory'] = $directory;
        $this->data['edit_book'] = $edit_book;
        $this->data['book'] = $book;
        $this->data['photos'] = $photo;
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Edit Book';

        return $this->template('user.edit-book');
    }

    /**
     * Update the specified resource in storage.
     * @Post("book/update")
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        //
        $book_id = $request->get('book_id');

        if ($request->has('book'))
        {
            $book_attributes = $request->get('book');
            $book = Book::find($book_id);
            $book->fill($book_attributes);
            $book->save();
        }
        if ($request->has('photos'))
        {
            $photos = $request->get('photos');

            foreach ($photos as $id => $attributes)
            {
                $photo = Photo::find($id);
                $photo->fill($attributes);
                $photo->save();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

}
