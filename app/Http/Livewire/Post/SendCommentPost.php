<?php

namespace App\Http\Livewire\Post;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use function PHPUnit\Framework\isEmpty;

class SendCommentPost extends Component
{

    public $postId;
    public $msgComment;
    public $notFound = false;
    public $totalComments = 0;
    public $getCommentID;

    public $getComments = null;

    protected $listeners = [
        'sweetalertConfirmed',
        'sweetalertDenied',
    ];

    public function sweetalertConfirmed(array $payload)
    {
        $del = Comment::find($this->getCommentID);

        $post = Post::find($this->postId);
        $post->update([
            'total_comments' => $post->total_comments - 1
        ]);
        $del->delete();
        $this->totalComments = Comment::where('post_id', $this->postId)->count();
        return noty()->layout("bottomRight")->timeout(2000)->addError('Комментарий удалён');
    }

    public function sendComment($id){
        if ($this->msgComment == null){
            noty()->layout("bottomRight")->timeout(2000)->addWarning('Введите комментарий');
            return;
        }


        if (Auth::check()){
            Comment::create([
                'post_id' => $id,
                'sender' => Auth::user()->id,
                'message' => $this->msgComment,
            ]);
            $get = Comment::where('post_id', $this->postId)->count();
            $this->totalComments = $get;
            $post = Post::find($id);
            $post->update([
                'total_comments' => $post->total_comments + 1
            ]);
            return noty()->layout("bottomRight")->timeout(2000)->addSuccess('Комментарий отправлен');
        } else {
            return noty()->layout("bottomRight")->timeout(2000)->addWarning('Чтобы отправить комментарий, Вы должны быть авторизованы');
        }

    }

    public function deleteComment($id)
    {
        $this->getCommentID = $id;
        sweetalert()
            ->showCancelButton(true, "Отмена")
            ->showConfirmButton(true, "Да")
            ->addInfo('Вы действительно хотите удалить?');

    }

    public function render()
    {
        $get = Comment::where('post_id', $this->postId)->get();
        return view('livewire.post.send-comment-post', [
            'getComments' => $this->getComments = $get,
        ]);
    }
}
