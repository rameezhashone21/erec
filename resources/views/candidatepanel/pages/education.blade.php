@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8 ">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <div class="d-md-flex aling-items-center mb-3">
                @if (session($key ?? 'error'))
                    <div class="alert alert-danger" role="alert">
                        {!! session($key ?? 'error') !!}
                    </div>
                @endif
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3 mb-md-0">Educational Details</h2>
                {{-- <a href="{{ route('candidates.education.new') }}"
            class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">Add New Education</a> --}}
                <a class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto" href="javascript:;" role="button"
                    data-bs-toggle="modal" data-bs-target="#newExperience"> Add New Education
                </a>
                {{-- start add new experience --}}
                <div class="modal fade" id="newExperience" tabindex="-1" aria-labelledby="newExperienceLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="border-bottom pb-3 d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-500 text_primary fs-5 align-self-center">
                                        Add New
                                        Education
                                    </h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="firstform-create" data-attr="" disabled
                                    class="dashboard-form dashboard-form-2 dashboard-form-2" enctype="multipart/form-data">
                                    @csrf
                                    @method('post')
                                    <input type="hidden" name="source" value="api" />
                                    <div class="row gy-4">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Degree
                                                    Title*</label>
                                                <select id="edu_role" class="form-select fs-14  h-50px" name="education[]"
                                                    required>
                                                    <option selected value="" disabled>Please Select Education
                                                    </option>
                                                    <option value="PHD">PHD</option>
                                                    <option value="Masters">Masters</option>
                                                    <option value="Bachelors">Bachelors
                                                    </option>
                                                    <option value="Undergrad">Undergrad
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Field
                                                    of Study*</label>
                                                <select id="course_role" class="form-select fs-14  h-50px" name="course[]"
                                                    required>
                                                    <option selected value="" disabled>Please Select Course</option>
                                                    <option value="Advanced Astrophysics">Advanced Astrophysics</option>
                                                    <option value="Art History: Renaissance to Modern">Art History:
                                                        Renaissance to Modern
                                                    </option>
                                                    <option value="Abnormal Psychology">Abnormal Psychology</option>
                                                    <option value="Accounting Principles">Accounting Principles</option>
                                                    <option value="African History and Culture">African History and Culture
                                                    </option>
                                                    <option value="Biochemistry">Biochemistry</option>
                                                    <option value="Business Ethics">Business Ethics</option>
                                                    <option value="British Literature">British Literature</option>
                                                    <option value="Behavioral Economics">Behavioral Economics</option>
                                                    <option value="Biomedical Engineering">Biomedical Engineering</option>
                                                    <option value="Calculus II">Calculus II</option>
                                                    <option value="Comparative Politics">Comparative Politics</option>
                                                    <option value="Computer Science Fundamentals">Computer Science
                                                        Fundamentals</option>
                                                    <option value="Cultural Anthropology">Cultural Anthropology</option>
                                                    <option value="Creative Writing">Creative Writing</option>
                                                    <option value="Data Analysis and Visualization">Data Analysis and
                                                        Visualization</option>
                                                    <option value="Differential Equations">Differential Equations</option>
                                                    <option value="Developmental Psychology">Developmental Psychology
                                                    </option>
                                                    <option value="Digital Marketing">Digital Marketing</option>
                                                    <option value="Discrete Mathematics">Discrete Mathematics</option>
                                                    <option value="Environmental Science">Environmental Science</option>
                                                    <option value="European History">European History</option>
                                                    <option value="Economics of Globalization">Economics of Globalization
                                                    </option>
                                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                                    <option value="French Language and Culture">French Language and Culture
                                                    </option>
                                                    <option value="Financial Management">Financial Management</option>
                                                    <option value="Film Studies">Film Studies</option>
                                                    <option value="Forensic Science">Forensic Science</option>
                                                    <option value="Foundations of Education">Foundations of Education
                                                    </option>
                                                    <option value="Genetics">Genetics</option>
                                                    <option value="Geology and Earth Sciences">Geology and Earth Sciences
                                                    </option>
                                                    <option value="Gender Studies">Gender Studies</option>
                                                    <option value="Global Health">Global Health</option>
                                                    <option value="Game Design">Game Design</option>
                                                    <option value="Human Anatomy">Human Anatomy</option>
                                                    <option value="History of Philosophy">History of Philosophy</option>
                                                    <option value="Health Psychology">Health Psychology</option>
                                                    <option value="Human Resource Management">Human Resource Management
                                                    </option>
                                                    <option value="Hispanic Literature">Hispanic Literature</option>
                                                    <option value="International Relations">International Relations</option>
                                                    <option value="Introduction to Artificial Intelligence">Introduction to
                                                        Artificial
                                                        Intelligence</option>
                                                    <option value="Italian Renaissance Art">Italian Renaissance Art</option>
                                                    <option value="Industrial Engineering">Industrial Engineering</option>
                                                    <option value="Information Systems">Information Systems</option>
                                                    <option value="Japanese Language and Culture">Japanese Language and
                                                        Culture</option>
                                                    <option value="Journalism Ethics">Journalism Ethics</option>
                                                    <option value="Jazz History">Jazz History</option>
                                                    <option value="Jurisprudence">Jurisprudence</option>
                                                    <option value="Java Programming">Java Programming</option>
                                                    <option value="Korean Language and Culture">Korean Language and Culture
                                                    </option>
                                                    <option value="Knowledge Management">Knowledge Management</option>
                                                    <option value="Kinematics and Dynamics">Kinematics and Dynamics
                                                    </option>
                                                    <option value="Key Concepts in Sociology">Key Concepts in Sociology
                                                    </option>
                                                    <option value="Kinesiology">Kinesiology</option>
                                                    <option value="Linear Algebra">Linear Algebra</option>
                                                    <option value="Linguistics">Linguistics</option>
                                                    <option value="Literary Theory">Literary Theory</option>
                                                    <option value="Leadership and Organizational Behavior">Leadership and
                                                        Organizational
                                                        Behavior</option>
                                                    <option value="Landscape Architecture">Landscape Architecture</option>
                                                    <option value="Microbiology">Microbiology</option>
                                                    <option value="Marketing Strategy">Marketing Strategy</option>
                                                    <option value="Modern European Philosophy">Modern European Philosophy
                                                    </option>
                                                    <option value="Materials Science">Materials Science</option>
                                                    <option value="Music Theory">Music Theory</option>
                                                    <option value="Neurobiology">Neurobiology</option>
                                                    <option value="Nuclear Physics">Nuclear Physics</option>
                                                    <option value="Native American Studies">Native American Studies
                                                    </option>
                                                    <option value="Nonprofit Management">Nonprofit Management</option>
                                                    <option value="Network Security">Network Security</option>
                                                    <option value="Organic Chemistry">Organic Chemistry</option>
                                                    <option value="Operations Management">Operations Management</option>
                                                    <option value="Old English Literature">Old English Literature</option>
                                                    <option value="Oceanography">Oceanography</option>
                                                    <option value="Organizational Psychology">Organizational Psychology
                                                    </option>
                                                    <option value="Probability and Statistics">Probability and Statistics
                                                    </option>
                                                    <option value="Political Philosophy">Political Philosophy</option>
                                                    <option value="Public Health Policy">Public Health Policy</option>
                                                    <option value="Principles of Marketing">Principles of Marketing
                                                    </option>
                                                    <option value="Photography">Photography</option>
                                                    <option value="Quantum Mechanics">Quantum Mechanics</option>
                                                    <option value="Queer Studies">Queer Studies</option>
                                                    <option value="Quality Control">Quality Control</option>
                                                    <option value="Quantitative Finance">Quantitative Finance</option>
                                                    <option value="Questioning in Philosophy">Questioning in Philosophy
                                                    </option>
                                                    <option value="Robotics and Automation">Robotics and Automation
                                                    </option>
                                                    <option value="Romantic Literature">Romantic Literature</option>
                                                    <option value="Risk Management">Risk Management</option>
                                                    <option value="Russian Language and Culture">Russian Language and
                                                        Culture</option>
                                                    <option value="Religious Studies">Religious Studies</option>
                                                    <option value="Social Psychology">Social Psychology</option>
                                                    <option value="Software Engineering">Software Engineering</option>
                                                    <option value="Shakespearean Drama">Shakespearean Drama</option>
                                                    <option value="Sustainable Architecture">Sustainable Architecture
                                                    </option>
                                                    <option value="Sports Management">Sports Management</option>
                                                    <option value="Thermodynamics">Thermodynamics</option>
                                                    <option value="Theatre Arts">Theatre Arts</option>
                                                    <option value="Taxation">Taxation</option>
                                                    <option value="Theoretical Physics">Theoretical Physics</option>
                                                    <option value="Travel and Tourism Management">Travel and Tourism
                                                        Management</option>
                                                    <option value="Urban Planning">Urban Planning</option>
                                                    <option value="United States Government">United States Government
                                                    </option>
                                                    <option value="User Experience Design">User Experience Design</option>
                                                    <option value="Underwater Archaeology">Underwater Archaeology</option>
                                                    <option value="Urban Economics">Urban Economics</option>
                                                    <option value="Virology">Virology</option>
                                                    <option value="Victorian Literature">Victorian Literature</option>
                                                    <option value="Visual Arts">Visual Arts</option>
                                                    <option value="Venture Capital">Venture Capital</option>
                                                    <option value="Video Game Development">Video Game Development</option>
                                                    <option value="World History">World History</option>
                                                    <option value="Web Development">Web Development</option>
                                                    <option value="Women's Studies">Women's Studies</option>
                                                    <option value="Wildlife Conservation">Wildlife Conservation</option>
                                                    <option value="Wireless Communication">Wireless Communication</option>
                                                    <option
                                                        value="Xenobiology (Note: X is a challenging letter for course titles.)">
                                                        Xenobiology (Note: X is a challenging letter for course titles.)
                                                    </option>
                                                    <option value="Youth Development">Youth Development</option>
                                                    <option value="Yoga and Wellness">Yoga and Wellness</option>
                                                    <option value="Yiddish Literature (Note: Y is also challenging.)">
                                                        Yiddish Literature
                                                        (Note: Y is also challenging.)</option>
                                                    <option value="Zoology">Zoology</option>
                                                    <option value="Zen Buddhism">Zen Buddhism</option>
                                                    <option value="Zero Gravity Physics (Note: Z is a rare letter.)">Zero
                                                        Gravity Physics
                                                        (Note: Z is a rare letter.)</option>
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institute"
                                                    class="form-label fs-14 text-theme-primary fw-bold">University /
                                                    Institute*</label>
                                                <input type="text" class="form-control fs-14 h-50px"
                                                    id="institute_role" name="institute[]"
                                                    placeholder="Please Enter Institute" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="institute_loc"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Institute
                                                    Location*</label>
                                                <input type="text" class="form-control fs-14 h-50px"
                                                    name="institute_loc[]" id="institute_loc_role"
                                                    placeholder="Please Enter Institute Location" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label fs-14 text-theme-primary fw-bold">Passing
                                                Year*</label>
                                            <div class="position-relative">
                                                <input type="text"
                                                    class="form-control datepicker fs-14 h-50px border-bottom"
                                                    name="passing_year[]" id="passing_year_role" required readonly
                                                    style="border-color: #007ba7 !important; ">
                                                <label class="calender-icon d-block" for="passing_year_role">
                                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                                </label>
                                            </div>
                                            {{-- <div class="form-group">
                                                <label for="passing_year"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Passing
                                                    Year*</label>
                                                <input type="date" class="form-control fs-14 h-50px"
                                                    name="passing_year[]" id="passing_year_role" placeholder="Passing Year"
                                                    required>
                                            </div> --}}
                                        </div>
                                        <div class="col-md-6">
                                            <label for="grade"
                                                class="form-label fs-14 text-theme-primary fw-bold">Grade</label>
                                            <select class="form-select fs-14  h-50px" name="grade[]" id="grade_role">
                                                <option selected value="">Please Select Grade</option>
                                                <option value="HD">High Distinction (HD)</option>
                                                <option value="D"> Distinction (D)</option>
                                                <option value="C">Credit (C)</option>
                                                <option value="P">Pass (P)</option>
                                            </select>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="name"
                                                class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                            <textarea class="form-control fs-14 description_role-new" maxlength="250" name="description[]"
                                                id="description_role"></textarea>
                                            <div class="text_primary characters" style="font-size: 12px;">
                                                <span id="description_roleCharsNew"></span>
                                                Character(s) Remaining
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn_viewall px-4 py-2 d-inline-block"> Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end add new experience --}}
            </div>
            @if (isset(auth()->user()->candidateEdu))
                @foreach ($user->candidateEdu as $row)
                    <div class="border-bottom py-3" id="eduDiv-{{ $row->id }}">
                        <div class="d-flex">
                            <div class="me-3 d-none d-sm-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="38.963" height="29.514"
                                    viewBox="0 0 38.963 29.514">
                                    <path id="graduation"
                                        d="M43.888,40.959a.6.6,0,0,0-.024-.119,2.847,2.847,0,0,0-1.022-1.833,2.826,2.826,0,0,0-1.161-4.92V25.166l1.746-.617a.653.653,0,0,0,0-1.23l-18.3-6.6a.653.653,0,0,0-.442,0l-18.43,6.6a.653.653,0,0,0,0,1.231l6.665,2.337.926,11.382C13.9,40.849,19.407,42.2,24.847,42.2s10.941-1.349,10.987-3.928l1.04-11.408,3.5-1.237v8.46a2.826,2.826,0,0,0-1.162,4.92,2.848,2.848,0,0,0-1.022,1.83.7.7,0,0,0-.024.122l-.4,4.019a.653.653,0,0,0,.65.718h5.225a.653.653,0,0,0,.65-.718ZM24.913,18.031l16.354,5.9L24.913,29.7,8.44,23.927ZM34.53,38.179c0,.02,0,.04,0,.059,0,1.082-3.771,2.655-9.681,2.655s-9.681-1.572-9.681-2.655c0-.018,0-.035,0-.053l-.88-10.826L24.7,31.012a.657.657,0,0,0,.434,0l10.387-3.669ZM39.5,36.837a1.524,1.524,0,1,1,1.524,1.524A1.526,1.526,0,0,1,39.5,36.837Zm-.367,7.553.319-3.187a.709.709,0,0,0,.022-.12,1.556,1.556,0,0,1,3.1,0,.621.621,0,0,0,.022.118l.319,3.189H39.137Z"
                                        transform="translate(-5.581 -16.432)" fill="#92929d" stroke="#92929d"
                                        stroke-width="0.5" />
                                </svg>
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h3 class="fw-500 fs-5 mb-1" id="institute-{{ $row->id }}">{{ $row->institute }}
                                    </h3>
                                    <a class="me-3 d-inline-block ms-auto text_grey_999" role="button"
                                        onclick="btn_edit({{ $row->id }})" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Edit" href="javascript:;">
                                        <span role="button" data-bs-toggle="modal" data-bs-target="#editEducation"><i
                                                class="fa-solid fa-pencil "></i></span>
                                    </a>
                                    <a class="d-inline-block  text_grey_999" role="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete" onclick="callModal({{ $row->id }})">
                                        <i class="fas fa-trash-alt"></i></a>

                                </div>
                                <h4 class="fw-500" id="education-{{ $row->id }}">{{ $row->education }} -
                                    {{ $row->course }}</h4>
                                <div class="text_grey_999 fs-14 mt-3 d-flex align-items-center" style="gap: 0 8px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15">
                                        <path id="Shape" d="M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z"
                                            fill="#92929d" />
                                    </svg>
                                    {{-- <span>Passing year - {{ \Carbon\Carbon::parse($row->passing_year)->format('YYYY')}}</span>
                        --}}
                        @php
                            $parsedDate = \Carbon\Carbon::createFromFormat('d/m/Y', $row->passing_year);
                            $year = $parsedDate->year;
                        @endphp
                                    <span id="year-{{ $row->id }}">Passing year -
                                        {{ $year }}</span>
                                </div>
                                <div class="text_grey_999 fs-14 mt-1 d-flex align-items-center" style="gap: 0 8px;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14.239" height="16.958"
                                        viewBox="0 0 14.239 16.958">
                                        <g id="Icon_feather-map-pin" data-name="Icon feather-map-pin"
                                            transform="translate(1 1)">
                                            <path id="Path_3207" data-name="Path 3207"
                                                d="M16.739,7.619c0,4.759-6.119,8.839-6.119,8.839S4.5,12.379,4.5,7.619a6.119,6.119,0,1,1,12.239,0Z"
                                                transform="translate(-4.5 -1.5)" fill="none" stroke="#92929d"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                            <path id="Path_3208" data-name="Path 3208"
                                                d="M17.707,12.6a2.1,2.1,0,1,1-2.1-2.1,2.1,2.1,0,0,1,2.1,2.1Z"
                                                transform="translate(-9.484 -6.468)" fill="none" stroke="#92929d"
                                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2" />
                                        </g>
                                    </svg>
                                    <span id="location-{{ $row->id }}">{{ $row->institute_loc }}</span>
                                </div>
                                {{-- {{ dd($row->grade) }} --}}
                                <div class="mt-3 fw-500" id="grade-{{ $row->id }}">
                                    @if ($row->grade != null)
                                        Grade: {{ $row->grade }}
                                    @endif
                                </div>
                                <p class="text_grey_999 fs-14 mt-3" id="description-{{ $row->id }}">
                                    @if ($row->description != null)
                                        {{ $row->description }}
                                    @endif
                                </p>
                                {{-- <div class="text-end">
                                        <a href="" class="text-decoration-underline text_primary fs-14">See more</a>
                                    </div> --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            {{-- @foreach ($user->candidateEdu as $key => $edu)
                <div class="border p-3 mb-4">
                    <form id="firstform{{ $edu->id }}" data-attr="{{ $edu->id }}" disabled
        class="dashboard-form dashboard-form-2 dashboard-form-2-{{ $edu->id }}"
        enctype="multipart/form-data">
        <input type="hidden" name="edu_id" value="{{ $edu->id }}">
        <div class="d-flex aling-items-center mb-4">
            <h2 class="fw-500 text_primary fs-5 align-self-center">Education</h2>
            <div class="ms-auto me-3">
                <button class="d-inline-block text_grey_999 bg-transparent border-0" role="button"
                    data-bs-toggle="tooltip" data-bs-placement="top" title="Edit" id="editExperience{{ $edu->id }}"
                    data-attr="{{ $edu->id }}" type="button" onclick="editExp({{ $edu->id }})"> <i
                        class="fa-solid fa-pencil "></i></button>
            </div>
            <a class="d-inline-block  text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                title="Delete" onclick="callModal({{ $edu->id }})"> <i class="fas fa-trash-alt"></i></a>
        </div>
        @csrf
        @method('post')
        <div class="row gy-4">
            <div class="col-md-6">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Education</label>
                <select disabled id="role" class="form-select fs-14  h-50px" name="education">
                    <option selected>Choose</option>
                    <option value="PHD" @if ($edu->education == 'PHD') selected @endif>PHD</option>
                    <option value="Masters" @if ($edu->education == 'Masters') selected @endif>Masters
                    </option>
                    <option value="Bachelors" @if ($edu->education == 'Bachelors') selected @endif>Bachelors
                    </option>
                    <option value="Undergrad" @if ($edu->education == 'Undergrad') selected @endif>Undergrad
                    </option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Course</label>
                <select disabled id="role" class="form-select fs-14  h-50px" name="course">
                    <option selected>Choose</option>
                    <option value="Computer Science" @if ($edu->course == 'Computer Science') selected @endif>
                        Computer
                        Science</option>
                    <option value="Biology" @if ($edu->course == 'Biology') selected @endif>Biology
                    </option>
                    <option value="Mathematics" @if ($edu->course == 'Mathematics') selected @endif>
                        Mathematics
                    </option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Institute</label>
                <input disabled type="text" class="form-control fs-14 h-50px" name="institute"
                    value="{{ $edu->institute }}" required>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Institute
                    Location</label>
                <input disabled type="text" class="form-control fs-14 h-50px" name="institute_loc"
                    value="{{ $edu->institute_loc }}" required>
            </div>
            <div class="col-md-6">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Passing
                    Year</label>
                <input disabled type="date" class="form-control fs-14 h-50px" name="passing_year"
                    value="{{ $edu->passing_year }}" required>
            </div>
            <div class="col-sm-2">
                <a href="{{ route('candidates.education.delete', $edu->id) }}"
                    onclick="return confirm('Are you sure you want to delete?');"> <i class="fa fa-times-circle-o"
                        style="font-size:48px; color:red"></i> </a>
            </div>
            <input type="hidden" name="source" value="api" />
            <div class="col-12 " id="updateButton" style="display:none;">
                <button type="submit" class="btn_viewall px-4 py-2 d-inline-block"> Update </button>
            </div>
        </div>
        </form>
    </div>
    @endforeach --}}
        </div>
    </div>

    <!-- Modal -->
    {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body py-md-4 py-3">
                    <p class="text-center fs-4" style="font-weight:600;">Are you really want to delete?</p>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    <a class="btn btn-danger" id="delete-edu" href="">Yes</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- <form id="msform" method="POST" action="{{ route('candidate.store') }}" name="change_logo"
enctype="multipart/form-data">
@csrf
<fieldset class="mb-5">
    <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
    <div class="row align-items-center row-cols-lg-2">
        <div class="col-lg-2">
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" onchange="form_submit()" name="avatar"
                        accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    @if ($user->avatar != null)
                    <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                    </div>
                    @else
                    <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col">
            <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload candidate avatar</h2>
            <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
        </div>
    </div>
    </div>
</fieldset>
</form>
<form id="msform" method="POST" action="{{ route('candidate.store') }}">
    @csrf
    <fieldset>
        <input type="hidden" class="form-control fs-14 h-50px" name="comp_id" value="$comp->id">
        <div class="row row-cols-1">
            <div class="col">
                <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">candidate Details</h2>
            </div>
            <div class="col">
                <label for="name" class="form-label fs-14 text-theme-primary fw-bold">recruiter Name</label>
                <input type="text" class="form-control fs-14 h-50px" name="name" value="{{ $user->recruiter->name }}"
                    required>
            </div>
            <div class="col">
                <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category</label>
                <select name="category[]" id="role" class="select2-multiple form-control fs-14  h-50px" required
                    multiple>
                    <option disabled>Choose</option>
                    @foreach ($cat as $ca)
                    <option value="{{ $ca->id }}" @if ($comp != null) @foreach ($comp->features as $row)
                        @if ($row->id == $ca->id)
                        Selected
                        @endif
                        @endforeach
                        @endif>{{ $ca->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                <input type="text" class="form-control fs-14 h-50px" name="description"
                    value="{{ $user->recruiter->description }}" required>
            </div>

            <div class="col">
                <div class="form-check py-2 ">
                    <input class="form-check-input rounded-0" name="terms" value="1" type="checkbox" id="gridCheck" @if ($user->recruiter->terms == 1) checked @endif>
                    <label class="form-check-label text-dark fs-14" for="gridCheck">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna
                    </label>
                    <p class="fs-14 text-grey">
                        Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt
                        ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata
                        sanctus est. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
                        tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et
                        accusam et justo duo
                        dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est.
                    </p>
                </div>
            </div>
            <div class="avatar-upload">
                <div class="avatar-edit">
                    <input type='file' id="imageUpload" onchange="form_submit()" name="logo"
                        accept=".png, .jpg, .jpeg" />
                    <label for="imageUpload"></label>
                </div>
                <div class="avatar-preview">
                    @if ($user->avatar != null)
                    <div id="imagePreview" style="background-image: url({{ asset('public/storage/'.$user->avatar) }});">
                    </div>
                    @else
                    <div id="imagePreview" style="background-image: url({{ asset('images/profile-img.svg') }});">
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col">
            <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Upload recruiter avatar</h2>
            <small class="fs-14">Supported file format png, jpg, jpeg, gif | upto 3 MB</small>
        </div>
        </div>
    </fieldset>
    <div class="row justify-content-center pt-5">
        <div class="col-lg-5 text-center">
            <button class="w-25 next action-button default-btn"> Save </button>
        </div>
    </div>
</form> --}}
    {{-- start edit education --}}
    <div class="modal fade" id="editEducation" tabindex="-1" aria-labelledby="editEducationLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    {{-- @foreach ($user->candidateEdu as $key => $edu) --}}
                    <div>
                        <form id="firstform" data-attr="" disabled
                            class="dashboard-form dashboard-form-2 dashboard-form-2" enctype="multipart/form-data">
                            <input type="hidden" name="edu_id" id="edu_id" value="">
                            <div class="border-bottom pb-3 d-flex justify-content-between align-items-center mb-3">
                                <h2 class="fw-500 text_primary fs-5 align-self-center">
                                    Education</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            @csrf
                            @method('post')
                            <div class="row gy-4">
                                <div class="col-md-6">
                                    <label for="name"
                                        class="form-label fs-14 text-theme-primary fw-bold">Education*</label>
                                    <select id="education_new_role" class="form-select fs-14  h-50px" name="education">
                                        <option selected value="">Select Education</option>
                                        <option value="PHD">
                                            PHD</option>
                                        <option value="Masters">
                                            Masters
                                        </option>
                                        <option value="Bachelors">
                                            Bachelors
                                        </option>
                                        <option value="Undergrad">
                                            Undergrad
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name"
                                        class="form-label fs-14 text-theme-primary fw-bold">Course*</label>
                                    <select id="Course_role" class="form-select fs-14  h-50px" name="course">
                                        <option selected value="">Select Course</option>
                                        <option value="Advanced Astrophysics">Advanced Astrophysics</option>
                                        <option value="Art History: Renaissance to Modern">Art History:
                                            Renaissance to Modern
                                        </option>
                                        <option value="Abnormal Psychology">Abnormal Psychology</option>
                                        <option value="Accounting Principles">Accounting Principles</option>
                                        <option value="African History and Culture">African History and Culture
                                        </option>
                                        <option value="Biochemistry">Biochemistry</option>
                                        <option value="Business Ethics">Business Ethics</option>
                                        <option value="British Literature">British Literature</option>
                                        <option value="Behavioral Economics">Behavioral Economics</option>
                                        <option value="Biomedical Engineering">Biomedical Engineering</option>
                                        <option value="Calculus II">Calculus II</option>
                                        <option value="Comparative Politics">Comparative Politics</option>
                                        <option value="Computer Science Fundamentals">Computer Science
                                            Fundamentals</option>
                                        <option value="Cultural Anthropology">Cultural Anthropology</option>
                                        <option value="Creative Writing">Creative Writing</option>
                                        <option value="Data Analysis and Visualization">Data Analysis and
                                            Visualization</option>
                                        <option value="Differential Equations">Differential Equations</option>
                                        <option value="Developmental Psychology">Developmental Psychology
                                        </option>
                                        <option value="Digital Marketing">Digital Marketing</option>
                                        <option value="Discrete Mathematics">Discrete Mathematics</option>
                                        <option value="Environmental Science">Environmental Science</option>
                                        <option value="European History">European History</option>
                                        <option value="Economics of Globalization">Economics of Globalization
                                        </option>
                                        <option value="Electrical Engineering">Electrical Engineering</option>
                                        <option value="Entrepreneurship">Entrepreneurship</option>
                                        <option value="French Language and Culture">French Language and Culture
                                        </option>
                                        <option value="Financial Management">Financial Management</option>
                                        <option value="Film Studies">Film Studies</option>
                                        <option value="Forensic Science">Forensic Science</option>
                                        <option value="Foundations of Education">Foundations of Education
                                        </option>
                                        <option value="Genetics">Genetics</option>
                                        <option value="Geology and Earth Sciences">Geology and Earth Sciences
                                        </option>
                                        <option value="Gender Studies">Gender Studies</option>
                                        <option value="Global Health">Global Health</option>
                                        <option value="Game Design">Game Design</option>
                                        <option value="Human Anatomy">Human Anatomy</option>
                                        <option value="History of Philosophy">History of Philosophy</option>
                                        <option value="Health Psychology">Health Psychology</option>
                                        <option value="Human Resource Management">Human Resource Management
                                        </option>
                                        <option value="Hispanic Literature">Hispanic Literature</option>
                                        <option value="International Relations">International Relations</option>
                                        <option value="Introduction to Artificial Intelligence">Introduction to
                                            Artificial
                                            Intelligence</option>
                                        <option value="Italian Renaissance Art">Italian Renaissance Art</option>
                                        <option value="Industrial Engineering">Industrial Engineering</option>
                                        <option value="Information Systems">Information Systems</option>
                                        <option value="Japanese Language and Culture">Japanese Language and
                                            Culture</option>
                                        <option value="Journalism Ethics">Journalism Ethics</option>
                                        <option value="Jazz History">Jazz History</option>
                                        <option value="Jurisprudence">Jurisprudence</option>
                                        <option value="Java Programming">Java Programming</option>
                                        <option value="Korean Language and Culture">Korean Language and Culture
                                        </option>
                                        <option value="Knowledge Management">Knowledge Management</option>
                                        <option value="Kinematics and Dynamics">Kinematics and Dynamics
                                        </option>
                                        <option value="Key Concepts in Sociology">Key Concepts in Sociology
                                        </option>
                                        <option value="Kinesiology">Kinesiology</option>
                                        <option value="Linear Algebra">Linear Algebra</option>
                                        <option value="Linguistics">Linguistics</option>
                                        <option value="Literary Theory">Literary Theory</option>
                                        <option value="Leadership and Organizational Behavior">Leadership and
                                            Organizational
                                            Behavior</option>
                                        <option value="Landscape Architecture">Landscape Architecture</option>
                                        <option value="Microbiology">Microbiology</option>
                                        <option value="Marketing Strategy">Marketing Strategy</option>
                                        <option value="Modern European Philosophy">Modern European Philosophy
                                        </option>
                                        <option value="Materials Science">Materials Science</option>
                                        <option value="Music Theory">Music Theory</option>
                                        <option value="Neurobiology">Neurobiology</option>
                                        <option value="Nuclear Physics">Nuclear Physics</option>
                                        <option value="Native American Studies">Native American Studies
                                        </option>
                                        <option value="Nonprofit Management">Nonprofit Management</option>
                                        <option value="Network Security">Network Security</option>
                                        <option value="Organic Chemistry">Organic Chemistry</option>
                                        <option value="Operations Management">Operations Management</option>
                                        <option value="Old English Literature">Old English Literature</option>
                                        <option value="Oceanography">Oceanography</option>
                                        <option value="Organizational Psychology">Organizational Psychology
                                        </option>
                                        <option value="Probability and Statistics">Probability and Statistics
                                        </option>
                                        <option value="Political Philosophy">Political Philosophy</option>
                                        <option value="Public Health Policy">Public Health Policy</option>
                                        <option value="Principles of Marketing">Principles of Marketing
                                        </option>
                                        <option value="Photography">Photography</option>
                                        <option value="Quantum Mechanics">Quantum Mechanics</option>
                                        <option value="Queer Studies">Queer Studies</option>
                                        <option value="Quality Control">Quality Control</option>
                                        <option value="Quantitative Finance">Quantitative Finance</option>
                                        <option value="Questioning in Philosophy">Questioning in Philosophy
                                        </option>
                                        <option value="Robotics and Automation">Robotics and Automation
                                        </option>
                                        <option value="Romantic Literature">Romantic Literature</option>
                                        <option value="Risk Management">Risk Management</option>
                                        <option value="Russian Language and Culture">Russian Language and
                                            Culture</option>
                                        <option value="Religious Studies">Religious Studies</option>
                                        <option value="Social Psychology">Social Psychology</option>
                                        <option value="Software Engineering">Software Engineering</option>
                                        <option value="Shakespearean Drama">Shakespearean Drama</option>
                                        <option value="Sustainable Architecture">Sustainable Architecture
                                        </option>
                                        <option value="Sports Management">Sports Management</option>
                                        <option value="Thermodynamics">Thermodynamics</option>
                                        <option value="Theatre Arts">Theatre Arts</option>
                                        <option value="Taxation">Taxation</option>
                                        <option value="Theoretical Physics">Theoretical Physics</option>
                                        <option value="Travel and Tourism Management">Travel and Tourism
                                            Management</option>
                                        <option value="Urban Planning">Urban Planning</option>
                                        <option value="United States Government">United States Government
                                        </option>
                                        <option value="User Experience Design">User Experience Design</option>
                                        <option value="Underwater Archaeology">Underwater Archaeology</option>
                                        <option value="Urban Economics">Urban Economics</option>
                                        <option value="Virology">Virology</option>
                                        <option value="Victorian Literature">Victorian Literature</option>
                                        <option value="Visual Arts">Visual Arts</option>
                                        <option value="Venture Capital">Venture Capital</option>
                                        <option value="Video Game Development">Video Game Development</option>
                                        <option value="World History">World History</option>
                                        <option value="Web Development">Web Development</option>
                                        <option value="Women's Studies">Women's Studies</option>
                                        <option value="Wildlife Conservation">Wildlife Conservation</option>
                                        <option value="Wireless Communication">Wireless Communication</option>
                                        <option value="Xenobiology (Note: X is a challenging letter for course titles.)">
                                            Xenobiology (Note: X is a challenging letter for course titles.)
                                        </option>
                                        <option value="Youth Development">Youth Development</option>
                                        <option value="Yoga and Wellness">Yoga and Wellness</option>
                                        <option value="Yiddish Literature (Note: Y is also challenging.)">
                                            Yiddish Literature
                                            (Note: Y is also challenging.)</option>
                                        <option value="Zoology">Zoology</option>
                                        <option value="Zen Buddhism">Zen Buddhism</option>
                                        <option value="Zero Gravity Physics (Note: Z is a rare letter.)">Zero
                                            Gravity Physics
                                            (Note: Z is a rare letter.)</option>
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name"
                                        class="form-label fs-14 text-theme-primary fw-bold">Institute*</label>
                                    <input type="text" class="form-control fs-14 h-50px" name="institute"
                                        value="" id="institute_role" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Institute
                                        Location*</label>
                                    <input type="text" class="form-control fs-14 h-50px institute_loc_role_edit" name="institute_loc"
                                        value="" id="institute_loc_role" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fs-14 text-theme-primary fw-bold">Passing
                                        Year*</label>
                                    <div class="position-relative">
                                        <input type="text"
                                            class="form-control modalDatePicker fs-14 h-50px border-bottom"
                                            name="passing_year" value="" id="passing_year_role1" required readonly
                                            style="border-color: #007ba7 !important; ">
                                        <label class="calender-icon d-block" for="passing_year_role1">
                                            <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="grade"
                                        class="form-label fs-14 text-theme-primary fw-bold">Grade</label>
                                    <select id="grade_role" class="form-select fs-14  h-50px" name="grade">
                                        <option selected value="">Select Grade</option>
                                        <option value="HD">HD (High Distinction)</option>
                                        <option value="D">D (Distinction)</option>
                                        <option value="C">C (Credit)</option>
                                        <option value="P">P (Pass)</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <label for="name"
                                        class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                    <textarea class="form-control fs-14 description_role-edit" maxlength="250" id="description_role" name="description"></textarea>
                                    <div class="text_primary characters" style="font-size: 12px;">
                                        <span id="description_roleChars"></span>
                                        Character(s) Remaining
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    {{-- <a href="{{ route('candidates.education.delete', $edu->id) }}" --}}
                                    <a href="" onclick="return confirm('Are you sure you want to delete?');">
                                        <i class="fa fa-times-circle-o" style="font-size:48px; color:red"></i> </a>
                                </div>
                                <input type="hidden" name="source" value="api" />
                                <div class="col-12 ">
                                    <button type="submit" class="btn_viewall px-4 py-2 d-inline-block">
                                        Update </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    {{-- @endforeach --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end edit education --}}

@endsection

@section('bottom_script')
    <script>
        function btn_edit(value) {
            console.log(value);
            var url = '{{ route('candidates.educationupdate', ':id') }}';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                    $("#editEducation input[name='edu_id']").val(data['id']);
                    $("#editEducation #education_new_role option[value='" + data['education'] + "']").attr(
                        'selected', 'selected');
                    $("#editEducation #Course_role option[value='" + data['course'] + "']").attr('selected',
                        'selected');
                    $("#editEducation input[name='institute']").val(data['institute']);
                    $("#editEducation input[name='institute_loc']").val(data['institute_loc']);
                    $("#editEducation input[name='passing_year']").datepicker('setDate', data['passing_year']);
                    if (data['grade'] == null) {
                        console.log('null');
                        $("#editEducation #grade_role").prop('selectedIndex',
                            0);
                    } else {
                        console.log('not null');
                        $("#editEducation #grade_role option[value='" + data['grade'] + "']").attr('selected',
                            'selected');
                    }
                    $("#editEducation #description_role").val(data['description']);
                    var textareaValLenEducation = $('.description_role-edit').val().length;
                    $('#description_roleChars').text(250 - textareaValLenEducation);
                    // $("#firstform")[0].reset();


                }
            }).done(function() {
                // add button change here
                // select the buttons I'd and manipulate e.g.
                // $('#buttonID').html('Approved');
            });

        }

        function callModal(id) {
            // console.log(id);
            var href = '{{ route('candidates.education.delete', ':id') }}';
            newhref = href.replace(':id', id);

            // newhref = href + '/' + id;
            // var myModal = new bootstrap.Modal(document.getElementById('staticBackdrop'), {
            //     keyboard: false
            // });
            // var myModal = $('#staticBackdrop').modal({
            //     keyboard: false
            // });
            // myModal.toggle();

            // $('#staticBackdrop').modal('show');
            $('#delete-edu').attr('href', newhref);
            // $("#staticBackdrop").modal();
            // console.log(newhref);

            Swal.fire({
                    title: 'Are you sure?',
                    text: "Do you really want to delete?",
                    // text: "Do you really want to delete?",
                    icon: 'error',
                    iconColor: '#64262f',
                    showCancelButton: true,
                    confirmButtonColor: '#007ba7',
                    cancelButtonColor: '#64262f',
                    customClass: "delete-sweet-alert",
                    confirmButtonText: "<a class='text-white' id='delete-edu' href='{{ route('candidates.education.delete', '') }}/" +
                        id +
                        "'>Yes</a>",
                    cancelButtonText: 'No',
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success',
                        )
                    }

                })
        }
        $(document).ready(function() {
            // $("#restaurantList .row .card .card-body .btn").attr("id");
            // $('#firstform').on('submit', function(e) {
            $('.dashboard-form').on('submit', function(e) {
                e.preventDefault();
                id = $(this).attr('data-attr');
                formid = $(this).attr('id');
                var userFormData = $(this).serialize();
                var education_id = $(this).find('#edu_id').val();

                // console.log(userFormData);

                userFormData['sourch'] = "api";
                // if(formid == "firstform-create")
                // {
                $.ajax({
                        url: "{{ route('candidates.education.update') }}",
                        type: "POST",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        if (formid != "firstform-create") {
                            // console.log($('#editEducation #institute_role').val());
                            $("#institute-" + education_id).html($('#editEducation #institute_role')
                                .val());
                            $("#education-" + education_id).html($('#editEducation #education_new_role')
                                .val() + "-" + $('#editEducation #Course_role').val());
                            $("#year-" + education_id).html("Passing year - " + data['eduYearEdut'] +
                                "");
                            // $("#year-" + education_id).html("Passing year - " + $(
                            //     '#editEducation #passing_year_role').val());
                            if ($('#editEducation #grade_role').val().length == 0) {
                                $("#grade-" + education_id).html('');
                            } else {
                                $("#grade-" + education_id).html("Grade: " + $(
                                        '#editEducation #grade_role')
                                    .val());
                            }
                            // console.log($('#editEducation #description_role').val().length);
                            if ($('#editEducation #description_role').val().length == 0) {
                                $("#description-" + education_id).html('');
                            } else {
                                $("#description-" + education_id).html($(
                                        '#editEducation #description_role')
                                    .val());
                            }
                            $("#location-" + education_id).html($('#editEducation #institute_loc_role')
                                .val());
                        } else {
                            var education_new_role = $("#edu_role").val();
                            var Course_role = $("#course_role").val();
                            var institute_role = $("#institute_role").val();
                            var institute_loc_role = $("#institute_loc_role").val();
                            var passing_year_role = $("#passing_year_role").val();
                            var grade_role = $("#grade_role").val();
                            var description_role = $("#description_role").val();
                            var html = "";
                            html += "<div class='border-bottom py-3' id='eduDiv-" + data[
                                'SendingEduId'] + "'>";
                            html += "<div class='d-flex'>";
                            html += "<div class='me-3 d-none d-md-block'>";
                            html +=
                                "<svg xmlns='http://www.w3.org/2000/svg' width='38.963' height='29.514'";
                            html += "viewBox='0 0 38.963 29.514'>";
                            html += "<path id='graduation'";
                            html +=
                                "d='M43.888,40.959a.6.6,0,0,0-.024-.119,2.847,2.847,0,0,0-1.022-1.833,2.826,2.826,0,0,0-1.161-4.92V25.166l1.746-.617a.653.653,0,0,0,0-1.23l-18.3-6.6a.653.653,0,0,0-.442,0l-18.43,6.6a.653.653,0,0,0,0,1.231l6.665,2.337.926,11.382C13.9,40.849,19.407,42.2,24.847,42.2s10.941-1.349,10.987-3.928l1.04-11.408,3.5-1.237v8.46a2.826,2.826,0,0,0-1.162,4.92,2.848,2.848,0,0,0-1.022,1.83.7.7,0,0,0-.024.122l-.4,4.019a.653.653,0,0,0,.65.718h5.225a.653.653,0,0,0,.65-.718ZM24.913,18.031l16.354,5.9L24.913,29.7,8.44,23.927ZM34.53,38.179c0,.02,0,.04,0,.059,0,1.082-3.771,2.655-9.681,2.655s-9.681-1.572-9.681-2.655c0-.018,0-.035,0-.053l-.88-10.826L24.7,31.012a.657.657,0,0,0,.434,0l10.387-3.669ZM39.5,36.837a1.524,1.524,0,1,1,1.524,1.524A1.526,1.526,0,0,1,39.5,36.837Zm-.367,7.553.319-3.187a.709.709,0,0,0,.022-.12,1.556,1.556,0,0,1,3.1,0,.621.621,0,0,0,.022.118l.319,3.189H39.137Z'";
                            html +=
                                "transform='translate(-5.581 -16.432)' fill='#92929d' stroke='#92929d'";
                            html += "stroke-width='0.5' />";
                            html += "</svg>";
                            html += "</div>";
                            html += "<div class='flex-grow-1'>";
                            html += "<div class='d-flex justify-content-between'>";
                            html += "<h3 class='fw-500 fs-5 mb-1' id='institute-" + data[
                                'SendingEduId'] + "'>" + institute_role + "</h3>";
                            html +=
                                "<a class='me-3 d-inline-block ms-auto text_grey_999' role='button'";
                            html += " onclick='btn_edit(" + data['SendingEduId'] +
                                ")' data-bs-toggle='tooltip'";
                            html += "data-bs-placement='top' title='Edit' href='javascript:;'>";
                            html +=
                                "<span role='button' data-bs-toggle='modal' data-bs-target='#editEducation'><i ";
                            html += "class='fa-solid fa-pencil '></i></span>";
                            html += "</a>";
                            html +=
                                "<a class='d-inline-block  text_grey_999' role='button' data-bs-toggle='tooltip'";
                            html += "data-bs-placement='top' title='Delete' onclick='callModal(" + data[
                                'SendingEduId'] + ")'>";
                            html += "<i class='fas fa-trash-alt'></i></a>";
                            html += "";
                            html += "</div>";
                            html += "<h4 class='fw-500' id='education-" + data['SendingEduId'] + "'>" +
                                education_new_role + " - " + Course_role + "</h4>";
                            html +=
                                "<div class='text_grey_999 fs-14 mt-3 d-flex align-items-center' style='gap: 0 8px;'>";
                            html += "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15'";
                            html += "viewBox='0 0 15 15'>";
                            html += "<path id='Shape'";
                            html +=
                                "d='M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z'";
                            html += "fill='#92929d' />";
                            html += "</svg>";
                            html += "<span id='year-" + data['SendingEduId'] + "'>Passing year - ";
                            html += passing_year_role.substr(-4) + "</span>";
                            html += "</div>";
                            html +=
                                "<div class='text_grey_999 fs-14 mt-1 d-flex align-items-center' style='gap: 0 8px;'>";
                            html +=
                                "<svg xmlns='http://www.w3.org/2000/svg' width='14.239' height='16.958'";
                            html += "viewBox='0 0 14.239 16.958'>";
                            html += "<g id='Icon_feather-map-pin' data-name='Icon feather-map-pin'";
                            html += "transform='translate(1 1)'>";
                            html += "<path id='Path_3207' data-name='Path 3207'";
                            html +=
                                "d='M16.739,7.619c0,4.759-6.119,8.839-6.119,8.839S4.5,12.379,4.5,7.619a6.119,6.119,0,1,1,12.239,0Z'";
                            html += "transform='translate(-4.5 -1.5)' fill='none' stroke='#92929d'";
                            html +=
                                "stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />";
                            html += "<path id='Path_3208' data-name='Path 3208'";
                            html += "d='M17.707,12.6a2.1,2.1,0,1,1-2.1-2.1,2.1,2.1,0,0,1,2.1,2.1Z'";
                            html += "transform='translate(-9.484 -6.468)' fill='none' stroke='#92929d'";
                            html +=
                                "stroke-linecap='round' stroke-linejoin='round' stroke-width='2' />";
                            html += "</g>";
                            html += "</svg>";
                            html += "<span id='location-" + data['SendingEduId'] + "'>" +
                                institute_loc_role + "</span>";
                            html += "</div>";
                            html += "<div class='mt-3 fw-500' id='grade-" + data['SendingEduId'] + "'>";
                            if (grade_role.length != 0) {
                                html += "Grade: " + grade_role + "";
                            }
                            html += "</div>";
                            html += "<p class='text_grey_999 fs-14 mt-3' id='description-" + data[
                                'SendingEduId'] + "'>";
                            html += description_role;
                            html += "</p>";
                            html += "</div>";
                            html += "</div>";
                            html += "</div>";
                            $('.dashboard_content').append(html);
                        }
                        // datepickerToday();
                        $(".dashboard-form-2-" + id + " .form-control").attr("disabled", true);
                        $("#firstform" + id + "").removeAttr("disabled", true);
                        $(".dashboard-form-2-" + id + " .form-select").attr("disabled", true);
                        $(".dashboard-form-2-" + id + " #updateButton").css('display', 'none');
                        // console.log(education_id);
                        successModal("Your Data Has Been Successfully Updated...");
                        $('#newExperience').modal('hide');
                        $('#editEducation').modal('hide');
                        $("#firstform")[0].reset();
                        $("#firstform-create")[0].reset();
                        datepickerToday();
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        // console.log('error', errors['errors'].)
                        errorModal(errors['message']);

                    });
                // }


            });

        });


        // start education edit count textarea word


        var maxLengthEducation = 250;
        $('.description_role-edit').keydown(function() {
            // console.log("check");
            var textlen = maxLengthEducation - $(this).val().length;
            $('#description_roleChars').text(textlen);

        });

        // end education edit count textarea word

        // start new education count textarea word
        var descriptionRoleNew = $('.description_role-new').val().length;
        $('#description_roleCharsNew').text(250 - descriptionRoleNew);
        var maxLength = 250;
        $('.description_role-new').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#description_roleCharsNew').text(textlen);
        });
        // end new education count textarea word
    </script>
@endsection
