<?php

use App\Http\Controllers\Candidate\ShowTestController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Company\ShowExams;
use App\Http\Controllers\Company\ExamController;
use App\Http\Livewire\Company\ShowQuestionAnswers;
use App\Http\Livewire\Company\ShowQuestionAnswersAfterUpdate;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Company\ExamQuestionAnswerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home_front');
})->name('index');

Auth::routes();
Route::post('/pusher/auth', [App\Http\Controllers\HomeController::class, 'pusherAuth']);

Route::get('/mapfile', [App\Http\Controllers\HomeController::class, 'mymapfile'])->name('mymapfile');
Route::get('/apply/job/session', [App\Http\Controllers\FrontendController::class, 'createSession'])->name('job.session');

Route::get('/get_question_data', [App\Http\Controllers\Company\ExamQuestionAnswerController::class, 'get_question_data'])->name("get-question-data");
Route::post('/update-question-data', [App\Http\Controllers\Company\ExamQuestionAnswerController::class, 'update_question_data'])->name("update-question-data");

Route::post('/candidate_notify', [ShowTestController::class, 'candidate_notify'])->name("candidate.notify");

Route::post('/candidates_filter', [App\Http\Controllers\CompanyDashboardController::class, 'candidates_filter'])->name("candidates.filter");

Route::get('/download-csv', [ExamController::class, 'downloadCSV'])->name("downloadCSV");





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/services', [App\Http\Controllers\FrontendController::class, 'services'])->name('services');
Route::get('/privacy-policy', [App\Http\Controllers\FrontendController::class, 'privacy'])->name('policy');
Route::get('/platform', [App\Http\Controllers\FrontendController::class, 'platform'])->name('platform');
Route::get('/terms', [App\Http\Controllers\FrontendController::class, 'terms'])->name('terms');
Route::post('/subscriber', [App\Http\Controllers\FrontendController::class, 'subscriber'])->name('subscriber');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::get('/recruiters', [App\Http\Controllers\FrontendController::class, 'recruiter'])->name('recruiter');
Route::get('/recruiters/list', [App\Http\Controllers\FrontendController::class, 'recruiterList'])->name('recruiter.list');
Route::get('/recruiters/{id}', [App\Http\Controllers\FrontendController::class, 'recruiterShow'])->name('recruiter.detail');
Route::get('/employer', [App\Http\Controllers\FrontendController::class, 'employer'])->name('employer');
Route::get('/employer/list', [App\Http\Controllers\FrontendController::class, 'employerList'])->name('employer.list');
Route::get('/candidates', [App\Http\Controllers\FrontendController::class, 'candidates'])->name('candidates');
Route::get('/candidates/list', [App\Http\Controllers\FrontendController::class, 'candidatesList'])->name('candidates.list');
Route::get('/candidates/{id}', [App\Http\Controllers\FrontendController::class, 'candidatesDetail'])->name('candidate.detail');
Route::get('/job', [App\Http\Controllers\FrontendController::class, 'job'])->name('job');
Route::get('/browse/jobs', [App\Http\Controllers\FrontendController::class, 'jobPost'])->name('job.browse');
// Route::get('/browse/jobs/search', [App\Http\Controllers\FrontendController::class, 'jobSearch'])->name('job.search');
Route::get('/employer/{id}', [App\Http\Controllers\FrontendController::class, 'jobDetails'])->name('job.details');
Route::get('/job/listing/details/{id}', [App\Http\Controllers\FrontendController::class, 'jobListingDetails'])->name('job.listing.details');
Route::post('/candidate/details/store', [App\Http\Controllers\CandidateController::class, 'storeDetails'])->name('store.candidate');
Route::post('/candidate/profession/store', [App\Http\Controllers\CandidateController::class, 'storeProfession'])->name('store.candidateProfession');
Route::post('/candidate/skills/store', [App\Http\Controllers\CandidateController::class, 'storeSkills'])->name('store.candidateSkill');
Route::post('/candidate/education/store', [App\Http\Controllers\CandidateController::class, 'storeEducation'])->name('store.candidateEducation');
Route::get('/candidate/education', [App\Http\Controllers\CandidateController::class, 'candidateEducationView'])->name('candidateEducationView');
Route::post('/company/details/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::post('/recruiter/details/store', [App\Http\Controllers\RecruiterController::class, 'store'])->name('recruiter.store');

Route::get('/google', [App\Http\Controllers\GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/google/callback', [App\Http\Controllers\GoogleController::class, 'handleGoogleCallback'])->name('google.callback');

Route::get('/facebook', [App\Http\Controllers\GoogleController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/facebook/callback', [App\Http\Controllers\GoogleController::class, 'handleFacebookCallback'])->name('facebook.callback');

Route::get('/linkedin', [App\Http\Controllers\GoogleController::class, 'redirectToLinkedin'])->name('linkedin.login');
Route::get('/linkedin/callback', [App\Http\Controllers\GoogleController::class, 'handleLinkedinCallback'])->name('linkedin.callback');

// Social Share
Route::get('social-share', [App\Http\Controllers\SocialShareController::class, 'index']);

// End User Service Agreement
Route::get('end-user-service-agreement', [App\Http\Controllers\FrontendController::class, 'endUserAgreement'])->name('endUserAgreement');

// Professional Services Standard
Route::get('professional-services-standard', [App\Http\Controllers\FrontendController::class, 'professionalServicesStandard'])->name('professionalServicesStandard');

// Anti-Spam Policy
Route::get('anti-spam-policy', [App\Http\Controllers\FrontendController::class, 'antiSpamPolicy'])->name('antiSpamPolicy');

// Cancellation Policy
Route::get('cancellation-policy', [App\Http\Controllers\FrontendController::class, 'cancellationPolicy'])->name('cancellationPolicy');

// Copyright
Route::get('copyright', [App\Http\Controllers\FrontendController::class, 'copyright'])->name('copyright');

// Get Categories Api
Route::get('getCategoriesApi', [App\Http\Controllers\FrontendController::class, 'getCategoriesApi'])->name('getCategoriesApi');

// Get Candidates Smart Search
Route::get('searchCandidate', [App\Http\Controllers\FrontendController::class, 'searchCandidate'])->name('searchCandidate');

// Get Company Smart Search
Route::get('searchCompanySmart', [App\Http\Controllers\FrontendController::class, 'searchCompanySmart'])->name('searchCompanySmart');

// Get Recruiter Smart Search
Route::get('searchRecruiterSmart', [App\Http\Controllers\FrontendController::class, 'searchRecruiterSmart'])->name('searchRecruiterSmart');

//Subscription Packages
Route::get('subscription', [App\Http\Controllers\FrontendController::class, 'subscription'])->name('subscription');
Route::middleware(['auth'])->group(function () {
    Route::get('subscription-payment/{slug}', [App\Http\Controllers\FrontendController::class, 'subscriptionPayment'])->name('subscriptionPayment');
    Route::post('subscription-successful', [App\Http\Controllers\FrontendController::class, 'subscriptionSuccess'])->name('subscriptionSuccess');
    Route::get('subscription-success', [App\Http\Controllers\FrontendController::class, 'successPayment'])->name('successPayment');
    Route::get('subscription-cancel', [App\Http\Controllers\FrontendController::class, 'cancelPayment'])->name('cancelPayment');
    Route::get('changeJobAppStatus/{id}', [App\Http\Controllers\MapController::class, 'changeJobAppStatus'])->name('changeJobAppStatus');

    // FIND QST
    Route::get('find/qst', [App\Http\Controllers\MapController::class, 'findQst'])->name('find.qst');

    // Del Relation
    Route::get('delRelation/{rec}/{comp}', [App\Http\Controllers\FrontendController::class, 'delRelation'])->name('delRelation');
});

Route::get('/search-keyword', [App\Http\Controllers\FrontendController::class, 'searchKeyword'])->name('search.Keyword');
Route::get('/search-keyword/results', [App\Http\Controllers\FrontendController::class, 'searchKeywordView'])->name('search.Keyword.view');

// Browse smart search Anything Admin
Route::get('/search-any-keyword', [App\Http\Controllers\FrontendController::class, 'searchAnythingAdmin'])->name('search.Anything.Admin');

// Browse smart search
Route::get('/search/job-title', [App\Http\Controllers\FrontendController::class, 'searchtitle'])->name('search.title');
Route::get('/search/job-location', [App\Http\Controllers\FrontendController::class, 'searchlocation'])->name('search.location');
Route::get('/search/job-company', [App\Http\Controllers\FrontendController::class, 'searchCompany'])->name('search.company');
Route::get('get/pdf/file', [App\Http\Controllers\CandidateDashboardController::class, 'get_pdf_file'])->name('get.pdf.file');

Route::post('recruiter/hire-or-reject/candidate', [App\Http\Controllers\CompanyDashboardController::class, 'hireReject'])->name('hireReject.candidate.comp');

Route::post('/category/store-new-category', [App\Http\Controllers\AdminController::class, 'storeJobCategory'])->name('categories.store');


Route::middleware(['auth', 'check_status'])->group(function () {

    // Email Verification
    Route::get('/email/verify', function () {
        // dd('ok');
        return view('auth.verify');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
        $request->fulfill();
        return redirect('/home');
    })->middleware(['auth', 'signed'])->name('verification.verify');

    Route::post('/email/verification-notification', function (Request $request) {
        $request->user()->sendEmailVerificationNotification();

        return back()->with('message', 'Verification link sent!');
    })->middleware(['auth', 'throttle:6,1'])->name('verification.resend');
    // Email Verification End

    Route::prefix('/admin')->group(function () {
        Route::middleware(['checkadmin'])->group(
            function () {

                Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('admin.dashboard');
                Route::get('/employer', [App\Http\Controllers\AdminController::class, 'companyIndex'])->name('admin.companyIndex');
                Route::get('/recruiter', [App\Http\Controllers\AdminController::class, 'recruiterIndex'])->name('admin.recruiterIndex');
                Route::get('/candidate', [App\Http\Controllers\AdminController::class, 'candidateIndex'])->name('admin.candidateIndex');
                Route::get('/employer/details/{id}', [App\Http\Controllers\AdminController::class, 'companyDetails'])->name('admin.companyDetails');
                Route::get('/employer/{id}', [App\Http\Controllers\AdminController::class, 'companyDestroy'])->name('admin.companyDestroy');
                Route::get('/recruiter/details/{id}', [App\Http\Controllers\AdminController::class, 'recruiterDetails'])->name('admin.recruiterDetails');
                Route::get('/recruiter/{id}', [App\Http\Controllers\AdminController::class, 'recruiterDestroy'])->name('admin.recruiterDestroy');
                Route::get('/candidate/details/{id}', [App\Http\Controllers\AdminController::class, 'candidateDetails'])->name('admin.candidateDetails');
                Route::get('/candidate/{id}', [App\Http\Controllers\AdminController::class, 'candidateDestroy'])->name('admin.candidateDestroy');

                //Site Setting
                Route::get('/site/setting', [App\Http\Controllers\SiteController::class, 'index'])->name('admin.site.setting');
                Route::post('/site/setting/store', [App\Http\Controllers\SiteController::class, 'store'])->name('admin.store.site.setting');
                // Skills
                Route::get('/skills', [App\Http\Controllers\AdminController::class, 'skills'])->name('admin.skills');
                Route::get('/skills/new', [App\Http\Controllers\AdminController::class, 'addSkill'])->name('admin.addSkill');
                Route::post('/skills/store', [App\Http\Controllers\AdminController::class, 'storeSkill'])->name('admin.storeSkill');
                Route::get('/skills/edit/{id}', [App\Http\Controllers\AdminController::class, 'editSkill'])->name('admin.editSkill');
                Route::get('/skills/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroySkill'])->name('admin.destroySkill');
                // Category
                Route::get('/category', [App\Http\Controllers\AdminController::class, 'category'])->name('admin.category');
                Route::get('/category/new', [App\Http\Controllers\AdminController::class, 'addCategory'])->name('admin.addCategory');
                Route::post('/category/store', [App\Http\Controllers\AdminController::class, 'storeCategory'])->name('admin.storeCategory');
                Route::get('/category/edit/{id}', [App\Http\Controllers\AdminController::class, 'editCategory'])->name('admin.editCategory');
                Route::get('/category/destroy/{id}', [App\Http\Controllers\AdminController::class, 'destroyCategory'])->name('admin.destroyCategory');
                // Category
                Route::get('/job_posts', [App\Http\Controllers\AdminController::class, 'jobPosts'])->name('admin.job');
                Route::get('/job_posts/{id}', [App\Http\Controllers\AdminController::class, 'jobPostDetails'])->name('admin.jobDetails');
                Route::get('/job/applicants/{id}', [App\Http\Controllers\AdminController::class, 'jobApplicantsComp'])->name('admin.job.applicants');
                Route::get('/job/shortlisted/{id}', [App\Http\Controllers\AdminController::class, 'jobshortlistedComp'])->name('admin.job.shortlisted');
                Route::get('/exam/result/{id}', [App\Http\Controllers\AdminController::class, 'examResultComp'])->name('admin.exam.result');


                Route::get('/jobpost/delete/{id}', [App\Http\Controllers\AdminController::class, 'jobPostDelete'])->name('admin.jobPostDelete');
                Route::post('/job_posts/status', [App\Http\Controllers\AdminController::class, 'jobPostStatus'])->name('admin.jobPostStatus');
                // Candidate Job Application
                Route::get('/job_applications', [App\Http\Controllers\AdminController::class, 'jobApplications'])->name('admin.jobApplication');
                Route::get('/job_applications/{id}', [App\Http\Controllers\AdminController::class, 'jobApplicationsStatus'])->name('admin.jobApplicationStatus');

                // All Users
                Route::get('/users', [App\Http\Controllers\AdminController::class, 'allUsers'])->name('admin.users');
                Route::get('/users/edit/{id}', [App\Http\Controllers\AdminController::class, 'editUser'])->name('admin.editUser');
                Route::post('/user/update', [App\Http\Controllers\AdminController::class, 'approveUser'])->name('admin.approveUser');
                Route::get('/user/delete/{id}', [App\Http\Controllers\AdminController::class, 'deleteUser'])->name('deleteUser.user');
                // Subscription Packages
                Route::get('/subscription', [App\Http\Controllers\AdminController::class, 'packages'])->name('admin.packages');
                Route::get('/subscription/add', [App\Http\Controllers\AdminController::class, 'packagesAdd'])->name('admin.packages.add');
                Route::post('/subscription/store', [App\Http\Controllers\AdminController::class, 'packagesStore'])->name('admin.packages.store');
                Route::get('/subscription/{id}', [App\Http\Controllers\AdminController::class, 'packagesEdit'])->name('admin.packages.edit');
                Route::post('/subscription/update', [App\Http\Controllers\AdminController::class, 'packagesUpdate'])->name('admin.packages.update');
                Route::get('/subscription/destroy/{id}', [App\Http\Controllers\AdminController::class, 'packagesDestroy'])->name('admin.packages.destroy');

                // Subscribers
                Route::get('/notification-subscribers', [App\Http\Controllers\AdminController::class, 'subscribers'])->name('admin.subscribers');
                Route::get('/notification-subscribers/status-change/{status}/{id}', [App\Http\Controllers\AdminController::class, 'subscribersStatusChange'])->name('admin.subscribers.status');

                //sociallinks
                Route::get('/socials', [App\Http\Controllers\AdminController::class, 'all_social_links'])->name('social.links');
                Route::get('/socials/create', [App\Http\Controllers\AdminController::class, 'create_social_link'])->name('create.social_links');
                Route::post('/socials/add', [App\Http\Controllers\AdminController::class, 'AddSocial_links'])->name('admin.addlinks');
                Route::get('/social/delete/{id}', [App\Http\Controllers\AdminController::class, 'destory_social'])->name('social.delete');

                //faqs
                Route::get('/faqs', [App\Http\Controllers\AdminController::class, 'faqs'])->name('faqs');
                Route::get('/faq/create', [App\Http\Controllers\AdminController::class, 'create'])->name('faqs.create');
                Route::Post('/faqs/store', [App\Http\Controllers\AdminController::class, 'store'])->name('faqs.store');
                Route::get('/faqs/edit/{id}', [App\Http\Controllers\AdminController::class, 'editFaq'])->name('faqs.edit');
                Route::Post('/faqs/update', [App\Http\Controllers\AdminController::class, 'updateFaq'])->name('faqs.update');
                Route::get('/faqs/delete/{id}', [App\Http\Controllers\AdminController::class, 'destory'])->name('faqs.delete');

                //job category
                Route::get('/jobCategory', [App\Http\Controllers\AdminController::class, 'jobCategory'])->name('admin.jobCategory');
                Route::get('/jobCategory/create', [App\Http\Controllers\AdminController::class, 'jobCategoryCreate'])->name('admin.jobCategory.create');
                Route::post('/jobCategory/store', [App\Http\Controllers\AdminController::class, 'jobCategoryStore'])->name('admin.jobCategory.store');
                Route::get('/jobCategory/edit/{id}', [App\Http\Controllers\AdminController::class, 'jobCategoryEdit'])->name('admin.jobCategory.edit');
                Route::post('/jobCategory/update', [App\Http\Controllers\AdminController::class, 'jobCategoryUpdate'])->name('admin.jobCategory.update');
            }
        );
    });

    Route::prefix('/user')->middleware(['auth', 'verified'])->group(function () {
        Route::middleware(['checkuser'])->group(
            function () {

                Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('candidate.dashboard');
                Route::get('/CV/List', [App\Http\Controllers\CandidateDashboardController::class, 'cvList'])->name('candidates.cvList');
                Route::get('/CV/builder', [App\Http\Controllers\CandidateDashboardController::class, 'cvParser'])->name('candidates.cvParser');
                Route::get('/CV/builder/contact', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserContact'])->name('candidates.cvParser.contact');
                Route::get('/CV/builder/about', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserAbout'])->name('candidates.cvParser.about');
                Route::get('/CV/builder/experience', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserExperience'])->name('candidates.cvParser.experience');
                Route::get('/CV/builder/education', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserEducation'])->name('candidates.cvParser.education');
                Route::get('/CV/builder/others', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserOthers'])->name('candidates.cvParser.others');
                Route::get('/CV/builder/skills', [App\Http\Controllers\CandidateDashboardController::class, 'cvParserSkills'])->name('candidates.cvParser.skills');
                Route::post('/CV/builder/update/data', [App\Http\Controllers\CandidateDashboardController::class, 'cv_parser_update_data'])->name('candidates.cvParser.update.data');
                Route::get('/generate/pdf', [App\Http\Controllers\CandidateDashboardController::class, 'generate_pdf_cv'])->name('generate.pdf.cv');
                Route::post('/CV/post', [App\Http\Controllers\CandidateDashboardController::class, 'parseResume'])->name('candidates.parseResume');
                Route::get('/CV/List/destroy/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'cvDestroy'])->name('candidates.cv.destroy');
                Route::get('/change/visibility/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'visibility'])->name('change.status');
                Route::get('/saved/jobs', [App\Http\Controllers\CandidateDashboardController::class, 'savedJobs'])->name('candidates.saved.jobs');
                // Route::get('/details/profile', [App\Http\Controllers\FrontendController::class, 'candidatesProfile'])->name('candidates.details.profile');

                Route::get('/profile/view', [App\Http\Controllers\CandidateDashboardController::class, 'candidatesProfile'])->name('candidates.details.view');
                Route::post('/profileupdate', [App\Http\Controllers\CandidateDashboardController::class, 'profileUpdate'])->name('candidates.profile.update');
                Route::get('/educational/view', [App\Http\Controllers\CandidateDashboardController::class, 'candidatesEducation'])->name('candidates.education.view');
                Route::get('/educational/new', [App\Http\Controllers\CandidateDashboardController::class, 'newEducation'])->name('candidates.education.new');
                Route::post('/educationupdate', [App\Http\Controllers\CandidateDashboardController::class, 'educationUpdate'])->name('candidates.education.update');
                Route::get('/profession/view', [App\Http\Controllers\CandidateDashboardController::class, 'candidatesProfession'])->name('candidates.profession.view');
                Route::get('/profession/new', [App\Http\Controllers\CandidateDashboardController::class, 'newProfession'])->name('candidates.profession.new');
                Route::post('/profession/update', [App\Http\Controllers\CandidateDashboardController::class, 'professionUpdate'])->name('candidates.profession.update');
                Route::get('/profession/delete/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'professionDelete'])->name('candidates.profession.delete');
                Route::get('/education/delete/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'educationDelete'])->name('candidates.education.delete');
                Route::get('/candidates/details', [App\Http\Controllers\FrontendController::class, 'candidatesDetailsShow'])->name('candidates.details');
                Route::get('/candidates/details/next', [App\Http\Controllers\FrontendController::class, 'candidatesNext'])->name('candidates.details.next');
                Route::get('/candidates/details/profile', [App\Http\Controllers\FrontendController::class, 'candidatesProfile'])->name('candidates.details.profile');
                Route::post('/candidates/details/profile/post', [App\Http\Controllers\FrontendController::class, 'cv'])->name('candidates.details.post');
                // Apply Now For Job
                // Route::get('/job/application', [App\Http\Controllers\FrontendController::class, 'jobApplications'])->name('job.application');
                // Route::get('/candidates/job/visibility', [App\Http\Controllers\FrontendController::class, 'visibilityindex'])->name('candidates.job.visibility');
                // Job Application
                Route::get('/candidates/job/application', [App\Http\Controllers\CandidateJobApplicationController::class, 'index'])->name('candidates.job.index');
                Route::get('/candidates/job/visibility', [App\Http\Controllers\CandidateJobApplicationController::class, 'visibilityindex'])->name('candidates.job.visibility');
                Route::get('/candidates/job/visibility/change/{id}', [App\Http\Controllers\CandidateJobApplicationController::class, 'visibility'])->name('candidates.job.visibility.change');
                Route::get('/candidates/job/application/create', [App\Http\Controllers\CandidateJobApplicationController::class, 'create'])->name('candidates.job.create');
                Route::post('/candidates/job/application/store', [App\Http\Controllers\CandidateJobApplicationController::class, 'store'])->name('candidates.job.store');

                Route::get('/candidates/upload/cv', [App\Http\Controllers\CandidateJobApplicationController::class, 'cvUpload'])->name('candidates.cv.upload');
                Route::post('/candidates/upload/cv/store', [App\Http\Controllers\CandidateJobApplicationController::class, 'storeCv'])->name('candidates.cv.store');
                Route::post('/candidates/apply', [App\Http\Controllers\JobApplicationController::class, 'applyNow'])->name('candidates.applyNow');

                Route::get('/profile/setup', [App\Http\Controllers\CandidateDashboardController::class, 'profileIndex'])->name('candidates.profile.view');

                Route::get('/education/update/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'eduUpdate'])->name('candidates.educationupdate');
                Route::get('/profession/update/{id}', [App\Http\Controllers\CandidateDashboardController::class, 'proUpdate'])->name('candidates.professionupdate');

                //wishlist
                Route::get('/job-post/add-to-wishlist/{post_id}', [App\Http\Controllers\CandidateDashboardController::class, 'wishlist'])->name('candidates.wishlist');

                Route::get('/getSkills', [App\Http\Controllers\CandidateDashboardController::class, 'getSkills'])->name('candidates.getSkills');

                Route::get('/getLanguages', [App\Http\Controllers\CandidateDashboardController::class, 'getLanguages'])->name('candidates.getLanguages');

                // Exam section
                Route::controller(ShowTestController::class)->group(function () {
                    Route::post('/test/start', 'index')->name('candidate.test.start');
                    Route::post('/test/submit', 'calculateResult')->name('candidate.test.submit');
                    Route::get('/test/attempt-fail/{exam}/{id}', 'failTestAttempt')->name('candidate.test.attempt.fail');
                });
            }
        );
    });

    Route::prefix('/company')->middleware(['auth', 'verified'])->group(function () {
        Route::middleware(['Notification', 'checkcompany'])->group(
            function () {

                Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('company.dashboard');
                Route::get('/details', [App\Http\Controllers\FrontendController::class, 'companyDetails'])->name('company.details');
                Route::get('/profile', [App\Http\Controllers\CompanyDashboardController::class, 'profile'])->name('company.profile');
                Route::post('/profile/update', [App\Http\Controllers\CompanyDashboardController::class, 'profileUpdate'])->name('company.profile.update');
                Route::get('/jobs', [App\Http\Controllers\CompanyDashboardController::class, 'jobs'])->name('company.jobs');
                Route::get('/jobs/create', [App\Http\Controllers\CompanyDashboardController::class, 'createJobs'])->middleware(['packageCheck'])->name('company.jobs.create');
                Route::post('/jobs/store', [App\Http\Controllers\CompanyDashboardController::class, 'StoreJob'])->middleware(['packageCheck'])->name('company.jobs.store');
                Route::post('/jobs/update', [App\Http\Controllers\CompanyDashboardController::class, 'updateJob'])->name('company.jobs.update');
                Route::get('/job/delete/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'deleteCompPost'])->name('companys.jobs.delete');

                // Exam section
                Route::get('/exams', ShowExams::class)
                    //->middleware(['packageCheck'])
                    ->name('company.exam.listing');

                Route::controller(ExamController::class)->group(function () {
                    Route::get('/exams/add', 'create')->name('company.exam.create');
                    Route::post('/exams/add', 'store');
                    Route::post('/csv/add', 'uploadCSV')->name('company.exam.uploadCSV');
                    Route::get('/exams/edit/{id}', 'edit')->name('company.exam.update');
                    Route::put('/exams/edit/{id}', 'update');
                    Route::get('/exams/delete/{id}', 'destroy')->name('company.exam.delete');
                    Route::post('/exams/remove', 'remove')->name('company.exam.remove');
                });
                
                Route::get('/exams/questions/update/{id}', ShowQuestionAnswersAfterUpdate::class)
                    //->middleware(['packageCheck'])
                    ->name('company.exam.question.update.listing');

                Route::get('/exams/questions/{id}', ShowQuestionAnswers::class)
                    //->middleware(['packageCheck'])
                    ->name('company.exam.question.listing');

                Route::controller(ExamQuestionAnswerController::class)->group(function () {
                    Route::get('/exams/question/add/{id}', 'create')->name('company.exam.question.create');
                    Route::post('/exams/question/add/{id}', 'store');
                    Route::get('/exams/question/edit/{id}', 'edit')->name('company.exam.question.update');
                    Route::put('/exams/question/edit/{id}', 'update');
                    Route::get('/exams/question/delete/{id}', 'destroy')->name('company.exam.question.delete');
                    Route::post('/exams/question/remove', 'remove')->name('company.exam.question.remove');

                });

                Route::get('/all/applications', [App\Http\Controllers\CompanyDashboardController::class, 'jobApplications'])->name('company.jobApplications');
                Route::get('/jobs/edit/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'editPost'])->name('company.job.edit');
                Route::get('/recruiters', [App\Http\Controllers\RequestController::class, 'recruiter'])->name('company.recruiters');

                Route::get('/candidate', [App\Http\Controllers\CompanyDashboardController::class, 'candidateIndex'])->name('company.candidateIndex');
                Route::get('/recruiters/send/request/{id}', [App\Http\Controllers\RequestController::class, 'sendRequest'])->name('company.recruiters.send');
                Route::get('/job/status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'jobAppStatus'])->name('company.job.status');
                Route::get('/job/Status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'jobAppStatus2'])->name('company.job.status2');
                Route::get('assign/job', [App\Http\Controllers\CompanyDashboardController::class, 'assignJob'])->name('company.job.assign');

                //approve recruiters post
                Route::get('/job/change/status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'updatePostStatus'])->name('change.status.job');
                //deactivate recruiters post
                Route::get('/job/deactive/status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'deactivePostStatus'])->name('change.deactive.job');

                Route::get('/job/details/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'jobDetailsComp'])->name('company.job.details');
                Route::get('/job/applicants/{slug}', [App\Http\Controllers\CompanyDashboardController::class, 'jobApplicantsCompBySlug'])->name('company.job.applicants');
                Route::get('/job/applicantsById/{id}/{notification_id}', [App\Http\Controllers\CompanyDashboardController::class, 'jobApplicantsCompById'])->name('company.job.applicantsById');
                Route::get('/job/shortlisted/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'jobshortlistedComp'])->name('company.job.shortlisted');
                Route::get('/exam/result/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'examResultComp'])->name('company.exam.result');

                Route::get('/marker/candidate', [App\Http\Controllers\CompanyDashboardController::class, 'mamrkerCandidate'])->name('company.marker.candidate');
                Route::get('/map', [App\Http\Controllers\MapController::class, 'companyMap'])->name('company.map');


                Route::post('/smart-search/candidate', [App\Http\Controllers\MapController::class, 'smartSearch'])->name('smartSearch.candidate');

                // Route::get('/map',function()
                // {
                //     return view('companypanel.pages.map.index');
                // })->name('company.map');

                // Post An Existing Job
                Route::get('/Jobs/similar/create/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'postAnExistingJob'])->middleware(['packageCheck'])->name('company.existing.job');
                //chat module
                Route::get('/chat/{user}/{slug}', [App\Http\Controllers\ChatsController::class, 'index'])->name('chat.index');


                // Route::get('/search-keyword',[App\Http\Controllers\CompanyDashboardController::class, 'searchKeyword'])->name('company.search.Keyword');
                Route::get('/existing-jobs', [App\Http\Controllers\CompanyDashboardController::class, 'existingJobs'])->name('fetch.existing.jobs');

                //Candidate Rel Chat
                Route::get('/create/chat/{id}', [App\Http\Controllers\CandidateRoleRelationshipController::class, 'create'])->name('candidate.company.chat');

                //Get Categories Edit
                Route::get('/getCompCategory', [App\Http\Controllers\CompanyDashboardController::class, 'getCompCategory'])->name('company.getCompCategory');

                //Get Test by Categories
                Route::get('/gettest/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'companygettest'])->name('company.get.test');

                //Get Test by Categories
                Route::get('/test', [App\Http\Controllers\CompanyDashboardController::class, 'getTest'])->name('company.get.testCreate');

                //Hire Candidate Comp
                Route::get('/hire/candidate/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'hirecandidate'])->name('hire.candidate.comp');

                Route::get('/shortlist/candidate/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'shortListCandidate'])->name('shortlist.candidate.comp');

                Route::post('/hire-or-reject/candidate', [App\Http\Controllers\CompanyDashboardController::class, 'hireReject'])->name('hireReject.candidate.comp');
            
                Route::get('/allNotifications', [App\Http\Controllers\FrontendController::class, 'allNotifications'])->name('company.allNotifications');
            
                Route::get('/markNotificationsRead', [App\Http\Controllers\FrontendController::class, 'markAllNotificationsRead'])->name('company.markNotificationsRead');
            }
        );
    });

    Route::prefix('/recruiter')->middleware(['auth', 'verified'])->group(function () {
        Route::middleware(['checkrecruiter'])->group(
            function () {

                Route::get('/', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

                //test
                Route::get('/job/delete/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'deleteCompPost'])->name('recruiter.jobs.delete');


                Route::get('/profile', [App\Http\Controllers\RecruiterDashboardController::class, 'profileSetup'])->name('recruiter.profile');
                Route::post('/profileupdate', [App\Http\Controllers\RecruiterDashboardController::class, 'profileUpdate'])->name('recruiter.profile.update');
                Route::get('/details', [App\Http\Controllers\FrontendController::class, 'recruiterDetails'])->name('recruiter.details');
                Route::get('/company', [App\Http\Controllers\RecruiterDashboardController::class, 'companyIndex'])->name('recruiter.companyIndex');
                Route::get('/company/accept/request/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'AcceptRequest'])->name('recruiters.accept');
                Route::get('/company/reject/request/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'rejectRequest'])->name('recruiters.reject');
                Route::get('/candidate', [App\Http\Controllers\RecruiterDashboardController::class, 'candidateIndex'])->name('recruiter.candidateIndex');
                Route::get('/company/details/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'companyDetails'])->name('recruiter.companyDetails');
                Route::get('/candidate/details/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'candidateDetails'])->name('recruiter.candidateDetails');

                Route::get('/jobs', [App\Http\Controllers\RecruiterDashboardController::class, 'jobs'])->name('recruiter.jobs');
                Route::get('/jobs/create', [App\Http\Controllers\RecruiterDashboardController::class, 'createJobs'])->middleware(['packageCheck'])->name('recruiter.jobs.create');
                Route::post('/jobs/store', [App\Http\Controllers\RecruiterDashboardController::class, 'StoreJob'])->middleware(['packageCheck'])->name('recruiter.jobs.store');
                Route::get('/jobs/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'editJobs'])->name('recruiter.jobs.edit');
                Route::post('/jobs/update', [App\Http\Controllers\RecruiterDashboardController::class, 'updateJob'])->name('recruiter.jobs.update');
                Route::get('/all/applications', [App\Http\Controllers\RecruiterDashboardController::class, 'jobApplications'])->name('recruiter.jobApplications');
                Route::get('/job/status/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'jobAppStatus'])->name('recruiter.job.status');
                Route::get('assign/job', [App\Http\Controllers\RecruiterDashboardController::class, 'assignJob'])->name('recruiter.job.assign');
                Route::get('/job/del/destroy{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'destroyJobs'])->name('recruiter.job.destroy');

                Route::get('/send/request/to/employer/{id}', [App\Http\Controllers\RequestController::class, 'sendRequestToComp'])->name('recruiter.request.send.to.company');

                // Import csv
                Route::post('/jobs/import-csv', [App\Http\Controllers\RecruiterDashboardController::class, 'importCsv'])->name('recruiter.csv');

                Route::get('/job/details/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'jobDetailsRec'])->name('recruiter.job.details');
                Route::get('/job/applicants/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'jobApplicantsRec'])->name('recruiter.job.applicants');
                Route::get('/job/shortlisted/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'jobshortlistedRec'])->name('recruiter.job.shortlisted');
                Route::get('/exam/result/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'examResultRec'])->name('recruiter.exam.result');

                // Post An Existing Job
                Route::get('/Jobs/similar/create/{id}', [App\Http\Controllers\RecruiterDashboardController::class, 'postAnExistingJob'])->middleware(['packageCheck'])->name('recruiter.existing.job');
                Route::get('/search-keyword', [App\Http\Controllers\RecruiterDashboardController::class, 'searchKeyword'])->name('recruiter.search.Keyword');

                // Post An Existing Job
                Route::get('/marker/candidate', [App\Http\Controllers\RecruiterDashboardController::class, 'mamrkerCandidate'])->name('recruiter.marker.candidate');
                Route::get('/map', [App\Http\Controllers\MapController::class, 'recruiterMap'])->name('recruiter.map');
                Route::post('/smart-search/candidate', [App\Http\Controllers\MapController::class, 'recruiterSmartSearch'])->name('recruiter.smartSearch.candidate');

                Route::get('/existing_jobs', [App\Http\Controllers\RecruiterDashboardController::class, 'existing_jobs'])->name('fetch.recExisting.jobs');

                //Candidate Rel Chat
                Route::get('/create/chat/{id}', [App\Http\Controllers\CandidateRoleRelationshipController::class, 'create'])->name('candidate.recruiter.chat');

                //Recruiter Skills Get Edit
                Route::get('/getRecCategory', [App\Http\Controllers\RecruiterDashboardController::class, 'getRecCategory'])->name('recruiter.getRecCategory');

                //Get Test by Categories
                Route::get('/rec/gettest/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'companygettest'])->name('recruiter.get.test');

                Route::get('/hire/candidate/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'hirecandidate'])->name('hire.candidate.rec');

                //Get Test by Categories
                Route::get('/test/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'getTest'])->name('recruiter.get.testCreate');

                //approve recruiters post
                Route::get('/rec/job/change/status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'updatePostStatus'])->name('rec.change.status.job');
                //deactivate recruiters post
                Route::get('/rec/job/deactive/status/{id}', [App\Http\Controllers\CompanyDashboardController::class, 'deactivePostStatus'])->name('rec.change.deactive.job');
            }
        );
    });
});

Route::get('/connected/recruiters', [App\Http\Controllers\RequestController::class, 'connectedRecruiter'])->name('company.connectedRecruiter');

Route::get('/messages', [App\Http\Controllers\ChatsController::class, 'fetchMessages'])->name('fetch.messages');
Route::get('/messages/individual', [App\Http\Controllers\ChatsController::class, 'AllMessge'])->name('fetch.messages.individual');
Route::post('/messages', [App\Http\Controllers\ChatsController::class, 'sendMessage'])->name('send.messages');
