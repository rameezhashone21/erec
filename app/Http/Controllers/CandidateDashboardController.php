<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\CandidateDocs;
use App\Models\Candidate;
use App\Models\CandidateProfessionalExp;
use App\Models\Skills;
use App\Models\CandidateSkills;
use App\Models\CandidateEdu;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Posts;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use OpenAI\OpenAI;
use App\Traits\ResumeExtractor;
use GuzzleHttp\Client;
use App\Models\CvBuilder;
use App\Models\CvPersonalInfo;
use App\Models\CvSkills;
use App\Models\CvEducation;
use App\Models\CvExperience;
use App\Models\CvOthers;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;

class CandidateDashboardController extends Controller
{
    //
    use ResumeExtractor;
    public function cvList()
    {
        $user = auth()->user();
        $docs = [];
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $docs = CandidateDocs::where('user_id', auth()->user()->id)->get();
            return view('candidatepanel.pages.cvList', compact('docs'));
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function generate_pdf_cv()
    {
        $theme = Http::get('https://e-rec.com.au/dashboard/css/theme.css');
        $bootstrap = Http::get('https://e-rec.com.au/dashboard/css/bootstrap.min.css');
        $font = Http::get('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

        $imagePath = 'https://e-rec.com.au/images/cv-view-vector.png';
        $imageData = base64_encode(file_get_contents($imagePath));
        $vector = 'data:image/jpeg;base64,' . $imageData;

        $imagePathHead = 'https://e-rec.com.au/images/cv-head.png';
        $imageDataHead = base64_encode(file_get_contents($imagePathHead));
        $head = 'data:image/jpeg;base64,' . $imageDataHead;

        $imagePathUntitled = 'https://e-rec.com.au/storage/candidateAvatar/img/2024-02-16_.125.42857142857_.jpg';
        $imageDataUntitled = base64_encode(file_get_contents($imagePathUntitled));
        $untitled = 'data:image/jpeg;base64,' . $imageDataUntitled;
        $data = CvBuilder::with('contact','experience','education','skills','others')->where('user_id', auth()->user()->id)->latest()->first();
        if ($data->contact->cv_profile != null)
        {
            $untitled = asset('public/storage/' . $data->contact->cv_profile);
        }
        else
        {
            $untitled = asset('/images/image_preview_noimage.png');
        }

        $htmlContent = "<!DOCTYPE html>
        <html lang='en'>

        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
        </head>

        <body>
            <style>
                html,
        body,
        div,
        span,
        applet,
        object,
        iframe,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        blockquote,
        pre,
        a,
        abbr,
        acronym,
        address,
        big,
        cite,
        code,
        del,
        dfn,
        em,
        img,
        ins,
        kbd,
        q,
        s,
        samp,
        small,
        strike,
        strong,
        sub,
        sup,
        tt,
        var,
        b,
        u,
        i,
        center,
        dl,
        dt,
        dd,
        ol,
        ul,
        li,
        fieldset,
        form,
        label,
        legend,
        table,
        caption,
        tbody,
        tfoot,
        thead,
        tr,
        th,
        td,
        article,
        aside,
        canvas,
        details,
        embed,
        figure,
        figcaption,
        footer,
        header,
        hgroup,
        menu,
        nav,
        output,
        ruby,
        section,
        summary,
        time,
        mark,
        audio,
        video {
          margin: 0;
          padding: 0;
          border: 0;
          font-size: 100%;
          font: inherit;
          vertical-align: baseline;
        }

        ol,
        ul {
          list-style: none;
        }

        /* end reset css */

        .img-fluid {
          max-width: 100%;
          height: auto;
        }

        .col-lg-5 {
          flex: 0 0 auto;
          width: 41.66666667%;
        }

        .position-relative {
          position: relative !important;
        }

        .row {
          /* --bs-gutter-x: 1.5rem;
          --bs-gutter-y: 0; */
          display: flex;
          flex-wrap: wrap;
          margin-top: calc(-1 * var(--bs-gutter-y));
          margin-right: calc(-0.5 * var(--bs-gutter-x));
          margin-left: calc(-0.5 * var(--bs-gutter-x));
        }

        .pt-3 {
          padding-top: 1rem !important;
        }

        .mb-4 {
          margin-bottom: 1.5rem !important;
        }
        .g-3,
        .gy-3 {
          --bs-gutter-y: 1rem;
        }

        .col-lg-6 {
          flex: 0 0 auto;
          width: 50%;
        }

        .gap-2 {
          gap: 0.5rem !important;
        }

        .flex-column {
          flex-direction: column !important;
        }
        .d-flex {
          display: flex !important;
        }

        .mt-4 {
          margin-top: 1.5rem !important;
        }

        .gap-2 {
          gap: 0.5rem !important;
        }
        .flex-wrap {
          flex-wrap: wrap !important;
        }

        .text-uppercase {
          text-transform: uppercase !important;
        }
        .fw-bold {
          font-weight: 700 !important;
        }
        .mb-1 {
          margin-bottom: 0.25rem !important;
        }

        .col-lg-4 {
          flex: 0 0 auto;
          width: 33.33333333%;
        }

        .align-items-center {
          align-items: center !important;
        }

        /* cv view css start */

        .cv-view-skills li {
          border-radius: 5px;
          background: #f2f2f2;
          font-size: 14px;
          color: #333;
          padding: 10px 20px;
        }

        .cv-view-profile-image {
          width: 100px;
          height: 100px;
          border-radius: 100%;
          filter: drop-shadow(0px 5px 10px rgba(51, 51, 51, 0.1));
          object-fit: cover;
          object-position: top;
          position: absolute;
          top: -48px;
          background: #fff;
          z-index: 3;
        }

        .cv-profile-name {
          font-weight: 600;
          font-size: 24px;
          color: #333;
        }

        .cv-profile-title {
          font-weight: normal;
          font-size: 16px;
          color: #007ba7;
        }

        .cv-text-primary {
          font-weight: normal;
          font-size: 13px;
          color: #787878;
        }

        .cv-view-body {
          padding: 60px 30px 30px 30px;
        }

        .cv-view {
          box-shadow: 0px 5px 10px rgba(51, 51, 51, 0.05);
          border: 1px solid #007ba7;
          border-radius: 10px;
          background-color: #fff;
          /* height: 100%; */
        }

        .cv-view-header img {
          border-top-left-radius: 10px;
          border-top-right-radius: 10px;
          display: block;
          width: 100%;
        }

        .cv-view.height_one {
          height: 90%;
        }

        .cv-view-bg-voctor {
          position: absolute;
          top: 0;
        }

        .cv-view-header {
          background-color: #fff;
          position: relative;
          z-index: 2;
        }

        .experience-midle-vectors .rounded-div {
          width: 20px;
          height: 20px;
          background: #333;
          border-radius: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .experience-midle-vectors .rounded-div .squir-div {
          width: 6px;
          height: 6px;
          background: #fff;
        }

        .experience-midle-vectors .border-line {
          width: 3px;
          border: 1px dashed #000;
          height: 100%;
          border-top: 0;
          border-bottom: 0;
          border-right: 0;
          position: relative;
          left: 1.2px;
        }

        .experience-box-cv-view {
          display: flex;
        }

        .experience-box-cv-view .first-child {
          flex: 0 0 auto;
          width: 40%;
          padding: 0 12px 12px 0;
        }

        .experience-box-cv-view .third-child {
          flex: 0 0 auto;
          width: 48%;
          padding: 0 0px 12px 12px;
        }

        .experience-box-cv-view .second-child {
          flex: 0 0 auto;
          width: 6%;
        }

        .cv-language-vector {
          width: 8px;
          height: 8px;
          background-color: #333;
          display: block;
          transform: rotate(45deg);
        }

        .cv-view-footer h3 {
          font-weight: 600;
          color: #fff;
        }

        .cv-view-footer {
          border-radius: 0px 0px 10px 10px;
          background: #333;
          text-align: center;
          padding: 14px 0;
        }

        .sticky__div {
          position: sticky;
          top: 80px;
        }

            </style>
            <div class='col-lg-12'>
                <div class='cv-view position-relative'>
                        <img src='" . $vector . "' alt='' class='cv-view-bg-voctor img-fluid'>
                    <div class='cv-view-header'>
                        <img src='" . $head . "' alt='Erec logo' class='img-fluid'>
                    </div>
                    <div class='cv-view-body position-relative'>
                        <img src='" . $untitled . "' alt='profile' class='cv-view-profile-image'>
                        <div class='row'>
                            <div class='col-lg-6'>
                                <h3 class='cv-profile-name'>
                                    ".$data->contact->name." ". $data->contact->father_name."
                                </h3>
                                <h4 class='cv-profile-title'> ".$data->contact->title." </h4>
                            </div>
                            <div class='d-flex flex-column gap-2 col-lg-6'>
                                <p class='cv-text-primary d-flex align-items-center gap-2'>
                                    <span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='11' height='13.746'
                                            viewBox='0 0 11 13.746'>
                                            <path id='Path_5639' data-name='Path 5639'
                                                d='M45,16a5.006,5.006,0,0,0-5,5c0,4.278,4.545,7.51,4.739,7.645a.455.455,0,0,0,.522,0C45.455,28.51,50,25.278,50,21A5.006,5.006,0,0,0,45,16Zm0,3.182A1.818,1.818,0,1,1,43.182,21,1.818,1.818,0,0,1,45,19.182Z'
                                                transform='translate(-39.5 -15.5)' fill='none' stroke='#787878'
                                                stroke-width='1'></path>
                                        </svg>
                                    </span>
                                    <span>
                                        ".$data->contact->location."
                                    </span>
                                </p>
                                <p class='cv-text-primary d-flex align-items-center gap-2'>
                                    <span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='11.004' height='11.004'
                                            viewBox='0 0 11.004 11.004'>
                                            <path id='Path_5640' data-name='Path 5640'
                                                d='M41.994,31.555A2.813,2.813,0,0,1,39.2,34,7.208,7.208,0,0,1,32,26.8a2.813,2.813,0,0,1,2.446-2.794.8.8,0,0,1,.831.476l1.056,2.358v.006a.8.8,0,0,1-.063.755c-.009.014-.019.026-.028.038L35.2,28.874A4.611,4.611,0,0,0,37.141,30.8l1.217-1.036a.406.406,0,0,1,.038-.028.8.8,0,0,1,.759-.07l.007,0,2.356,1.056A.8.8,0,0,1,41.994,31.555Z'
                                                transform='translate(-31.5 -23.498)' fill='none' stroke='#787878'
                                                stroke-width='1'></path>
                                        </svg>
                                    </span>
                                    <span>
                                        ".$data->contact->phone."
                                    </span>
                                </p>
                                <p class='cv-text-primary d-flex align-items-center gap-2'>
                                    <span>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='13.061' height='9.1'
                                            viewBox='0 0 13.061 9.1'>
                                            <path id='Path_5641' data-name='Path 5641'
                                                d='M12.5,14.7V9.3s-5.46,3.81-5.991,4.008C5.987,13.119.5,9.3.5,9.3v5.4c0,.75.159.9.9.9H11.6c.759,0,.9-.132.9-.9m-.009-6.459c0-.546-.159-.741-.891-.741H1.4c-.753,0-.9.234-.9.78l.009.084s5.421,3.732,6,3.936c.612-.237,5.991-4.02,5.991-4.02Z'
                                                transform='translate(0 -7)' fill='none' stroke='#787878' stroke-width='1'>
                                            </path>
                                        </svg>
                                    </span>
                                    <span>
                                        ".$data->contact->email."
                                    </span>
                                </p>
                            </div>
                        </div>
                        <ul class='d-flex flex-wrap cv-view-skills gap-2 mt-4' id='skillsItemsUl'>";
                        foreach ($data->skills as $row)
                        {
                            $htmlContent .= "
                            <li>
                                ".$row->skill."
                            </li>
                            ";
                        }
                        $htmlContent .="</ul>
                        <hr>
                        <div style='margin-bottom: 14px;'>
                            <div id='descriptionWrapper'>
                                <p class='cv-text-primary' id='descriptionView'>
                                    ".$data->contact->about."
                                </p>
                            </div>
                            <div class='row pt-3 mb-4'>
                                <div class='col-lg-6' style='margin-bottom: 14px;'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1'
                                        style='font-size: 16px; margin-bottom: 8px;'>
                                        Date Of Birth
                                    </h4>
                                    <p class='cv-text-primary' id='dateOfBirthView'>".$data->contact->dob."</p>
                                </div>
                                <div class='col-lg-6' style='margin-bottom: 14px;'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1'
                                        style='font-size: 16px; margin-bottom: 8px;'>
                                        Marital Status
                                    </h4>
                                    <p class='cv-text-primary' id='maritalStatusView' style='text-transform: capitalize;'>
                                        ".$data->contact->marital_status."</p>
                                </div>
                                <div class='col-lg-6' style='margin-bottom: 14px;'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1'
                                        style='font-size: 16px; margin-bottom: 8px;'>
                                        Visa Status
                                    </h4>
                                    <p class='cv-text-primary' id='visaStatusView' style='text-transform: capitalize;'>".$data->contact->visa_status."
                                    </p>
                                </div>
                                <div class='col-lg-6' style='margin-bottom: 14px;'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1'
                                        style='font-size: 16px; margin-bottom: 8px;'>
                                        Nationality
                                    </h4>
                                    <p class='cv-text-primary' id='nationalityView' style='text-transform: capitalize;'>".$data->contact->nationality."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h3 class='cv-profile-name' style='margin-bottom: 14px;'>Experience</h3>";
                            foreach($data->experience as $row)
                            {

                                $htmlContent .="
                            <div class='experience-box-cv-view'>
                                <div class='first-child'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1' style='font-size: 16px;'>
                                        ".$row->company."
                                    </h4>
                                    <p class='cv-text-primary mb-1'></p>
                                    <p class='cv-text-primary'>".$row->dates."</p>
                                </div>
                                <div class='experience-midle-vectors d-flex align-items-center flex-column second-child'>
                                    <div class='rounded-div'>
                                        <div class='squir-div'></div>
                                    </div>
                                    <div class='border-line'></div>
                                </div>
                                <div class='third-child'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1' style='font-size: 16px;'>
                                        ".$row->title."
                                    </h4>
                                    <p class='cv-text-primary mb-1'>
                                    ".$row->description."
                                    </p>
                                </div>
                            </div>
                            ";
                            }
                            $htmlContent .="
                        </div>
                        <div class='mt-4' id='newViewDiv'>
                            <h3 class='cv-profile-name' style='margin-bottom: 14px;'>Education</h3>
                            ";
                            foreach($data->education as $row)
                            {

                                $htmlContent .="
                            <div class='experience-box-cv-view' id='experience-box-cv-view-43'>
                                <div class='first-child'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1' id='degreeName-view-43'
                                        style='font-size: 16px;'>".$row->degree."</h4>
                                    <p class='cv-text-primary mb-1' id='educationCity-view-43'>".$row->city."</p>
                                    <p class='cv-text-primary' id='educationDuration-view-43'>".$row->date."</p>
                                </div>
                                <div class='experience-midle-vectors d-flex align-items-center flex-column second-child'>
                                    <div class='rounded-div'>
                                        <div class='squir-div'></div>
                                    </div>
                                    <div class='border-line'></div>
                                </div>
                                <div class='third-child'>
                                    <h4 class='cv-text-primary text-uppercase fw-bold mb-1' id='schoolName-view-43'
                                        style='font-size: 16px;'>".$row->institute."</h4>
                                    <p class='cv-text-primary mb-1' id='educationDescription-view-43'>".$row->description."</p>
                                </div>
                            </div>
                            ";
                            }
                            $htmlContent .="
                        </div>
                        <div class='mt-4' id='languagesWrapper'>
                            <h3 class='cv-profile-name' style='margin-bottom: 14px;'>Languages</h3>
                            <ul class='row' id='languagesItemsUl'>
                            ";
                            foreach($data->others as $row)
                            {

                                $htmlContent .="
                                <li class='col-lg-4 d-flex align-items-center gap-2'>
                                    <span class='cv-language-vector'></span>
                                    <span class='cv-text-primary'>".$row->language."</span>
                                </li>
                                ";
                            }
                            $htmlContent .="
                            </ul>
                        </div>
                    </div>
                    <div class='cv-view-footer'>
                        <h3>".$data->contact->name."</h3>
                    </div>
                </div>
            </div>
        </body>

        </html>";
        // dd($htmlContent);
        $client = new \Pdfcrowd\HtmlToPdfClient("HashOneDeveloper", "e85d1f3bb3c50df86dd1f628ca8f2f7c");
         // Replace with your Pdfcrowd username and API key
        try {
            // Convert HTML to PDF and save to file
            // dd($client);

            // $pdf =  $client->convertUrlToFile("https://hoyhoyibiza.com/about", "example.pdf");
            $client->setPageHeight("-1");
            $pdf = $client->convertString($htmlContent);

            // Optionally, you can return the PDF file for download
            return $pdf;
        } catch (\Pdfcrowd\Error $why) {
            // Handle Pdfcrowd errors
            return response()->json(['error' => 'PDF generation failed: ' . $why->getMessage()], 500);
        }
    }
    public function cv_parser_update_data(Request $request)
    {
        // dd($request->all());
        if ($request->has('contact')) {
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'city', 'state', 'country', 'profile_picture']);
            if ($request->hasFile('profile_picture')) {
                $img = $request->profile_picture;
                $number = rand(1, 999);
                $numb = $number / 7;
                $extension = $img->extension();
                $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                $filenamepath = 'candidateAvatar' . '/' . 'img/' . $filenamenew;
                $filename = $img->move(public_path('storage/candidateAvatar' . '/' . 'img'), $filenamenew);
                $data['cv_profile'] = $filenamepath;
            }
            if($request->has('address') || $request->has('postal') || $request->has('city') || $request->has('state')  || $request->has('country'))
            {
                $data['location'] = $request->address . ', ' . $request->postal . ', ' . $request->city . ', ' . $request->state . ', ' . $request->country;
            }
            // dd($data);
            CvPersonalInfo::where('id', $request->contact_id)->update($data);
            return redirect()->route('candidates.cvParser.skills');
        }
        if ($request->has('skills')) {
            // dd($data);
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'city', 'state', 'country', 'profile_picture']);
            CvSkills::where('cv_builder_id', $request->cv_builder_id)->delete();
            if ($request->has('skill') && $request->skill != '') {
                foreach ($request->skill as $row) {
                    CvSkills::create([
                        'cv_builder_id' => $request->cv_builder_id,
                        'skill' => $row
                    ]);
                }
            }
            return redirect()->route('candidates.cvParser.about');
        }
        if ($request->has('about')) {
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'city', 'state', 'country', 'profile_picture']);
            CvPersonalInfo::where('id', $request->contact_id)->update($data);
            return redirect()->route('candidates.cvParser.experience');
        }
        if ($request->has('edu')) {
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'state', 'country', 'profile_picture']);
            // dd($data);
            CvEducation::where('cv_builder_id', $request->cv_builder_id)->delete();
            if($request->has('institute'))
            {
                foreach ($request->institute as $key => $row) {
                    $check =  CvEducation::create([
                        'cv_builder_id' => $request->cv_builder_id,
                        'degree' => $request->degree[$key],
                        'institute' => $row,
                        'city' => $request->city[$key],
                        'description' => $request->description[$key],
                        'date' => $request->date[$key],
                    ]);
                }
            }
            return redirect()->route('candidates.cvParser.others');
        }
        if ($request->has('exp')) {
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'state', 'country', 'profile_picture']);
            CvExperience::where('cv_builder_id', $request->cv_builder_id)->delete();
            // dd($request->all());
            if($request->has('title') && $request->title != null)
            {
                foreach ($request->title as $key => $row) {
                    if($row != null)
                    {
                        $experience = new CvExperience;
                        $experience->cv_builder_id = $request->cv_builder_id;
                        $experience->title = $row;
                        $experience->company = $request->company[$key];
                        $experience->dates = $request->dates[$key];
                        $experience->city = $request->city[$key];
                        $experience->description = $request->description[$key];
                        $experience->save();
                    }
                }
            }
            return redirect()->route('candidates.cvParser.education');
        }
        if ($request->has('others')) {
            $data = $request->except(['_token', 'contact', 'contact_id', 'address', 'postal', 'state', 'country', 'profile_picture']);
            CvOthers::where('cv_builder_id', $request->cv_builder_id)->delete();
            if ($request->has('language') && $request->language != null) {
                if (count($request->language) > 0) {
                    foreach ($request->language as $key => $row) {
                        CvOthers::create([
                            'cv_builder_id' => $request->cv_builder_id,
                            'language' => $row,
                        ]);
                    }
                }
            }
            $pdf = $this->generate_pdf_cv();

            return response($pdf)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="resume.pdf"');

            // return redirect()->back();
        }
    }
    public function get_pdf_file()
    {
        return view('candidatepanel.pages.resumeParser.pdfFile');
    }
    public function cvParser()
    {
        return view('candidatepanel.pages.resumeParser.cvParser');
    }
    public function cvParserContact()
    {
        $contact = CvBuilder::with('contact')->where('user_id', auth()->user()->id)->latest()->first();
        // dd($contact->toArray());
        return view('candidatepanel.pages.resumeParser.cvParserContact', compact('contact'));
    }
    public function cvParserAbout()
    {
        $contact = CvBuilder::with('contact')->where('user_id', auth()->user()->id)->latest()->first();
        return view('candidatepanel.pages.resumeParser.cvParserAbout', compact('contact'));
    }
    public function cvParserExperience()
    {
        $exp = CvBuilder::with(['experience' => function ($query) {
            $query->orderBy('id', 'asc');
        }])->where('user_id', auth()->user()->id)->latest()->first();
        // dd($exp->toArray());
        return view('candidatepanel.pages.resumeParser.cvParserExperience', compact('exp'));
    }
    public function cvParserEducation()
    {
        $edu = CvBuilder::with('education')->where('user_id', auth()->user()->id)->latest()->first();
        // dd($edu->toArray());
        return view('candidatepanel.pages.resumeParser.cvParserEducation', compact('edu'));
    }
    public function cvParserOthers()
    {
        $other = CvBuilder::with('others')->where('user_id', auth()->user()->id)->latest()->first();
        return view('candidatepanel.pages.resumeParser.cvParserOther', compact('other'));
    }
    public function cvParserSkills()
    {
        $skills = CvBuilder::with('skills')->where('user_id', auth()->user()->id)->latest()->first();
        $otherSkills = Skills::get();
        return view('candidatepanel.pages.resumeParser.cvParserSkill', compact('skills', 'otherSkills'));
    }
    public function parseResume(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'resume_file' => 'mimes:pdf|max:10240', // Adjust max file size as needed
        ]);

        // Get the uploaded file
        $resumeFile = $request->file('resume_file');

        $apiKey = env('OPENAI_API_KEY');
        
        $resumeText = $request->extracted_text;
        $dummy_text = "Has s an   Sultan   Fullstack   Web   Developer    •   Result   oriented   Web   Developer   with   5+   years   of   working   experience using Laravel, VueJS and MySQL.    •   Highly   knowledgeable   in   REST   APIs,   Test   Driven   Development,   payment   gateway integrations and web scraping.    •   Solid   experience   with   Linux   server   administration,   setup   and   management.       Personal   Info      Phone    Experience       2018 - 02   -   Web   Developer    +92   3 012691232   20 19 - 02   One Ten Logics ,   Karachi    E - mail    h.hsultan277@gmail.com       Date   of   birth    199 7 - 0 6 - 18       Github    github.com/hassasultan       Fiverr    fiverr.com/hassan8125    Upwork    upwork.com/fl/ hassansultan8  125                            201 9 - 0 2   -    20 20 - 04    •   Developed   multiple   REST   APIs   using   Laravel   API   Resources.    •   Integrated   various   APIs   including   Google   Places,   Flights   and   Hotels   APIs.    •   Programmed   and   implemented   multiple   Web   scrappers   for   data   gathering.    •   Worked   on   data   cleaning   and   data   visualization.    •   Configured,   deployed   and   administered   multiple   AWS   instances.       Web   App   Developer    Shashi Enterprises,   Karachi    •   Built   chhatt .com   and   various   other   website   portals.    •   Integrated   multiple   payment   gateways.    •   Designed   multi   user   authentication   systems   with   roles   for   various   types   of   user s  Programming   Skills           20 20 - 05   -    20 21 - 0 1    Senior W eb   Developer    Code Box Solution,   Karachi    Programming   Languages   –   PHP ,   Javascript , JQuery ,   N odeJs,   Expressjs,   Sale s for ce Admin   &   Python    Backend   Framework   –   Laravel ,   PHP ,   Concerete5,   N od e js   &   Express js    •   Developed,   tested   and   deployed   web   applications   using   Laravel ,  JQuery   &   Vuejs .    •   Improved   legacy   code   of   custom   framework.  Frontend   Framework   –   VueJS ,   Flutter       Component   Framework   –   Bootstrap ,   Vuetify    Further   Skills   -   Wordpress ,   Twig ,    C oncerete5,   j Query ,  HTML ,  CSS    Database   Skills        MySQL    MongoDB   Firebase   Amazon   RDS    20 21 - 0 2   -    20 21 - 11                      2021 - 02   -    Work ing                                  Education      201 6   -    20 20    Senior  Web   Developer    Shashi Enterprises (Rehbur Technologies), Karachi    •   Built   rehbur.com   ( Providing Ride Hailing   Service Through Online Cab Booking App   In Pakistan) .    •   Integrated   JazzCash   payment   gateways.    •   Designed   multi   user   authentication   systems   with   roles   for   various   types   of   users    Added   security   measures   to   improve   security   and   performance   of   websites       Senior  Software Engineer    Hash One Creative , Karachi    •   Developed   multiple   REST   APIs   using   Laravel   API   Resources.    •   Integrated   various Third party   APIs   including   Zoho, Quick Book, GooglePlaces,    directions .    •   Programmed   and   implemented   multiple   Web   scrappers   for   data   gathering.    •   Worked   on   data   cleaning   and   data   visualization.    •   Configured,   deployed   and   administered   multiple   AWS   instances.    •   Developed   multiple   REST   APIs   using   Node and Express js   Resources.    •   Integrate   Api s in F lutter  Application            Bachelors   in   Computer   Science    PAF - KEIT,   Pakistan.  Languages         English   (fluent)       Urdu   (native)       Interests        Traveling,   Salesforce ,   History, AI.  Technical   Skills      •   Proficient   in    RestAPIs ,   Web    Scraping   and    Google   APIs .    •   Skilled   in   Integration    of   payment   gateways   -   Paypal ,   Stripe ,   JazzCash   and    Easypaisa .    •   Sufficient   knowledge   of   Linux   (Ubuntu),   Git   and   Laravel -   Homestead .    •   Expert   in   tools   like   Postman ,   PHPStorm ,   MySQL   VsCode   and    Photoshop .    Server Management  Skill •   Managed   and   configured   instances   on   EC2   of   Amazon   Web   Services .    •   Managed   and   deployed   instances   on   Digital   Ocean   with   and   without   Laravel   Forge.    •   Handled   Google   Cloud   services   and   implemented   Google   Maps   &   Places   APIs.";

        // dd($dummy_text);
        $asistant = '{

            "contact": {
                "phone": "+92 3012691232",
                "email": "h.hsultan277@gmail.com",
                "github": "github.com/hassasultan",
                "fiverr": "fiverr.com/hassan8125",
                "upwork": "upwork.com/fl/hassansultan8125"
            },
            "personal_info": {
                "name": "Hassan Sultan",
                "date_of_birth": "1997-06-18",
                "languages": ["English (fluent)", "Urdu (native)"],
                "interests": ["Traveling", "Salesforce", "History", "AI"]
            },
            "education": {
                0 =>[
                "degree": "Bachelors in Computer Science",
                "university": "PAF - KEIT, Pakistan",
                "completion_year": 2020
                ]
            },
            "experience": [
                {
                    "title": "Web Developer",
                    "company": "One Ten Logics, Karachi",
                    "dates": "2018-02 - 2019-02",
                    "responsibilities": [
                        "Developed multiple REST APIs using Laravel API Resources.",
                        "Integrated various APIs including Google Places, Flights, and Hotels APIs.",
                        "Programmed and implemented multiple Web scrappers for data gathering.",
                        "Worked on data cleaning and data visualization.",
                        "Configured, deployed, and administered multiple AWS instances."
                    ]
                },
                {
                    "title": "Web App Developer",
                    "company": "Shashi Enterprises, Karachi",
                    "dates": "2019-02 - 2020-04",
                    "responsibilities": [
                        "Built chhatt.com and various other website portals.",
                        "Integrated multiple payment gateways.",
                        "Designed multi-user authentication systems with roles for various types of users."
                    ]
                },
                {
                    "title": "Senior Web Developer",
                    "company": "Code Box Solution, Karachi",
                    "dates": "2020-05 - 2021-01",
                    "responsibilities": [
                        "Developed, tested, and deployed web applications using Laravel, JQuery, and Vuejs.",
                        "Improved legacy code of custom framework."
                    ]
                },
                {
                    "title": "Senior Web Developer",
                    "company": "Shashi Enterprises (Rehbur Technologies), Karachi",
                    "dates": "2016-2020",
                    "responsibilities": [
                        "Built rehbur.com (Providing Ride Hailing Service Through Online Cab Booking App In Pakistan).",
                        "Integrated JazzCash payment gateways.",
                        "Designed multi-user authentication systems with roles for various types of users.",
                        "Added security measures to improve security and performance of websites."
                    ]
                },
                {
                    "title": "Senior Software Engineer",
                    "company": "Hash One Creative, Karachi",
                    "dates": "2021-02 - Present",
                    "responsibilities": [
                        "Developed multiple REST APIs using Laravel API Resources.",
                        "Integrated various third-party APIs including Zoho, Quick Book, GooglePlaces, directions.",
                        "Programmed and implemented multiple Web scrappers for data gathering.",
                        "Worked on data cleaning and data visualization.",
                        "Configured, deployed, and administered multiple AWS instances.",
                        "Developed multiple REST APIs using Node and Express js.",
                        "Integrated APIs in Flutter Application."
                    ]
                }
            ],
            "programming_skills": {
                "languages": ["PHP", "Javascript", "JQuery", "NodeJs", "Expressjs", "Salesforce Admin", "Python"],
                "backend_frameworks": ["Laravel", "PHP", "Concerete5", "Node js", "Express js"],
                "frontend_frameworks": ["VueJS", "Flutter"],
                "component_frameworks": ["Bootstrap", "Vuetify"],
                "further_skills": ["Wordpress", "Twig", "Concrete5", "jQuery", "HTML", "CSS"]
            },
            "database_skills": ["MySQL", "MongoDB", "Firebase", "Amazon RDS"],
            "technical_skills": [
                "Proficient in RestAPIs, Web Scraping, and Google APIs.",
                "Skilled in Integration of payment gateways - Paypal, Stripe, JazzCash, and Easypaisa.",
                "Sufficient knowledge of Linux (Ubuntu), Git, and Laravel-Homestead.",
                "Expert in tools like Postman, PHPStorm, MySQL, VSCode, and Photoshop."
            ],
            "server_management_skill": [
                "Managed and configured instances on EC2 of Amazon Web Services.",
                "Managed and deployed instances on Digital Ocean with and without Laravel Forge.",
                "Handled Google Cloud services and implemented Google Maps & Places APIs."
            ]
        }';
        // dd(json_encode($asistant));
        $endpoint = 'https://api.openai.com/v1/chat/completions';

        // Set the resume content
        $resumeContent = $resumeText; // Your resume content goes here

        // Prepare the data for the request
        $data = [
            'model' => 'gpt-4-0613',
            'messages' => [
                [
                    'role' => 'user',
                    'content' => 'Generate proper and uniform json Response just like asistant specifically experience and education should exact like asistant without ```,json,\n and \t of the following text data and ' . $dummy_text
                ],
                [
                    'role' => 'assistant',
                    'content' => $asistant
                ],
                [
                    'role' => 'user',
                    'content' => 'Generate proper and uniform json Response just like asistant specifically experience and education should exact like asistant without ```,json,\n and \t of the following text data and ' . $resumeContent
                ],

            ]
        ];

        // Convert data to JSON format
        $jsonData = json_encode($data);

        // Initialize cURL session
        $ch = curl_init($endpoint);

        // Set cURL options
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $jsonData,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . $apiKey,
            ],
        ]);

        // Execute cURL session and get the response
        $response = curl_exec($ch);

        
        // Check for cURL errors
        if (curl_errno($ch)) {
            echo 'cURL error: ' . curl_error($ch);
        } else {
            // Decode the JSON response
            // dd($response);
            $responseData = json_decode($response, true);
            // dd($responseData);
            // Close cURL session
            curl_close($ch);
            // dd($responseData);
            // Handle the parsed data as needed (save to database, etc.)
            if (isset($responseData['choices'][0]['message']['content'])) {
                $parsedResume = json_decode($responseData['choices'][0]['message']['content'], true);
                if ($parsedResume == null) {
                    return redirect()->back()->with('error',"Please Try again...");
                }
                // $parsedResume = $responseData['choices'][0]['message']['content'];
                // Now you can save $parsedResume to your database or perform any other actions
                // dd($parsedResume);
                DB::beginTransaction();
                $str = null;
                $builder = new CvBuilder();
                $builder->user_id = auth()->user()->id;
                if (isset($parsedResume['objectives'])) {
                    if (is_array($parsedResume['objectives'])) {
                        $str = strtolower(implode(',', $parsedResume['objectives']));
                    } else {
                        $str = strtolower($parsedResume['objectives']);
                    }
                    $builder->objective = $str;
                }
                if (isset($parsedResume['career_objective'])) {
                    if (is_array($parsedResume['career_objective'])) {
                        $str = strtolower(implode(',', $parsedResume['career_objective']));
                    } else {
                        $str = strtolower($parsedResume['career_objective']);
                    }
                    $builder->objective = $str;
                }
                $builder->save();
                $personal_info = new CvPersonalInfo();
                $personal_info->cv_builder_id = $builder->id;
                if (isset($parsedResume['personal_info'])) {
                    if (isset($parsedResume['personal_info']['name'])) {
                        $personal_info->name = $parsedResume['personal_info']['name'];
                    }
                    if (isset($parsedResume['personal_info']['father_name'])) {
                        $personal_info->father_name = $parsedResume['personal_info']['father_name'];
                    }
                    if (isset($parsedResume['personal_info']['email'])) {
                        $personal_info->email = $parsedResume['personal_info']['email'];
                    }
                    if (isset($parsedResume['contact']['email'])) {
                        $personal_info->email = $parsedResume['contact']['email'];
                    }
                    if (isset($parsedResume['personal_info']['phone'])) {
                        $personal_info->phone = $parsedResume['personal_info']['phone'];
                    }
                    if (isset($parsedResume['contact']['phone'])) {
                        $personal_info->phone = $parsedResume['contact']['phone'];
                    }
                    if (isset($parsedResume['personal_info']['age'])) {
                        $personal_info->age = $parsedResume['personal_info']['age'];
                    }
                    if (isset($parsedResume['personal_info']['date_of_birth'])) {
                        $personal_info->dob = $parsedResume['personal_info']['date_of_birth'];
                    }
                    if (isset($parsedResume['personal_info']['title'])) {
                        $personal_info->title = $parsedResume['personal_info']['title'];
                    }
                    if (isset($parsedResume['personal_info']['location'])) {
                        $personal_info->location = $parsedResume['personal_info']['location'];
                    }
                    if (isset($parsedResume['personal_info']['summary'])) {
                        $personal_info->summary = $parsedResume['personal_info']['summary'];
                    }
                    if (isset($parsedResume['personal_info']['marital_status'])) {
                        $personal_info->marital_status = $parsedResume['personal_info']['marital_status'];
                    }
                    if (isset($parsedResume['objectives'])) {
                        $personal_info->about = $str;
                    }
                    if (isset($parsedResume['career_objective'])) {
                        $personal_info->about = $str;
                    }
                }
                if (isset($parsedResume['contact'])) {
                    if (isset($parsedResume['contact']['name'])) {
                        $personal_info->name = $parsedResume['contact']['name'];
                    }
                    if (isset($parsedResume['contact']['father_name'])) {
                        $personal_info->father_name = $parsedResume['contact']['father_name'];
                    }
                    if (isset($parsedResume['contact']['email'])) {
                        $personal_info->email = $parsedResume['contact']['email'];
                    }
                    if (isset($parsedResume['contact']['email'])) {
                        $personal_info->email = $parsedResume['contact']['email'];
                    }
                    if (isset($parsedResume['contact']['phone'])) {
                        $personal_info->phone = $parsedResume['contact']['phone'];
                    }
                    if (isset($parsedResume['contact']['phone'])) {
                        $personal_info->phone = $parsedResume['contact']['phone'];
                    }
                    if (isset($parsedResume['contact']['age'])) {
                        $personal_info->age = $parsedResume['contact']['age'];
                    }
                    if (isset($parsedResume['contact']['date_of_birth'])) {
                        $personal_info->dob = $parsedResume['contact']['date_of_birth'];
                    }
                    if (isset($parsedResume['contact']['title'])) {
                        $personal_info->title = $parsedResume['contact']['title'];
                    }
                    if (isset($parsedResume['personal_info']['location'])) {
                        $personal_info->location = $parsedResume['personal_info']['location'];
                    }
                    if (isset($parsedResume['contact']['summary'])) {
                        $personal_info->summary = $parsedResume['contact']['summary'];
                    }
                }
                $personal_info->save();

                if (isset($parsedResume['education'])) {
                    if (is_array($parsedResume['education'])) {
                        foreach ($parsedResume['education'] as $row) {
                            if (!empty($row)) {
                                $education = new CvEducation();
                                $education->cv_builder_id = $builder->id;
                                if (isset($row['degree'])) {
                                    $education->degree = $row['degree'];
                                }
                                if (isset($row['course'])) {
                                    $education->degree = $row['course'];
                                }
                                if (isset($row['description'])) {
                                    $education->description = $row['description'];
                                }
                                if (isset($row['date'])) {
                                    $education->date = $row['date'];
                                }
                                if (isset($row['year'])) {
                                    $education->date = $row['year'];
                                }
                                if (isset($row['completion_year'])) {
                                    $education->date = $row['completion_year'];
                                }
                                if (isset($row['completion_date'])) {
                                    $education->date = $row['completion_date'];
                                }
                                if (isset($row['duration'])) {
                                    $education->date = $row['duration'];
                                }
                                if (isset($row['institute'])) {
                                    $education->institute = $row['institute'];
                                }
                                if (isset($row['university'])) {
                                    $education->institute = $row['university'];
                                }
                                if (isset($row['institution'])) {
                                    $education->institute = $row['institution'];
                                }
                                $education->save();
                            }
                        }
                    } else {
                        $education = new CvEducation();
                        $education->cv_builder_id = $builder->id;
                        if (isset($parsedResume['education']['degree'])) {
                            $education->degree = $parsedResume['education']['degree'];
                        }
                        if (isset($parsedResume['education']['course'])) {
                            $education->degree = $parsedResume['education']['course'];
                        }
                        if (isset($parsedResume['education']['description'])) {
                            $education->description = $parsedResume['education']['description'];
                        }
                        if (isset($parsedResume['education']['date'])) {
                            $education->date = $parsedResume['education']['date'];
                        }
                        if (isset($parsedResume['education']['year'])) {
                            $education->date = $parsedResume['education']['year'];
                        }
                        if (isset($parsedResume['education']['completion_year'])) {
                            $education->date = $parsedResume['education']['completion_year'];
                        }
                        if (isset($parsedResume['education']['completion_date'])) {
                            $education->date = $parsedResume['education']['completion_date'];
                        }
                        if (isset($parsedResume['education']['duration'])) {
                            $education->date = $parsedResume['education']['duration'];
                        }
                        if (isset($parsedResume['education']['institute'])) {
                            $education->institute = $parsedResume['education']['institute'];
                        }
                        if (isset($parsedResume['education']['university'])) {
                            $education->institute = $parsedResume['education']['university'];
                        }
                        if (isset($parsedResume['education']['institution'])) {
                            $education->institute = $parsedResume['education']['institution'];
                        }
                        $education->save();
                    }
                }
                if (isset($parsedResume['experience'])) {
                    if (is_array($parsedResume['experience'])) {
                        foreach ($parsedResume['experience'] as $row) {
                            if (!empty($row)) {
                                $experience = new CvExperience();
                                $experience->cv_builder_id = $builder->id;
                                if (isset($row['title'])) {
                                    $experience->title = $row['title'];
                                }
                                if (isset($row['position'])) {
                                    $experience->title = $row['position'];
                                }
                                if (isset($row['company'])) {
                                    $experience->company = $row['company'];
                                }
                                if (isset($row['dates'])) {
                                    $experience->dates = $row['dates'];
                                }
                                if (isset($row['year'])) {
                                    $experience->dates = $row['year'];
                                }

                                $experience->save();
                            }
                        }
                    }
                }
                if (isset($parsedResume['programmingSkills'])) {
                    if (isset($parsedResume['programmingSkills']['languages'])) {
                        foreach ($parsedResume['programmingSkills']['languages'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['backend_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['backend_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['frontend_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['frontend_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['component_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['component_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['furtherSkills'])) {
                        foreach ($parsedResume['programmingSkills']['furtherSkills'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                }
                if (isset($parsedResume['skills'])) {
                    foreach ($parsedResume['skills'] as $row) {
                        CvSkills::create([
                            'cv_builder_id' => $builder->id,
                            'skill' => $row
                        ]);
                    }
                }
                if (isset($parsedResume['database_skills'])) {
                    foreach ($parsedResume['database_skills'] as $row) {
                        CvSkills::create([
                            'cv_builder_id' => $builder->id,
                            'skill' => $row
                        ]);
                    }
                }
                if (isset($parsedResume['databases'])) {
                    foreach ($parsedResume['databases'] as $row) {
                        CvSkills::create([
                            'cv_builder_id' => $builder->id,
                            'skill' => $row
                        ]);
                    }
                }
                if (isset($parsedResume['programming_skills'])) {
                    if (isset($parsedResume['programmingSkills']['languages'])) {
                        foreach ($parsedResume['programmingSkills']['languages'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['backend_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['backend_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['frontend_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['frontend_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['component_frameworks'])) {
                        foreach ($parsedResume['programmingSkills']['component_frameworks'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                    if (isset($parsedResume['programmingSkills']['furtherSkills'])) {
                        foreach ($parsedResume['programmingSkills']['furtherSkills'] as $row) {
                            CvSkills::create([
                                'cv_builder_id' => $builder->id,
                                'skill' => $row
                            ]);
                        }
                    }
                }

                DB::commit();


                return redirect()->route('candidates.cvParser.contact');
            } else {
                // echo 'Error in parsing resume content';
                return redirect()->back();

                // dd("Error in parsing resume content");
            }
        }

        // $dummy_text = json_encode($resumeText);
        // $asistant = json_encode('{
        //     "name": "Hassan Sultan",
        //     "contact": {
        //         "phone": "+92 3012691232",
        //         "email": "h.hsultan277@gmail.com",
        //         "github": "github.com/hassasultan",
        //         "fiverr": "fiverr.com/hassan8125",
        //         "upwork": "upwork.com/fl/hassansultan8125"
        //     },
        //     "personal_info": {
        //         "date_of_birth": "1997-06-18",
        //         "languages": ["English (fluent)", "Urdu (native)"],
        //         "interests": ["Traveling", "Salesforce", "History", "AI"]
        //     },
        //     "education": {
        //         "degree": "Bachelors in Computer Science",
        //         "university": "PAF - KEIT, Pakistan",
        //         "completion_year": 2020
        //     },
        //     "experience": [
        //         {
        //             "title": "Web Developer",
        //             "company": "One Ten Logics, Karachi",
        //             "dates": "2018-02 - 2019-02",
        //             "responsibilities": [
        //                 "Developed multiple REST APIs using Laravel API Resources.",
        //                 "Integrated various APIs including Google Places, Flights, and Hotels APIs.",
        //                 "Programmed and implemented multiple Web scrappers for data gathering.",
        //                 "Worked on data cleaning and data visualization.",
        //                 "Configured, deployed, and administered multiple AWS instances."
        //             ]
        //         },
        //         {
        //             "title": "Web App Developer",
        //             "company": "Shashi Enterprises, Karachi",
        //             "dates": "2019-02 - 2020-04",
        //             "responsibilities": [
        //                 "Built chhatt.com and various other website portals.",
        //                 "Integrated multiple payment gateways.",
        //                 "Designed multi-user authentication systems with roles for various types of users."
        //             ]
        //         },
        //         {
        //             "title": "Senior Web Developer",
        //             "company": "Code Box Solution, Karachi",
        //             "dates": "2020-05 - 2021-01",
        //             "responsibilities": [
        //                 "Developed, tested, and deployed web applications using Laravel, JQuery, and Vuejs.",
        //                 "Improved legacy code of custom framework."
        //             ]
        //         },
        //         {
        //             "title": "Senior Web Developer",
        //             "company": "Shashi Enterprises (Rehbur Technologies), Karachi",
        //             "dates": "2016-2020",
        //             "responsibilities": [
        //                 "Built rehbur.com (Providing Ride Hailing Service Through Online Cab Booking App In Pakistan).",
        //                 "Integrated JazzCash payment gateways.",
        //                 "Designed multi-user authentication systems with roles for various types of users.",
        //                 "Added security measures to improve security and performance of websites."
        //             ]
        //         },
        //         {
        //             "title": "Senior Software Engineer",
        //             "company": "Hash One Creative, Karachi",
        //             "dates": "2021-02 - Present",
        //             "responsibilities": [
        //                 "Developed multiple REST APIs using Laravel API Resources.",
        //                 "Integrated various third-party APIs including Zoho, Quick Book, GooglePlaces, directions.",
        //                 "Programmed and implemented multiple Web scrappers for data gathering.",
        //                 "Worked on data cleaning and data visualization.",
        //                 "Configured, deployed, and administered multiple AWS instances.",
        //                 "Developed multiple REST APIs using Node and Express js.",
        //                 "Integrated APIs in Flutter Application."
        //             ]
        //         }
        //     ],
        //     "programming_skills": {
        //         "languages": ["PHP", "Javascript", "JQuery", "NodeJs", "Expressjs", "Salesforce Admin", "Python"],
        //         "backend_frameworks": ["Laravel", "PHP", "Concerete5", "Node js", "Express js"],
        //         "frontend_frameworks": ["VueJS", "Flutter"],
        //         "component_frameworks": ["Bootstrap", "Vuetify"],
        //         "further_skills": ["Wordpress", "Twig", "Concrete5", "jQuery", "HTML", "CSS"]
        //     },
        //     "database_skills": ["MySQL", "MongoDB", "Firebase", "Amazon RDS"],
        //     "technical_skills": [
        //         "Proficient in RestAPIs, Web Scraping, and Google APIs.",
        //         "Skilled in Integration of payment gateways - Paypal, Stripe, JazzCash, and Easypaisa.",
        //         "Sufficient knowledge of Linux (Ubuntu), Git, and Laravel-Homestead.",
        //         "Expert in tools like Postman, PHPStorm, MySQL, VSCode, and Photoshop."
        //     ],
        //     "server_management_skill": [
        //         "Managed and configured instances on EC2 of Amazon Web Services.",
        //         "Managed and deployed instances on Digital Ocean with and without Laravel Forge.",
        //         "Handled Google Cloud services and implemented Google Maps & Places APIs."
        //     ]
        // }
        // ');
        // // echo $asistant;
        // // dd("end");

        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.openai.com/v1/chat/completions',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => '{
        //     "model": "gpt-4-1106-preview",
        //     "messages": [
        //       {
        //         "role": "system",
        //         "content": "You are a helpful assistant."
        //       },
        //       {
        //         "role": "user",
        //         "content": "Generate proper json Response without ```,json,\n and \t of the following text data and ' . $dummy_text . '"
        //       },
        //       {
        //         "role": "assistant",
        //         "content": ' . $asistant . '
        //       },
        //       {
        //         "role": "user",
        //         "content": "Generate proper json Response without ```,json,\n and \t of the following text data ' . $resumeText . '"
        //       }
        //     ]
        //   }',
        //     CURLOPT_HTTPHEADER => array(
        //         'Content-Type: application/json',
        //         'Authorization: Bearer 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',
        //         'Cookie: __cf_bm=rc5dRtyyGAmF_cbzjo5Pcimn1iJ5nyXt3jT7w8l0h2k-1705412287-1-ASk4K24H4rnHqIw/Y5HT2CpFnPp6hTqOTB+XOPe4hz1auHtVWjwwYKipNeyCV3z73p+3Q3zLGGFhziTTbX9Hj2I=; _cfuvid=obaLuwE.PrOgB5rcn8BaxIz50WZUCv.gogYmJsPWeWU-1705412287517-0-604800000'
        //     ),
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // // echo $response;
        // $data = json_decode($response, true);
        // $content = $data;
        // // dd($content);
        // if (!isset($content['choices'])) {
        //     dd($content);
        // }
        // // dd($content);

        // $get_json = $content['choices'][0]['message']['content'];
        // dd(json_decode($get_json, true));
        // $content['choices'][0]['message']['content'];
        // $client = new Client();

        // // try {
        //     $response = $client->post('https://api.openai.com/v1/engines/gpt-3.5-turbo/completions', [
        //         'headers' => [
        //             'Content-Type' => 'application/json',
        //             'Authorization' => 'Bearer ' . $openAiApiKey,
        //         ],
        //         'json' => [
        //             'prompt' => "Parse the following resume:\n$resumeText",
        //             'max_tokens' => 100,
        //             'temperature' => 0.5,
        //         ],
        //     ]);

        //     $parsedResume = json_decode($response->getBody()->getContents(), true)['choices'][0]['text'];
        // dd($response);
        // Process $parsedResume as needed

        // return response()->json(['parsed_resume' => $parsedResume]);
        // } catch (Exception $e) {
        //     // Handle API request error
        //     dd($e);
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }

        // Extract text from PDF or DOCX
        // $resumeText = $this->extractText($resumeFile);
        // // Use OpenAI to perform natural language processing on the resume text
        // $response = OpenAI::create([
        //     'model' => 'text-davinci-003',
        //     'prompt' => "Parse the following resume:\n$resumeText",
        //     'max_tokens' => 100,
        //     'temperature' => 0.5,
        // ]);

        // $parsedResume = $response['choices'][0]['text'];
        // dd($parsedResume);

        // Process $parsedResume as needed

        // return response()->json(['parsed_resume' => $parsedResume]);
    }
    public function visibility($id)
    {
        // dd($id);
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $can = Candidate::find(auth()->user()->candidate->id);
            $can->status = $id;
            $can->save();
            return response()->json(['message', 'success']);
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function candidatesProfile()
    {
        $userC = auth()->user();
        // if ($userC->candidate != NULL && $userC->candidateEdu != NULL && $userC->candidatePro != NULL) {
        if ($userC->candidate != NULL && count($userC->candidateEdu) != 0 && count($userC->candidatePro) != 0) {
            $user = User::with('candidate', 'candidateEdu', 'candidatePro', 'resume', 'skills')->where('id', auth()->user()->id)->latest('created_at')->first();
            // dd($user->toArray());
            $skill = Skills::all();
            return view('candidatepanel.pages.detail', compact('user', 'skill'));
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function candidatesEducation()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $user = User::with('candidateEdu')->where('id', auth()->user()->id)->latest('created_at')->first();
            // dd($user->candidateEdu->toArray());
            return view('candidatepanel.pages.education', compact('user'));
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function newEducation()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            return view('candidatepanel.pages.newEducation');
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function candidatesProfession()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $user = User::with('candidatePro')->where('id', auth()->user()->id)->latest('created_at')->first();
            // dd($user->toArray());
            return view('candidatepanel.pages.profession', compact('user'));
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function newProfession()
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            return view('candidatepanel.pages.newProfession');
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function incrementSlug($slug)
    {

        $original = $slug;

        $count = 2;

        while (Candidate::whereSlug($slug)->exists()) {

            $slug = "{$original}-" . '00' . $count++;
        }

        return $slug;
    }
    public function profileUpdate(Request $request)
    {
        // dd('ok');
        // dd($request->toArray());
        $langHidden = [];
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $cand = Candidate::where('user_id', auth()->user()->id)->first();
            $userMain = User::where('id', auth()->user()->id)->first();
            // dd($request->first_name);
            try {
                DB::beginTransaction();
                if ($request->has('first_name')) {
                    $cand->first_name = $request->first_name;
                    // if (Candidate::whereSlug($slug = Str::slug($request->first_name))->exists()) {
                    //     $max = Candidate::whereFirst_name($request->first_name)->latest('id')->skip(1)->value('slug');
                    //     if (isset($max[-1]) && is_numeric($max[-1])) {
                    //         return preg_replace_callback('/(\d+)$/', function($mathces) {
                    //             return $mathces[1] + 1;
                    //         }, $max);
                    //     }
                    // }
                    // if (Candidate::whereSlug($slug = Str::slug($request->post))->exists()) {

                    //     $slug = $this->incrementSlug($slug);
                    // }

                    // $this->attributes['slug'] = $slug;
                    $userMain->name = $request->first_name;
                    // dd($cand->first_name);
                }
                if ($request->has('last_name')) {
                    $cand->last_name = $request->last_name;
                    $userMain->lname = $request->last_name;
                    $cand->keyword = $request->first_name . ' ' . $request->last_name;
                }
                if ($request->has('gender')) {
                    $cand->gender = $request->gender;
                }
                if ($request->has('nationality')) {
                    $cand->nationality = $request->nationality;
                }
                if ($request->has('address')) {
                    // dd('ok');
                    $cand->address = $request->address;
                    $cand->latitude = $request->lat;
                    $cand->longitude = $request->lng;
                }
                if ($request->has('email')) {
                    $cand->email = $request->email;
                }
                if ($request->has('country_code')) {
                    // dd('ok');
                    $cand->country_code = $request->country_code;
                }
                if ($request->has('number')) {
                    $cand->number = $request->number;
                }
                if ($request->terms == 1) {
                    $cand->terms = 1;
                } else {
                    $cand->terms = 0;
                }
                if ($request->has('head_line')) {
                    $cand->head_line = $request->head_line;
                }
                if ($request->has('dob')) {
                    $cand->dob = $request->dob;
                }
                if ($request->has('languages')) {
                    $cand->languages = implode(',', $request->languages);
                    $langHidden = $request->languages;
                }
                if ($request->has('religion')) {
                    $cand->religion = $request->religion;
                }
                if ($request->has('marital_status')) {
                    $cand->marital_status = $request->marital_status;
                }
                if ($request->has('driving_license')) {
                    $cand->driving_license = $request->driving_license;
                }
                if ($request->has('visa_status')) {
                    $cand->visa_status = $request->visa_status;
                }
                if ($request->has('tagline')) {
                    $cand->tagline = $request->tagline;
                }
                if ($request->has('postal_code')) {
                    $cand->zipCode = $request->postal_code;
                }
                if ($request->has('country')) {
                    $cand->country = $request->country;
                }
                if ($request->has('city')) {
                    $cand->city = $request->city;
                }
                if ($request->has('phone_status')) {
                    $cand->phone_status = $request->phone_status;
                }
                if ($request->has('email_status')) {
                    $cand->email_status = $request->email_status;
                }
                if ($request->has('address_status')) {
                    $cand->address_status = $request->address_status;
                }
                if ($request->has('visa_status_status')) {
                    $cand->visa_status_status = $request->visa_status_status;
                    // dd($request->visa_status_status, $cand->visa_status_status);
                }
                if ($request->has('facbookLink')) {
                    $cand->facbookLink = $request->facbookLink;
                }
                if ($request->has('twitterLink')) {
                    $cand->twitterLink = $request->twitterLink;
                }
                if ($request->has('instagramLink')) {
                    $cand->instagramLink = $request->instagramLink;
                }
                if ($request->has('linkdinLink')) {
                    $cand->linkdinLink = $request->linkdinLink;
                }
                if ($request->has('status')) {
                    $cand->status = $request->status;
                }
                $cand->save();
                // dd($cand->toArray());
                $userMain->save();

                if ($request->hasFile('avatar')) {
                    $img = $request->avatar;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'candidateAvatar' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/candidateAvatar' . '/' . 'img'), $filenamenew);
                    $user = User::find(auth()->user()->id);
                    if (file_exists($user->avatar)) {
                        File::delete($user->avatar);
                    }
                    $user->avatar = $filenamepath;
                    $user->save();

                    // $img = $request->avatar;
                    // $number = rand(1, 999);
                    // $numb = $number / 7;
                    // $extension = $img->extension();
                    // $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    // $filenamepath = 'candidateAvatar' . '/' . 'img/' . $filenamenew;
                    // $filename = $img->move(public_path('storage/candidateAvatar' . '/' . 'img'), $filenamenew);

                    // $user = User::where('id', auth()->user()->id)->first();
                    // $user->avatar = $filenamepath;
                    // $user->save();
                }
                if ($request->hasFile('banner')) {
                    $img = $request->banner;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    $filenamepath = 'candidate' . '/' . 'img/' . $filenamenew;
                    $filename = $img->move(public_path('storage/candidate' . '/' . 'img'), $filenamenew);

                    $user = User::where('id', auth()->user()->id)->first();
                    $user->banner = $filenamepath;
                    $user->save();
                }

                if ($request->has('skills')) {
                    $skillcand = CandidateSkills::where('user_id', auth()->user()->id)->get();
                    // dd($skillcand->toArray());
                    $skillcand->each->delete();
                    foreach ($request->skills as $key => $skill) {
                        $skillss = new CandidateSkills;
                        $skillss->user_id = auth()->user()->id;
                        $skillss->skill_id = $skill;
                        $skillss->save();
                    }
                    $newFeatures = CandidateSkills::with('skills')->where('user_id', auth()->user()->id)->get();
                }

                DB::commit();

                if ($request->has('source')) {
                    // dd($newFeatures->toArray());
                    if ($request->has('languagesHidden')) {
                        // $langHidden = explode(',', $langHidden);
                        return response()->json(['langHidden' => $langHidden]);
                    }
                    if ($request->has('skills')) {
                        // echo 'abc';
                        $newArray = array();
                        foreach ($newFeatures as $row) {
                            array_push($newArray, $row->skills->name);
                        }
                        return response()->json(['data', $newArray]);
                    } else {
                        return response()->json(['success', 'Updated Successfully!']);
                    }
                }
                return back()->with('success', 'Profile Updated Successfully!');
            } catch (\Throwable $e) {
                DB::rollback();
                // dd($e);
                return back()->with('error', $e->getMessage());
            }
            return back()->with('error', 'Error in Update!');
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function educationUpdate(Request $request)
    {
        // dd($request->all());
        // $cand = Candidate::where('user_id', auth()->user()->id)->first();
        $valid = $this->validate($request, [
            // 'designation' => 'required|max:255',
            // 'company_name' => 'required',
            // 'comp_loc' => 'required',
            // 'currency' => 'required',
            // 'month_exp' => 'required','array','min:1',
            'passing_year.*' => 'required|distinct|date',
        ]);

        $user = auth()->user();
        $SendingEduId = 0;
        $eduYearEdut = '';
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            try {
                DB::beginTransaction();

                if ($request->has('edu_id')) {
                    $ed = CandidateEdu::where('id', $request->edu_id)->first();
                    if ($request->has('education')) {
                        $ed->education = $request->education;
                    }
                    if ($request->has('course')) {
                        $ed->course = $request->course;
                    }
                    if ($request->has('institute')) {
                        $ed->institute = $request->institute;
                    }
                    if ($request->has('institute_loc')) {
                        $ed->institute_loc = $request->institute_loc;
                    }
                    if ($request->has('passing_year')) {
                        $ed->passing_year = $request->passing_year;
                        $eduYearEdut = substr($request->passing_year, -4);;
                    }
                    if ($request->has('grade')) {
                        $ed->grade = $request->grade;
                    }
                    if ($request->has('description')) {
                        $ed->description = $request->description;
                    }
                    $ed->save();
                } elseif ($request->has('passing_year')) {
                    // dd($request->passing_year);
                    foreach ($request->education as $key => $edu) {
                        $ed = new CandidateEdu;
                        $ed->user_id = auth()->user()->id;
                        $ed->education = $request->education[$key];
                        $ed->course = $request->course[$key];
                        $ed->institute = $request->institute[$key];
                        $ed->institute_loc = $request->institute_loc[$key];
                        $ed->passing_year = $request->passing_year[$key];
                        $ed->grade = $request->grade[$key];
                        $ed->description = $request->description[$key];
                        $ed->save();
                        $SendingEduId = $ed->id;
                    }
                }
                // dd($request->toArray());

                if ($request->hasFile('document')) {
                    foreach ($request->document as $key => $do) {
                        $doc = new CandidateDocs;
                        $img = $do;
                        $number = rand(1, 999);
                        $numb = $number / 7;
                        $extension = $img->extension();
                        $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                        $filenamepath = 'candidateDoc' . '/' . 'doc/' . $filenamenew;
                        $filename = $img->move(public_path('candidateDoc' . '/' . 'doc'), $filenamenew);
                        $doc->user_id = auth()->user()->id;
                        $doc->document = $filenamenew;
                        $doc->save();
                    }
                }
                DB::commit();
                if ($request->has('source')) {
                    return response()->json(['success' => 'Updated Successfully!', 'SendingEduId' => $SendingEduId, 'eduYearEdut' => $eduYearEdut]);
                }

                return redirect()->route('candidates.education.view')->with('success', 'Updated Successfully!');
                // } catch (\Throwable $e) {
                //     DB::rollback();

                //     if ($request->has('source')) {
                //         return response()->json(['error' , $ex->getMessage()]);
                //     } else {
                //         return back()->with('error', $e->getMessage());
                //     }
                // }

            } catch (Exception $ex) {
                return response()->json(['error', $ex->getMessage()]);
            }
            return back()->with('error', 'Error in Update!');
        } else {
            return redirect()->route('candidates.details');
        }
    }

    public function professionUpdate(Request $request)
    {
        // dd($request->all());
        $valid = $this->validate($request, [
            'designation' => 'required|max:255',
            'company_name' => 'required',
            'comp_loc' => 'required',
            'currency' => 'required',
            // 'month_exp' => 'required','array','min:1',
            'month_exp.*' => 'required|distinct|date',
        ]);
        // if(!$valid->failed())
        // {
        try {
            $SendingProId = 0;
            $date_diff = 0;
            $user = auth()->user();
            if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
                // try {
                //     DB::beginTransaction();
                if ($request->has('pro_id')) {
                    $proExp = CandidateProfessionalExp::where('id', $request->pro_id)->first();
                    if ($request->has('year_exp')) {
                        $proExp->year_exp = $request->year_exp;
                        if ($proExp->year_exp != 0) {

                            if (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 1) {
                                $date_diff = 'Less than a month';
                            } elseif (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 2) {
                                $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y year, %m months');
                            } else {
                                $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months');
                            }
                        } else {
                            $date_diff = Carbon::parse($proExp->month_exp)->isoFormat('MMM YY') . ' - ' . 'Currently work here';
                        }
                        $proExp->date_diff = $date_diff;
                    } else {
                        $proExp->year_exp = 0;
                    }
                    if ($request->has('month_exp')) {
                        $proExp->month_exp = $request->month_exp;
                    }
                    if ($request->has('designation')) {
                        $proExp->designation = $request->designation;
                    }
                    if ($request->has('company_name')) {
                        $proExp->company_name = $request->company_name;
                    }
                    if ($request->has('comp_loc')) {
                        $proExp->comp_loc = $request->comp_loc;
                    }
                    if ($request->has('currency')) {
                        $proExp->currency = $request->currency;
                    }
                    if ($request->has('salary')) {
                        $proExp->salary = $request->salary;
                    }
                    if ($request->has('description')) {
                        $proExp->description = $request->description;
                    }
                    $proExp->save();
                } elseif ($request->has('month_exp')) {
                    foreach ($request->month_exp as $key => $pro) {
                        if ($request->has('year_exp')) {
                            $year = $request->year_exp[$key];
                        } else {
                            $year = 0;
                        }
                        // dd($year);
                        // dd($request->toArray());
                        $proExp = CandidateProfessionalExp::create([
                            "user_id" => auth()->user()->id,
                            "year_exp" => $year,
                            "month_exp" => $request->month_exp[$key],
                            "designation" => $request->designation[$key],
                            "company_name" => $request->company_name[$key],
                            "comp_loc" => $request->comp_loc[$key],
                            "currency" => $request->currency[$key],
                            "salary" => $request->salary[$key],
                            "description" => $request->description[$key],
                        ]);
                        $SendingProId = $proExp->id;
                        // dd($proExp->year_exp);
                        if ($proExp->year_exp != 0) {

                            if (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 1) {
                                $date_diff = 'Less than a month';
                            } elseif (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 2) {
                                $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y year, %m months');
                            } else {
                                $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months');
                            }
                        } else {
                            $date_diff = Carbon::parse($proExp->month_exp)->isoFormat('MMM YY') . ' - ' . 'Currently work here';
                        }
                        $proExp->date_diff = $date_diff;
                        $proExp->save();
                        // dd($proExp->year_exp);
                    }
                }

                if ($request->has('skills')) {
                    $skillcand = CandidateSkills::where('user_id', auth()->user()->id)->get();
                    // dd($skillcand->toArray());
                    $skillcand->each->delete();
                    foreach ($request->skills as $key => $skill) {
                        $skillss = new CandidateSkills;
                        $skillss->user_id = auth()->user()->id;
                        $skillss->skill_id = $skill;
                        $skillss->save();
                    }
                }
                // DB::commit();
                // dd();
                if ($request->has('source')) {
                    // dd("check");
                    return response()->json(['success', 'Updated Successfully!', 'SendingProId' => $SendingProId, 'date_diff' => $date_diff]);
                } else {
                    // return redirect()->route('candidates.profession.view')->with('success', 'Updated Successfully!');
                    return redirect()->route('candidates.profession.view')->with('success', 'Updated Successfully!');
                }

                // } catch (\Throwable $e) {
                //     DB::rollback();
                //     if ($request->has('source')) {
                //         return response()->json(['error', $e->getMessage()]);
                //     } else {
                //         return back()->with('error', $e->getMessage());
                //     }
                // }

                return back()->with('error', 'Error in Update!');
            } else {
                return redirect()->route('candidates.details');
            }
        } catch (Exception $ex) {
            return response()->json(['error', $ex->getMessage()]);
        }
        // }
        // else
        // {
        //     return response()->json(['error' , $valid->errors()]);

        // }
    }
    public function professionDelete($id)
    {
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $canPro = CandidateProfessionalExp::where('id', $id)->first();
            // dd($id);
            $canPro->delete = 1;
            $canPro->save();
            return back();
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function educationDelete($id)
    {
        // dd($id);
        $user = auth()->user();
        if ($user->candidate != NULL && count($user->candidateEdu) != 0 && count($user->candidatePro) != 0) {
            $canEdu = CandidateEdu::where('id', $id)->first();
            // dd($canEdu->toArray());
            $canEdu->delete = 1;
            $canEdu->save();
            return back();
        } else {
            return redirect()->route('candidates.details');
        }
    }
    public function cvDestroy($id)
    {
        // dd($id);
        $can = CandidateDocs::find($id);
        $can->delete();

        return back();
    }

    public function profileIndex()
    {
        $userC = auth()->user();
        // if ($userC->candidate != NULL && $userC->candidateEdu != NULL && $userC->candidatePro != NULL) {
        if ($userC->candidate != NULL && count($userC->candidateEdu) != 0 && count($userC->candidatePro) != 0) {
            $userCs = User::with('candidate', 'candidateEdu', 'candidatePro', 'resume', 'skills')->where('id', auth()->user()->id)->latest()->first();
            // dd($user->toArray());
            $skill = Skills::all();
        }
        $user = auth()->user()->candidate;
        // $skill = Skills::get();
        $candSkills = CandidateSkills::where('user_id', auth()->user()->id)->get();
        // dd($user->toArray());
        return view('candidatepanel.pages.profileSetup.index', compact('user', 'skill', 'candSkills', 'userCs'));
    }
    public function getSkills()
    {
        $data['skill'] = Skills::all();
        $data['candSkills'] = CandidateSkills::where('user_id', auth()->user()->id)->get();

        return $data;
    }
    public function eduUpdate($id)
    {
        $edu = CandidateEdu::find($id);
        // dd($edu->toArray());
        return $edu;
    }
    public function proUpdate($id)
    {
        $pro = CandidateProfessionalExp::find($id);
        // dd($pro->toArray());
        return $pro;
    }
    public function wishlist($post_id)
    {
        // dd($post_id);
        $pro = Wishlist::where('candidate_id', auth()->user()->id)->where('post_id', $post_id)->first();
        $post_id = $post_id;
        // dd($pro->toArray());
        if (isset($pro)) {
            $pro->delete();
            $check = 'no';
        } else {
            $wish = new Wishlist;
            $wish->candidate_id = auth()->user()->id;
            $wish->post_id = $post_id;
            $wish->save();

            $check = 'yes';
        }
        return response()->json(['success', 'Updated Successfully!', 'check' => $check, 'post_id' => $post_id]);
    }
    public function savedJobs()
    {
        $post = Wishlist::with('user', 'post')->where('candidate_id', auth()->user()->id)->whereHas('post', function ($query) {
            $query->orderBy('id', 'DESC');
        })->latest()->get();
        // dd($post->toArray());
        return view('candidatepanel.pages.savedJobs', compact('post'));
    }
    public function getLanguages()
    {
        // if ($request->has('languages')) {
        //     $cand->languages = implode(',', $request->languages);
        //     $langHidden = $request->languages;
        // }
        $cand = Candidate::where('user_id', auth()->user()->id)->first();
        // $data['langs'] = Candidate::where('user_id', auth()->user()->id)->first();
        $langHidden = explode(',', $cand->languages);;

        // dd($data);

        // return $data;
        return response()->json(['langHidden' => $langHidden]);
    }
}
