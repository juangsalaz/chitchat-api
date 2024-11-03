<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatroom extends Model
{
  use HasFactory;

  protected $fillable = ['name', 'max_members'];

  // Relationship with Users through the pivot table
  public function users()
  {
    return $this->belongsToMany(User::class, 'user_chatroom')
      ->using(UserChatroom::class)
      ->withTimestamps()
      ->withPivot('joined_at', 'is_active');
  }

  // Relationship with Messages
  public function messages()
  {
    return $this->hasMany(Message::class);
  }
}
