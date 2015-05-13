<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests\Auth\ActivateUserRequest;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRegisterRequest;
use Cartalyst\Sentry\Users\UserAlreadyActivatedException;
use Cartalyst\Sentry\Users\UserExistsException;
use Cartalyst\Sentry\Users\UserNotFoundException;
use Exception;

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

//	use AuthenticatesAndRegistersUsers;

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
                    'email' => $request->get('email'),
                    'password' => $request->get('password')
                ]
            );

            $activationCode = $user->getActivationCode();

            // Send email that a user has been created

            dd($activationCode);

        } catch (UserExistsException $e)
        {
            dd('User with this login already exists.');
        } catch (Exception $e)
        {

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
        }
        catch (UserNotFoundException $e)
        {
            dd('User was not found.');
        }
        catch (UserAlreadyActivatedException $e)
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
