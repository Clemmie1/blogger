<?php

use App\Models\Channle;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Subscription;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('MainHome');
});

Route::get('/test', function () {
//    $get = Post::limit(3)->orderBy('created_at', 'desc')->get();

    $get = Subscription::where('channle_id', 5)->get();
    if (!$get->isEmpty()){
        return 'yes';
    } else {
        return 'no';
    }

});

Route::get('/search', function () {
    return view('SearchPost');
});

Route::get('/login', function () {

    if (!Auth::check()){
        return view('Auth.login');
    }

})->name('auth.login');

Route::get('/register', function () {

    if (!Auth::check()){
        return view('Auth.register');
    }

})->name('auth.reg');

Route::get('/logout', function () {

    Auth::logout();

})->name('auth.logout');

Route::get('/my/channle', function () {

    if (Auth::check()){
        return view('Account.channle')->with([
            'info' => Auth::user(),
        ]);
    } else {
        return  redirect(\route('auth.login'));
    }

})->name('account.my.channle');

Route::get('/my/channle/{id}', function ($id) {

    if (Auth::check()){

        $get = Channle::where('id', $id)->where('owner_id', Auth::user()->id)->first();
        if (!is_null($get)){
            return dd($get);
        } else {
            return redirect(\route('account.my.channle'));
        }

    } else {
        return  redirect(\route('auth.login'));
    }

})->name('account.my.channle.details');
Route::get('/my/channle/{id}/createPost', function ($id) {

    if (Auth::check()){

        $get = Channle::where('id', $id)->where('owner_id', Auth::user()->id)->first();
        if (!is_null($get)){
            return view('Account.Channle.addPost')->with([
                'info' => Auth::user(),
                'details' => $get,
                'channleID' => $id,
            ]);
        } else {
            return redirect(\route('account.my.channle'));
        }

    } else {
        return  redirect(\route('auth.login'));
    }

})->name('account.my.channle.createPost');

Route::get('/@{channle}', function ($channle){
    $getChannle = Channle::where('username', $channle)->first();
    if (!is_null($getChannle)){
        if (!$getChannle->banned){
            return view('Channel.Channel', [
                'infoChannle' => $getChannle,
            ]);
        } else {
            return 'this channel is banned';
        }
    } else {
        return 'channel not found';
    }
})->name('');

Route::get('/@{channle}/{id}', function ($channle, $id) {

    $getChannle = Channle::where('username', $channle)->first();
    $getPost = Post::where('id', $id)->first();

    if (!is_null($getChannle) and !is_null($getPost)){
        if (!$getPost->private){
            $getPost->update(['total_views'=>$getPost->total_views + 1]);
            $wordCount = str_word_count(strip_tags($getPost->content));
            $readingTime = ceil($wordCount / 200);
            $tL = Like::where('post_id', $id)->count();
            return view('Post.viewPost', [
                'infoChannle' => $getChannle,
                'infoPost' => $getPost,
                'readingTime' => $readingTime,
                'tL' => $tL,
            ]);
        }
    } else {
        return "notFound";
    }
//    return dd($getChannle, $getPost);

})->name('mainhome.viewPost');
