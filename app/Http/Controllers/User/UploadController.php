<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Input;

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
    public function GetFileUpload()
    {
        $upload_to = 'ideabook';
        if ($this->logged_user->hasAccess('professional')) {
            $upload_to = 'project';
        }
        $this->data['upload_to'] = $upload_to;
        $this->data['projects'] = [];
        $this->data['ideabooks'] = [];
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Upload File';
        return $this->template('user.file-upload');
    }


    /**
     * @Post("file-upload")
     * @param UploadRequest $request
     * @return Response
     */
    public function PostFileUpload(UploadRequest $request)
    {
        $upload_to = Input::get('upload_to');
        $destination_id = 1;
        if ($upload_to == 'project') {
            if ($upload_to == 0) {
            }
        } else if ($upload_to == 'ideabook') {
            if ($upload_to == 0) {

            } else {

            }
        }
        if (isset($_FILES) && $destination_id > 0) {
            $file_upload_service = new FileUploadService($this->logged_user);
            $file_upload_service->upload($_FILES, $upload_to, $destination_id);
        }
    }


}
