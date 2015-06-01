<?php namespace App\Http\Controllers\User;

use App\Eloquent\Profile;
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
     * @Get("/profile/edit")
     */
    public function edit()
    {
        $user = User::with('profile')->whereId($this->logged_user->id)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['user'] = $user;
        $this->data['page_title'] = trans('app.edit_your_profile');

        return $this->template('user.edit-profile');
    }

    /**
     * Post function for Edit User's profile
     *
     * @Patch("/profile")
     */
    public function postEdit()
    {
        $user = User::with('profile')->whereId(Input::get('id'))->first();

        $profile_input = Input::get('profile');

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        // No profile information yet? We'll create it for you.
        if (is_null($user->profile))
        {
            $profile = new Profile;

            $profile->fill($profile_input);

            $user->profile()->save($profile);
        }
        else
        {
            $user->profile->about_me = $profile_input['about_me'];
            $user->profile->my_favorite_style = $profile_input['my_favorite_style'];
            $user->profile->my_next_project = $profile_input['my_next_project'];

            $user->profile->save();
        }

        $user->update(Input::all());

        return redirect('/profile/edit')->with('success', trans('app.success_update_message'));
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

        $this->data['user'] = $user;
        $this->data['page_title'] = trans('app.my_profile');

        return $this->template('user.show-profile');
    }
}