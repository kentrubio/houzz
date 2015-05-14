<?php namespace App;

use App\Eloquent\User;
use Cartalyst\Sentry\Facades\Laravel\Sentry;
use Laravel\Socialite\Contracts\Factory as Socialite;

/**
 * Class AuthenticateUser
 * @package App
 */
class AuthenticateUser {

    /**
     * @var App\Eloquent\User
     */
    private $users;

    /**
     * @var Socialite
     */
    private $socialite;

    /**
     * @var Sentry
     */
    private $auth;

    /**
     * @param User $users
     * @param Socialite $socialite
     * @param Sentry $auth
     */
    public function __construct(User $users, Socialite $socialite, Sentry $auth)
    {
        $this->users = $users;
        $this->socialite = $socialite;
        $this->auth = $auth;
    }

    /**
     * @param boolean $hasCode
     * @param AuthenticateUserListener $listener
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function execute($hasCode, AuthenticateUserListener $listener)
    {
        $auth = $this->auth;

        if ( ! $hasCode) return $this->getAuthorizationFirst();

        $user = $this->users->findByUsernameOrCreate($this->getFacebookUser());

        $auth::login($user, true);

        return $listener->userHasLoggedIn($user);
    }

    /**
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function getAuthorizationFirst()
    {
        return $this->socialite->driver('facebook')->redirect();
    }

    /**
     * @return \Laravel\Socialite\Contracts\User
     */
    private function getFacebookUser()
    {
        return $this->socialite->driver('facebook')->user();
    }

}