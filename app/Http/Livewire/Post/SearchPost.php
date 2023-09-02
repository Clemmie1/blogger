<?php

namespace App\Http\Livewire\Post;

use App\Models\Channle;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SearchPost extends Component
{
    public $searchName;
    public $loadData = null;
    public $start = true;
    public $notFound = false;


    public function search()
    {
        $searchName = $this->searchName;
        $this->start = true;
        if ($searchName == null){
            noty()->timeout(1500)->progressBar(true)->addInfo('Введите название для поиска');
            return;
        }
        $this->start = false;
        sleep(1);
        $results = Post::where('title', 'like', '%'.$searchName.'%')->limit(3)->get();
        $this->notFound = false;

        if ($results->isEmpty()) {
            return $this->loadData = $this->notFound = true;
        } else {
            $this->notFound = false;
            return $this->loadData = $results;

        }


    }

    public function render()
    {
        return view('livewire.post.search-post');
    }
}
