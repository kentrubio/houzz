<?php namespace App\Http\Controllers\User;

use App\Eloquent\Project;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller {

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
     * @Get("/project/edit/{id}")
     * @param Request $request
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
        $project = Project::whereUserId($this->logged_user->id)->whereId($id)->first();

        //TODO: master Alex please make this eloquent

        $photo = DB::table('photos');
        $photo->where('project_id', $id);
        $edit_project = true;

        if (count($photos) > 0)
        {
            $photo->whereIn('id', $photos);
            $edit_project = false;
        }
        $photo = $photo->get();

        if ( ! $project)
        {
            return Response::make('errors.404', 404);
        }

        $directory = '/uploads/' . $this->logged_user->id . '/project/' . $id;
        $this->data['directory'] = $directory;
        $this->data['edit_project'] = $edit_project;
        $this->data['project'] = $project;
        $this->data['photos'] = $photo;
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Edit Project';

        return $this->template('user.edit-project');
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
