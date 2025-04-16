<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    // Toon chat voor gebruikers
    public function userChat()
    {
        $admin = User::role('admin')->first();
        $messages = Message::where(function ($q) {
                $q->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());
            })
            ->where(function ($q) use ($admin) {
                $q->where('sender_id', $admin->id)
                  ->orWhere('receiver_id', $admin->id);
            })
            ->orderBy('created_at')
            ->get();

        return view('chat.user', compact('messages'));
    }

    // Verstuur bericht vanuit gebruiker
    public function sendUserMessage(Request $request)
    {
        $admin = User::role('admin')->first();

        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $admin->id,
            'is_admin_sender' => false,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }

    // Toon alle gesprekken voor de admin
    public function adminChatList()
{
    $users = \App\Models\User::role('gebruiker')->get();

    return view('chat.admin_list', compact('users'));
}


    // Toon chat met specifieke gebruiker
    public function adminChat($userId)
    {
        $messages = Message::where(function ($q) use ($userId) {
                $q->where('sender_id', $userId)
                  ->orWhere('receiver_id', $userId);
            })
            ->where(function ($q) {
                $q->where('sender_id', Auth::id())
                  ->orWhere('receiver_id', Auth::id());
            })
            ->orderBy('created_at')
            ->get();

        return view('chat.admin_chat', compact('messages', 'userId'));
    }

    // Admin verstuurt bericht
    public function sendAdminMessage(Request $request, $userId)
    {
        Message::create([
            'sender_id' => Auth::id(),
            'receiver_id' => $userId,
            'is_admin_sender' => true,
            'message' => $request->message,
        ]);

        return redirect()->back();
    }
}