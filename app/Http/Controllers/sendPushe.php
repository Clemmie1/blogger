<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class sendPushe extends Controller
{
    static public function sendPushe($title){
        $options = array(
            'cluster' => 'eu',
            'useTLS' => false
        );
        $pusher = new Pusher(
            'fdc7a7647abd71a16960',
            '2c511663e621f542b005',
            '1660159',
            $options
        );
        $data['message'] = $title;
        $pusher->trigger('my-channel', 'my-event', $data);
    }
}
