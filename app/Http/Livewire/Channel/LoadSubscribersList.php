<?php

namespace App\Http\Livewire\Channel;

use App\Models\Subscription;
use Livewire\Component;

class LoadSubscribersList extends Component
{

    public $loadData = null;
    public $channelID;
    public $notFound = false;

    public function getList()
    {
        sleep(1);
        $get = Subscription::where('channle_id', $this->channelID)->get();
        if (!$get->isEmpty()){
            $this->loadData = $get;
        } else {
            $this->loadData = $this->notFound = true;
        }
    }

    public function render()
    {
        return view('livewire.channel.load-subscribers-list');
    }
}
