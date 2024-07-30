<?php

namespace App\Http\Controllers\Company;

use App\Models\Exam;
use App\Models\ExamAnswer;
use Illuminate\Support\Str;
use App\Models\ExamQuestion;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;

class ExamQuestionAnswerController extends Controller
{
  /**
   * Show the form for creating a new resource.
   */
  public function create($id)
  {
    $exam = Exam::where('id', $id)->first();

    return view('companypanel.pages.exam-question.add', compact('exam'));
  }
  
  /**
   * Show the form for creating a new resource.
   */
  public function get_question_data(Request $request)
  {
    $question_type = ExamQuestion::where('id', $request->id)->where('deleted_at',NULL)->first();
    $answers = ExamAnswer::where('question_id', $request->id)->where('deleted_at',NULL)->get();
    
    $var1 = 'value1';
    $var2 = 'value2';

    $data = [
        'question_type' => $question_type,
        'answers' => $answers,
    ];

    return response()->json($data);
    
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request, $id)
  {
    // Validate data
    $this->validate($request, [
      'question'      => 'required',
      'question_type' => ['required', Rule::in(['multiple', 'single', 'text', 'boolean'])],
      'answer.*'      => 'required_if:question_type,multiple',
      'answer2.*'     => 'required_if:question_type,signle',
      'answer_2'      => 'required_if:question_type,text',
    ]);
    
    //dd($request);

    // check if duplicate slug exist the create unique one
    $slug = Str::slug($request->title);
    if (ExamQuestion::whereSlug($slug)->exists()) {
      $slug = $this->uniqueSlug($slug, 'question');
    }

    // Save data into db
    $result = ExamQuestion::create([
      'exam_id'  => $id,
      'question' => $request->question,
      'type'     => $request->question_type,
      'status'   => 1
    ]);

    // Add answers
    if ($request->question_type == 'text') {
      ExamAnswer::create([
        'question_id'   => $result->id,
        'answer'        => $request->answer_2,
        'is_correct'    => 'yes',
      ]);
    } else if ($request->question_type == 'multiple') {
      $counter = 1;
      foreach ($request->answer as $answer) {
        $is_correct = (isset($request['is_correct_m_' . $counter])) ? 1 : 0;
        if ($is_correct == 1) {
          $is_correct = 'yes';
        } else {
          $is_correct = 'no';
        }

        ExamAnswer::create([
          'question_id'   => $result->id,
          'answer'        => $answer,
          'is_correct'    => $is_correct,
        ]);

        $counter++;
      }
    } else if ($request->question_type == 'single') {
      $counter = 1;
      foreach ($request->answer2 as $answer) {
        $is_correct = (int) $request->is_correct;
        if ($counter == $is_correct) {
          $is_correct = 'yes';
        } else {
          $is_correct = 'no';
        }

        ExamAnswer::create([
          'question_id'   => $result->id,
          'answer'        => $answer,
          'is_correct'    => $is_correct,
        ]);

        $counter++;
      }
    } else if ($request->question_type == 'boolean') {
      $is_correct = (int) $request->is_correct;
      
      if ($is_correct == 1) {
        $is_correct = 'yes';
      } else {
        $is_correct = 'no';
      }

      ExamAnswer::create([
        'question_id'   => $result->id,
        'answer'        => null,
        'is_correct'    => $is_correct,
      ]);
    }

    if ($result) {
      if ($request->submit) {
        return redirect()->route('company.exam.question.create', ['id' => $id]);
      } else {
        return redirect()->route('company.exam.question.listing', ['id' => $id])->with('success', 'Record created successfully.');
      }
    } else {
      return redirect()->route('company.exam.question.listing', ['id' => $id])->with('error', 'Sorry something went wrong!');
    }
  }
  
  public function update_question_data(Request $request)
  {
    if ($request->question_type == 'text') {
      
      $result = ExamAnswer::where('question_id', $request->question_id)
                ->update(['answer' => $request->answer_2, 'is_correct' => 'yes']);
                
    } 
    else if ($request->question_type == 'multiple') {
      $old_answer_delete = ExamAnswer::where('question_id',$request->question_id)->delete();
      $counter = 1;
      foreach ($request->answer as $answer) {
        $is_correct = (isset($request['is_correct_m_' . $counter])) ? 1 : 0;
        if ($is_correct == 1) {
          $is_correct = 'yes';
        } else {
          $is_correct = 'no';
        }

       $result = ExamAnswer::create([
          'question_id'   => $request->question_id,
          'answer'        => $answer,
          'is_correct'    => $is_correct,
        ]);

        $counter++;
      }
    } else if ($request->question_type == 'single') {
      $old_answer_delete = ExamAnswer::where('question_id',$request->question_id)->delete();
      $counter = 1;
      foreach ($request->answer2 as $answer) {
        $is_correct = (int) $request->is_correct;
        if ($counter == $is_correct) {
          $is_correct = 'yes';
        } else {
          $is_correct = 'no';
        }

        $result = ExamAnswer::create([
          'question_id'   => $request->question_id,
          'answer'        => $answer,
          'is_correct'    => $is_correct,
        ]);

        $counter++;
      }
    } else if ($request->question_type == 'boolean') {
      $is_correct = (int) $request->is_correct;

      if ($is_correct == 1) {
        $is_correct = 'yes';
      } else {
        $is_correct = 'no';
      }
      
      $result = ExamAnswer::where('question_id', $request->question_id)
                ->update(['answer' => null, 'is_correct' => $is_correct]);
    }
    

    
    return redirect()->route('company.exam.question.update.listing', ['id' => $request->exam_id])
           ->with('message', 'Record Updated successfully!');
    
    

    // $result= "yes";
    // if ($result= "yes") {
    //   if ($request->submit) {
    //     return redirect()->route('company.exam.question.create', ['id' => $result->id]);
    //   } else {
    //     return redirect()->route('company.exam.question.listing', ['id' => $result->id])->with('success', 'Record created successfully.');
    //   }
    // } else {
    //   return redirect()->route('company.exam.question.listing', ['id' => $id])->with('error', 'Sorry something went wrong!');
    // }
  }
  
  public function remove(Request $request)
  {
      //dd($request);
    //Delete user data
    
    $exam_question = ExamQuestion::select('id')->where('id',$request->id)->get();
    $exam_question_delete = ExamQuestion::select('id')->where('id',$request->id)->delete();
    $exam_answer_delete = ExamAnswer::whereIn('question_id',$exam_question)->delete();

    if($exam_question) {
      return redirect()->route('company.exam.question.listing', ['id' => $request->exam_id])->with('success', 'Record Deleted Successfully.');
    } else {
      return redirect()->route('company.exam.question.listing', ['id' => $request->exam_id])->with('error', "Sorry something went wrong!");
    }
  }
}
