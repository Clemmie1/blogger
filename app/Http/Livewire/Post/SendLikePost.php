<?php

namespace App\Http\Livewire\Post;

use App\Models\Like;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Pusher\Pusher;

class SendLikePost extends Component
{

    public $likes = 0;
    public $postId;

    public function sendLike($id)
    {
        Like::where('post_id', $id)->count() == $this->likes;
        if (Auth::check()){
            if (Like::where('sender_id', Auth::user()->id)->where('post_id', $this->postId)->exists()){
                Like::where('sender_id', Auth::user()->id)->where('post_id', $this->postId)->delete();
                $this->likes--;
            } else {
                Like::create([
                    'post_id' => $this->postId,
                    'sender_id' => Auth::user()->id
                ]);
                $this->likes++;
            }

        } else {
            return noty()->layout("bottomRight")->timeout(2000)->addWarning('Чтобы оценивать, Вы должны быть авторизованы');
        }
    }

    public function render()
    {
        return view('livewire.post.send-like-post');
    }
}
