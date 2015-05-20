<?php
/**
 * Created by PhpStorm.
 * User: alex
 * Date: 5/19/2015
 * Time: 6:22 PM
 */

namespace App\Services;


use Illuminate\Support\Facades\Storage;

class FileUploadService
{
    protected $looged_user;

    /**
     * @param $user
     */
    public function __construct($user)
    {
        $this->looged_user = $user;
    }

    public function upload($files, $upload_to = '', $destination_id = 0)
    {
        $response = new \stdClass();
        $file_directory = storage_path();
        $file_directory .= DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $this->looged_user->id;
        $file_directory .= DIRECTORY_SEPARATOR . $upload_to . DIRECTORY_SEPARATOR . $destination_id;
        if ($this->checkDirectory($file_directory)) {
            $count = 0;
            foreach ($files['file']['name'] as $file_name) {
                try {
                    move_uploaded_file($files['file']['tmp_name'][$count], $file_directory . DIRECTORY_SEPARATOR . basename($file_name));
                } catch (\Exception $e) {
                    $response->status = 'error';
                    $response->message = $e->getMessage();
                    break;
                }
                $count++;

            }
            $response->status = 'ok';
        }
        else
        {
            $response->status = 'error';
            $response->message = trans('app.directory_not_found');
        }
        return $response;
    }

    private function checkDirectory($directory)
    {
        try {
            $base_array = explode(DIRECTORY_SEPARATOR, base_path());
            $storage_array = explode(DIRECTORY_SEPARATOR, $directory);
            $chkdir = '';
            foreach ($storage_array as $dir) {
                $chkdir .= $dir . DIRECTORY_SEPARATOR;
                if (in_array($dir, $base_array)) continue;

                $temp_dir = trim($chkdir, DIRECTORY_SEPARATOR);
                if (!is_dir($temp_dir)) {
                    mkdir($temp_dir, 0777, true);
                }
            }
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }

        return true;

    }

}