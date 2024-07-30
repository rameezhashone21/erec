<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
  use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  /**
   * Increment slug
   */
  public function uniqueSlug($slug, $type)
  {
    switch ($type) {
      case 'exam':
        $original = $slug;
        $count = 2;
        while (Exam::whereSlug($slug)->exists()) {
          $slug = "{$original}-" . $count++;
        }
        return $slug;
        break;
      case 'question':
        $original = $slug;
        $count = 2;
        while (ExamQuestion::whereSlug($slug)->exists()) {
          $slug = "{$original}-" . $count++;
        }
        return $slug;
        break;
    }
  }
}
