@extends('candidatepanel.layout.app')

@section('page_title', 'E-Rec')

@section('head_style')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
@endsection

@section('content')
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            @if (session($key ?? 'error'))
                <div class="alert alert-danger" role="alert">
                    {!! session($key ?? 'error') !!}
                </div>
            @endif

            {{-- start personal detail info --}}
            <div class="mb-4 pb-4 border-bottom">
                <form id="firstform">
                    @csrf
                    <input type="hidden" name="source" value="api" />
                    <div class="d-flex aling-items-center justify-content-between mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Personal Details</h2>
                        <div>
                            <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Info" id="editPersonalInfo" href="javascript:;">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Update" id="savePersonalInfo" style="display: none;">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Cancel" id="cancelPersonalInfo" style="display: none;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>

                    </div>
                    <div class="row gy-3 personal-detail">
                        <div class="col-md-6">
                            <label for="firstName" class="form-label fs-14 text-theme-primary">First Name</label>
                            <input disabled type="text" class="form-control" name="first_name"
                                value="{{ $user->first_name }}" id="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label fs-14 text-theme-primary">Last Name</label>
                            <input disabled type="text" class="form-control" name="last_name"
                                value="{{ $user->last_name }}" id="lastName">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label fs-14 text-theme-primary">Gender</label>
                            <div class="gender-show" style="font-size: 15px; color: #92929d;">
                                @if ($user->gender == 'Male')
                                    Male
                                @elseif ($user->gender == 'Female')
                                    Female
                                @endif
                            </div>
                            <div class="gender-edit " style="display: none;">
                                <select id="gender" class="form-select" name="gender">
                                    <option value="Male" @if ($user->gender == 'Male') selected @endif>Male</option>
                                    <option value="Female" @if ($user->gender == 'Female') selected @endif>Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dateOfBirth" class="form-label fs-14 text-theme-primary">Date Of Birth</label>
                            <div class="position-relative">
                                <input disabled type="text" value="{{ $user->dob }}" name="dob"
                                    class="form-control datepicker bg_transparent_disable" placeholder="15-Dec-2000"
                                    id="dateOfBirth" readonly>
                                <label class="calender-icon-2 " for="dateOfBirth" style="display: none;">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="tagline" class="form-label fs-14 text-theme-primary">Tag line</label>
                            <textarea disabled id="tagline" maxlength="150" class="form-control" name="tagline">{!! $user->tagline !!}</textarea>
                            <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                    id="taglineChars"></span>
                                Character(s)
                                Remaining</div>
                        </div>
                        <div class="col-12">
                            <label for="aboutText" class="form-label fs-14 text-theme-primary">About</label>
                            <textarea disabled id="aboutText" maxlength="500" class="form-control" name="head_line">{!! $user->head_line !!}</textarea>
                            <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                    id="aboutTextChars"></span>
                                Character(s)
                                Remaining</div>
                        </div>
                    </div>
                </form>
            </div>
            {{-- end personal detail info --}}
            {{-- start Skills detail info --}}
            <div class="mb-4 pb-4 border-bottom">
                <form id="skillsForm">
                    @csrf
                    <div id="skills">
                        <div class="d-flex aling-items-center mb-4">
                            <h2 class="fw-500 text_primary fs-5 align-self-center me-auto">Skills</h2>
                            <a href="javascript:;" class="text_grey_999 editSkill" role="button"
                                data-bs-toggle="tooltip" data-bs-placement="top" title="Edit Info">
                                <i class="fa-solid fa-pencil "></i>
                            </a>
                            <div class="" style='display: none' id='skills-save'>
                                <button type="submit" data-bs-toggle="tooltip" data-bs-placement="top" title="Ubdate"
                                    class="text_grey_999 border-0 bg-transparent p-0 me-2"><i
                                        class="fas fa-check"></i></button>
                            </div>
                            <div class="" style='display: none;' id='skills-cancel'>
                                <button type="button" data-bs-toggle="tooltip" data-bs-placement="top" title="Cancel"
                                    class="text_grey_999 border-0 bg-transparent p-0"><i
                                        class="fa-solid fa-xmark"></i></button>
                            </div>
                        </div>
                        <input type="hidden" name="source" value="api" />
                        <input type="hidden" value="{{ $userCs->skills }}" id="skills-hidden-input" />
                        <input type="hidden" value="{{ $skill }}" id="skills-all-hidden-input" />
                        <ul class="tags text">
                            @if (isset(auth()->user()->skills))

                                @foreach ($userCs->skills as $row)
                                    <li>
                                        <a href="javascript:void 0;" return false;">{{ $row->name }}</a>
                                    </li>
                                @endforeach
                            @endif
                        </ul>
                        <div class="txt-editor">
                            <select name="skills[]" class="select2-multiple form-control skilled-select__2"
                                id="select2" multiple>
                                @foreach ($skill as $item)
                                    <option value="{{ $item->id }}"
                                        @foreach ($userCs->skills as $row) @if ($item->id == $row->id) selected @endif @endforeach>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="text-center mt-4">
                            <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i class="fas fa-check"></i></button>
                        </div> --}}
                        {{-- <button type="submit" class="btn_theme_3 fs-14 px-4 py-2 d-inline-block "><i
                                class="fas fa-check"></i></button> --}}
                    </div>
                </form>
            </div>
            {{-- end Skills detail info --}}

            {{-- start Contact Details info --}}
            <div class="mb-4 pb-4 border-bottom">
                <form id="secondform">
                    @csrf
                    <input type="hidden" name="source" value="api" />
                    <div class="d-flex aling-items-center justify-content-between mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Contact Details</h2>
                        <div>
                            <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Info" id="editContactDetail" href="javascript:;">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Update" id="saveContactDetail" style="display: none;">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Cancel" id="cancelContactDetail" style="display: none;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row gy-3 contact-detail">
                        <div class="col-md-6">
                            <label for="contactNumber" class="form-label fs-14 text-theme-primary">Contact Number</label>
                            <div class="contact-number-text" style="font-size: 15px; color: #92929d;">
                                <span class="country-code">{{ $user->country_code }}</span> <span
                                    class="contact-number">{{ $user->number }}</span>
                            </div>
                            <div class="edit-phone-number" style="display: none;">
                                <div class="single-field full-width phone-input-flag d-flex ">
                                    <input type="tel" class="mobile-number form-control fs-14 h-50px"
                                        style="color: transparent;" id="countryCode" name="country_code"
                                        value="{{ $user->country_code }}">
                                    <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                                        placeholder="Phone Number" id="contactNumber" maxlength="11" name="number"
                                        value="{{ $user->number }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label fs-14 text-theme-primary">Email</label>
                            <input type="email" class="form-control" id="emailAddress" name="email"
                                value="{{ $user->email }}" disabled readonly>
                        </div>
                        {{-- <div class="col-md-6">
                            <label for="address" class="form-label fs-14 text-theme-primary">Address</label>
                            <input type="text" class="form-control searchInput" id="address" name="address"
                                value="{{ $user->address }}" required autocomplete="off" disabled>
                            <input type="hidden" id="Lat" value="{{ $user->latitude }}" name="Lat" />
                            <input type="hidden" id="Lng" value="{{ $user->longitude }}" name="Lng" />
                        </div>
                        <div class="col-md-6">
                            <label for="country" class="form-label fs-14 text-theme-primary">Country</label>
                            <input type="email" class="form-control" id="country" value="{{ $user->country }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="city" class="form-label fs-14 text-theme-primary">City</label>
                            <input type="email" class="form-control" id="city" value="{{ $user->city }}" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="zipCode" class="form-label fs-14 text-theme-primary">Zip Code</label>
                            <input type="email" class="form-control" id="zipCode" name="zipCode"
                                value="{{ $user->zipCode }}" disabled>
                        </div> --}}
                        <div class="col-md-6">
                            <label for="" class="form-label fs-14 text-theme-primary">Street
                                Address *</label>
                            <input id="searchInput" value="{{ $user->address }}"
                                class="controls form-control input-login searchInput" name="address" type="text"
                                placeholder="" required autocomplete="off" disabled>
                            <input type="hidden" id="latitude" value="{{ $user->latitude }}" name="lat" />
                            <input type="hidden" id="longitude" value="{{ $user->longitude }}" name="lng" />

                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label fs-14 text-theme-primary">Country</label>
                            <input type="text" class="form-control input-login" id="country" name="country"
                                value="{{ $user->country }}" placeholder="" required disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label fs-14 text-theme-primary">City</label>
                            <input type="text" class="form-control input-login" id="city" name="city"
                                placeholder="" value="{{ $user->city }}" required disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="zip_code" class="form-label fs-14 text-theme-primary">Zip/Postal
                                Code</label>
                            <input type="text" class="form-control input-login" value="{{ $user->zipCode }}"
                                id="zip_code" name="postal_code" placeholder="" disabled>
                        </div>
                    </div>
                </form>
            </div>
            {{-- start Contact Details info --}}

            {{-- start others detail  --}}
            <div class="mb-4 pb-4 border-bottom">
                <form id="thirdform">
                    @csrf
                    <input type="hidden" name="source" value="api" />
                    <div class="d-flex aling-items-center justify-content-between mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Other Details</h2>
                        <div>
                            <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Info" id="editOtherDetail" href="javascript:;">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Update" id="saveOtherDetail" style="display: none;">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Cancel" id="cancelOtherDetail" style="display: none;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <input type="hidden" name="languagesHidden" value="languagesHidden">
                    <div class="row gy-3 others-detail">
                        <div class="col-md-6">
                            <label for="nationality" class="form-label fs-14 text-theme-primary">Nationality </label>
                            <div class="nationality-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->nationality }}
                            </div>
                            <div class="nationality-edit" style="display: none;">
                                <select id="nationality" class="form-select" name="nationality">
                                    <option disabled>Please Select Nationality</option>
                                    <option value="Afghanistan" @if ($user->nationality == 'Afghanistan') selected @endif>
                                        Afghanistan </option>
                                    <option value="Albania" @if ($user->nationality == 'Albania') selected @endif> Albania
                                    </option>
                                    <option value="Algeria" @if ($user->nationality == 'Algeria') selected @endif> Algeria
                                    </option>
                                    <option value="Andorra" @if ($user->nationality == 'Andorra') selected @endif> Andorra
                                    </option>
                                    <option value="Angola" @if ($user->nationality == 'Angola') selected @endif> Angola
                                    </option>
                                    <option value="Antigua and Barbuda" @if ($user->nationality == 'Antigua and Barbuda') selected @endif>
                                        Antigua and Barbuda </option>
                                    <option value="Argentina" @if ($user->nationality == 'Argentina') selected @endif> Argentina
                                    </option>
                                    <option value="Armenia" @if ($user->nationality == 'Armenia') selected @endif> Armenia
                                    </option>
                                    <option value="Australia" @if ($user->nationality == 'Australia') selected @endif>
                                        Australia </option>
                                    <option value="Austria" @if ($user->nationality == 'Austria') selected @endif> Austria
                                    </option>
                                    <option value="Azerbaijan" @if ($user->nationality == 'Azerbaijan') selected @endif>
                                        Azerbaijan </option>
                                    <option value="Bahamas" @if ($user->nationality == 'Bahamas') selected @endif> Bahamas
                                    </option>
                                    <option value="Bahrain" @if ($user->nationality == 'Bahrain') selected @endif> Bahrain
                                    </option>
                                    <option value="Bangladesh" @if ($user->nationality == 'Bangladesh') selected @endif>
                                        Bangladesh </option>
                                    <option value="Barbados" @if ($user->nationality == 'Barbados') selected @endif> Barbados
                                    </option>
                                    <option value="Belarus" @if ($user->nationality == 'Belarus') selected @endif> Belarus
                                    </option>
                                    <option value="Belgium" @if ($user->nationality == 'Belgium') selected @endif> Belgium
                                    </option>
                                    <option value="Belize" @if ($user->nationality == 'Belize') selected @endif> Belize
                                    </option>
                                    <option value="Benin" @if ($user->nationality == 'Benin') selected @endif> Benin
                                    </option>
                                    <option value="Bhutan" @if ($user->nationality == 'Bhutan') selected @endif> Bhutan
                                    </option>
                                    <option value="Bolivia" @if ($user->nationality == 'Bolivia') selected @endif> Bolivia
                                    </option>
                                    <option value="Bosnia and Herzegovina"
                                        @if ($user->nationality == 'Bosnia and Herzegovina') selected @endif> Bosnia and Herzegovina
                                    </option>
                                    <option value="Botswana" @if ($user->nationality == 'Botswana') selected @endif> Botswana
                                    </option>
                                    <option value="Brazil" @if ($user->nationality == 'Brazil') selected @endif> Brazil
                                    </option>
                                    <option value="Brunei" @if ($user->nationality == 'Brunei') selected @endif> Brunei
                                    </option>
                                    <option value="Bulgaria" @if ($user->nationality == 'Bulgaria') selected @endif> Bulgaria
                                    </option>
                                    <option value="Burkina Faso" @if ($user->nationality == 'Burkina Faso') selected @endif>
                                        Burkina Faso </option>
                                    <option value="Burundi" @if ($user->nationality == 'Burundi') selected @endif> Burundi
                                    </option>
                                    <option value="Cabo Verde" @if ($user->nationality == 'Cabo Verde') selected @endif> Cabo
                                        Verde </option>
                                    <option value="Cambodia" @if ($user->nationality == 'Cambodia') selected @endif> Cambodia
                                    </option>
                                    <option value="Cameroon" @if ($user->nationality == 'Cameroon') selected @endif> Cameroon
                                    </option>
                                    <option value="Canada" @if ($user->nationality == 'Canada') selected @endif> Canada
                                    </option>
                                    <option value="Central African Republic"
                                        @if ($user->nationality == 'Central African Republic') selected @endif> Central African Republic
                                    </option>
                                    <option value="Chad" @if ($user->nationality == 'Chad') selected @endif> Chad
                                    </option>
                                    <option value="Chile" @if ($user->nationality == 'Chile') selected @endif> Chile
                                    </option>
                                    <option value="China" @if ($user->nationality == 'China') selected @endif> China
                                    </option>
                                    <option value="Colombia" @if ($user->nationality == 'Colombia') selected @endif> Colombia
                                    </option>
                                    <option value="Comoros" @if ($user->nationality == 'Comoros') selected @endif> Comoros
                                    </option>
                                    <option value="Congo (Congo-Brazzaville)"
                                        @if ($user->nationality == 'Congo (Congo-Brazzaville)') selected @endif> Congo (Congo-Brazzaville)
                                    </option>
                                    <option value="Costa Rica" @if ($user->nationality == 'Costa Rica') selected @endif> Costa
                                        Rica </option>
                                    <option value="Croatia" @if ($user->nationality == 'Croatia') selected @endif> Croatia
                                    </option>
                                    <option value="Cuba" @if ($user->nationality == 'Cuba') selected @endif> Cuba
                                    </option>
                                    <option value="Cyprus" @if ($user->nationality == 'Cyprus') selected @endif> Cyprus
                                    </option>
                                    <option value="Czechia (Czech Republic)"
                                        @if ($user->nationality == 'Czechia (Czech Republic)') selected @endif> Czechia (Czech Republic)
                                    </option>
                                    <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                        @if ($user->nationality == 'Democratic Republic of the Congo (Congo-Kinshasa)') selected @endif> Democratic Republic of the
                                        Congo (Congo-Kinshasa) </option>
                                    <option value="Denmark" @if ($user->nationality == 'Denmark') selected @endif> Denmark
                                    </option>
                                    <option value="Djibouti" @if ($user->nationality == 'Djibouti') selected @endif> Djibouti
                                    </option>
                                    <option value="Dominica" @if ($user->nationality == 'Dominica') selected @endif> Dominica
                                    </option>
                                    <option value="Dominican Republic" @if ($user->nationality == 'Dominican Republic') selected @endif>
                                        Dominican Republic </option>
                                    <option value="East Timor (Timor-Leste)"
                                        @if ($user->nationality == 'East Timor (Timor-Leste)') selected @endif> East Timor (Timor-Leste)
                                    </option>
                                    <option value="Ecuador" @if ($user->nationality == 'Ecuador') selected @endif> Ecuador
                                    </option>
                                    <option value="Egypt" @if ($user->nationality == 'Egypt') selected @endif> Egypt
                                    </option>
                                    <option value="El Salvador" @if ($user->nationality == 'El Salvador') selected @endif> El
                                        Salvador </option>
                                    <option value="Equatorial Guinea" @if ($user->nationality == 'Equatorial Guinea') selected @endif>
                                        Equatorial Guinea </option>
                                    <option value="Eritrea" @if ($user->nationality == 'Eritrea') selected @endif> Eritrea
                                    </option>
                                    <option value="Estonia" @if ($user->nationality == 'Estonia') selected @endif> Estonia
                                    </option>
                                    <option value="Eswatini (formerly Swaziland)"
                                        @if ($user->nationality == 'Eswatini (formerly Swaziland)') selected @endif> Eswatini (formerly Swaziland)
                                    </option>
                                    <option value="Ethiopia" @if ($user->nationality == 'Ethiopia') selected @endif> Ethiopia
                                    </option>
                                    <option value="Fiji" @if ($user->nationality == 'Fiji') selected @endif> Fiji
                                    </option>
                                    <option value="Finland" @if ($user->nationality == 'Finland') selected @endif> Finland
                                    </option>
                                    <option value="France" @if ($user->nationality == 'France') selected @endif> France
                                    </option>
                                    <option value="Gabon" @if ($user->nationality == 'Gabon') selected @endif> Gabon
                                    </option>
                                    <option value="Gambia" @if ($user->nationality == 'Gambia') selected @endif> Gambia
                                    </option>
                                    <option value="Georgia" @if ($user->nationality == 'Georgia') selected @endif> Georgia
                                    </option>
                                    <option value="Germany" @if ($user->nationality == 'Germany') selected @endif> Germany
                                    </option>
                                    <option value="Ghana" @if ($user->nationality == 'Ghana') selected @endif> Ghana
                                    </option>
                                    <option value="Greece" @if ($user->nationality == 'Greece') selected @endif> Greece
                                    </option>
                                    <option value="Grenada" @if ($user->nationality == 'Grenada') selected @endif> Grenada
                                    </option>
                                    <option value="Guatemala" @if ($user->nationality == 'Guatemala') selected @endif>
                                        Guatemala </option>
                                    <option value="Guinea" @if ($user->nationality == 'Guinea') selected @endif> Guinea
                                    </option>
                                    <option value="Guinea-Bissau" @if ($user->nationality == 'Guinea-Bissau') selected @endif>
                                        Guinea-Bissau </option>
                                    <option value="Guyana" @if ($user->nationality == 'Guyana') selected @endif> Guyana
                                    </option>
                                    <option value="Haiti" @if ($user->nationality == 'Haiti') selected @endif> Haiti
                                    </option>
                                    <option value="Honduras" @if ($user->nationality == 'Honduras') selected @endif> Honduras
                                    </option>
                                    <option value="Hungary" @if ($user->nationality == 'Hungary') selected @endif> Hungary
                                    </option>
                                    <option value="Iceland" @if ($user->nationality == 'Iceland') selected @endif> Iceland
                                    </option>
                                    <option value="India" @if ($user->nationality == 'India') selected @endif> India
                                    </option>
                                    <option value="Indonesia" @if ($user->nationality == 'Indonesia') selected @endif>
                                        Indonesia </option>
                                    <option value="Iran" @if ($user->nationality == 'Iran') selected @endif> Iran
                                    </option>
                                    <option value="Iraq" @if ($user->nationality == 'Iraq') selected @endif> Iraq
                                    </option>
                                    <option value="Ireland" @if ($user->nationality == 'Ireland') selected @endif> Ireland
                                    </option>
                                    <option value="Israel" @if ($user->nationality == 'Israel') selected @endif> Israel
                                    </option>
                                    <option value="Italy" @if ($user->nationality == 'Italy') selected @endif> Italy
                                    </option>
                                    <option value="Ivory Coast (Côte d'Ivoire)"
                                        @if ($user->nationality == "Ivory Coast (Côte d'Ivoire)") selected @endif> Ivory Coast (Côte d'Ivoire)
                                    </option>
                                    <option value="Jamaica" @if ($user->nationality == 'Jamaica') selected @endif> Jamaica
                                    </option>
                                    <option value="Japan" @if ($user->nationality == 'Japan') selected @endif> Japan
                                    </option>
                                    <option value="Jordan" @if ($user->nationality == 'Jordan') selected @endif> Jordan
                                    </option>
                                    <option value="Kazakhstan" @if ($user->nationality == 'Kazakhstan') selected @endif>
                                        Kazakhstan </option>
                                    <option value="Kenya" @if ($user->nationality == 'Kenya') selected @endif> Kenya
                                    </option>
                                    <option value="Kiribati" @if ($user->nationality == 'Kiribati') selected @endif> Kiribati
                                    </option>
                                    <option value="Kosovo" @if ($user->nationality == 'Kosovo') selected @endif> Kosovo
                                    </option>
                                    <option value="Kuwait" @if ($user->nationality == 'Kuwait') selected @endif> Kuwait
                                    </option>
                                    <option value="Kyrgyzstan" @if ($user->nationality == 'Kyrgyzstan') selected @endif>
                                        Kyrgyzstan </option>
                                    <option value="Laos" @if ($user->nationality == 'Laos') selected @endif> Laos
                                    </option>
                                    <option value="Latvia" @if ($user->nationality == 'Latvia') selected @endif> Latvia
                                    </option>
                                    <option value="Lebanon" @if ($user->nationality == 'Lebanon') selected @endif> Lebanon
                                    </option>
                                    <option value="Lesotho" @if ($user->nationality == 'Lesotho') selected @endif> Lesotho
                                    </option>
                                    <option value="Liberia" @if ($user->nationality == 'Liberia') selected @endif> Liberia
                                    </option>
                                    <option value="Libya" @if ($user->nationality == 'Libya') selected @endif> Libya
                                    </option>
                                    <option value="Liechtenstein" @if ($user->nationality == 'Liechtenstein') selected @endif>
                                        Liechtenstein </option>
                                    <option value="Lithuania" @if ($user->nationality == 'Lithuania') selected @endif>
                                        Lithuania </option>
                                    <option value="Luxembourg" @if ($user->nationality == 'Luxembourg') selected @endif>
                                        Luxembourg </option>
                                    <option value="Madagascar" @if ($user->nationality == 'Madagascar') selected @endif>
                                        Madagascar </option>
                                    <option value="Malawi" @if ($user->nationality == 'Malawi') selected @endif> Malawi
                                    </option>
                                    <option value="Malaysia" @if ($user->nationality == 'Malaysia') selected @endif>
                                        Malaysia </option>
                                    <option value="Maldives" @if ($user->nationality == 'Maldives') selected @endif>
                                        Maldives </option>
                                    <option value="Mali" @if ($user->nationality == 'Mali') selected @endif> Mali
                                    </option>
                                    <option value="Malta" @if ($user->nationality == 'Malta') selected @endif> Malta
                                    </option>
                                    <option value="Marshall Islands" @if ($user->nationality == 'Marshall Islands') selected @endif>
                                        Marshall Islands </option>
                                    <option value="Mauritania" @if ($user->nationality == 'Mauritania') selected @endif>
                                        Mauritania </option>
                                    <option value="Mauritius" @if ($user->nationality == 'Mauritius') selected @endif>
                                        Mauritius </option>
                                    <option value="Mexico" @if ($user->nationality == 'Mexico') selected @endif> Mexico
                                    </option>
                                    <option value="Micronesia" @if ($user->nationality == 'Micronesia') selected @endif>
                                        Micronesia </option>
                                    <option value="Moldova" @if ($user->nationality == 'Moldova') selected @endif> Moldova
                                    </option>
                                    <option value="Monaco" @if ($user->nationality == 'Monaco') selected @endif> Monaco
                                    </option>
                                    <option value="Mongolia" @if ($user->nationality == 'Mongolia') selected @endif>
                                        Mongolia </option>
                                    <option value="Montenegro" @if ($user->nationality == 'Montenegro') selected @endif>
                                        Montenegro </option>
                                    <option value="Morocco" @if ($user->nationality == 'Morocco') selected @endif> Morocco
                                    </option>
                                    <option value="Mozambique" @if ($user->nationality == 'Mozambique') selected @endif>
                                        Mozambique </option>
                                    <option value="Myanmar (Burma)" @if ($user->nationality == 'Myanmar (Burma)') selected @endif>
                                        Myanmar (Burma) </option>
                                    <option value="Namibia" @if ($user->nationality == 'Namibia') selected @endif> Namibia
                                    </option>
                                    <option value="Nauru" @if ($user->nationality == 'Nauru') selected @endif> Nauru
                                    </option>
                                    <option value="Nepal" @if ($user->nationality == 'Nepal') selected @endif> Nepal
                                    </option>
                                    <option value="Netherlands" @if ($user->nationality == 'Netherlands') selected @endif>
                                        Netherlands </option>
                                    <option value="New Zealand" @if ($user->nationality == 'New Zealand') selected @endif> New
                                        Zealand </option>
                                    <option value="Nicaragua" @if ($user->nationality == 'Nicaragua') selected @endif>
                                        Nicaragua </option>
                                    <option value="Niger" @if ($user->nationality == 'Niger') selected @endif> Niger
                                    </option>
                                    <option value="Nigeria" @if ($user->nationality == 'Nigeria') selected @endif> Nigeria
                                    </option>
                                    <option value="North Macedonia (formerly Macedonia)"
                                        @if ($user->nationality == 'North Macedonia (formerly Macedonia)') selected @endif> North Macedonia (formerly
                                        Macedonia) </option>
                                    <option value="Norway" @if ($user->nationality == 'Norway') selected @endif> Norway
                                    </option>
                                    <option value="Oman" @if ($user->nationality == 'Oman') selected @endif> Oman
                                    </option>
                                    <option value="Pakistan" @if ($user->nationality == 'Pakistan') selected @endif>
                                        Pakistan </option>
                                    <option value="Palau" @if ($user->nationality == 'Palau') selected @endif> Palau
                                    </option>
                                    <option value="Palestine State" @if ($user->nationality == 'Palestine State') selected @endif>
                                        Palestine State </option>
                                    <option value="Panama" @if ($user->nationality == 'Panama') selected @endif> Panama
                                    </option>
                                    <option value="Papua New Guinea" @if ($user->nationality == 'Papua New Guinea') selected @endif>
                                        Papua New Guinea </option>
                                    <option value="Paraguay" @if ($user->nationality == 'Paraguay') selected @endif>
                                        Paraguay </option>
                                    <option value="Peru" @if ($user->nationality == 'Peru') selected @endif> Peru
                                    </option>
                                    <option value="Philippines" @if ($user->nationality == 'Philippines') selected @endif>
                                        Philippines </option>
                                    <option value="Poland" @if ($user->nationality == 'Poland') selected @endif> Poland
                                    </option>
                                    <option value="Portugal" @if ($user->nationality == 'Portugal') selected @endif>
                                        Portugal </option>
                                    <option value="Qatar" @if ($user->nationality == 'Qatar') selected @endif> Qatar
                                    </option>
                                    <option value="Romania" @if ($user->nationality == 'Romania') selected @endif> Romania
                                    </option>
                                    <option value="Russia" @if ($user->nationality == 'Russia') selected @endif> Russia
                                    </option>
                                    <option value="Rwanda" @if ($user->nationality == 'Rwanda') selected @endif> Rwanda
                                    </option>
                                    <option value="Saint Kitts and Nevis"
                                        @if ($user->nationality == 'Saint Kitts and Nevis') selected @endif> Saint Kitts and Nevis
                                    </option>
                                    <option value="Saint Lucia" @if ($user->nationality == 'Saint Lucia') selected @endif>
                                        Saint Lucia </option>
                                    <option value="Saint Vincent and the Grenadines"
                                        @if ($user->nationality == 'Saint Vincent and the Grenadines') selected @endif> Saint Vincent and the
                                        Grenadines </option>
                                    <option value="Samoa" @if ($user->nationality == 'Samoa') selected @endif> Samoa
                                    </option>
                                    <option value="San Marino" @if ($user->nationality == 'San Marino') selected @endif> San
                                        Marino </option>
                                    <option value="Sao Tome and Principe"
                                        @if ($user->nationality == 'Sao Tome and Principe') selected @endif> Sao Tome and Principe
                                    </option>
                                    <option value="Saudi Arabia" @if ($user->nationality == 'Saudi Arabia') selected @endif>
                                        Saudi Arabia </option>
                                    <option value="Senegal" @if ($user->nationality == 'Senegal') selected @endif> Senegal
                                    </option>
                                    <option value="Serbia" @if ($user->nationality == 'Serbia') selected @endif> Serbia
                                    </option>
                                    <option value="Seychelles" @if ($user->nationality == 'Seychelles') selected @endif>
                                        Seychelles </option>
                                    <option value="Sierra Leone" @if ($user->nationality == 'Sierra Leone') selected @endif>
                                        Sierra Leone </option>
                                    <option value="Singapore" @if ($user->nationality == 'Singapore') selected @endif>
                                        Singapore </option>
                                    <option value="Slovakia" @if ($user->nationality == 'Slovakia') selected @endif>
                                        Slovakia </option>
                                    <option value="Slovenia" @if ($user->nationality == 'Slovenia') selected @endif>
                                        Slovenia </option>
                                    <option value="Solomon Islands" @if ($user->nationality == 'Solomon Islands') selected @endif>
                                        Solomon Islands </option>
                                    <option value="Somalia" @if ($user->nationality == 'Somalia') selected @endif> Somalia
                                    </option>
                                    <option value="South Africa" @if ($user->nationality == 'South Africa') selected @endif>
                                        South Africa </option>
                                    <option value="South Korea" @if ($user->nationality == 'South Korea') selected @endif>
                                        South Korea </option>
                                    <option value="South Sudan" @if ($user->nationality == 'South Sudan') selected @endif>
                                        South Sudan </option>
                                    <option value="Spain" @if ($user->nationality == 'Spain') selected @endif> Spain
                                    </option>
                                    <option value="Sri Lanka" @if ($user->nationality == 'Sri Lanka') selected @endif> Sri
                                        Lanka </option>
                                    <option value="Sudan" @if ($user->nationality == 'Sudan') selected @endif> Sudan
                                    </option>
                                    <option value="Suriname" @if ($user->nationality == 'Suriname') selected @endif>
                                        Suriname </option>
                                    <option value="Sweden" @if ($user->nationality == 'Sweden') selected @endif> Sweden
                                    </option>
                                    <option value="Switzerland" @if ($user->nationality == 'Switzerland') selected @endif>
                                        Switzerland </option>
                                    <option value="Syria" @if ($user->nationality == 'Syria') selected @endif> Syria
                                    </option>
                                    <option value="Taiwan" @if ($user->nationality == 'Taiwan') selected @endif> Taiwan
                                    </option>
                                    <option value="Tajikistan" @if ($user->nationality == 'Tajikistan') selected @endif>
                                        Tajikistan </option>
                                    <option value="Tanzania" @if ($user->nationality == 'Tanzania') selected @endif>
                                        Tanzania </option>
                                    <option value="Thailand" @if ($user->nationality == 'Thailand') selected @endif>
                                        Thailand </option>
                                    <option value="Togo" @if ($user->nationality == 'Togo') selected @endif> Togo
                                    </option>
                                    <option value="Tonga" @if ($user->nationality == 'Tonga') selected @endif> Tonga
                                    </option>
                                    <option value="Trinidad and Tobago"
                                        @if ($user->nationality == 'Trinidad and Tobago') selected @endif> Trinidad and Tobago </option>
                                    <option value="Tunisia" @if ($user->nationality == 'Tunisia') selected @endif> Tunisia
                                    </option>
                                    <option value="Turkey" @if ($user->nationality == 'Turkey') selected @endif> Turkey
                                    </option>
                                    <option value="Turkmenistan" @if ($user->nationality == 'Turkmenistan') selected @endif>
                                        Turkmenistan </option>
                                    <option value="Tuvalu" @if ($user->nationality == 'Tuvalu') selected @endif> Tuvalu
                                    </option>
                                    <option value="Uganda" @if ($user->nationality == 'Uganda') selected @endif> Uganda
                                    </option>
                                    <option value="Ukraine" @if ($user->nationality == 'Ukraine') selected @endif> Ukraine
                                    </option>
                                    <option value="United Arab Emirates"
                                        @if ($user->nationality == 'United Arab Emirates') selected @endif> United Arab Emirates
                                    </option>
                                    <option value="United Kingdom" @if ($user->nationality == 'United Kingdom') selected @endif>
                                        United Kingdom </option>
                                    <option value="United States of America"
                                        @if ($user->nationality == 'United States of America') selected @endif> United States of America
                                    </option>
                                    <option value="Uruguay" @if ($user->nationality == 'Uruguay') selected @endif> Uruguay
                                    </option>
                                    <option value="Uzbekistan" @if ($user->nationality == 'Uzbekistan') selected @endif>
                                        Uzbekistan </option>
                                    <option value="Vanuatu" @if ($user->nationality == 'Vanuatu') selected @endif> Vanuatu
                                    </option>
                                    <option value="Vatican City" @if ($user->nationality == 'Vatican City') selected @endif>
                                        Vatican City </option>
                                    <option value="Venezuela" @if ($user->nationality == 'Venezuela') selected @endif>
                                        Venezuela </option>
                                    <option value="Vietnam" @if ($user->nationality == 'Vietnam') selected @endif> Vietnam
                                    </option>
                                    <option value="Yemen" @if ($user->nationality == 'Yemen') selected @endif> Yemen
                                    </option>
                                    <option value="Zambia" @if ($user->nationality == 'Zambia') selected @endif> Zambia
                                    </option>
                                    <option value="Zimbabwe" @if ($user->nationality == 'Zimbabwe') selected @endif>
                                        Zimbabwe </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="religion" class="form-label fs-14 text-theme-primary">Religion</label>
                            <div class="religion-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->religion }}
                            </div>
                            <div class="religion-edit" style="display: none;">
                                <select id="religion" class="form-select" name="religion">
                                    <option disabled>Please Select Religion</option>
                                    <option value="Christianity" @if ($user->religion == 'Christianity') selected @endif>
                                        Christianity</option>
                                    <option value="Islam" @if ($user->religion == 'Islam') selected @endif>Islam
                                    </option>
                                    <option value="Hinduism" @if ($user->religion == 'Hinduism') selected @endif>Hinduism
                                    </option>
                                    <option value="Buddhism" @if ($user->religion == 'Buddhism') selected @endif>Buddhism
                                    </option>
                                    <option value="Sikhism" @if ($user->religion == 'Sikhism') selected @endif>Sikhism
                                    </option>
                                    <option value="Judaism" @if ($user->religion == 'Judaism') selected @endif>Judaism
                                    </option>
                                    <option value="Bahá'í Faith" @if ($user->religion == "Bahá'í Faith") selected @endif>
                                        Bahá'í
                                        Faith</option>
                                    <option value="Jainism" @if ($user->religion == 'Jainism') selected @endif>Jainism
                                    </option>
                                    <option value="Shintoism" @if ($user->religion == 'Shintoism') selected @endif>
                                        Shintoism
                                    </option>
                                    <option value="Taoism" @if ($user->religion == 'Taoism') selected @endif>Taoism
                                    </option>
                                    <option value="Confucianism" @if ($user->religion == 'Confucianism') selected @endif>
                                        Confucianism</option>
                                    <option value="Zoroastrianism" @if ($user->religion == 'Zoroastrianism') selected @endif>
                                        Zoroastrianism</option>
                                    <option value="Other" @if ($user->religion == 'Other') selected @endif>Other
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="maritialStatus" class="form-label fs-14 text-theme-primary">Maritial
                                Status</label>
                            <div class="maritialStatus-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->marital_status }}
                            </div>
                            <div class="maritialStatus-edit" style="display: none;">
                                <select name="marital_status" id="maritialStatus" class="form-select"
                                    name="marital_status">
                                    <option disabled>Please Select Maritial Status</option>
                                    <option value="Single" @if ($user->marital_status == 'Single') selected @endif>Single
                                    </option>
                                    <option value="Married" @if ($user->marital_status == 'Married') selected @endif>Married
                                    </option>
                                    <option value="Divorced" @if ($user->marital_status == 'Divorced') selected @endif>Divorced
                                    </option>
                                    <option value="Others" @if ($user->marital_status == 'Others') selected @endif>Others
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 languages__select__box">
                            <?php
                            $user->languages = explode(',', $user->languages);
                            ?>
                            <label for="languages" class="form-label fs-14 text-theme-primary">Languages</label>
                            <div class="languages-show" style="font-size: 15px; color: #92929d;">
                                <ul class="languages-list">
                                    @foreach ($user->languages as $row)
                                        <li>
                                            <a href="javascript:void 0;">{{ $row }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="languages-edit" style="display: none;">
                                <select multiple id="languages" class="form-select fs-14 languages__select__2 h-50px mb-4"
                                    name="languages[]">
                                    <option disabled>Please Select Languages</option>
                                    <option value="English"
                                        @foreach ($user->languages as $row) @if ($row == 'English') selected @endif @endforeach>
                                        English
                                    </option>
                                    <option value="Spanish"
                                        @foreach ($user->languages as $row) @if ($row == 'Spanish') selected @endif @endforeach>
                                        Spanish
                                    </option>
                                    <option value="French"
                                        @foreach ($user->languages as $row) @if ($row == 'French') selected @endif @endforeach>
                                        French
                                    </option>
                                    <option value="German"
                                        @foreach ($user->languages as $row) @if ($row == 'German') selected @endif @endforeach>
                                        German
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="drivingLicense" class="form-label fs-14 text-theme-primary">Driving
                                License</label>
                            <div class="driving-license-show" style="font-size: 15px; color: #92929d;">
                                @if ($user->driving_license == '1')
                                    Yes
                                @else
                                    No
                                @endif
                            </div>
                            <div class="driving-license-edit" style="display: none;">
                                <select name="driving_license" id="drivingLicense" class="form-select"
                                    name="driving_license">
                                    <option value="1" @if ($user->driving_license == '1') selected @endif>Yes
                                    </option>
                                    <option value="0" @if ($user->driving_license == '0') selected @endif>No
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="visaStatus" class="form-label fs-14 text-theme-primary">Visa Status</label>
                            <div class="visaStatus-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->visa_status }}
                            </div>
                            <div class="visaStatus-edit" style="display: none;">
                                <select name="visa_status" id="visaStatus" class="form-select" name="visa_status">
                                    <option disabled>Please Select Visa Status</option>
                                    <option @if ($user->visa_status == 'Citizen') selected @endif>Citizen</option>
                                    <option @if ($user->visa_status == 'Permanent Resident') selected @endif>Permanent Resident</option>
                                    <option @if ($user->visa_status == 'Visit Visa') selected @endif>Visit Visa</option>
                                    <option @if ($user->visa_status == 'Student Visa') selected @endif>Student Visa</option>
                                    <option @if ($user->visa_status == 'Business Visa') selected @endif>Business Visa</option>
                                    <option @if ($user->visa_status == 'Employee Visa') selected @endif>Employee Visa</option>
                                    <option @if ($user->visa_status == 'Spousal Visa') selected @endif>Spousal Visa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mb-4 pb-4 border-bottom">
                <form id="socialform" method="post">
                    @csrf
                    <input type="hidden" name="source" value="api" />
                    <div class="d-flex aling-items-center justify-content-between mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Social Links</h2>
                        <div>
                            <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Info" id="editSocialLinks" href="javascript:;">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Update" id="saveSocialLinks" style="display: none;">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Cancel" id="cancelSocialLinks" style="display: none;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row gy-3 social-links-form">
                        <div class="col-md-6">
                            <label for="facbookLink" class="form-label fs-14 text-theme-primary">Facebook</label>
                            <input type="url" class="form-control" name="facbookLink"
                                value="{{ $user->facbookLink }}" placeholder="Facebook Link" id="facbookLink" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="twitterLink" class="form-label fs-14 text-theme-primary">Twitter</label>
                            <input type="url" class="form-control" name="twitterLink"
                                value="{{ $user->twitterLink }}" placeholder="Twitter Link" id="twitterLink" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="instagramLink" class="form-label fs-14 text-theme-primary">Instagram</label>
                            <input type="url" class="form-control" name="instagramLink"
                                value="{{ $user->instagramLink }}" placeholder="Instagram Link" id="instagramLink"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="linkdinLink" class="form-label fs-14 text-theme-primary">Linkedin</label>
                            <input type="url" class="form-control" name="linkdinLink"
                                value="{{ $user->linkdinLink }}" placeholder="Linkedin Link" id="linkdinLink" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mb-4 pb-4 border-bottom">
                <form id="fourthform">
                    @csrf
                    <input type="hidden" name="source" value="api" />
                    <div class="d-flex aling-items-center justify-content-between mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">Privacy Settings</h2>
                        <div>
                            <a class="text_grey_999" role="button" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="Edit Info" id="editPrivacySettings" href="javascript:;">
                                <i class="fa-solid fa-pencil"></i>
                            </a>
                            <button class="text_grey_999 bg-transparent border-0" type="submit" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Update" id="savePrivacySettings" style="display: none;">
                                <i class="fas fa-check"></i>
                            </button>
                            <button class="text_grey_999 bg-transparent border-0" type="button" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Cancel" id="cancelPrivacySettings"
                                style="display: none;">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                    </div>
                    <div class="row gy-3 others-detail">
                        <div class="col-md-6">
                            <label for="mobileNoSetting" class="form-label fs-14 text-theme-primary">Mobile No</label>
                            <div class="mobile-no-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->phone_status }}
                            </div>
                            <div class="mobile-no-edit" style="display: none;">
                                <select id="mobileNoSetting" class="form-select" name="phone_status">
                                    <option value="Only Me" @if ($user->phone_status == 'Only Me') selected @endif>
                                        Only Me
                                    </option>
                                    <option value="Public" @if ($user->phone_status == 'Public') selected @endif>
                                        Public
                                    </option>
                                    <option value="Employers" @if ($user->phone_status == 'Employers') selected @endif>
                                        Employers
                                    </option>
                                    <option value="Recruiters" @if ($user->phone_status == 'Recruiters') selected @endif>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        @if ($user->phone_status == 'Employers/Recruiters') selected @endif>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddressSetting" class="form-label fs-14 text-theme-primary">Email
                                Address</label>
                            <div class="email-address-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->email_status }}
                            </div>
                            <div class="email-address-edit" style="display: none;">
                                <select id="emailAddressSetting" class="form-select" name="email_status">
                                    <option value="Only Me" @if ($user->email_status == 'Only Me') selected @endif>
                                        Only Me
                                    </option>
                                    <option value="Public" @if ($user->email_status == 'Public') selected @endif>
                                        Public
                                    </option>
                                    <option value="Employers" @if ($user->email_status == 'Employers') selected @endif>
                                        Employers
                                    </option>
                                    <option value="Recruiters" @if ($user->email_status == 'Recruiters') selected @endif>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        @if ($user->email_status == 'Employers/Recruiters') selected @endif>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="addressSetting" class="form-label fs-14 text-theme-primary">Address</label>
                            <div class="address-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->address_status }}
                            </div>
                            <div class="address-edit" style="display: none;">
                                <select id="addressSetting" class="form-select" name="address_status">
                                    <option value="Only Me" @if ($user->address_status == 'Only Me') selected @endif>
                                        Only Me
                                    </option>
                                    <option value="Public" @if ($user->address_status == 'Public') selected @endif>
                                        Public
                                    </option>
                                    <option value="Employers" @if ($user->address_status == 'Employers') selected @endif>
                                        Employers
                                    </option>
                                    <option value="Recruiters" @if ($user->address_status == 'Recruiters') selected @endif>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        @if ($user->address_status == 'Employers/Recruiters') selected @endif>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="visaStatus2" class="form-label fs-14 text-theme-primary">Visa Status</label>
                            <div class="visa-status-show" style="font-size: 15px; color: #92929d;">
                                {{ $user->visa_status_status }}
                            </div>
                            <div class="visa-status-edit" style="display: none;">
                                <select id="visaStatus2" class="form-select" name="visa_status_status">
                                    <option value="Only Me" @if ($user->visa_status_status == 'Only Me') selected @endif>
                                        Only Me
                                    </option>
                                    <option value="Public" @if ($user->visa_status_status == 'Public') selected @endif>
                                        Public
                                    </option>
                                    <option value="Employers" @if ($user->visa_status_status == 'Employers') selected @endif>
                                        Employers
                                    </option>
                                    <option value="Recruiters" @if ($user->visa_status_status == 'Recruiters') selected @endif>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        @if ($user->visa_status_status == 'Employers/Recruiters') selected @endif>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('bottom_script')

    <script>
        $(document).ready(function() {

            $("#msform").on('submit', function(e) {
                e.preventDefault();
                var frmData = new FormData($(".avatar-form")[0]);
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: frmData,
                        dataType: "json",
                        encode: true,
                        contentType: false,
                        cache: false,
                        processData: false,
                    })
                    .done(function(data) {
                        successModal("Your Data Has Been Successfully Updated...");
                    }).fail(function(error) {
                        var errors = error.responseJSON;
                    });


            });
            $('#firstform').on('submit', function(e) {
                $('#firstform input').prop("disabled", false);
                $('#firstform textarea').prop("disabled", false);
                e.preventDefault();
                var userFormData = $(this).serialize();
                console.log(userFormData);
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        successModal("Your Data Has Been Successfully Updated...");
                        $('#firstform input').prop("disabled", true);
                        $('#firstform textarea').prop("disabled", true);
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        console.log(errors);

                    });
            });
            $('#secondform').on('submit', function(e) {
                $('#secondform input').prop("disabled", false);
                $('#secondform textarea').prop("disabled", false);
                e.preventDefault();
                var userFormData = $(this).serialize();
                console.log(userFormData);
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        successModal("Your Data Has Been Successfully Updated...");
                        $('#secondform input').prop("disabled", true);
                        $('#secondform textarea').prop("disabled", true);
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        console.log(errors);
                        errorModal("Address is invalid...");

                    });
            });
            $('#thirdform').on('submit', function(e) {
                $('#thirdform input').prop("disabled", false);
                $('#thirdform textarea').prop("disabled", false);
                $('#thirdform select').prop("disabled", false);
                e.preventDefault();
                var userFormData = $(this).serialize();
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        successModal("Your Data Has Been Successfully Updated...");
                        // let langs = data['langHidden'];
                        console.log(data['langHidden']);
                        // langs.forEach(myFunction);
                        $(".languages-show").html('');
                        html = '';
                        html += "<ul class='languages-list'>";
                        $.each(data['langHidden'], function(index, value) {
                            // text += index + ": " + item + "<br>";
                            html += " <li> ";
                            html += "     <a href='javascript:void 0;'>" + value + "</a> ";
                            html += " </li> ";
                        });
                        html += "</ul>";
                        $(".languages-show").html(html);
                        // $('#thirdform input').prop("disabled", true);
                        // $('#thirdform textarea').prop("disabled", true);
                        // $('#thirdform select').prop("disabled", true);
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        console.log(errors);
                    });
            });
            $('#fourthform').on('submit', function(e) {
                e.preventDefault();
                var userFormData = $(this).serialize();
                console.log(userFormData);
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        successModal("Your Data Has Been Successfully Updated...");
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        console.log(errors);
                    });
            });
            $('#socialform').on('submit', function(e) {
                e.preventDefault();
                var userFormData = $(this).serialize();
                console.log(userFormData);
                $.ajax({
                        type: "POST",
                        url: "{{ route('candidates.profile.update') }}",
                        data: userFormData,
                        dataType: "json",
                        encode: true,
                    }).done(function(data) {
                        //         $("#saveSocialLinks")
                        // .click(function() {
                        $(".social-links-form input").prop("disabled", true);
                        $("#cancelSocialLinks").hide();
                        $("#saveSocialLinks").hide();
                        $("#editSocialLinks").show();
                        $(this).hide();
                        // })
                        // .show();
                        successModal("Your Data Has Been Successfully Updated...");
                    })
                    .fail(function(error) {
                        var errors = error.responseJSON;
                        console.log(errors);
                    });
            });
        });
    </script>
    {{-- start front end profile edit script --}}
    <script>
        // start edit cover picturre
        $('#editCoverPic').click(function() {
            let imageSrc = $('.cover__pic').attr('src');
            $('#output').attr('src', imageSrc)
            $('.cover-edit-box').show();
            $('.cover-not-edit-box').hide();
            $('#saveCoverPic').click(function() {
                let updateImage = $('#output').attr('src');
                $(this).hide();
                $('#cancelCoverPic').hide();
                $('.cover-edit-box').hide();
                $('.cover-not-edit-box').show();
                $('#editCoverPic').show();
                $('.cover__pic').attr('src', updateImage);
            }).show();
            $('#cancelCoverPic').click(function() {
                $(this).hide();
                $('#editCoverPic').show();
                $('.cover-edit-box').hide();
                $('.cover-not-edit-box').show();
                $('#saveCoverPic').hide();
            }).show();
            $(this).hide();
        })
        // end edit cover picturre

        // start personal detail
        $('#editPersonalInfo').click(function() {
            let firstNameVal = $('#firstName').val();
            let lastNameVal = $('#lastName').val();
            let dateOfBirthVal = $('#dateOfBirth').val();
            let genderSelect = $('#gender').find(":selected").val();
            let genderSelectTxt = $('#gender').find(":selected").text();
            let taglineVal = $('#tagline').val();
            let aboutTextVal = $('#aboutText').val();
            let textareaHeight = $('#tagline').height();
            let genderText = $('.gender-show').text();
            $('.personal-detail input').prop("disabled", false);
            $('.personal-detail textarea').prop("disabled", false);
            // $('.personal-detail select').prop("disabled", false);

            $(this).hide();
            console.log(textareaHeight);
            $('.characters').show();
            $('.calender-icon-2').show();
            $('.gender-show').hide();
            $('.gender-edit').show();
            $('#savePersonalInfo').click(function() {
                let genderValue = $('#gender').find(":selected").val();
                $('.gender-show').text(genderValue).show();
                $('.gender-show').show();
                $('.gender-edit').hide();
                $('.characters').hide();
                $('.calender-icon-2').hide();
                $('.personal-detail input').prop("disabled", true);
                $('.personal-detail textarea').prop("disabled", true);
                // $('.personal-detail select').prop("disabled", true);
                $('#cancelPersonalInfo').hide();
                $('#editPersonalInfo').show();
                $("textarea").each(function() {
                    this.setAttribute("style", "height:" + (this.scrollHeight) +
                        "px;overflow-y:hidden;");
                }).on("input", function() {
                    this.style.height = 0;
                    this.style.height = (this.scrollHeight) + "px";
                });
                $(this).hide();
                // Swal.fire(
                //     'Good job!',
                //     'Your changes successfully updated',
                //     'success'
                // )
            }).show();
            $('#cancelPersonalInfo').click(function() {
                // maritialStatus
                const genderText = $('.gender-show')
                const genderselect = Array.from(document.querySelector('#gender').options)
                    .map((item) => {
                        if (item.value === genderText.text()) {
                            return item.selected = true
                        }
                    });
                $('#firstName').val(firstNameVal);
                $('#lastName').val(lastNameVal);
                $('#dateOfBirth').val(dateOfBirthVal);
                // $('#gender').find(":selected").val(genderSelect);
                // $('#gender').find(":selected").text(genderSelectTxt);
                $('#tagline').val(taglineVal);
                $('#aboutText').val(aboutTextVal);
                $('.characters').hide();
                $('.calender-icon-2').hide();
                $('.personal-detail input').prop("disabled", true);
                $('.personal-detail textarea').prop("disabled", true);
                // $('.personal-detail select').prop("disabled", true);
                $('#savePersonalInfo').hide();
                $('#editPersonalInfo').show();
                $(this).hide();
                $('#tagline').height(textareaHeight);
                $('.gender-show').show();
                $('.gender-edit').hide();
            }).show();

        })
        // end personal detail

        // start edit contact detail
        $('#editContactDetail').click(function() {
            let countryCode = $('#countryCode').val();
            let contactNumber = $('#contactNumber').val();
            let emailAddressVal = $('#emailAddress').val();
            let addressVal = $('#address').val();
            let zipCodeVal = $('#zipCode').val();
            $('.contact-detail input').prop("disabled", false);
            $('#saveContactDetail').click(function() {
                $('#cancelContactDetail').hide()
                $('.edit-phone-number').hide()
                $('.contact-number-text').show();
                $(this).hide();
                $('#editContactDetail').show();
                countryCode = $('#countryCode').val();
                contactNumber = $('#contactNumber').val();
                $('#countryCode').val(countryCode);
                $('#contactNumber').val(contactNumber);
                $('.country-code').text(countryCode);
                $('.contact-number').text(contactNumber);
                $('.contact-detail input').prop("disabled", true);
            }).show()
            $('#cancelContactDetail').click(function() {
                $('#saveContactDetail').hide()
                $('.edit-phone-number').hide()
                $('.contact-number-text').show();
                $(this).hide();
                $('#editContactDetail').show();
                $('#countryCode').val(countryCode);
                $('#contactNumber').val(contactNumber);
                $('.country-code').text(countryCode);
                $('.contact-number').text(contactNumber);
                $('#address').val(addressVal);
                $('#emailAddress').val(emailAddressVal);
                $('#zipCode').val(zipCodeVal);
                $('.contact-detail input').prop("disabled", true);
            }).show()
            $('.edit-phone-number').show()
            $('.contact-number-text').hide()
            $(this).hide()
        })
        // end edit contact detail

        // start privacysettings detail
        $('#editPrivacySettings').click(function() {
            let mobileNoText = $('.mobile-no-show').text();
            let emailAddressText = $('.email-address-show').text();
            let addressText = $('.address-show').text();
            let visaStatusText = $('.visa-status-show').text();
            $('.mobile-no-edit').show();
            $('.mobile-no-show').hide();
            $('.email-address-edit').show();
            $('.email-address-show').hide();
            $('.address-edit').show();
            $('.address-show').hide();
            $('.visa-status-edit').show();
            $('.visa-status-show').hide();
            $(this).hide();
            $('#cancelPrivacySettings').click(function() {
                $(this).hide();
                $('#savePrivacySettings').hide();
                $('#editPrivacySettings').show();
                $('.mobile-no-edit').hide();
                $('.mobile-no-show').show();
                $('.email-address-edit').hide();
                $('.email-address-show').show();
                $('.address-edit').hide();
                $('.address-show').show();
                $('.visa-status-edit').hide();
                $('.visa-status-show').show();
                // mobileNoSetting
                const mobileNoText = $('.mobile-no-show');
                const mobileNoSelect = Array.from(document.querySelector('#mobileNoSetting').options).map((
                    item) => {
                    if (item.value === mobileNoText.text()) {
                        return item.selected = true
                    }
                });

                // emailAddressSetting
                const emailAddressText = $('.email-address-show');
                const emailAddressSettingSelect = Array.from(document.querySelector('#emailAddressSetting')
                    .options).map((
                    item) => {
                    if (item.value === emailAddressText.text()) {
                        return item.selected = true
                    }
                });

                // AddressSetting
                const addressText = $('.address-show');
                const addressSettingSelect = Array.from(document.querySelector('#addressSetting')
                    .options).map((
                    item) => {
                    if (item.value === addressText.text()) {
                        return item.selected = true
                    }
                });

                // visa status Setting
                const visaStatusText = $('.visa-status-show');
                const visaStatusSettingSelect = Array.from(document.querySelector('#visaStatus2')
                    .options).map((
                    item) => {
                    if (item.value === visaStatusText.text()) {
                        return item.selected = true
                    }
                });
            }).show();
            $('#savePrivacySettings').click(function() {
                $(this).hide();
                $('#cancelPrivacySettings').hide();
                $('#editPrivacySettings').show();
                $('.mobile-no-edit').hide();
                $('.email-address-edit').hide();
                $('.address-edit').hide();
                $('.visa-status-edit').hide();
                let mobileNoSettingValue = $('#mobileNoSetting').find(":selected").val();
                let emailAddressSettingValue = $('#emailAddressSetting').find(":selected").val();
                let addressSettingValue = $('#addressSetting').find(":selected").val();
                let visaStatusValue = $('#visaStatus2').find(":selected").val();
                $('.mobile-no-show').text(mobileNoSettingValue).show();
                $('.email-address-show').text(emailAddressSettingValue).show();
                $('.address-show').text(addressSettingValue).show();
                $('.visa-status-show').text(visaStatusValue).show();
            }).show();
        })
        // end privacysettings detail

        // start edit other details
        $('#editOtherDetail').click(function() {
            $(".languages__select__2").select2({
                maximumSelectionLength: 3,
                sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            });
            $('.nationality-show').hide();
            $('.nationality-edit').show();
            $('.religion-show').hide();
            $('.religion-edit').show();
            $('.maritialStatus-show').hide();
            $('.maritialStatus-edit').show();
            $('.visaStatus-show').hide();
            $('.visaStatus-edit').show();
            $('.driving-license-show').hide();
            $('.driving-license-edit').show();
            let nationalityText = $('.nationality-show').text();
            let drivingLicenseText = $('.driving-license-show').text();
            let religionText = $('.religion-show').text();
            let maritialStatusText = $('.maritialStatus-show').text();
            let visaStatusText = $('.visaStatus-show').text();
            // $('.languages__select').prop("disabled", false);
            $('.languages-show').hide();
            $('.languages-edit').show();
            $(this).hide();
            $('#saveOtherDetail').click(function() {
                $(".languages__select__2").select2('destroy');
                $('#cancelOtherDetail').hide();
                $('#editOtherDetail').show();
                $('.languages-show').show();
                $('.languages-edit').hide();
                let nationalityValue = $('#nationality').find(":selected").val();
                let religionValue = $('#religion').find(":selected").val();
                let maritialStatusValue = $('#maritialStatus').find(":selected").val();
                let visaStatusValue = $('#visaStatus').find(":selected").val();
                let drivingLicenseValue = $('#drivingLicense').find(":selected").text();
                $('.nationality-show').text(nationalityValue).show();
                $('.driving-license-show').text(drivingLicenseValue).show();
                $('.maritialStatus-show').text(maritialStatusValue).show();
                $('.visaStatus-show').text(visaStatusValue).show();
                $('.religion-show').text(religionValue).show();
                $('.nationality-edit').hide();
                $('.religion-edit').hide();
                $('.maritialStatus-edit').hide();
                $('.visaStatus-edit').hide();
                $('.driving-license-edit').hide();
                // $('.languages__select__2').prop("disabled", true);
                $(this).hide();
                // $(".languages__select__2").select2({
                //     maximumSelectionLength: 3
                // });
            }).show();
            $('#cancelOtherDetail').click(function() {
                $(".languages__select__2").select2('destroy');
                $.ajax({
                    type: "GET",
                    url: "{{ route('candidates.getLanguages') }}",
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    console.log(data);
                    $(".languages-edit").html('');
                    html = '';
                    html +=
                        "<select multiple id='languages' class='form-select fs-14 languages__select__2 h-50px mb-4' name='languages[]'>";
                    html += "<option disabled>Please Select Languages</option>";
                    html += "<option value='English'";
                    $.each(data['langHidden'], function(index, value) {
                        if (value == 'English') {
                            html += "selected ";
                        }
                    });
                    html += ">";
                    html += "English";
                    html += "</option>";
                    html += "<option value='Spanish'";
                    $.each(data['langHidden'], function(index, value) {
                        if (value == 'Spanish') {
                            html += "selected ";
                        }
                    });
                    html += ">";
                    html += "Spanish";
                    html += "</option>";
                    html += "<option value='French'";
                    $.each(data['langHidden'], function(index, value) {
                        if (value == 'French') {
                            html += "selected ";
                        }
                    });
                    html += ">";
                    html += "French";
                    html += "</option>";
                    html += "<option value='German'";
                    $.each(data['langHidden'], function(index, value) {
                        if (value == 'German') {
                            html += "selected ";
                        }
                    });
                    html += ">";
                    html += "German";
                    html += "</option>";
                    html += "</select>";
                    $(".languages-edit").html(html);
                    // $(".languages__select__2").select2();
                    // $(".languages__select__2").select2({
                    //     maximumSelectionLength: 3
                    // });
                });

                // nationality
                const nationalityText = $('.nationality-show')
                const nationalityselect = Array.from(document.querySelector('#nationality').options).map((
                    item) => {
                    if (item.value === nationalityText.text()) {
                        return item.selected = true
                    }
                });

                // visaStatus
                const visaStatusText = $('.visaStatus-show')
                const visaStatusselect = Array.from(document.querySelector('#visaStatus').options).map((
                    item) => {
                    if (item.value === visaStatusText.text()) {
                        return item.selected = true
                    }
                });

                // drivingLicense
                const drivingLicenseText = $('.driving-license-show')
                const drivingLicenseselect = Array.from(document.querySelector('#drivingLicense').options)
                    .map((item) => {
                        if (item.value === '0') {
                            return item.selected = true
                            // console.log('109')
                        } else {
                            return item.selected = false
                            // console.log('109')
                        }
                    });

                // Religion
                const religionText = $('.religion-show')
                const religionselect = Array.from(document.querySelector('#religion').options)
                    .map((
                        item) => {
                        if (item.value === religionText.text()) {
                            return item.selected = true
                        }
                    });

                // maritialStatus
                const maritialStatusText = $('.maritialStatus-show')
                const maritialStatusselect = Array.from(document.querySelector('#maritialStatus').options)
                    .map((
                        item) => {
                        if (item.value === maritialStatusText.text()) {
                            return item.selected = true
                        }
                    });
                console.log(document.querySelector('#drivingLicense').options[0].value)
                $('#saveOtherDetail').hide();
                $('#editOtherDetail').show();
                $('.nationality-show').show();
                $('.nationality-edit').hide();
                $('.religion-show').show();
                $('.religion-edit').hide();
                $('.maritialStatus-show').show();
                $('.maritialStatus-edit').hide();
                $('.driving-license-show').show();
                $('.driving-license-edit').hide();
                $('.visaStatus-show').show();
                $('.visaStatus-edit').hide();
                $(this).hide();
                // $('.languages__select').prop("disabled", true);
                $('.languages-show').show();
                $('.languages-edit').hide();
            }).show();

        })
        // end edit other details

        // start Social Links
        $("#editSocialLinks").click(function() {
            let facbookLinkVal = $("#facbookLink").val();
            let twitterLinkVal = $("#twitterLink").val();
            let instagramLinkVal = $("#instagramLink").val();
            let linkdinLinkVal = $("#linkdinLink").val();
            $(".social-links-form input").prop("disabled", false);
            $("#saveSocialLinks").show();
            $(this).hide();

            $("#cancelSocialLinks")
                .click(function() {
                    $("#facbookLink").val(facbookLinkVal);
                    $("#twitterLink").val(twitterLinkVal);
                    $("#instagramLink").val(instagramLinkVal);
                    $("#linkdinLink").val(linkdinLinkVal);
                    $(".social-links-form input").prop("disabled", true);
                    $("#saveSocialLinks").hide();
                    $("#editSocialLinks").show();
                    $(this).hide();
                })
                .show();
        });
        // end Social Links

        $('#skillsForm').on('submit', function(e) {
            e.preventDefault();
            var userFormData = $(this).serialize();
            // console.log(userFormData);
            $.ajax({
                    type: "POST",
                    url: "{{ route('candidates.profile.update') }}",
                    data: userFormData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    successModal("Your Data Has Been Successfully Updated...");
                })
                .fail(function(error) {
                    var errors = error.responseJSON;
                    console.log(errors);

                });
        });
    </script>
    {{-- end front end profile edit script --}}
@endsection
