<?php namespace App\Http\Controllers\User;


use App\Http\Controllers\Controller;
use App\Http\Requests\UploadRequest;
use App\Ideabook;
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
    public function PostFileUpload(/*UploadRequest $request*/)
    {
        $upload_to = Input::get('upload_to');
        $ok = true;
        $error = [];
        if (isset($_FILES)) {
            if ($upload_to == 'project') {
                if ($upload_to == 0) {
                }
            } else if ($upload_to == 'ideabook') {
                try {
                    $book_id = Input::get('ideabook');
                    if ($book_id == 0) {
                        $book_name = Input::get('ideabook_name');
                        $book = new Ideabook();
                        $book->user_id = $this->logged_user->id;
                        $book->name = $book_name;
                        $book->save();
                    } else {
                        $book = Ideabook::find($book_id);
                    }

                    $id = $book->id;

                } catch (\PDOException $e) {
                    $error[] = $e->getMessage();
                    $ok = false;
                }
            }
            if ($ok) {
                $file_upload_service = new FileUploadService($this->logged_user);
                $uploaded = $file_upload_service->upload($_FILES, $upload_to, $id);
                if ($uploaded->status == 'ok') {
                    $error[] = $uploaded;
                    $ok = false;
                }
            }
        } else {
            $error[] = 'Select files to upload';
            $ok = false;
        }
        $return = [];
        if ($ok) {
            $return['code'] = '100';
            $return['text'] = 'success';
        } else {
            $return['code'] = '300';
            $return['text'] = $error;
        }
        echo json_encode($return);
    }


}
