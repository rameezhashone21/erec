<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QstScore extends Model
{
    use HasFactory;
    protected $connection = 'second_db';
    protected $table = 'qst_scores';
    protected $fillable =
    [
        'u_id',
        'qst',
        'mark',
        'marked',
        'bonus',
        'org_id',
    ] ;
}
