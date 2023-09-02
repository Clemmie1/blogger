<?php

namespace App\Http\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormLogin extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Введите почту.',
        'email.email' => 'Формат адреса электронной почты недействителен.',
        'password.required' => 'Введите пароль.',
    ];

    protected $validationAttributes = [
        'email' => 'email address',
        'password' => 'password',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $this->validate();

        $arr = [
          'email' => $this->email,
          'password' => $this->password,
        ];

        if (Auth::attempt($arr)){
            $user = Auth::user();

            if (!$user->banned){
                Auth::login(Auth::user());
            } else {
                noty()->timeout(2000)->progressBar(true)->layout("topRight")->addError('Аккаунт заблокирован');
            }
        } else {
            noty()->timeout(2000)->progressBar(true)->layout("topRight")->addError('Неправильные учетные данные');
        }


    }

    public function render()
    {
        return view('livewire.auth.form-login');
    }
}
