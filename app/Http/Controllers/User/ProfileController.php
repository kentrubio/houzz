<?php namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

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
        $this->data['page_title'] = "Edit Your Profile";

        return $this->template('user.edit-profile');
    }

    /**
     * @Get("u/{username}")
     *
     * @param $username
     *
     * @return \Illuminate\View\View
     */
    public function show($username)
    {
        $this->data['page_title'] = 'Upload ';

        return $this->template('user.upload-photo');
    }
}