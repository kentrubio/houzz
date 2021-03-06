<?php namespace App\Http\Controllers\Auth;

use App\AuthenticateUser;
use App\AuthenticateUserListener;
use App\Eloquent\SocialUser;
use App\Eloquent\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateUserRequest;
use App\Http\Requests\Auth\SigninRequest;
use App\Http\Requests\Auth\SignupRequest;
use App\Translate;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Users\UserAlreadyActivatedException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 *
 * @Middleware("guest", except={"getSignout"})
 */
class AuthController extends Controller implements AuthenticateUserListener {

    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */


    /**
     * @Get("signin")
     */
    public function getSignIn()
    {
        $this->data['page_title'] = trans('app.sign_in');

        return $this->template('signin');
    }

    /**
     * @Get("signup")
     */
    public function getSignUp()
    {
        $this->data['page_title'] = trans('app.sign_up');

        return $this->template('signup');
    }

    /**
     * @Get("email-verification")
     */
    public function getEmailVerification()
    {
        $this->data['page_title'] = trans('app.email_verification');

        return $this->template('email-verification');
    }

    /**
     * Handle a login request to the application.
     *
     * @Post("signin")
     *
     * @param SigninRequest $request
     * @return Response
     */
    public function postSignin(SigninRequest $request)
    {
        $auth = $this->auth;
        try
        {
            $user = $auth::authenticate($request->only('email', 'password'), $request->get('remember'));

            if ($user)
            {
                return Redirect::intended('/');
            }
            else
            {
                return redirect()->back()->withInput()->withErrors(trans('app.invalid_credentials'));
            }
        } catch (PDOException $e)
        {
            return redirect()->back()->withInput()->withErrors($e->getMessage());
        } catch (Exception $e)
        {
            return redirect()->back()->withInput()->withErrors(Translate::error($e->getMessage()));
        }
    }

    /**
     * User signup to the application.
     *
     * @Post("signup")
     *
     * @param SignupRequest $request
     * @return Response
     */
    public function postSignup(SignupRequest $request)
    {
        $auth = $this->auth;
        try
        {
            $user_data = [
                'first_name' => $request->get('first_name'),
                'last_name'  => $request->get('last_name'),
                'email'      => $request->get('email'),
                'password'   => $request->get('password'),
            ];

            $user = $auth::register(
                [
                    'first_name' => $user_data['first_name'],
                    'last_name'  => $user_data['last_name'],
                    'email'      => $user_data['email'],
                    'password'   => $user_data['password'],
                ]
            );

            $user = User::postUserCreation($user, $user_data);

            $activation_code = $user->getActivationCode();

            $data = [
                'first_name'      => $user_data['first_name'],
                'last_name'       => $user_data['last_name'],
                'email'           => $user_data['email'],
                'activation_code' => $activation_code,
                'app_name'        => Config::get('app.name'),
            ];

            $email = $user_data['email'];

            // Send email for user account activation
            // You need to run the artisan command `php artisan queue:listen`
            Mail::queue('emails.activate-user', $data, function ($message) use ($email)
            {
                $message->from(env('MAIL_ADDRESS', 'mail@example.com'), env('MAIL_NAME', 'Wizard Mailer'));
                $message->to($email);
                $message->subject(trans('app.account_activation'));
            });

            return redirect('email-verification');

        } catch (UserExistsException $e)
        {
            return redirect()->back()->withInput()->withErrors(Translate::error($e->getMessage()));
        } catch (Exception $e)
        {
            return redirect()->back()->withInput()->withErrors(Translate::error($e->getMessage()));
        }
    }

    /**
     * User activation via email.
     *
     * @Get("activate-user")
     * @param ActivateUserRequest $request
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function getActivateUser(ActivateUserRequest $request)
    {
        $auth = $this->auth;

        $email = $request->get('email');
        $activation_code = $request->get('activation_code');

        try
        {
            $user = $auth::findUserByLogin($email);

            if ($user->attemptActivation($activation_code))
            {
                $auth::login($user, true);

                return redirect('/');
            }
            else
            {
                return redirect('account-activation-failed');
            }
        } catch (UserNotFoundException $e)
        {
            return redirect('account-activation-failed')->withErrors(Translate::error($e->getMessage()));
        } catch (UserAlreadyActivatedException $e)
        {
            return redirect('account-activation-failed')->withErrors(Translate::error($e->getMessage()));
        }

    }

    /**
     * Log the user out of the application.
     *
     * @Get("signout")
     *
     * @return Response
     */
    public function getSignout()
    {
        Sentry::logout();

        return redirect('/');
    }

    /**
     *
     * @Get("oauth/facebook")
     * @param AuthenticateUser $authenticateUser
     * @param \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function oauth(AuthenticateUser $authenticateUser, Request $request)
    {
        $hasCode = $request->has('code');

        return $authenticateUser->execute($hasCode, $this);
    }

    /**
     * When a user has successfully been logged in...
     *
     * @param $user
     * @return \Illuminate\Routing\Redirector
     */
    public function userHasLoggedIn($user)
    {
        return redirect('/');
    }
}
