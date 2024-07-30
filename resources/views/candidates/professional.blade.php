@extends('layouts.app')

@section('content')
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5 mb-4">Candidate Details</h1>
                        {{-- @include('layouts.includes.messages') --}}
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li class="active"></li>
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
                        <form id="msform" action="{{ route('store.candidateProfession') }}" method="POST">
                            @csrf
                            <!-- fieldsets -->
                            <fieldset class="mb-5 first-sec">
                                <div class="duplicate_form">
                                    <div class="row row-cols-1">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Professional Details
                                            </h2>
                                            <a href="javascript:void(0)" id="addbtn" role="button"><img
                                                    src="{{ asset('images/plus-circle.svg') }}" alt="plus-circle"
                                                    class="img-fluid"></a>
                                        </div>
                                    </div>
                                    @if (count($month_exp) > 0)
                                        @foreach ($month_exp as $key => $po)
                                            {{-- {{ dd($pro_id[$key]) }} --}}
                                            <div class="row row-cols-1  mt-3 clone" id="repeat-{{ $pro_id[$key] }}">
                                                <div class="col-lg-12 text-end">
                                                    <a class="remove"
                                                        href="{{ route('candidates.profession.delete', $pro_id[$key]) }}">-</a>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Employer
                                                        Name*</label>
                                                    <input type="text" class="form-control fs-14 h-50px" id=""
                                                        value="{{ $company_name[$key] }}" name="company_name[]" required>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Designation*</label>
                                                    <input type="text" class="form-control fs-14 h-50px" id=""
                                                        value="{{ $designation[$key] }}" name="designation[]">
                                                </div>

                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Employer
                                                        Location*</label>
                                                    <select id="role" class="form-select fs-14  h-50px"
                                                        name="Employer_Location[]" required>
                                                        <option selected value="" disabled>Select Country</option>
                                                        <option value="Afghanistan"
                                                            @if ($comp_loc[$key] == 'Afghanistan') selected @endif> Afghanistan
                                                        </option>
                                                        <option value="Albania"
                                                            @if ($comp_loc[$key] == 'Albania') selected @endif> Albania
                                                        </option>
                                                        <option value="Algeria"
                                                            @if ($comp_loc[$key] == 'Algeria') selected @endif> Algeria
                                                        </option>
                                                        <option value="Andorra"
                                                            @if ($comp_loc[$key] == 'Andorra') selected @endif> Andorra
                                                        </option>
                                                        <option value="Angola"
                                                            @if ($comp_loc[$key] == 'Angola') selected @endif> Angola
                                                        </option>
                                                        <option value="Antigua and Barbuda"
                                                            @if ($comp_loc[$key] == 'Antigua and Barbuda') selected @endif> Antigua and
                                                            Barbuda </option>
                                                        <option value="Argentina"
                                                            @if ($comp_loc[$key] == 'Argentina') selected @endif> Argentina
                                                        </option>
                                                        <option value="Armenia"
                                                            @if ($comp_loc[$key] == 'Armenia') selected @endif> Armenia
                                                        </option>
                                                        <option value="Australia"
                                                            @if ($comp_loc[$key] == 'Australia') selected @endif> Australia
                                                        </option>
                                                        <option value="Austria"
                                                            @if ($comp_loc[$key] == 'Austria') selected @endif> Austria
                                                        </option>
                                                        <option value="Azerbaijan"
                                                            @if ($comp_loc[$key] == 'Azerbaijan') selected @endif> Azerbaijan
                                                        </option>
                                                        <option value="Bahamas"
                                                            @if ($comp_loc[$key] == 'Bahamas') selected @endif> Bahamas
                                                        </option>
                                                        <option value="Bahrain"
                                                            @if ($comp_loc[$key] == 'Bahrain') selected @endif> Bahrain
                                                        </option>
                                                        <option value="Bangladesh"
                                                            @if ($comp_loc[$key] == 'Bangladesh') selected @endif> Bangladesh
                                                        </option>
                                                        <option value="Barbados"
                                                            @if ($comp_loc[$key] == 'Barbados') selected @endif> Barbados
                                                        </option>
                                                        <option value="Belarus"
                                                            @if ($comp_loc[$key] == 'Belarus') selected @endif> Belarus
                                                        </option>
                                                        <option value="Belgium"
                                                            @if ($comp_loc[$key] == 'Belgium') selected @endif> Belgium
                                                        </option>
                                                        <option value="Belize"
                                                            @if ($comp_loc[$key] == 'Belize') selected @endif> Belize
                                                        </option>
                                                        <option value="Benin"
                                                            @if ($comp_loc[$key] == 'Benin') selected @endif> Benin
                                                        </option>
                                                        <option value="Bhutan"
                                                            @if ($comp_loc[$key] == 'Bhutan') selected @endif> Bhutan
                                                        </option>
                                                        <option value="Bolivia"
                                                            @if ($comp_loc[$key] == 'Bolivia') selected @endif> Bolivia
                                                        </option>
                                                        <option value="Bosnia and Herzegovina"
                                                            @if ($comp_loc[$key] == 'Bosnia and Herzegovina') selected @endif> Bosnia and
                                                            Herzegovina </option>
                                                        <option value="Botswana"
                                                            @if ($comp_loc[$key] == 'Botswana') selected @endif> Botswana
                                                        </option>
                                                        <option value="Brazil"
                                                            @if ($comp_loc[$key] == 'Brazil') selected @endif> Brazil
                                                        </option>
                                                        <option value="Brunei"
                                                            @if ($comp_loc[$key] == 'Brunei') selected @endif> Brunei
                                                        </option>
                                                        <option value="Bulgaria"
                                                            @if ($comp_loc[$key] == 'Bulgaria') selected @endif> Bulgaria
                                                        </option>
                                                        <option value="Burkina Faso"
                                                            @if ($comp_loc[$key] == 'Burkina Faso') selected @endif> Burkina
                                                            Faso </option>
                                                        <option value="Burundi"
                                                            @if ($comp_loc[$key] == 'Burundi') selected @endif> Burundi
                                                        </option>
                                                        <option value="Cabo Verde"
                                                            @if ($comp_loc[$key] == 'Cabo Verde') selected @endif> Cabo Verde
                                                        </option>
                                                        <option value="Cambodia"
                                                            @if ($comp_loc[$key] == 'Cambodia') selected @endif> Cambodia
                                                        </option>
                                                        <option value="Cameroon"
                                                            @if ($comp_loc[$key] == 'Cameroon') selected @endif> Cameroon
                                                        </option>
                                                        <option value="Canada"
                                                            @if ($comp_loc[$key] == 'Canada') selected @endif> Canada
                                                        </option>
                                                        <option value="Central African Republic"
                                                            @if ($comp_loc[$key] == 'Central African Republic') selected @endif> Central
                                                            African Republic </option>
                                                        <option value="Chad"
                                                            @if ($comp_loc[$key] == 'Chad') selected @endif> Chad
                                                        </option>
                                                        <option value="Chile"
                                                            @if ($comp_loc[$key] == 'Chile') selected @endif> Chile
                                                        </option>
                                                        <option value="China"
                                                            @if ($comp_loc[$key] == 'China') selected @endif> China
                                                        </option>
                                                        <option value="Colombia"
                                                            @if ($comp_loc[$key] == 'Colombia') selected @endif> Colombia
                                                        </option>
                                                        <option value="Comoros"
                                                            @if ($comp_loc[$key] == 'Comoros') selected @endif> Comoros
                                                        </option>
                                                        <option value="Congo (Congo-Brazzaville)"
                                                            @if ($comp_loc[$key] == 'Congo (Congo-Brazzaville)') selected @endif> Congo
                                                            (Congo-Brazzaville) </option>
                                                        <option value="Costa Rica"
                                                            @if ($comp_loc[$key] == 'Costa Rica') selected @endif> Costa Rica
                                                        </option>
                                                        <option value="Croatia"
                                                            @if ($comp_loc[$key] == 'Croatia') selected @endif> Croatia
                                                        </option>
                                                        <option value="Cuba"
                                                            @if ($comp_loc[$key] == 'Cuba') selected @endif> Cuba
                                                        </option>
                                                        <option value="Cyprus"
                                                            @if ($comp_loc[$key] == 'Cyprus') selected @endif> Cyprus
                                                        </option>
                                                        <option value="Czechia (Czech Republic)"
                                                            @if ($comp_loc[$key] == 'Czechia (Czech Republic)') selected @endif> Czechia
                                                            (Czech Republic) </option>
                                                        <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                            @if ($comp_loc[$key] == 'Democratic Republic of the Congo (Congo-Kinshasa)') selected @endif> Democratic
                                                            Republic of the Congo (Congo-Kinshasa) </option>
                                                        <option value="Denmark"
                                                            @if ($comp_loc[$key] == 'Denmark') selected @endif> Denmark
                                                        </option>
                                                        <option value="Djibouti"
                                                            @if ($comp_loc[$key] == 'Djibouti') selected @endif> Djibouti
                                                        </option>
                                                        <option value="Dominica"
                                                            @if ($comp_loc[$key] == 'Dominica') selected @endif> Dominica
                                                        </option>
                                                        <option value="Dominican Republic"
                                                            @if ($comp_loc[$key] == 'Dominican Republic') selected @endif> Dominican
                                                            Republic </option>
                                                        <option value="East Timor (Timor-Leste)"
                                                            @if ($comp_loc[$key] == 'East Timor (Timor-Leste)') selected @endif> East Timor
                                                            (Timor-Leste) </option>
                                                        <option value="Ecuador"
                                                            @if ($comp_loc[$key] == 'Ecuador') selected @endif> Ecuador
                                                        </option>
                                                        <option value="Egypt"
                                                            @if ($comp_loc[$key] == 'Egypt') selected @endif> Egypt
                                                        </option>
                                                        <option value="El Salvador"
                                                            @if ($comp_loc[$key] == 'El Salvador') selected @endif> El Salvador
                                                        </option>
                                                        <option value="Equatorial Guinea"
                                                            @if ($comp_loc[$key] == 'Equatorial Guinea') selected @endif> Equatorial
                                                            Guinea </option>
                                                        <option value="Eritrea"
                                                            @if ($comp_loc[$key] == 'Eritrea') selected @endif> Eritrea
                                                        </option>
                                                        <option value="Estonia"
                                                            @if ($comp_loc[$key] == 'Estonia') selected @endif> Estonia
                                                        </option>
                                                        <option value="Eswatini (formerly Swaziland)"
                                                            @if ($comp_loc[$key] == 'Eswatini (formerly Swaziland)') selected @endif> Eswatini
                                                            (formerly Swaziland) </option>
                                                        <option value="Ethiopia"
                                                            @if ($comp_loc[$key] == 'Ethiopia') selected @endif> Ethiopia
                                                        </option>
                                                        <option value="Fiji"
                                                            @if ($comp_loc[$key] == 'Fiji') selected @endif> Fiji
                                                        </option>
                                                        <option value="Finland"
                                                            @if ($comp_loc[$key] == 'Finland') selected @endif> Finland
                                                        </option>
                                                        <option value="France"
                                                            @if ($comp_loc[$key] == 'France') selected @endif> France
                                                        </option>
                                                        <option value="Gabon"
                                                            @if ($comp_loc[$key] == 'Gabon') selected @endif> Gabon
                                                        </option>
                                                        <option value="Gambia"
                                                            @if ($comp_loc[$key] == 'Gambia') selected @endif> Gambia
                                                        </option>
                                                        <option value="Georgia"
                                                            @if ($comp_loc[$key] == 'Georgia') selected @endif> Georgia
                                                        </option>
                                                        <option value="Germany"
                                                            @if ($comp_loc[$key] == 'Germany') selected @endif> Germany
                                                        </option>
                                                        <option value="Ghana"
                                                            @if ($comp_loc[$key] == 'Ghana') selected @endif> Ghana
                                                        </option>
                                                        <option value="Greece"
                                                            @if ($comp_loc[$key] == 'Greece') selected @endif> Greece
                                                        </option>
                                                        <option value="Grenada"
                                                            @if ($comp_loc[$key] == 'Grenada') selected @endif> Grenada
                                                        </option>
                                                        <option value="Guatemala"
                                                            @if ($comp_loc[$key] == 'Guatemala') selected @endif> Guatemala
                                                        </option>
                                                        <option value="Guinea"
                                                            @if ($comp_loc[$key] == 'Guinea') selected @endif> Guinea
                                                        </option>
                                                        <option value="Guinea-Bissau"
                                                            @if ($comp_loc[$key] == 'Guinea-Bissau') selected @endif>
                                                            Guinea-Bissau </option>
                                                        <option value="Guyana"
                                                            @if ($comp_loc[$key] == 'Guyana') selected @endif> Guyana
                                                        </option>
                                                        <option value="Haiti"
                                                            @if ($comp_loc[$key] == 'Haiti') selected @endif> Haiti
                                                        </option>
                                                        <option value="Honduras"
                                                            @if ($comp_loc[$key] == 'Honduras') selected @endif> Honduras
                                                        </option>
                                                        <option value="Hungary"
                                                            @if ($comp_loc[$key] == 'Hungary') selected @endif> Hungary
                                                        </option>
                                                        <option value="Iceland"
                                                            @if ($comp_loc[$key] == 'Iceland') selected @endif> Iceland
                                                        </option>
                                                        <option value="India"
                                                            @if ($comp_loc[$key] == 'India') selected @endif> India
                                                        </option>
                                                        <option value="Indonesia"
                                                            @if ($comp_loc[$key] == 'Indonesia') selected @endif> Indonesia
                                                        </option>
                                                        <option value="Iran"
                                                            @if ($comp_loc[$key] == 'Iran') selected @endif> Iran
                                                        </option>
                                                        <option value="Iraq"
                                                            @if ($comp_loc[$key] == 'Iraq') selected @endif> Iraq
                                                        </option>
                                                        <option value="Ireland"
                                                            @if ($comp_loc[$key] == 'Ireland') selected @endif> Ireland
                                                        </option>
                                                        <option value="Israel"
                                                            @if ($comp_loc[$key] == 'Israel') selected @endif> Israel
                                                        </option>
                                                        <option value="Italy"
                                                            @if ($comp_loc[$key] == 'Italy') selected @endif> Italy
                                                        </option>
                                                        <option value="Ivory Coast (Côte d'Ivoire)"
                                                            @if ($comp_loc[$key] == "Ivory Coast (Côte d'Ivoire)") selected @endif> Ivory Coast
                                                            (Côte d'Ivoire) </option>
                                                        <option value="Jamaica"
                                                            @if ($comp_loc[$key] == 'Jamaica') selected @endif> Jamaica
                                                        </option>
                                                        <option value="Japan"
                                                            @if ($comp_loc[$key] == 'Japan') selected @endif> Japan
                                                        </option>
                                                        <option value="Jordan"
                                                            @if ($comp_loc[$key] == 'Jordan') selected @endif> Jordan
                                                        </option>
                                                        <option value="Kazakhstan"
                                                            @if ($comp_loc[$key] == 'Kazakhstan') selected @endif> Kazakhstan
                                                        </option>
                                                        <option value="Kenya"
                                                            @if ($comp_loc[$key] == 'Kenya') selected @endif> Kenya
                                                        </option>
                                                        <option value="Kiribati"
                                                            @if ($comp_loc[$key] == 'Kiribati') selected @endif> Kiribati
                                                        </option>
                                                        <option value="Kosovo"
                                                            @if ($comp_loc[$key] == 'Kosovo') selected @endif> Kosovo
                                                        </option>
                                                        <option value="Kuwait"
                                                            @if ($comp_loc[$key] == 'Kuwait') selected @endif> Kuwait
                                                        </option>
                                                        <option value="Kyrgyzstan"
                                                            @if ($comp_loc[$key] == 'Kyrgyzstan') selected @endif> Kyrgyzstan
                                                        </option>
                                                        <option value="Laos"
                                                            @if ($comp_loc[$key] == 'Laos') selected @endif> Laos
                                                        </option>
                                                        <option value="Latvia"
                                                            @if ($comp_loc[$key] == 'Latvia') selected @endif> Latvia
                                                        </option>
                                                        <option value="Lebanon"
                                                            @if ($comp_loc[$key] == 'Lebanon') selected @endif> Lebanon
                                                        </option>
                                                        <option value="Lesotho"
                                                            @if ($comp_loc[$key] == 'Lesotho') selected @endif> Lesotho
                                                        </option>
                                                        <option value="Liberia"
                                                            @if ($comp_loc[$key] == 'Liberia') selected @endif> Liberia
                                                        </option>
                                                        <option value="Libya"
                                                            @if ($comp_loc[$key] == 'Libya') selected @endif> Libya
                                                        </option>
                                                        <option value="Liechtenstein"
                                                            @if ($comp_loc[$key] == 'Liechtenstein') selected @endif>
                                                            Liechtenstein </option>
                                                        <option value="Lithuania"
                                                            @if ($comp_loc[$key] == 'Lithuania') selected @endif> Lithuania
                                                        </option>
                                                        <option value="Luxembourg"
                                                            @if ($comp_loc[$key] == 'Luxembourg') selected @endif>
                                                            Luxembourg </option>
                                                        <option value="Madagascar"
                                                            @if ($comp_loc[$key] == 'Madagascar') selected @endif>
                                                            Madagascar </option>
                                                        <option value="Malawi"
                                                            @if ($comp_loc[$key] == 'Malawi') selected @endif> Malawi
                                                        </option>
                                                        <option value="Malaysia"
                                                            @if ($comp_loc[$key] == 'Malaysia') selected @endif> Malaysia
                                                        </option>
                                                        <option value="Maldives"
                                                            @if ($comp_loc[$key] == 'Maldives') selected @endif> Maldives
                                                        </option>
                                                        <option value="Mali"
                                                            @if ($comp_loc[$key] == 'Mali') selected @endif> Mali
                                                        </option>
                                                        <option value="Malta"
                                                            @if ($comp_loc[$key] == 'Malta') selected @endif> Malta
                                                        </option>
                                                        <option value="Marshall Islands"
                                                            @if ($comp_loc[$key] == 'Marshall Islands') selected @endif> Marshall
                                                            Islands </option>
                                                        <option value="Mauritania"
                                                            @if ($comp_loc[$key] == 'Mauritania') selected @endif>
                                                            Mauritania </option>
                                                        <option value="Mauritius"
                                                            @if ($comp_loc[$key] == 'Mauritius') selected @endif> Mauritius
                                                        </option>
                                                        <option value="Mexico"
                                                            @if ($comp_loc[$key] == 'Mexico') selected @endif> Mexico
                                                        </option>
                                                        <option value="Micronesia"
                                                            @if ($comp_loc[$key] == 'Micronesia') selected @endif>
                                                            Micronesia </option>
                                                        <option value="Moldova"
                                                            @if ($comp_loc[$key] == 'Moldova') selected @endif> Moldova
                                                        </option>
                                                        <option value="Monaco"
                                                            @if ($comp_loc[$key] == 'Monaco') selected @endif> Monaco
                                                        </option>
                                                        <option value="Mongolia"
                                                            @if ($comp_loc[$key] == 'Mongolia') selected @endif> Mongolia
                                                        </option>
                                                        <option value="Montenegro"
                                                            @if ($comp_loc[$key] == 'Montenegro') selected @endif>
                                                            Montenegro </option>
                                                        <option value="Morocco"
                                                            @if ($comp_loc[$key] == 'Morocco') selected @endif> Morocco
                                                        </option>
                                                        <option value="Mozambique"
                                                            @if ($comp_loc[$key] == 'Mozambique') selected @endif>
                                                            Mozambique </option>
                                                        <option value="Myanmar (Burma)"
                                                            @if ($comp_loc[$key] == 'Myanmar (Burma)') selected @endif> Myanmar
                                                            (Burma) </option>
                                                        <option value="Namibia"
                                                            @if ($comp_loc[$key] == 'Namibia') selected @endif> Namibia
                                                        </option>
                                                        <option value="Nauru"
                                                            @if ($comp_loc[$key] == 'Nauru') selected @endif> Nauru
                                                        </option>
                                                        <option value="Nepal"
                                                            @if ($comp_loc[$key] == 'Nepal') selected @endif> Nepal
                                                        </option>
                                                        <option value="Netherlands"
                                                            @if ($comp_loc[$key] == 'Netherlands') selected @endif>
                                                            Netherlands </option>
                                                        <option value="New Zealand"
                                                            @if ($comp_loc[$key] == 'New Zealand') selected @endif> New
                                                            Zealand </option>
                                                        <option value="Nicaragua"
                                                            @if ($comp_loc[$key] == 'Nicaragua') selected @endif> Nicaragua
                                                        </option>
                                                        <option value="Niger"
                                                            @if ($comp_loc[$key] == 'Niger') selected @endif> Niger
                                                        </option>
                                                        <option value="Nigeria"
                                                            @if ($comp_loc[$key] == 'Nigeria') selected @endif> Nigeria
                                                        </option>
                                                        <option value="North Macedonia (formerly Macedonia)"
                                                            @if ($comp_loc[$key] == 'North Macedonia (formerly Macedonia)') selected @endif> North
                                                            Macedonia (formerly Macedonia) </option>
                                                        <option value="Norway"
                                                            @if ($comp_loc[$key] == 'Norway') selected @endif> Norway
                                                        </option>
                                                        <option value="Oman"
                                                            @if ($comp_loc[$key] == 'Oman') selected @endif> Oman
                                                        </option>
                                                        <option value="Pakistan"
                                                            @if ($comp_loc[$key] == 'Pakistan') selected @endif> Pakistan
                                                        </option>
                                                        <option value="Palau"
                                                            @if ($comp_loc[$key] == 'Palau') selected @endif> Palau
                                                        </option>
                                                        <option value="Palestine State"
                                                            @if ($comp_loc[$key] == 'Palestine State') selected @endif> Palestine
                                                            State </option>
                                                        <option value="Panama"
                                                            @if ($comp_loc[$key] == 'Panama') selected @endif> Panama
                                                        </option>
                                                        <option value="Papua New Guinea"
                                                            @if ($comp_loc[$key] == 'Papua New Guinea') selected @endif> Papua New
                                                            Guinea </option>
                                                        <option value="Paraguay"
                                                            @if ($comp_loc[$key] == 'Paraguay') selected @endif> Paraguay
                                                        </option>
                                                        <option value="Peru"
                                                            @if ($comp_loc[$key] == 'Peru') selected @endif> Peru
                                                        </option>
                                                        <option value="Philippines"
                                                            @if ($comp_loc[$key] == 'Philippines') selected @endif>
                                                            Philippines </option>
                                                        <option value="Poland"
                                                            @if ($comp_loc[$key] == 'Poland') selected @endif> Poland
                                                        </option>
                                                        <option value="Portugal"
                                                            @if ($comp_loc[$key] == 'Portugal') selected @endif> Portugal
                                                        </option>
                                                        <option value="Qatar"
                                                            @if ($comp_loc[$key] == 'Qatar') selected @endif> Qatar
                                                        </option>
                                                        <option value="Romania"
                                                            @if ($comp_loc[$key] == 'Romania') selected @endif> Romania
                                                        </option>
                                                        <option value="Russia"
                                                            @if ($comp_loc[$key] == 'Russia') selected @endif> Russia
                                                        </option>
                                                        <option value="Rwanda"
                                                            @if ($comp_loc[$key] == 'Rwanda') selected @endif> Rwanda
                                                        </option>
                                                        <option value="Saint Kitts and Nevis"
                                                            @if ($comp_loc[$key] == 'Saint Kitts and Nevis') selected @endif> Saint
                                                            Kitts and Nevis </option>
                                                        <option value="Saint Lucia"
                                                            @if ($comp_loc[$key] == 'Saint Lucia') selected @endif> Saint
                                                            Lucia </option>
                                                        <option value="Saint Vincent and the Grenadines"
                                                            @if ($comp_loc[$key] == 'Saint Vincent and the Grenadines') selected @endif> Saint
                                                            Vincent and the Grenadines </option>
                                                        <option value="Samoa"
                                                            @if ($comp_loc[$key] == 'Samoa') selected @endif> Samoa
                                                        </option>
                                                        <option value="San Marino"
                                                            @if ($comp_loc[$key] == 'San Marino') selected @endif> San
                                                            Marino </option>
                                                        <option value="Sao Tome and Principe"
                                                            @if ($comp_loc[$key] == 'Sao Tome and Principe') selected @endif> Sao Tome
                                                            and Principe </option>
                                                        <option value="Saudi Arabia"
                                                            @if ($comp_loc[$key] == 'Saudi Arabia') selected @endif> Saudi
                                                            Arabia </option>
                                                        <option value="Senegal"
                                                            @if ($comp_loc[$key] == 'Senegal') selected @endif> Senegal
                                                        </option>
                                                        <option value="Serbia"
                                                            @if ($comp_loc[$key] == 'Serbia') selected @endif> Serbia
                                                        </option>
                                                        <option value="Seychelles"
                                                            @if ($comp_loc[$key] == 'Seychelles') selected @endif>
                                                            Seychelles </option>
                                                        <option value="Sierra Leone"
                                                            @if ($comp_loc[$key] == 'Sierra Leone') selected @endif> Sierra
                                                            Leone </option>
                                                        <option value="Singapore"
                                                            @if ($comp_loc[$key] == 'Singapore') selected @endif> Singapore
                                                        </option>
                                                        <option value="Slovakia"
                                                            @if ($comp_loc[$key] == 'Slovakia') selected @endif> Slovakia
                                                        </option>
                                                        <option value="Slovenia"
                                                            @if ($comp_loc[$key] == 'Slovenia') selected @endif> Slovenia
                                                        </option>
                                                        <option value="Solomon Islands"
                                                            @if ($comp_loc[$key] == 'Solomon Islands') selected @endif> Solomon
                                                            Islands </option>
                                                        <option value="Somalia"
                                                            @if ($comp_loc[$key] == 'Somalia') selected @endif> Somalia
                                                        </option>
                                                        <option value="South Africa"
                                                            @if ($comp_loc[$key] == 'South Africa') selected @endif> South
                                                            Africa </option>
                                                        <option value="South Korea"
                                                            @if ($comp_loc[$key] == 'South Korea') selected @endif> South
                                                            Korea </option>
                                                        <option value="South Sudan"
                                                            @if ($comp_loc[$key] == 'South Sudan') selected @endif> South
                                                            Sudan </option>
                                                        <option value="Spain"
                                                            @if ($comp_loc[$key] == 'Spain') selected @endif> Spain
                                                        </option>
                                                        <option value="Sri Lanka"
                                                            @if ($comp_loc[$key] == 'Sri Lanka') selected @endif> Sri Lanka
                                                        </option>
                                                        <option value="Sudan"
                                                            @if ($comp_loc[$key] == 'Sudan') selected @endif> Sudan
                                                        </option>
                                                        <option value="Suriname"
                                                            @if ($comp_loc[$key] == 'Suriname') selected @endif> Suriname
                                                        </option>
                                                        <option value="Sweden"
                                                            @if ($comp_loc[$key] == 'Sweden') selected @endif> Sweden
                                                        </option>
                                                        <option value="Switzerland"
                                                            @if ($comp_loc[$key] == 'Switzerland') selected @endif>
                                                            Switzerland </option>
                                                        <option value="Syria"
                                                            @if ($comp_loc[$key] == 'Syria') selected @endif> Syria
                                                        </option>
                                                        <option value="Taiwan"
                                                            @if ($comp_loc[$key] == 'Taiwan') selected @endif> Taiwan
                                                        </option>
                                                        <option value="Tajikistan"
                                                            @if ($comp_loc[$key] == 'Tajikistan') selected @endif>
                                                            Tajikistan </option>
                                                        <option value="Tanzania"
                                                            @if ($comp_loc[$key] == 'Tanzania') selected @endif> Tanzania
                                                        </option>
                                                        <option value="Thailand"
                                                            @if ($comp_loc[$key] == 'Thailand') selected @endif> Thailand
                                                        </option>
                                                        <option value="Togo"
                                                            @if ($comp_loc[$key] == 'Togo') selected @endif> Togo
                                                        </option>
                                                        <option value="Tonga"
                                                            @if ($comp_loc[$key] == 'Tonga') selected @endif> Tonga
                                                        </option>
                                                        <option value="Trinidad and Tobago"
                                                            @if ($comp_loc[$key] == 'Trinidad and Tobago') selected @endif> Trinidad
                                                            and Tobago </option>
                                                        <option value="Tunisia"
                                                            @if ($comp_loc[$key] == 'Tunisia') selected @endif> Tunisia
                                                        </option>
                                                        <option value="Turkey"
                                                            @if ($comp_loc[$key] == 'Turkey') selected @endif> Turkey
                                                        </option>
                                                        <option value="Turkmenistan"
                                                            @if ($comp_loc[$key] == 'Turkmenistan') selected @endif>
                                                            Turkmenistan </option>
                                                        <option value="Tuvalu"
                                                            @if ($comp_loc[$key] == 'Tuvalu') selected @endif> Tuvalu
                                                        </option>
                                                        <option value="Uganda"
                                                            @if ($comp_loc[$key] == 'Uganda') selected @endif> Uganda
                                                        </option>
                                                        <option value="Ukraine"
                                                            @if ($comp_loc[$key] == 'Ukraine') selected @endif> Ukraine
                                                        </option>
                                                        <option value="United Arab Emirates"
                                                            @if ($comp_loc[$key] == 'United Arab Emirates') selected @endif> United
                                                            Arab Emirates </option>
                                                        <option value="United Kingdom"
                                                            @if ($comp_loc[$key] == 'United Kingdom') selected @endif> United
                                                            Kingdom </option>
                                                        <option value="United States of America"
                                                            @if ($comp_loc[$key] == 'United States of America') selected @endif> United
                                                            States of America </option>
                                                        <option value="Uruguay"
                                                            @if ($comp_loc[$key] == 'Uruguay') selected @endif> Uruguay
                                                        </option>
                                                        <option value="Uzbekistan"
                                                            @if ($comp_loc[$key] == 'Uzbekistan') selected @endif>
                                                            Uzbekistan </option>
                                                        <option value="Vanuatu"
                                                            @if ($comp_loc[$key] == 'Vanuatu') selected @endif> Vanuatu
                                                        </option>
                                                        <option value="Vatican City"
                                                            @if ($comp_loc[$key] == 'Vatican City') selected @endif> Vatican
                                                            City </option>
                                                        <option value="Venezuela"
                                                            @if ($comp_loc[$key] == 'Venezuela') selected @endif> Venezuela
                                                        </option>
                                                        <option value="Vietnam"
                                                            @if ($comp_loc[$key] == 'Vietnam') selected @endif> Vietnam
                                                        </option>
                                                        <option value="Yemen"
                                                            @if ($comp_loc[$key] == 'Yemen') selected @endif> Yemen
                                                        </option>
                                                        <option value="Zambia"
                                                            @if ($comp_loc[$key] == 'Zambia') selected @endif> Zambia
                                                        </option>
                                                        <option value="Zimbabwe"
                                                            @if ($comp_loc[$key] == 'Zimbabwe') selected @endif> Zimbabwe
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Total
                                                        Work Experience*</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="year_exp[]"
                                                            onchange='changeToDate({{ $key }})' value="0"
                                                            id="currentlyWorkHere{{ $key }}"
                                                            @if ($year_exp[$key] == 0) checked @endif>
                                                        <label class="form-check-label fs-14"
                                                            for="currentlyWorkHere{{ $key }}">
                                                            currently working here
                                                        </label>
                                                    </div>
                                                    <div class="d-md-flex align-items-center ">
                                                        <div class="">
                                                            <span class="fs-6">Start Date</span>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control datepicker fs-14 h-50px w-100"
                                                                    value="{{ $month_exp[$key] }}"
                                                                    placeholder="dd-mm-yyyy" autocomplete="off"
                                                                    id="startDate{{ $key }}" name="month_exp[]"
                                                                    required readonly>
                                                                <label class="calender-icon d-block"
                                                                    for="startDate{{ $key }}">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="toDate{{ $key }}" class="to-date-div">
                                                            <div class='mx-md-4 mt-md-3 py-1 py-md-0'>
                                                                -To-
                                                            </div>
                                                            <div class="">
                                                                <span class="fs-6">End Date</span>
                                                                <div class="position-relative">
                                                                    <input type="text"
                                                                        class="form-control datepicker fs-14 h-50px w-100"
                                                                        value="@if ($year_exp[$key] != 0) {{ $year_exp[$key] }} @endif"
                                                                        placeholder="dd-mm-yyyy" autocomplete="off"
                                                                        name="year_exp[]" required readonly
                                                                        @if ($year_exp[$key] == 0) disabled @endif>
                                                                    <label class="calender-icon d-block"
                                                                        for="toDate{{ $key }}">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 ms-3" id='presentText{{ $key }}' style="display: none;">
                                                                Present
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">
                                                        Monthly Salary*
                                                    </label>
                                                    <div class="row row-cols-lg-4 row-cols-1">
                                                        <div class="col">
                                                            <select id="role" class="form-select fs-14  h-50px"
                                                                name="currency[]" required>
                                                                <option disabled>Select Currency</option>
                                                                <option value="Afghanistan"
                                                                    @if ($currency[$key] == 'Afghanistan') selected @endif>
                                                                    Afghanistan </option>
                                                                <option value="Albania"
                                                                    @if ($currency[$key] == 'Albania') selected @endif>
                                                                    Albania </option>
                                                                <option value="Algeria"
                                                                    @if ($currency[$key] == 'Algeria') selected @endif>
                                                                    Algeria </option>
                                                                <option value="Andorra"
                                                                    @if ($currency[$key] == 'Andorra') selected @endif>
                                                                    Andorra </option>
                                                                <option value="Angola"
                                                                    @if ($currency[$key] == 'Angola') selected @endif>
                                                                    Angola </option>
                                                                <option value="Antigua and Barbuda"
                                                                    @if ($currency[$key] == 'Antigua and Barbuda') selected @endif>
                                                                    Antigua and Barbuda </option>
                                                                <option value="Argentina"
                                                                    @if ($currency[$key] == 'Argentina') selected @endif>
                                                                    Argentina </option>
                                                                <option value="Armenia"
                                                                    @if ($currency[$key] == 'Armenia') selected @endif>
                                                                    Armenia </option>
                                                                <option value="Australia"
                                                                    @if ($currency[$key] == 'Australia') selected @endif>
                                                                    Australia </option>
                                                                <option value="Austria"
                                                                    @if ($currency[$key] == 'Austria') selected @endif>
                                                                    Austria </option>
                                                                <option value="Azerbaijan"
                                                                    @if ($currency[$key] == 'Azerbaijan') selected @endif>
                                                                    Azerbaijan </option>
                                                                <option value="Bahamas"
                                                                    @if ($currency[$key] == 'Bahamas') selected @endif>
                                                                    Bahamas </option>
                                                                <option value="Bahrain"
                                                                    @if ($currency[$key] == 'Bahrain') selected @endif>
                                                                    Bahrain </option>
                                                                <option value="Bangladesh"
                                                                    @if ($currency[$key] == 'Bangladesh') selected @endif>
                                                                    Bangladesh </option>
                                                                <option value="Barbados"
                                                                    @if ($currency[$key] == 'Barbados') selected @endif>
                                                                    Barbados </option>
                                                                <option value="Belarus"
                                                                    @if ($currency[$key] == 'Belarus') selected @endif>
                                                                    Belarus </option>
                                                                <option value="Belgium"
                                                                    @if ($currency[$key] == 'Belgium') selected @endif>
                                                                    Belgium </option>
                                                                <option value="Belize"
                                                                    @if ($currency[$key] == 'Belize') selected @endif>
                                                                    Belize </option>
                                                                <option value="Benin"
                                                                    @if ($currency[$key] == 'Benin') selected @endif>
                                                                    Benin </option>
                                                                <option value="Bhutan"
                                                                    @if ($currency[$key] == 'Bhutan') selected @endif>
                                                                    Bhutan </option>
                                                                <option value="Bolivia"
                                                                    @if ($currency[$key] == 'Bolivia') selected @endif>
                                                                    Bolivia </option>
                                                                <option value="Bosnia and Herzegovina"
                                                                    @if ($currency[$key] == 'Bosnia and Herzegovina') selected @endif>
                                                                    Bosnia and Herzegovina </option>
                                                                <option value="Botswana"
                                                                    @if ($currency[$key] == 'Botswana') selected @endif>
                                                                    Botswana </option>
                                                                <option value="Brazil"
                                                                    @if ($currency[$key] == 'Brazil') selected @endif>
                                                                    Brazil </option>
                                                                <option value="Brunei"
                                                                    @if ($currency[$key] == 'Brunei') selected @endif>
                                                                    Brunei </option>
                                                                <option value="Bulgaria"
                                                                    @if ($currency[$key] == 'Bulgaria') selected @endif>
                                                                    Bulgaria </option>
                                                                <option value="Burkina Faso"
                                                                    @if ($currency[$key] == 'Burkina Faso') selected @endif>
                                                                    Burkina Faso </option>
                                                                <option value="Burundi"
                                                                    @if ($currency[$key] == 'Burundi') selected @endif>
                                                                    Burundi </option>
                                                                <option value="Cabo Verde"
                                                                    @if ($currency[$key] == 'Cabo Verde') selected @endif>
                                                                    Cabo Verde </option>
                                                                <option value="Cambodia"
                                                                    @if ($currency[$key] == 'Cambodia') selected @endif>
                                                                    Cambodia </option>
                                                                <option value="Cameroon"
                                                                    @if ($currency[$key] == 'Cameroon') selected @endif>
                                                                    Cameroon </option>
                                                                <option value="Canada"
                                                                    @if ($currency[$key] == 'Canada') selected @endif>
                                                                    Canada </option>
                                                                <option value="Central African Republic"
                                                                    @if ($currency[$key] == 'Central African Republic') selected @endif>
                                                                    Central African Republic </option>
                                                                <option value="Chad"
                                                                    @if ($currency[$key] == 'Chad') selected @endif>
                                                                    Chad </option>
                                                                <option value="Chile"
                                                                    @if ($currency[$key] == 'Chile') selected @endif>
                                                                    Chile </option>
                                                                <option value="China"
                                                                    @if ($currency[$key] == 'China') selected @endif>
                                                                    China </option>
                                                                <option value="Colombia"
                                                                    @if ($currency[$key] == 'Colombia') selected @endif>
                                                                    Colombia </option>
                                                                <option value="Comoros"
                                                                    @if ($currency[$key] == 'Comoros') selected @endif>
                                                                    Comoros </option>
                                                                <option value="Congo (Congo-Brazzaville)"
                                                                    @if ($currency[$key] == 'Congo (Congo-Brazzaville)') selected @endif>
                                                                    Congo (Congo-Brazzaville) </option>
                                                                <option value="Costa Rica"
                                                                    @if ($currency[$key] == 'Costa Rica') selected @endif>
                                                                    Costa Rica </option>
                                                                <option value="Croatia"
                                                                    @if ($currency[$key] == 'Croatia') selected @endif>
                                                                    Croatia </option>
                                                                <option value="Cuba"
                                                                    @if ($currency[$key] == 'Cuba') selected @endif>
                                                                    Cuba </option>
                                                                <option value="Cyprus"
                                                                    @if ($currency[$key] == 'Cyprus') selected @endif>
                                                                    Cyprus </option>
                                                                <option value="Czechia (Czech Republic)"
                                                                    @if ($currency[$key] == 'Czechia (Czech Republic)') selected @endif>
                                                                    Czechia (Czech Republic) </option>
                                                                <option
                                                                    value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                                    @if ($currency[$key] == 'Democratic Republic of the Congo (Congo-Kinshasa)') selected @endif>
                                                                    Democratic Republic of the Congo (Congo-Kinshasa)
                                                                </option>
                                                                <option value="Denmark"
                                                                    @if ($currency[$key] == 'Denmark') selected @endif>
                                                                    Denmark </option>
                                                                <option value="Djibouti"
                                                                    @if ($currency[$key] == 'Djibouti') selected @endif>
                                                                    Djibouti </option>
                                                                <option value="Dominica"
                                                                    @if ($currency[$key] == 'Dominica') selected @endif>
                                                                    Dominica </option>
                                                                <option value="Dominican Republic"
                                                                    @if ($currency[$key] == 'Dominican Republic') selected @endif>
                                                                    Dominican Republic </option>
                                                                <option value="East Timor (Timor-Leste)"
                                                                    @if ($currency[$key] == 'East Timor (Timor-Leste)') selected @endif>
                                                                    East Timor (Timor-Leste) </option>
                                                                <option value="Ecuador"
                                                                    @if ($currency[$key] == 'Ecuador') selected @endif>
                                                                    Ecuador </option>
                                                                <option value="Egypt"
                                                                    @if ($currency[$key] == 'Egypt') selected @endif>
                                                                    Egypt </option>
                                                                <option value="El Salvador"
                                                                    @if ($currency[$key] == 'El Salvador') selected @endif>
                                                                    El Salvador </option>
                                                                <option value="Equatorial Guinea"
                                                                    @if ($currency[$key] == 'Equatorial Guinea') selected @endif>
                                                                    Equatorial Guinea </option>
                                                                <option value="Eritrea"
                                                                    @if ($currency[$key] == 'Eritrea') selected @endif>
                                                                    Eritrea </option>
                                                                <option value="Estonia"
                                                                    @if ($currency[$key] == 'Estonia') selected @endif>
                                                                    Estonia </option>
                                                                <option value="Eswatini (formerly Swaziland)"
                                                                    @if ($currency[$key] == 'Eswatini (formerly Swaziland)') selected @endif>
                                                                    Eswatini (formerly Swaziland) </option>
                                                                <option value="Ethiopia"
                                                                    @if ($currency[$key] == 'Ethiopia') selected @endif>
                                                                    Ethiopia </option>
                                                                <option value="Fiji"
                                                                    @if ($currency[$key] == 'Fiji') selected @endif>
                                                                    Fiji </option>
                                                                <option value="Finland"
                                                                    @if ($currency[$key] == 'Finland') selected @endif>
                                                                    Finland </option>
                                                                <option value="France"
                                                                    @if ($currency[$key] == 'France') selected @endif>
                                                                    France </option>
                                                                <option value="Gabon"
                                                                    @if ($currency[$key] == 'Gabon') selected @endif>
                                                                    Gabon </option>
                                                                <option value="Gambia"
                                                                    @if ($currency[$key] == 'Gambia') selected @endif>
                                                                    Gambia </option>
                                                                <option value="Georgia"
                                                                    @if ($currency[$key] == 'Georgia') selected @endif>
                                                                    Georgia </option>
                                                                <option value="Germany"
                                                                    @if ($currency[$key] == 'Germany') selected @endif>
                                                                    Germany </option>
                                                                <option value="Ghana"
                                                                    @if ($currency[$key] == 'Ghana') selected @endif>
                                                                    Ghana </option>
                                                                <option value="Greece"
                                                                    @if ($currency[$key] == 'Greece') selected @endif>
                                                                    Greece </option>
                                                                <option value="Grenada"
                                                                    @if ($currency[$key] == 'Grenada') selected @endif>
                                                                    Grenada </option>
                                                                <option value="Guatemala"
                                                                    @if ($currency[$key] == 'Guatemala') selected @endif>
                                                                    Guatemala </option>
                                                                <option value="Guinea"
                                                                    @if ($currency[$key] == 'Guinea') selected @endif>
                                                                    Guinea </option>
                                                                <option value="Guinea-Bissau"
                                                                    @if ($currency[$key] == 'Guinea-Bissau') selected @endif>
                                                                    Guinea-Bissau </option>
                                                                <option value="Guyana"
                                                                    @if ($currency[$key] == 'Guyana') selected @endif>
                                                                    Guyana </option>
                                                                <option value="Haiti"
                                                                    @if ($currency[$key] == 'Haiti') selected @endif>
                                                                    Haiti </option>
                                                                <option value="Honduras"
                                                                    @if ($currency[$key] == 'Honduras') selected @endif>
                                                                    Honduras </option>
                                                                <option value="Hungary"
                                                                    @if ($currency[$key] == 'Hungary') selected @endif>
                                                                    Hungary </option>
                                                                <option value="Iceland"
                                                                    @if ($currency[$key] == 'Iceland') selected @endif>
                                                                    Iceland </option>
                                                                <option value="India"
                                                                    @if ($currency[$key] == 'India') selected @endif>
                                                                    India </option>
                                                                <option value="Indonesia"
                                                                    @if ($currency[$key] == 'Indonesia') selected @endif>
                                                                    Indonesia </option>
                                                                <option value="Iran"
                                                                    @if ($currency[$key] == 'Iran') selected @endif>
                                                                    Iran </option>
                                                                <option value="Iraq"
                                                                    @if ($currency[$key] == 'Iraq') selected @endif>
                                                                    Iraq </option>
                                                                <option value="Ireland"
                                                                    @if ($currency[$key] == 'Ireland') selected @endif>
                                                                    Ireland </option>
                                                                <option value="Israel"
                                                                    @if ($currency[$key] == 'Israel') selected @endif>
                                                                    Israel </option>
                                                                <option value="Italy"
                                                                    @if ($currency[$key] == 'Italy') selected @endif>
                                                                    Italy </option>
                                                                <option value="Ivory Coast (Côte d'Ivoire)"
                                                                    @if ($currency[$key] == "Ivory Coast (Côte d'Ivoire)") selected @endif>
                                                                    Ivory Coast (Côte d'Ivoire) </option>
                                                                <option value="Jamaica"
                                                                    @if ($currency[$key] == 'Jamaica') selected @endif>
                                                                    Jamaica </option>
                                                                <option value="Japan"
                                                                    @if ($currency[$key] == 'Japan') selected @endif>
                                                                    Japan </option>
                                                                <option value="Jordan"
                                                                    @if ($currency[$key] == 'Jordan') selected @endif>
                                                                    Jordan </option>
                                                                <option value="Kazakhstan"
                                                                    @if ($currency[$key] == 'Kazakhstan') selected @endif>
                                                                    Kazakhstan </option>
                                                                <option value="Kenya"
                                                                    @if ($currency[$key] == 'Kenya') selected @endif>
                                                                    Kenya </option>
                                                                <option value="Kiribati"
                                                                    @if ($currency[$key] == 'Kiribati') selected @endif>
                                                                    Kiribati </option>
                                                                <option value="Kosovo"
                                                                    @if ($currency[$key] == 'Kosovo') selected @endif>
                                                                    Kosovo </option>
                                                                <option value="Kuwait"
                                                                    @if ($currency[$key] == 'Kuwait') selected @endif>
                                                                    Kuwait </option>
                                                                <option value="Kyrgyzstan"
                                                                    @if ($currency[$key] == 'Kyrgyzstan') selected @endif>
                                                                    Kyrgyzstan </option>
                                                                <option value="Laos"
                                                                    @if ($currency[$key] == 'Laos') selected @endif>
                                                                    Laos </option>
                                                                <option value="Latvia"
                                                                    @if ($currency[$key] == 'Latvia') selected @endif>
                                                                    Latvia </option>
                                                                <option value="Lebanon"
                                                                    @if ($currency[$key] == 'Lebanon') selected @endif>
                                                                    Lebanon </option>
                                                                <option value="Lesotho"
                                                                    @if ($currency[$key] == 'Lesotho') selected @endif>
                                                                    Lesotho </option>
                                                                <option value="Liberia"
                                                                    @if ($currency[$key] == 'Liberia') selected @endif>
                                                                    Liberia </option>
                                                                <option value="Libya"
                                                                    @if ($currency[$key] == 'Libya') selected @endif>
                                                                    Libya </option>
                                                                <option value="Liechtenstein"
                                                                    @if ($currency[$key] == 'Liechtenstein') selected @endif>
                                                                    Liechtenstein </option>
                                                                <option value="Lithuania"
                                                                    @if ($currency[$key] == 'Lithuania') selected @endif>
                                                                    Lithuania </option>
                                                                <option value="Luxembourg"
                                                                    @if ($currency[$key] == 'Luxembourg') selected @endif>
                                                                    Luxembourg </option>
                                                                <option value="Madagascar"
                                                                    @if ($currency[$key] == 'Madagascar') selected @endif>
                                                                    Madagascar </option>
                                                                <option value="Malawi"
                                                                    @if ($currency[$key] == 'Malawi') selected @endif>
                                                                    Malawi </option>
                                                                <option value="Malaysia"
                                                                    @if ($currency[$key] == 'Malaysia') selected @endif>
                                                                    Malaysia </option>
                                                                <option value="Maldives"
                                                                    @if ($currency[$key] == 'Maldives') selected @endif>
                                                                    Maldives </option>
                                                                <option value="Mali"
                                                                    @if ($currency[$key] == 'Mali') selected @endif>
                                                                    Mali </option>
                                                                <option value="Malta"
                                                                    @if ($currency[$key] == 'Malta') selected @endif>
                                                                    Malta </option>
                                                                <option value="Marshall Islands"
                                                                    @if ($currency[$key] == 'Marshall Islands') selected @endif>
                                                                    Marshall Islands </option>
                                                                <option value="Mauritania"
                                                                    @if ($currency[$key] == 'Mauritania') selected @endif>
                                                                    Mauritania </option>
                                                                <option value="Mauritius"
                                                                    @if ($currency[$key] == 'Mauritius') selected @endif>
                                                                    Mauritius </option>
                                                                <option value="Mexico"
                                                                    @if ($currency[$key] == 'Mexico') selected @endif>
                                                                    Mexico </option>
                                                                <option value="Micronesia"
                                                                    @if ($currency[$key] == 'Micronesia') selected @endif>
                                                                    Micronesia </option>
                                                                <option value="Moldova"
                                                                    @if ($currency[$key] == 'Moldova') selected @endif>
                                                                    Moldova </option>
                                                                <option value="Monaco"
                                                                    @if ($currency[$key] == 'Monaco') selected @endif>
                                                                    Monaco </option>
                                                                <option value="Mongolia"
                                                                    @if ($currency[$key] == 'Mongolia') selected @endif>
                                                                    Mongolia </option>
                                                                <option value="Montenegro"
                                                                    @if ($currency[$key] == 'Montenegro') selected @endif>
                                                                    Montenegro </option>
                                                                <option value="Morocco"
                                                                    @if ($currency[$key] == 'Morocco') selected @endif>
                                                                    Morocco </option>
                                                                <option value="Mozambique"
                                                                    @if ($currency[$key] == 'Mozambique') selected @endif>
                                                                    Mozambique </option>
                                                                <option value="Myanmar (Burma)"
                                                                    @if ($currency[$key] == 'Myanmar (Burma)') selected @endif>
                                                                    Myanmar (Burma) </option>
                                                                <option value="Namibia"
                                                                    @if ($currency[$key] == 'Namibia') selected @endif>
                                                                    Namibia </option>
                                                                <option value="Nauru"
                                                                    @if ($currency[$key] == 'Nauru') selected @endif>
                                                                    Nauru </option>
                                                                <option value="Nepal"
                                                                    @if ($currency[$key] == 'Nepal') selected @endif>
                                                                    Nepal </option>
                                                                <option value="Netherlands"
                                                                    @if ($currency[$key] == 'Netherlands') selected @endif>
                                                                    Netherlands </option>
                                                                <option value="New Zealand"
                                                                    @if ($currency[$key] == 'New Zealand') selected @endif>
                                                                    New Zealand </option>
                                                                <option value="Nicaragua"
                                                                    @if ($currency[$key] == 'Nicaragua') selected @endif>
                                                                    Nicaragua </option>
                                                                <option value="Niger"
                                                                    @if ($currency[$key] == 'Niger') selected @endif>
                                                                    Niger </option>
                                                                <option value="Nigeria"
                                                                    @if ($currency[$key] == 'Nigeria') selected @endif>
                                                                    Nigeria </option>
                                                                <option value="North Macedonia (formerly Macedonia)"
                                                                    @if ($currency[$key] == 'North Macedonia (formerly Macedonia)') selected @endif>
                                                                    North Macedonia (formerly Macedonia) </option>
                                                                <option value="Norway"
                                                                    @if ($currency[$key] == 'Norway') selected @endif>
                                                                    Norway </option>
                                                                <option value="Oman"
                                                                    @if ($currency[$key] == 'Oman') selected @endif>
                                                                    Oman </option>
                                                                <option value="Pakistan"
                                                                    @if ($currency[$key] == 'Pakistan') selected @endif>
                                                                    Pakistan </option>
                                                                <option value="Palau"
                                                                    @if ($currency[$key] == 'Palau') selected @endif>
                                                                    Palau </option>
                                                                <option value="Palestine State"
                                                                    @if ($currency[$key] == 'Palestine State') selected @endif>
                                                                    Palestine State </option>
                                                                <option value="Panama"
                                                                    @if ($currency[$key] == 'Panama') selected @endif>
                                                                    Panama </option>
                                                                <option value="Papua New Guinea"
                                                                    @if ($currency[$key] == 'Papua New Guinea') selected @endif>
                                                                    Papua New Guinea </option>
                                                                <option value="Paraguay"
                                                                    @if ($currency[$key] == 'Paraguay') selected @endif>
                                                                    Paraguay </option>
                                                                <option value="Peru"
                                                                    @if ($currency[$key] == 'Peru') selected @endif>
                                                                    Peru </option>
                                                                <option value="Philippines"
                                                                    @if ($currency[$key] == 'Philippines') selected @endif>
                                                                    Philippines </option>
                                                                <option value="Poland"
                                                                    @if ($currency[$key] == 'Poland') selected @endif>
                                                                    Poland </option>
                                                                <option value="Portugal"
                                                                    @if ($currency[$key] == 'Portugal') selected @endif>
                                                                    Portugal </option>
                                                                <option value="Qatar"
                                                                    @if ($currency[$key] == 'Qatar') selected @endif>
                                                                    Qatar </option>
                                                                <option value="Romania"
                                                                    @if ($currency[$key] == 'Romania') selected @endif>
                                                                    Romania </option>
                                                                <option value="Russia"
                                                                    @if ($currency[$key] == 'Russia') selected @endif>
                                                                    Russia </option>
                                                                <option value="Rwanda"
                                                                    @if ($currency[$key] == 'Rwanda') selected @endif>
                                                                    Rwanda </option>
                                                                <option value="Saint Kitts and Nevis"
                                                                    @if ($currency[$key] == 'Saint Kitts and Nevis') selected @endif>
                                                                    Saint Kitts and Nevis </option>
                                                                <option value="Saint Lucia"
                                                                    @if ($currency[$key] == 'Saint Lucia') selected @endif>
                                                                    Saint Lucia </option>
                                                                <option value="Saint Vincent and the Grenadines"
                                                                    @if ($currency[$key] == 'Saint Vincent and the Grenadines') selected @endif>
                                                                    Saint Vincent and the Grenadines </option>
                                                                <option value="Samoa"
                                                                    @if ($currency[$key] == 'Samoa') selected @endif>
                                                                    Samoa </option>
                                                                <option value="San Marino"
                                                                    @if ($currency[$key] == 'San Marino') selected @endif>
                                                                    San Marino </option>
                                                                <option value="Sao Tome and Principe"
                                                                    @if ($currency[$key] == 'Sao Tome and Principe') selected @endif>
                                                                    Sao Tome and Principe </option>
                                                                <option value="Saudi Arabia"
                                                                    @if ($currency[$key] == 'Saudi Arabia') selected @endif>
                                                                    Saudi Arabia </option>
                                                                <option value="Senegal"
                                                                    @if ($currency[$key] == 'Senegal') selected @endif>
                                                                    Senegal </option>
                                                                <option value="Serbia"
                                                                    @if ($currency[$key] == 'Serbia') selected @endif>
                                                                    Serbia </option>
                                                                <option value="Seychelles"
                                                                    @if ($currency[$key] == 'Seychelles') selected @endif>
                                                                    Seychelles </option>
                                                                <option value="Sierra Leone"
                                                                    @if ($currency[$key] == 'Sierra Leone') selected @endif>
                                                                    Sierra Leone </option>
                                                                <option value="Singapore"
                                                                    @if ($currency[$key] == 'Singapore') selected @endif>
                                                                    Singapore </option>
                                                                <option value="Slovakia"
                                                                    @if ($currency[$key] == 'Slovakia') selected @endif>
                                                                    Slovakia </option>
                                                                <option value="Slovenia"
                                                                    @if ($currency[$key] == 'Slovenia') selected @endif>
                                                                    Slovenia </option>
                                                                <option value="Solomon Islands"
                                                                    @if ($currency[$key] == 'Solomon Islands') selected @endif>
                                                                    Solomon Islands </option>
                                                                <option value="Somalia"
                                                                    @if ($currency[$key] == 'Somalia') selected @endif>
                                                                    Somalia </option>
                                                                <option value="South Africa"
                                                                    @if ($currency[$key] == 'South Africa') selected @endif>
                                                                    South Africa </option>
                                                                <option value="South Korea"
                                                                    @if ($currency[$key] == 'South Korea') selected @endif>
                                                                    South Korea </option>
                                                                <option value="South Sudan"
                                                                    @if ($currency[$key] == 'South Sudan') selected @endif>
                                                                    South Sudan </option>
                                                                <option value="Spain"
                                                                    @if ($currency[$key] == 'Spain') selected @endif>
                                                                    Spain </option>
                                                                <option value="Sri Lanka"
                                                                    @if ($currency[$key] == 'Sri Lanka') selected @endif>
                                                                    Sri Lanka </option>
                                                                <option value="Sudan"
                                                                    @if ($currency[$key] == 'Sudan') selected @endif>
                                                                    Sudan </option>
                                                                <option value="Suriname"
                                                                    @if ($currency[$key] == 'Suriname') selected @endif>
                                                                    Suriname </option>
                                                                <option value="Sweden"
                                                                    @if ($currency[$key] == 'Sweden') selected @endif>
                                                                    Sweden </option>
                                                                <option value="Switzerland"
                                                                    @if ($currency[$key] == 'Switzerland') selected @endif>
                                                                    Switzerland </option>
                                                                <option value="Syria"
                                                                    @if ($currency[$key] == 'Syria') selected @endif>
                                                                    Syria </option>
                                                                <option value="Taiwan"
                                                                    @if ($currency[$key] == 'Taiwan') selected @endif>
                                                                    Taiwan </option>
                                                                <option value="Tajikistan"
                                                                    @if ($currency[$key] == 'Tajikistan') selected @endif>
                                                                    Tajikistan </option>
                                                                <option value="Tanzania"
                                                                    @if ($currency[$key] == 'Tanzania') selected @endif>
                                                                    Tanzania </option>
                                                                <option value="Thailand"
                                                                    @if ($currency[$key] == 'Thailand') selected @endif>
                                                                    Thailand </option>
                                                                <option value="Togo"
                                                                    @if ($currency[$key] == 'Togo') selected @endif>
                                                                    Togo </option>
                                                                <option value="Tonga"
                                                                    @if ($currency[$key] == 'Tonga') selected @endif>
                                                                    Tonga </option>
                                                                <option value="Trinidad and Tobago"
                                                                    @if ($currency[$key] == 'Trinidad and Tobago') selected @endif>
                                                                    Trinidad and Tobago </option>
                                                                <option value="Tunisia"
                                                                    @if ($currency[$key] == 'Tunisia') selected @endif>
                                                                    Tunisia </option>
                                                                <option value="Turkey"
                                                                    @if ($currency[$key] == 'Turkey') selected @endif>
                                                                    Turkey </option>
                                                                <option value="Turkmenistan"
                                                                    @if ($currency[$key] == 'Turkmenistan') selected @endif>
                                                                    Turkmenistan </option>
                                                                <option value="Tuvalu"
                                                                    @if ($currency[$key] == 'Tuvalu') selected @endif>
                                                                    Tuvalu </option>
                                                                <option value="Uganda"
                                                                    @if ($currency[$key] == 'Uganda') selected @endif>
                                                                    Uganda </option>
                                                                <option value="Ukraine"
                                                                    @if ($currency[$key] == 'Ukraine') selected @endif>
                                                                    Ukraine </option>
                                                                <option value="United Arab Emirates"
                                                                    @if ($currency[$key] == 'United Arab Emirates') selected @endif>
                                                                    United Arab Emirates </option>
                                                                <option value="United Kingdom"
                                                                    @if ($currency[$key] == 'United Kingdom') selected @endif>
                                                                    United Kingdom </option>
                                                                <option value="United States of America"
                                                                    @if ($currency[$key] == 'United States of America') selected @endif>
                                                                    United States of America </option>
                                                                <option value="Uruguay"
                                                                    @if ($currency[$key] == 'Uruguay') selected @endif>
                                                                    Uruguay </option>
                                                                <option value="Uzbekistan"
                                                                    @if ($currency[$key] == 'Uzbekistan') selected @endif>
                                                                    Uzbekistan </option>
                                                                <option value="Vanuatu"
                                                                    @if ($currency[$key] == 'Vanuatu') selected @endif>
                                                                    Vanuatu </option>
                                                                <option value="Vatican City"
                                                                    @if ($currency[$key] == 'Vatican City') selected @endif>
                                                                    Vatican City </option>
                                                                <option value="Venezuela"
                                                                    @if ($currency[$key] == 'Venezuela') selected @endif>
                                                                    Venezuela </option>
                                                                <option value="Vietnam"
                                                                    @if ($currency[$key] == 'Vietnam') selected @endif>
                                                                    Vietnam </option>
                                                                <option value="Yemen"
                                                                    @if ($currency[$key] == 'Yemen') selected @endif>
                                                                    Yemen </option>
                                                                <option value="Zambia"
                                                                    @if ($currency[$key] == 'Zambia') selected @endif>
                                                                    Zambia </option>
                                                                <option value="Zimbabwe"
                                                                    @if ($currency[$key] == 'Zimbabwe') selected @endif>
                                                                    Zimbabwe </option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control fs-14 h-50px"
                                                                value="{{ $salary[$key] }}" placeholder="Enter salary"
                                                                id="" name="salary[]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                                    <textarea class="form-control fs-14" name="description[]">{{ $description[$key] }}</textarea>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="row row-cols-1 mt-3 clone" id="">
                                            <div class="col-lg-12 text-end">
                                                <a class="remove">-</a>
                                            </div>
                                            <div class="col">
                                                <label for=""
                                                    class="form-label fs-14 text-theme-primary fw-bold">Employer*</label>
                                                <input type="text" class="form-control fs-14 h-50px" id=""
                                                    name="company_name[]" required>
                                            </div>
                                            <div class="col">
                                                <label for=""
                                                    class="form-label fs-14 text-theme-primary fw-bold">Designation*</label>
                                                <input type="text" class="form-control fs-14 h-50px" id=""
                                                    name="designation[]" required>
                                            </div>

                                            <div class="col">
                                                <label for=""
                                                    class="form-label fs-14 text-theme-primary fw-bold">Employer
                                                    Location*</label>
                                                <select id="role" class="form-select fs-14  h-50px"
                                                    name="Employer_Location[]" required>
                                                    <option selected disabled value="">Select Country</option>
                                                    <option value="Afghanistan">Afghanistan</option>
                                                    <option value="Albania">Albania</option>
                                                    <option value="Algeria">Algeria</option>
                                                    <option value="Andorra">Andorra</option>
                                                    <option value="Angola">Angola</option>
                                                    <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                                                    <option value="Argentina">Argentina</option>
                                                    <option value="Armenia">Armenia</option>
                                                    <option value="Australia">Australia</option>
                                                    <option value="Austria">Austria</option>
                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                    <option value="Bahamas">Bahamas</option>
                                                    <option value="Bahrain">Bahrain</option>
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="Barbados">Barbados</option>
                                                    <option value="Belarus">Belarus</option>
                                                    <option value="Belgium">Belgium</option>
                                                    <option value="Belize">Belize</option>
                                                    <option value="Benin">Benin</option>
                                                    <option value="Bhutan">Bhutan</option>
                                                    <option value="Bolivia">Bolivia</option>
                                                    <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                                                    <option value="Botswana">Botswana</option>
                                                    <option value="Brazil">Brazil</option>
                                                    <option value="Brunei">Brunei</option>
                                                    <option value="Bulgaria">Bulgaria</option>
                                                    <option value="Burkina Faso">Burkina Faso</option>
                                                    <option value="Burundi">Burundi</option>
                                                    <option value="Cabo Verde">Cabo Verde</option>
                                                    <option value="Cambodia">Cambodia</option>
                                                    <option value="Cameroon">Cameroon</option>
                                                    <option value="Canada">Canada</option>
                                                    <option value="Central African Republic">Central African Republic
                                                    </option>
                                                    <option value="Chad">Chad</option>
                                                    <option value="Chile">Chile</option>
                                                    <option value="China">China</option>
                                                    <option value="Colombia">Colombia</option>
                                                    <option value="Comoros">Comoros</option>
                                                    <option value="Congo (Congo-Brazzaville)">Congo (Congo-Brazzaville)
                                                    </option>
                                                    <option value="Costa Rica">Costa Rica</option>
                                                    <option value="Croatia">Croatia</option>
                                                    <option value="Cuba">Cuba</option>
                                                    <option value="Cyprus">Cyprus</option>
                                                    <option value="Czechia (Czech Republic)">Czechia (Czech Republic)
                                                    </option>
                                                    <option value="Democratic Republic of the Congo (Congo-Kinshasa)">
                                                        Democratic Republic of the Congo (Congo-Kinshasa)</option>
                                                    <option value="Denmark">Denmark</option>
                                                    <option value="Djibouti">Djibouti</option>
                                                    <option value="Dominica">Dominica</option>
                                                    <option value="Dominican Republic">Dominican Republic</option>
                                                    <option value="East Timor (Timor-Leste)">East Timor (Timor-Leste)
                                                    </option>
                                                    <option value="Ecuador">Ecuador</option>
                                                    <option value="Egypt">Egypt</option>
                                                    <option value="El Salvador">El Salvador</option>
                                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                    <option value="Eritrea">Eritrea</option>
                                                    <option value="Estonia">Estonia</option>
                                                    <option value="Eswatini (formerly Swaziland)">Eswatini (formerly
                                                        Swaziland)</option>
                                                    <option value="Ethiopia">Ethiopia</option>
                                                    <option value="Fiji">Fiji</option>
                                                    <option value="Finland">Finland</option>
                                                    <option value="France">France</option>
                                                    <option value="Gabon">Gabon</option>
                                                    <option value="Gambia">Gambia</option>
                                                    <option value="Georgia">Georgia</option>
                                                    <option value="Germany">Germany</option>
                                                    <option value="Ghana">Ghana</option>
                                                    <option value="Greece">Greece</option>
                                                    <option value="Grenada">Grenada</option>
                                                    <option value="Guatemala">Guatemala</option>
                                                    <option value="Guinea">Guinea</option>
                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                    <option value="Guyana">Guyana</option>
                                                    <option value="Haiti">Haiti</option>
                                                    <option value="Honduras">Honduras</option>
                                                    <option value="Hungary">Hungary</option>
                                                    <option value="Iceland">Iceland</option>
                                                    <option value="India">India</option>
                                                    <option value="Indonesia">Indonesia</option>
                                                    <option value="Iran">Iran</option>
                                                    <option value="Iraq">Iraq</option>
                                                    <option value="Ireland">Ireland</option>
                                                    <option value="Israel">Israel</option>
                                                    <option value="Italy">Italy</option>
                                                    <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte d'Ivoire)
                                                    </option>
                                                    <option value="Jamaica">Jamaica</option>
                                                    <option value="Japan">Japan</option>
                                                    <option value="Jordan">Jordan</option>
                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                    <option value="Kenya">Kenya</option>
                                                    <option value="Kiribati">Kiribati</option>
                                                    <option value="Kosovo">Kosovo</option>
                                                    <option value="Kuwait">Kuwait</option>
                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                    <option value="Laos">Laos</option>
                                                    <option value="Latvia">Latvia</option>
                                                    <option value="Lebanon">Lebanon</option>
                                                    <option value="Lesotho">Lesotho</option>
                                                    <option value="Liberia">Liberia</option>
                                                    <option value="Libya">Libya</option>
                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                    <option value="Lithuania">Lithuania</option>
                                                    <option value="Luxembourg">Luxembourg</option>
                                                    <option value="Madagascar">Madagascar</option>
                                                    <option value="Malawi">Malawi</option>
                                                    <option value="Malaysia">Malaysia</option>
                                                    <option value="Maldives">Maldives</option>
                                                    <option value="Mali">Mali</option>
                                                    <option value="Malta">Malta</option>
                                                    <option value="Marshall Islands">Marshall Islands</option>
                                                    <option value="Mauritania">Mauritania</option>
                                                    <option value="Mauritius">Mauritius</option>
                                                    <option value="Mexico">Mexico</option>
                                                    <option value="Micronesia">Micronesia</option>
                                                    <option value="Moldova">Moldova</option>
                                                    <option value="Monaco">Monaco</option>
                                                    <option value="Mongolia">Mongolia</option>
                                                    <option value="Montenegro">Montenegro</option>
                                                    <option value="Morocco">Morocco</option>
                                                    <option value="Mozambique">Mozambique</option>
                                                    <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                                    <option value="Namibia">Namibia</option>
                                                    <option value="Nauru">Nauru</option>
                                                    <option value="Nepal">Nepal</option>
                                                    <option value="Netherlands">Netherlands</option>
                                                    <option value="New Zealand">New Zealand</option>
                                                    <option value="Nicaragua">Nicaragua</option>
                                                    <option value="Niger">Niger</option>
                                                    <option value="Nigeria">Nigeria</option>
                                                    <option value="North Macedonia (formerly Macedonia)">North Macedonia
                                                        (formerly Macedonia)</option>
                                                    <option value="Norway">Norway</option>
                                                    <option value="Oman">Oman</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="Palau">Palau</option>
                                                    <option value="Palestine State">Palestine State</option>
                                                    <option value="Panama">Panama</option>
                                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                                    <option value="Paraguay">Paraguay</option>
                                                    <option value="Peru">Peru</option>
                                                    <option value="Philippines">Philippines</option>
                                                    <option value="Poland">Poland</option>
                                                    <option value="Portugal">Portugal</option>
                                                    <option value="Qatar">Qatar</option>
                                                    <option value="Romania">Romania</option>
                                                    <option value="Russia">Russia</option>
                                                    <option value="Rwanda">Rwanda</option>
                                                    <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                                                    <option value="Saint Lucia">Saint Lucia</option>
                                                    <option value="Saint Vincent and the Grenadines">Saint Vincent and the
                                                        Grenadines</option>
                                                    <option value="Samoa">Samoa</option>
                                                    <option value="San Marino">San Marino</option>
                                                    <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                                    <option value="Senegal">Senegal</option>
                                                    <option value="Serbia">Serbia</option>
                                                    <option value="Seychelles">Seychelles</option>
                                                    <option value="Sierra Leone">Sierra Leone</option>
                                                    <option value="Singapore">Singapore</option>
                                                    <option value="Slovakia">Slovakia</option>
                                                    <option value="Slovenia">Slovenia</option>
                                                    <option value="Solomon Islands">Solomon Islands</option>
                                                    <option value="Somalia">Somalia</option>
                                                    <option value="South Africa">South Africa</option>
                                                    <option value="South Korea">South Korea</option>
                                                    <option value="South Sudan">South Sudan</option>
                                                    <option value="Spain">Spain</option>
                                                    <option value="Sri Lanka">Sri Lanka</option>
                                                    <option value="Sudan">Sudan</option>
                                                    <option value="Suriname">Suriname</option>
                                                    <option value="Sweden">Sweden</option>
                                                    <option value="Switzerland">Switzerland</option>
                                                    <option value="Syria">Syria</option>
                                                    <option value="Taiwan">Taiwan</option>
                                                    <option value="Tajikistan">Tajikistan</option>
                                                    <option value="Tanzania">Tanzania</option>
                                                    <option value="Thailand">Thailand</option>
                                                    <option value="Togo">Togo</option>
                                                    <option value="Tonga">Tonga</option>
                                                    <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                                                    <option value="Tunisia">Tunisia</option>
                                                    <option value="Turkey">Turkey</option>
                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                    <option value="Tuvalu">Tuvalu</option>
                                                    <option value="Uganda">Uganda</option>
                                                    <option value="Ukraine">Ukraine</option>
                                                    <option value="United Arab Emirates">United Arab Emirates</option>
                                                    <option value="United Kingdom">United Kingdom</option>
                                                    <option value="United States of America">United States of America
                                                    </option>
                                                    <option value="Uruguay">Uruguay</option>
                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                    <option value="Vanuatu">Vanuatu</option>
                                                    <option value="Vatican City">Vatican City</option>
                                                    <option value="Venezuela">Venezuela</option>
                                                    <option value="Vietnam">Vietnam</option>
                                                    <option value="Yemen">Yemen</option>
                                                    <option value="Zambia">Zambia</option>
                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                </select>
                                            </div>
                                            <div class="col">
                                                <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                                    Total Work Experience*
                                                </label>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" name="year_exp[]"
                                                        onchange='changeToDate(0)' value="0"
                                                        id="currentlyWorkHere0">
                                                    <label class="form-check-label fs-14" for="currentlyWorkHere0">
                                                        Currently Working Here
                                                    </label>
                                                </div>

                                                <div class="d-md-flex align-items-center ">
                                                    <div class="">
                                                        <span class="form-label fs-14 text-theme-primary fw-bold">Start
                                                            Date</span>
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control datepicker fs-14 h-50px w-100"
                                                                placeholder="dd-mm-yyyy" autocomplete="off"
                                                                id='startDate0' name="month_exp[]" required readonly>
                                                            <label class="calender-icon d-block" for="startDate0">
                                                                <i class="far fa-calendar-alt"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div id='toDate0' class="to-date-div">
                                                        <div class='mx-md-4 mt-md-3 py-1 py-md-0'>
                                                            -To-
                                                        </div>
                                                        <div class="" >
                                                            <span class="form-label fs-14 text-theme-primary fw-bold">End
                                                                Date</span>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control datepicker fs-14 h-50px w-100"
                                                                    placeholder="dd-mm-yyyy" autocomplete="off"
                                                                    name="year_exp[]" required readonly>
                                                                <label class="calender-icon d-block" for="toDate0">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="mt-3 ms-3" id='presentText0' style="display: none;">
                                                        Present
                                                    </div>
                                                </div>  
                                            </div>

                                            <div class="col">
                                                <label for="" class="form-label fs-14 text-theme-primary fw-bold">
                                                    Monthly Salary*
                                                </label>
                                                <div class="row row-cols-lg-4 row-cols-1">
                                                    <div class="col">
                                                        <select id="role" class="form-select fs-14  h-50px"
                                                            name="currency[]" required>
                                                            <option selected disabled value="">Select Currency
                                                            </option>
                                                            <option value="Afghanistan">Afghanistan</option>
                                                            </option>
                                                            <option value="Albania">Albania</option>
                                                            <option value="Algeria">Algeria</option>
                                                            <option value="Andorra">Andorra</option>
                                                            <option value="Angola">Angola</option>
                                                            <option value="Antigua and Barbuda">Antigua and Barbuda
                                                            </option>
                                                            <option value="Argentina">Argentina</option>
                                                            <option value="Armenia">Armenia</option>
                                                            <option value="Australia">Australia</option>
                                                            <option value="Austria">Austria</option>
                                                            <option value="Azerbaijan">Azerbaijan</option>
                                                            <option value="Bahamas">Bahamas</option>
                                                            <option value="Bahrain">Bahrain</option>
                                                            <option value="Bangladesh">Bangladesh</option>
                                                            <option value="Barbados">Barbados</option>
                                                            <option value="Belarus">Belarus</option>
                                                            <option value="Belgium">Belgium</option>
                                                            <option value="Belize">Belize</option>
                                                            <option value="Benin">Benin</option>
                                                            <option value="Bhutan">Bhutan</option>
                                                            <option value="Bolivia">Bolivia</option>
                                                            <option value="Bosnia and Herzegovina">Bosnia and Herzegovina
                                                            </option>
                                                            <option value="Botswana">Botswana</option>
                                                            <option value="Brazil">Brazil</option>
                                                            <option value="Brunei">Brunei</option>
                                                            <option value="Bulgaria">Bulgaria</option>
                                                            <option value="Burkina Faso">Burkina Faso</option>
                                                            <option value="Burundi">Burundi</option>
                                                            <option value="Cabo Verde">Cabo Verde</option>
                                                            <option value="Cambodia">Cambodia</option>
                                                            <option value="Cameroon">Cameroon</option>
                                                            <option value="Canada">Canada</option>
                                                            <option value="Central African Republic">Central African
                                                                Republic</option>
                                                            <option value="Chad">Chad</option>
                                                            <option value="Chile">Chile</option>
                                                            <option value="China">China</option>
                                                            <option value="Colombia">Colombia</option>
                                                            <option value="Comoros">Comoros</option>
                                                            <option value="Congo (Congo-Brazzaville)">Congo
                                                                (Congo-Brazzaville)</option>
                                                            <option value="Costa Rica">Costa Rica</option>
                                                            <option value="Croatia">Croatia</option>
                                                            <option value="Cuba">Cuba</option>
                                                            <option value="Cyprus">Cyprus</option>
                                                            <option value="Czechia (Czech Republic)">Czechia (Czech
                                                                Republic)</option>
                                                            <option
                                                                value="Democratic Republic of the Congo (Congo-Kinshasa)">
                                                                Democratic Republic of the Congo (Congo-Kinshasa)</option>
                                                            <option value="Denmark">Denmark</option>
                                                            <option value="Djibouti">Djibouti</option>
                                                            <option value="Dominica">Dominica</option>
                                                            <option value="Dominican Republic">Dominican Republic</option>
                                                            <option value="East Timor (Timor-Leste)">East Timor
                                                                (Timor-Leste)</option>
                                                            <option value="Ecuador">Ecuador</option>
                                                            <option value="Egypt">Egypt</option>
                                                            <option value="El Salvador">El Salvador</option>
                                                            <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                            <option value="Eritrea">Eritrea</option>
                                                            <option value="Estonia">Estonia</option>
                                                            <option value="Eswatini (formerly Swaziland)">Eswatini
                                                                (formerly Swaziland)</option>
                                                            <option value="Ethiopia">Ethiopia</option>
                                                            <option value="Fiji">Fiji</option>
                                                            <option value="Finland">Finland</option>
                                                            <option value="France">France</option>
                                                            <option value="Gabon">Gabon</option>
                                                            <option value="Gambia">Gambia</option>
                                                            <option value="Georgia">Georgia</option>
                                                            <option value="Germany">Germany</option>
                                                            <option value="Ghana">Ghana</option>
                                                            <option value="Greece">Greece</option>
                                                            <option value="Grenada">Grenada</option>
                                                            <option value="Guatemala">Guatemala</option>
                                                            <option value="Guinea">Guinea</option>
                                                            <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                            <option value="Guyana">Guyana</option>
                                                            <option value="Haiti">Haiti</option>
                                                            <option value="Honduras">Honduras</option>
                                                            <option value="Hungary">Hungary</option>
                                                            <option value="Iceland">Iceland</option>
                                                            <option value="India">India</option>
                                                            <option value="Indonesia">Indonesia</option>
                                                            <option value="Iran">Iran</option>
                                                            <option value="Iraq">Iraq</option>
                                                            <option value="Ireland">Ireland</option>
                                                            <option value="Israel">Israel</option>
                                                            <option value="Italy">Italy</option>
                                                            <option value="Ivory Coast (Côte d'Ivoire)">Ivory Coast (Côte
                                                                d'Ivoire)</option>
                                                            <option value="Jamaica">Jamaica</option>
                                                            <option value="Japan">Japan</option>
                                                            <option value="Jordan">Jordan</option>
                                                            <option value="Kazakhstan">Kazakhstan</option>
                                                            <option value="Kenya">Kenya</option>
                                                            <option value="Kiribati">Kiribati</option>
                                                            <option value="Kosovo">Kosovo</option>
                                                            <option value="Kuwait">Kuwait</option>
                                                            <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                            <option value="Laos">Laos</option>
                                                            <option value="Latvia">Latvia</option>
                                                            <option value="Lebanon">Lebanon</option>
                                                            <option value="Lesotho">Lesotho</option>
                                                            <option value="Liberia">Liberia</option>
                                                            <option value="Libya">Libya</option>
                                                            <option value="Liechtenstein">Liechtenstein</option>
                                                            <option value="Lithuania">Lithuania</option>
                                                            <option value="Luxembourg">Luxembourg</option>
                                                            <option value="Madagascar">Madagascar</option>
                                                            <option value="Malawi">Malawi</option>
                                                            <option value="Malaysia">Malaysia</option>
                                                            <option value="Maldives">Maldives</option>
                                                            <option value="Mali">Mali</option>
                                                            <option value="Malta">Malta</option>
                                                            <option value="Marshall Islands">Marshall Islands</option>
                                                            <option value="Mauritania">Mauritania</option>
                                                            <option value="Mauritius">Mauritius</option>
                                                            <option value="Mexico">Mexico</option>
                                                            <option value="Micronesia">Micronesia</option>
                                                            <option value="Moldova">Moldova</option>
                                                            <option value="Monaco">Monaco</option>
                                                            <option value="Mongolia">Mongolia</option>
                                                            <option value="Montenegro">Montenegro</option>
                                                            <option value="Morocco">Morocco</option>
                                                            <option value="Mozambique">Mozambique</option>
                                                            <option value="Myanmar (Burma)">Myanmar (Burma)</option>
                                                            <option value="Namibia">Namibia</option>
                                                            <option value="Nauru">Nauru</option>
                                                            <option value="Nepal">Nepal</option>
                                                            <option value="Netherlands">Netherlands</option>
                                                            <option value="New Zealand">New Zealand</option>
                                                            <option value="Nicaragua">Nicaragua</option>
                                                            <option value="Niger">Niger</option>
                                                            <option value="Nigeria">Nigeria</option>
                                                            <option value="North Macedonia (formerly Macedonia)">North
                                                                Macedonia (formerly Macedonia)</option>
                                                            <option value="Norway">Norway</option>
                                                            <option value="Oman">Oman</option>
                                                            <option value="Pakistan">Pakistan</option>
                                                            <option value="Palau">Palau</option>
                                                            <option value="Palestine State">Palestine State</option>
                                                            <option value="Panama">Panama</option>
                                                            <option value="Papua New Guinea">Papua New Guinea</option>
                                                            <option value="Paraguay">Paraguay</option>
                                                            <option value="Peru">Peru</option>
                                                            <option value="Philippines">Philippines</option>
                                                            <option value="Poland">Poland</option>
                                                            <option value="Portugal">Portugal</option>
                                                            <option value="Qatar">Qatar</option>
                                                            <option value="Romania">Romania</option>
                                                            <option value="Russia">Russia</option>
                                                            <option value="Rwanda">Rwanda</option>
                                                            <option value="Saint Kitts and Nevis">Saint Kitts and Nevis
                                                            </option>
                                                            <option value="Saint Lucia">Saint Lucia</option>
                                                            <option value="Saint Vincent and the Grenadines">Saint Vincent
                                                                and the Grenadines</option>
                                                            <option value="Samoa">Samoa</option>
                                                            <option value="San Marino">San Marino</option>
                                                            <option value="Sao Tome and Principe">Sao Tome and Principe
                                                            </option>
                                                            <option value="Saudi Arabia">Saudi Arabia</option>
                                                            <option value="Senegal">Senegal</option>
                                                            <option value="Serbia">Serbia</option>
                                                            <option value="Seychelles">Seychelles</option>
                                                            <option value="Sierra Leone">Sierra Leone</option>
                                                            <option value="Singapore">Singapore</option>
                                                            <option value="Slovakia">Slovakia</option>
                                                            <option value="Slovenia">Slovenia</option>
                                                            <option value="Solomon Islands">Solomon Islands</option>
                                                            <option value="Somalia">Somalia</option>
                                                            <option value="South Africa">South Africa</option>
                                                            <option value="South Korea">South Korea</option>
                                                            <option value="South Sudan">South Sudan</option>
                                                            <option value="Spain">Spain</option>
                                                            <option value="Sri Lanka">Sri Lanka</option>
                                                            <option value="Sudan">Sudan</option>
                                                            <option value="Suriname">Suriname</option>
                                                            <option value="Sweden">Sweden</option>
                                                            <option value="Switzerland">Switzerland</option>
                                                            <option value="Syria">Syria</option>
                                                            <option value="Taiwan">Taiwan</option>
                                                            <option value="Tajikistan">Tajikistan</option>
                                                            <option value="Tanzania">Tanzania</option>
                                                            <option value="Thailand">Thailand</option>
                                                            <option value="Togo">Togo</option>
                                                            <option value="Tonga">Tonga</option>
                                                            <option value="Trinidad and Tobago">Trinidad and Tobago
                                                            </option>
                                                            <option value="Tunisia">Tunisia</option>
                                                            <option value="Turkey">Turkey</option>
                                                            <option value="Turkmenistan">Turkmenistan</option>
                                                            <option value="Tuvalu">Tuvalu</option>
                                                            <option value="Uganda">Uganda</option>
                                                            <option value="Ukraine">Ukraine</option>
                                                            <option value="United Arab Emirates">United Arab Emirates
                                                            </option>
                                                            <option value="United Kingdom">United Kingdom</option>
                                                            <option value="United States of America">United States of
                                                                America</option>
                                                            <option value="Uruguay">Uruguay</option>
                                                            <option value="Uzbekistan">Uzbekistan</option>
                                                            <option value="Vanuatu">Vanuatu</option>
                                                            <option value="Vatican City">Vatican City</option>
                                                            <option value="Venezuela">Venezuela</option>
                                                            <option value="Vietnam">Vietnam</option>
                                                            <option value="Yemen">Yemen</option>
                                                            <option value="Zambia">Zambia</option>
                                                            <option value="Zimbabwe">Zimbabwe</option>
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <input type="text" class="form-control fs-14 h-50px"
                                                            placeholder="Enter salary" id="" name="salary[]"
                                                            required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col">
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
                                    @endif
                                </div>
                            </fieldset>
                            <fieldset>
                                <div class="row row-cols-1">
                                    <div class="col">
                                        <h2 class="fs-4 text-theme-primary text-uppercase fw-bold pb-3">Key Skills*</h2>
                                    </div>
                                    <div class="col edit-skills-select">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Talk
                                            about your professional strengths, skills you will apply to work</label>
                                        <select id="role" class="editSkills form-control fs-14 h-50px"
                                            name="skills[]" multiple='multiple' required>
                                            <option disabled>Select Skills</option>
                                            @foreach ($skill as $row)
                                                <option value="{{ $row->id }}"
                                                    @if ($candSkills != null) @foreach ($candSkills as $ca) @if ($row->id == $ca->skill_id)
                                                    Selected @endif
                                                    @endforeach
                                            @endif>{{ $row->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row justify-content-center pt-5">
                                    <div class="col-lg-5 text-center">
                                        <button class="next action-button default-btn">
                                            Next
                                        </button>
                                        <br />
                                        <br />
                                        <a href="{{ route('candidates.details') }}" class="fs-6 fw-normal">
                                            << Go Back</a>
                                    </div>
                                </div>
                            </fieldset>
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

        // function callModal(id) {
        //     console.log(id);
        //     var href = '{{ route('candidates.profession.delete', '') }}';
        //     newhref = href + '/' + id;
        //     $('#delete-edu').attr('href', newhref);
        //     Swal.fire({
        //             title: 'Are you sure?',
        //             text: "Do you really want to delete?",
        //             // text: "Do you really want to delete?",
        //             icon: 'error',
        //             iconColor: '#64262f',
        //             showCancelButton: true,
        //             confirmButtonColor: '#007ba7',
        //             cancelButtonColor: '#64262f',
        //             customClass: "delete-sweet-alert",
        //             confirmButtonText: "<a class='text-white' id='delete-edu' href='{{ route('candidates.profession.delete', '') }}/" +
        //                 id +
        //                 "'>Yes</a>",
        //             cancelButtonText: 'No',
        //         })
        //         .then((result) => {
        //             if (result.isConfirmed) {
        //                 Swal.fire(
        //                     'Deleted!',
        //                     'Your file has been deleted.',
        //                     'success',
        //                 )
        //             }

        //         })
        // }
    </script>
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
    </script>
@endsection
