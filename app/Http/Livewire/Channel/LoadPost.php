<?php

namespace App\Http\Livewire\Channel;

use App\Models\Post;
use App\Models\Subscription;
use Livewire\Component;

class LoadPost extends Component
{
    public $loadData = null;
    public $channelID;
    public $notFound = false;

    public function getListPost()
    {
        $get = Post::where('channle_id', $this->channelID)->get();
        if (!$get->isEmpty()){
            $this->loadData = $get;
        } else {
            $this->loadData = $this->notFound = true;
        }
    }

    public function render()
    {
        return view('livewire.channel.load-post');
    }
}
