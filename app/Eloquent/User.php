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
     * @param $user_data
     * @return static
     */
    public function findByUsernameOrCreate($user_data)
    {
        $user = User::whereEmail($user_data->user['email'])->first();

        if ( ! $user)
        {
            $user = User::create([
                'first_name' => $user_data->user['first_name'],
                'last_name'  => $user_data->user['last_name'],
                'password'   => Hash::make(str_random(40)),
                'email'      => $user_data->user['email'],
                'activated'  => true,
            ]);

            $user = $this->postUserCreation($user, $user_data->user);
        }

        return $user;
    }

    /**
     * @param $user
     * @param $user_data
     * @return mixed
     */
    public static function postUserCreation($user, $user_data)
    {
        // TODO: check if duplicate username
        $username = substr($user_data['email'], 0, strpos($user_data['email'], '@'));

        $user->username = $username;

        $user->advancedSettings()->save(new AdvancedSetting);

        $user->save();

        return $user;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile()
    {
        return $this->hasOne('App\Eloquent\Profile', 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function advancedSettings()
    {
        return $this->hasOne('App\Eloquent\AdvancedSetting', 'user_id', 'id');
    }

}
