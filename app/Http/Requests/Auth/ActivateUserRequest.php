<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

class ActivateUserRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'             => 'required',
            'activation_code'   => 'required',
        ];
    }

}
