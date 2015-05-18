<?php namespace App\Http\Controllers\User;

use App\Eloquent\User;
use App\Http\Controllers\Controller;
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
     * @Get("@{username}/edit")
     */
    public function edit($username)
    {
        $user = User::whereUsername($username)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['page_title'] = "Edit Your Profile";

        return $this->template('user.edit-profile');
    }

    /**
     * @Get("@{username}")
     *
     * @param $username
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        return $user->toJson();

        $this->data['page_title'] = 'Upload ';

        return $this->template('user.upload-photo');
    }
}