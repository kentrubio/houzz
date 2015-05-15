<?php namespace App;

/**
 * Interface AuthenticateUserListener
 * @package App
 */
interface AuthenticateUserListener {

    /**
     * @param $user
     * @return mixed
     */
    public function userHasLoggedIn($user);
}