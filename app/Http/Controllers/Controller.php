<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

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
        $this->auth = $auth;

        if ($auth::check())
        {
            $this->data['logged_user'] = $this->logged_user = $this->auth = $auth::getUser();
        }
    }

}
