<?php

namespace App\Http\Controllers\Api\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{User, Conversation, Message};
use Carbon\Carbon; 
use App\Events\ChatPusher;

class MessagesController extends Controller
{
    public function getUserList($userId)
    {
        $conversations = Conversation::where('user1_id', $userId)
            ->orWhere('user2_id', $userId)
            ->get();

        $conversations->map(function ($conversation) use ($userId) {
            // Check if user1 is the same as $userId; if not, swap the user IDs
            if ($conversation->user1_id == $userId) {
                $conversation->user1 = User::find($conversation->user1_id);
                $conversation->user2 = User::find($conversation->user2_id);
            } else {
                $conversation->user1 = User::find($conversation->user2_id);
                $conversation->user2 = User::find($conversation->user1_id);
            }
    
            // Get the last message for the conversation
            $lastMessage = Message::where('conversation_id', $conversation->id)
                ->orderBy('created_at', 'desc')
                ->first();
    
            if ($lastMessage) {
                $conversation->last_message_time = Carbon::parse($lastMessage->created_at)->diffForHumans();
            } else {
                $conversation->last_message_time = "Let's chat!";
            }
    
            return $conversation;
        });
    
        return response()->json($conversations);
    }
    

    public function getMessages($user1Id, $user2Id)
    {
        $conversation = Conversation::where(function ($query) use ($user1Id, $user2Id) {
            $query->where('user1_id', $user1Id)->where('user2_id', $user2Id);
        })->orWhere(function ($query) use ($user1Id, $user2Id) {
            $query->where('user1_id', $user2Id)->where('user2_id', $user1Id);
        })->first();
    
        if (!$conversation) {
            return response()->json([]);
        }

        $messages = Message::where('conversation_id', $conversation->id)
            ->orderBy('created_at', 'asc')
            ->get();

        $user1 = User::find($user1Id);
        $user2 = User::find($user2Id);

        $messagesWithUserData = $messages->map(function ($message) use ($user1, $user2) {
            $message->user = $message->sender_id == $user1->id ? $user1 : $user2;
            return $message;
        });

        return response()->json($messagesWithUserData);
    }

    public function addMessage(Request $request)
    {
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'receiver_id' => 'required|exists:users,id',
            'message' => 'required|string',
        ]);
    
        $conversation = Conversation::where(function ($query) use ($request) {
            $query->where('user1_id', $request->sender_id)
                ->where('user2_id', $request->receiver_id);
        })->orWhere(function ($query) use ($request) {
            $query->where('user1_id', $request->receiver_id)
                ->where('user2_id', $request->sender_id);
        })->first();
    
        if (!$conversation) {
            $conversation = Conversation::create([
                'user1_id' => $request->sender_id,
                'user2_id' => $request->receiver_id,
            ]);
        }
    
        $message = Message::create([
            'conversation_id' => $conversation->id,
            'sender_id' => $request->sender_id,
            'message' => $request->message
        ]);
    
        // Eager load the sender relationship
        $message->load('user');
    
        event(new ChatPusher($request->sender_id,$request->receiver_id, $message));
    
        return response()->json($message);
    }
    
}