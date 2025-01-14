<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\Request;
use Propaganistas\LaravelPhone\PhoneNumber;

class RegisterRequest extends Request
{
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
            'first_name' => 'required',
            'last_name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'phone' => ['required', 'string', 'phone:TZ' ],
            'email' => 'required|string|email|max:255',
            'account_category' => 'required',
            'gender' => 'required',
             'country' => 'required',
             'region' => 'required',



         ];


    }

    /**
     * @return array
     */
//    public function sanitize()
//    {
//
//        /*start exceptions on trim*/
//
//        /*user account*/
//        $user_account_cv_id = [ 'user_account_cv_id' => request()->input('user_account_cv_id')];
//        /*trim with exception*/
//        $input = array_map('trim', $this->except('user_account_cv_id'));
//        /*merge with exception*/
//        $input= array_merge($user_account_cv_id,$input);
//        /*end exception*/
//        $input['email'] = strtolower(trim($input['email']));
//        /*Remove extra whitespace*/
//        $input['first_name']  =  preg_replace('/\s+/', ' ', $input['first_name'] );
//        $input['last_name']  =  preg_replace('/\s+/', ' ', $input['last_name'] );
////        $input['phone'] = PhoneNumber::make($input['phone'], $input['country'])->formatE164();
//        $this->replace($input);
//        return $this->all();
//
//    }

}
