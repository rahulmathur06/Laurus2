<?php namespace Modules\User\Http\Requests;

use App\Http\Requests\Request;


class UserCreateRequest extends Request {

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
			//
            'first_name'       => 'required',
            'last_name'        => 'required',
			'email'            => 'required|unique:users,email',
			'username'         => 'required|unique:users,username',
            'password'         => 'required',
            'retype_password'  => 'required|same:password',
            'position'         => 'required',
            'image'            => 'max:10000|mimes:png,jpg,jpeg'
		];
	}

}
