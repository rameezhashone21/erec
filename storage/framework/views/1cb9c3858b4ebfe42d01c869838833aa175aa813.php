<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5">CANDIDATE DETAILS </h1>
                        
                        <form id="msform" method="POST" action="<?php echo e(route('store.candidate')); ?>">
                            <?php echo csrf_field(); ?>
                            <!-- progressbar -->
                            <input type="hidden" name="stepOne" value="0">
                            <ul id="progressbar">
                                <li class="active"></li>
                                <li></li>
                                <li></li>
                                <li></li>
                            </ul>
                            <?php if(count($errors) > 0): ?>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <?php echo e($error); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>

                            <?php if(session('error')): ?>
                                <div class="alert alert-danger alert-dismissible">
                                    <?php echo e(session('error')); ?>

                                </div>
                            <?php endif; ?>
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
                                            value="<?php echo e($first_name); ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="last_name" class="form-label fs-14 text-theme-primary fw-bold">Last
                                            Name *</label>
                                        <input type="text" class="form-control fs-14 h-50px" name="last_name"
                                            value="<?php echo e($last_name); ?>" required <?php if($last_name != null): ?>  <?php endif; ?>>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Gender
                                            *</label>
                                        <br>
                                        <input type="radio" class="btn-check" name="gender" id="male" value="male"
                                            autocomplete="off" checked>
                                        <label class="btn btn-outline-primary fs-14" for="male">Male</label>
                                        

                                        <input type="radio" class="btn-check" name="gender" id="female" value="female"
                                            autocomplete="off" <?php echo e($gender == 'Female' ? 'checked' : ''); ?>>
                                        <label class="btn btn-outline-primary fs-14" for="female">Female</label>
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for=""
                                            class="form-label fs-14 text-theme-primary fw-bold">Nationality *</label>
                                        <select name="nationality" id="role" class="form-select fs-14  h-50px"
                                            required>
                                            <option disabled selected>Please Select Nationality</option>
                                            <option value="Afghanistan" <?php if(old('nationality', $nationality) == 'Afghanistan'): ?> selected <?php endif; ?>>
                                                Afghanistan </option>
                                            <option value="Albania" <?php if(old('nationality', $nationality) == 'Albania'): ?> selected <?php endif; ?>>
                                                Albania </option>
                                            <option value="Algeria" <?php if(old('nationality', $nationality) == 'Algeria'): ?> selected <?php endif; ?>>
                                                Algeria </option>
                                            <option value="Andorra" <?php if(old('nationality', $nationality) == 'Andorra'): ?> selected <?php endif; ?>>
                                                Andorra </option>
                                            <option value="Angola" <?php if(old('nationality', $nationality) == 'Angola'): ?> selected <?php endif; ?>> Angola
                                            </option>
                                            <option value="Antigua and Barbuda"
                                                <?php if(old('nationality', $nationality) == 'Antigua and Barbuda'): ?> selected <?php endif; ?>> Antigua and Barbuda
                                            </option>
                                            <option value="Argentina" <?php if(old('nationality', $nationality) == 'Argentina'): ?> selected <?php endif; ?>>
                                                Argentina </option>
                                            <option value="Armenia" <?php if(old('nationality', $nationality) == 'Armenia'): ?> selected <?php endif; ?>>
                                                Armenia </option>
                                            <option value="Australia" <?php if(old('nationality', $nationality) == 'Australia'): ?> selected <?php endif; ?>>
                                                Australia </option>
                                            <option value="Austria" <?php if(old('nationality', $nationality) == 'Austria'): ?> selected <?php endif; ?>>
                                                Austria </option>
                                            <option value="Azerbaijan" <?php if(old('nationality', $nationality) == 'Azerbaijan'): ?> selected <?php endif; ?>>
                                                Azerbaijan </option>
                                            <option value="Bahamas" <?php if(old('nationality', $nationality) == 'Bahamas'): ?> selected <?php endif; ?>>
                                                Bahamas </option>
                                            <option value="Bahrain" <?php if(old('nationality', $nationality) == 'Bahrain'): ?> selected <?php endif; ?>>
                                                Bahrain </option>
                                            <option value="Bangladesh" <?php if(old('nationality', $nationality) == 'Bangladesh'): ?> selected <?php endif; ?>>
                                                Bangladesh </option>
                                            <option value="Barbados" <?php if(old('nationality', $nationality) == 'Barbados'): ?> selected <?php endif; ?>>
                                                Barbados </option>
                                            <option value="Belarus" <?php if(old('nationality', $nationality) == 'Belarus'): ?> selected <?php endif; ?>>
                                                Belarus </option>
                                            <option value="Belgium" <?php if(old('nationality', $nationality) == 'Belgium'): ?> selected <?php endif; ?>>
                                                Belgium </option>
                                            <option value="Belize" <?php if(old('nationality', $nationality) == 'Belize'): ?> selected <?php endif; ?>>
                                                Belize </option>
                                            <option value="Benin" <?php if(old('nationality', $nationality) == 'Benin'): ?> selected <?php endif; ?>>
                                                Benin </option>
                                            <option value="Bhutan" <?php if(old('nationality', $nationality) == 'Bhutan'): ?> selected <?php endif; ?>>
                                                Bhutan </option>
                                            <option value="Bolivia" <?php if(old('nationality', $nationality) == 'Bolivia'): ?> selected <?php endif; ?>>
                                                Bolivia </option>
                                            <option value="Bosnia and Herzegovina"
                                                <?php if(old('nationality', $nationality) == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>> Bosnia and Herzegovina
                                            </option>
                                            <option value="Botswana" <?php if(old('nationality', $nationality) == 'Botswana'): ?> selected <?php endif; ?>>
                                                Botswana </option>
                                            <option value="Brazil" <?php if(old('nationality', $nationality) == 'Brazil'): ?> selected <?php endif; ?>>
                                                Brazil </option>
                                            <option value="Brunei" <?php if(old('nationality', $nationality) == 'Brunei'): ?> selected <?php endif; ?>>
                                                Brunei </option>
                                            <option value="Bulgaria" <?php if(old('nationality', $nationality) == 'Bulgaria'): ?> selected <?php endif; ?>>
                                                Bulgaria </option>
                                            <option value="Burkina Faso"
                                                <?php if(old('nationality', $nationality) == 'Burkina Faso'): ?> selected <?php endif; ?>> Burkina Faso </option>
                                            <option value="Burundi" <?php if(old('nationality', $nationality) == 'Burundi'): ?> selected <?php endif; ?>>
                                                Burundi </option>
                                            <option value="Cabo Verde" <?php if(old('nationality', $nationality) == 'Cabo Verde'): ?> selected <?php endif; ?>>
                                                Cabo Verde </option>
                                            <option value="Cambodia" <?php if(old('nationality', $nationality) == 'Cambodia'): ?> selected <?php endif; ?>>
                                                Cambodia </option>
                                            <option value="Cameroon" <?php if(old('nationality', $nationality) == 'Cameroon'): ?> selected <?php endif; ?>>
                                                Cameroon </option>
                                            <option value="Canada" <?php if(old('nationality', $nationality) == 'Canada'): ?> selected <?php endif; ?>>
                                                Canada </option>
                                            <option value="Central African Republic"
                                                <?php if(old('nationality', $nationality) == 'Central African Republic'): ?> selected <?php endif; ?>> Central African
                                                Republic </option>
                                            <option value="Chad" <?php if(old('nationality', $nationality) == 'Chad'): ?> selected <?php endif; ?>> Chad
                                            </option>
                                            <option value="Chile" <?php if(old('nationality', $nationality) == 'Chile'): ?> selected <?php endif; ?>>
                                                Chile </option>
                                            <option value="China" <?php if(old('nationality', $nationality) == 'China'): ?> selected <?php endif; ?>>
                                                China </option>
                                            <option value="Colombia" <?php if(old('nationality', $nationality) == 'Colombia'): ?> selected <?php endif; ?>>
                                                Colombia </option>
                                            <option value="Comoros" <?php if(old('nationality', $nationality) == 'Comoros'): ?> selected <?php endif; ?>>
                                                Comoros </option>
                                            <option value="Congo (Congo-Brazzaville)"
                                                <?php if(old('nationality', $nationality) == 'Congo (Congo-Brazzaville)'): ?> selected <?php endif; ?>> Congo
                                                (Congo-Brazzaville) </option>
                                            <option value="Costa Rica" <?php if(old('nationality', $nationality) == 'Costa Rica'): ?> selected <?php endif; ?>>
                                                Costa Rica </option>
                                            <option value="Croatia" <?php if(old('nationality', $nationality) == 'Croatia'): ?> selected <?php endif; ?>>
                                                Croatia </option>
                                            <option value="Cuba" <?php if(old('nationality', $nationality) == 'Cuba'): ?> selected <?php endif; ?>> Cuba
                                            </option>
                                            <option value="Cyprus" <?php if(old('nationality', $nationality) == 'Cyprus'): ?> selected <?php endif; ?>>
                                                Cyprus </option>
                                            <option value="Czechia (Czech Republic)"
                                                <?php if(old('nationality', $nationality) == 'Czechia (Czech Republic)'): ?> selected <?php endif; ?>> Czechia (Czech
                                                Republic) </option>
                                            <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                <?php if(old('nationality', $nationality) == 'Democratic Republic of the Congo (Congo-Kinshasa)'): ?> selected <?php endif; ?>> Democratic Republic of
                                                the Congo (Congo-Kinshasa) </option>
                                            <option value="Denmark" <?php if(old('nationality', $nationality) == 'Denmark'): ?> selected <?php endif; ?>>
                                                Denmark </option>
                                            <option value="Djibouti" <?php if(old('nationality', $nationality) == 'Djibouti'): ?> selected <?php endif; ?>>
                                                Djibouti </option>
                                            <option value="Dominica" <?php if(old('nationality', $nationality) == 'Dominica'): ?> selected <?php endif; ?>>
                                                Dominica </option>
                                            <option value="Dominican Republic"
                                                <?php if(old('nationality', $nationality) == 'Dominican Republic'): ?> selected <?php endif; ?>> Dominican Republic
                                            </option>
                                            <option value="East Timor (Timor-Leste)"
                                                <?php if(old('nationality', $nationality) == 'East Timor (Timor-Leste)'): ?> selected <?php endif; ?>> East Timor
                                                (Timor-Leste) </option>
                                            <option value="Ecuador" <?php if(old('nationality', $nationality) == 'Ecuador'): ?> selected <?php endif; ?>>
                                                Ecuador </option>
                                            <option value="Egypt" <?php if(old('nationality', $nationality) == 'Egypt'): ?> selected <?php endif; ?>>
                                                Egypt </option>
                                            <option value="El Salvador"
                                                <?php if(old('nationality', $nationality) == 'El Salvador'): ?> selected <?php endif; ?>> El Salvador </option>
                                            <option value="Equatorial Guinea"
                                                <?php if(old('nationality', $nationality) == 'Equatorial Guinea'): ?> selected <?php endif; ?>> Equatorial Guinea
                                            </option>
                                            <option value="Eritrea" <?php if(old('nationality', $nationality) == 'Eritrea'): ?> selected <?php endif; ?>>
                                                Eritrea </option>
                                            <option value="Estonia" <?php if(old('nationality', $nationality) == 'Estonia'): ?> selected <?php endif; ?>>
                                                Estonia </option>
                                            <option value="Eswatini (formerly Swaziland)"
                                                <?php if(old('nationality', $nationality) == 'Eswatini (formerly Swaziland)'): ?> selected <?php endif; ?>> Eswatini (formerly
                                                Swaziland) </option>
                                            <option value="Ethiopia" <?php if(old('nationality', $nationality) == 'Ethiopia'): ?> selected <?php endif; ?>>
                                                Ethiopia </option>
                                            <option value="Fiji" <?php if(old('nationality', $nationality) == 'Fiji'): ?> selected <?php endif; ?>>
                                                Fiji </option>
                                            <option value="Finland" <?php if(old('nationality', $nationality) == 'Finland'): ?> selected <?php endif; ?>>
                                                Finland </option>
                                            <option value="France" <?php if(old('nationality', $nationality) == 'France'): ?> selected <?php endif; ?>>
                                                France </option>
                                            <option value="Gabon" <?php if(old('nationality', $nationality) == 'Gabon'): ?> selected <?php endif; ?>>
                                                Gabon </option>
                                            <option value="Gambia" <?php if(old('nationality', $nationality) == 'Gambia'): ?> selected <?php endif; ?>>
                                                Gambia </option>
                                            <option value="Georgia" <?php if(old('nationality', $nationality) == 'Georgia'): ?> selected <?php endif; ?>>
                                                Georgia </option>
                                            <option value="Germany" <?php if(old('nationality', $nationality) == 'Germany'): ?> selected <?php endif; ?>>
                                                Germany </option>
                                            <option value="Ghana" <?php if(old('nationality', $nationality) == 'Ghana'): ?> selected <?php endif; ?>>
                                                Ghana </option>
                                            <option value="Greece" <?php if(old('nationality', $nationality) == 'Greece'): ?> selected <?php endif; ?>>
                                                Greece </option>
                                            <option value="Grenada" <?php if(old('nationality', $nationality) == 'Grenada'): ?> selected <?php endif; ?>>
                                                Grenada </option>
                                            <option value="Guatemala" <?php if(old('nationality', $nationality) == 'Guatemala'): ?> selected <?php endif; ?>>
                                                Guatemala </option>
                                            <option value="Guinea" <?php if(old('nationality', $nationality) == 'Guinea'): ?> selected <?php endif; ?>>
                                                Guinea </option>
                                            <option value="Guinea-Bissau"
                                                <?php if(old('nationality', $nationality) == 'Guinea-Bissau'): ?> selected <?php endif; ?>> Guinea-Bissau </option>
                                            <option value="Guyana" <?php if(old('nationality', $nationality) == 'Guyana'): ?> selected <?php endif; ?>>
                                                Guyana </option>
                                            <option value="Haiti" <?php if(old('nationality', $nationality) == 'Haiti'): ?> selected <?php endif; ?>>
                                                Haiti </option>
                                            <option value="Honduras" <?php if(old('nationality', $nationality) == 'Honduras'): ?> selected <?php endif; ?>>
                                                Honduras </option>
                                            <option value="Hungary" <?php if(old('nationality', $nationality) == 'Hungary'): ?> selected <?php endif; ?>>
                                                Hungary </option>
                                            <option value="Iceland" <?php if(old('nationality', $nationality) == 'Iceland'): ?> selected <?php endif; ?>>
                                                Iceland </option>
                                            <option value="India" <?php if(old('nationality', $nationality) == 'India'): ?> selected <?php endif; ?>>
                                                India </option>
                                            <option value="Indonesia" <?php if(old('nationality', $nationality) == 'Indonesia'): ?> selected <?php endif; ?>>
                                                Indonesia </option>
                                            <option value="Iran" <?php if(old('nationality', $nationality) == 'Iran'): ?> selected <?php endif; ?>>
                                                Iran </option>
                                            <option value="Iraq" <?php if(old('nationality', $nationality) == 'Iraq'): ?> selected <?php endif; ?>>
                                                Iraq </option>
                                            <option value="Ireland" <?php if(old('nationality', $nationality) == 'Ireland'): ?> selected <?php endif; ?>>
                                                Ireland </option>
                                            <option value="Israel" <?php if(old('nationality', $nationality) == 'Israel'): ?> selected <?php endif; ?>>
                                                Israel </option>
                                            <option value="Italy" <?php if(old('nationality', $nationality) == 'Italy'): ?> selected <?php endif; ?>>
                                                Italy </option>
                                            <option value="Ivory Coast (Côte d'Ivoire)"
                                                <?php if(old('nationality', $nationality) == "Ivory Coast (Côte d'Ivoire)"): ?> selected <?php endif; ?>> Ivory Coast (Côte
                                                d'Ivoire) </option>
                                            <option value="Jamaica" <?php if(old('nationality', $nationality) == 'Jamaica'): ?> selected <?php endif; ?>>
                                                Jamaica </option>
                                            <option value="Japan" <?php if(old('nationality', $nationality) == 'Japan'): ?> selected <?php endif; ?>>
                                                Japan </option>
                                            <option value="Jordan" <?php if(old('nationality', $nationality) == 'Jordan'): ?> selected <?php endif; ?>>
                                                Jordan </option>
                                            <option value="Kazakhstan" <?php if(old('nationality', $nationality) == 'Kazakhstan'): ?> selected <?php endif; ?>>
                                                Kazakhstan </option>
                                            <option value="Kenya" <?php if(old('nationality', $nationality) == 'Kenya'): ?> selected <?php endif; ?>>
                                                Kenya </option>
                                            <option value="Kiribati" <?php if(old('nationality', $nationality) == 'Kiribati'): ?> selected <?php endif; ?>>
                                                Kiribati </option>
                                            <option value="Kosovo" <?php if(old('nationality', $nationality) == 'Kosovo'): ?> selected <?php endif; ?>>
                                                Kosovo </option>
                                            <option value="Kuwait" <?php if(old('nationality', $nationality) == 'Kuwait'): ?> selected <?php endif; ?>>
                                                Kuwait </option>
                                            <option value="Kyrgyzstan" <?php if(old('nationality', $nationality) == 'Kyrgyzstan'): ?> selected <?php endif; ?>>
                                                Kyrgyzstan </option>
                                            <option value="Laos" <?php if(old('nationality', $nationality) == 'Laos'): ?> selected <?php endif; ?>>
                                                Laos </option>
                                            <option value="Latvia" <?php if(old('nationality', $nationality) == 'Latvia'): ?> selected <?php endif; ?>>
                                                Latvia </option>
                                            <option value="Lebanon" <?php if(old('nationality', $nationality) == 'Lebanon'): ?> selected <?php endif; ?>>
                                                Lebanon </option>
                                            <option value="Lesotho" <?php if(old('nationality', $nationality) == 'Lesotho'): ?> selected <?php endif; ?>>
                                                Lesotho </option>
                                            <option value="Liberia" <?php if(old('nationality', $nationality) == 'Liberia'): ?> selected <?php endif; ?>>
                                                Liberia </option>
                                            <option value="Libya" <?php if(old('nationality', $nationality) == 'Libya'): ?> selected <?php endif; ?>>
                                                Libya </option>
                                            <option value="Liechtenstein"
                                                <?php if(old('nationality', $nationality) == 'Liechtenstein'): ?> selected <?php endif; ?>> Liechtenstein
                                            </option>
                                            <option value="Lithuania"
                                                <?php if(old('nationality', $nationality) == 'Lithuania'): ?> selected <?php endif; ?>> Lithuania </option>
                                            <option value="Luxembourg"
                                                <?php if(old('nationality', $nationality) == 'Luxembourg'): ?> selected <?php endif; ?>> Luxembourg </option>
                                            <option value="Madagascar"
                                                <?php if(old('nationality', $nationality) == 'Madagascar'): ?> selected <?php endif; ?>> Madagascar </option>
                                            <option value="Malawi" <?php if(old('nationality', $nationality) == 'Malawi'): ?> selected <?php endif; ?>>
                                                Malawi </option>
                                            <option value="Malaysia" <?php if(old('nationality', $nationality) == 'Malaysia'): ?> selected <?php endif; ?>>
                                                Malaysia </option>
                                            <option value="Maldives" <?php if(old('nationality', $nationality) == 'Maldives'): ?> selected <?php endif; ?>>
                                                Maldives </option>
                                            <option value="Mali" <?php if(old('nationality', $nationality) == 'Mali'): ?> selected <?php endif; ?>>
                                                Mali </option>
                                            <option value="Malta" <?php if(old('nationality', $nationality) == 'Malta'): ?> selected <?php endif; ?>>
                                                Malta </option>
                                            <option value="Marshall Islands"
                                                <?php if(old('nationality', $nationality) == 'Marshall Islands'): ?> selected <?php endif; ?>> Marshall Islands
                                            </option>
                                            <option value="Mauritania"
                                                <?php if(old('nationality', $nationality) == 'Mauritania'): ?> selected <?php endif; ?>> Mauritania </option>
                                            <option value="Mauritius"
                                                <?php if(old('nationality', $nationality) == 'Mauritius'): ?> selected <?php endif; ?>> Mauritius </option>
                                            <option value="Mexico" <?php if(old('nationality', $nationality) == 'Mexico'): ?> selected <?php endif; ?>>
                                                Mexico </option>
                                            <option value="Micronesia"
                                                <?php if(old('nationality', $nationality) == 'Micronesia'): ?> selected <?php endif; ?>> Micronesia </option>
                                            <option value="Moldova" <?php if(old('nationality', $nationality) == 'Moldova'): ?> selected <?php endif; ?>>
                                                Moldova </option>
                                            <option value="Monaco" <?php if(old('nationality', $nationality) == 'Monaco'): ?> selected <?php endif; ?>>
                                                Monaco </option>
                                            <option value="Mongolia" <?php if(old('nationality', $nationality) == 'Mongolia'): ?> selected <?php endif; ?>>
                                                Mongolia </option>
                                            <option value="Montenegro"
                                                <?php if(old('nationality', $nationality) == 'Montenegro'): ?> selected <?php endif; ?>> Montenegro </option>
                                            <option value="Morocco" <?php if(old('nationality', $nationality) == 'Morocco'): ?> selected <?php endif; ?>>
                                                Morocco </option>
                                            <option value="Mozambique"
                                                <?php if(old('nationality', $nationality) == 'Mozambique'): ?> selected <?php endif; ?>> Mozambique </option>
                                            <option value="Myanmar (Burma)"
                                                <?php if(old('nationality', $nationality) == 'Myanmar (Burma)'): ?> selected <?php endif; ?>> Myanmar (Burma)
                                            </option>
                                            <option value="Namibia" <?php if(old('nationality', $nationality) == 'Namibia'): ?> selected <?php endif; ?>>
                                                Namibia </option>
                                            <option value="Nauru" <?php if(old('nationality', $nationality) == 'Nauru'): ?> selected <?php endif; ?>>
                                                Nauru </option>
                                            <option value="Nepal" <?php if(old('nationality', $nationality) == 'Nepal'): ?> selected <?php endif; ?>>
                                                Nepal </option>
                                            <option value="Netherlands"
                                                <?php if(old('nationality', $nationality) == 'Netherlands'): ?> selected <?php endif; ?>> Netherlands </option>
                                            <option value="New Zealand"
                                                <?php if(old('nationality', $nationality) == 'New Zealand'): ?> selected <?php endif; ?>> New Zealand </option>
                                            <option value="Nicaragua"
                                                <?php if(old('nationality', $nationality) == 'Nicaragua'): ?> selected <?php endif; ?>> Nicaragua </option>
                                            <option value="Niger" <?php if(old('nationality', $nationality) == 'Niger'): ?> selected <?php endif; ?>>
                                                Niger </option>
                                            <option value="Nigeria" <?php if(old('nationality', $nationality) == 'Nigeria'): ?> selected <?php endif; ?>>
                                                Nigeria </option>
                                            <option value="North Macedonia (formerly Macedonia)"
                                                <?php if(old('nationality', $nationality) == 'North Macedonia (formerly Macedonia)'): ?> selected <?php endif; ?>> North Macedonia
                                                (formerly Macedonia) </option>
                                            <option value="Norway" <?php if(old('nationality', $nationality) == 'Norway'): ?> selected <?php endif; ?>>
                                                Norway </option>
                                            <option value="Oman" <?php if(old('nationality', $nationality) == 'Oman'): ?> selected <?php endif; ?>>
                                                Oman </option>
                                            <option value="Pakistan" <?php if(old('nationality', $nationality) == 'Pakistan'): ?> selected <?php endif; ?>>
                                                Pakistan </option>
                                            <option value="Palau" <?php if(old('nationality', $nationality) == 'Palau'): ?> selected <?php endif; ?>>
                                                Palau </option>
                                            <option value="Palestine State"
                                                <?php if(old('nationality', $nationality) == 'Palestine State'): ?> selected <?php endif; ?>> Palestine State
                                            </option>
                                            <option value="Panama" <?php if(old('nationality', $nationality) == 'Panama'): ?> selected <?php endif; ?>>
                                                Panama </option>
                                            <option value="Papua New Guinea"
                                                <?php if(old('nationality', $nationality) == 'Papua New Guinea'): ?> selected <?php endif; ?>> Papua New Guinea
                                            </option>
                                            <option value="Paraguay" <?php if(old('nationality', $nationality) == 'Paraguay'): ?> selected <?php endif; ?>>
                                                Paraguay </option>
                                            <option value="Peru" <?php if(old('nationality', $nationality) == 'Peru'): ?> selected <?php endif; ?>>
                                                Peru </option>
                                            <option value="Philippines"
                                                <?php if(old('nationality', $nationality) == 'Philippines'): ?> selected <?php endif; ?>> Philippines </option>
                                            <option value="Poland" <?php if(old('nationality', $nationality) == 'Poland'): ?> selected <?php endif; ?>>
                                                Poland </option>
                                            <option value="Portugal" <?php if(old('nationality', $nationality) == 'Portugal'): ?> selected <?php endif; ?>>
                                                Portugal </option>
                                            <option value="Qatar" <?php if(old('nationality', $nationality) == 'Qatar'): ?> selected <?php endif; ?>>
                                                Qatar </option>
                                            <option value="Romania" <?php if(old('nationality', $nationality) == 'Romania'): ?> selected <?php endif; ?>>
                                                Romania </option>
                                            <option value="Russia" <?php if(old('nationality', $nationality) == 'Russia'): ?> selected <?php endif; ?>>
                                                Russia </option>
                                            <option value="Rwanda" <?php if(old('nationality', $nationality) == 'Rwanda'): ?> selected <?php endif; ?>>
                                                Rwanda </option>
                                            <option value="Saint Kitts and Nevis"
                                                <?php if(old('nationality', $nationality) == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>> Saint Kitts and Nevis
                                            </option>
                                            <option value="Saint Lucia"
                                                <?php if(old('nationality', $nationality) == 'Saint Lucia'): ?> selected <?php endif; ?>> Saint Lucia </option>
                                            <option value="Saint Vincent and the Grenadines"
                                                <?php if(old('nationality', $nationality) == 'Saint Vincent and the Grenadines'): ?> selected <?php endif; ?>> Saint Vincent and the
                                                Grenadines </option>
                                            <option value="Samoa" <?php if(old('nationality', $nationality) == 'Samoa'): ?> selected <?php endif; ?>>
                                                Samoa </option>
                                            <option value="San Marino"
                                                <?php if(old('nationality', $nationality) == 'San Marino'): ?> selected <?php endif; ?>> San Marino </option>
                                            <option value="Sao Tome and Principe"
                                                <?php if(old('nationality', $nationality) == 'Sao Tome and Principe'): ?> selected <?php endif; ?>> Sao Tome and Principe
                                            </option>
                                            <option value="Saudi Arabia"
                                                <?php if(old('nationality', $nationality) == 'Saudi Arabia'): ?> selected <?php endif; ?>> Saudi Arabia
                                            </option>
                                            <option value="Senegal" <?php if(old('nationality', $nationality) == 'Senegal'): ?> selected <?php endif; ?>>
                                                Senegal </option>
                                            <option value="Serbia" <?php if(old('nationality', $nationality) == 'Serbia'): ?> selected <?php endif; ?>>
                                                Serbia </option>
                                            <option value="Seychelles"
                                                <?php if(old('nationality', $nationality) == 'Seychelles'): ?> selected <?php endif; ?>> Seychelles </option>
                                            <option value="Sierra Leone"
                                                <?php if(old('nationality', $nationality) == 'Sierra Leone'): ?> selected <?php endif; ?>> Sierra Leone
                                            </option>
                                            <option value="Singapore"
                                                <?php if(old('nationality', $nationality) == 'Singapore'): ?> selected <?php endif; ?>> Singapore </option>
                                            <option value="Slovakia" <?php if(old('nationality', $nationality) == 'Slovakia'): ?> selected <?php endif; ?>>
                                                Slovakia </option>
                                            <option value="Slovenia" <?php if(old('nationality', $nationality) == 'Slovenia'): ?> selected <?php endif; ?>>
                                                Slovenia </option>
                                            <option value="Solomon Islands"
                                                <?php if(old('nationality', $nationality) == 'Solomon Islands'): ?> selected <?php endif; ?>> Solomon Islands
                                            </option>
                                            <option value="Somalia" <?php if(old('nationality', $nationality) == 'Somalia'): ?> selected <?php endif; ?>>
                                                Somalia </option>
                                            <option value="South Africa"
                                                <?php if(old('nationality', $nationality) == 'South Africa'): ?> selected <?php endif; ?>> South Africa
                                            </option>
                                            <option value="South Korea"
                                                <?php if(old('nationality', $nationality) == 'South Korea'): ?> selected <?php endif; ?>> South Korea </option>
                                            <option value="South Sudan"
                                                <?php if(old('nationality', $nationality) == 'South Sudan'): ?> selected <?php endif; ?>> South Sudan </option>
                                            <option value="Spain" <?php if(old('nationality', $nationality) == 'Spain'): ?> selected <?php endif; ?>>
                                                Spain </option>
                                            <option value="Sri Lanka"
                                                <?php if(old('nationality', $nationality) == 'Sri Lanka'): ?> selected <?php endif; ?>> Sri Lanka </option>
                                            <option value="Sudan" <?php if(old('nationality', $nationality) == 'Sudan'): ?> selected <?php endif; ?>>
                                                Sudan </option>
                                            <option value="Suriname" <?php if(old('nationality', $nationality) == 'Suriname'): ?> selected <?php endif; ?>>
                                                Suriname </option>
                                            <option value="Sweden" <?php if(old('nationality', $nationality) == 'Sweden'): ?> selected <?php endif; ?>>
                                                Sweden </option>
                                            <option value="Switzerland"
                                                <?php if(old('nationality', $nationality) == 'Switzerland'): ?> selected <?php endif; ?>> Switzerland </option>
                                            <option value="Syria" <?php if(old('nationality', $nationality) == 'Syria'): ?> selected <?php endif; ?>>
                                                Syria </option>
                                            <option value="Taiwan" <?php if(old('nationality', $nationality) == 'Taiwan'): ?> selected <?php endif; ?>>
                                                Taiwan </option>
                                            <option value="Tajikistan"
                                                <?php if(old('nationality', $nationality) == 'Tajikistan'): ?> selected <?php endif; ?>> Tajikistan </option>
                                            <option value="Tanzania" <?php if(old('nationality', $nationality) == 'Tanzania'): ?> selected <?php endif; ?>>
                                                Tanzania </option>
                                            <option value="Thailand" <?php if(old('nationality', $nationality) == 'Thailand'): ?> selected <?php endif; ?>>
                                                Thailand </option>
                                            <option value="Togo" <?php if(old('nationality', $nationality) == 'Togo'): ?> selected <?php endif; ?>>
                                                Togo </option>
                                            <option value="Tonga" <?php if(old('nationality', $nationality) == 'Tonga'): ?> selected <?php endif; ?>>
                                                Tonga </option>
                                            <option value="Trinidad and Tobago"
                                                <?php if(old('nationality', $nationality) == 'Trinidad and Tobago'): ?> selected <?php endif; ?>> Trinidad and Tobago
                                            </option>
                                            <option value="Tunisia" <?php if(old('nationality', $nationality) == 'Tunisia'): ?> selected <?php endif; ?>>
                                                Tunisia </option>
                                            <option value="Turkey" <?php if(old('nationality', $nationality) == 'Turkey'): ?> selected <?php endif; ?>>
                                                Turkey </option>
                                            <option value="Turkmenistan"
                                                <?php if(old('nationality', $nationality) == 'Turkmenistan'): ?> selected <?php endif; ?>> Turkmenistan
                                            </option>
                                            <option value="Tuvalu" <?php if(old('nationality', $nationality) == 'Tuvalu'): ?> selected <?php endif; ?>>
                                                Tuvalu </option>
                                            <option value="Uganda" <?php if(old('nationality', $nationality) == 'Uganda'): ?> selected <?php endif; ?>>
                                                Uganda </option>
                                            <option value="Ukraine" <?php if(old('nationality', $nationality) == 'Ukraine'): ?> selected <?php endif; ?>>
                                                Ukraine </option>
                                            <option value="United Arab Emirates"
                                                <?php if(old('nationality', $nationality) == 'United Arab Emirates'): ?> selected <?php endif; ?>> United Arab Emirates
                                            </option>
                                            <option value="United Kingdom"
                                                <?php if(old('nationality', $nationality) == 'United Kingdom'): ?> selected <?php endif; ?>> United Kingdom
                                            </option>
                                            <option value="United States of America"
                                                <?php if(old('nationality', $nationality) == 'United States of America'): ?> selected <?php endif; ?>> United States of
                                                America </option>
                                            <option value="Uruguay" <?php if(old('nationality', $nationality) == 'Uruguay'): ?> selected <?php endif; ?>>
                                                Uruguay </option>
                                            <option value="Uzbekistan"
                                                <?php if(old('nationality', $nationality) == 'Uzbekistan'): ?> selected <?php endif; ?>> Uzbekistan </option>
                                            <option value="Vanuatu" <?php if(old('nationality', $nationality) == 'Vanuatu'): ?> selected <?php endif; ?>>
                                                Vanuatu </option>
                                            <option value="Vatican City"
                                                <?php if(old('nationality', $nationality) == 'Vatican City'): ?> selected <?php endif; ?>> Vatican City
                                            </option>
                                            <option value="Venezuela"
                                                <?php if(old('nationality', $nationality) == 'Venezuela'): ?> selected <?php endif; ?>> Venezuela </option>
                                            <option value="Vietnam" <?php if(old('nationality', $nationality) == 'Vietnam'): ?> selected <?php endif; ?>>
                                                Vietnam </option>
                                            <option value="Yemen" <?php if(old('nationality', $nationality) == 'Yemen'): ?> selected <?php endif; ?>>
                                                Yemen </option>
                                            <option value="Zambia" <?php if(old('nationality', $nationality) == 'Zambia'): ?> selected <?php endif; ?>>
                                                Zambia </option>
                                            <option value="Zimbabwe" <?php if(old('nationality', $nationality) == 'Zimbabwe'): ?> selected <?php endif; ?>>
                                                Zimbabwe </option>
                                        </select>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Email
                                            Address *</label>
                                        <input type="email" readonly class="form-control fs-14 h-50px" name="email"
                                            value="<?php echo e($email); ?>" required>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="telephone-country"
                                            class="form-label fs-14 text-theme-primary fw-bold">Phone Number
                                            *</label>
                                        <div class="single-field full-width phone-input-flag d-flex ">
                                            <input type="tel" class="mobile-number form-control fs-14 h-50px"
                                                style="color: transparent;" name="country_code"
                                                value="<?php echo e(old('country_code', $country_code)); ?>" required>
                                            
                                            <input type="tel" class="mobile-number-full form-control fs-14 h-50px"
                                                placeholder="Phone Number" name="number" maxlength="11"
                                                value="<?php echo e(old('number', $number)); ?>" required>

                                        </div>
                                        
                                        
                                        
                                        
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label fs-14 text-theme-primary fw-bold">Street
                                            Address *</label>
                                        
                                        
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
                                            value="<?php echo e($zipCode); ?>" id="zip_code" name="zipCode" placeholder=""
                                            required>
                                    </div>
                                    
                                </div>
                            </fieldset>
                            <div class="row justify-content-center pt-md-5 pt-3">
                                <div class="col-lg-5 text-center">
                                    <button class="next action-button default-btn">
                                        Next
                                    </button>
                                    <br />
                                    <br />
                                    
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidates/detail.blade.php ENDPATH**/ ?>