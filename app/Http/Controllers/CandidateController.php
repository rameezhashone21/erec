<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Candidate;
use App\Models\CandidateProfessionalExp;
use App\Models\Skills;
use App\Models\CandidateSkills;
use App\Models\CandidateDocs;
use App\Models\CandidateEdu;
use App\Models\User;
use Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class CandidateController extends Controller
{
    public function incrementSlug($slug)
    {

        $original = $slug;

        $count = 2;

        while (Candidate::whereSlug($slug)->exists()) {

            $slug = "{$original}-" . '00' . $count++;
        }

        return $slug;

    }
    public function storeDetails(Request $request)
    {
        // dd($request->toArray());
        $valid = $this->validate($request, [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'nationality' => 'required|string',
            'address' => 'required',
            'email' => 'required',
            'country_code' => 'required',
            'number' => 'required|numeric',
            // 'Lat' => 'required',
            // 'Lng' => 'required',
        ]);
        $user = Candidate::where('user_id', auth()->user()->id)->first();
        $userMain = User::where('id', auth()->user()->id)->first();


        try {
            DB::beginTransaction();

            if ($user != null) {
                $cand = Candidate::where('user_id', auth()->user()->id)->first();
                if ($request->has('first_name')) {
                    $cand->first_name = $request->first_name;
                    // $cand->slug = Str::slug($request->first_name);
                    // if (Candidate::whereSlug($slug = Str::slug($request->first_name))->exists()) {
                    //     $max = Candidate::whereFirst_name($request->first_name)->latest('id')->skip(1)->value('slug');
                    //     if (isset($max[-1]) && is_numeric($max[-1])) {
                    //         return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    //             return $mathces[1] + 1;
                    //         }, $max);
                    //     }
                    // }
                    if (Candidate::whereSlug($slug = Str::slug($request->post))->exists()) {

                        $slug = $this->incrementSlug($slug);
                    }

                    $this->attributes['slug'] = $slug;
                    $userMain->name = $request->first_name;
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
                if ($request->has('address') and $request->lat != null and $request->lng != null) {

                    // $result = app('geocoder')->geocode($request->address)->get();
                    // if ($result->toArray() != NULL) {
                        // $coordinates = $result[0]->getCoordinates();
                        // $lat = $coordinates->getLatitude();
                        // $long = $coordinates->getLongitude();
                        $cand->address = $request->address;
                        $cand->latitude = $request->lat;
                        $cand->longitude = $request->lng;
                    // } else {
                    //     return back()->with('error', 'Address is invalid');
                    // }
                } else {
                    return back()->with('error', 'Address is invalid');
                }
                if ($request->has('email')) {
                    $cand->email = $request->email;
                }
                if ($request->has('country_code')) {
                    $cand->country_code = $request->country_code;
                }
                if ($request->has('number')) {
                    $cand->number = $request->number;
                }
                if ($request->has('country')) {
                    $cand->country = $request->country;
                }
                if ($request->has('city')) {
                    $cand->city = $request->city;
                }
                if ($request->has('zipCode')) {
                    $cand->zipCode = $request->zipCode;
                }
                if ($request->terms == 1) {
                    $cand->terms = 1;
                } else {
                    $cand->terms = 0;
                }
                $cand->save();
                $userMain->save();
            } else {
                $cand = new Candidate;
                $cand->user_id = auth()->user()->id;
                $cand->first_name = $request->first_name;
                // if (Candidate::whereSlug($slug = Str::slug($request->first_name))->exists()) {
                //     $max = Candidate::whereFirst_name($request->first_name)->latest('id')->skip(1)->value('slug');
                //     if (isset($max[-1]) && is_numeric($max[-1])) {
                //         return preg_replace_callback('/(\d+)$/', function ($mathces) {
                //             return $mathces[1] + 1;
                //         }, $max);
                //     }
                // }
                if (Candidate::whereSlug($slug = Str::slug($request->post))->exists()) {

                    $slug = $this->incrementSlug($slug);
                }

                $this->attributes['slug'] = $slug;
                // dd($slug);
                $cand->slug = $slug;
                $cand->last_name = $request->last_name;
                $cand->keyword = $request->first_name . ' ' . $request->last_name;
                $cand->gender = $request->gender;
                $cand->nationality = $request->nationality;
                if ($request->has('address') and $request->lat != null and $request->lng != null) {

                    // $result = app('geocoder')->geocode($request->address)->get();
                    // if ($result->toArray() != NULL) {
                    //     $coordinates = $result[0]->getCoordinates();
                    //     $lat = $coordinates->getLatitude();
                    //     $long = $coordinates->getLongitude();
                        $cand->address = $request->address;
                        $cand->latitude = $request->lat;
                        $cand->longitude = $request->lng;
                    // } else {
                    //     return back()->with('error', 'Address is invalid');
                    // }
                } else {
                    return back()->with('error', 'Address is invalid');
                }
                $cand->email = $request->email;
                $cand->country_code = $request->country_code;
                $cand->number = $request->number;
                $cand->zipCode = $request->zipCode;
                $cand->terms = $request->terms;
                $cand->save();
            }

            DB::commit();

            return redirect()->route('candidates.details.next')->with('success', 'Updated Successfully!');
        } catch (\Throwable $e) {
            DB::rollback();
            // dd($e);

            return redirect()->route('candidates.details')->with('error', $e->getMessage());
        }

    }

    public function storeProfession(Request $request)
    {
        // dd($request->toArray());
        $request->validate([
            // 'month_exp' => 'date_format:m/d/Y',
            // 'year_exp' => 'date_format:m/d/Y',
            'Employer_Location' => 'required',
            'currency' => 'required'
        ]);
        // $comp_loc[] = $request->Employer_Location;
        $clear = CandidateProfessionalExp::where('user_id', auth()->user()->id)->get();
        foreach ($clear as $row) {
            $row->delete();
        }
        try {
            DB::beginTransaction();
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
            if ($request->has('pro_id')) {
                $proExp = CandidateProfessionalExp::where('id', $request->pro_id)->first();
                // dd($request->year_exp);
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
                        $date_diff = Carbon::createFromFormat('d/m/Y', $proExp->month_exp)->isoFormat('MMM YY') . ' - ' . 'Currently work here';
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
                if ($request->has('Employer_Location')) {
                    $proExp->comp_loc = $request->Employer_Location;
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
            } elseif ($request->has('month_exp') and $request->month_exp[0] != null) {
                foreach ($request->month_exp as $key => $pro) {
                    if ($request->year_exp[$key] == 0) {
                        $year_exp[$key] = 0;
                    } else {
                        $year_exp[$key] = $request->year_exp[$key];
                    }
                    // dd($year_exp);
                    // $comp_loc[$key] = $request->Employer_Location;
                    // dd($comp_loc);
                    $proExp = CandidateProfessionalExp::create([
                        "user_id" => auth()->user()->id,
                        "year_exp" => $year_exp[$key],
                        "month_exp" => $request->month_exp[$key],
                        "designation" => $request->designation[$key],
                        "company_name" => $request->company_name[$key],
                        "comp_loc" => $request->Employer_Location[$key],
                        "currency" => $request->currency[$key],
                        "salary" => $request->salary[$key],
                        "description" => $request->description[$key],
                    ]);

                    if ($proExp->year_exp != 0) {

                        if (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 1) {
                            $date_diff = 'Less than a month';
                        } elseif (date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months') < 2) {
                            $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y year, %m months');
                        } else {
                            $date_diff = date_diff(date_create($proExp->month_exp), date_create($proExp->year_exp))->format('%y years, %m months');
                        }
                    } else {
                        $date_diff = Carbon::createFromFormat('d/m/Y', $proExp->month_exp) . ' - ' . 'Currently work here';
                    }
                    $proExp->date_diff = $date_diff;
                    $proExp->save();
                }
            }

            DB::commit();

            return redirect()->route('candidates.details.profile')->with('success', 'Updated Successfully!');
        } catch (\Throwable $e) {
            DB::rollback();

            return redirect()->route('candidates.details.next')->with('error', $e->getMessage());
        }
    }

    public function storeSkills(Request $request)
    {
        // dd($request->toArray());
        try {
            DB::beginTransaction();

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
            DB::commit();

            return redirect()->route('candidates.details.profile')->with('success', 'Updated Successfully!');
        } catch (\Throwable $e) {
            DB::rollback();

            return redirect()->route('candidates.details.next')->with('error', $e->getMessage());
        }
    }

    public function storeEducation(Request $request)
    {
        // dd($request->all());
        // $request->validate([
        //     'religion' => 'required',
        // ]);
        $cand = Candidate::where('user_id', auth()->user()->id)->first();
        try {
            DB::beginTransaction();
            if ($request->has('head_line')) {
                $cand->head_line = $request->head_line;
            }
            if ($request->has('dob')) {
                $cand->dob = $request->dob;
            }
            if ($request->has('languages')) {
                $cand->languages = implode(',', $request->languages);
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
            $cand->save();

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
                }
                if ($request->has('grade')) {
                    $ed->grade = $request->grade;
                }
                if ($request->has('description')) {
                    $ed->description = $request->description;
                }
                $ed->save();
            } elseif ($request->has('passing_year')) {
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
                }
            }
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

            }

            if ($request->hasFile('document')) {
                foreach ($request->document as $key => $do) {
                    $doc = new CandidateDocs;
                    $img = $do;
                    $number = rand(1, 999);
                    $numb = $number / 7;
                    $extension = $img->extension();
                    // $filenamenew = date('Y-m-d') . "_." . $numb . "_." . $extension;
                    // $filenamepath = 'candidateDoc' . '/' . 'doc/' . $filenamenew;
                    // $filename = $img->move(public_path('candidateDoc' . '/' . 'doc'), $filenamenew);
                    // $doc->user_id = auth()->user()->id;
                    // $doc->document = $filenamenew;
                    // $doc->save();
                    $filenamenew = $do->getClientOriginalName();
                    $filenamepath = 'candidateDoc' . '/' . 'doc/' . $filenamenew;
                    $filename = $img->move(public_path('candidateDoc' . '/' . 'doc'), $filenamenew);
                    $doc->user_id = auth()->user()->id;
                    $doc->document = $filenamenew;
                    $doc->document_name = $do->getClientOriginalName();
                    $doc->save();
                }
            }

            DB::commit();

            if ($request->has('avatar')) {
                return $filenamepath;
            }
            if (auth()->user()->candidateEdu != '[]') {
                return redirect()->route('home')->with('success', 'Updated Successfully!');
            } else {
                return redirect()->route('candidateEducationView');
            }
        } catch (\Throwable $e) {
            // dd($e->getMessage());
            DB::rollback();
            if ($request->has('avatar')) {
                return $e->getMessage();
            }
            // dd($e->getMessage());
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function candidateEducationView()
    {
        return view('candidates.education');
    }
}
