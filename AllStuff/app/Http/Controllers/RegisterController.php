<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    // Other methods...

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'numeric'],
            'address' => ['required', 'string', 'max:255'],
            'password' => [
                'required',
                'string',
                'min:8', // or adjust the minimum length as needed
                'regex:/^(?=.*[a-zA-Z])(?=.*[@#$%])(?=.*\d).+$/',
                'confirmed',
            ],
            // Other fields...
        ]);
    }
}