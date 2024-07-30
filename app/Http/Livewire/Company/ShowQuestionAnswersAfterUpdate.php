<?php

namespace App\Http\Livewire\Company;

use App\Models\Exam;
use App\Models\ExamQuestion;
use Livewire\Component;
use Livewire\WithPagination;
use Symfony\Component\Console\Question\Question;

class ShowQuestionAnswersAfterUpdate extends Component
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


    return view('livewire.company.show-question-answers', compact('qa'))
      ->layout('companypanel.layout.app');
  }
}
