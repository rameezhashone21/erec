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
                <h3>Add New Subscription Package</h3><br>
            </div>
        </div>
    </div>

    <div class="container">
        <form method="post" action="{{ route('admin.packages.store') }}" enctype="multipart/form-data">
            @csrf
            @method('post')
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Package Name</label>
                    <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ old('name') }}"
                        placeholder="Enter Package Name" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="no_of_posts" class="form-label fs-14 text-theme-primary fw-bold">Number of Posts Allowed</label>
                    <input type="number" class="form-control fs-14 h-50px" name="no_of_posts" value="{{ old('no_of_posts') }}"
                        placeholder="Enter Number of Posts Allowed" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Color</label>
                    <select class="form-control" name="class" id="inputcolor" required>
                        <option @if (old('class') == 'bronze') selected @endif value="bronze">Bronze</option>
                        <option @if (old('class') == 'silver') selected @endif value="silver">Silver</option>
                        <option @if (old('class') == 'gold') selected @endif value="gold">Gold</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Duration</label>
                    <select class="form-control" name="time_interval" id="inputtime" required>
                        <option @if (old('time_interval') == 'month') selected @endif value="month">Month</option>
                        <option @if (old('time_interval') == 'year') selected @endif value="year">Year</option>
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="price" class="form-label fs-14 text-theme-primary fw-bold">Price</label>
                    <input type="number" class="form-control fs-14 h-50px" name="price" value="{{ old('price') }}"
                        placeholder="Enter Package Price" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shortdesc" class="form-label fs-14 text-theme-primary fw-bold">Short Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="shortdesc" value="{{ old('shortdesc') }}"
                        placeholder="Enter Short Description Package" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="desc" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                    <input type="text" class="form-control fs-14 h-50px" name="desc" value="{{ old('desc') }}"
                        placeholder="Enter Description Package" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Package Slogan</label>
                    <input type="text" class="form-control fs-14 h-50px" name="slogan" value="{{ old('slogan') }}"
                        placeholder="Enter Package Slogan" required>
                </div>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Applicant Profiling</label>
                <select class="form-control" name="applicantProfiling" id="applicantProfiling">
                    <option @if (old('applicantProfiling') == 1) selected @endif value="1">Active</option>
                    <option @if (old('applicantProfiling') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Applicant Tracking</label>
                <select class="form-control" name="applicantTracking" id="applicantTracking">
                    <option @if (old('applicantTracking') == 1) selected @endif value="1">Active</option>
                    <option @if (old('applicantTracking') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">E-REC Dashboard</label>
                <select class="form-control" name="erecDashboard" id="erecDashboard">
                    <option @if (old('erecDashboard') == 1) selected @endif value="1">Active</option>
                    <option @if (old('erecDashboard') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">E-REC Reporting Engine</label>
                <select class="form-control" name="erecReportingEngine" id="erecReportingEngine">
                    <option @if (old('erecReportingEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('erecReportingEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Database Search</label>
                <select class="form-control" name="databaseSearch" id="databaseSearch">
                    <option @if (old('databaseSearch') == 1) selected @endif value="1">Active</option>
                    <option @if (old('databaseSearch') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Upload CV</label>
                <select class="form-control" name="uploadCV" id="uploadCV">
                    <option @if (old('uploadCV') == 1) selected @endif value="1">Active</option>
                    <option @if (old('uploadCV') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Longlist Assessment</label>
                <select class="form-control" name="longlistAssessment" id="longlistAssessment">
                    <option @if (old('longlistAssessment') == 1) selected @endif value="1">Active</option>
                    <option @if (old('longlistAssessment') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Shortlist Assessment</label>
                <select class="form-control" name="shortlistAssessment" id="shortlistAssessment">
                    <option @if (old('shortlistAssessment') == 1) selected @endif value="1">Active</option>
                    <option @if (old('shortlistAssessment') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Email Integration</label>
                <select class="form-control" name="emailIntegration" id="emailIntegration">
                    <option @if (old('emailIntegration') == 1) selected @endif value="1">Active</option>
                    <option @if (old('emailIntegration') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">SMS Integration</label>
                <select class="form-control" name="smsIntegration" id="smsIntegration">
                    <option @if (old('smsIntegration') == 1) selected @endif value="1">Active</option>
                    <option @if (old('smsIntegration') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Live Based Chatting</label>
                <select class="form-control" name="liveBasedChatting" id="liveBasedChatting">
                    <option @if (old('liveBasedChatting') == 1) selected @endif value="1">Active</option>
                    <option @if (old('liveBasedChatting') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Industry Based
                    Assessment</label>
                <select class="form-control" name="industryBasedAssessment" id="industryBasedAssessment">
                    <option @if (old('industryBasedAssessment') == 1) selected @endif value="1">Active</option>
                    <option @if (old('industryBasedAssessment') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">AI Engine Integration</label>
                <select class="form-control" name="aiEngineIntegration" id="aiEngineIntegration">
                    <option @if (old('aiEngineIntegration') == 1) selected @endif value="1">Active</option>
                    <option @if (old('aiEngineIntegration') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">MI Engine Integration</label>
                <select class="form-control" name="mlEngineIntegration" id="mlEngineIntegration">
                    <option @if (old('mlEngineIntegration') == 1) selected @endif value="1">Active</option>
                    <option @if (old('mlEngineIntegration') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Predictive Analysis
                    Engine</label>
                <select class="form-control" name="predictiveAnalysisEngine" id="predictiveAnalysisEngine">
                    <option @if (old('predictiveAnalysisEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('predictiveAnalysisEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">CTAT Engine</label>
                <select class="form-control" name="ctatEngine" id="ctatEngine">
                    <option @if (old('ctatEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('ctatEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">RASV Engine</label>
                <select class="form-control" name="rasvEngine" id="rasvEngine">
                    <option @if (old('rasvEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('rasvEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">TATI Engine</label>
                <select class="form-control" name="tatiEngine" id="tatiEngine">
                    <option @if (old('tatiEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('tatiEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">IAGM Engine</label>
                <select class="form-control" name="iagmEngine" id="iagmEngine">
                    <option @if (old('iagmEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('iagmEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">RTY Engine</label>
                <select class="form-control" name="rtwEngine" id="rtwEngine">
                    <option @if (old('rtwEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('rtwEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">AMI Engine</label>
                <select class="form-control" name="amiEngine" id="amiEngine">
                    <option @if (old('amiEngine') == 1) selected @endif value="1">Active</option>
                    <option @if (old('amiEngine') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="slogan" class="form-label fs-14 text-theme-primary fw-bold">Status</label>
                <select class="form-control" name="status" id="inputStatus" required>
                    <option @if (old('status') == 1) selected @endif value="1">Active</option>
                    <option @if (old('status') == 0) selected @endif value="0">Deactive</option>
                </select>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="w-25 btn btn-primary"> Create </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('bottom_script')
@endsection
