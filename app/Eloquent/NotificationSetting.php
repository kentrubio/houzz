<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

/**
 * Class NotificationSetting
 * @package App\Eloquent
 */
class NotificationSetting extends Model {

    //

    /**
     * @return array
     */
    public static function getNameWithOptions()
    {
        $notifications = self::all();
        $notification_array = [];
        foreach ($notifications as $n)
        {
            $result = [];
            $options = NotificationSettingOption::whereIn('id', json_decode($n->values))->get([
                'id',
                'name'
            ])->toArray();

            foreach ($options as $option)
            {
                $result[$option['id']] = $option['name'];
            }

            $notification_array[$n->name] = $result;
        }

        return $notification_array;
    }

    /**
     * @param $user
     * @param $column
     * @return array
     */
    public static function getUserData($user, $column)
    {
        $notification_array = [];
        if ( ! empty($user->advancedSettings->$column))
        {
            $notif = json_decode($user->advancedSettings->$column);

            foreach ($notif as $k => $n)
            {
                $notification_array[$k] = $n;
            }
        }

        return $notification_array;
    }

    /**
     * @param $user
     * @param $email_settings
     * @param $column
     */
    public static function storeUserSetting($user, $email_settings, $column)
    {
        if (is_array($email_settings))
        {
            $user->advancedSettings->$column = json_encode($email_settings);

            $user->advancedSettings->save();
        }
        else
        {
            $user->advancedSettings->$column = null;

            $user->advancedSettings->save();
        }
    }


}
