<?php

namespace App\Http\Livewire\Account\Channle;

use App\Http\Controllers\sendPushe;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Pusher\Pusher;

class CreatePost extends Component
{
    use WithFileUploads;

    public $title;
    public $category;
    public $banner;
    public $content;
    public $channleID;

    protected $rules = [
        'title' => 'required|min:3|max:100',
        'category' => 'required',
        'banner' => 'required|mimes:jpg,png,gif|max:100000',
//        'content' => 'required',
    ];

    protected $messages = [
        'title.required' => 'Введите название поста',
        'category.required' => 'Выберите категорию поста',
        'banner.required' => 'Нужна аватарка поста',
        'banner.mimes' => 'Нужен формат аватарки jpg, png.',
        'content.required' => 'Введите контент'
    ];

    protected $validationAttributes = [
        'title' => 'title',
        'category' => 'category',
        'banner' => 'banner',
        'content' => 'content',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function create(){
        $this->validate();

        $extension = $this->banner->getClientOriginalExtension();
        $newAvatarName = Str::random(60) . '.' . $extension;

        $create = Post::create([
            'channle_id' => $this->channleID,
            'title' => $this->title,
            'category' => $this->category,
            'banner_img' => $this->banner,
            'content' => $this->content,
        ]);

        if ($create){
            Storage::putFileAs('public/avatar_channle', $this->banner, $newAvatarName);
            noty()->addSuccess('Пост создан');
//            sendPushe::sendPushe();
            return $this->redirect(route('account.my.channle'));
        } else {
            return noty()->addWarning('Ошибка в создание канала');
        }
    }

    public function render()
    {
        return view('livewire.account.channle.create-post');
    }
}
