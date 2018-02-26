<?php

namespace CultVotes\Http\Controllers\Auth;

use CultVotes\User;
use CultVotes\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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

    protected $username = 'cpf';
    
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

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
        $inputs = $data;
        $inputs['cpf'] = preg_replace('/[.-]/', '', $data['cpf']);

        return Validator::make($inputs,
            [
                'cpf' => 'required|cpf|unique:users',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed',
            ],

            [
                'cpf.required' => 'O campo cpf é obrigatório.',
                'cpf.cpf' => 'O campo não é um cpf válido.',
                'cpf.unique' => 'Este cpf já está registrado no sistema.',

                'email.required' => 'O campo email é obrigatório',
                'email.email' => 'Endereço de email inválido.',
                'email.max' => 'Endereço de email muito longo.',
                'email.unique' => 'Este email já está registrado no sistema.',
            
                'password.required' => 'O campo senha é obrigatório.',
                'password.min' => 'O campo senha deve ter no mínimo 6 caracteres.',
                'password.confirmed' => 'O campo senha não confere com o campo confirmação de senha.',
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \CultVotes\User
     */
    protected function create(array $data)
    {
        return User::create([
            'cpf' => preg_replace('/[.-]/', '', $data['cpf']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
