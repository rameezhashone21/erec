<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    
    
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-md-4 p-2">
            <div class="d-md-flex aling-items-center mb-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center mb-3">Job Experience</h2>
                <a class="btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto" href="javascript:;" role="button"
                    data-bs-toggle="modal" data-bs-target="#newExperience"> Add New Experience
                </a>
                
                <div class="modal fade" id="newExperience" tabindex="-1" aria-labelledby="newExperienceLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="border-bottom pb-3 d-flex justify-content-between align-items-center mb-3">
                                    <h2 class="fw-500 text_primary fs-5 align-self-center">
                                        Add New Experience
                                    </h2>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form id="firstform-create" class="dashboard-form" method="post"
                                    action="<?php echo e(route('candidates.profession.update')); ?>" enctype="multipart/form-data"
                                    name="myForm">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('post'); ?>
                                    <input type="hidden" name="source" value="api" />
                                    <div class="row gy-3">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="designation"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Designation*</label>
                                                <input type="text" title="suggestion" class="form-control fs-14 h-50px"
                                                    name="designation[]" placeholder="Please enter your designation"
                                                    id="newDesignation" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="company_name"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Company*</label>
                                                <input type="text" class="form-control fs-14 h-50px"
                                                    name="company_name[]" placeholder="Please enter your company name"
                                                    id="newCompany_name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="comp_loc"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Company
                                                    Location*</label>
                                                <select id="newComp_loc" class="form-select fs-14 h-50px" name="comp_loc[]"
                                                    required>
                                                    <option value="">Please select your company
                                                        location
                                                    </option>
                                                    <option selected disabled value="">Select
                                                        Country</option>
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
                                                    <option value="Democratic Republic of the Congo (Congo-Kinshasa)">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="currency"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Currency*</label>
                                                <select id="newCurrency" class="form-select fs-14 h-50px"
                                                    name="currency[]" required>
                                                    <option value="">Please select your currency
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
                                                    <option value="Democratic Republic of the Congo (Congo-Kinshasa)">
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="salary"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Salary*</label>
                                                <input type="text" class="form-control fs-14 h-50px" name="salary[]"
                                                    placeholder="Please enter your salary" id="newSalary" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description"
                                                    class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                                <textarea class="form-control fs-14 descriptionTextarea" maxlength="250" id="newDescription" name="description[]"></textarea>
                                                <div class="text_primary characters" style="font-size: 12px;">
                                                    <span id="count"></span>
                                                    Character(s) Remaining
                                                </div>
                                            </div>
                                        </div>
                                        <!-- <div class="col-md-6"></div> -->
                                        <div class="col-12">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-check">
                                                        <input class="form-check-input checkYearBox" type="checkbox"
                                                            onchange='changeToDate()' value="0" name="year_exp[]"
                                                            id="currentlyWorkHere" checked>
                                                        <label class="form-check-label fs-14" for="currentlyWorkHere">
                                                            Currently Working Here
                                                        </label>
                                                    </div>
                                                </div>  
                                                <div class="d-md-flex align-items-center ">
                                                    <div class="">
                                                        <span class="form-label fs-14 text-theme-primary fw-bold">
                                                            Start Date
                                                        </span>
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control datepicker fs-14 h-50px w-100 checkStartBox"
                                                                placeholder="dd/mm/yyyy" autocomplete="off"
                                                                id='fromDate' name="month_exp[]" required=""
                                                                readonly>
                                                            <label class="calender-icon d-block" for="fromDate">
                                                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="mx-md-4 mt-md-3 py-2 py-md-0">
                                                        -To-
                                                    </div>
                                                    <div class="">
                                                        <span class="form-label fs-14 text-theme-primary fw-bold">End
                                                            Date</span>
                                                        <div class="position-relative">
                                                            <input type="text"
                                                                class="form-control datepicker fs-14 h-50px w-100 checkYearBox"
                                                                placeholder="dd/mm/yyyy" autocomplete="off"
                                                                id="toDate" name="year_exp[]" disabled=""
                                                                required="" readonly>
                                                            <label class="calender-icon d-block" for="toDate">
                                                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="btn_viewall fw-500 px-4 py-2 d-inline-block">
                                                    Save </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div>
            <?php if(isset(auth()->user()->candidatePro)): ?>
                <?php $__currentLoopData = $user->candidatePro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="border-bottom py-3" id="proDiv-<?php echo e($row->id); ?>">
                        <div class="d-md-flex">
                            <div class="me-3 d-none d-md-block">
                                <img src="<?php echo e(asset('/dashboard/images/suitcase_new.svg')); ?>" alt=""
                                    class="">
                            </div>
                            <div class="flex-grow-1">
                                <div class="d-flex justify-content-between">
                                    <h3 class="fw-500 fs-5 mb-1" id="designationText-<?php echo e($row->id); ?>">
                                        <?php echo e($row->designation); ?>

                                    </h3>
                                    <a class="me-3 d-inline-block ms-auto text_grey_999" data-bs-toggle="tooltip"
                                        data-bs-placement="top" onclick="btn_edit(<?php echo e($row->id); ?>)" title="Edit"
                                        href="javascript:;">
                                        <span role="button" data-bs-toggle="modal" data-bs-target="#editExperience"><i
                                                class="fa-solid fa-pencil "></i></span>
                                    </a>
                                    <a class="d-inline-block  text_grey_999" role="button" data-bs-toggle="tooltip"
                                        data-bs-placement="top" title="Delete" onclick="callModal(<?php echo e($row->id); ?>)">
                                        <i class="fas fa-trash-alt"></i></a>
                                    
                                    

                                    
                                </div>
                                <h4 class="fw-500" id="company_nameText-<?php echo e($row->id); ?>"><?php echo e($row->company_name); ?></h4>
                                <div class="text_grey_999 fs-14 mt-3 d-flex align-items-center" style="gap: 0 8px;">
                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15">
                                        <path id="Shape"
                                            d="M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z"
                                            fill="#92929d" />
                                    </svg>
                                    <span id="ExperienceText-<?php echo e($row->id); ?>">
                                        Experience:
                                         <?php if($row->year_exp != 0): ?>
                                            <?php if(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y
                                                                                                                                                                                                                                                                                                                                                                                                                                                  years, %m months') <
                                                    1): ?>
                                                 <p>Less than a month</p>
                                            <?php elseif(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months') < 2): ?>
                                                <?php echo e(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y year, %m months')); ?>

                                            <?php else: ?>
                                                <?php echo e(date_diff(date_create($row->month_exp), date_create($row->year_exp))->format('%y years, %m months')); ?>

                                            <?php endif; ?>
                                        <?php else: ?>
                                            <p class="d-inline">
                                                <?php echo e(\Carbon\Carbon::parse($row->month_exp)->isoFormat('MMM YY')); ?>

                                                - Currently working here.</p>
                                        <?php endif; ?>
                                    </span>
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
                                    <span id="comp_locText-<?php echo e($row->id); ?>">
                                        Located:
                                        <?php echo e($row->comp_loc); ?>

                                    </span>
                                </div>
                                <p class="text_grey_999 fs-14 mt-3" id="descriptionText-<?php echo e($row->id); ?>">
                                    <?php echo $row->description; ?>

                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- Modal -->
    
    <div class="modal fade" id="editExperience" tabindex="-1" aria-labelledby="editExperienceLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="border-bottom pb-3 d-flex justify-content-between align-items-center mb-3">
                        <h2 class="fw-500 text_primary fs-5 align-self-center">
                            Edit Experience
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="firstform" data-attr="" disabled class="dashboard-form-2 dashboard-form-2 dashboard-form"
                        enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('post'); ?>
                        <input type="hidden" name="pro_id" value="" id="pro_id">
                        <input type="hidden" name="source" value="api" />
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation"
                                        class="form-label fs-14 text-theme-primary fw-bold">Designation</label>
                                    <input type="text" class="form-control fs-14 h-50px" name="designation"
                                        placeholder="Designation" value="" id="designation" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="company_name"
                                        class="form-label fs-14 text-theme-primary fw-bold">Company</label>
                                    <input type="text" class="form-control fs-14 h-50px" name="company_name"
                                        placeholder="Company" id="company_name" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="comp_loc" class="form-label fs-14 text-theme-primary fw-bold">Company
                                        Location</label>
                                    <select id="comp_loc" class="form-select fs-14  h-50px" name="comp_loc">
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="currency"
                                        class="form-label fs-14 text-theme-primary fw-bold">Currency</label>
                                    <select id="currency" class="form-select fs-14  h-50px" name="currency">
                                        <option selected disabled value="">Select Currency</option>
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
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salary"
                                        class="form-label fs-14 text-theme-primary fw-bold">Salary</label>
                                    <input type="text" class="form-control fs-14 h-50px" name="salary"
                                        id="salary" placeholder="Salary" value="" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description"
                                        class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                    <textarea class="form-control fs-14 description_role-edit" maxlength="250" name="description" id="description"></textarea>
                                    <div class="text_primary characters" style="font-size: 12px;">
                                        <span id="description_roleChars"></span>
                                        Character(s) Remaining
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6"></div> -->
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <input class="form-check-input" name="year_exp" type="checkbox"
                                            onchange="changeToDateUpdate()" value="0"
                                            id="currentlyWorkHereUpdate" checked>
                                        <label class="form-check-label fs-14" for="currentlyWorkHereUpdate">
                                            Currently Working Here
                                        </label>
                                    </div>
                                </div>
                                <div class="d-md-flex align-items-center ">
                                    <div class="">
                                        <span class="form-label fs-14 text-theme-primary fw-bold">Start
                                            Date</span>
                                        <div class="position-relative">
                                            <input type="text" class="form-control datepicker fs-14 h-50px w-100"
                                                placeholder="mm/dd/yyyy" autocomplete="off" id='fromDateUpdate'
                                                name="month_exp" required="" readonly>
                                            <label class="calender-icon d-block" for="fromDateUpdate">
                                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="mx-md-4 mt-md-3 py-2 py-md-0">
                                        -To-
                                    </div>
                                    <div class="">
                                        <span class="form-label fs-14 text-theme-primary fw-bold">End
                                            Date</span>
                                        <div class="position-relative">
                                            <input type="text" class="form-control datepicker fs-14 h-50px w-100"
                                                placeholder="mm/dd/yyyy" autocomplete="off" id="toDateUpdate"
                                                name="year_exp" disabled="" required="" readonly>
                                            <label class="calender-icon d-block" for="toDateUpdate">
                                                <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <button type="submit" class=" btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>

    <script>
        function btn_edit(value) {
            // console.log(value);
            var url = '<?php echo e(route('candidates.professionupdate', ': id ')); ?>';
            url = url.replace(':id', value);
            $.ajax({
                type: 'GET',
                url: url,
                crossDomain: true,
                success: function(data) {
                    console.log(data);
                    $("#pro_id").val(data['id']);
                    // $("#fromDate").val(data['fromDate']);
                    // $("#fromDateUpdate").val(data['month_exp']);
                    $("#fromDate").datepicker('setDate', data['fromDate']);
                    $("#fromDateUpdate").datepicker('setDate', data['month_exp']);
                    $("#designation").val(data['designation']);
                    $("#company_name").val(data['company_name']);
                    $("#comp_loc").val(data['comp_loc']);
                    $("#currency").val(data['currency']);
                    $("#salary").val(data['salary']);
                    $("#description").val(data['description']);
                    // $("#currentlyWorkHereUpdate").
                    if (data['year_exp'] == 0 || data['year_exp'] == null) {
                        $("#currentlyWorkHereUpdate").attr("checked", true);
                    } else {
                        $('#toDateUpdate').val(data['year_exp']);
                        $("#currentlyWorkHereUpdate").attr("checked", false);
                    }
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
            var href = '<?php echo e(route('candidates.profession.delete', '')); ?>';
            newhref = href + '/' + id;
            // $('#staticBackdrop').modal('show');
            // var myModal = $('#staticBackdrop').modal({
            //     keyboard: false
            // });

            // myModal.toggle();
            $('#delete-edu').attr('href', newhref);
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
                    confirmButtonText: "<a class='text-white' id='delete-edu' href='<?php echo e(route('candidates.profession.delete', '')); ?>/" +
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
            // $("#staticBackdrop").modal();
            // console.log(newhref);
        }

        $(document).ready(function() {

            $('.dashboard-form').on('submit', function(e) {
                e.preventDefault();
                var userFormData = $(this).serialize();
                id = $(this).attr('data-attr');
                formid = $(this).attr('id');
                var profession_id = $(this).find('#pro_id').val();
                console.log(formid);
                console.log($("#currentlyWorkHere").val());
                console.log($("#toDate").val());
                // if (myForm.year_exp.value == '' && myForm.year_exp.value == '') {
                if (!$("#currentlyWorkHere").is(":checked") && $("#toDate").val() == '') {
                    if ($("#fromDate").val() == '' && $("#toDate").val() == '') {
                        // alert('Start Date field is required...');
                        errorModal('Start Date field is required...');
                        return false;
                    } else {
                        // alert('End Date field is required...');
                        errorModal('End Date field is required...');
                        return false;
                    }
                } else if (!$("#currentlyWorkHereUpdate").is(":checked") && $("#toDateUpdate").val() ==
                    '') {
                    if ($("#fromDateUpdate").val() == '' && $("#toDateUpdate").val() == '') {
                        // alert('Start Date field is required...');
                        errorModal('Start Date field is required...');
                        return false;
                    } else {
                        // alert('End Date field is required...');
                        errorModal('End Date field is required...');
                        return false;
                    }
                } else {
                    $.ajax({
                            url: "<?php echo e(route('candidates.profession.update')); ?>",
                            type: "POST",
                            data: userFormData,
                            dataType: "json",
                            encode: true,
                        }).done(function(data) {
                            console.log(data);
                            if (data[0] != "error") {
                                if (formid != "firstform-create") {
                                    // console.log($($('#editExperience #designation').val());
                                    $("#designationText-" + profession_id).html($(
                                        '#editExperience #designation').val());
                                    // $("#education-"+profession_id).html($('#editExperience #education_new_role').val() +"-"+ $('#editExperience #Course_role').val());
                                    $("#company_nameText-" + profession_id).html($(
                                        '#editExperience #company_name').val());
                                    $("#ExperienceText-" + profession_id).html('');
                                    $("#ExperienceText-" + profession_id).html("Experience: " + data[
                                        'date_diff'] + "");

                                    $("#comp_locText-" + profession_id).html($(
                                        '#editExperience #comp_loc').val());
                                    $("#descriptionText-" + profession_id).html($(
                                        '#editExperience #description').val());


                                } else {
                                    var newDesignation = $("#newDesignation").val();
                                    var newCompany_name = $("#newCompany_name").val();
                                    var newComp_loc = $("#newComp_loc").val();
                                    var newCurrency = $("#newCurrency").val();
                                    var newSalary = $("#newSalary").val();
                                    var newDescription = $("#newDescription").val();
                                    var checkStartBox = $(".checkStartBox").val();
                                    var checkYearBox = $(".checkYearBox").val();
                                    var html = "";
                                    html += "<div class='border-bottom py-3' id='proDiv-" + data[
                                        'SendingProId'] + "'>";
                                    html += "<div class='d-flex'>";
                                    html += "<div class='me-3 d-none d-md-block'>";
                                    html +=
                                        "<img src='<?php echo e(asset('/dashboard/images/suitcase_new.svg')); ?>' alt='' class=''>";
                                    html += "</div>";
                                    html += "<div class='flex-grow-1'>";
                                    html += "<div class='d-flex justify-content-between'>";
                                    html += "<h3 class='fw-500 fs-5 mb-1' id='designationText-" + data[
                                        'SendingProId'] + "'>";
                                    html += "" + newDesignation + "</h3>";
                                    html +=
                                        "<a class='me-3 d-inline-block ms-auto text_grey_999' data-bs-toggle='tooltip' data-bs-placement='top'";
                                    html += "onclick='btn_edit(" + data['SendingProId'] +
                                        ")' title='Edit' href='javascript:;'>";
                                    html +=
                                        "<span role='button' data-bs-toggle='modal' data-bs-target='#editExperience'><i class='fa-solid fa-pencil '></i></span></a>";
                                    html +=
                                        "<a class='d-inline-block text_grey_999' role='button' data-bs-toggle='tooltip' data-bs-placement='top'";
                                    html += "title='Delete' onclick='callModal(" + data[
                                            'SendingProId'] +
                                        ")'>";
                                    html += "<i class='fas fa-trash-alt'></i></a>";
                                    html += "";
                                    html += "";
                                    html += "";
                                    html += "</div>";
                                    html += "<h4 class='fw-500' id='company_nameText-" + data[
                                            'SendingProId'] +
                                        "'>" + newCompany_name + "</h4>";
                                    html +=
                                        "<div class='text_grey_999 fs-14 mt-3 d-flex align-items-center' style='gap: 0 8px;'>";
                                    html += "";
                                    html +=
                                        "<svg xmlns='http://www.w3.org/2000/svg' width='15' height='15' viewBox='0 0 15 15'>";
                                    html += "<path id='Shape'";
                                    html +=
                                        "d='M12.75,15H2.25A2.252,2.252,0,0,1,0,12.75V2.775A1.427,1.427,0,0,1,1.425,1.35h1.95V.75a.75.75,0,0,1,1.5,0v.6H10.8V.75a.75.75,0,0,1,1.5,0v.6h1.275A1.427,1.427,0,0,1,15,2.775V12.75A2.252,2.252,0,0,1,12.75,15ZM1.5,5.55v7.2a.751.751,0,0,0,.75.75h10.5a.751.751,0,0,0,.75-.75V5.55Zm0-2.7v1.2h12V2.85H12.3a.75.75,0,0,1-1.493,0H4.872a.75.75,0,0,1-1.493,0Zm7.35,8.1H3.45a.75.75,0,0,1,0-1.5h5.4a.75.75,0,0,1,0,1.5Zm-2.7-2.7H3.45a.75.75,0,0,1,0-1.5h2.7a.75.75,0,0,1,0,1.5Z'";
                                    html += "fill='#92929d' />";
                                    html += "</svg>";
                                    html += "<span id='ExperienceText-" + data['SendingProId'] + "'>";
                                    html += "Experience: " + data['date_diff'] + "";
                                    html += "</span>";
                                    html += "</div>";
                                    html +=
                                        "<div class='text_grey_999 fs-14 mt-1 d-flex align-items-center' style='gap: 0 8px;'>";
                                    html += "";
                                    html +=
                                        "<svg xmlns='http://www.w3.org/2000/svg' width='14.239' height='16.958' viewBox='0 0 14.239 16.958'>";
                                    html +=
                                        "<g id='Icon_feather-map-pin' data-name='Icon feather-map-pin' transform='translate(1 1)'>";
                                    html += "<path id='Path_3207' data-name='Path 3207'";
                                    html +=
                                        "d='M16.739,7.619c0,4.759-6.119,8.839-6.119,8.839S4.5,12.379,4.5,7.619a6.119,6.119,0,1,1,12.239,0Z'";
                                    html +=
                                        "transform='translate(-4.5 -1.5)' fill='none' stroke='#92929d' stroke-linecap='round'";
                                    html += "stroke-linejoin='round' stroke-width='2' />";
                                    html += "<path id='Path_3208' data-name='Path 3208'";
                                    html +=
                                        "d='M17.707,12.6a2.1,2.1,0,1,1-2.1-2.1,2.1,2.1,0,0,1,2.1,2.1Z'";
                                    html +=
                                        "transform='translate(-9.484 -6.468)' fill='none' stroke='#92929d' stroke-linecap='round'";
                                    html += "stroke-linejoin='round' stroke-width='2' />";
                                    html += "</g>";
                                    html += "</svg>";
                                    html += "<span id='comp_locText-" + data['SendingProId'] +
                                        "'>Located:" +
                                        newComp_loc + "</span>";
                                    html += "</div>";
                                    html += "<p class='text_grey_999 fs-14 mt-3' id='descriptionText-" +
                                        data[
                                            'SendingProId'] + "'>" + newDescription + "";
                                    html += "</p>";
                                    html += "</div>";
                                    html += "</div>";
                                    html += "</div>";
                                    $('.dashboard_content').append(html);
                                }
                                $(".dashboard-form-2-" + id + " .form-control").attr("disabled", true);
                                $("#firstform" + id + "").removeAttr("disabled", true);
                                $(".dashboard-form-2-" + id + " .form-select").attr("disabled", true);
                                $(".dashboard-form-2-" + id + " #updateButton").css('display', 'none');
                                successModal("Your Data Has Been Successfully Updated...");
                                $('#newExperience').modal('hide');
                                $('#editExperience').modal('hide');
                                // console.log('error');
                                $("#firstform")[0].reset();
                                $("#firstform-create")[0].reset();
                                datepickerToday();
                            } else {
                                var errors = data[1].responseJSON;
                                console.log(errors)
                                errorModal(data[1]);
                            }
                        })
                        .fail(function(error) {
                            var errors = error.responseJSON;
                            console.log(errors.errors['month_exp.0']);
                            if (errors.errors['designation.0']) {
                                errorModal('Designation field is required...');
                            }
                            if (errors.errors['company_name.0']) {
                                errorModal('Company field is required...');
                            }
                            if (errors.errors['comp_loc.0']) {
                                errorModal('Company Location field is required...');
                            }
                            if (errors.errors['currency.0']) {
                                errorModal('Currency field is required...');
                            }
                            if (errors.errors['salary.0']) {
                                errorModal('Salary field is required...');
                            }
                            // if (errors.errors['year_exp.0']) {
                            //     errorModal('Start date field is required...');
                            // }
                            if (errors.errors['month_exp.0']) {
                                errorModal('Start date field is required...');
                            }
                            // errorModal(errors['message']);

                        });
                }


            });

        });
        // start description textarea count
        var descriptionTextarea = $('.descriptionTextarea').val().length;
        $('#count').text(250 - descriptionTextarea);
        var maxLength2 = 250;
        $('.descriptionTextarea').keyup(function() {
            var textlen = maxLength2 - $(this).val().length;
            $('#count').text(textlen);
        });
        // end description textarea count

        // start description edit textarea count
        var maxLengthEducation = 250;
        $('.description_role-edit').keydown(function() {
            // console.log("check");
            var textlen = maxLengthEducation - $(this).val().length;
            $('#description_roleChars').text(textlen);
        });
        // end description edit textarea count  imran
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidatepanel/pages/profession.blade.php ENDPATH**/ ?>