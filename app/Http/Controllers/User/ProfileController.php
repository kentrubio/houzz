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
     * Show
     * @Get("u/{username}/edit")
     */
    public function edit($username)
    {

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
        dd('test');
        $this->data['page_title'] = 'Upload Photo';

        return $this->template('user.upload-photo');
    }
}