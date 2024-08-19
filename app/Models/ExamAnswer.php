<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExamAnswer extends Model
{
  use HasFactory;

  protected $connection = 'mysql2';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'question_id',
    'answer',
    'is_correct'
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
  public function question()
  {
    return $this->belongsTo(ExamQuestion::class, 'question_id');
  }
}
