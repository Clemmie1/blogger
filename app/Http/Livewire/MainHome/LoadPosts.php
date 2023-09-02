<?php

namespace App\Http\Livewire\MainHome;

use App\Models\Post;
use Livewire\Component;

class LoadPosts extends Component
{
    public $loadData = null;
    public $limit = 2;

    public function getPosts()
    {
        sleep(1);
        $get = Post::limit($this->limit)->orderBy('created_at', 'desc')->get();
        return $this->loadData = $get;
    }

    public function loadMore(){
        $this->limit += 3;
        $get = Post::limit($this->limit)->orderBy('created_at', 'desc')->get();
        return $this->loadData = $get;
    }


    public function render()
    {
        return view('livewire.main-home.load-posts');
    }
}
