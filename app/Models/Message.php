<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'message',
        'second_user',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function seconduser()
    {
        return $this->belongsTo(User::class,'second_user');
    }
}
