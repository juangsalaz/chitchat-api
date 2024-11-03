<?php

namespace App\Http\Controllers;

use App\Models\Chatroom;
use App\Models\UserChatroom;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;

class ChatroomController extends BaseController
{
    public function create(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'max_members' => 'required|integer',
        ]);

        $chatroom = Chatroom::create($validated);

        return $this->sendResponse($chatroom, 'Create a Chatroom successfully.');
    }

    public function index()
    {
        $chatrooms = Chatroom::with('users')->get();

        return $this->sendResponse($chatrooms, 'List all Chatrooms.');
    }

    public function enter(Request $request, $chatroomId)
    {
        $chatroom = Chatroom::findOrFail($chatroomId);

        $exists = UserChatroom::where('user_id', Auth::id())
            ->where('chatroom_id', $chatroomId)
            ->exists();

        if (!$exists) {
            $chatroom->users()->attach(Auth::id(), ['joined_at' => now(), 'is_active' => true]);
        }

        return response()->json(['message' => 'Entered chatroom successfully.']);
    }

    public function leave($chatroomId)
    {
        $chatroom = Chatroom::findOrFail($chatroomId);

        $chatroom->users()->detach(Auth::id());

        return response()->json(['message' => 'Left chatroom successfully.']);
    }
}
