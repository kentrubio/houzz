<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;

/**
 * Class UploadController
 * @package App\Http\Controllers\User
 * @Middleware("auth")
 */
class UploadController extends Controller
{

    /**
     * @Get("file-upload")
     */
    public function GetUploadPhoto()
    {
        $upload_to = 'gallery';
        if($this->logged_user->hasAccess('professional'))
        {
            $upload_to = 'project';
        }
        $this->data['upload_to'] = $upload_to;
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Upload File';
        return $this->template('user.file-upload');
    }


    /**
     * @Post("file-upload")
     * @param UploadRequest $request
     * @return Response
     */
    public function PostUploadPhoto(UploadRequest $request)
    {
        $destination_id = 0;
        if($request->get('upload_to') == 'project')
        {
            if($request->get('project') == 0)
            {

            }
        }
        else if($request->get('upload_to') == 'ideabook')
        {
            if($request->get('gallery') == 0)
            {

            }
            else
            {
            }
        }

        if(isset($_FILES) && $destination_id > 0){
            $file_directory = storage_path();
            $file_directory .= DIRECTORY_SEPARATOR.files.DIRECTORY_SEPARATOR.$this->logged_user->id;
            $file_directory .= DIRECTORY_SEPARATOR.$request->get('upload_to').DIRECTORY_SEPARATOR.$destination_id;
            if($this->checkIfDirectoryExists($file_directory))
            {

            }
        }
    }

    private function checkIfDirectoryExists($directory)
    {
        return false;
    }

}
