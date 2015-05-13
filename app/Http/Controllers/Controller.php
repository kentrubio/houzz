<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController {

	use DispatchesCommands, ValidatesRequests;

    public $loggedUser;

    public $data = [];

    public $auth;

    public function __construct(Sentry $auth)
    {
        $this->auth = $auth;

        if ($auth::check())
        {
            $this->data['loggedUser'] = $this->loggedUser = $this->auth = $auth::getUser();
        }
    }

}
