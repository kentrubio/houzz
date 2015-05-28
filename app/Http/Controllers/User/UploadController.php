<?php namespace App\Http\Controllers\User;


use App\Eloquent\Book;
use App\Eloquent\Project;
use App\Http\Controllers\Controller;
use App\Services\FileUploadService;
use Illuminate\Http\Request;

/**
 * Class UploadController
 * @package App\Http\Controllers\User
 * @Middleware("auth")
 */
class UploadController extends Controller {

    /**
     * @Get("/file-upload")
     * @param null $upload_to
     * @param null $id
     * @return \Illuminate\View\View
     */
    public function GetFileUpload($upload_to = null, $id = null)
    {
        if ($upload_to == null)
        {
            $upload_to = 'book';
            if ($this->logged_user->hasAccess('professional'))
            {
                $upload_to = 'project';
            }
        }
        $this->data['selected_id'] = $id;
        $this->data['upload_to'] = $upload_to;
        $this->data['projects'] = Project::whereUserId($this->logged_user->id)->get();
        $this->data['books'] = Book::whereUserId($this->logged_user->id)->get();
        $this->data['no_nav'] = true;
        $this->data['page_title'] = 'Upload File';

        return $this->template('user.file-upload');
    }


    /**
     * @Post("/file-upload")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        $file_upload_service = new FileUploadService($this->logged_user);
        $result = $file_upload_service->uploadProcess($request);
        if ($request->ajax())
        {
            return response()->json($result);
        }
    }


}
