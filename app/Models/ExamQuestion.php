<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamQuestion extends Model
{
  use HasFactory;

  protected $connection = 'mysql2';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'exam_id',
    'question',
    'slug',
    'type',
    'status'
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
  public function answers()
  {
    return $this->hasMany(ExamAnswer::class, 'question_id');
  }

  public function exam()
  {
    return $this->belongsTo(Exam::class, 'exam_id');
  }
}
