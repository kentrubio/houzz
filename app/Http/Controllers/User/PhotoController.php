<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

class PhotoController extends Controller
{

    /**
     * Show the application welcome screen to the user.
     *
     * @Get("u/{username}/upload-photo")
     * @return Response
     */
    public function GetUploadPhoto($username)
    {
        dd($username);
        $this->data['page_title'] = 'Upload Photo';
        return $this->template('user.upload-photo');
    }
}
