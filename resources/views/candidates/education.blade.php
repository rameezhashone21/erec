@extends('layouts.app')
@section('content')
    <section class="pt-5">
        <div class="container">
            <div class="row justify-content-center align-items-center py-lg-5 py-3">
                {{-- @foreach ($passing_year as $key => $ed) --}}
                {{-- @endforeach --}}
                <form id="msform" method="POST" action="{{ route('store.candidateEducation') }}"
                    enctype="multipart/form-data">
                    <ul id="progressbar">
                        <li class="active"></li>
                        <li class="active"></li>
                        <li class="active"></li>
                        <li class="active"></li>
                    </ul>
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
                    @csrf
                    <fieldset class="mb-5 first-sec">
                        <div class="row row-cols-1">
                            <div class="col d-flex justify-content-between align-items-center">
                                <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Education
                                    Details
                                </h2>
                                <a href="javascript:void(0)" id="addbtn" role="button" class="duplicate"><img
                                        src="{{ asset('images/plus-circle.svg') }}" alt="plus-circle" class="img-fluid"></a>
                            </div>
                        </div>
                        <div class="row row-cols-1 duplicate_form mt-3 clone">
                            <div class="col-lg-12 text-end">
                                <a class="remove">-</a>
                            </div>
                            <div class="col">
                                <label for="education" class="form-label fs-14 text-theme-primary fw-bold">Degree
                                    Title*</label>
                                <select id="education" class="form-select fs-14  h-50px" name="education[]" required>
                                    <option selected disabled value="">Please Select Degree Title</option>
                                    <option value="PHD">PHD</option>
                                    <option value="Masters">Masters</option>
                                    <option value="Bachelors">Bachelors</option>
                                    <option value="Undergrad">Undergrad</option>
                                </select>
                            </div>
                            <div class="col">
                                <label for="course" class="form-label fs-14 text-theme-primary fw-bold">Field of
                                    Study*</label>
                                <select id="course" class="form-select fs-14  h-50px" name="course[]" required>
                                    <option selected disabled value="">Please Select Field of Study</option>
                                    <option value="Advanced Astrophysics">Advanced Astrophysics</option>
                                    <option value="Art History: Renaissance to Modern">Art History: Renaissance to Modern
                                    </option>
                                    <option value="Abnormal Psychology">Abnormal Psychology</option>
                                    <option value="Accounting Principles">Accounting Principles</option>
                                    <option value="African History and Culture">African History and Culture</option>
                                    <option value="Biochemistry">Biochemistry</option>
                                    <option value="Business Ethics">Business Ethics</option>
                                    <option value="British Literature">British Literature</option>
                                    <option value="Behavioral Economics">Behavioral Economics</option>
                                    <option value="Biomedical Engineering">Biomedical Engineering</option>
                                    <option value="Calculus II">Calculus II</option>
                                    <option value="Comparative Politics">Comparative Politics</option>
                                    <option value="Computer Science Fundamentals">Computer Science Fundamentals</option>
                                    <option value="Cultural Anthropology">Cultural Anthropology</option>
                                    <option value="Creative Writing">Creative Writing</option>
                                    <option value="Data Analysis and Visualization">Data Analysis and Visualization</option>
                                    <option value="Differential Equations">Differential Equations</option>
                                    <option value="Developmental Psychology">Developmental Psychology</option>
                                    <option value="Digital Marketing">Digital Marketing</option>
                                    <option value="Discrete Mathematics">Discrete Mathematics</option>
                                    <option value="Environmental Science">Environmental Science</option>
                                    <option value="European History">European History</option>
                                    <option value="Economics of Globalization">Economics of Globalization</option>
                                    <option value="Electrical Engineering">Electrical Engineering</option>
                                    <option value="Entrepreneurship">Entrepreneurship</option>
                                    <option value="French Language and Culture">French Language and Culture</option>
                                    <option value="Financial Management">Financial Management</option>
                                    <option value="Film Studies">Film Studies</option>
                                    <option value="Forensic Science">Forensic Science</option>
                                    <option value="Foundations of Education">Foundations of Education</option>
                                    <option value="Genetics">Genetics</option>
                                    <option value="Geology and Earth Sciences">Geology and Earth Sciences</option>
                                    <option value="Gender Studies">Gender Studies</option>
                                    <option value="Global Health">Global Health</option>
                                    <option value="Game Design">Game Design</option>
                                    <option value="Human Anatomy">Human Anatomy</option>
                                    <option value="History of Philosophy">History of Philosophy</option>
                                    <option value="Health Psychology">Health Psychology</option>
                                    <option value="Human Resource Management">Human Resource Management</option>
                                    <option value="Hispanic Literature">Hispanic Literature</option>
                                    <option value="International Relations">International Relations</option>
                                    <option value="Introduction to Artificial Intelligence">Introduction to Artificial
                                        Intelligence</option>
                                    <option value="Italian Renaissance Art">Italian Renaissance Art</option>
                                    <option value="Industrial Engineering">Industrial Engineering</option>
                                    <option value="Information Systems">Information Systems</option>
                                    <option value="Japanese Language and Culture">Japanese Language and Culture</option>
                                    <option value="Journalism Ethics">Journalism Ethics</option>
                                    <option value="Jazz History">Jazz History</option>
                                    <option value="Jurisprudence">Jurisprudence</option>
                                    <option value="Java Programming">Java Programming</option>
                                    <option value="Korean Language and Culture">Korean Language and Culture</option>
                                    <option value="Knowledge Management">Knowledge Management</option>
                                    <option value="Kinematics and Dynamics">Kinematics and Dynamics</option>
                                    <option value="Key Concepts in Sociology">Key Concepts in Sociology</option>
                                    <option value="Kinesiology">Kinesiology</option>
                                    <option value="Linear Algebra">Linear Algebra</option>
                                    <option value="Linguistics">Linguistics</option>
                                    <option value="Literary Theory">Literary Theory</option>
                                    <option value="Leadership and Organizational Behavior">Leadership and Organizational
                                        Behavior</option>
                                    <option value="Landscape Architecture">Landscape Architecture</option>
                                    <option value="Microbiology">Microbiology</option>
                                    <option value="Marketing Strategy">Marketing Strategy</option>
                                    <option value="Modern European Philosophy">Modern European Philosophy</option>
                                    <option value="Materials Science">Materials Science</option>
                                    <option value="Music Theory">Music Theory</option>
                                    <option value="Neurobiology">Neurobiology</option>
                                    <option value="Nuclear Physics">Nuclear Physics</option>
                                    <option value="Native American Studies">Native American Studies</option>
                                    <option value="Nonprofit Management">Nonprofit Management</option>
                                    <option value="Network Security">Network Security</option>
                                    <option value="Organic Chemistry">Organic Chemistry</option>
                                    <option value="Operations Management">Operations Management</option>
                                    <option value="Old English Literature">Old English Literature</option>
                                    <option value="Oceanography">Oceanography</option>
                                    <option value="Organizational Psychology">Organizational Psychology</option>
                                    <option value="Probability and Statistics">Probability and Statistics</option>
                                    <option value="Political Philosophy">Political Philosophy</option>
                                    <option value="Public Health Policy">Public Health Policy</option>
                                    <option value="Principles of Marketing">Principles of Marketing</option>
                                    <option value="Photography">Photography</option>
                                    <option value="Quantum Mechanics">Quantum Mechanics</option>
                                    <option value="Queer Studies">Queer Studies</option>
                                    <option value="Quality Control">Quality Control</option>
                                    <option value="Quantitative Finance">Quantitative Finance</option>
                                    <option value="Questioning in Philosophy">Questioning in Philosophy</option>
                                    <option value="Robotics and Automation">Robotics and Automation</option>
                                    <option value="Romantic Literature">Romantic Literature</option>
                                    <option value="Risk Management">Risk Management</option>
                                    <option value="Russian Language and Culture">Russian Language and Culture</option>
                                    <option value="Religious Studies">Religious Studies</option>
                                    <option value="Social Psychology">Social Psychology</option>
                                    <option value="Software Engineering">Software Engineering</option>
                                    <option value="Shakespearean Drama">Shakespearean Drama</option>
                                    <option value="Sustainable Architecture">Sustainable Architecture</option>
                                    <option value="Sports Management">Sports Management</option>
                                    <option value="Thermodynamics">Thermodynamics</option>
                                    <option value="Theatre Arts">Theatre Arts</option>
                                    <option value="Taxation">Taxation</option>
                                    <option value="Theoretical Physics">Theoretical Physics</option>
                                    <option value="Travel and Tourism Management">Travel and Tourism Management</option>
                                    <option value="Urban Planning">Urban Planning</option>
                                    <option value="United States Government">United States Government</option>
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
                                        Xenobiology (Note: X is a challenging letter for course titles.)</option>
                                    <option value="Youth Development">Youth Development</option>
                                    <option value="Yoga and Wellness">Yoga and Wellness</option>
                                    <option value="Yiddish Literature (Note: Y is also challenging.)">Yiddish Literature
                                        (Note: Y is also challenging.)</option>
                                    <option value="Zoology">Zoology</option>
                                    <option value="Zen Buddhism">Zen Buddhism</option>
                                    <option value="Zero Gravity Physics (Note: Z is a rare letter.)">Zero Gravity Physics
                                        (Note: Z is a rare letter.)</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="institute" class="form-label fs-14 text-theme-primary fw-bold">University /
                                    Institute*</label>
                                <input type="text" class="form-control fs-14 h-50px" id="institute"
                                    name="institute[]" required>
                            </div>

                            <div class="col">
                                <label for="institute_loc" class="form-label fs-14 text-theme-primary fw-bold">Institute
                                    Location*</label>
                                <input type="text" class="form-control fs-14 h-50px searchInput" id="institute_loc"
                                    name="institute_loc[]" required>
                            </div>
                            <div class="col">
                                <label for="grade" class="form-label fs-14 text-theme-primary fw-bold">Grade*</label>
                                <select id="grade" class="form-select fs-14  h-50px" name="grade[]" required>
                                    <option disabled selected value="">Please Select Grade</option>
                                    <option value="HD">High Distinction (HD)</option>
                                    <option value="D"> Distinction (D)</option>
                                    <option value="C">Credit (C)</option>
                                    <option value="P">Pass (P)</option>
                                </select>
                            </div>

                            <div class="col">
                                <label for="passingYear" class="form-label fs-14 text-theme-primary fw-bold">Passing
                                    Year*</label>
                                <div class="position-relative">
                                    <input placeholder="dd-mm-yyyy" type="text" name="passing_year[]"
                                        id="passingYear" class="form-control datepicker fs-14 h-50px w-100"
                                        autocomplete="off" required="" readonly>
                                    <label class="calender-icon d-block" for="passingYear">
                                        <i class="far fa-calendar-alt"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col">
                                {{-- <label for="description"
                                    class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                <textarea class="form-control fs-14 textarea_register_process" name="description[]" required></textarea> --}}


                                <label for="descriptionRegisterPro"
                                    class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                <textarea maxlength="250" class="form-control fs-14 textarea_register_process" id="descriptionRegisterPro"
                                    name="description[]"></textarea>
                                <div class="text_primary characters" style="font-size: 12px;">
                                    <span id="descriptionRegisterProChars"></span>
                                    Character(s) Remaining
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row justify-content-center">
                        <div class="col-lg-5 text-center">
                            <button class="next action-button default-btn">Create</button>
                            <br />
                            <br />
                            <a href="{{ route('candidates.details.profile') }}" class="fs-6 fw-normal">
                                << Go Back</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <script>

        function submitForm() {
            //    var elem = document.getElementsByClassName("personalDetail");
            //    elem.forEach(element => {
            //        element.submit();
            //    });
        }
    </script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var numb = 1;
            do {
                ClassicEditor
                    .create(document.querySelector('#body' + numb), {
                        removePlugins: ['insertImage', 'insertMedia', 'Link', 'blockQuote'],
                        toolbar: ['Heading', 'bold', 'italic', 'bulletedList', 'numberedList', ]
                    })
                    .catch(error => {
                        console.error(error);
                    })
                numb++;
            }
            while (numb < 6);
        });

        function form_submit() {
            const collection = document.getElementsByName("change_avatar");
            for (let i = 0; i < collection.length; i++) {
                collection[i].submit();
            }
        }
    </script> --}}

    <script>
        // start descriptionRegister count textarea word
        var descriptionRegisterPro = $('#descriptionRegisterPro').val().length;
        $('#descriptionRegisterProChars').text(250 - descriptionRegisterPro);
        var maxLength = 250;
        $('#descriptionRegisterPro').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#descriptionRegisterProChars').text(textlen);
        });
        // end descriptionRegister count textarea word

        $("#msform").on('submit', function(e) {
            if ($("#education").val() == "") {
                e.preventDefault();
                errorModal("Please enter education");
            } else if ($("#course").val() == "") {
                e.preventDefault();
                errorModal("Please enter course");
            } else if ($("#institute").val() == "") {
                e.preventDefault();
                errorModal("Please enter institute");
            } else if ($("#institute_loc").val() == "") {
                e.preventDefault();
                errorModal("Please enter institute location");
            } else if ($("#grade").val() == "") {
                e.preventDefault();
                errorModal("Please enter grade");
            } else if ($("#passingYear").val() == "") {
                e.preventDefault();
                errorModal("Please enter passing year");
            } else {
                $("#msform").submit();
            }
        });

    </script>
@endsection
