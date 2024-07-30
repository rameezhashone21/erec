<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SociaLink extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'socialinks';
    protected $fillable = [
        'facebook_link',
        'linkedin_link',
        'insta_link',
        'youtube_link',

    ];
}
