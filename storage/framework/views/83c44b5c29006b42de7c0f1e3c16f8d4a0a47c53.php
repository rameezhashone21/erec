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
            <?php if(session($key ?? 'error')): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo session($key ?? 'error'); ?>

                </div>
            <?php endif; ?>

            
            <div class="mb-4 pb-4 border-bottom">
                <form id="firstform">
                    <?php echo csrf_field(); ?>
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
                                value="<?php echo e($user->first_name); ?>" id="firstName">
                        </div>
                        <div class="col-md-6">
                            <label for="lastName" class="form-label fs-14 text-theme-primary">Last Name</label>
                            <input disabled type="text" class="form-control" name="last_name"
                                value="<?php echo e($user->last_name); ?>" id="lastName">
                        </div>
                        <div class="col-md-6">
                            <label for="gender" class="form-label fs-14 text-theme-primary">Gender</label>
                            <div class="gender-show" style="font-size: 15px; color: #92929d;">
                                <?php if($user->gender == 'Male'): ?>
                                    Male
                                <?php elseif($user->gender == 'Female'): ?>
                                    Female
                                <?php endif; ?>
                            </div>
                            <div class="gender-edit " style="display: none;">
                                <select id="gender" class="form-select" name="gender">
                                    <option value="Male" <?php if($user->gender == 'Male'): ?> selected <?php endif; ?>>Male</option>
                                    <option value="Female" <?php if($user->gender == 'Female'): ?> selected <?php endif; ?>>Female
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="dateOfBirth" class="form-label fs-14 text-theme-primary">Date Of Birth</label>
                            <div class="position-relative">
                                <input disabled type="text" value="<?php echo e($user->dob); ?>" name="dob"
                                    class="form-control datepicker bg_transparent_disable" placeholder="15-Dec-2000"
                                    id="dateOfBirth" readonly>
                                <label class="calender-icon-2 " for="dateOfBirth" style="display: none;">
                                    <i class="far fa-calendar-alt" aria-hidden="true"></i>
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="tagline" class="form-label fs-14 text-theme-primary">Tag line</label>
                            <textarea disabled id="tagline" maxlength="150" class="form-control" name="tagline"><?php echo $user->tagline; ?></textarea>
                            <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                    id="taglineChars"></span>
                                Character(s)
                                Remaining</div>
                        </div>
                        <div class="col-12">
                            <label for="aboutText" class="form-label fs-14 text-theme-primary">About</label>
                            <textarea disabled id="aboutText" maxlength="500" class="form-control" name="head_line"><?php echo $user->head_line; ?></textarea>
                            <div class="text_primary characters" style="font-size: 12px; display: none;"><span
                                    id="aboutTextChars"></span>
                                Character(s)
                                Remaining</div>
                        </div>
                    </div>
                </form>
            </div>
            
            
            <div class="mb-4 pb-4 border-bottom">
                <form id="skillsForm">
                    <?php echo csrf_field(); ?>
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
                        <input type="hidden" value="<?php echo e($userCs->skills); ?>" id="skills-hidden-input" />
                        <input type="hidden" value="<?php echo e($skill); ?>" id="skills-all-hidden-input" />
                        <ul class="tags text">
                            <?php if(isset(auth()->user()->skills)): ?>

                                <?php $__currentLoopData = $userCs->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <a href="javascript:void 0;" return false;"><?php echo e($row->name); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </ul>
                        <div class="txt-editor">
                            <select name="skills[]" class="select2-multiple form-control skilled-select__2"
                                id="select2" multiple>
                                <?php $__currentLoopData = $skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>"
                                        <?php $__currentLoopData = $userCs->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($item->id == $row->id): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        <?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                        
                    </div>
                </form>
            </div>
            

            
            <div class="mb-4 pb-4 border-bottom">
                <form id="secondform">
                    <?php echo csrf_field(); ?>
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
                                <span class="country-code"><?php echo e($user->country_code); ?></span> <span
                                    class="contact-number"><?php echo e($user->number); ?></span>
                            </div>
                            <div class="edit-phone-number" style="display: none;">
                                <div class="single-field full-width phone-input-flag d-flex ">
                                    <input type="tel" class="mobile-number form-control fs-14 h-50px"
                                        style="color: transparent;" id="countryCode" name="country_code"
                                        value="<?php echo e($user->country_code); ?>">
                                    <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                                        placeholder="Phone Number" id="contactNumber" maxlength="11" name="number"
                                        value="<?php echo e($user->number); ?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddress" class="form-label fs-14 text-theme-primary">Email</label>
                            <input type="email" class="form-control" id="emailAddress" name="email"
                                value="<?php echo e($user->email); ?>" disabled readonly>
                        </div>
                        
                        <div class="col-md-6">
                            <label for="" class="form-label fs-14 text-theme-primary">Street
                                Address *</label>
                            <input id="searchInput" value="<?php echo e($user->address); ?>"
                                class="controls form-control input-login searchInput" name="address" type="text"
                                placeholder="" required autocomplete="off" disabled>
                            <input type="hidden" id="latitude" value="<?php echo e($user->latitude); ?>" name="lat" />
                            <input type="hidden" id="longitude" value="<?php echo e($user->longitude); ?>" name="lng" />

                        </div>
                        <div class="col-md-3">
                            <label for="country" class="form-label fs-14 text-theme-primary">Country</label>
                            <input type="text" class="form-control input-login" id="country" name="country"
                                value="<?php echo e($user->country); ?>" placeholder="" required disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="city" class="form-label fs-14 text-theme-primary">City</label>
                            <input type="text" class="form-control input-login" id="city" name="city"
                                placeholder="" value="<?php echo e($user->city); ?>" required disabled>
                        </div>
                        <div class="col-md-3">
                            <label for="zip_code" class="form-label fs-14 text-theme-primary">Zip/Postal
                                Code</label>
                            <input type="text" class="form-control input-login" value="<?php echo e($user->zipCode); ?>"
                                id="zip_code" name="postal_code" placeholder="" disabled>
                        </div>
                    </div>
                </form>
            </div>
            

            
            <div class="mb-4 pb-4 border-bottom">
                <form id="thirdform">
                    <?php echo csrf_field(); ?>
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
                                <?php echo e($user->nationality); ?>

                            </div>
                            <div class="nationality-edit" style="display: none;">
                                <select id="nationality" class="form-select" name="nationality">
                                    <option disabled>Please Select Nationality</option>
                                    <option value="Afghanistan" <?php if($user->nationality == 'Afghanistan'): ?> selected <?php endif; ?>>
                                        Afghanistan </option>
                                    <option value="Albania" <?php if($user->nationality == 'Albania'): ?> selected <?php endif; ?>> Albania
                                    </option>
                                    <option value="Algeria" <?php if($user->nationality == 'Algeria'): ?> selected <?php endif; ?>> Algeria
                                    </option>
                                    <option value="Andorra" <?php if($user->nationality == 'Andorra'): ?> selected <?php endif; ?>> Andorra
                                    </option>
                                    <option value="Angola" <?php if($user->nationality == 'Angola'): ?> selected <?php endif; ?>> Angola
                                    </option>
                                    <option value="Antigua and Barbuda" <?php if($user->nationality == 'Antigua and Barbuda'): ?> selected <?php endif; ?>>
                                        Antigua and Barbuda </option>
                                    <option value="Argentina" <?php if($user->nationality == 'Argentina'): ?> selected <?php endif; ?>> Argentina
                                    </option>
                                    <option value="Armenia" <?php if($user->nationality == 'Armenia'): ?> selected <?php endif; ?>> Armenia
                                    </option>
                                    <option value="Australia" <?php if($user->nationality == 'Australia'): ?> selected <?php endif; ?>>
                                        Australia </option>
                                    <option value="Austria" <?php if($user->nationality == 'Austria'): ?> selected <?php endif; ?>> Austria
                                    </option>
                                    <option value="Azerbaijan" <?php if($user->nationality == 'Azerbaijan'): ?> selected <?php endif; ?>>
                                        Azerbaijan </option>
                                    <option value="Bahamas" <?php if($user->nationality == 'Bahamas'): ?> selected <?php endif; ?>> Bahamas
                                    </option>
                                    <option value="Bahrain" <?php if($user->nationality == 'Bahrain'): ?> selected <?php endif; ?>> Bahrain
                                    </option>
                                    <option value="Bangladesh" <?php if($user->nationality == 'Bangladesh'): ?> selected <?php endif; ?>>
                                        Bangladesh </option>
                                    <option value="Barbados" <?php if($user->nationality == 'Barbados'): ?> selected <?php endif; ?>> Barbados
                                    </option>
                                    <option value="Belarus" <?php if($user->nationality == 'Belarus'): ?> selected <?php endif; ?>> Belarus
                                    </option>
                                    <option value="Belgium" <?php if($user->nationality == 'Belgium'): ?> selected <?php endif; ?>> Belgium
                                    </option>
                                    <option value="Belize" <?php if($user->nationality == 'Belize'): ?> selected <?php endif; ?>> Belize
                                    </option>
                                    <option value="Benin" <?php if($user->nationality == 'Benin'): ?> selected <?php endif; ?>> Benin
                                    </option>
                                    <option value="Bhutan" <?php if($user->nationality == 'Bhutan'): ?> selected <?php endif; ?>> Bhutan
                                    </option>
                                    <option value="Bolivia" <?php if($user->nationality == 'Bolivia'): ?> selected <?php endif; ?>> Bolivia
                                    </option>
                                    <option value="Bosnia and Herzegovina"
                                        <?php if($user->nationality == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>> Bosnia and Herzegovina
                                    </option>
                                    <option value="Botswana" <?php if($user->nationality == 'Botswana'): ?> selected <?php endif; ?>> Botswana
                                    </option>
                                    <option value="Brazil" <?php if($user->nationality == 'Brazil'): ?> selected <?php endif; ?>> Brazil
                                    </option>
                                    <option value="Brunei" <?php if($user->nationality == 'Brunei'): ?> selected <?php endif; ?>> Brunei
                                    </option>
                                    <option value="Bulgaria" <?php if($user->nationality == 'Bulgaria'): ?> selected <?php endif; ?>> Bulgaria
                                    </option>
                                    <option value="Burkina Faso" <?php if($user->nationality == 'Burkina Faso'): ?> selected <?php endif; ?>>
                                        Burkina Faso </option>
                                    <option value="Burundi" <?php if($user->nationality == 'Burundi'): ?> selected <?php endif; ?>> Burundi
                                    </option>
                                    <option value="Cabo Verde" <?php if($user->nationality == 'Cabo Verde'): ?> selected <?php endif; ?>> Cabo
                                        Verde </option>
                                    <option value="Cambodia" <?php if($user->nationality == 'Cambodia'): ?> selected <?php endif; ?>> Cambodia
                                    </option>
                                    <option value="Cameroon" <?php if($user->nationality == 'Cameroon'): ?> selected <?php endif; ?>> Cameroon
                                    </option>
                                    <option value="Canada" <?php if($user->nationality == 'Canada'): ?> selected <?php endif; ?>> Canada
                                    </option>
                                    <option value="Central African Republic"
                                        <?php if($user->nationality == 'Central African Republic'): ?> selected <?php endif; ?>> Central African Republic
                                    </option>
                                    <option value="Chad" <?php if($user->nationality == 'Chad'): ?> selected <?php endif; ?>> Chad
                                    </option>
                                    <option value="Chile" <?php if($user->nationality == 'Chile'): ?> selected <?php endif; ?>> Chile
                                    </option>
                                    <option value="China" <?php if($user->nationality == 'China'): ?> selected <?php endif; ?>> China
                                    </option>
                                    <option value="Colombia" <?php if($user->nationality == 'Colombia'): ?> selected <?php endif; ?>> Colombia
                                    </option>
                                    <option value="Comoros" <?php if($user->nationality == 'Comoros'): ?> selected <?php endif; ?>> Comoros
                                    </option>
                                    <option value="Congo (Congo-Brazzaville)"
                                        <?php if($user->nationality == 'Congo (Congo-Brazzaville)'): ?> selected <?php endif; ?>> Congo (Congo-Brazzaville)
                                    </option>
                                    <option value="Costa Rica" <?php if($user->nationality == 'Costa Rica'): ?> selected <?php endif; ?>> Costa
                                        Rica </option>
                                    <option value="Croatia" <?php if($user->nationality == 'Croatia'): ?> selected <?php endif; ?>> Croatia
                                    </option>
                                    <option value="Cuba" <?php if($user->nationality == 'Cuba'): ?> selected <?php endif; ?>> Cuba
                                    </option>
                                    <option value="Cyprus" <?php if($user->nationality == 'Cyprus'): ?> selected <?php endif; ?>> Cyprus
                                    </option>
                                    <option value="Czechia (Czech Republic)"
                                        <?php if($user->nationality == 'Czechia (Czech Republic)'): ?> selected <?php endif; ?>> Czechia (Czech Republic)
                                    </option>
                                    <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                        <?php if($user->nationality == 'Democratic Republic of the Congo (Congo-Kinshasa)'): ?> selected <?php endif; ?>> Democratic Republic of the
                                        Congo (Congo-Kinshasa) </option>
                                    <option value="Denmark" <?php if($user->nationality == 'Denmark'): ?> selected <?php endif; ?>> Denmark
                                    </option>
                                    <option value="Djibouti" <?php if($user->nationality == 'Djibouti'): ?> selected <?php endif; ?>> Djibouti
                                    </option>
                                    <option value="Dominica" <?php if($user->nationality == 'Dominica'): ?> selected <?php endif; ?>> Dominica
                                    </option>
                                    <option value="Dominican Republic" <?php if($user->nationality == 'Dominican Republic'): ?> selected <?php endif; ?>>
                                        Dominican Republic </option>
                                    <option value="East Timor (Timor-Leste)"
                                        <?php if($user->nationality == 'East Timor (Timor-Leste)'): ?> selected <?php endif; ?>> East Timor (Timor-Leste)
                                    </option>
                                    <option value="Ecuador" <?php if($user->nationality == 'Ecuador'): ?> selected <?php endif; ?>> Ecuador
                                    </option>
                                    <option value="Egypt" <?php if($user->nationality == 'Egypt'): ?> selected <?php endif; ?>> Egypt
                                    </option>
                                    <option value="El Salvador" <?php if($user->nationality == 'El Salvador'): ?> selected <?php endif; ?>> El
                                        Salvador </option>
                                    <option value="Equatorial Guinea" <?php if($user->nationality == 'Equatorial Guinea'): ?> selected <?php endif; ?>>
                                        Equatorial Guinea </option>
                                    <option value="Eritrea" <?php if($user->nationality == 'Eritrea'): ?> selected <?php endif; ?>> Eritrea
                                    </option>
                                    <option value="Estonia" <?php if($user->nationality == 'Estonia'): ?> selected <?php endif; ?>> Estonia
                                    </option>
                                    <option value="Eswatini (formerly Swaziland)"
                                        <?php if($user->nationality == 'Eswatini (formerly Swaziland)'): ?> selected <?php endif; ?>> Eswatini (formerly Swaziland)
                                    </option>
                                    <option value="Ethiopia" <?php if($user->nationality == 'Ethiopia'): ?> selected <?php endif; ?>> Ethiopia
                                    </option>
                                    <option value="Fiji" <?php if($user->nationality == 'Fiji'): ?> selected <?php endif; ?>> Fiji
                                    </option>
                                    <option value="Finland" <?php if($user->nationality == 'Finland'): ?> selected <?php endif; ?>> Finland
                                    </option>
                                    <option value="France" <?php if($user->nationality == 'France'): ?> selected <?php endif; ?>> France
                                    </option>
                                    <option value="Gabon" <?php if($user->nationality == 'Gabon'): ?> selected <?php endif; ?>> Gabon
                                    </option>
                                    <option value="Gambia" <?php if($user->nationality == 'Gambia'): ?> selected <?php endif; ?>> Gambia
                                    </option>
                                    <option value="Georgia" <?php if($user->nationality == 'Georgia'): ?> selected <?php endif; ?>> Georgia
                                    </option>
                                    <option value="Germany" <?php if($user->nationality == 'Germany'): ?> selected <?php endif; ?>> Germany
                                    </option>
                                    <option value="Ghana" <?php if($user->nationality == 'Ghana'): ?> selected <?php endif; ?>> Ghana
                                    </option>
                                    <option value="Greece" <?php if($user->nationality == 'Greece'): ?> selected <?php endif; ?>> Greece
                                    </option>
                                    <option value="Grenada" <?php if($user->nationality == 'Grenada'): ?> selected <?php endif; ?>> Grenada
                                    </option>
                                    <option value="Guatemala" <?php if($user->nationality == 'Guatemala'): ?> selected <?php endif; ?>>
                                        Guatemala </option>
                                    <option value="Guinea" <?php if($user->nationality == 'Guinea'): ?> selected <?php endif; ?>> Guinea
                                    </option>
                                    <option value="Guinea-Bissau" <?php if($user->nationality == 'Guinea-Bissau'): ?> selected <?php endif; ?>>
                                        Guinea-Bissau </option>
                                    <option value="Guyana" <?php if($user->nationality == 'Guyana'): ?> selected <?php endif; ?>> Guyana
                                    </option>
                                    <option value="Haiti" <?php if($user->nationality == 'Haiti'): ?> selected <?php endif; ?>> Haiti
                                    </option>
                                    <option value="Honduras" <?php if($user->nationality == 'Honduras'): ?> selected <?php endif; ?>> Honduras
                                    </option>
                                    <option value="Hungary" <?php if($user->nationality == 'Hungary'): ?> selected <?php endif; ?>> Hungary
                                    </option>
                                    <option value="Iceland" <?php if($user->nationality == 'Iceland'): ?> selected <?php endif; ?>> Iceland
                                    </option>
                                    <option value="India" <?php if($user->nationality == 'India'): ?> selected <?php endif; ?>> India
                                    </option>
                                    <option value="Indonesia" <?php if($user->nationality == 'Indonesia'): ?> selected <?php endif; ?>>
                                        Indonesia </option>
                                    <option value="Iran" <?php if($user->nationality == 'Iran'): ?> selected <?php endif; ?>> Iran
                                    </option>
                                    <option value="Iraq" <?php if($user->nationality == 'Iraq'): ?> selected <?php endif; ?>> Iraq
                                    </option>
                                    <option value="Ireland" <?php if($user->nationality == 'Ireland'): ?> selected <?php endif; ?>> Ireland
                                    </option>
                                    <option value="Israel" <?php if($user->nationality == 'Israel'): ?> selected <?php endif; ?>> Israel
                                    </option>
                                    <option value="Italy" <?php if($user->nationality == 'Italy'): ?> selected <?php endif; ?>> Italy
                                    </option>
                                    <option value="Ivory Coast (Côte d'Ivoire)"
                                        <?php if($user->nationality == "Ivory Coast (Côte d'Ivoire)"): ?> selected <?php endif; ?>> Ivory Coast (Côte d'Ivoire)
                                    </option>
                                    <option value="Jamaica" <?php if($user->nationality == 'Jamaica'): ?> selected <?php endif; ?>> Jamaica
                                    </option>
                                    <option value="Japan" <?php if($user->nationality == 'Japan'): ?> selected <?php endif; ?>> Japan
                                    </option>
                                    <option value="Jordan" <?php if($user->nationality == 'Jordan'): ?> selected <?php endif; ?>> Jordan
                                    </option>
                                    <option value="Kazakhstan" <?php if($user->nationality == 'Kazakhstan'): ?> selected <?php endif; ?>>
                                        Kazakhstan </option>
                                    <option value="Kenya" <?php if($user->nationality == 'Kenya'): ?> selected <?php endif; ?>> Kenya
                                    </option>
                                    <option value="Kiribati" <?php if($user->nationality == 'Kiribati'): ?> selected <?php endif; ?>> Kiribati
                                    </option>
                                    <option value="Kosovo" <?php if($user->nationality == 'Kosovo'): ?> selected <?php endif; ?>> Kosovo
                                    </option>
                                    <option value="Kuwait" <?php if($user->nationality == 'Kuwait'): ?> selected <?php endif; ?>> Kuwait
                                    </option>
                                    <option value="Kyrgyzstan" <?php if($user->nationality == 'Kyrgyzstan'): ?> selected <?php endif; ?>>
                                        Kyrgyzstan </option>
                                    <option value="Laos" <?php if($user->nationality == 'Laos'): ?> selected <?php endif; ?>> Laos
                                    </option>
                                    <option value="Latvia" <?php if($user->nationality == 'Latvia'): ?> selected <?php endif; ?>> Latvia
                                    </option>
                                    <option value="Lebanon" <?php if($user->nationality == 'Lebanon'): ?> selected <?php endif; ?>> Lebanon
                                    </option>
                                    <option value="Lesotho" <?php if($user->nationality == 'Lesotho'): ?> selected <?php endif; ?>> Lesotho
                                    </option>
                                    <option value="Liberia" <?php if($user->nationality == 'Liberia'): ?> selected <?php endif; ?>> Liberia
                                    </option>
                                    <option value="Libya" <?php if($user->nationality == 'Libya'): ?> selected <?php endif; ?>> Libya
                                    </option>
                                    <option value="Liechtenstein" <?php if($user->nationality == 'Liechtenstein'): ?> selected <?php endif; ?>>
                                        Liechtenstein </option>
                                    <option value="Lithuania" <?php if($user->nationality == 'Lithuania'): ?> selected <?php endif; ?>>
                                        Lithuania </option>
                                    <option value="Luxembourg" <?php if($user->nationality == 'Luxembourg'): ?> selected <?php endif; ?>>
                                        Luxembourg </option>
                                    <option value="Madagascar" <?php if($user->nationality == 'Madagascar'): ?> selected <?php endif; ?>>
                                        Madagascar </option>
                                    <option value="Malawi" <?php if($user->nationality == 'Malawi'): ?> selected <?php endif; ?>> Malawi
                                    </option>
                                    <option value="Malaysia" <?php if($user->nationality == 'Malaysia'): ?> selected <?php endif; ?>>
                                        Malaysia </option>
                                    <option value="Maldives" <?php if($user->nationality == 'Maldives'): ?> selected <?php endif; ?>>
                                        Maldives </option>
                                    <option value="Mali" <?php if($user->nationality == 'Mali'): ?> selected <?php endif; ?>> Mali
                                    </option>
                                    <option value="Malta" <?php if($user->nationality == 'Malta'): ?> selected <?php endif; ?>> Malta
                                    </option>
                                    <option value="Marshall Islands" <?php if($user->nationality == 'Marshall Islands'): ?> selected <?php endif; ?>>
                                        Marshall Islands </option>
                                    <option value="Mauritania" <?php if($user->nationality == 'Mauritania'): ?> selected <?php endif; ?>>
                                        Mauritania </option>
                                    <option value="Mauritius" <?php if($user->nationality == 'Mauritius'): ?> selected <?php endif; ?>>
                                        Mauritius </option>
                                    <option value="Mexico" <?php if($user->nationality == 'Mexico'): ?> selected <?php endif; ?>> Mexico
                                    </option>
                                    <option value="Micronesia" <?php if($user->nationality == 'Micronesia'): ?> selected <?php endif; ?>>
                                        Micronesia </option>
                                    <option value="Moldova" <?php if($user->nationality == 'Moldova'): ?> selected <?php endif; ?>> Moldova
                                    </option>
                                    <option value="Monaco" <?php if($user->nationality == 'Monaco'): ?> selected <?php endif; ?>> Monaco
                                    </option>
                                    <option value="Mongolia" <?php if($user->nationality == 'Mongolia'): ?> selected <?php endif; ?>>
                                        Mongolia </option>
                                    <option value="Montenegro" <?php if($user->nationality == 'Montenegro'): ?> selected <?php endif; ?>>
                                        Montenegro </option>
                                    <option value="Morocco" <?php if($user->nationality == 'Morocco'): ?> selected <?php endif; ?>> Morocco
                                    </option>
                                    <option value="Mozambique" <?php if($user->nationality == 'Mozambique'): ?> selected <?php endif; ?>>
                                        Mozambique </option>
                                    <option value="Myanmar (Burma)" <?php if($user->nationality == 'Myanmar (Burma)'): ?> selected <?php endif; ?>>
                                        Myanmar (Burma) </option>
                                    <option value="Namibia" <?php if($user->nationality == 'Namibia'): ?> selected <?php endif; ?>> Namibia
                                    </option>
                                    <option value="Nauru" <?php if($user->nationality == 'Nauru'): ?> selected <?php endif; ?>> Nauru
                                    </option>
                                    <option value="Nepal" <?php if($user->nationality == 'Nepal'): ?> selected <?php endif; ?>> Nepal
                                    </option>
                                    <option value="Netherlands" <?php if($user->nationality == 'Netherlands'): ?> selected <?php endif; ?>>
                                        Netherlands </option>
                                    <option value="New Zealand" <?php if($user->nationality == 'New Zealand'): ?> selected <?php endif; ?>> New
                                        Zealand </option>
                                    <option value="Nicaragua" <?php if($user->nationality == 'Nicaragua'): ?> selected <?php endif; ?>>
                                        Nicaragua </option>
                                    <option value="Niger" <?php if($user->nationality == 'Niger'): ?> selected <?php endif; ?>> Niger
                                    </option>
                                    <option value="Nigeria" <?php if($user->nationality == 'Nigeria'): ?> selected <?php endif; ?>> Nigeria
                                    </option>
                                    <option value="North Macedonia (formerly Macedonia)"
                                        <?php if($user->nationality == 'North Macedonia (formerly Macedonia)'): ?> selected <?php endif; ?>> North Macedonia (formerly
                                        Macedonia) </option>
                                    <option value="Norway" <?php if($user->nationality == 'Norway'): ?> selected <?php endif; ?>> Norway
                                    </option>
                                    <option value="Oman" <?php if($user->nationality == 'Oman'): ?> selected <?php endif; ?>> Oman
                                    </option>
                                    <option value="Pakistan" <?php if($user->nationality == 'Pakistan'): ?> selected <?php endif; ?>>
                                        Pakistan </option>
                                    <option value="Palau" <?php if($user->nationality == 'Palau'): ?> selected <?php endif; ?>> Palau
                                    </option>
                                    <option value="Palestine State" <?php if($user->nationality == 'Palestine State'): ?> selected <?php endif; ?>>
                                        Palestine State </option>
                                    <option value="Panama" <?php if($user->nationality == 'Panama'): ?> selected <?php endif; ?>> Panama
                                    </option>
                                    <option value="Papua New Guinea" <?php if($user->nationality == 'Papua New Guinea'): ?> selected <?php endif; ?>>
                                        Papua New Guinea </option>
                                    <option value="Paraguay" <?php if($user->nationality == 'Paraguay'): ?> selected <?php endif; ?>>
                                        Paraguay </option>
                                    <option value="Peru" <?php if($user->nationality == 'Peru'): ?> selected <?php endif; ?>> Peru
                                    </option>
                                    <option value="Philippines" <?php if($user->nationality == 'Philippines'): ?> selected <?php endif; ?>>
                                        Philippines </option>
                                    <option value="Poland" <?php if($user->nationality == 'Poland'): ?> selected <?php endif; ?>> Poland
                                    </option>
                                    <option value="Portugal" <?php if($user->nationality == 'Portugal'): ?> selected <?php endif; ?>>
                                        Portugal </option>
                                    <option value="Qatar" <?php if($user->nationality == 'Qatar'): ?> selected <?php endif; ?>> Qatar
                                    </option>
                                    <option value="Romania" <?php if($user->nationality == 'Romania'): ?> selected <?php endif; ?>> Romania
                                    </option>
                                    <option value="Russia" <?php if($user->nationality == 'Russia'): ?> selected <?php endif; ?>> Russia
                                    </option>
                                    <option value="Rwanda" <?php if($user->nationality == 'Rwanda'): ?> selected <?php endif; ?>> Rwanda
                                    </option>
                                    <option value="Saint Kitts and Nevis"
                                        <?php if($user->nationality == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>> Saint Kitts and Nevis
                                    </option>
                                    <option value="Saint Lucia" <?php if($user->nationality == 'Saint Lucia'): ?> selected <?php endif; ?>>
                                        Saint Lucia </option>
                                    <option value="Saint Vincent and the Grenadines"
                                        <?php if($user->nationality == 'Saint Vincent and the Grenadines'): ?> selected <?php endif; ?>> Saint Vincent and the
                                        Grenadines </option>
                                    <option value="Samoa" <?php if($user->nationality == 'Samoa'): ?> selected <?php endif; ?>> Samoa
                                    </option>
                                    <option value="San Marino" <?php if($user->nationality == 'San Marino'): ?> selected <?php endif; ?>> San
                                        Marino </option>
                                    <option value="Sao Tome and Principe"
                                        <?php if($user->nationality == 'Sao Tome and Principe'): ?> selected <?php endif; ?>> Sao Tome and Principe
                                    </option>
                                    <option value="Saudi Arabia" <?php if($user->nationality == 'Saudi Arabia'): ?> selected <?php endif; ?>>
                                        Saudi Arabia </option>
                                    <option value="Senegal" <?php if($user->nationality == 'Senegal'): ?> selected <?php endif; ?>> Senegal
                                    </option>
                                    <option value="Serbia" <?php if($user->nationality == 'Serbia'): ?> selected <?php endif; ?>> Serbia
                                    </option>
                                    <option value="Seychelles" <?php if($user->nationality == 'Seychelles'): ?> selected <?php endif; ?>>
                                        Seychelles </option>
                                    <option value="Sierra Leone" <?php if($user->nationality == 'Sierra Leone'): ?> selected <?php endif; ?>>
                                        Sierra Leone </option>
                                    <option value="Singapore" <?php if($user->nationality == 'Singapore'): ?> selected <?php endif; ?>>
                                        Singapore </option>
                                    <option value="Slovakia" <?php if($user->nationality == 'Slovakia'): ?> selected <?php endif; ?>>
                                        Slovakia </option>
                                    <option value="Slovenia" <?php if($user->nationality == 'Slovenia'): ?> selected <?php endif; ?>>
                                        Slovenia </option>
                                    <option value="Solomon Islands" <?php if($user->nationality == 'Solomon Islands'): ?> selected <?php endif; ?>>
                                        Solomon Islands </option>
                                    <option value="Somalia" <?php if($user->nationality == 'Somalia'): ?> selected <?php endif; ?>> Somalia
                                    </option>
                                    <option value="South Africa" <?php if($user->nationality == 'South Africa'): ?> selected <?php endif; ?>>
                                        South Africa </option>
                                    <option value="South Korea" <?php if($user->nationality == 'South Korea'): ?> selected <?php endif; ?>>
                                        South Korea </option>
                                    <option value="South Sudan" <?php if($user->nationality == 'South Sudan'): ?> selected <?php endif; ?>>
                                        South Sudan </option>
                                    <option value="Spain" <?php if($user->nationality == 'Spain'): ?> selected <?php endif; ?>> Spain
                                    </option>
                                    <option value="Sri Lanka" <?php if($user->nationality == 'Sri Lanka'): ?> selected <?php endif; ?>> Sri
                                        Lanka </option>
                                    <option value="Sudan" <?php if($user->nationality == 'Sudan'): ?> selected <?php endif; ?>> Sudan
                                    </option>
                                    <option value="Suriname" <?php if($user->nationality == 'Suriname'): ?> selected <?php endif; ?>>
                                        Suriname </option>
                                    <option value="Sweden" <?php if($user->nationality == 'Sweden'): ?> selected <?php endif; ?>> Sweden
                                    </option>
                                    <option value="Switzerland" <?php if($user->nationality == 'Switzerland'): ?> selected <?php endif; ?>>
                                        Switzerland </option>
                                    <option value="Syria" <?php if($user->nationality == 'Syria'): ?> selected <?php endif; ?>> Syria
                                    </option>
                                    <option value="Taiwan" <?php if($user->nationality == 'Taiwan'): ?> selected <?php endif; ?>> Taiwan
                                    </option>
                                    <option value="Tajikistan" <?php if($user->nationality == 'Tajikistan'): ?> selected <?php endif; ?>>
                                        Tajikistan </option>
                                    <option value="Tanzania" <?php if($user->nationality == 'Tanzania'): ?> selected <?php endif; ?>>
                                        Tanzania </option>
                                    <option value="Thailand" <?php if($user->nationality == 'Thailand'): ?> selected <?php endif; ?>>
                                        Thailand </option>
                                    <option value="Togo" <?php if($user->nationality == 'Togo'): ?> selected <?php endif; ?>> Togo
                                    </option>
                                    <option value="Tonga" <?php if($user->nationality == 'Tonga'): ?> selected <?php endif; ?>> Tonga
                                    </option>
                                    <option value="Trinidad and Tobago"
                                        <?php if($user->nationality == 'Trinidad and Tobago'): ?> selected <?php endif; ?>> Trinidad and Tobago </option>
                                    <option value="Tunisia" <?php if($user->nationality == 'Tunisia'): ?> selected <?php endif; ?>> Tunisia
                                    </option>
                                    <option value="Turkey" <?php if($user->nationality == 'Turkey'): ?> selected <?php endif; ?>> Turkey
                                    </option>
                                    <option value="Turkmenistan" <?php if($user->nationality == 'Turkmenistan'): ?> selected <?php endif; ?>>
                                        Turkmenistan </option>
                                    <option value="Tuvalu" <?php if($user->nationality == 'Tuvalu'): ?> selected <?php endif; ?>> Tuvalu
                                    </option>
                                    <option value="Uganda" <?php if($user->nationality == 'Uganda'): ?> selected <?php endif; ?>> Uganda
                                    </option>
                                    <option value="Ukraine" <?php if($user->nationality == 'Ukraine'): ?> selected <?php endif; ?>> Ukraine
                                    </option>
                                    <option value="United Arab Emirates"
                                        <?php if($user->nationality == 'United Arab Emirates'): ?> selected <?php endif; ?>> United Arab Emirates
                                    </option>
                                    <option value="United Kingdom" <?php if($user->nationality == 'United Kingdom'): ?> selected <?php endif; ?>>
                                        United Kingdom </option>
                                    <option value="United States of America"
                                        <?php if($user->nationality == 'United States of America'): ?> selected <?php endif; ?>> United States of America
                                    </option>
                                    <option value="Uruguay" <?php if($user->nationality == 'Uruguay'): ?> selected <?php endif; ?>> Uruguay
                                    </option>
                                    <option value="Uzbekistan" <?php if($user->nationality == 'Uzbekistan'): ?> selected <?php endif; ?>>
                                        Uzbekistan </option>
                                    <option value="Vanuatu" <?php if($user->nationality == 'Vanuatu'): ?> selected <?php endif; ?>> Vanuatu
                                    </option>
                                    <option value="Vatican City" <?php if($user->nationality == 'Vatican City'): ?> selected <?php endif; ?>>
                                        Vatican City </option>
                                    <option value="Venezuela" <?php if($user->nationality == 'Venezuela'): ?> selected <?php endif; ?>>
                                        Venezuela </option>
                                    <option value="Vietnam" <?php if($user->nationality == 'Vietnam'): ?> selected <?php endif; ?>> Vietnam
                                    </option>
                                    <option value="Yemen" <?php if($user->nationality == 'Yemen'): ?> selected <?php endif; ?>> Yemen
                                    </option>
                                    <option value="Zambia" <?php if($user->nationality == 'Zambia'): ?> selected <?php endif; ?>> Zambia
                                    </option>
                                    <option value="Zimbabwe" <?php if($user->nationality == 'Zimbabwe'): ?> selected <?php endif; ?>>
                                        Zimbabwe </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="religion" class="form-label fs-14 text-theme-primary">Religion</label>
                            <div class="religion-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->religion); ?>

                            </div>
                            <div class="religion-edit" style="display: none;">
                                <select id="religion" class="form-select" name="religion">
                                    <option disabled>Please Select Religion</option>
                                    <option value="Christianity" <?php if($user->religion == 'Christianity'): ?> selected <?php endif; ?>>
                                        Christianity</option>
                                    <option value="Islam" <?php if($user->religion == 'Islam'): ?> selected <?php endif; ?>>Islam
                                    </option>
                                    <option value="Hinduism" <?php if($user->religion == 'Hinduism'): ?> selected <?php endif; ?>>Hinduism
                                    </option>
                                    <option value="Buddhism" <?php if($user->religion == 'Buddhism'): ?> selected <?php endif; ?>>Buddhism
                                    </option>
                                    <option value="Sikhism" <?php if($user->religion == 'Sikhism'): ?> selected <?php endif; ?>>Sikhism
                                    </option>
                                    <option value="Judaism" <?php if($user->religion == 'Judaism'): ?> selected <?php endif; ?>>Judaism
                                    </option>
                                    <option value="Bahá'í Faith" <?php if($user->religion == "Bahá'í Faith"): ?> selected <?php endif; ?>>
                                        Bahá'í
                                        Faith</option>
                                    <option value="Jainism" <?php if($user->religion == 'Jainism'): ?> selected <?php endif; ?>>Jainism
                                    </option>
                                    <option value="Shintoism" <?php if($user->religion == 'Shintoism'): ?> selected <?php endif; ?>>
                                        Shintoism
                                    </option>
                                    <option value="Taoism" <?php if($user->religion == 'Taoism'): ?> selected <?php endif; ?>>Taoism
                                    </option>
                                    <option value="Confucianism" <?php if($user->religion == 'Confucianism'): ?> selected <?php endif; ?>>
                                        Confucianism</option>
                                    <option value="Zoroastrianism" <?php if($user->religion == 'Zoroastrianism'): ?> selected <?php endif; ?>>
                                        Zoroastrianism</option>
                                    <option value="Other" <?php if($user->religion == 'Other'): ?> selected <?php endif; ?>>Other
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="maritialStatus" class="form-label fs-14 text-theme-primary">Maritial
                                Status</label>
                            <div class="maritialStatus-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->marital_status); ?>

                            </div>
                            <div class="maritialStatus-edit" style="display: none;">
                                <select name="marital_status" id="maritialStatus" class="form-select"
                                    name="marital_status">
                                    <option disabled>Please Select Maritial Status</option>
                                    <option value="Single" <?php if($user->marital_status == 'Single'): ?> selected <?php endif; ?>>Single
                                    </option>
                                    <option value="Married" <?php if($user->marital_status == 'Married'): ?> selected <?php endif; ?>>Married
                                    </option>
                                    <option value="Divorced" <?php if($user->marital_status == 'Divorced'): ?> selected <?php endif; ?>>Divorced
                                    </option>
                                    <option value="Others" <?php if($user->marital_status == 'Others'): ?> selected <?php endif; ?>>Others
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
                                    <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li>
                                            <a href="javascript:void 0;"><?php echo e($row); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                            <div class="languages-edit" style="display: none;">
                                <select multiple id="languages" class="form-select fs-14 languages__select__2 h-50px mb-4"
                                    name="languages[]">
                                    <option disabled>Please Select Languages</option>
                                    <option value="English"
                                        <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'English'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        English
                                    </option>
                                    <option value="Spanish"
                                        <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'Spanish'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        Spanish
                                    </option>
                                    <option value="French"
                                        <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'French'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        French
                                    </option>
                                    <option value="German"
                                        <?php $__currentLoopData = $user->languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row == 'German'): ?> selected <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        German
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="drivingLicense" class="form-label fs-14 text-theme-primary">Driving
                                License</label>
                            <div class="driving-license-show" style="font-size: 15px; color: #92929d;">
                                <?php if($user->driving_license == '1'): ?>
                                    Yes
                                <?php else: ?>
                                    No
                                <?php endif; ?>
                            </div>
                            <div class="driving-license-edit" style="display: none;">
                                <select name="driving_license" id="drivingLicense" class="form-select"
                                    name="driving_license">
                                    <option value="1" <?php if($user->driving_license == '1'): ?> selected <?php endif; ?>>Yes
                                    </option>
                                    <option value="0" <?php if($user->driving_license == '0'): ?> selected <?php endif; ?>>No
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="visaStatus" class="form-label fs-14 text-theme-primary">Visa Status</label>
                            <div class="visaStatus-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->visa_status); ?>

                            </div>
                            <div class="visaStatus-edit" style="display: none;">
                                <select name="visa_status" id="visaStatus" class="form-select" name="visa_status">
                                    <option disabled>Please Select Visa Status</option>
                                    <option <?php if($user->visa_status == 'Citizen'): ?> selected <?php endif; ?>>Citizen</option>
                                    <option <?php if($user->visa_status == 'Permanent Resident'): ?> selected <?php endif; ?>>Permanent Resident</option>
                                    <option <?php if($user->visa_status == 'Visit Visa'): ?> selected <?php endif; ?>>Visit Visa</option>
                                    <option <?php if($user->visa_status == 'Student Visa'): ?> selected <?php endif; ?>>Student Visa</option>
                                    <option <?php if($user->visa_status == 'Business Visa'): ?> selected <?php endif; ?>>Business Visa</option>
                                    <option <?php if($user->visa_status == 'Employee Visa'): ?> selected <?php endif; ?>>Employee Visa</option>
                                    <option <?php if($user->visa_status == 'Spousal Visa'): ?> selected <?php endif; ?>>Spousal Visa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mb-4 pb-4 border-bottom">
                <form id="socialform" method="post">
                    <?php echo csrf_field(); ?>
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
                                value="<?php echo e($user->facbookLink); ?>" placeholder="Facebook Link" id="facbookLink" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="twitterLink" class="form-label fs-14 text-theme-primary">Twitter</label>
                            <input type="url" class="form-control" name="twitterLink"
                                value="<?php echo e($user->twitterLink); ?>" placeholder="Twitter Link" id="twitterLink" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="instagramLink" class="form-label fs-14 text-theme-primary">Instagram</label>
                            <input type="url" class="form-control" name="instagramLink"
                                value="<?php echo e($user->instagramLink); ?>" placeholder="Instagram Link" id="instagramLink"
                                disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="linkdinLink" class="form-label fs-14 text-theme-primary">Linkedin</label>
                            <input type="url" class="form-control" name="linkdinLink"
                                value="<?php echo e($user->linkdinLink); ?>" placeholder="Linkedin Link" id="linkdinLink" disabled>
                        </div>
                    </div>
                </form>
            </div>
            <div class="mb-4 pb-4 border-bottom">
                <form id="fourthform">
                    <?php echo csrf_field(); ?>
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
                                <?php echo e($user->phone_status); ?>

                            </div>
                            <div class="mobile-no-edit" style="display: none;">
                                <select id="mobileNoSetting" class="form-select" name="phone_status">
                                    <option value="Only Me" <?php if($user->phone_status == 'Only Me'): ?> selected <?php endif; ?>>
                                        Only Me
                                    </option>
                                    <option value="Public" <?php if($user->phone_status == 'Public'): ?> selected <?php endif; ?>>
                                        Public
                                    </option>
                                    <option value="Employers" <?php if($user->phone_status == 'Employers'): ?> selected <?php endif; ?>>
                                        Employers
                                    </option>
                                    <option value="Recruiters" <?php if($user->phone_status == 'Recruiters'): ?> selected <?php endif; ?>>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        <?php if($user->phone_status == 'Employers/Recruiters'): ?> selected <?php endif; ?>>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="emailAddressSetting" class="form-label fs-14 text-theme-primary">Email
                                Address</label>
                            <div class="email-address-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->email_status); ?>

                            </div>
                            <div class="email-address-edit" style="display: none;">
                                <select id="emailAddressSetting" class="form-select" name="email_status">
                                    <option value="Only Me" <?php if($user->email_status == 'Only Me'): ?> selected <?php endif; ?>>
                                        Only Me
                                    </option>
                                    <option value="Public" <?php if($user->email_status == 'Public'): ?> selected <?php endif; ?>>
                                        Public
                                    </option>
                                    <option value="Employers" <?php if($user->email_status == 'Employers'): ?> selected <?php endif; ?>>
                                        Employers
                                    </option>
                                    <option value="Recruiters" <?php if($user->email_status == 'Recruiters'): ?> selected <?php endif; ?>>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        <?php if($user->email_status == 'Employers/Recruiters'): ?> selected <?php endif; ?>>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="addressSetting" class="form-label fs-14 text-theme-primary">Address</label>
                            <div class="address-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->address_status); ?>

                            </div>
                            <div class="address-edit" style="display: none;">
                                <select id="addressSetting" class="form-select" name="address_status">
                                    <option value="Only Me" <?php if($user->address_status == 'Only Me'): ?> selected <?php endif; ?>>
                                        Only Me
                                    </option>
                                    <option value="Public" <?php if($user->address_status == 'Public'): ?> selected <?php endif; ?>>
                                        Public
                                    </option>
                                    <option value="Employers" <?php if($user->address_status == 'Employers'): ?> selected <?php endif; ?>>
                                        Employers
                                    </option>
                                    <option value="Recruiters" <?php if($user->address_status == 'Recruiters'): ?> selected <?php endif; ?>>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        <?php if($user->address_status == 'Employers/Recruiters'): ?> selected <?php endif; ?>>
                                        Employers/Recruiters
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="visaStatus2" class="form-label fs-14 text-theme-primary">Visa Status</label>
                            <div class="visa-status-show" style="font-size: 15px; color: #92929d;">
                                <?php echo e($user->visa_status_status); ?>

                            </div>
                            <div class="visa-status-edit" style="display: none;">
                                <select id="visaStatus2" class="form-select" name="visa_status_status">
                                    <option value="Only Me" <?php if($user->visa_status_status == 'Only Me'): ?> selected <?php endif; ?>>
                                        Only Me
                                    </option>
                                    <option value="Public" <?php if($user->visa_status_status == 'Public'): ?> selected <?php endif; ?>>
                                        Public
                                    </option>
                                    <option value="Employers" <?php if($user->visa_status_status == 'Employers'): ?> selected <?php endif; ?>>
                                        Employers
                                    </option>
                                    <option value="Recruiters" <?php if($user->visa_status_status == 'Recruiters'): ?> selected <?php endif; ?>>
                                        Recruiters
                                    </option>
                                    <option value="Employers/Recruiters"
                                        <?php if($user->visa_status_status == 'Employers/Recruiters'): ?> selected <?php endif; ?>>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>

    <script>
        $(document).ready(function() {

            $("#msform").on('submit', function(e) {
                e.preventDefault();
                var frmData = new FormData($(".avatar-form")[0]);
                $.ajax({
                        type: "POST",
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                        url: "<?php echo e(route('candidates.profile.update')); ?>",
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
                    url: "<?php echo e(route('candidates.getLanguages')); ?>",
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
                    url: "<?php echo e(route('candidates.profile.update')); ?>",
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
    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('candidatepanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Documents\erec\resources\views/candidatepanel/pages/profileSetup/index.blade.php ENDPATH**/ ?>