<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QstQuestions extends Model
{
    use HasFactory;
    protected $connection = 'second_db';
    protected $table = 'qst_questions';
    protected $fillable =
    [
        'qst_no',
        'quest_no',
        'q_order',
        'value',
        'q_select',
        'u_id',
        'org_id',
        'branching',
        'referer',
    ] ;
}
