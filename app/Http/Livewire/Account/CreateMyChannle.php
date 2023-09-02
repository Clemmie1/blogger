<?php

namespace App\Http\Livewire\Account;

use App\Models\Channle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateMyChannle extends Component
{

    use WithFileUploads;
    public $username;
    public $name;
    public $avatar;

    protected $rules = [
        'username' => 'required|unique:channles,username|min:3|max:10',
        'name' => 'required|min:3|max:10',
//        'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:100000',
        'avatar' => 'required',
    ];

    protected $messages = [
        'username.required' => 'Введите имя канала',
        'username.unique' => 'Имя @:input канала занято',
        'name.required' => 'Введите название канала',
        'avatar.required' => 'Нужна аватарка канала',
        'avatar.mimes' => 'Нужен формат аватарки jpg, png.'
    ];

    protected $validationAttributes = [
        'username' => 'username',
        'name' => 'name',
        'avatar' => 'avatar',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function createChannle(){
        $this->validate();
        $extension = $this->avatar->getClientOriginalExtension();
        $newAvatarName = Str::random(60) . '.' . $extension;


        $create = Channle::create([
            'owner_id' => Auth::user()->id,
            'username' => $this->username,
            'name' => $this->name,
            'avatar' => $newAvatarName,
        ]);

        if ($create){
            Storage::putFileAs('public/avatar_channle', $this->avatar, $newAvatarName);
            noty()->addSuccess('Канал создан');
            return $this->redirect(route('account.my.channle'));
        } else {
            return noty()->addWarning('Ошибка в создание канала');
        }

    }

    public function render()
    {
        return view('livewire.account.create-my-channle');
    }
}
