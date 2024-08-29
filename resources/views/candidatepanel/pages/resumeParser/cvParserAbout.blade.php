@extends('candidatepanel.layout.app')
@section('page_title', 'E-Rec')

@section('content')

    <div class="col-12">
        <div class="row">
            <div class="col-lg-7">
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                    </button>
                    <ul class="d-flex cv-perse-navigation">
                        <li>
                            <a href="{{ route('candidates.cvParser.contact') }}">Contact</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.skills') }}">Skills</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.about') }}" class="active">About</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.experience') }}">Experience</a>
                        </li>
                        <li>
                            <a href="{{ route('candidates.cvParser.education') }}">Education</a>
                        </li>

                        <li>
                            <a href="{{ route('candidates.cvParser.others') }}">Others</a>
                        </li>
                    </ul>
                    <div class="my-4">
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">About</h2>
                        <h3 class="fs-3 fw-600 mb-2">Write down your professional summary</h3>
                        <p class="color-grey-787878">Include up to 3 sentences that describe your general experience</p>
                    </div>
                    <form method="POST" class="cv_parse_form" action="{{ route('candidates.cvParser.update.data') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="about" value="1" />
                        <input type="hidden" name="contact_id" value="{{ $contact->contact->id }}" />
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                {{-- <label for="dateOfBirth" class="cv-parse-lable mb-2">Date Of Birth</label>
                                <input type="text" id="dateOfBirth" class="form-control cv-parse-input datepicker"> --}}



                                <label class="cv-parse-lable mb-2">Date Of Birth</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control cv-parse-input datepicker"
                                        value="{{ $contact->contact->dob }}" id="dateOfBirth" required readonly
                                        name="dob">
                                    <label class="calender-icon d-block" for="dateOfBirth">
                                        <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label for="maritalStatus" class="cv-parse-lable mb-2">Marital Status</label>
                                <select type="text" id="maritalStatus" class="form-select cv-parse-input"
                                    name="marital_status">
                                    <option value="" selected disabled></option>
                                    <option @if ($contact->contact->marital_status == 'single') selected @endif value="single">Single</option>
                                    <option @if ($contact->contact->marital_status == 'married' || $contact->contact->marital_status == 'Married') selected @endif value="married">Married
                                    </option>
                                    <option @if ($contact->contact->marital_status == 'widow') selected @endif value="widow">Widow</option>
                                    <option @if ($contact->contact->marital_status == 'divorced') selected @endif value="divorced">Divorced
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="visaStatus" class="cv-parse-lable mb-2">Visa Status</label>
                                <select type="text" id="visaStatus" class="form-select cv-parse-input"
                                    name="visa_status">
                                    <option value="" selected disabled></option>
                                    <option value="Citizen" @if ($contact->contact->marital_status == 'Citizen') selected @endif>Citizen
                                    </option>
                                    <option value="Permanent Resident" @if ($contact->contact->marital_status == 'Permanent Resident') selected @endif>
                                        Permanent Resident</option>
                                    <option value="Visit Visa" @if ($contact->contact->marital_status == 'Visit Visa') selected @endif>Visit Visa
                                    </option>
                                    <option value="Student Visa" @if ($contact->contact->marital_status == 'Student Visa') selected @endif>Student
                                        Visa</option>
                                    <option value="Business Visa" @if ($contact->contact->marital_status == 'Business Visa') selected @endif>Business
                                        Visa</option>
                                    <option value="Employee Visa" @if ($contact->contact->marital_status == 'Employee Visa') selected @endif>Employee
                                        Visa</option>
                                    <option value="Spousal Visa" @if ($contact->contact->marital_status == 'Spousal Visa') selected @endif>Spousal
                                        Visa</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="nationality" class="cv-parse-lable mb-2">Nationality</label>
                                <select id="nationality" class="form-select cv-parse-input" name="nationality">
                                    <option value="" selected disabled></option>
                                    <option @if ($contact->contact->nationality == 'Afghanistan') selected @endif value="Afghanistan">
                                        Afghanistan </option>
                                    <option @if ($contact->contact->nationality == 'Albania') selected @endif value="Albania"> Albania
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Algeria') selected @endif value="Algeria"> Algeria
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Andorra') selected @endif value="Andorra"> Andorra
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Angola') selected @endif value="Angola"> Angola
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Antigua and Barbuda') selected @endif value="Antigua and Barbuda">
                                        Antigua and Barbuda </option>
                                    <option @if ($contact->contact->nationality == 'Argentina') selected @endif value="Argentina"> Argentina
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Armenia') selected @endif value="Armenia"> Armenia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Australia') selected @endif value="Australia">
                                        Australia </option>
                                    <option @if ($contact->contact->nationality == 'Austria') selected @endif value="Austria"> Austria
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Azerbaijan') selected @endif value="Azerbaijan">
                                        Azerbaijan </option>
                                    <option @if ($contact->contact->nationality == 'Bahamas') selected @endif value="Bahamas"> Bahamas
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bahrain') selected @endif value="Bahrain"> Bahrain
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bangladesh') selected @endif value="Bangladesh">
                                        Bangladesh </option>
                                    <option @if ($contact->contact->nationality == 'Barbados') selected @endif value="Barbados"> Barbados
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Belarus') selected @endif value="Belarus"> Belarus
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Belgium') selected @endif value="Belgium"> Belgium
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Belize') selected @endif value="Belize"> Belize
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Benin') selected @endif value="Benin"> Benin
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bhutan') selected @endif value="Bhutan"> Bhutan
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bolivia') selected @endif value="Bolivia"> Bolivia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bosnia and Herzegovina') selected @endif
                                        value="Bosnia and Herzegovina"> Bosnia and Herzegovina
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Botswana') selected @endif value="Botswana"> Botswana
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Brazil') selected @endif value="Brazil"> Brazil
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Brunei') selected @endif value="Brunei"> Brunei
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Bulgaria') selected @endif value="Bulgaria"> Bulgaria
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Burkina') selected @endif value="Burkina Faso">
                                        Burkina Faso </option>
                                    <option @if ($contact->contact->nationality == 'Burundi') selected @endif value="Burundi"> Burundi
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Cabo') selected @endif value="Cabo Verde"> Cabo
                                        Verde </option>
                                    <option @if ($contact->contact->nationality == 'Cambodia') selected @endif value="Cambodia"> Cambodia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Cameroon') selected @endif value="Cameroon"> Cameroon
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Canada') selected @endif value="Canada"> Canada
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Central') selected @endif
                                        value="Central African Republic"> Central African Republic
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Chad') selected @endif value="Chad"> Chad
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Chile') selected @endif value="Chile"> Chile
                                    </option>
                                    <option @if ($contact->contact->nationality == 'China') selected @endif value="China"> China
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Colombia') selected @endif value="Colombia"> Colombia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Comoros') selected @endif value="Comoros"> Comoros
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Congo (Congo-Brazzaville)') selected @endif
                                        value="Congo (Congo-Brazzaville)"> Congo (Congo-Brazzaville)
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Costa') selected @endif value="Costa Rica"> Costa
                                        Rica </option>
                                    <option @if ($contact->contact->nationality == 'Croatia') selected @endif value="Croatia"> Croatia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Cuba') selected @endif value="Cuba"> Cuba
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Cyprus') selected @endif value="Cyprus"> Cyprus
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Czechia (Czech Republic)') selected @endif
                                        value="Czechia (Czech Republic)"> Czechia (Czech Republic)
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Democratic Republic of the Congo (Congo-Kinshasa)') selected @endif
                                        value="Democratic Republic of the Congo (Congo-Kinshasa)"> Democratic Republic
                                        of the
                                        Congo (Congo-Kinshasa) </option>
                                    <option @if ($contact->contact->nationality == 'Denmark') selected @endif value="Denmark"> Denmark
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Djibouti') selected @endif value="Djibouti"> Djibouti
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Dominica') selected @endif value="Dominica"> Dominica
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Dominican Republic') selected @endif value="Dominican Republic">
                                        Dominican Republic </option>
                                    <option @if ($contact->contact->nationality == 'East Timor (Timor-Leste)') selected @endif
                                        value="East Timor (Timor-Leste)"> East Timor (Timor-Leste)
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ecuador') selected @endif value="Ecuador"> Ecuador
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Egypt') selected @endif value="Egypt"> Egypt
                                    </option>
                                    <option @if ($contact->contact->nationality == 'El Salvador') selected @endif value="El Salvador"> El
                                        Salvador </option>
                                    <option @if ($contact->contact->nationality == 'Equatorial Guinea') selected @endif value="Equatorial Guinea">
                                        Equatorial Guinea </option>
                                    <option @if ($contact->contact->nationality == 'Eritrea') selected @endif value="Eritrea"> Eritrea
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Estonia') selected @endif value="Estonia"> Estonia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Eswatini (formerly Swaziland)') selected @endif
                                        value="Eswatini (formerly Swaziland)"> Eswatini (formerly Swaziland)
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ethiopia') selected @endif value="Ethiopia"> Ethiopia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Fiji') selected @endif value="Fiji"> Fiji
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Finland') selected @endif value="Finland"> Finland
                                    </option>
                                    <option @if ($contact->contact->nationality == 'France') selected @endif value="France"> France
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Gabon') selected @endif value="Gabon"> Gabon
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Gambia') selected @endif value="Gambia"> Gambia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Georgia') selected @endif value="Georgia"> Georgia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Germany') selected @endif value="Germany"> Germany
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ghana') selected @endif value="Ghana"> Ghana
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Greece') selected @endif value="Greece"> Greece
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Grenada') selected @endif value="Grenada"> Grenada
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Guatemala') selected @endif value="Guatemala">
                                        Guatemala </option>
                                    <option @if ($contact->contact->nationality == 'Guinea') selected @endif value="Guinea"> Guinea
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Guinea-Bissau') selected @endif value="Guinea-Bissau">
                                        Guinea-Bissau </option>
                                    <option @if ($contact->contact->nationality == 'Guyana') selected @endif value="Guyana"> Guyana
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Haiti') selected @endif value="Haiti"> Haiti
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Honduras') selected @endif value="Honduras"> Honduras
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Hungary') selected @endif value="Hungary"> Hungary
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Iceland') selected @endif value="Iceland"> Iceland
                                    </option>
                                    <option @if ($contact->contact->nationality == 'India') selected @endif value="India"> India
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Indonesia') selected @endif value="Indonesia">
                                        Indonesia </option>
                                    <option @if ($contact->contact->nationality == 'Iran') selected @endif value="Iran"> Iran
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Iraq') selected @endif value="Iraq"> Iraq
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ireland') selected @endif value="Ireland"> Ireland
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Israel') selected @endif value="Israel"> Israel
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Italy') selected @endif value="Italy"> Italy
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ivory Coast (Côte dIvoire)') selected @endif
                                        value="Ivory Coast (Côte dIvoire)"> Ivory Coast (Côte dIvoire)
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Jamaica') selected @endif value="Jamaica"> Jamaica
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Japan') selected @endif value="Japan"> Japan
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Jordan') selected @endif value="Jordan"> Jordan
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Kazakhstan') selected @endif value="Kazakhstan">
                                        Kazakhstan </option>
                                    <option @if ($contact->contact->nationality == 'Kenya') selected @endif value="Kenya"> Kenya
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Kiribati') selected @endif value="Kiribati">
                                        Kiribati
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Kosovo') selected @endif value="Kosovo"> Kosovo
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Kuwait') selected @endif value="Kuwait"> Kuwait
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Kyrgyzstan') selected @endif value="Kyrgyzstan">
                                        Kyrgyzstan </option>
                                    <option @if ($contact->contact->nationality == 'Laos') selected @endif value="Laos"> Laos
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Latvia') selected @endif value="Latvia"> Latvia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Lebanon') selected @endif value="Lebanon"> Lebanon
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Lesotho') selected @endif value="Lesotho"> Lesotho
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Liberia') selected @endif value="Liberia"> Liberia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Libya') selected @endif value="Libya"> Libya
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Liechtenstein') selected @endif value="Liechtenstein">
                                        Liechtenstein </option>
                                    <option @if ($contact->contact->nationality == 'Lithuania') selected @endif value="Lithuania">
                                        Lithuania </option>
                                    <option @if ($contact->contact->nationality == 'Luxembourg') selected @endif value="Luxembourg">
                                        Luxembourg </option>
                                    <option @if ($contact->contact->nationality == 'Madagascar') selected @endif value="Madagascar">
                                        Madagascar </option>
                                    <option @if ($contact->contact->nationality == 'Malawi') selected @endif value="Malawi"> Malawi
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Malaysia') selected @endif value="Malaysia">
                                        Malaysia </option>
                                    <option @if ($contact->contact->nationality == 'Maldives') selected @endif value="Maldives">
                                        Maldives </option>
                                    <option @if ($contact->contact->nationality == 'Mali') selected @endif value="Mali"> Mali
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Malta') selected @endif value="Malta"> Malta
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Marshall Islands') selected @endif value="Marshall Islands">
                                        Marshall Islands </option>
                                    <option @if ($contact->contact->nationality == 'Mauritania') selected @endif value="Mauritania">
                                        Mauritania </option>
                                    <option @if ($contact->contact->nationality == 'Mauritius') selected @endif value="Mauritius">
                                        Mauritius </option>
                                    <option @if ($contact->contact->nationality == 'Mexico') selected @endif value="Mexico"> Mexico
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Micronesia') selected @endif value="Micronesia">
                                        Micronesia </option>
                                    <option @if ($contact->contact->nationality == 'Moldova') selected @endif value="Moldova"> Moldova
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Monaco') selected @endif value="Monaco"> Monaco
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Mongolia') selected @endif value="Mongolia">
                                        Mongolia </option>
                                    <option @if ($contact->contact->nationality == 'Montenegro') selected @endif value="Montenegro">
                                        Montenegro </option>
                                    <option @if ($contact->contact->nationality == 'Morocco') selected @endif value="Morocco"> Morocco
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Mozambique') selected @endif value="Mozambique">
                                        Mozambique </option>
                                    <option @if ($contact->contact->nationality == 'Myanmar (Burma)') selected @endif value="Myanmar (Burma)">
                                        Myanmar (Burma) </option>
                                    <option @if ($contact->contact->nationality == 'Namibia') selected @endif value="Namibia"> Namibia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Nauru') selected @endif value="Nauru"> Nauru
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Nepal') selected @endif value="Nepal"> Nepal
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Netherlands') selected @endif value="Netherlands">
                                        Netherlands </option>
                                    <option @if ($contact->contact->nationality == 'New') selected @endif value="New Zealand"> New
                                        Zealand </option>
                                    <option @if ($contact->contact->nationality == 'Nicaragua') selected @endif value="Nicaragua">
                                        Nicaragua </option>
                                    <option @if ($contact->contact->nationality == 'Niger') selected @endif value="Niger"> Niger
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Nigeria') selected @endif value="Nigeria"> Nigeria
                                    </option>
                                    <option @if ($contact->contact->nationality == 'North Macedonia (formerly Macedonia)') selected @endif
                                        value="North Macedonia (formerly Macedonia)"> North Macedonia (formerly
                                        Macedonia) </option>
                                    <option @if ($contact->contact->nationality == 'Norway') selected @endif value="Norway"> Norway
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Oman') selected @endif value="Oman"> Oman
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Pakistan') selected @endif value="Pakistan">
                                        Pakistan </option>
                                    <option @if ($contact->contact->nationality == 'Palau') selected @endif value="Palau"> Palau
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Palestine State') selected @endif value="Palestine State">
                                        Palestine State </option>
                                    <option @if ($contact->contact->nationality == 'Panama') selected @endif value="Panama"> Panama
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Papua New Guinea') selected @endif value="Papua New Guinea">
                                        Papua New Guinea </option>
                                    <option @if ($contact->contact->nationality == 'Paraguay') selected @endif value="Paraguay">
                                        Paraguay </option>
                                    <option @if ($contact->contact->nationality == 'Peru') selected @endif value="Peru"> Peru
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Philippines') selected @endif value="Philippines">
                                        Philippines </option>
                                    <option @if ($contact->contact->nationality == 'Poland') selected @endif value="Poland"> Poland
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Portugal') selected @endif value="Portugal">
                                        Portugal </option>
                                    <option @if ($contact->contact->nationality == 'Qatar') selected @endif value="Qatar"> Qatar
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Romania') selected @endif value="Romania"> Romania
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Russia') selected @endif value="Russia"> Russia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Rwanda') selected @endif value="Rwanda"> Rwanda
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Saint Kitts and Nevis') selected @endif
                                        value="Saint Kitts and Nevis"> Saint Kitts and Nevis
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Saint Lucia') selected @endif value="Saint Lucia">
                                        Saint Lucia </option>
                                    <option @if ($contact->contact->nationality == 'Saint Vincent and the Grenadines') selected @endif
                                        value="Saint Vincent and the Grenadines"> Saint Vincent and the
                                        Grenadines </option>
                                    <option @if ($contact->contact->nationality == 'Samoa') selected @endif value="Samoa"> Samoa
                                    </option>
                                    <option @if ($contact->contact->nationality == 'San Marino') selected @endif value="San Marino"> San
                                        Marino </option>
                                    <option @if ($contact->contact->nationality == 'Sao Tome and Principe') selected @endif
                                        value="Sao Tome and Principe"> Sao Tome and Principe
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Saudi Arabia') selected @endif value="Saudi Arabia">
                                        Saudi Arabia </option>
                                    <option @if ($contact->contact->nationality == 'Senegal') selected @endif value="Senegal"> Senegal
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Serbia') selected @endif value="Serbia"> Serbia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Seychelles') selected @endif value="Seychelles">
                                        Seychelles </option>
                                    <option @if ($contact->contact->nationality == 'Sierra Leone') selected @endif value="Sierra Leone">
                                        Sierra Leone </option>
                                    <option @if ($contact->contact->nationality == 'Singapore') selected @endif value="Singapore">
                                        Singapore </option>
                                    <option @if ($contact->contact->nationality == 'Slovakia') selected @endif value="Slovakia">
                                        Slovakia </option>
                                    <option @if ($contact->contact->nationality == 'Slovenia') selected @endif value="Slovenia">
                                        Slovenia </option>
                                    <option @if ($contact->contact->nationality == 'Solomon Islands') selected @endif value="Solomon Islands">
                                        Solomon Islands </option>
                                    <option @if ($contact->contact->nationality == 'Somalia') selected @endif value="Somalia"> Somalia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'South Africa') selected @endif value="South Africa">
                                        South Africa </option>
                                    <option @if ($contact->contact->nationality == 'South Korea') selected @endif value="South Korea">
                                        South Korea </option>
                                    <option @if ($contact->contact->nationality == 'South Sudan') selected @endif value="South Sudan">
                                        South Sudan </option>
                                    <option @if ($contact->contact->nationality == 'Spain') selected @endif value="Spain"> Spain
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Sri Lanka') selected @endif value="Sri Lanka"> Sri
                                        Lanka </option>
                                    <option @if ($contact->contact->nationality == 'Sudan') selected @endif value="Sudan"> Sudan
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Suriname') selected @endif value="Suriname">
                                        Suriname </option>
                                    <option @if ($contact->contact->nationality == 'Sweden') selected @endif value="Sweden"> Sweden
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Switzerland') selected @endif value="Switzerland">
                                        Switzerland </option>
                                    <option @if ($contact->contact->nationality == 'Syria') selected @endif value="Syria"> Syria
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Taiwan') selected @endif value="Taiwan"> Taiwan
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Tajikistan') selected @endif value="Tajikistan">
                                        Tajikistan </option>
                                    <option @if ($contact->contact->nationality == 'Tanzania') selected @endif value="Tanzania">
                                        Tanzania </option>
                                    <option @if ($contact->contact->nationality == 'Thailand') selected @endif value="Thailand">
                                        Thailand </option>
                                    <option @if ($contact->contact->nationality == 'Togo') selected @endif value="Togo"> Togo
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Tonga') selected @endif value="Tonga"> Tonga
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Trinidad and Tobago') selected @endif
                                        value="Trinidad and Tobago"> Trinidad and Tobago </option>
                                    <option @if ($contact->contact->nationality == 'Tunisia') selected @endif value="Tunisia"> Tunisia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Turkey') selected @endif value="Turkey"> Turkey
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Turkmenistan') selected @endif value="Turkmenistan">
                                        Turkmenistan </option>
                                    <option @if ($contact->contact->nationality == 'Tuvalu') selected @endif value="Tuvalu"> Tuvalu
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Uganda') selected @endif value="Uganda"> Uganda
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Ukraine') selected @endif value="Ukraine"> Ukraine
                                    </option>
                                    <option @if ($contact->contact->nationality == 'United Arab Emirates') selected @endif
                                        value="United Arab Emirates"> United Arab Emirates
                                    </option>
                                    <option @if ($contact->contact->nationality == 'United Kingdom') selected @endif value="United Kingdom">
                                        United Kingdom </option>
                                    <option @if ($contact->contact->nationality == 'United States of America') selected @endif
                                        value="United States of America"> United States of America
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Uruguay') selected @endif value="Uruguay"> Uruguay
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Uzbekistan') selected @endif value="Uzbekistan">
                                        Uzbekistan </option>
                                    <option @if ($contact->contact->nationality == 'Vanuatu') selected @endif value="Vanuatu"> Vanuatu
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Vatican City') selected @endif value="Vatican City">
                                        Vatican City </option>
                                    <option @if ($contact->contact->nationality == 'Venezuela') selected @endif value="Venezuela">
                                        Venezuela </option>
                                    <option @if ($contact->contact->nationality == 'Vietnam') selected @endif value="Vietnam"> Vietnam
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Yemen') selected @endif value="Yemen"> Yemen
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Zambia') selected @endif value="Zambia"> Zambia
                                    </option>
                                    <option @if ($contact->contact->nationality == 'Zimbabwe') selected @endif value="Zimbabwe">
                                        Zimbabwe </option>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="description" class="cv-parse-lable mb-2">Description</label>
                                <textarea class="form-control" id="description" name="about" style="height: 200px;">{{ $contact->contact->about }}</textarea>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="{{ route('candidates.cvParser.skills') }}"
                                        class="cv-parse-form-button back-button">Back</a>
                                </div>
                                <div>
                                    <button class="cv-parse-form-button">Next To Experience</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="sticky__div">
                    <div class="cv-view position-relative">
                        <img src="{{ asset('/images/cv-view-vector.png') }}" alt=""
                            class="cv-view-bg-voctor img-fluid">
                        <div class="cv-view-header">
                            <img src="{{ asset('/images/cv-head.png') }}" alt="Erec logo" class="img-fluid">
                        </div>
                        <div class="cv-view-body position-relative">
                            @if ($contact->contact->cv_profile != null)
                                <img src="{{ asset('storage/' . $contact->contact->cv_profile) }}" alt="profile2"
                                    class="cv-view-profile-image">
                            @else
                                <img src="{{ asset('/images/image_preview_noimage.png') }}" alt="profile2"
                                    class="cv-view-profile-image">
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="cv-profile-name">{{ $contact->contact->name }}
                                        {{ $contact->contact->father_name }}
                                    </h3>
                                    <h4 class="cv-profile-title"> {{ $contact->contact->title }}</h4>
                                </div>
                                <div class="d-flex flex-column gap-2 col-lg-6">
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11" height="13.746"
                                                viewBox="0 0 11 13.746">
                                                <path id="Path_5639" data-name="Path 5639"
                                                    d="M45,16a5.006,5.006,0,0,0-5,5c0,4.278,4.545,7.51,4.739,7.645a.455.455,0,0,0,.522,0C45.455,28.51,50,25.278,50,21A5.006,5.006,0,0,0,45,16Zm0,3.182A1.818,1.818,0,1,1,43.182,21,1.818,1.818,0,0,1,45,19.182Z"
                                                    transform="translate(-39.5 -15.5)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $contact->contact->location }}
                                        </span>
                                    </p>
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="11.004" height="11.004"
                                                viewBox="0 0 11.004 11.004">
                                                <path id="Path_5640" data-name="Path 5640"
                                                    d="M41.994,31.555A2.813,2.813,0,0,1,39.2,34,7.208,7.208,0,0,1,32,26.8a2.813,2.813,0,0,1,2.446-2.794.8.8,0,0,1,.831.476l1.056,2.358v.006a.8.8,0,0,1-.063.755c-.009.014-.019.026-.028.038L35.2,28.874A4.611,4.611,0,0,0,37.141,30.8l1.217-1.036a.406.406,0,0,1,.038-.028.8.8,0,0,1,.759-.07l.007,0,2.356,1.056A.8.8,0,0,1,41.994,31.555Z"
                                                    transform="translate(-31.5 -23.498)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $contact->contact->phone }}
                                        </span>
                                    </p>
                                    <p class="cv-text-primary d-flex align-items-center gap-2">
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13.061" height="9.1"
                                                viewBox="0 0 13.061 9.1">
                                                <path id="Path_5641" data-name="Path 5641"
                                                    d="M12.5,14.7V9.3s-5.46,3.81-5.991,4.008C5.987,13.119.5,9.3.5,9.3v5.4c0,.75.159.9.9.9H11.6c.759,0,.9-.132.9-.9m-.009-6.459c0-.546-.159-.741-.891-.741H1.4c-.753,0-.9.234-.9.78l.009.084s5.421,3.732,6,3.936c.612-.237,5.991-4.02,5.991-4.02Z"
                                                    transform="translate(0 -7)" fill="none" stroke="#787878"
                                                    stroke-width="1" />
                                            </svg>
                                        </span>
                                        <span>
                                            {{ $contact->contact->email }}
                                        </span>
                                    </p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4" id="skillsItemsUl">
                                @foreach ($contact->skills as $row)
                                    <li>
                                        {{ $row->skill }}
                                    </li>
                                @endforeach
                            </ul>
                            <hr>
                            <div style="margin-bottom: 14px;">
                                <div id="descriptionWrapper">
                                    <h3 class="cv-profile-name" style="margin-bottom: 8px;">About</h3>
                                    <p class="cv-text-primary" id="descriptionView">
                                        {{ $contact->contact->about }}
                                    </p>
                                </div>
                                <div class="row gy-3 pt-3 mb-4">
                                    <div class="col-lg-6" id="dateOfBirthWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Date Of Birth
                                        </h4>
                                        <p class="cv-text-primary" id="dateOfBirthView">{{ $contact->contact->dob }}</p>
                                    </div>
                                    <div class="col-lg-6" id="maritalStatusWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Marital Status
                                        </h4>
                                        <p class="cv-text-primary" id="maritalStatusView">
                                            {{ $contact->contact->marital_status }}</p>
                                    </div>
                                    <div class="col-lg-6" id="visaStatusWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Visa Status
                                        </h4>
                                        <p class="cv-text-primary" id="visaStatusView">
                                            {{ $contact->contact->visa_status }}
                                        </p>
                                    </div>
                                    <div class="col-lg-6" id="nationalityWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Nationality
                                        </h4>
                                        <p class="cv-text-primary" id="nationalityView">
                                            {{ $contact->contact->nationality }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('bottom_script')
    <script>
        $(function() {

            if ($("#dateOfBirthView").text().trim() === '') {
                $("#dateOfBirthWrapper").hide()
            }

            $('#dateOfBirth').on('changeDate', function() {
                let inputValue = $(this).val();
                $('#dateOfBirthView').text(inputValue);
                if (!inputValue) {
                    $("#dateOfBirthWrapper").hide()
                } else {
                    $("#dateOfBirthWrapper").show()
                }
            });


            $('#dateOfBirth').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy',
            });

            // $('#dateOfBirth').on('changeDate', function(e) {
            //     // Get the selected date
            //     let selectedDate = e.format();
            //     // Update the text of the <p> tag
            //     $('#dateOfBirthView').text(selectedDate);
            // });



            // $('#dateOfBirth').on('changeDate', function() {
            //     let inputValue = $(this).val();
            //     $('#dateOfBirthView').text(inputValue);
            //     if (!inputValue) {
            //         $("#dateOfBirthWrapper").hide()
            //     } else {
            //         $("#dateOfBirthWrapper").show()
            //     }
            // });

            if ($("#maritalStatusView").text().trim() === '') {
                $("#maritalStatusWrapper").hide()
            }

            $('#maritalStatus').change(function() {
                let inputValue = $(this).val();
                $('#maritalStatusView').text(inputValue);
                if (!inputValue) {
                    $("#maritalStatusWrapper").hide()
                } else {
                    $("#maritalStatusWrapper").show()
                }
            });


            if ($("#visaStatusView").text().trim() === '') {
                $("#visaStatusWrapper").hide()
            }

            $('#visaStatus').change(function() {
                let inputValue = $(this).val();
                $('#visaStatusView').text(inputValue);
                if (!inputValue) {
                    $("#visaStatusWrapper").hide()
                } else {
                    $("#visaStatusWrapper").show()
                }
            });

            // $('#visaStatus').change(function() {
            //     // Get the selected value
            //     let selectedValue = $(this).val();
            //     // Update the text of the <p> tag
            //     $('#visaStatusView').text(selectedValue);
            // });

            if ($("#nationalityView").text().trim() === '') {
                $("#nationalityWrapper").hide()
            }

            $('#nationality').change(function() {
                let inputValue = $(this).val();
                $('#nationalityView').text(inputValue);
                if (!inputValue) {
                    $("#nationalityWrapper").hide()
                } else {
                    $("#nationalityWrapper").show()
                }
            });

            // $('#nationality').change(function() {
            //     // Get the selected value
            //     let selectedValue = $(this).val();
            //     // Update the text of the <p> tag
            //     $('#nationalityView').text(selectedValue);
            // });

            if ($('#descriptionView').text().trim() === '') {
                $('#descriptionWrapper').hide();
            }

            $('#description').on('input', function() {
                let inputValue = $(this).val().trim();
                $('#descriptionView').text(inputValue);
                if (!inputValue) {
                    $('#descriptionWrapper').hide();
                } else {
                    $('#descriptionWrapper').show();
                }
            });

        });
    </script>
@endsection
