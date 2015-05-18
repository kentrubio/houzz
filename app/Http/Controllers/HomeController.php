<?php namespace App\Http\Controllers;

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
