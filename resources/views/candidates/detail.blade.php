@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5">CANDIDATE DETAILS </h1>
                        {{-- @include('layouts.includes.messages') --}}
                        <form id="msform" method="POST" action="{{ route('store.candidate') }}">
                            @csrf
                            <!-- progressbar -->
                            <input type="hidden" name="stepOne" value="0">
                            <ul id="progressbar">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
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
                            <!-- fieldsets -->
                            <fieldset>
                                <div class="row gy-3 gy-md-0">
                                    <div class="col-12">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Personal Details
                                        </h2>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="first_name" class="form-label fs-14 text-theme-primary fw-bold">First
                                            Name *</label>
                                        <input type="text" class="form-control fs-14 h-50px" name="first_name"
                                            value="{{ $first_name }}" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label fs-14 text-theme-primary fw-bold">Last
                                            Name *</label>
                                        <input type="text" class="form-control fs-14 h-50px" name="last_name"
                                            value="{{ $last_name }}" required @if ($last_name != null)  @endif>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Gender
                                            *</label>
                                        <br>
                                        <input type="radio" class="btn-check" name="gender" id="male" value="male"
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-primary fs-14" for="male">Male</label>
                                        {{-- @if ($gender == 'male') selected @endif>Male</label> --}}

                                        <input type="radio" class="btn-check" name="gender" id="female" value="female"
                                            autocomplete="off" {{ $gender == 'Female' ? 'checked' : '' }}>
                                        <label class="btn btn-outline-primary fs-14" for="female">Female</label>
                                        {{-- @if ($gender == 'female') selected @endif>Female</label> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""
                                            class="form-label fs-14 text-theme-primary fw-bold">Nationality *</label>
                                        <select name="nationality" id="role" class="form-select fs-14  h-50px"
                                            required>
                                            <option disabled selected>Please Select Nationality</option>
                                            <option value="Afghanistan" @if (old('nationality', $nationality) == 'Afghanistan') selected @endif>
                                                Afghanistan </option>
                                            <option value="Albania" @if (old('nationality', $nationality) == 'Albania') selected @endif>
                                                Albania </option>
                                            <option value="Algeria" @if (old('nationality', $nationality) == 'Algeria') selected @endif>
                                                Algeria </option>
                                            <option value="Andorra" @if (old('nationality', $nationality) == 'Andorra') selected @endif>
                                                Andorra </option>
                                            <option value="Angola" @if (old('nationality', $nationality) == 'Angola') selected @endif> Angola
                                            </option>
                                            <option value="Antigua and Barbuda"
                                                @if (old('nationality', $nationality) == 'Antigua and Barbuda') selected @endif> Antigua and Barbuda
                                            </option>
                                            <option value="Argentina" @if (old('nationality', $nationality) == 'Argentina') selected @endif>
                                                Argentina </option>
                                            <option value="Armenia" @if (old('nationality', $nationality) == 'Armenia') selected @endif>
                                                Armenia </option>
                                            <option value="Australia" @if (old('nationality', $nationality) == 'Australia') selected @endif>
                                                Australia </option>
                                            <option value="Austria" @if (old('nationality', $nationality) == 'Austria') selected @endif>
                                                Austria </option>
                                            <option value="Azerbaijan" @if (old('nationality', $nationality) == 'Azerbaijan') selected @endif>
                                                Azerbaijan </option>
                                            <option value="Bahamas" @if (old('nationality', $nationality) == 'Bahamas') selected @endif>
                                                Bahamas </option>
                                            <option value="Bahrain" @if (old('nationality', $nationality) == 'Bahrain') selected @endif>
                                                Bahrain </option>
                                            <option value="Bangladesh" @if (old('nationality', $nationality) == 'Bangladesh') selected @endif>
                                                Bangladesh </option>
                                            <option value="Barbados" @if (old('nationality', $nationality) == 'Barbados') selected @endif>
                                                Barbados </option>
                                            <option value="Belarus" @if (old('nationality', $nationality) == 'Belarus') selected @endif>
                                                Belarus </option>
                                            <option value="Belgium" @if (old('nationality', $nationality) == 'Belgium') selected @endif>
                                                Belgium </option>
                                            <option value="Belize" @if (old('nationality', $nationality) == 'Belize') selected @endif>
                                                Belize </option>
                                            <option value="Benin" @if (old('nationality', $nationality) == 'Benin') selected @endif>
                                                Benin </option>
                                            <option value="Bhutan" @if (old('nationality', $nationality) == 'Bhutan') selected @endif>
                                                Bhutan </option>
                                            <option value="Bolivia" @if (old('nationality', $nationality) == 'Bolivia') selected @endif>
                                                Bolivia </option>
                                            <option value="Bosnia and Herzegovina"
                                                @if (old('nationality', $nationality) == 'Bosnia and Herzegovina') selected @endif> Bosnia and Herzegovina
                                            </option>
                                            <option value="Botswana" @if (old('nationality', $nationality) == 'Botswana') selected @endif>
                                                Botswana </option>
                                            <option value="Brazil" @if (old('nationality', $nationality) == 'Brazil') selected @endif>
                                                Brazil </option>
                                            <option value="Brunei" @if (old('nationality', $nationality) == 'Brunei') selected @endif>
                                                Brunei </option>
                                            <option value="Bulgaria" @if (old('nationality', $nationality) == 'Bulgaria') selected @endif>
                                                Bulgaria </option>
                                            <option value="Burkina Faso"
                                                @if (old('nationality', $nationality) == 'Burkina Faso') selected @endif> Burkina Faso </option>
                                            <option value="Burundi" @if (old('nationality', $nationality) == 'Burundi') selected @endif>
                                                Burundi </option>
                                            <option value="Cabo Verde" @if (old('nationality', $nationality) == 'Cabo Verde') selected @endif>
                                                Cabo Verde </option>
                                            <option value="Cambodia" @if (old('nationality', $nationality) == 'Cambodia') selected @endif>
                                                Cambodia </option>
                                            <option value="Cameroon" @if (old('nationality', $nationality) == 'Cameroon') selected @endif>
                                                Cameroon </option>
                                            <option value="Canada" @if (old('nationality', $nationality) == 'Canada') selected @endif>
                                                Canada </option>
                                            <option value="Central African Republic"
                                                @if (old('nationality', $nationality) == 'Central African Republic') selected @endif> Central African
                                                Republic </option>
                                            <option value="Chad" @if (old('nationality', $nationality) == 'Chad') selected @endif> Chad
                                            </option>
                                            <option value="Chile" @if (old('nationality', $nationality) == 'Chile') selected @endif>
                                                Chile </option>
                                            <option value="China" @if (old('nationality', $nationality) == 'China') selected @endif>
                                                China </option>
                                            <option value="Colombia" @if (old('nationality', $nationality) == 'Colombia') selected @endif>
                                                Colombia </option>
                                            <option value="Comoros" @if (old('nationality', $nationality) == 'Comoros') selected @endif>
                                                Comoros </option>
                                            <option value="Congo (Congo-Brazzaville)"
                                                @if (old('nationality', $nationality) == 'Congo (Congo-Brazzaville)') selected @endif> Congo
                                                (Congo-Brazzaville) </option>
                                            <option value="Costa Rica" @if (old('nationality', $nationality) == 'Costa Rica') selected @endif>
                                                Costa Rica </option>
                                            <option value="Croatia" @if (old('nationality', $nationality) == 'Croatia') selected @endif>
                                                Croatia </option>
                                            <option value="Cuba" @if (old('nationality', $nationality) == 'Cuba') selected @endif> Cuba
                                            </option>
                                            <option value="Cyprus" @if (old('nationality', $nationality) == 'Cyprus') selected @endif>
                                                Cyprus </option>
                                            <option value="Czechia (Czech Republic)"
                                                @if (old('nationality', $nationality) == 'Czechia (Czech Republic)') selected @endif> Czechia (Czech
                                                Republic) </option>
                                            <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                @if (old('nationality', $nationality) == 'Democratic Republic of the Congo (Congo-Kinshasa)') selected @endif> Democratic Republic of
                                                the Congo (Congo-Kinshasa) </option>
                                            <option value="Denmark" @if (old('nationality', $nationality) == 'Denmark') selected @endif>
                                                Denmark </option>
                                            <option value="Djibouti" @if (old('nationality', $nationality) == 'Djibouti') selected @endif>
                                                Djibouti </option>
                                            <option value="Dominica" @if (old('nationality', $nationality) == 'Dominica') selected @endif>
                                                Dominica </option>
                                            <option value="Dominican Republic"
                                                @if (old('nationality', $nationality) == 'Dominican Republic') selected @endif> Dominican Republic
                                            </option>
                                            <option value="East Timor (Timor-Leste)"
                                                @if (old('nationality', $nationality) == 'East Timor (Timor-Leste)') selected @endif> East Timor
                                                (Timor-Leste) </option>
                                            <option value="Ecuador" @if (old('nationality', $nationality) == 'Ecuador') selected @endif>
                                                Ecuador </option>
                                            <option value="Egypt" @if (old('nationality', $nationality) == 'Egypt') selected @endif>
                                                Egypt </option>
                                            <option value="El Salvador"
                                                @if (old('nationality', $nationality) == 'El Salvador') selected @endif> El Salvador </option>
                                            <option value="Equatorial Guinea"
                                                @if (old('nationality', $nationality) == 'Equatorial Guinea') selected @endif> Equatorial Guinea
                                            </option>
                                            <option value="Eritrea" @if (old('nationality', $nationality) == 'Eritrea') selected @endif>
                                                Eritrea </option>
                                            <option value="Estonia" @if (old('nationality', $nationality) == 'Estonia') selected @endif>
                                                Estonia </option>
                                            <option value="Eswatini (formerly Swaziland)"
                                                @if (old('nationality', $nationality) == 'Eswatini (formerly Swaziland)') selected @endif> Eswatini (formerly
                                                Swaziland) </option>
                                            <option value="Ethiopia" @if (old('nationality', $nationality) == 'Ethiopia') selected @endif>
                                                Ethiopia </option>
                                            <option value="Fiji" @if (old('nationality', $nationality) == 'Fiji') selected @endif>
                                                Fiji </option>
                                            <option value="Finland" @if (old('nationality', $nationality) == 'Finland') selected @endif>
                                                Finland </option>
                                            <option value="France" @if (old('nationality', $nationality) == 'France') selected @endif>
                                                France </option>
                                            <option value="Gabon" @if (old('nationality', $nationality) == 'Gabon') selected @endif>
                                                Gabon </option>
                                            <option value="Gambia" @if (old('nationality', $nationality) == 'Gambia') selected @endif>
                                                Gambia </option>
                                            <option value="Georgia" @if (old('nationality', $nationality) == 'Georgia') selected @endif>
                                                Georgia </option>
                                            <option value="Germany" @if (old('nationality', $nationality) == 'Germany') selected @endif>
                                                Germany </option>
                                            <option value="Ghana" @if (old('nationality', $nationality) == 'Ghana') selected @endif>
                                                Ghana </option>
                                            <option value="Greece" @if (old('nationality', $nationality) == 'Greece') selected @endif>
                                                Greece </option>
                                            <option value="Grenada" @if (old('nationality', $nationality) == 'Grenada') selected @endif>
                                                Grenada </option>
                                            <option value="Guatemala" @if (old('nationality', $nationality) == 'Guatemala') selected @endif>
                                                Guatemala </option>
                                            <option value="Guinea" @if (old('nationality', $nationality) == 'Guinea') selected @endif>
                                                Guinea </option>
                                            <option value="Guinea-Bissau"
                                                @if (old('nationality', $nationality) == 'Guinea-Bissau') selected @endif> Guinea-Bissau </option>
                                            <option value="Guyana" @if (old('nationality', $nationality) == 'Guyana') selected @endif>
                                                Guyana </option>
                                            <option value="Haiti" @if (old('nationality', $nationality) == 'Haiti') selected @endif>
                                                Haiti </option>
                                            <option value="Honduras" @if (old('nationality', $nationality) == 'Honduras') selected @endif>
                                                Honduras </option>
                                            <option value="Hungary" @if (old('nationality', $nationality) == 'Hungary') selected @endif>
                                                Hungary </option>
                                            <option value="Iceland" @if (old('nationality', $nationality) == 'Iceland') selected @endif>
                                                Iceland </option>
                                            <option value="India" @if (old('nationality', $nationality) == 'India') selected @endif>
                                                India </option>
                                            <option value="Indonesia" @if (old('nationality', $nationality) == 'Indonesia') selected @endif>
                                                Indonesia </option>
                                            <option value="Iran" @if (old('nationality', $nationality) == 'Iran') selected @endif>
                                                Iran </option>
                                            <option value="Iraq" @if (old('nationality', $nationality) == 'Iraq') selected @endif>
                                                Iraq </option>
                                            <option value="Ireland" @if (old('nationality', $nationality) == 'Ireland') selected @endif>
                                                Ireland </option>
                                            <option value="Israel" @if (old('nationality', $nationality) == 'Israel') selected @endif>
                                                Israel </option>
                                            <option value="Italy" @if (old('nationality', $nationality) == 'Italy') selected @endif>
                                                Italy </option>
                                            <option value="Ivory Coast (Côte d'Ivoire)"
                                                @if (old('nationality', $nationality) == "Ivory Coast (Côte d'Ivoire)") selected @endif> Ivory Coast (Côte
                                                d'Ivoire) </option>
                                            <option value="Jamaica" @if (old('nationality', $nationality) == 'Jamaica') selected @endif>
                                                Jamaica </option>
                                            <option value="Japan" @if (old('nationality', $nationality) == 'Japan') selected @endif>
                                                Japan </option>
                                            <option value="Jordan" @if (old('nationality', $nationality) == 'Jordan') selected @endif>
                                                Jordan </option>
                                            <option value="Kazakhstan" @if (old('nationality', $nationality) == 'Kazakhstan') selected @endif>
                                                Kazakhstan </option>
                                            <option value="Kenya" @if (old('nationality', $nationality) == 'Kenya') selected @endif>
                                                Kenya </option>
                                            <option value="Kiribati" @if (old('nationality', $nationality) == 'Kiribati') selected @endif>
                                                Kiribati </option>
                                            <option value="Kosovo" @if (old('nationality', $nationality) == 'Kosovo') selected @endif>
                                                Kosovo </option>
                                            <option value="Kuwait" @if (old('nationality', $nationality) == 'Kuwait') selected @endif>
                                                Kuwait </option>
                                            <option value="Kyrgyzstan" @if (old('nationality', $nationality) == 'Kyrgyzstan') selected @endif>
                                                Kyrgyzstan </option>
                                            <option value="Laos" @if (old('nationality', $nationality) == 'Laos') selected @endif>
                                                Laos </option>
                                            <option value="Latvia" @if (old('nationality', $nationality) == 'Latvia') selected @endif>
                                                Latvia </option>
                                            <option value="Lebanon" @if (old('nationality', $nationality) == 'Lebanon') selected @endif>
                                                Lebanon </option>
                                            <option value="Lesotho" @if (old('nationality', $nationality) == 'Lesotho') selected @endif>
                                                Lesotho </option>
                                            <option value="Liberia" @if (old('nationality', $nationality) == 'Liberia') selected @endif>
                                                Liberia </option>
                                            <option value="Libya" @if (old('nationality', $nationality) == 'Libya') selected @endif>
                                                Libya </option>
                                            <option value="Liechtenstein"
                                                @if (old('nationality', $nationality) == 'Liechtenstein') selected @endif> Liechtenstein
                                            </option>
                                            <option value="Lithuania"
                                                @if (old('nationality', $nationality) == 'Lithuania') selected @endif> Lithuania </option>
                                            <option value="Luxembourg"
                                                @if (old('nationality', $nationality) == 'Luxembourg') selected @endif> Luxembourg </option>
                                            <option value="Madagascar"
                                                @if (old('nationality', $nationality) == 'Madagascar') selected @endif> Madagascar </option>
                                            <option value="Malawi" @if (old('nationality', $nationality) == 'Malawi') selected @endif>
                                                Malawi </option>
                                            <option value="Malaysia" @if (old('nationality', $nationality) == 'Malaysia') selected @endif>
                                                Malaysia </option>
                                            <option value="Maldives" @if (old('nationality', $nationality) == 'Maldives') selected @endif>
                                                Maldives </option>
                                            <option value="Mali" @if (old('nationality', $nationality) == 'Mali') selected @endif>
                                                Mali </option>
                                            <option value="Malta" @if (old('nationality', $nationality) == 'Malta') selected @endif>
                                                Malta </option>
                                            <option value="Marshall Islands"
                                                @if (old('nationality', $nationality) == 'Marshall Islands') selected @endif> Marshall Islands
                                            </option>
                                            <option value="Mauritania"
                                                @if (old('nationality', $nationality) == 'Mauritania') selected @endif> Mauritania </option>
                                            <option value="Mauritius"
                                                @if (old('nationality', $nationality) == 'Mauritius') selected @endif> Mauritius </option>
                                            <option value="Mexico" @if (old('nationality', $nationality) == 'Mexico') selected @endif>
                                                Mexico </option>
                                            <option value="Micronesia"
                                                @if (old('nationality', $nationality) == 'Micronesia') selected @endif> Micronesia </option>
                                            <option value="Moldova" @if (old('nationality', $nationality) == 'Moldova') selected @endif>
                                                Moldova </option>
                                            <option value="Monaco" @if (old('nationality', $nationality) == 'Monaco') selected @endif>
                                                Monaco </option>
                                            <option value="Mongolia" @if (old('nationality', $nationality) == 'Mongolia') selected @endif>
                                                Mongolia </option>
                                            <option value="Montenegro"
                                                @if (old('nationality', $nationality) == 'Montenegro') selected @endif> Montenegro </option>
                                            <option value="Morocco" @if (old('nationality', $nationality) == 'Morocco') selected @endif>
                                                Morocco </option>
                                            <option value="Mozambique"
                                                @if (old('nationality', $nationality) == 'Mozambique') selected @endif> Mozambique </option>
                                            <option value="Myanmar (Burma)"
                                                @if (old('nationality', $nationality) == 'Myanmar (Burma)') selected @endif> Myanmar (Burma)
                                            </option>
                                            <option value="Namibia" @if (old('nationality', $nationality) == 'Namibia') selected @endif>
                                                Namibia </option>
                                            <option value="Nauru" @if (old('nationality', $nationality) == 'Nauru') selected @endif>
                                                Nauru </option>
                                            <option value="Nepal" @if (old('nationality', $nationality) == 'Nepal') selected @endif>
                                                Nepal </option>
                                            <option value="Netherlands"
                                                @if (old('nationality', $nationality) == 'Netherlands') selected @endif> Netherlands </option>
                                            <option value="New Zealand"
                                                @if (old('nationality', $nationality) == 'New Zealand') selected @endif> New Zealand </option>
                                            <option value="Nicaragua"
                                                @if (old('nationality', $nationality) == 'Nicaragua') selected @endif> Nicaragua </option>
                                            <option value="Niger" @if (old('nationality', $nationality) == 'Niger') selected @endif>
                                                Niger </option>
                                            <option value="Nigeria" @if (old('nationality', $nationality) == 'Nigeria') selected @endif>
                                                Nigeria </option>
                                            <option value="North Macedonia (formerly Macedonia)"
                                                @if (old('nationality', $nationality) == 'North Macedonia (formerly Macedonia)') selected @endif> North Macedonia
                                                (formerly Macedonia) </option>
                                            <option value="Norway" @if (old('nationality', $nationality) == 'Norway') selected @endif>
                                                Norway </option>
                                            <option value="Oman" @if (old('nationality', $nationality) == 'Oman') selected @endif>
                                                Oman </option>
                                            <option value="Pakistan" @if (old('nationality', $nationality) == 'Pakistan') selected @endif>
                                                Pakistan </option>
                                            <option value="Palau" @if (old('nationality', $nationality) == 'Palau') selected @endif>
                                                Palau </option>
                                            <option value="Palestine State"
                                                @if (old('nationality', $nationality) == 'Palestine State') selected @endif> Palestine State
                                            </option>
                                            <option value="Panama" @if (old('nationality', $nationality) == 'Panama') selected @endif>
                                                Panama </option>
                                            <option value="Papua New Guinea"
                                                @if (old('nationality', $nationality) == 'Papua New Guinea') selected @endif> Papua New Guinea
                                            </option>
                                            <option value="Paraguay" @if (old('nationality', $nationality) == 'Paraguay') selected @endif>
                                                Paraguay </option>
                                            <option value="Peru" @if (old('nationality', $nationality) == 'Peru') selected @endif>
                                                Peru </option>
                                            <option value="Philippines"
                                                @if (old('nationality', $nationality) == 'Philippines') selected @endif> Philippines </option>
                                            <option value="Poland" @if (old('nationality', $nationality) == 'Poland') selected @endif>
                                                Poland </option>
                                            <option value="Portugal" @if (old('nationality', $nationality) == 'Portugal') selected @endif>
                                                Portugal </option>
                                            <option value="Qatar" @if (old('nationality', $nationality) == 'Qatar') selected @endif>
                                                Qatar </option>
                                            <option value="Romania" @if (old('nationality', $nationality) == 'Romania') selected @endif>
                                                Romania </option>
                                            <option value="Russia" @if (old('nationality', $nationality) == 'Russia') selected @endif>
                                                Russia </option>
                                            <option value="Rwanda" @if (old('nationality', $nationality) == 'Rwanda') selected @endif>
                                                Rwanda </option>
                                            <option value="Saint Kitts and Nevis"
                                                @if (old('nationality', $nationality) == 'Saint Kitts and Nevis') selected @endif> Saint Kitts and Nevis
                                            </option>
                                            <option value="Saint Lucia"
                                                @if (old('nationality', $nationality) == 'Saint Lucia') selected @endif> Saint Lucia </option>
                                            <option value="Saint Vincent and the Grenadines"
                                                @if (old('nationality', $nationality) == 'Saint Vincent and the Grenadines') selected @endif> Saint Vincent and the
                                                Grenadines </option>
                                            <option value="Samoa" @if (old('nationality', $nationality) == 'Samoa') selected @endif>
                                                Samoa </option>
                                            <option value="San Marino"
                                                @if (old('nationality', $nationality) == 'San Marino') selected @endif> San Marino </option>
                                            <option value="Sao Tome and Principe"
                                                @if (old('nationality', $nationality) == 'Sao Tome and Principe') selected @endif> Sao Tome and Principe
                                            </option>
                                            <option value="Saudi Arabia"
                                                @if (old('nationality', $nationality) == 'Saudi Arabia') selected @endif> Saudi Arabia
                                            </option>
                                            <option value="Senegal" @if (old('nationality', $nationality) == 'Senegal') selected @endif>
                                                Senegal </option>
                                            <option value="Serbia" @if (old('nationality', $nationality) == 'Serbia') selected @endif>
                                                Serbia </option>
                                            <option value="Seychelles"
                                                @if (old('nationality', $nationality) == 'Seychelles') selected @endif> Seychelles </option>
                                            <option value="Sierra Leone"
                                                @if (old('nationality', $nationality) == 'Sierra Leone') selected @endif> Sierra Leone
                                            </option>
                                            <option value="Singapore"
                                                @if (old('nationality', $nationality) == 'Singapore') selected @endif> Singapore </option>
                                            <option value="Slovakia" @if (old('nationality', $nationality) == 'Slovakia') selected @endif>
                                                Slovakia </option>
                                            <option value="Slovenia" @if (old('nationality', $nationality) == 'Slovenia') selected @endif>
                                                Slovenia </option>
                                            <option value="Solomon Islands"
                                                @if (old('nationality', $nationality) == 'Solomon Islands') selected @endif> Solomon Islands
                                            </option>
                                            <option value="Somalia" @if (old('nationality', $nationality) == 'Somalia') selected @endif>
                                                Somalia </option>
                                            <option value="South Africa"
                                                @if (old('nationality', $nationality) == 'South Africa') selected @endif> South Africa
                                            </option>
                                            <option value="South Korea"
                                                @if (old('nationality', $nationality) == 'South Korea') selected @endif> South Korea </option>
                                            <option value="South Sudan"
                                                @if (old('nationality', $nationality) == 'South Sudan') selected @endif> South Sudan </option>
                                            <option value="Spain" @if (old('nationality', $nationality) == 'Spain') selected @endif>
                                                Spain </option>
                                            <option value="Sri Lanka"
                                                @if (old('nationality', $nationality) == 'Sri Lanka') selected @endif> Sri Lanka </option>
                                            <option value="Sudan" @if (old('nationality', $nationality) == 'Sudan') selected @endif>
                                                Sudan </option>
                                            <option value="Suriname" @if (old('nationality', $nationality) == 'Suriname') selected @endif>
                                                Suriname </option>
                                            <option value="Sweden" @if (old('nationality', $nationality) == 'Sweden') selected @endif>
                                                Sweden </option>
                                            <option value="Switzerland"
                                                @if (old('nationality', $nationality) == 'Switzerland') selected @endif> Switzerland </option>
                                            <option value="Syria" @if (old('nationality', $nationality) == 'Syria') selected @endif>
                                                Syria </option>
                                            <option value="Taiwan" @if (old('nationality', $nationality) == 'Taiwan') selected @endif>
                                                Taiwan </option>
                                            <option value="Tajikistan"
                                                @if (old('nationality', $nationality) == 'Tajikistan') selected @endif> Tajikistan </option>
                                            <option value="Tanzania" @if (old('nationality', $nationality) == 'Tanzania') selected @endif>
                                                Tanzania </option>
                                            <option value="Thailand" @if (old('nationality', $nationality) == 'Thailand') selected @endif>
                                                Thailand </option>
                                            <option value="Togo" @if (old('nationality', $nationality) == 'Togo') selected @endif>
                                                Togo </option>
                                            <option value="Tonga" @if (old('nationality', $nationality) == 'Tonga') selected @endif>
                                                Tonga </option>
                                            <option value="Trinidad and Tobago"
                                                @if (old('nationality', $nationality) == 'Trinidad and Tobago') selected @endif> Trinidad and Tobago
                                            </option>
                                            <option value="Tunisia" @if (old('nationality', $nationality) == 'Tunisia') selected @endif>
                                                Tunisia </option>
                                            <option value="Turkey" @if (old('nationality', $nationality) == 'Turkey') selected @endif>
                                                Turkey </option>
                                            <option value="Turkmenistan"
                                                @if (old('nationality', $nationality) == 'Turkmenistan') selected @endif> Turkmenistan
                                            </option>
                                            <option value="Tuvalu" @if (old('nationality', $nationality) == 'Tuvalu') selected @endif>
                                                Tuvalu </option>
                                            <option value="Uganda" @if (old('nationality', $nationality) == 'Uganda') selected @endif>
                                                Uganda </option>
                                            <option value="Ukraine" @if (old('nationality', $nationality) == 'Ukraine') selected @endif>
                                                Ukraine </option>
                                            <option value="United Arab Emirates"
                                                @if (old('nationality', $nationality) == 'United Arab Emirates') selected @endif> United Arab Emirates
                                            </option>
                                            <option value="United Kingdom"
                                                @if (old('nationality', $nationality) == 'United Kingdom') selected @endif> United Kingdom
                                            </option>
                                            <option value="United States of America"
                                                @if (old('nationality', $nationality) == 'United States of America') selected @endif> United States of
                                                America </option>
                                            <option value="Uruguay" @if (old('nationality', $nationality) == 'Uruguay') selected @endif>
                                                Uruguay </option>
                                            <option value="Uzbekistan"
                                                @if (old('nationality', $nationality) == 'Uzbekistan') selected @endif> Uzbekistan </option>
                                            <option value="Vanuatu" @if (old('nationality', $nationality) == 'Vanuatu') selected @endif>
                                                Vanuatu </option>
                                            <option value="Vatican City"
                                                @if (old('nationality', $nationality) == 'Vatican City') selected @endif> Vatican City
                                            </option>
                                            <option value="Venezuela"
                                                @if (old('nationality', $nationality) == 'Venezuela') selected @endif> Venezuela </option>
                                            <option value="Vietnam" @if (old('nationality', $nationality) == 'Vietnam') selected @endif>
                                                Vietnam </option>
                                            <option value="Yemen" @if (old('nationality', $nationality) == 'Yemen') selected @endif>
                                                Yemen </option>
                                            <option value="Zambia" @if (old('nationality', $nationality) == 'Zambia') selected @endif>
                                                Zambia </option>
                                            <option value="Zimbabwe" @if (old('nationality', $nationality) == 'Zimbabwe') selected @endif>
                                                Zimbabwe </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Email
                                            Address *</label>
                                        <input type="email" readonly class="form-control fs-14 h-50px" name="email"
                                            value="{{ $email }}" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telephone-country"
                                            class="form-label fs-14 text-theme-primary fw-bold">Phone Number
                                            *</label>
                                        <div class="single-field full-width phone-input-flag d-flex ">
                                            <input type="tel" class="mobile-number form-control fs-14 h-50px"
                                                style="color: transparent;" name="country_code"
                                                value="{{ old('country_code', $country_code) }}" required>
                                            {{-- <input type="tel" class="mobile-number-full form-control fs-14 h-50px" placeholder="Phone Number" name="number" value="{{ old($number) }}" max="111111111111" required> --}}
                                            <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                                                placeholder="Phone Number" name="number" maxlength="11"
                                                value="{{ old('number', $number) }}" required>

                                        </div>
                                        {{-- <input type="tel" placeholder="telephone-country" id="telephone"> --}}
                                        {{-- <input type="tel" id="telephone-country" class="form-control fs-14 h-50px" placeholder="" > --}}
                                        {{-- <div class="row gx-2">
                                        <label for="telephone-country" class="form-label fs-14 text-theme-primary fw-bold">Phone Number
                                        </label>
                                        <input type="tel" id="telephone-country" class="form-control fs-14 h-50px telephone-country" placeholder="" >
                                        <input type="tel" id="telephone-country" class="form-control fs-14 h-50px telephone-country" placeholder="" >
                                        {{-- <input type="tel" id="demo" placeholder="telephone-country" id="telephone"> --}}
                                        {{-- <!-- <div class="row gx-2">
                                            <div class="col-2">
                                                <input type="tel" class="form-control fs-14 h-50px telephone-country" maxlength="4"
                                                    value="{{ $country_code }}" name="country_code">
                </div>
                <div class="col-6">
                  <input type="tel" class="form-control fs-14 h-50px" name="number" maxlength="11" value="{{ $number }}">
                </div>
              </div> --> --}}
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Street
                                            Address *</label>
                                        {{-- <input type="text" class="form-control fs-14 h-50px" id="address"
                                            name="address" value="{{ $address }}" required> --}}
                                        {{-- <input type="text" class="form-control fs-14 h-50px searchInput"
                                            id="autocomplete" name="address" value="{{ old('address', $address) }}" required
                                            autocomplete="off">
                                        <input type="hidden" id="Lat" name="Lat"
                                            value="{{ old('Lat', $Lat) }}" />
                                        <input type="hidden" id="Lng" name="Lng"
                                            value="{{ old('Lng', $Lng) }}" /> --}}
                                        <input id="searchInput" value=""
                                            class="controls form-control input-login searchInput" name="address"
                                            type="text" placeholder="" required autocomplete="off">
                                        <input type="hidden" id="latitude" value="" name="lat" />
                                        <input type="hidden" id="longitude" value="" name="lng" />

                                    </div>
                                    <div class="col-md-3">
                                        <label for="country"
                                            class="form-label fs-14 text-theme-primary fw-bold">Country</label>
                                        <input type="text" class="form-control input-login" id="country"
                                            name="country" value="" placeholder="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="city"
                                            class="form-label fs-14 text-theme-primary fw-bold">City</label>
                                        <input type="text" class="form-control input-login" id="city"
                                            name="city" placeholder="" value="" required>
                                    </div>
                                    <div class="col-md-3">
                                        <label for="zip_code"
                                            class="form-label fs-14 text-theme-primary fw-bold">Zip/Postal
                                            Code</label>
                                        <input type="text" class="form-control input-login"
                                            value="{{ $zipCode }}" id="zip_code" name="zipCode" placeholder=""
                                            required>
                                    </div>
                                    {{-- <div class="col-12">
                                        <div class="form-check py-2 ">
                                            <input class="form-check-input rounded-0" name="terms" reqquired value="1" type="checkbox"
                                                id="gridCheck" @if ($terms == 1) checked @endif>
                                            <label class="form-check-label text-dark fs-14" for="gridCheck">
                                                I agree to <a href="{{ route('terms') }}" target="_blank">Terms And Condition</a>.
        </label>
      </div>
    </div> --}}
                                </div>
                            </fieldset>
                            <div class="row justify-content-center pt-md-5 pt-3">
                                <div class="col-lg-5 text-center">
                                    <button class="next action-button default-btn">
                                        Next
                                    </button>
                                    <br />
                                    <br />
                                    {{-- <a href="{{ route('index') }}" class="fs-6 fw-normal">I will fill this later</a> --}}
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <script src="https://cdn.ckeditor.com/ckeditor5/18.0.0/classic/ckeditor.js"></script>
    <script>
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
    </script>
@endsection
