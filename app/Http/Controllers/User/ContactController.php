<?php namespace App\Http\Controllers\User;

use App\Eloquent\Profile;
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
     * @Get("/contact/edit")
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
     * @Patch("/contact")
     */
    public function postEdit()
    {
        $user = User::with('profile')->whereId(Input::get('id'))->first();

        $profile_input = Input::only('country_code', 'state_code', 'city');

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        // No profile information yet? We'll create it for you.
        if (is_null($user->profile))
        {
            $profile = new Profile;

            $profile->fill($profile_input);

            $user->profile()->save($profile);
        }
        else
        {
            $user->profile->city = $profile_input['city'];
            $user->profile->country_code = $profile_input['country_code'];
            $user->profile->state_code = $profile_input['state_code'];

            $user->profile->save();
        }

        return redirect('/contact/edit')->with('success', trans('app.success_update_message'));
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