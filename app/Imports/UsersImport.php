<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;

class UsersImport implements ToArray
{
    
    protected $exam_id;

    public function __construct($exam_id)
    {
        $this->exam_id = $exam_id;
    }
    
    public function array(array $array)
    {
        // Process each row (array) using for loops
        for ($i = 0; $i < count($array); $i++) {
            $row = $array[$i];
            
            if($row[0]  == "True/False")
            {

                // Save data into db
                $question = ExamQuestion::create([
                  'exam_id'  => $this->exam_id,
                  'question' => $row[1],
                  'type'     => "boolean",
                  'status'   => 1
                ]);
                
                  if ($row[6]) {
                    $is_correct = 'yes';
                  } else {
                    $is_correct = 'no';
                  }
            
                  ExamAnswer::create([
                    'question_id'   => $question->id,
                    'answer'        => null,
                    'is_correct'    => $is_correct,
                  ]);
    
            }
            elseif($row[0]  == "Text")
            {
                // Save data into db
                $question = ExamQuestion::create([
                  'exam_id'  => $this->exam_id,
                  'question' => $row[1],
                  'type'     => "text",
                  'status'   => 1
                ]);
                
                ExamAnswer::create([
                    'question_id'   => $question->id,
                    'answer'        => $row[6],
                    'is_correct'    => 'yes',
                  ]);
    
            }
            elseif($row[0]  == "Multiple")
            {
                // Save data into db
                $question = ExamQuestion::create([
                  'exam_id'  => $this->exam_id,
                  'question' => $row[1],
                  'type'     => "multiple",
                  'status'   => 1
                ]);
                
                  for ($j = 2; $j <= 5; $j++) {
                      
                    //   dd("match", $row[$j], $row[6]);
                      
                    if(trim($row[$j]) == trim($row[6])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[7])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[8])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[9])) {
                      $is_correct = 'yes';
                    }
                    else {
                      $is_correct = 'no';
                    }
            
                    ExamAnswer::create([
                      'question_id'   => $question->id,
                      'answer'        => $row[$j],
                      'is_correct'    => $is_correct,
                    ]);
            
                  }

            }
            elseif($row[0]  == "Single")
            {
                // Save data into db
                $question = ExamQuestion::create([
                  'exam_id'  => $this->exam_id,
                  'question' => $row[1],
                  'type'     => "single",
                  'status'   => 1
                ]);
                
                  for ($j = 2; $j <= 5; $j++) {
                      
                    //dd("match", $row[$j], $row[6]);
                      
                    if(trim($row[$j]) == trim($row[6])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[6])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[6])) {
                      $is_correct = 'yes';
                    }
                    elseif(trim($row[$j]) == trim($row[6])) {
                      $is_correct = 'yes';
                    }
                    else {
                      $is_correct = 'no';
                    }
            
                    ExamAnswer::create([
                      'question_id'   => $question->id,
                      'answer'        => $row[$j],
                      'is_correct'    => $is_correct,
                    ]);
            
                  }

            }

        }
    }

}