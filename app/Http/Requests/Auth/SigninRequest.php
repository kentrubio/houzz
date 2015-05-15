<?php namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;

/**
 * Class LoginRegisterRequest
 * @package App\Http\Requests\Auth
 */
class SigninRequest extends Request {

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
            'email'    => 'required|email',
            'password' => 'required',
        ];
    }

}
