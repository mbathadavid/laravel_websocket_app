<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Pusher\Pusher;

class ChatController extends Controller
{
    //
    public function chats() {
        return view('chats');
    }

    //Function to receive send messages
    public function send(Request $request)
    {
        $message = $request->message;

        // Initialize Pusher with your credentials
        $pusher = new Pusher(env('PUSHER_APP_KEY'), env('PUSHER_APP_SECRET'), env('PUSHER_APP_ID'), [
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'useTLS' => true,
        ]);


        $pusher->trigger('chat', 'message.created', $message);

        return response()->json([
            'message' => $message,
            'success' => true
        ]);
    }
    
}
