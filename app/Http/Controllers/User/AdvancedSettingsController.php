<?php namespace App\Http\Controllers\User;

use App\Eloquent\AdvancedSetting;
use App\Eloquent\NotificationSetting;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

/**
 * Class AdvancedSettingsController
 * @package App\Http\Controllers\User
 *
 * @Middleware("auth")
 */
class AdvancedSettingsController extends Controller {

    /**
     * @Get("/advanced-settings")
     */
    public function edit()
    {
        $user = User::with('advancedSettings')->whereId($this->logged_user->id)->first();

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        $this->data['user'] = $user;

        $this->data['advanced_settings'] = NotificationSetting::getUserData($user, 'send_email_when');
        $this->data['email_notification'] = NotificationSetting::getUserData($user, 'email_notification');
        $this->data['visible_to_public'] = NotificationSetting::getUserData($user, 'visible_to_public');
        $this->data['send_email_when'] = NotificationSetting::getNameWithOptions();

        $this->data['page_title'] = trans('app.link_to_your_social_media_profiles');

        return $this->template('user.advanced-settings');
    }

    /**
     * Post function for Edit User's contact
     *
     * @Patch("/advanced-settings")
     */
    public function postEdit()
    {
        $user = User::with('advancedSettings')->whereId(Input::get('id'))->first();

        $advanced_settings_input = Input::except('_method', '_token', 'id');

        if ( ! $user)
        {
            return Response::make('errors.404', 404);
        }

        // No profile information yet? We'll create it for you.
        if (is_null($user->advancedSettings))
        {
            $advanced_settings = new AdvancedSetting;

            $advanced_settings->send_email_when = json_encode($advanced_settings_input);

            $user->advancedSettings()->save($advanced_settings);
        }
        else
        {
            $user->advancedSettings->send_email_when = json_encode($advanced_settings_input);

            $user->advancedSettings->save();
        }

        NotificationSetting::storeUserSetting($user, Input::get('email'), 'email_notification');
        NotificationSetting::storeUserSetting($user, Input::get('visible_to_public'), 'visible_to_public');

        return redirect('/advanced-settings')->with('success', trans('app.success_update_message'));
    }
}