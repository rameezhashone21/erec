<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-12">
        <div class="row">
            <div class="col-lg-7">
                <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
                    <button class="mobile_menu_trigger d-md-none btn_theme border-0 py-2 px-4 mb-3">
                        <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
                    </button>
                    <ul class="d-flex cv-perse-navigation">
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.contact')); ?>">Contact</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.skills')); ?>">Skills</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.about')); ?>" class="active">About</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.experience')); ?>">Experience</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.education')); ?>">Education</a>
                        </li>

                        <li>
                            <a href="<?php echo e(route('candidates.cvParser.others')); ?>">Others</a>
                        </li>
                    </ul>
                    <div class="my-4">
                        <h2 class="text_primary fw-500 fs-5 text-uppercase">About</h2>
                        <h3 class="fs-3 fw-600 mb-2">Write down your professional summary</h3>
                        <p class="color-grey-787878">Include up to 3 sentences that describe your general experience</p>
                    </div>
                    <form method="POST" class="cv_parse_form" action="<?php echo e(route('candidates.cvParser.update.data')); ?>"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="about" value="1" />
                        <input type="hidden" name="contact_id" value="<?php echo e($contact->contact->id); ?>" />
                        <div class="row gy-4">
                            <div class="col-lg-6">
                                



                                <label class="cv-parse-lable mb-2">Date Of Birth</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control cv-parse-input datepicker"
                                        value="<?php echo e($contact->contact->dob); ?>" id="dateOfBirth" required readonly
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
                                    <option <?php if($contact->contact->marital_status == 'single'): ?> selected <?php endif; ?> value="single">Single</option>
                                    <option <?php if($contact->contact->marital_status == 'married' || $contact->contact->marital_status == 'Married'): ?> selected <?php endif; ?> value="married">Married
                                    </option>
                                    <option <?php if($contact->contact->marital_status == 'widow'): ?> selected <?php endif; ?> value="widow">Widow</option>
                                    <option <?php if($contact->contact->marital_status == 'divorced'): ?> selected <?php endif; ?> value="divorced">Divorced
                                    </option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="visaStatus" class="cv-parse-lable mb-2">Visa Status</label>
                                <select type="text" id="visaStatus" class="form-select cv-parse-input"
                                    name="visa_status">
                                    <option value="" selected disabled></option>
                                    <option value="Citizen" <?php if($contact->contact->marital_status == 'Citizen'): ?> selected <?php endif; ?>>Citizen
                                    </option>
                                    <option value="Permanent Resident" <?php if($contact->contact->marital_status == 'Permanent Resident'): ?> selected <?php endif; ?>>
                                        Permanent Resident</option>
                                    <option value="Visit Visa" <?php if($contact->contact->marital_status == 'Visit Visa'): ?> selected <?php endif; ?>>Visit Visa
                                    </option>
                                    <option value="Student Visa" <?php if($contact->contact->marital_status == 'Student Visa'): ?> selected <?php endif; ?>>Student
                                        Visa</option>
                                    <option value="Business Visa" <?php if($contact->contact->marital_status == 'Business Visa'): ?> selected <?php endif; ?>>Business
                                        Visa</option>
                                    <option value="Employee Visa" <?php if($contact->contact->marital_status == 'Employee Visa'): ?> selected <?php endif; ?>>Employee
                                        Visa</option>
                                    <option value="Spousal Visa" <?php if($contact->contact->marital_status == 'Spousal Visa'): ?> selected <?php endif; ?>>Spousal
                                        Visa</option>
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label for="nationality" class="cv-parse-lable mb-2">Nationality</label>
                                <select id="nationality" class="form-select cv-parse-input" name="nationality">
                                    <option value="" selected disabled></option>
                                    <option <?php if($contact->contact->nationality == 'Afghanistan'): ?> selected <?php endif; ?> value="Afghanistan">
                                        Afghanistan </option>
                                    <option <?php if($contact->contact->nationality == 'Albania'): ?> selected <?php endif; ?> value="Albania"> Albania
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Algeria'): ?> selected <?php endif; ?> value="Algeria"> Algeria
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Andorra'): ?> selected <?php endif; ?> value="Andorra"> Andorra
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Angola'): ?> selected <?php endif; ?> value="Angola"> Angola
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Antigua and Barbuda'): ?> selected <?php endif; ?> value="Antigua and Barbuda">
                                        Antigua and Barbuda </option>
                                    <option <?php if($contact->contact->nationality == 'Argentina'): ?> selected <?php endif; ?> value="Argentina"> Argentina
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Armenia'): ?> selected <?php endif; ?> value="Armenia"> Armenia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Australia'): ?> selected <?php endif; ?> value="Australia">
                                        Australia </option>
                                    <option <?php if($contact->contact->nationality == 'Austria'): ?> selected <?php endif; ?> value="Austria"> Austria
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Azerbaijan'): ?> selected <?php endif; ?> value="Azerbaijan">
                                        Azerbaijan </option>
                                    <option <?php if($contact->contact->nationality == 'Bahamas'): ?> selected <?php endif; ?> value="Bahamas"> Bahamas
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bahrain'): ?> selected <?php endif; ?> value="Bahrain"> Bahrain
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bangladesh'): ?> selected <?php endif; ?> value="Bangladesh">
                                        Bangladesh </option>
                                    <option <?php if($contact->contact->nationality == 'Barbados'): ?> selected <?php endif; ?> value="Barbados"> Barbados
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Belarus'): ?> selected <?php endif; ?> value="Belarus"> Belarus
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Belgium'): ?> selected <?php endif; ?> value="Belgium"> Belgium
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Belize'): ?> selected <?php endif; ?> value="Belize"> Belize
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Benin'): ?> selected <?php endif; ?> value="Benin"> Benin
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bhutan'): ?> selected <?php endif; ?> value="Bhutan"> Bhutan
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bolivia'): ?> selected <?php endif; ?> value="Bolivia"> Bolivia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>
                                        value="Bosnia and Herzegovina"> Bosnia and Herzegovina
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Botswana'): ?> selected <?php endif; ?> value="Botswana"> Botswana
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Brazil'): ?> selected <?php endif; ?> value="Brazil"> Brazil
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Brunei'): ?> selected <?php endif; ?> value="Brunei"> Brunei
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Bulgaria'): ?> selected <?php endif; ?> value="Bulgaria"> Bulgaria
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Burkina'): ?> selected <?php endif; ?> value="Burkina Faso">
                                        Burkina Faso </option>
                                    <option <?php if($contact->contact->nationality == 'Burundi'): ?> selected <?php endif; ?> value="Burundi"> Burundi
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Cabo'): ?> selected <?php endif; ?> value="Cabo Verde"> Cabo
                                        Verde </option>
                                    <option <?php if($contact->contact->nationality == 'Cambodia'): ?> selected <?php endif; ?> value="Cambodia"> Cambodia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Cameroon'): ?> selected <?php endif; ?> value="Cameroon"> Cameroon
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Canada'): ?> selected <?php endif; ?> value="Canada"> Canada
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Central'): ?> selected <?php endif; ?>
                                        value="Central African Republic"> Central African Republic
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Chad'): ?> selected <?php endif; ?> value="Chad"> Chad
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Chile'): ?> selected <?php endif; ?> value="Chile"> Chile
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'China'): ?> selected <?php endif; ?> value="China"> China
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Colombia'): ?> selected <?php endif; ?> value="Colombia"> Colombia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Comoros'): ?> selected <?php endif; ?> value="Comoros"> Comoros
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Congo (Congo-Brazzaville)'): ?> selected <?php endif; ?>
                                        value="Congo (Congo-Brazzaville)"> Congo (Congo-Brazzaville)
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Costa'): ?> selected <?php endif; ?> value="Costa Rica"> Costa
                                        Rica </option>
                                    <option <?php if($contact->contact->nationality == 'Croatia'): ?> selected <?php endif; ?> value="Croatia"> Croatia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Cuba'): ?> selected <?php endif; ?> value="Cuba"> Cuba
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Cyprus'): ?> selected <?php endif; ?> value="Cyprus"> Cyprus
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Czechia (Czech Republic)'): ?> selected <?php endif; ?>
                                        value="Czechia (Czech Republic)"> Czechia (Czech Republic)
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Democratic Republic of the Congo (Congo-Kinshasa)'): ?> selected <?php endif; ?>
                                        value="Democratic Republic of the Congo (Congo-Kinshasa)"> Democratic Republic
                                        of the
                                        Congo (Congo-Kinshasa) </option>
                                    <option <?php if($contact->contact->nationality == 'Denmark'): ?> selected <?php endif; ?> value="Denmark"> Denmark
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Djibouti'): ?> selected <?php endif; ?> value="Djibouti"> Djibouti
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Dominica'): ?> selected <?php endif; ?> value="Dominica"> Dominica
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Dominican Republic'): ?> selected <?php endif; ?> value="Dominican Republic">
                                        Dominican Republic </option>
                                    <option <?php if($contact->contact->nationality == 'East Timor (Timor-Leste)'): ?> selected <?php endif; ?>
                                        value="East Timor (Timor-Leste)"> East Timor (Timor-Leste)
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ecuador'): ?> selected <?php endif; ?> value="Ecuador"> Ecuador
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Egypt'): ?> selected <?php endif; ?> value="Egypt"> Egypt
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'El Salvador'): ?> selected <?php endif; ?> value="El Salvador"> El
                                        Salvador </option>
                                    <option <?php if($contact->contact->nationality == 'Equatorial Guinea'): ?> selected <?php endif; ?> value="Equatorial Guinea">
                                        Equatorial Guinea </option>
                                    <option <?php if($contact->contact->nationality == 'Eritrea'): ?> selected <?php endif; ?> value="Eritrea"> Eritrea
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Estonia'): ?> selected <?php endif; ?> value="Estonia"> Estonia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Eswatini (formerly Swaziland)'): ?> selected <?php endif; ?>
                                        value="Eswatini (formerly Swaziland)"> Eswatini (formerly Swaziland)
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ethiopia'): ?> selected <?php endif; ?> value="Ethiopia"> Ethiopia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Fiji'): ?> selected <?php endif; ?> value="Fiji"> Fiji
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Finland'): ?> selected <?php endif; ?> value="Finland"> Finland
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'France'): ?> selected <?php endif; ?> value="France"> France
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Gabon'): ?> selected <?php endif; ?> value="Gabon"> Gabon
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Gambia'): ?> selected <?php endif; ?> value="Gambia"> Gambia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Georgia'): ?> selected <?php endif; ?> value="Georgia"> Georgia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Germany'): ?> selected <?php endif; ?> value="Germany"> Germany
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ghana'): ?> selected <?php endif; ?> value="Ghana"> Ghana
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Greece'): ?> selected <?php endif; ?> value="Greece"> Greece
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Grenada'): ?> selected <?php endif; ?> value="Grenada"> Grenada
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Guatemala'): ?> selected <?php endif; ?> value="Guatemala">
                                        Guatemala </option>
                                    <option <?php if($contact->contact->nationality == 'Guinea'): ?> selected <?php endif; ?> value="Guinea"> Guinea
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Guinea-Bissau'): ?> selected <?php endif; ?> value="Guinea-Bissau">
                                        Guinea-Bissau </option>
                                    <option <?php if($contact->contact->nationality == 'Guyana'): ?> selected <?php endif; ?> value="Guyana"> Guyana
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Haiti'): ?> selected <?php endif; ?> value="Haiti"> Haiti
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Honduras'): ?> selected <?php endif; ?> value="Honduras"> Honduras
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Hungary'): ?> selected <?php endif; ?> value="Hungary"> Hungary
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Iceland'): ?> selected <?php endif; ?> value="Iceland"> Iceland
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'India'): ?> selected <?php endif; ?> value="India"> India
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Indonesia'): ?> selected <?php endif; ?> value="Indonesia">
                                        Indonesia </option>
                                    <option <?php if($contact->contact->nationality == 'Iran'): ?> selected <?php endif; ?> value="Iran"> Iran
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Iraq'): ?> selected <?php endif; ?> value="Iraq"> Iraq
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ireland'): ?> selected <?php endif; ?> value="Ireland"> Ireland
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Israel'): ?> selected <?php endif; ?> value="Israel"> Israel
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Italy'): ?> selected <?php endif; ?> value="Italy"> Italy
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ivory Coast (Côte dIvoire)'): ?> selected <?php endif; ?>
                                        value="Ivory Coast (Côte dIvoire)"> Ivory Coast (Côte dIvoire)
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Jamaica'): ?> selected <?php endif; ?> value="Jamaica"> Jamaica
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Japan'): ?> selected <?php endif; ?> value="Japan"> Japan
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Jordan'): ?> selected <?php endif; ?> value="Jordan"> Jordan
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Kazakhstan'): ?> selected <?php endif; ?> value="Kazakhstan">
                                        Kazakhstan </option>
                                    <option <?php if($contact->contact->nationality == 'Kenya'): ?> selected <?php endif; ?> value="Kenya"> Kenya
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Kiribati'): ?> selected <?php endif; ?> value="Kiribati">
                                        Kiribati
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Kosovo'): ?> selected <?php endif; ?> value="Kosovo"> Kosovo
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Kuwait'): ?> selected <?php endif; ?> value="Kuwait"> Kuwait
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Kyrgyzstan'): ?> selected <?php endif; ?> value="Kyrgyzstan">
                                        Kyrgyzstan </option>
                                    <option <?php if($contact->contact->nationality == 'Laos'): ?> selected <?php endif; ?> value="Laos"> Laos
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Latvia'): ?> selected <?php endif; ?> value="Latvia"> Latvia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Lebanon'): ?> selected <?php endif; ?> value="Lebanon"> Lebanon
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Lesotho'): ?> selected <?php endif; ?> value="Lesotho"> Lesotho
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Liberia'): ?> selected <?php endif; ?> value="Liberia"> Liberia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Libya'): ?> selected <?php endif; ?> value="Libya"> Libya
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Liechtenstein'): ?> selected <?php endif; ?> value="Liechtenstein">
                                        Liechtenstein </option>
                                    <option <?php if($contact->contact->nationality == 'Lithuania'): ?> selected <?php endif; ?> value="Lithuania">
                                        Lithuania </option>
                                    <option <?php if($contact->contact->nationality == 'Luxembourg'): ?> selected <?php endif; ?> value="Luxembourg">
                                        Luxembourg </option>
                                    <option <?php if($contact->contact->nationality == 'Madagascar'): ?> selected <?php endif; ?> value="Madagascar">
                                        Madagascar </option>
                                    <option <?php if($contact->contact->nationality == 'Malawi'): ?> selected <?php endif; ?> value="Malawi"> Malawi
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Malaysia'): ?> selected <?php endif; ?> value="Malaysia">
                                        Malaysia </option>
                                    <option <?php if($contact->contact->nationality == 'Maldives'): ?> selected <?php endif; ?> value="Maldives">
                                        Maldives </option>
                                    <option <?php if($contact->contact->nationality == 'Mali'): ?> selected <?php endif; ?> value="Mali"> Mali
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Malta'): ?> selected <?php endif; ?> value="Malta"> Malta
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Marshall Islands'): ?> selected <?php endif; ?> value="Marshall Islands">
                                        Marshall Islands </option>
                                    <option <?php if($contact->contact->nationality == 'Mauritania'): ?> selected <?php endif; ?> value="Mauritania">
                                        Mauritania </option>
                                    <option <?php if($contact->contact->nationality == 'Mauritius'): ?> selected <?php endif; ?> value="Mauritius">
                                        Mauritius </option>
                                    <option <?php if($contact->contact->nationality == 'Mexico'): ?> selected <?php endif; ?> value="Mexico"> Mexico
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Micronesia'): ?> selected <?php endif; ?> value="Micronesia">
                                        Micronesia </option>
                                    <option <?php if($contact->contact->nationality == 'Moldova'): ?> selected <?php endif; ?> value="Moldova"> Moldova
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Monaco'): ?> selected <?php endif; ?> value="Monaco"> Monaco
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Mongolia'): ?> selected <?php endif; ?> value="Mongolia">
                                        Mongolia </option>
                                    <option <?php if($contact->contact->nationality == 'Montenegro'): ?> selected <?php endif; ?> value="Montenegro">
                                        Montenegro </option>
                                    <option <?php if($contact->contact->nationality == 'Morocco'): ?> selected <?php endif; ?> value="Morocco"> Morocco
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Mozambique'): ?> selected <?php endif; ?> value="Mozambique">
                                        Mozambique </option>
                                    <option <?php if($contact->contact->nationality == 'Myanmar (Burma)'): ?> selected <?php endif; ?> value="Myanmar (Burma)">
                                        Myanmar (Burma) </option>
                                    <option <?php if($contact->contact->nationality == 'Namibia'): ?> selected <?php endif; ?> value="Namibia"> Namibia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Nauru'): ?> selected <?php endif; ?> value="Nauru"> Nauru
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Nepal'): ?> selected <?php endif; ?> value="Nepal"> Nepal
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Netherlands'): ?> selected <?php endif; ?> value="Netherlands">
                                        Netherlands </option>
                                    <option <?php if($contact->contact->nationality == 'New'): ?> selected <?php endif; ?> value="New Zealand"> New
                                        Zealand </option>
                                    <option <?php if($contact->contact->nationality == 'Nicaragua'): ?> selected <?php endif; ?> value="Nicaragua">
                                        Nicaragua </option>
                                    <option <?php if($contact->contact->nationality == 'Niger'): ?> selected <?php endif; ?> value="Niger"> Niger
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Nigeria'): ?> selected <?php endif; ?> value="Nigeria"> Nigeria
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'North Macedonia (formerly Macedonia)'): ?> selected <?php endif; ?>
                                        value="North Macedonia (formerly Macedonia)"> North Macedonia (formerly
                                        Macedonia) </option>
                                    <option <?php if($contact->contact->nationality == 'Norway'): ?> selected <?php endif; ?> value="Norway"> Norway
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Oman'): ?> selected <?php endif; ?> value="Oman"> Oman
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Pakistan'): ?> selected <?php endif; ?> value="Pakistan">
                                        Pakistan </option>
                                    <option <?php if($contact->contact->nationality == 'Palau'): ?> selected <?php endif; ?> value="Palau"> Palau
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Palestine State'): ?> selected <?php endif; ?> value="Palestine State">
                                        Palestine State </option>
                                    <option <?php if($contact->contact->nationality == 'Panama'): ?> selected <?php endif; ?> value="Panama"> Panama
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Papua New Guinea'): ?> selected <?php endif; ?> value="Papua New Guinea">
                                        Papua New Guinea </option>
                                    <option <?php if($contact->contact->nationality == 'Paraguay'): ?> selected <?php endif; ?> value="Paraguay">
                                        Paraguay </option>
                                    <option <?php if($contact->contact->nationality == 'Peru'): ?> selected <?php endif; ?> value="Peru"> Peru
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Philippines'): ?> selected <?php endif; ?> value="Philippines">
                                        Philippines </option>
                                    <option <?php if($contact->contact->nationality == 'Poland'): ?> selected <?php endif; ?> value="Poland"> Poland
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Portugal'): ?> selected <?php endif; ?> value="Portugal">
                                        Portugal </option>
                                    <option <?php if($contact->contact->nationality == 'Qatar'): ?> selected <?php endif; ?> value="Qatar"> Qatar
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Romania'): ?> selected <?php endif; ?> value="Romania"> Romania
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Russia'): ?> selected <?php endif; ?> value="Russia"> Russia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Rwanda'): ?> selected <?php endif; ?> value="Rwanda"> Rwanda
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>
                                        value="Saint Kitts and Nevis"> Saint Kitts and Nevis
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Saint Lucia'): ?> selected <?php endif; ?> value="Saint Lucia">
                                        Saint Lucia </option>
                                    <option <?php if($contact->contact->nationality == 'Saint Vincent and the Grenadines'): ?> selected <?php endif; ?>
                                        value="Saint Vincent and the Grenadines"> Saint Vincent and the
                                        Grenadines </option>
                                    <option <?php if($contact->contact->nationality == 'Samoa'): ?> selected <?php endif; ?> value="Samoa"> Samoa
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'San Marino'): ?> selected <?php endif; ?> value="San Marino"> San
                                        Marino </option>
                                    <option <?php if($contact->contact->nationality == 'Sao Tome and Principe'): ?> selected <?php endif; ?>
                                        value="Sao Tome and Principe"> Sao Tome and Principe
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Saudi Arabia'): ?> selected <?php endif; ?> value="Saudi Arabia">
                                        Saudi Arabia </option>
                                    <option <?php if($contact->contact->nationality == 'Senegal'): ?> selected <?php endif; ?> value="Senegal"> Senegal
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Serbia'): ?> selected <?php endif; ?> value="Serbia"> Serbia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Seychelles'): ?> selected <?php endif; ?> value="Seychelles">
                                        Seychelles </option>
                                    <option <?php if($contact->contact->nationality == 'Sierra Leone'): ?> selected <?php endif; ?> value="Sierra Leone">
                                        Sierra Leone </option>
                                    <option <?php if($contact->contact->nationality == 'Singapore'): ?> selected <?php endif; ?> value="Singapore">
                                        Singapore </option>
                                    <option <?php if($contact->contact->nationality == 'Slovakia'): ?> selected <?php endif; ?> value="Slovakia">
                                        Slovakia </option>
                                    <option <?php if($contact->contact->nationality == 'Slovenia'): ?> selected <?php endif; ?> value="Slovenia">
                                        Slovenia </option>
                                    <option <?php if($contact->contact->nationality == 'Solomon Islands'): ?> selected <?php endif; ?> value="Solomon Islands">
                                        Solomon Islands </option>
                                    <option <?php if($contact->contact->nationality == 'Somalia'): ?> selected <?php endif; ?> value="Somalia"> Somalia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'South Africa'): ?> selected <?php endif; ?> value="South Africa">
                                        South Africa </option>
                                    <option <?php if($contact->contact->nationality == 'South Korea'): ?> selected <?php endif; ?> value="South Korea">
                                        South Korea </option>
                                    <option <?php if($contact->contact->nationality == 'South Sudan'): ?> selected <?php endif; ?> value="South Sudan">
                                        South Sudan </option>
                                    <option <?php if($contact->contact->nationality == 'Spain'): ?> selected <?php endif; ?> value="Spain"> Spain
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Sri Lanka'): ?> selected <?php endif; ?> value="Sri Lanka"> Sri
                                        Lanka </option>
                                    <option <?php if($contact->contact->nationality == 'Sudan'): ?> selected <?php endif; ?> value="Sudan"> Sudan
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Suriname'): ?> selected <?php endif; ?> value="Suriname">
                                        Suriname </option>
                                    <option <?php if($contact->contact->nationality == 'Sweden'): ?> selected <?php endif; ?> value="Sweden"> Sweden
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Switzerland'): ?> selected <?php endif; ?> value="Switzerland">
                                        Switzerland </option>
                                    <option <?php if($contact->contact->nationality == 'Syria'): ?> selected <?php endif; ?> value="Syria"> Syria
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Taiwan'): ?> selected <?php endif; ?> value="Taiwan"> Taiwan
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Tajikistan'): ?> selected <?php endif; ?> value="Tajikistan">
                                        Tajikistan </option>
                                    <option <?php if($contact->contact->nationality == 'Tanzania'): ?> selected <?php endif; ?> value="Tanzania">
                                        Tanzania </option>
                                    <option <?php if($contact->contact->nationality == 'Thailand'): ?> selected <?php endif; ?> value="Thailand">
                                        Thailand </option>
                                    <option <?php if($contact->contact->nationality == 'Togo'): ?> selected <?php endif; ?> value="Togo"> Togo
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Tonga'): ?> selected <?php endif; ?> value="Tonga"> Tonga
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Trinidad and Tobago'): ?> selected <?php endif; ?>
                                        value="Trinidad and Tobago"> Trinidad and Tobago </option>
                                    <option <?php if($contact->contact->nationality == 'Tunisia'): ?> selected <?php endif; ?> value="Tunisia"> Tunisia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Turkey'): ?> selected <?php endif; ?> value="Turkey"> Turkey
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Turkmenistan'): ?> selected <?php endif; ?> value="Turkmenistan">
                                        Turkmenistan </option>
                                    <option <?php if($contact->contact->nationality == 'Tuvalu'): ?> selected <?php endif; ?> value="Tuvalu"> Tuvalu
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Uganda'): ?> selected <?php endif; ?> value="Uganda"> Uganda
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Ukraine'): ?> selected <?php endif; ?> value="Ukraine"> Ukraine
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'United Arab Emirates'): ?> selected <?php endif; ?>
                                        value="United Arab Emirates"> United Arab Emirates
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'United Kingdom'): ?> selected <?php endif; ?> value="United Kingdom">
                                        United Kingdom </option>
                                    <option <?php if($contact->contact->nationality == 'United States of America'): ?> selected <?php endif; ?>
                                        value="United States of America"> United States of America
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Uruguay'): ?> selected <?php endif; ?> value="Uruguay"> Uruguay
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Uzbekistan'): ?> selected <?php endif; ?> value="Uzbekistan">
                                        Uzbekistan </option>
                                    <option <?php if($contact->contact->nationality == 'Vanuatu'): ?> selected <?php endif; ?> value="Vanuatu"> Vanuatu
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Vatican City'): ?> selected <?php endif; ?> value="Vatican City">
                                        Vatican City </option>
                                    <option <?php if($contact->contact->nationality == 'Venezuela'): ?> selected <?php endif; ?> value="Venezuela">
                                        Venezuela </option>
                                    <option <?php if($contact->contact->nationality == 'Vietnam'): ?> selected <?php endif; ?> value="Vietnam"> Vietnam
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Yemen'): ?> selected <?php endif; ?> value="Yemen"> Yemen
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Zambia'): ?> selected <?php endif; ?> value="Zambia"> Zambia
                                    </option>
                                    <option <?php if($contact->contact->nationality == 'Zimbabwe'): ?> selected <?php endif; ?> value="Zimbabwe">
                                        Zimbabwe </option>

                                </select>
                            </div>
                            <div class="col-12">
                                <label for="description" class="cv-parse-lable mb-2">Description</label>
                                <textarea class="form-control" id="description" name="about" style="height: 200px;"><?php echo e($contact->contact->about); ?></textarea>
                            </div>
                            <div class="col-12 d-flex align-items-center justify-content-between">
                                <div>
                                    <a href="<?php echo e(route('candidates.cvParser.skills')); ?>"
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
                        <img src="<?php echo e(asset('/images/cv-view-vector.png')); ?>" alt=""
                            class="cv-view-bg-voctor img-fluid">
                        <div class="cv-view-header">
                            <img src="<?php echo e(asset('/images/cv-head.png')); ?>" alt="Erec logo" class="img-fluid">
                        </div>
                        <div class="cv-view-body position-relative">
                            <?php if($contact->contact->cv_profile != null): ?>
                                <img src="<?php echo e(asset('storage/' . $contact->contact->cv_profile)); ?>" alt="profile2"
                                    class="cv-view-profile-image">
                            <?php else: ?>
                                <img src="<?php echo e(asset('/images/image_preview_noimage.png')); ?>" alt="profile2"
                                    class="cv-view-profile-image">
                            <?php endif; ?>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h3 class="cv-profile-name"><?php echo e($contact->contact->name); ?>

                                        <?php echo e($contact->contact->father_name); ?>

                                    </h3>
                                    <h4 class="cv-profile-title"> <?php echo e($contact->contact->title); ?></h4>
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
                                            <?php echo e($contact->contact->location); ?>

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
                                            <?php echo e($contact->contact->phone); ?>

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
                                            <?php echo e($contact->contact->email); ?>

                                        </span>
                                    </p>
                                </div>
                            </div>
                            <ul class="d-flex flex-wrap cv-view-skills gap-2 mt-4" id="skillsItemsUl">
                                <?php $__currentLoopData = $contact->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php echo e($row->skill); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <hr>
                            <div style="margin-bottom: 14px;">
                                <div id="descriptionWrapper">
                                    <h3 class="cv-profile-name" style="margin-bottom: 8px;">About</h3>
                                    <p class="cv-text-primary" id="descriptionView">
                                        <?php echo e($contact->contact->about); ?>

                                    </p>
                                </div>
                                <div class="row gy-3 pt-3 mb-4">
                                    <div class="col-lg-6" id="dateOfBirthWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Date Of Birth
                                        </h4>
                                        <p class="cv-text-primary" id="dateOfBirthView"><?php echo e($contact->contact->dob); ?></p>
                                    </div>
                                    <div class="col-lg-6" id="maritalStatusWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Marital Status
                                        </h4>
                                        <p class="cv-text-primary" id="maritalStatusView">
                                            <?php echo e($contact->contact->marital_status); ?></p>
                                    </div>
                                    <div class="col-lg-6" id="visaStatusWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Visa Status
                                        </h4>
                                        <p class="cv-text-primary" id="visaStatusView">
                                            <?php echo e($contact->contact->visa_status); ?>

                                        </p>
                                    </div>
                                    <div class="col-lg-6" id="nationalityWrapper">
                                        <h4 class="cv-text-primary text-uppercase fw-bold mb-1" style="font-size: 16px;">
                                            Nationality
                                        </h4>
                                        <p class="cv-text-primary" id="nationalityView">
                                            <?php echo e($contact->contact->nationality); ?>

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

<?php $__env->stopSection(); ?>
<?php $__env->startSection('bottom_script'); ?>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidatepanel/pages/resumeParser/cvParserAbout.blade.php ENDPATH**/ ?>