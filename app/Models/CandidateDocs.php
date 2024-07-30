<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CandidateDocs extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'candidates_doc';

    protected $fillable = [
        'user_id',
        'document',
        'document_name',
    ];
}
