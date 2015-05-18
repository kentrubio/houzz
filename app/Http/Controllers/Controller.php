<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
abstract class Controller extends BaseController {

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

        if ($auth::check())
        {
            $this->data['logged_user'] = $this->logged_user = $this->auth = $auth::getUser();
        }

        $this->data['locale'] = Session::get('locale');

        $this->date['page_title'] = 'Untitled';
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
