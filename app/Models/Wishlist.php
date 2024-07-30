<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Posts;

class Wishlist extends Model
{
    use HasFactory;
    protected $table = 'wishlist';

    protected $fillable = [
        'candidate_id',
        'post_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'candidate_id', 'id');
    }
    public function post()
    {
        return $this->belongsTo(Posts::class, 'post_id', 'id');
    }
}
