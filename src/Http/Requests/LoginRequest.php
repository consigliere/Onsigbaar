<?php
/**
 * LoginRequest.php
 * Created by rn on 10/19/2017 6:15 PM.
 */

namespace App\Components\Onsigbaar\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'    => 'required|email',
            'password' => 'required'
        ];
    }
}