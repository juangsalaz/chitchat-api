<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserChatroom extends Pivot
{
  protected $table = 'user_chatroom';
  protected $fillable = ['user_id', 'chatroom_id', 'joined_at', 'is_active'];

  public $timestamps = true;
}
