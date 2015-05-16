<?php namespace App\Http\Controllers;

use Cartalyst\Sentry\Facades\Laravel\Sentry;

class HomeController extends Controller {

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
