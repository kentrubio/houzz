<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ActivateUserRequest;
use App\Http\Requests\Auth\LoginRegisterRequest;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Cartalyst\Sentry\Users\UserAlreadyActivatedException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Exception;
use Illuminate\Support\Facades\Mail;

/**
 * Class AuthController
 * @package App\Http\Controllers\Auth
 */
class AuthController extends Controller {

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
        $this->data['page_title'] = 'Sign In';

        return $this->template('signin');
    }

    /**
     * @Get("signup")
     */
    public function getSignUp()
    {
        $this->data['page_title'] = 'Sign Up';

        return $this->template('signup');
    }

    /**
     * @Get("email-verification")
     */
    public function getEmailVerification()
    {
        $this->data['page_title'] = 'Email Verification';

        return $this->template('email-verification');
    }

    /**
     * Handle a login request to the application.
     *
     * @Post("signin")
     *
     * @param  LoginRegisterRequest $request
     * @return Response
     */
    public function postLogin(LoginRegisterRequest $request)
    {
        $auth = $this->auth;

        try
        {
            $user = $auth::authenticate($request->only('email', 'password'), false);

            if ($user)
            {
                dd('User login successful.');
            }
        } catch (PDOException $e)
        {
            return $e->getMessage();
        } catch (Exception $e)
        {
            return 'These credentials do not match our records.';

        }
    }

    /**
     * User signup to the application.
     *
     * @Post("signup")
     *
     * @param LoginRegisterRequest $request
     * @return Response
     */
    public function postSignup(LoginRegisterRequest $request)
    {
        $auth = $this->auth;

        try
        {
            $first_name = $request->get('first_name');
            $last_name = $request->get('last_name');
            $email = $request->get('email');
            $password = $request->get('password');

            $user = $auth::register(
                [
                    'first_name' => $first_name,
                    'last_name'  => $last_name,
                    'email'      => $email,
                    'password'   => $password
                ]
            );

            $activation_code = $user->getActivationCode();

            $data = [
                'first_name'      => $first_name,
                'last_name'       => $last_name,
                'email'           => $email,
                'activation_code' => $activation_code
            ];

            // Send email for user account activation
            // You need to run the artisan command `php artisan queue:listen`
            Mail::queue('emails.activate-user', $data, function ($message) use ($email)
            {
                $message->from('wizardoncouch@gmail.com', 'Houzz Wizard');
                $message->to($email);
                $message->subject('Account Activation');
            });

            return redirect('email-verification');

        } catch (UserExistsException $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
        } catch (Exception $e)
        {
            return redirect()->back()->withErrors($e->getMessage());
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
                // Pass
                return redirect('/');
            }
            else
            {
                return redirect('account-activation-failed');
            }
        } catch (UserNotFoundException $e)
        {
            return redirect('account-activation-failed')->withErrors($e->getMessage());
        } catch (UserAlreadyActivatedException $e)
        {
            return redirect('account-activation-failed')->withErrors($e->getMessage());
        }

    }

    /**
     * Log the user out of the application.
     *
     * @Get("logout")
     *
     * @return Response
     */
    public function getLogout()
    {
        Sentry::logout();

        return redirect('/');
    }
}
