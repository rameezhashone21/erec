<?php

namespace App\Traits;

use Illuminate\Support\Str;
use Session;
use Stripe;
use App\Models\User;
use PhpOffice\PhpWord\IOFactory;
use Spatie\PdfToText\Pdf;
// use App\Models\User;

trait ResumeExtractor
{
    private function extractText($file)
    {
        $extension = $file->getClientOriginalExtension();

        if ($extension === 'pdf') {
            // Extract text from PDF using spatie/pdf-to-text
            // dd($file->path());
            return Pdf::getText($file->path());
        } elseif ($extension === 'docx') {
            // Extract text from DOCX using PhpOffice\PhpWord
            $phpWord = IOFactory::load($file->path());
            $sections = $phpWord->getSections();
            $text = '';

            foreach ($sections as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        $text .= $element->getText();
                    }
                }
            }

            return $text;
        }

        return ''; // Handle other file types if necessary
    }
}
