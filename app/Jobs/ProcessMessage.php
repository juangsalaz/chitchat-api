<?php

// app/Jobs/ProcessMessage.php

namespace App\Jobs;

use App\Models\Message;
use App\Models\Chatroom;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Events\MessageSent;

class ProcessMessage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $message;
    protected $chatroom;

    public function __construct(Message $message, Chatroom $chatroom)
    {
        $this->message = $message;
        $this->chatroom = $chatroom;
    }

    public function handle()
    {
        try {
            broadcast(new MessageSent($this->message, $this->chatroom))->toOthers();
        } catch (\Exception $e) {
            \Log::error("Error broadcasting message: " . $e->getMessage());
            // You can throw the exception again if you want the job to fail
            throw $e;
        }
    }
}
