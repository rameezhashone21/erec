<?php

namespace App\Http\Livewire\Recruiter;

use App\Models\Exam;
use App\Models\Recruiter;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class RecruiterShowExams extends Component
{

  public $exams = []; // Ensure this is initialized to an empty array

    public function mount()
    {
        // Load your exams data here, e.g., from a database
        // $this->exams = Exam::all(); // Example
    }

    public function render()
    {
      $company = Recruiter::select('id')
        ->where('user_id', Auth::id())
        ->first();

      $exams_recruiter = Exam::orderBy('id', 'desc')
        ->where('recruiter_id', $company->id)
        ->paginate(10);

        return view('livewire.recruiter.recruiter-show-exams', compact('exams_recruiter'))
          ->layout('recruterpanel.layout.app');
    }
}
