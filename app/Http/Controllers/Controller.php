<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController
{

    use DispatchesCommands, ValidatesRequests;

    /**
     * @var
     */
    public $logged_user;

    /**
     * @var array
     */
    public $data = [];

    /**
     * @var Sentry
     */
    public $auth;

    /**
     * @param Sentry $auth
     */
    public function __construct(Sentry $auth)
    {
        header('Expires: Thu, 19 Nov 1981 08:52:00 GMT');
        header('Cache-Control: no-store, no-cache, must-revalidate');

        $this->auth = $auth;

        if ($auth::check()) {
            $this->data['logged_user'] = $this->logged_user = $this->auth = $auth::getUser();
        }
        $this->data['language'] = env('LANGUAGE','en');
        $this->date['page_title'] = 'Untitled';
    }

    private function getPageJS($script_name)
    {
        $script_name = 'js'.DIRECTORY_SEPARATOR.$script_name.'.js';
        $path = base_path().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.$script_name;
        if(file_exists($path))
        {
            return asset($script_name);
        }
        return false;
    }

    private function getPageCSS($script_name)
    {
        $script_name = 'css'.DIRECTORY_SEPARATOR.$script_name.'.css';
        $path = base_path().DIRECTORY_SEPARATOR.'resources'.DIRECTORY_SEPARATOR.$script_name;
        if(file_exists($path))
        {
            return asset($script_name);
        }
        return false;
    }

    /**
     * @param $file
     */
    protected function _getScript($file)
    {
        $base_file = basename($file);
        $array = explode(DIRECTORY_SEPARATOR, $file);
        $script = [];
        $found = false;
        foreach ($array as $value) {
            if ($found) {
                if ($value == $base_file)
                    $value = str_replace('controller.php', '', strtolower($value));

                $script[] = $value;
            }
            if (strtolower($value) == 'controllers') $found = true;
        }

        $script_name = implode(DIRECTORY_SEPARATOR, $script);
        $page_js = $this->getPageJS($script_name);
        $page_css = $this->getPageCSS($script_name);

        if (!empty($page_js))
            $this->data['page_js'] = $page_js;

        if (!empty($page_css))
            $this->data['page_css'] = $page_css;
    }

    /**
     * @param $blade
     * @return \Illuminate\View\View
     */
    public function template($blade)
    {
        return view($blade, $this->data);
    }

}
