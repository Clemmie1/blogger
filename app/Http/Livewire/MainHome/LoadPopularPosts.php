<?php

namespace App\Http\Livewire\MainHome;

use App\Models\Post;
use Livewire\Component;

class LoadPopularPosts extends Component
{
    public $loadData = null;

    public function getPopularPosts()
    {
        sleep(0.5);
        $get = Post::limit(3)->orderBy('total_views', 'desc')->get();
        return $this->loadData = $get;
    }

    public function render()
    {
        return view('livewire.main-home.load-popular-posts');
    }
}
