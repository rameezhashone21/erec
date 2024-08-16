<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamNotification extends Model
{
    use HasFactory;

    protected $table = 'exam_notifications';

    protected $fillable = [
        'job_id',
        'content',
        'status',
        'read',
        'user_id',
    ];
}
