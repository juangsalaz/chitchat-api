<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Chatroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\BaseController as BaseController;
use App\Events\MessageSent;

class MessageController extends BaseController
{
    public function send(Request $request, $chatroomId)
    {
        $validated = $request->validate([
            'content' => 'required|string',
            'attachment' => 'file|nullable',
        ]);

        $chatroom = Chatroom::findOrFail($chatroomId);

        $messageData = [
            'user_id' => Auth::id(),
            'chatroom_id' => $chatroomId,
            'content' => $validated['content'],
        ];

        if ($request->hasFile('attachment')) {
            $file = $request->file('attachment');
            $filePath = $file->store('attachments', 'public');
            $messageData['attachment_path'] = $filePath;
        }

        $message = Message::create($messageData);

        //broadcast the message to another users
        broadcast(new MessageSent($message))->toOthers();

        return response()->json($message, 201);
    }

    public function listMessages($chatroomId)
    {
        $messages = Message::where('chatroom_id', $chatroomId)->with('user')->get();
        return response()->json($messages);
    }
}
