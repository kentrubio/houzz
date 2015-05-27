<?php namespace App\Http\Controllers\User;

use App\Eloquent\Country;
use App\Eloquent\State;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class ContactController
 * @package App\Http\Controllers\User
 *
 * @Middleware("auth")
 */
class ContactController extends Controller {

    /**
     * Edit User's contact
     *
     * @Get("/edit-contact")
     */
    public function edit()
    {
        $user = User::with('profile')->whereId($this->logged_user->id)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['user'] = $user;

        $this->data['page_title'] = trans('app.edit_your_contact');

        return $this->template('user.edit-contact');
    }

    /**
     * Post function for Edit User's contact
     *
     * @Patch("/edit-contact")
     */
    public function postEdit()
    {
        $user = User::whereId(Input::get('id'))->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $user->update(Input::all());

        return redirect('/edit-contact')->with('success', trans('app.success_update_message'));
    }

    /**
     * @Get("@{username}")
     *
     * @param $username
     * @return \Illuminate\View\View
     */
    public function show($username)
    {
        $user = User::whereUsername($username)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['page_title'] =  trans('app.my_contact');

        return $this->template('user.show-contact');
    }

    /**
     * @Post("update-state-values")
     *
     */
    public function updateStateValues()
    {
        $country_code = Input::get('country_code');

        $states = State::whereCountryCode($country_code)->get(['code', 'name'])->toJson();

        return Response::json($states);
    }
}