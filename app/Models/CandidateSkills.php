<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CandidateSkills extends Model
{
    use HasFactory;

    protected $table = 'candidates_skills';

    protected $fillable = [
        'user_id',
        'skill_id',
    ];

    public function skills()
    {
        return $this->belongsTo(Skills::class, 'skill_id', 'id');
    }
}
