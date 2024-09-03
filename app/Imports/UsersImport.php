<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToArray;
use App\Models\ExamAnswer;
use App\Models\ExamQuestion;
use Illuminate\Support\Facades\Log;

class UsersImport implements ToArray
{
    protected $exam_id;
    protected $hasError = false;

    public function __construct($exam_id)
    {
        $this->exam_id = $exam_id;
    }

    public function validate_file(array $array)
    {
        // Return false if headers are correct, true if they are not
        return $array[0][0] != "Type" || $array[0][1] != "Question" || $array[0][2] != "Option1" || $array[0][3] != "Option2" ||
               $array[0][4] != "Option3" || $array[0][5] != "Option4" || $array[0][6] != "Answer1" || $array[0][7] != "Answer2" 
               || $array[0][8] != "Answer3" || $array[0][9] != "Answer4" || $array[3][7] != null
               || $array[3][8] != null || $array[3][9] != null || $array[5][7] != null || $array[5][8] != null
               || $array[5][9] != null;
    }

    public function array(array $array)
    {
        if ($this->validate_file($array)) {
            $this->hasError = true;
            Log::error('Invalid CSV headers.');
            return;
        }

        try {
            for ($i = 1; $i < count($array); $i++) {
                $row = $array[$i];

                // Process each row based on type
                if ($row[0] == "True/False") {
                    $question = ExamQuestion::create([
                        'exam_id'  => $this->exam_id,
                        'question' => $row[1],
                        'type'     => "boolean",
                        'status'   => 1
                    ]);

                    $is_correct = $row[6] ? 'yes' : 'no';

                    ExamAnswer::create([
                        'question_id'   => $question->id,
                        'answer'        => null,
                        'is_correct'    => $is_correct,
                    ]);
                } elseif ($row[0] == "Text") {
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
                } elseif ($row[0] == "Multiple") {
                    $question = ExamQuestion::create([
                        'exam_id'  => $this->exam_id,
                        'question' => $row[1],
                        'type'     => "multiple",
                        'status'   => 1
                    ]);

                    for ($j = 2; $j <= 5; $j++) {
                        $is_correct = in_array(trim($row[$j]), array_map('trim', [$row[6], $row[7], $row[8], $row[9]])) ? 'yes' : 'no';

                        ExamAnswer::create([
                            'question_id'   => $question->id,
                            'answer'        => $row[$j],
                            'is_correct'    => $is_correct,
                        ]);
                    }
                } elseif ($row[0] == "Single") {
                    $question = ExamQuestion::create([
                        'exam_id'  => $this->exam_id,
                        'question' => $row[1],
                        'type'     => "single",
                        'status'   => 1
                    ]);

                    for ($j = 2; $j <= 5; $j++) {
                        $is_correct = trim($row[$j]) == trim($row[6]) ? 'yes' : 'no';

                        ExamAnswer::create([
                            'question_id'   => $question->id,
                            'answer'        => $row[$j],
                            'is_correct'    => $is_correct,
                        ]);
                    }
                }
            }
        } catch (\Exception $e) {
            $this->hasError = true;
            Log::error('Row import failed: ' . $e->getMessage());
        }
    }

    public function onFailure($exception)
    {
        $this->hasError = true;
        Log::error('Import failed: ' . $exception->getMessage());
    }

    public function hasError()
    {
        return $this->hasError;
    }
}