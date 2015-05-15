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
     *
     */

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
            $user = $auth::register(
                [
                    'email'    => $request->get('email'),
                    'password' => $request->get('password')
                ]
            );

            $activation_code = $user->getActivationCode();

            // TODO: Send email that a user has been created
            Mail::send('emails.activate-user', ['email' => $request->get('email'), 'activation_code' => $activation_code], function($message) use ($request)
            {
                $message->from('wizardoncouch@gmail.com', 'Houzz wizard');
                $message->to($request->get('email'));
                $message->subject('Account Activation');
            });

            return redirect('success');

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
                dd('User activation passed.');
            }
            else
            {
                dd('User activation failed.');
            }
        } catch (UserNotFoundException $e)
        {
            dd('User was not found.');
        } catch (UserAlreadyActivatedException $e)
        {
            dd('User is already activated.');
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
