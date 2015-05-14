<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

    /**
     * Create a new controller instance.
     *
     * @param Sentry $auth
     */
	public function __construct(Sentry $auth)
	{
        parent::__construct($auth);
		$this->middleware('guest');
	}

	/**
	 * Show the application welcome screen to the user.
	 *
     * @Get("/")
	 * @return Response
	 */
	public function index()
	{
        $this->data['page_title'] = 'Home';
		return $this->template('home');
	}

}
