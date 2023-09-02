<?php

namespace App\Http\Livewire\Auth;

use App\Models\Channle;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\Fluent\Concerns\Has;
use Livewire\Component;

class FormRegister extends Component
{
    public $firstName;
    public $lastName;
    public $email;
    public $password;

    protected $rules = [
        'firstName' => 'required',
        'lastName' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    protected $messages = [
        'email.required' => 'Введите почту.',
        'email.email' => 'Формат адреса электронной почты недействителен.',
        'firstName.required' => 'Введите имя.',
        'lastName.required' => 'Введите фомилию.',
        'password.required' => 'Введите пароль.',
    ];

    protected $validationAttributes = [
        'firstName' => 'firstName',
        'lastName' => 'lastName',
        'email' => 'email address',
        'password' => 'password',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function reg()
    {
        $this->validate();
        sleep(1);
        $user = new User();

        $create = $user->create([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ]);

        if ($create){
            $arr = [
                'email' => $this->email,
                'password' => $this->password,
            ];
            Auth::attempt($arr);
            Auth::login(Auth::user());
            return $this->redirect(route('account.my.channle'));

        } else {
            return noty()->progressBar(true)->layout("topRight")->addError('Почта занята');
        }



    }

    public function render()
    {
        return view('livewire.auth.form-register');
    }
}
