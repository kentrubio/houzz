<?php namespace App\Eloquent;

use Exception;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Message
 * @package App\Eloquent
 */
class Message extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['from', 'to', 'message'];

    /**
     * @param $data
     * @return static
     * @throws Exception
     */
    public static function send($data)
    {
        $users = User::whereIn('id', [$data['from'], $data['to']])->get();

        if (count($users) != 2)
        {
            throw new Exception("test");
        }

        // both users were found. Good to go forward and send message.

        return self::create([
            'from'    => $data['from'],
            'to'      => $data['to'],
            'message' => $data['message']
        ]);
    }
}
