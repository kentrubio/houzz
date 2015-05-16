<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;

/**
 * Class PhotoController
 * @package App\Http\Controllers\User
 * @Middleware("auth")
 */
class PhotoController extends Controller
{

    /**
     * @Get("file-upload")
     * @return Response
     */
    public function GetUploadPhoto()
    {
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Upload Photo';
        return $this->template('user.upload-photo');
    }

    /**
     * @Post("upload-photo")
     * @return Response
     */
    public function PostUploadPhoto()
    {
        $this->data['page_title'] = 'Upload Photo';
        return $this->template('user.upload-photo');
    }
}
