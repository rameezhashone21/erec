@extends('adminpanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('admin.packages') }}" class="btn btn-primary btn_panel mb-3">Go back</a>
        <div class="row">
            <div class="col-sm-9">
                <h3>Edit Subscription Package</h3><br>
            </div>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible">
                {{ $error }}
            </div>
        @endforeach
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            {{ session('error') }}
        </div>
    @endif
    <div class="container">
        <form method="post" action="{{ route('admin.packages.update') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <input type="hidden" name="pkg_id" value="{{ $pkg->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Package Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $pkg->name }}"
                        placeholder="Enter Package Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_of_posts" class="form-label fs-14 text-theme-primary fw-bold">Number of Posts
                        Allowed</label>
                    <input type="number" class="form-control fs-14 h-50px" name="no_of_posts"
                        value="{{ $pkg->no_of_posts }}" placeholder="Enter Number of Posts Allowed" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Color</label>
                    <select class="form-control" name="class" id="inputcolor" required>
                        <option @if ($pkg->class == 'bronze') selected @endif value="bronze">Bronze</option>
                        <option @if ($pkg->class == 'silver') selected @endif value="silver">Silver</option>
                        <option @if ($pkg->class == 'gold') selected @endif value="gold">Gold</option>
                    </select>
                </div>
            </div>
            @if ($pkg->id != 21)
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Duration</label>
                        <select class="form-control" name="time_interval" id="inputtime" required>
                            <option @if ($pkg->time_interval == 'month') selected @endif value="month">Month</option>
                            <option @if ($pkg->time_interval == 'year') selected @endif value="year">Year</option>
                        </select>
                        {{-- <input type="text" class="form-control fs-14 h-50px" name="time_interval"
                        value="{{ $pkg->time_interval }}" placeholder="Enter Package Price" required> --}}
                    </div>
                </div>
            @else
                <input type="hidden" name="time_interval" value="null">
            @endif
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price" class="form-label fs-14 text-theme-primary fw-bold">Price</label>
                    <input type="text" class="form-control fs-14 h-50px" name="price" value="{{ $pkg->price }}"
                        placeholder="Enter Package Price" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shortdesc" class="form-label fs-14 text-theme-primary fw-bold">Short Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="shortdesc" value="{{ $pkg->shortdesc }}"
                        placeholder="Enter Short Description Package" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="desc" value="{{ $pkg->desc }}"
                        placeholder="Enter Description Package" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Package Slogan</label>
                    <input type="text" class="form-control fs-14 h-50px" name="slogan" value="{{ $pkg->slogan }}"
                        placeholder="Enter Package Slogan" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Applicant Profiling</label>
                <select class="form-control" name="applicantProfiling" id="applicantProfiling">
                    <option @if ($pkg->applicantProfiling == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->applicantProfiling == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Applicant Tracking</label>
                <select class="form-control" name="applicantTracking" id="applicantTracking">
                    <option @if ($pkg->applicantTracking == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->applicantTracking == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">E-REC Dashboard</label>
                <select class="form-control" name="erecDashboard" id="erecDashboard">
                    <option @if ($pkg->erecDashboard == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->erecDashboard == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">E-REC Reporting Engine</label>
                <select class="form-control" name="erecReportingEngine" id="erecReportingEngine">
                    <option @if ($pkg->erecReportingEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->erecReportingEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Database Search</label>
                <select class="form-control" name="databaseSearch" id="databaseSearch">
                    <option @if ($pkg->databaseSearch == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->databaseSearch == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Upload CV</label>
                <select class="form-control" name="uploadCV" id="uploadCV">
                    <option @if ($pkg->uploadCV == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->uploadCV == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Longlist Assessment</label>
                <select class="form-control" name="longlistAssessment" id="longlistAssessment">
                    <option @if ($pkg->longlistAssessment == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->longlistAssessment == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Shortlist Assessment</label>
                <select class="form-control" name="shortlistAssessment" id="shortlistAssessment">
                    <option @if ($pkg->shortlistAssessment == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->shortlistAssessment == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Email Integration</label>
                <select class="form-control" name="emailIntegration" id="emailIntegration">
                    <option @if ($pkg->emailIntegration == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->emailIntegration == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">SMS Integration</label>
                <select class="form-control" name="smsIntegration" id="smsIntegration">
                    <option @if ($pkg->smsIntegration == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->smsIntegration == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Live Based Chatting</label>
                <select class="form-control" name="liveBasedChatting" id="liveBasedChatting">
                    <option @if ($pkg->liveBasedChatting == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->liveBasedChatting == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Industry Based
                    Assessment</label>
                <select class="form-control" name="industryBasedAssessment" id="industryBasedAssessment">
                    <option @if ($pkg->industryBasedAssessment == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->industryBasedAssessment == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">AI Engine Integration</label>
                <select class="form-control" name="aiEngineIntegration" id="aiEngineIntegration">
                    <option @if ($pkg->aiEngineIntegration == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->aiEngineIntegration == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">MI Engine Integration</label>
                <select class="form-control" name="mlEngineIntegration" id="mlEngineIntegration">
                    <option @if ($pkg->mlEngineIntegration == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->mlEngineIntegration == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Predictive Analysis
                    Engine</label>
                <select class="form-control" name="predictiveAnalysisEngine" id="predictiveAnalysisEngine">
                    <option @if ($pkg->predictiveAnalysisEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->predictiveAnalysisEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">CTAT Engine</label>
                <select class="form-control" name="ctatEngine" id="ctatEngine">
                    <option @if ($pkg->ctatEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->ctatEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">RASV Engine</label>
                <select class="form-control" name="rasvEngine" id="rasvEngine">
                    <option @if ($pkg->rasvEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->rasvEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">TATI Engine</label>
                <select class="form-control" name="tatiEngine" id="tatiEngine">
                    <option @if ($pkg->tatiEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->tatiEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">IAGM Engine</label>
                <select class="form-control" name="iagmEngine" id="iagmEngine">
                    <option @if ($pkg->iagmEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->iagmEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">RTY Engine</label>
                <select class="form-control" name="rtwEngine" id="rtwEngine">
                    <option @if ($pkg->rtwEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->rtwEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">AMI Engine</label>
                <select class="form-control" name="amiEngine" id="amiEngine">
                    <option @if ($pkg->amiEngine == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->amiEngine == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                <select class="form-control" name="status" id="inputStatus" required>
                    <option @if ($pkg->status == 1) selected @endif value="1">Active</option>
                    <option @if ($pkg->status == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Update </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('bottom_script')
@endsection
