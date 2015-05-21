<?php namespace App\Http\Controllers\User;

use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class ProfileController
 * @package App\Http\Controllers\User
 *
 * @Middleware("auth")
 */
class ProfileController extends Controller {

    /**
     * Edit User's profile
     *
     * @Get("/edit-profile")
     */
    public function edit()
    {
        $user = $this->logged_user;

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['page_title'] = trans('app.edit_your_profile');

        return $this->template('user.edit-profile');
    }

    /**
     * Post function for Edit User's profile
     *
     * @Patch("/edit-profile")
     */
    public function postEdit()
    {
        $user = User::whereId(Input::get('id'))->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $user->update(Input::all());

        return redirect('/edit-profile')->with('success', trans('app.success_update_message'));
    }

    /**
     * @Get("@{username}")
     *
     * @param $username
     * @return \Illuminate\View\View
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['page_title'] =  trans('app.my_profile');

        return $this->template('user.show-profile');
    }
}