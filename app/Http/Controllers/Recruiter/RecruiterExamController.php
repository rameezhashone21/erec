<?php

namespace App\Http\Controllers\Recruiter;

use App\Models\Exam;
use App\Models\Recruiter;
use App\Models\ExamQuestion;
use App\Models\ExamAnswer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use ParagonIE\Sodium\Compat;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\Exportable;


class RecruiterExamController extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    return view('recruterpanel.pages.exam.add');
  }
  
  /**
   * Download the Sample Test Format File.
   */
  public function downloadCSV()
  {
        $filePath = public_path('app/public/sample_test.csv'); // Adjust the filename as needed
        
        return response()->download($filePath);
  }
  

  /**
   * Store a newly created resource in storage.
   */
  public function uploadCSV(Request $request)
  {
        
    // Validate data
    $this->validate($request, [
      'csv_file' => 'required|file|mimes:csv',
    ]);
    
    if($request->file('csv_file'))
    {
        $file = $request->file('csv_file');

        // Getting the Exam Id to pass to UsersImport Class in order to save question with exam id 
        $exam_id = $request->exam_id;

        $excel = Excel::import(new UsersImport($exam_id), $file);
    }
        
        
    if ($excel) {
      return redirect()->route('recruiter.exam.question.listing', ['id' => $exam_id])->with('message', 'File Imported Succesfully!');
    } else {
      return redirect()->route('recruiter.exam.question.listing', ['id' => $exam_id])->with('error', 'Sorry something went wrong!');
    }
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
        
        // Validate data
        $this->validate($request, [
          'title'                     => 'required|string',
          'exam_time'                 => ['required', Rule::in(['30', '45', '60', '70'])],
          'question_showto_condidate' => 'required'
        ]);

    // Get recruiter details
    $recruiter = Recruiter::select('id')->where('user_id', Auth::id())->first();

    // check if duplicate slug exist the create unique one
    $slug = Str::slug($request->title);
    if (Exam::whereSlug($slug)->exists()) {
      $slug = $this->uniqueSlug($slug, 'exam');
    }

    // Save data into db
    $result = Exam::create([
      'recruiter_id'                 => $recruiter->id,
      'exam_title'                 => $request->title,
      'slug'                       => $slug,
      'question_showto_condidate'  => $request->question_showto_condidate,
      'exam_completion_in_minutes' => $request->exam_time,
      'status'                     => 0
    ]);
        
        
    if ($result) {
      return redirect()->route('recruiter.exam.listing')->with('success', 'Record created successfully.');
    } else {
      return redirect()->route('recruiter.exam.listing')->with('error', 'Sorry something went wrong!');
    }
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Exam $exam, $id)
  {
    // Get product
    $exam = $exam->where('id', $id)->first();

    return view('recruterpanel.pages.exam.edit', compact('exam'));
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, Exam $exam, $id)
  {
    // Validate data
    $this->validate($request, [
      'title'                     => 'required|string',
      'exam_time'                 => ['required', Rule::in(['30', '45', '60', '70'])],
      'question_showto_condidate' => 'required'
    ]);


    $recruiter = Recruiter::select('id')->where('user_id', Auth::id())->first();

    // Save data into db
    $result = Exam::where('id', $id)->update([
      'recruiter_id'                 => $recruiter->id,
      'exam_title'                 => $request->title,
      'question_showto_condidate'  => $request->question_showto_condidate,
      'exam_completion_in_minutes' => $request->exam_time,
      'status'                     => $request->status
    ]);

    if ($result) {
      return redirect()->route('recruiter.exam.listing')->with('success', 'Record updated successfully.');
    } else {
      return redirect()->route('recruiter.exam.listing')->with('error', 'Sorry something went wrong!');
    }
  }

  /**
   * Remove the specified resource from storage.
   *
   */
  public function destroy(Exam $exam, $id)
  {
    //Delete user data
    $result = $exam->destroy($id);

    if ($result) {
      return redirect()->route('recruiter.exam.listing')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect()->route('recruiter.exam.listing')->with('error', "Sorry something went wrong!");
    }
  }
  
  public function remove(Request $request)
  {
      //dd($request);
    //Delete user data
    $exam = Exam::where('id',$request->id)->first();
    $exam_delete = Exam::where('id',$request->id)->delete();
    $exam_question = ExamQuestion::select('id')->where('exam_id',$exam->id)->get();
    $exam_question_delete = ExamQuestion::select('id')->where('exam_id',$exam->id)->delete();
    $exam_answer_delete = ExamAnswer::whereIn('question_id',$exam_question)->delete();

    if ($exam) {
      return redirect()->route('recruiter.exam.listing')->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect()->route('recruiter.exam.listing')->with('error', "Sorry something went wrong!");
    }
  }
}
