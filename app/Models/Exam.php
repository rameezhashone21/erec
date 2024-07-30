<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exam extends Model
{
  use HasFactory, SoftDeletes;

  protected $connection = 'mysql2';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'company_id',
    'exam_title',
    'slug',
    'exam_completion_in_minutes',
    'question_showto_condidate',
    'status',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [];

  /**
   * Relations
   */
  public function questions()
  {
    return $this->hasMany(ExamQuestion::class, 'exam_id');
  }
}
