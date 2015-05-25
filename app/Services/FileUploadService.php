<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 5/19/2015
 * Time: 6:22 PM
 */

namespace App\Services;


use App\Eloquent\Book;
use App\Eloquent\Photo;
use App\Eloquent\Project;

class FileUploadService
{
    protected $logged_user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->logged_user = $user;
    }

    public function uploadProcess($request)
    {
        $upload_to = $request->get('upload_to');
        $files = $request->file('file');
        $ok = true;
        $error = [];

        if (count($files) > 0) {

            $id = $request->get($upload_to);

            try {
                if ($id == 0) {
                    $name = $request->get($upload_to . '_name');
                    $object = $upload_to == 'project' ? new Project() : new Book();
                    $object->user_id = $object->updated_by = $this->logged_user->id;
                    $object->name = $name;
                    $object->save();
                } else {
                    $object = $upload_to == 'project' ? Project::find($id) : Book::find($id);
                }
                $id = $object->id;

            } catch (\PDOException $e) {
                $error[] = $e->getMessage();
                $ok = false;
            }

            if ($ok) {

                try {

                    $file_directory = storage_path();
                    $file_directory .= DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->logged_user->id;
                    $file_directory .= DIRECTORY_SEPARATOR . $upload_to . DIRECTORY_SEPARATOR . $id;
                    $chk_dir = $this->checkDirectory($file_directory);

                    if ($chk_dir === true) {
                        foreach ($files as $file) {
                            die('part to store files');

                            $filename = $file->getClientOriginalName();
                            //$file->move($file_directory, $filename);

                            if($upload_to == 'project')
                            {
                                $photo = new Photo([
                                    'title' => $name,
                                    'file_name' => $filename,
                                    'category_id' => $request->get('category_id'),
                                    'style_id' => $request->get('style_id'),
                                    'country' => $request->get('country'),
                                    'state' => $request->get('state'),
                                    'city' => $request->get('city'),
                                    'zip' => $request->get('zip'),
                                    'url' => $request->get('url'),
                                    'keywords' => $request->get('keywords'),
                                    'description' => $request->get('description')
                                ]);
                                $object->photos()->save($photo);
                            }
                            else
                            {
                                $photo = Photo::create([
                                    'title' => $name,
                                    'filename' => $filename
                                ]);

                                $object->photos()->attach($photo->id);

                            }

                        }
                    } else {
                        $error[] = $chk_dir;
                        $ok = false;
                    }

                } catch (\Exception $e) {
                    $error[] = $e->getMessage();
                    $ok = false;
                }

            }
        } else {
            $error[] = trans('app.select_files_to_upload');
            $ok = false;
        }

        $result = [];
        if ($ok) {
            $result['code'] = '100';
            $result['text'] = 'success';
        } else {
            $result['code'] = '300';
            $result['text'] = $error;
        }
        return $result;

    }


    private function checkDirectory($directory)
    {
        try {
            $base_array = explode(DIRECTORY_SEPARATOR, base_path());
            $storage_array = explode(DIRECTORY_SEPARATOR, $directory);
            $chk_dir = '';
            foreach ($storage_array as $dir) {
                $chk_dir .= $dir . DIRECTORY_SEPARATOR;
                if (in_array($dir, $base_array)) continue;

                $temp_dir = trim($chk_dir, DIRECTORY_SEPARATOR);
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777, true);
                }
            }
            die('directory created...');
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        return true;

    }

}