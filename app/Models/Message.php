<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  use HasFactory;

  protected $fillable = ['chatroom_id', 'user_id', 'content', 'attachment_path'];

  // Relationship with Chatroom
  public function chatroom()
  {
    return $this->belongsTo(Chatroom::class);
  }

  // Relationship with User
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  // Relationship with Attachment (optional)
  public function attachment()
  {
    return $this->hasOne(Attachment::class);
  }
}
