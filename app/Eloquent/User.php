<?php namespace App\Eloquent;

use Cartalyst\Sentry\Users\Eloquent\User as SentryUser;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Support\Facades\Hash;

/**
 * Class User
 * @package App
 */
class User extends SentryUser implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['email', 'password', 'activated', 'first_name', 'last_name'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @param $userData
     * @return static
     */
    public function findByUsernameOrCreate($userData)
    {
        $user = User::whereEmail($userData->user['email'])->first();

        if ( ! $user)
        {
            $user = User::create([
                'first_name' => $userData->user['first_name'],
                'last_name'  => $userData->user['last_name'],
                'password'   => Hash::make(str_random(40)),
                'email'      => $userData->user['email'],
                'activated'  => true,
            ]);

            // TODO: check if duplicate username
            $username = substr($userData->user['email'], 0, strpos($userData->user['email'], '@'));

            $user->username = $username;
            $user->save();
        }

        return $user;

    }

    public function profile()
    {
        return $this->hasOne('App\Eloquent\Profile', 'user_id', 'id');
    }

    public function advancedSettings()
    {
        return $this->hasOne('App\Eloquent\AdvancedSetting', 'user_id', 'id');
    }

}
