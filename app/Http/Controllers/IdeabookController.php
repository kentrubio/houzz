<?php namespace App\Http\Controllers;

 use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\EditIdeabookRequest;
use App\Ideabook;
use Illuminate\Http\Request;

class IdeabookController extends Controller {

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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

    /**
     * Show the form for editing the specified resource.
     * @Get("edit-ideabook")
     * @param  int $id
     * @param EditIdeabookRequest $request
     * @return Response
     */
	public function edit($id, EditIdeabookRequest $request)
	{
		//
        $images = base64_decode($request->get('images'));
        $book = Ideabook::find($id)->whereUserId($this->logged_user->id)->first();
        if(!$book){
            App::abort(404);
        }


	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
