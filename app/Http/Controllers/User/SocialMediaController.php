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
class SocialMediaController extends Controller {

    /**
     * @Get("/social-media-settings")
     */
    public function edit()
    {
        $user = User::with('profile')->whereId($this->logged_user->id)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['user'] = $user;

        $this->data['page_title'] = trans('app.link_to_your_social_media_profiles');

        return $this->template('user.social-media-settings');
    }

    /**
     * Post function for Edit User's contact
     *
     * @Patch("/social-media-settings")
     */
    public function postEdit()
    {
        $user = User::with('profile')->whereId(Input::get('id'))->first();

        $profile_input = Input::get('profile');

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
            $user->profile->fill($profile_input);

            $user->profile->save();
        }

        return redirect('/social-media-settings')->with('success', trans('app.success_update_message'));
    }
}