<?php

namespace App\Http\Livewire\Company;

use App\Models\Exam;
use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class ShowExams extends Component
{
  use WithPagination;

  /**
   * Properties
   *
   */
  protected $paginationTheme = 'bootstrap';

  /**
   * Render page
   *
   */
  public function render()
  {
    $company = Company::select('id')
      ->where('user_id', Auth::id())
      ->first();

    $exams = Exam::orderBy('id', 'desc')
      ->where('company_id', $company->id)
      ->paginate(10);

    return view('livewire.company.show-exams', compact('exams'))
      ->layout('companypanel.layout.app');
  }
}
