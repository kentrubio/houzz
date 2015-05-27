<?php namespace App\Eloquent;

use Illuminate\Database\Eloquent\Model;

class NotificationSetting extends Model {

	//

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
}
