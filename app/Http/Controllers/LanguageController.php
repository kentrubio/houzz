<?php namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller {

    /**
     * Show the application welcome screen to the user.
     *
     * @Post("language")
     * @return Response
     */
    public function index()
    {
        $locale = Input::get('locale');
        app()->setLocale($locale);

        Session::put('locale', $locale);

        return redirect()->back()->with(['lang' => $locale]);
    }

}
