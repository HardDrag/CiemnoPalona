<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', "regex:/^[A-Ż]{1}(?=.{1,40}$)[a-żA-Ż]+(?:[-'\s][a-żA-Ż]+)*$/", 'string'],
            'surname' => ['required', "regex:/^[A-Ż]{1}(?=.{1,40}$)[a-żA-Ż]+(?:[-'\s][a-żA-Ż]+)*$/", 'string'],
            'city' => ['required', "regex:/^[A-Ż]{1}(?=.{1,40}$)[a-żA-Ż]+(?:[-'\s][a-żA-Ż]+)*$/", 'string'],
            'postcode' => ['required', "regex:/^[0-9]{2}-?[0-9]{3}/", 'string'],
            'street' => ['required', "regex:/[A-Ż][a-ż]{3,20}\s[1-9][0-9]*[A-z]*(\\|)?[0-9]*/", 'string'],
            'phone' => ['required', "regex:/[0-9]{9}/", 'integer'],
            'email' => ['required', 'string', 'email', 'max:60', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'city' => $data['city'],
            'postcode' => $data['postcode'],
            'street' => $data['street'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
