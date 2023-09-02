<?php

namespace App\Http\Livewire\Account;

use App\Models\Channle;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function Symfony\Component\Translation\t;

class LoadMyChannle extends Component
{
    public $loadData = null;
    public $notFound = false;
    public $channleID = null;

    protected $listeners = [
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function sweetalertConfirmed(array $payload)
    {
        Channle::where('id', $this->channleID)->delete();
        Post::where('channle_id', $this->channleID)->delete();
        noty()->layout("bottomRight")->timeout(2000)->addSuccess('Канал удалён!');
        return $this->redirect(route('account.my.channle'));
    }

    public function getChannle()
    {
        sleep(2);
        $get = Channle::where('owner_id', Auth::user()->id)->get();
        if (!is_null($get)){
            $this->loadData = $get;
        } else {
            $this->loadData = $this->notFound = true;
        }
    }

    public function deleteChannle($id)
    {
        $this->channleID = $id;
        sweetalert()
            ->showCancelButton(true, "Отмена")
            ->showConfirmButton(true, "Да")
            ->addInfo('Вы действительно хотите удалить свой канал?');
    }

    public function render()
    {
        return view('livewire.account.load-my-channle');
    }
}
