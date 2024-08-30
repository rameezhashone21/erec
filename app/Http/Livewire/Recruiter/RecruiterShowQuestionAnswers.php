<?php

namespace App\Http\Livewire\Recruiter;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\Console\Question\Question;

class RecruiterShowQuestionAnswers extends Component
{
  use WithPagination;

  /**
   * Properties
   *
   */
  public $exam;
  protected $paginationTheme = 'bootstrap';

  public function mount($id)
  {
    $this->exam = Exam::where('id', $id)->first();
  }

  /**
   * Render page
   *
   */
  public function render()
  {
    $qa = ExamQuestion::orderBy('id', 'desc')
      ->with('answers')
      ->where('exam_id', $this->exam->id)
      ->paginate(10);


    return view('livewire.recruiter.show-question-answers', compact('qa'))
      ->layout('recruterpanel.layout.app');
  }
}
