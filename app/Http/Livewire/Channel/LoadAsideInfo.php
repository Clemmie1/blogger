<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channle;
use App\Models\Post;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class LoadAsideInfo extends Component
{
    public $channelID;
    public $loadData = null;
    public $total_sub = 0;

    public $subscribe = false;

    protected $listeners = [
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function loadChannel()
    {
        sleep(1);

        if (Auth::check()){
            $subscribe = Subscription::where('user_id', Auth::user()->id)->where('channle_id', $this->channelID)->get();
            if (!$subscribe->isEmpty()){
                $this->subscribe = true;
            } else {
                $this->subscribe = false;
            }
        }

        $data = Channle::where('id', $this->channelID)->first();
        $total_post = Post::where('channle_id', $this->channelID)->count();
        $total_views = Post::where('channle_id', $this->channelID)->sum('total_views');
        $total_likes = Post::where('channle_id', $this->channelID)->sum('total_likes');
        $total_comments = Post::where('channle_id', $this->channelID)->sum('total_comments');

        $s = Subscription::where('channle_id', 5)->count();
        $this->total_sub = $s;


        $date = [
            'name' => $data->name,
            'username' => $data->username,
            'total_post' => $total_post,
            'total_views' => $total_views,
            'total_likes' => $total_likes,
            'total_comments' => $total_comments,
            'verified' => $data->verified,
            'avatar' => $data->avatar,
        ];

        $this->loadData = $date;
    }

    public function subscribe($channelID)
    {
        Subscription::create([
            'user_id' => Auth::user()->id,
            'channle_id' => $channelID,
        ]);
        $this->subscribe = true;
        $this->total_sub++;
        return noty()->layout("bottomRight")->timeout(2000)->addSuccess('Подписка оформлена');
    }

    public function unsubscribe($channelID)
    {
        return sweetalert()
            ->showCancelButton(true, "Отмена")
            ->showConfirmButton(true, "Отказаться от подписки")
            ->addInfo('Отказаться от подписки на канал?');
    }

    public function sweetalertConfirmed(array $payload)
    {
        $this->subscribe = false;
        $this->total_sub--;
        Subscription::where('user_id', Auth::user()->id)->where('channle_id', $this->channelID)->delete();
        return noty()->layout("bottomRight")->timeout(2000)->addWarning('Подписка отменена');
    }

    public function render()
    {
        return view('livewire.channel.load-aside-info');
    }
}
