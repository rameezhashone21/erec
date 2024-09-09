<?php $__env->startSection('content'); ?>
    <main>
        <section>
            <div class="container">
                <div class="row justify-content-center align-items-center py-lg-5 py-3">
                    <div class="col">
                        <h1 class="mb-0 fs-48 text-center fw-bold text-uppercase mt-5 pt-5 mb-4">Candidate Details</h1>
                        
                        <!-- progressbar -->
                        <ul id="progressbar">
                            <li class="active"></li>
                            <li class="active"></li>
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
                        <form id="msform" action="<?php echo e(route('store.candidateProfession')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <!-- fieldsets -->
                            <fieldset class="mb-5 first-sec">
                                <div class="duplicate_form">
                                    <div class="row row-cols-1">
                                        <div class="col d-flex justify-content-between align-items-center">
                                            <h2 class="fs-4 text-theme-primary text-uppercase fw-bold">Professional Details
                                            </h2>
                                            <a href="javascript:void(0)" id="addbtn" role="button"><img
                                                    src="<?php echo e(asset('images/plus-circle.svg')); ?>" alt="plus-circle"
                                                    class="img-fluid"></a>
                                        </div>
                                    </div>
                                    <?php if(count($month_exp) > 0): ?>
                                        <?php $__currentLoopData = $month_exp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                            <div class="row row-cols-1  mt-3 clone" id="repeat-<?php echo e($pro_id[$key]); ?>">
                                                <div class="col-lg-12 text-end">
                                                    <a class="remove"
                                                        href="<?php echo e(route('candidates.profession.delete', $pro_id[$key])); ?>">-</a>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Employer
                                                        Name*</label>
                                                    <input type="text" class="form-control fs-14 h-50px" id=""
                                                        value="<?php echo e($company_name[$key]); ?>" name="company_name[]" required>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Designation*</label>
                                                    <input type="text" class="form-control fs-14 h-50px" id=""
                                                        value="<?php echo e($designation[$key]); ?>" name="designation[]">
                                                </div>

                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Employer
                                                        Location*</label>
                                                    <select id="role" class="form-select fs-14  h-50px"
                                                        name="Employer_Location[]" required>
                                                        <option selected value="" disabled>Select Country</option>
                                                        <option value="Afghanistan"
                                                            <?php if($comp_loc[$key] == 'Afghanistan'): ?> selected <?php endif; ?>> Afghanistan
                                                        </option>
                                                        <option value="Albania"
                                                            <?php if($comp_loc[$key] == 'Albania'): ?> selected <?php endif; ?>> Albania
                                                        </option>
                                                        <option value="Algeria"
                                                            <?php if($comp_loc[$key] == 'Algeria'): ?> selected <?php endif; ?>> Algeria
                                                        </option>
                                                        <option value="Andorra"
                                                            <?php if($comp_loc[$key] == 'Andorra'): ?> selected <?php endif; ?>> Andorra
                                                        </option>
                                                        <option value="Angola"
                                                            <?php if($comp_loc[$key] == 'Angola'): ?> selected <?php endif; ?>> Angola
                                                        </option>
                                                        <option value="Antigua and Barbuda"
                                                            <?php if($comp_loc[$key] == 'Antigua and Barbuda'): ?> selected <?php endif; ?>> Antigua and
                                                            Barbuda </option>
                                                        <option value="Argentina"
                                                            <?php if($comp_loc[$key] == 'Argentina'): ?> selected <?php endif; ?>> Argentina
                                                        </option>
                                                        <option value="Armenia"
                                                            <?php if($comp_loc[$key] == 'Armenia'): ?> selected <?php endif; ?>> Armenia
                                                        </option>
                                                        <option value="Australia"
                                                            <?php if($comp_loc[$key] == 'Australia'): ?> selected <?php endif; ?>> Australia
                                                        </option>
                                                        <option value="Austria"
                                                            <?php if($comp_loc[$key] == 'Austria'): ?> selected <?php endif; ?>> Austria
                                                        </option>
                                                        <option value="Azerbaijan"
                                                            <?php if($comp_loc[$key] == 'Azerbaijan'): ?> selected <?php endif; ?>> Azerbaijan
                                                        </option>
                                                        <option value="Bahamas"
                                                            <?php if($comp_loc[$key] == 'Bahamas'): ?> selected <?php endif; ?>> Bahamas
                                                        </option>
                                                        <option value="Bahrain"
                                                            <?php if($comp_loc[$key] == 'Bahrain'): ?> selected <?php endif; ?>> Bahrain
                                                        </option>
                                                        <option value="Bangladesh"
                                                            <?php if($comp_loc[$key] == 'Bangladesh'): ?> selected <?php endif; ?>> Bangladesh
                                                        </option>
                                                        <option value="Barbados"
                                                            <?php if($comp_loc[$key] == 'Barbados'): ?> selected <?php endif; ?>> Barbados
                                                        </option>
                                                        <option value="Belarus"
                                                            <?php if($comp_loc[$key] == 'Belarus'): ?> selected <?php endif; ?>> Belarus
                                                        </option>
                                                        <option value="Belgium"
                                                            <?php if($comp_loc[$key] == 'Belgium'): ?> selected <?php endif; ?>> Belgium
                                                        </option>
                                                        <option value="Belize"
                                                            <?php if($comp_loc[$key] == 'Belize'): ?> selected <?php endif; ?>> Belize
                                                        </option>
                                                        <option value="Benin"
                                                            <?php if($comp_loc[$key] == 'Benin'): ?> selected <?php endif; ?>> Benin
                                                        </option>
                                                        <option value="Bhutan"
                                                            <?php if($comp_loc[$key] == 'Bhutan'): ?> selected <?php endif; ?>> Bhutan
                                                        </option>
                                                        <option value="Bolivia"
                                                            <?php if($comp_loc[$key] == 'Bolivia'): ?> selected <?php endif; ?>> Bolivia
                                                        </option>
                                                        <option value="Bosnia and Herzegovina"
                                                            <?php if($comp_loc[$key] == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>> Bosnia and
                                                            Herzegovina </option>
                                                        <option value="Botswana"
                                                            <?php if($comp_loc[$key] == 'Botswana'): ?> selected <?php endif; ?>> Botswana
                                                        </option>
                                                        <option value="Brazil"
                                                            <?php if($comp_loc[$key] == 'Brazil'): ?> selected <?php endif; ?>> Brazil
                                                        </option>
                                                        <option value="Brunei"
                                                            <?php if($comp_loc[$key] == 'Brunei'): ?> selected <?php endif; ?>> Brunei
                                                        </option>
                                                        <option value="Bulgaria"
                                                            <?php if($comp_loc[$key] == 'Bulgaria'): ?> selected <?php endif; ?>> Bulgaria
                                                        </option>
                                                        <option value="Burkina Faso"
                                                            <?php if($comp_loc[$key] == 'Burkina Faso'): ?> selected <?php endif; ?>> Burkina
                                                            Faso </option>
                                                        <option value="Burundi"
                                                            <?php if($comp_loc[$key] == 'Burundi'): ?> selected <?php endif; ?>> Burundi
                                                        </option>
                                                        <option value="Cabo Verde"
                                                            <?php if($comp_loc[$key] == 'Cabo Verde'): ?> selected <?php endif; ?>> Cabo Verde
                                                        </option>
                                                        <option value="Cambodia"
                                                            <?php if($comp_loc[$key] == 'Cambodia'): ?> selected <?php endif; ?>> Cambodia
                                                        </option>
                                                        <option value="Cameroon"
                                                            <?php if($comp_loc[$key] == 'Cameroon'): ?> selected <?php endif; ?>> Cameroon
                                                        </option>
                                                        <option value="Canada"
                                                            <?php if($comp_loc[$key] == 'Canada'): ?> selected <?php endif; ?>> Canada
                                                        </option>
                                                        <option value="Central African Republic"
                                                            <?php if($comp_loc[$key] == 'Central African Republic'): ?> selected <?php endif; ?>> Central
                                                            African Republic </option>
                                                        <option value="Chad"
                                                            <?php if($comp_loc[$key] == 'Chad'): ?> selected <?php endif; ?>> Chad
                                                        </option>
                                                        <option value="Chile"
                                                            <?php if($comp_loc[$key] == 'Chile'): ?> selected <?php endif; ?>> Chile
                                                        </option>
                                                        <option value="China"
                                                            <?php if($comp_loc[$key] == 'China'): ?> selected <?php endif; ?>> China
                                                        </option>
                                                        <option value="Colombia"
                                                            <?php if($comp_loc[$key] == 'Colombia'): ?> selected <?php endif; ?>> Colombia
                                                        </option>
                                                        <option value="Comoros"
                                                            <?php if($comp_loc[$key] == 'Comoros'): ?> selected <?php endif; ?>> Comoros
                                                        </option>
                                                        <option value="Congo (Congo-Brazzaville)"
                                                            <?php if($comp_loc[$key] == 'Congo (Congo-Brazzaville)'): ?> selected <?php endif; ?>> Congo
                                                            (Congo-Brazzaville) </option>
                                                        <option value="Costa Rica"
                                                            <?php if($comp_loc[$key] == 'Costa Rica'): ?> selected <?php endif; ?>> Costa Rica
                                                        </option>
                                                        <option value="Croatia"
                                                            <?php if($comp_loc[$key] == 'Croatia'): ?> selected <?php endif; ?>> Croatia
                                                        </option>
                                                        <option value="Cuba"
                                                            <?php if($comp_loc[$key] == 'Cuba'): ?> selected <?php endif; ?>> Cuba
                                                        </option>
                                                        <option value="Cyprus"
                                                            <?php if($comp_loc[$key] == 'Cyprus'): ?> selected <?php endif; ?>> Cyprus
                                                        </option>
                                                        <option value="Czechia (Czech Republic)"
                                                            <?php if($comp_loc[$key] == 'Czechia (Czech Republic)'): ?> selected <?php endif; ?>> Czechia
                                                            (Czech Republic) </option>
                                                        <option value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                            <?php if($comp_loc[$key] == 'Democratic Republic of the Congo (Congo-Kinshasa)'): ?> selected <?php endif; ?>> Democratic
                                                            Republic of the Congo (Congo-Kinshasa) </option>
                                                        <option value="Denmark"
                                                            <?php if($comp_loc[$key] == 'Denmark'): ?> selected <?php endif; ?>> Denmark
                                                        </option>
                                                        <option value="Djibouti"
                                                            <?php if($comp_loc[$key] == 'Djibouti'): ?> selected <?php endif; ?>> Djibouti
                                                        </option>
                                                        <option value="Dominica"
                                                            <?php if($comp_loc[$key] == 'Dominica'): ?> selected <?php endif; ?>> Dominica
                                                        </option>
                                                        <option value="Dominican Republic"
                                                            <?php if($comp_loc[$key] == 'Dominican Republic'): ?> selected <?php endif; ?>> Dominican
                                                            Republic </option>
                                                        <option value="East Timor (Timor-Leste)"
                                                            <?php if($comp_loc[$key] == 'East Timor (Timor-Leste)'): ?> selected <?php endif; ?>> East Timor
                                                            (Timor-Leste) </option>
                                                        <option value="Ecuador"
                                                            <?php if($comp_loc[$key] == 'Ecuador'): ?> selected <?php endif; ?>> Ecuador
                                                        </option>
                                                        <option value="Egypt"
                                                            <?php if($comp_loc[$key] == 'Egypt'): ?> selected <?php endif; ?>> Egypt
                                                        </option>
                                                        <option value="El Salvador"
                                                            <?php if($comp_loc[$key] == 'El Salvador'): ?> selected <?php endif; ?>> El Salvador
                                                        </option>
                                                        <option value="Equatorial Guinea"
                                                            <?php if($comp_loc[$key] == 'Equatorial Guinea'): ?> selected <?php endif; ?>> Equatorial
                                                            Guinea </option>
                                                        <option value="Eritrea"
                                                            <?php if($comp_loc[$key] == 'Eritrea'): ?> selected <?php endif; ?>> Eritrea
                                                        </option>
                                                        <option value="Estonia"
                                                            <?php if($comp_loc[$key] == 'Estonia'): ?> selected <?php endif; ?>> Estonia
                                                        </option>
                                                        <option value="Eswatini (formerly Swaziland)"
                                                            <?php if($comp_loc[$key] == 'Eswatini (formerly Swaziland)'): ?> selected <?php endif; ?>> Eswatini
                                                            (formerly Swaziland) </option>
                                                        <option value="Ethiopia"
                                                            <?php if($comp_loc[$key] == 'Ethiopia'): ?> selected <?php endif; ?>> Ethiopia
                                                        </option>
                                                        <option value="Fiji"
                                                            <?php if($comp_loc[$key] == 'Fiji'): ?> selected <?php endif; ?>> Fiji
                                                        </option>
                                                        <option value="Finland"
                                                            <?php if($comp_loc[$key] == 'Finland'): ?> selected <?php endif; ?>> Finland
                                                        </option>
                                                        <option value="France"
                                                            <?php if($comp_loc[$key] == 'France'): ?> selected <?php endif; ?>> France
                                                        </option>
                                                        <option value="Gabon"
                                                            <?php if($comp_loc[$key] == 'Gabon'): ?> selected <?php endif; ?>> Gabon
                                                        </option>
                                                        <option value="Gambia"
                                                            <?php if($comp_loc[$key] == 'Gambia'): ?> selected <?php endif; ?>> Gambia
                                                        </option>
                                                        <option value="Georgia"
                                                            <?php if($comp_loc[$key] == 'Georgia'): ?> selected <?php endif; ?>> Georgia
                                                        </option>
                                                        <option value="Germany"
                                                            <?php if($comp_loc[$key] == 'Germany'): ?> selected <?php endif; ?>> Germany
                                                        </option>
                                                        <option value="Ghana"
                                                            <?php if($comp_loc[$key] == 'Ghana'): ?> selected <?php endif; ?>> Ghana
                                                        </option>
                                                        <option value="Greece"
                                                            <?php if($comp_loc[$key] == 'Greece'): ?> selected <?php endif; ?>> Greece
                                                        </option>
                                                        <option value="Grenada"
                                                            <?php if($comp_loc[$key] == 'Grenada'): ?> selected <?php endif; ?>> Grenada
                                                        </option>
                                                        <option value="Guatemala"
                                                            <?php if($comp_loc[$key] == 'Guatemala'): ?> selected <?php endif; ?>> Guatemala
                                                        </option>
                                                        <option value="Guinea"
                                                            <?php if($comp_loc[$key] == 'Guinea'): ?> selected <?php endif; ?>> Guinea
                                                        </option>
                                                        <option value="Guinea-Bissau"
                                                            <?php if($comp_loc[$key] == 'Guinea-Bissau'): ?> selected <?php endif; ?>>
                                                            Guinea-Bissau </option>
                                                        <option value="Guyana"
                                                            <?php if($comp_loc[$key] == 'Guyana'): ?> selected <?php endif; ?>> Guyana
                                                        </option>
                                                        <option value="Haiti"
                                                            <?php if($comp_loc[$key] == 'Haiti'): ?> selected <?php endif; ?>> Haiti
                                                        </option>
                                                        <option value="Honduras"
                                                            <?php if($comp_loc[$key] == 'Honduras'): ?> selected <?php endif; ?>> Honduras
                                                        </option>
                                                        <option value="Hungary"
                                                            <?php if($comp_loc[$key] == 'Hungary'): ?> selected <?php endif; ?>> Hungary
                                                        </option>
                                                        <option value="Iceland"
                                                            <?php if($comp_loc[$key] == 'Iceland'): ?> selected <?php endif; ?>> Iceland
                                                        </option>
                                                        <option value="India"
                                                            <?php if($comp_loc[$key] == 'India'): ?> selected <?php endif; ?>> India
                                                        </option>
                                                        <option value="Indonesia"
                                                            <?php if($comp_loc[$key] == 'Indonesia'): ?> selected <?php endif; ?>> Indonesia
                                                        </option>
                                                        <option value="Iran"
                                                            <?php if($comp_loc[$key] == 'Iran'): ?> selected <?php endif; ?>> Iran
                                                        </option>
                                                        <option value="Iraq"
                                                            <?php if($comp_loc[$key] == 'Iraq'): ?> selected <?php endif; ?>> Iraq
                                                        </option>
                                                        <option value="Ireland"
                                                            <?php if($comp_loc[$key] == 'Ireland'): ?> selected <?php endif; ?>> Ireland
                                                        </option>
                                                        <option value="Israel"
                                                            <?php if($comp_loc[$key] == 'Israel'): ?> selected <?php endif; ?>> Israel
                                                        </option>
                                                        <option value="Italy"
                                                            <?php if($comp_loc[$key] == 'Italy'): ?> selected <?php endif; ?>> Italy
                                                        </option>
                                                        <option value="Ivory Coast (Côte d'Ivoire)"
                                                            <?php if($comp_loc[$key] == "Ivory Coast (Côte d'Ivoire)"): ?> selected <?php endif; ?>> Ivory Coast
                                                            (Côte d'Ivoire) </option>
                                                        <option value="Jamaica"
                                                            <?php if($comp_loc[$key] == 'Jamaica'): ?> selected <?php endif; ?>> Jamaica
                                                        </option>
                                                        <option value="Japan"
                                                            <?php if($comp_loc[$key] == 'Japan'): ?> selected <?php endif; ?>> Japan
                                                        </option>
                                                        <option value="Jordan"
                                                            <?php if($comp_loc[$key] == 'Jordan'): ?> selected <?php endif; ?>> Jordan
                                                        </option>
                                                        <option value="Kazakhstan"
                                                            <?php if($comp_loc[$key] == 'Kazakhstan'): ?> selected <?php endif; ?>> Kazakhstan
                                                        </option>
                                                        <option value="Kenya"
                                                            <?php if($comp_loc[$key] == 'Kenya'): ?> selected <?php endif; ?>> Kenya
                                                        </option>
                                                        <option value="Kiribati"
                                                            <?php if($comp_loc[$key] == 'Kiribati'): ?> selected <?php endif; ?>> Kiribati
                                                        </option>
                                                        <option value="Kosovo"
                                                            <?php if($comp_loc[$key] == 'Kosovo'): ?> selected <?php endif; ?>> Kosovo
                                                        </option>
                                                        <option value="Kuwait"
                                                            <?php if($comp_loc[$key] == 'Kuwait'): ?> selected <?php endif; ?>> Kuwait
                                                        </option>
                                                        <option value="Kyrgyzstan"
                                                            <?php if($comp_loc[$key] == 'Kyrgyzstan'): ?> selected <?php endif; ?>> Kyrgyzstan
                                                        </option>
                                                        <option value="Laos"
                                                            <?php if($comp_loc[$key] == 'Laos'): ?> selected <?php endif; ?>> Laos
                                                        </option>
                                                        <option value="Latvia"
                                                            <?php if($comp_loc[$key] == 'Latvia'): ?> selected <?php endif; ?>> Latvia
                                                        </option>
                                                        <option value="Lebanon"
                                                            <?php if($comp_loc[$key] == 'Lebanon'): ?> selected <?php endif; ?>> Lebanon
                                                        </option>
                                                        <option value="Lesotho"
                                                            <?php if($comp_loc[$key] == 'Lesotho'): ?> selected <?php endif; ?>> Lesotho
                                                        </option>
                                                        <option value="Liberia"
                                                            <?php if($comp_loc[$key] == 'Liberia'): ?> selected <?php endif; ?>> Liberia
                                                        </option>
                                                        <option value="Libya"
                                                            <?php if($comp_loc[$key] == 'Libya'): ?> selected <?php endif; ?>> Libya
                                                        </option>
                                                        <option value="Liechtenstein"
                                                            <?php if($comp_loc[$key] == 'Liechtenstein'): ?> selected <?php endif; ?>>
                                                            Liechtenstein </option>
                                                        <option value="Lithuania"
                                                            <?php if($comp_loc[$key] == 'Lithuania'): ?> selected <?php endif; ?>> Lithuania
                                                        </option>
                                                        <option value="Luxembourg"
                                                            <?php if($comp_loc[$key] == 'Luxembourg'): ?> selected <?php endif; ?>>
                                                            Luxembourg </option>
                                                        <option value="Madagascar"
                                                            <?php if($comp_loc[$key] == 'Madagascar'): ?> selected <?php endif; ?>>
                                                            Madagascar </option>
                                                        <option value="Malawi"
                                                            <?php if($comp_loc[$key] == 'Malawi'): ?> selected <?php endif; ?>> Malawi
                                                        </option>
                                                        <option value="Malaysia"
                                                            <?php if($comp_loc[$key] == 'Malaysia'): ?> selected <?php endif; ?>> Malaysia
                                                        </option>
                                                        <option value="Maldives"
                                                            <?php if($comp_loc[$key] == 'Maldives'): ?> selected <?php endif; ?>> Maldives
                                                        </option>
                                                        <option value="Mali"
                                                            <?php if($comp_loc[$key] == 'Mali'): ?> selected <?php endif; ?>> Mali
                                                        </option>
                                                        <option value="Malta"
                                                            <?php if($comp_loc[$key] == 'Malta'): ?> selected <?php endif; ?>> Malta
                                                        </option>
                                                        <option value="Marshall Islands"
                                                            <?php if($comp_loc[$key] == 'Marshall Islands'): ?> selected <?php endif; ?>> Marshall
                                                            Islands </option>
                                                        <option value="Mauritania"
                                                            <?php if($comp_loc[$key] == 'Mauritania'): ?> selected <?php endif; ?>>
                                                            Mauritania </option>
                                                        <option value="Mauritius"
                                                            <?php if($comp_loc[$key] == 'Mauritius'): ?> selected <?php endif; ?>> Mauritius
                                                        </option>
                                                        <option value="Mexico"
                                                            <?php if($comp_loc[$key] == 'Mexico'): ?> selected <?php endif; ?>> Mexico
                                                        </option>
                                                        <option value="Micronesia"
                                                            <?php if($comp_loc[$key] == 'Micronesia'): ?> selected <?php endif; ?>>
                                                            Micronesia </option>
                                                        <option value="Moldova"
                                                            <?php if($comp_loc[$key] == 'Moldova'): ?> selected <?php endif; ?>> Moldova
                                                        </option>
                                                        <option value="Monaco"
                                                            <?php if($comp_loc[$key] == 'Monaco'): ?> selected <?php endif; ?>> Monaco
                                                        </option>
                                                        <option value="Mongolia"
                                                            <?php if($comp_loc[$key] == 'Mongolia'): ?> selected <?php endif; ?>> Mongolia
                                                        </option>
                                                        <option value="Montenegro"
                                                            <?php if($comp_loc[$key] == 'Montenegro'): ?> selected <?php endif; ?>>
                                                            Montenegro </option>
                                                        <option value="Morocco"
                                                            <?php if($comp_loc[$key] == 'Morocco'): ?> selected <?php endif; ?>> Morocco
                                                        </option>
                                                        <option value="Mozambique"
                                                            <?php if($comp_loc[$key] == 'Mozambique'): ?> selected <?php endif; ?>>
                                                            Mozambique </option>
                                                        <option value="Myanmar (Burma)"
                                                            <?php if($comp_loc[$key] == 'Myanmar (Burma)'): ?> selected <?php endif; ?>> Myanmar
                                                            (Burma) </option>
                                                        <option value="Namibia"
                                                            <?php if($comp_loc[$key] == 'Namibia'): ?> selected <?php endif; ?>> Namibia
                                                        </option>
                                                        <option value="Nauru"
                                                            <?php if($comp_loc[$key] == 'Nauru'): ?> selected <?php endif; ?>> Nauru
                                                        </option>
                                                        <option value="Nepal"
                                                            <?php if($comp_loc[$key] == 'Nepal'): ?> selected <?php endif; ?>> Nepal
                                                        </option>
                                                        <option value="Netherlands"
                                                            <?php if($comp_loc[$key] == 'Netherlands'): ?> selected <?php endif; ?>>
                                                            Netherlands </option>
                                                        <option value="New Zealand"
                                                            <?php if($comp_loc[$key] == 'New Zealand'): ?> selected <?php endif; ?>> New
                                                            Zealand </option>
                                                        <option value="Nicaragua"
                                                            <?php if($comp_loc[$key] == 'Nicaragua'): ?> selected <?php endif; ?>> Nicaragua
                                                        </option>
                                                        <option value="Niger"
                                                            <?php if($comp_loc[$key] == 'Niger'): ?> selected <?php endif; ?>> Niger
                                                        </option>
                                                        <option value="Nigeria"
                                                            <?php if($comp_loc[$key] == 'Nigeria'): ?> selected <?php endif; ?>> Nigeria
                                                        </option>
                                                        <option value="North Macedonia (formerly Macedonia)"
                                                            <?php if($comp_loc[$key] == 'North Macedonia (formerly Macedonia)'): ?> selected <?php endif; ?>> North
                                                            Macedonia (formerly Macedonia) </option>
                                                        <option value="Norway"
                                                            <?php if($comp_loc[$key] == 'Norway'): ?> selected <?php endif; ?>> Norway
                                                        </option>
                                                        <option value="Oman"
                                                            <?php if($comp_loc[$key] == 'Oman'): ?> selected <?php endif; ?>> Oman
                                                        </option>
                                                        <option value="Pakistan"
                                                            <?php if($comp_loc[$key] == 'Pakistan'): ?> selected <?php endif; ?>> Pakistan
                                                        </option>
                                                        <option value="Palau"
                                                            <?php if($comp_loc[$key] == 'Palau'): ?> selected <?php endif; ?>> Palau
                                                        </option>
                                                        <option value="Palestine State"
                                                            <?php if($comp_loc[$key] == 'Palestine State'): ?> selected <?php endif; ?>> Palestine
                                                            State </option>
                                                        <option value="Panama"
                                                            <?php if($comp_loc[$key] == 'Panama'): ?> selected <?php endif; ?>> Panama
                                                        </option>
                                                        <option value="Papua New Guinea"
                                                            <?php if($comp_loc[$key] == 'Papua New Guinea'): ?> selected <?php endif; ?>> Papua New
                                                            Guinea </option>
                                                        <option value="Paraguay"
                                                            <?php if($comp_loc[$key] == 'Paraguay'): ?> selected <?php endif; ?>> Paraguay
                                                        </option>
                                                        <option value="Peru"
                                                            <?php if($comp_loc[$key] == 'Peru'): ?> selected <?php endif; ?>> Peru
                                                        </option>
                                                        <option value="Philippines"
                                                            <?php if($comp_loc[$key] == 'Philippines'): ?> selected <?php endif; ?>>
                                                            Philippines </option>
                                                        <option value="Poland"
                                                            <?php if($comp_loc[$key] == 'Poland'): ?> selected <?php endif; ?>> Poland
                                                        </option>
                                                        <option value="Portugal"
                                                            <?php if($comp_loc[$key] == 'Portugal'): ?> selected <?php endif; ?>> Portugal
                                                        </option>
                                                        <option value="Qatar"
                                                            <?php if($comp_loc[$key] == 'Qatar'): ?> selected <?php endif; ?>> Qatar
                                                        </option>
                                                        <option value="Romania"
                                                            <?php if($comp_loc[$key] == 'Romania'): ?> selected <?php endif; ?>> Romania
                                                        </option>
                                                        <option value="Russia"
                                                            <?php if($comp_loc[$key] == 'Russia'): ?> selected <?php endif; ?>> Russia
                                                        </option>
                                                        <option value="Rwanda"
                                                            <?php if($comp_loc[$key] == 'Rwanda'): ?> selected <?php endif; ?>> Rwanda
                                                        </option>
                                                        <option value="Saint Kitts and Nevis"
                                                            <?php if($comp_loc[$key] == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>> Saint
                                                            Kitts and Nevis </option>
                                                        <option value="Saint Lucia"
                                                            <?php if($comp_loc[$key] == 'Saint Lucia'): ?> selected <?php endif; ?>> Saint
                                                            Lucia </option>
                                                        <option value="Saint Vincent and the Grenadines"
                                                            <?php if($comp_loc[$key] == 'Saint Vincent and the Grenadines'): ?> selected <?php endif; ?>> Saint
                                                            Vincent and the Grenadines </option>
                                                        <option value="Samoa"
                                                            <?php if($comp_loc[$key] == 'Samoa'): ?> selected <?php endif; ?>> Samoa
                                                        </option>
                                                        <option value="San Marino"
                                                            <?php if($comp_loc[$key] == 'San Marino'): ?> selected <?php endif; ?>> San
                                                            Marino </option>
                                                        <option value="Sao Tome and Principe"
                                                            <?php if($comp_loc[$key] == 'Sao Tome and Principe'): ?> selected <?php endif; ?>> Sao Tome
                                                            and Principe </option>
                                                        <option value="Saudi Arabia"
                                                            <?php if($comp_loc[$key] == 'Saudi Arabia'): ?> selected <?php endif; ?>> Saudi
                                                            Arabia </option>
                                                        <option value="Senegal"
                                                            <?php if($comp_loc[$key] == 'Senegal'): ?> selected <?php endif; ?>> Senegal
                                                        </option>
                                                        <option value="Serbia"
                                                            <?php if($comp_loc[$key] == 'Serbia'): ?> selected <?php endif; ?>> Serbia
                                                        </option>
                                                        <option value="Seychelles"
                                                            <?php if($comp_loc[$key] == 'Seychelles'): ?> selected <?php endif; ?>>
                                                            Seychelles </option>
                                                        <option value="Sierra Leone"
                                                            <?php if($comp_loc[$key] == 'Sierra Leone'): ?> selected <?php endif; ?>> Sierra
                                                            Leone </option>
                                                        <option value="Singapore"
                                                            <?php if($comp_loc[$key] == 'Singapore'): ?> selected <?php endif; ?>> Singapore
                                                        </option>
                                                        <option value="Slovakia"
                                                            <?php if($comp_loc[$key] == 'Slovakia'): ?> selected <?php endif; ?>> Slovakia
                                                        </option>
                                                        <option value="Slovenia"
                                                            <?php if($comp_loc[$key] == 'Slovenia'): ?> selected <?php endif; ?>> Slovenia
                                                        </option>
                                                        <option value="Solomon Islands"
                                                            <?php if($comp_loc[$key] == 'Solomon Islands'): ?> selected <?php endif; ?>> Solomon
                                                            Islands </option>
                                                        <option value="Somalia"
                                                            <?php if($comp_loc[$key] == 'Somalia'): ?> selected <?php endif; ?>> Somalia
                                                        </option>
                                                        <option value="South Africa"
                                                            <?php if($comp_loc[$key] == 'South Africa'): ?> selected <?php endif; ?>> South
                                                            Africa </option>
                                                        <option value="South Korea"
                                                            <?php if($comp_loc[$key] == 'South Korea'): ?> selected <?php endif; ?>> South
                                                            Korea </option>
                                                        <option value="South Sudan"
                                                            <?php if($comp_loc[$key] == 'South Sudan'): ?> selected <?php endif; ?>> South
                                                            Sudan </option>
                                                        <option value="Spain"
                                                            <?php if($comp_loc[$key] == 'Spain'): ?> selected <?php endif; ?>> Spain
                                                        </option>
                                                        <option value="Sri Lanka"
                                                            <?php if($comp_loc[$key] == 'Sri Lanka'): ?> selected <?php endif; ?>> Sri Lanka
                                                        </option>
                                                        <option value="Sudan"
                                                            <?php if($comp_loc[$key] == 'Sudan'): ?> selected <?php endif; ?>> Sudan
                                                        </option>
                                                        <option value="Suriname"
                                                            <?php if($comp_loc[$key] == 'Suriname'): ?> selected <?php endif; ?>> Suriname
                                                        </option>
                                                        <option value="Sweden"
                                                            <?php if($comp_loc[$key] == 'Sweden'): ?> selected <?php endif; ?>> Sweden
                                                        </option>
                                                        <option value="Switzerland"
                                                            <?php if($comp_loc[$key] == 'Switzerland'): ?> selected <?php endif; ?>>
                                                            Switzerland </option>
                                                        <option value="Syria"
                                                            <?php if($comp_loc[$key] == 'Syria'): ?> selected <?php endif; ?>> Syria
                                                        </option>
                                                        <option value="Taiwan"
                                                            <?php if($comp_loc[$key] == 'Taiwan'): ?> selected <?php endif; ?>> Taiwan
                                                        </option>
                                                        <option value="Tajikistan"
                                                            <?php if($comp_loc[$key] == 'Tajikistan'): ?> selected <?php endif; ?>>
                                                            Tajikistan </option>
                                                        <option value="Tanzania"
                                                            <?php if($comp_loc[$key] == 'Tanzania'): ?> selected <?php endif; ?>> Tanzania
                                                        </option>
                                                        <option value="Thailand"
                                                            <?php if($comp_loc[$key] == 'Thailand'): ?> selected <?php endif; ?>> Thailand
                                                        </option>
                                                        <option value="Togo"
                                                            <?php if($comp_loc[$key] == 'Togo'): ?> selected <?php endif; ?>> Togo
                                                        </option>
                                                        <option value="Tonga"
                                                            <?php if($comp_loc[$key] == 'Tonga'): ?> selected <?php endif; ?>> Tonga
                                                        </option>
                                                        <option value="Trinidad and Tobago"
                                                            <?php if($comp_loc[$key] == 'Trinidad and Tobago'): ?> selected <?php endif; ?>> Trinidad
                                                            and Tobago </option>
                                                        <option value="Tunisia"
                                                            <?php if($comp_loc[$key] == 'Tunisia'): ?> selected <?php endif; ?>> Tunisia
                                                        </option>
                                                        <option value="Turkey"
                                                            <?php if($comp_loc[$key] == 'Turkey'): ?> selected <?php endif; ?>> Turkey
                                                        </option>
                                                        <option value="Turkmenistan"
                                                            <?php if($comp_loc[$key] == 'Turkmenistan'): ?> selected <?php endif; ?>>
                                                            Turkmenistan </option>
                                                        <option value="Tuvalu"
                                                            <?php if($comp_loc[$key] == 'Tuvalu'): ?> selected <?php endif; ?>> Tuvalu
                                                        </option>
                                                        <option value="Uganda"
                                                            <?php if($comp_loc[$key] == 'Uganda'): ?> selected <?php endif; ?>> Uganda
                                                        </option>
                                                        <option value="Ukraine"
                                                            <?php if($comp_loc[$key] == 'Ukraine'): ?> selected <?php endif; ?>> Ukraine
                                                        </option>
                                                        <option value="United Arab Emirates"
                                                            <?php if($comp_loc[$key] == 'United Arab Emirates'): ?> selected <?php endif; ?>> United
                                                            Arab Emirates </option>
                                                        <option value="United Kingdom"
                                                            <?php if($comp_loc[$key] == 'United Kingdom'): ?> selected <?php endif; ?>> United
                                                            Kingdom </option>
                                                        <option value="United States of America"
                                                            <?php if($comp_loc[$key] == 'United States of America'): ?> selected <?php endif; ?>> United
                                                            States of America </option>
                                                        <option value="Uruguay"
                                                            <?php if($comp_loc[$key] == 'Uruguay'): ?> selected <?php endif; ?>> Uruguay
                                                        </option>
                                                        <option value="Uzbekistan"
                                                            <?php if($comp_loc[$key] == 'Uzbekistan'): ?> selected <?php endif; ?>>
                                                            Uzbekistan </option>
                                                        <option value="Vanuatu"
                                                            <?php if($comp_loc[$key] == 'Vanuatu'): ?> selected <?php endif; ?>> Vanuatu
                                                        </option>
                                                        <option value="Vatican City"
                                                            <?php if($comp_loc[$key] == 'Vatican City'): ?> selected <?php endif; ?>> Vatican
                                                            City </option>
                                                        <option value="Venezuela"
                                                            <?php if($comp_loc[$key] == 'Venezuela'): ?> selected <?php endif; ?>> Venezuela
                                                        </option>
                                                        <option value="Vietnam"
                                                            <?php if($comp_loc[$key] == 'Vietnam'): ?> selected <?php endif; ?>> Vietnam
                                                        </option>
                                                        <option value="Yemen"
                                                            <?php if($comp_loc[$key] == 'Yemen'): ?> selected <?php endif; ?>> Yemen
                                                        </option>
                                                        <option value="Zambia"
                                                            <?php if($comp_loc[$key] == 'Zambia'): ?> selected <?php endif; ?>> Zambia
                                                        </option>
                                                        <option value="Zimbabwe"
                                                            <?php if($comp_loc[$key] == 'Zimbabwe'): ?> selected <?php endif; ?>> Zimbabwe
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Total
                                                        Work Experience*</label>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="year_exp[]"
                                                            onchange='changeToDate(<?php echo e($key); ?>)' value="0"
                                                            id="currentlyWorkHere<?php echo e($key); ?>"
                                                            <?php if($year_exp[$key] == 0): ?> checked <?php endif; ?>>
                                                        <label class="form-check-label fs-14"
                                                            for="currentlyWorkHere<?php echo e($key); ?>">
                                                            currently working here
                                                        </label>
                                                    </div>
                                                    <div class="d-md-flex align-items-center ">
                                                        <div class="">
                                                            <span class="fs-6">Start Date</span>
                                                            <div class="position-relative">
                                                                <input type="text"
                                                                    class="form-control datepicker fs-14 h-50px w-100"
                                                                    value="<?php echo e($month_exp[$key]); ?>"
                                                                    placeholder="dd-mm-yyyy" autocomplete="off"
                                                                    id="startDate<?php echo e($key); ?>" name="month_exp[]"
                                                                    required readonly>
                                                                <label class="calender-icon d-block"
                                                                    for="startDate<?php echo e($key); ?>">
                                                                    <i class="far fa-calendar-alt"></i>
                                                                </label>
                                                            </div>
                                                        </div>
                                                        <div id="toDate<?php echo e($key); ?>" class="to-date-div">
                                                            <div class='mx-md-4 mt-md-3 py-1 py-md-0'>
                                                                -To-
                                                            </div>
                                                            <div class="">
                                                                <span class="fs-6">End Date</span>
                                                                <div class="position-relative">
                                                                    <input type="text"
                                                                        class="form-control datepicker fs-14 h-50px w-100"
                                                                        value="<?php if($year_exp[$key] != 0): ?> <?php echo e($year_exp[$key]); ?> <?php endif; ?>"
                                                                        placeholder="dd-mm-yyyy" autocomplete="off"
                                                                        name="year_exp[]" required readonly
                                                                        <?php if($year_exp[$key] == 0): ?> disabled <?php endif; ?>>
                                                                    <label class="calender-icon d-block"
                                                                        for="toDate<?php echo e($key); ?>">
                                                                        <i class="far fa-calendar-alt"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="mt-3 ms-3" id='presentText<?php echo e($key); ?>' style="display: none;">
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
                                                                    <?php if($currency[$key] == 'Afghanistan'): ?> selected <?php endif; ?>>
                                                                    Afghanistan </option>
                                                                <option value="Albania"
                                                                    <?php if($currency[$key] == 'Albania'): ?> selected <?php endif; ?>>
                                                                    Albania </option>
                                                                <option value="Algeria"
                                                                    <?php if($currency[$key] == 'Algeria'): ?> selected <?php endif; ?>>
                                                                    Algeria </option>
                                                                <option value="Andorra"
                                                                    <?php if($currency[$key] == 'Andorra'): ?> selected <?php endif; ?>>
                                                                    Andorra </option>
                                                                <option value="Angola"
                                                                    <?php if($currency[$key] == 'Angola'): ?> selected <?php endif; ?>>
                                                                    Angola </option>
                                                                <option value="Antigua and Barbuda"
                                                                    <?php if($currency[$key] == 'Antigua and Barbuda'): ?> selected <?php endif; ?>>
                                                                    Antigua and Barbuda </option>
                                                                <option value="Argentina"
                                                                    <?php if($currency[$key] == 'Argentina'): ?> selected <?php endif; ?>>
                                                                    Argentina </option>
                                                                <option value="Armenia"
                                                                    <?php if($currency[$key] == 'Armenia'): ?> selected <?php endif; ?>>
                                                                    Armenia </option>
                                                                <option value="Australia"
                                                                    <?php if($currency[$key] == 'Australia'): ?> selected <?php endif; ?>>
                                                                    Australia </option>
                                                                <option value="Austria"
                                                                    <?php if($currency[$key] == 'Austria'): ?> selected <?php endif; ?>>
                                                                    Austria </option>
                                                                <option value="Azerbaijan"
                                                                    <?php if($currency[$key] == 'Azerbaijan'): ?> selected <?php endif; ?>>
                                                                    Azerbaijan </option>
                                                                <option value="Bahamas"
                                                                    <?php if($currency[$key] == 'Bahamas'): ?> selected <?php endif; ?>>
                                                                    Bahamas </option>
                                                                <option value="Bahrain"
                                                                    <?php if($currency[$key] == 'Bahrain'): ?> selected <?php endif; ?>>
                                                                    Bahrain </option>
                                                                <option value="Bangladesh"
                                                                    <?php if($currency[$key] == 'Bangladesh'): ?> selected <?php endif; ?>>
                                                                    Bangladesh </option>
                                                                <option value="Barbados"
                                                                    <?php if($currency[$key] == 'Barbados'): ?> selected <?php endif; ?>>
                                                                    Barbados </option>
                                                                <option value="Belarus"
                                                                    <?php if($currency[$key] == 'Belarus'): ?> selected <?php endif; ?>>
                                                                    Belarus </option>
                                                                <option value="Belgium"
                                                                    <?php if($currency[$key] == 'Belgium'): ?> selected <?php endif; ?>>
                                                                    Belgium </option>
                                                                <option value="Belize"
                                                                    <?php if($currency[$key] == 'Belize'): ?> selected <?php endif; ?>>
                                                                    Belize </option>
                                                                <option value="Benin"
                                                                    <?php if($currency[$key] == 'Benin'): ?> selected <?php endif; ?>>
                                                                    Benin </option>
                                                                <option value="Bhutan"
                                                                    <?php if($currency[$key] == 'Bhutan'): ?> selected <?php endif; ?>>
                                                                    Bhutan </option>
                                                                <option value="Bolivia"
                                                                    <?php if($currency[$key] == 'Bolivia'): ?> selected <?php endif; ?>>
                                                                    Bolivia </option>
                                                                <option value="Bosnia and Herzegovina"
                                                                    <?php if($currency[$key] == 'Bosnia and Herzegovina'): ?> selected <?php endif; ?>>
                                                                    Bosnia and Herzegovina </option>
                                                                <option value="Botswana"
                                                                    <?php if($currency[$key] == 'Botswana'): ?> selected <?php endif; ?>>
                                                                    Botswana </option>
                                                                <option value="Brazil"
                                                                    <?php if($currency[$key] == 'Brazil'): ?> selected <?php endif; ?>>
                                                                    Brazil </option>
                                                                <option value="Brunei"
                                                                    <?php if($currency[$key] == 'Brunei'): ?> selected <?php endif; ?>>
                                                                    Brunei </option>
                                                                <option value="Bulgaria"
                                                                    <?php if($currency[$key] == 'Bulgaria'): ?> selected <?php endif; ?>>
                                                                    Bulgaria </option>
                                                                <option value="Burkina Faso"
                                                                    <?php if($currency[$key] == 'Burkina Faso'): ?> selected <?php endif; ?>>
                                                                    Burkina Faso </option>
                                                                <option value="Burundi"
                                                                    <?php if($currency[$key] == 'Burundi'): ?> selected <?php endif; ?>>
                                                                    Burundi </option>
                                                                <option value="Cabo Verde"
                                                                    <?php if($currency[$key] == 'Cabo Verde'): ?> selected <?php endif; ?>>
                                                                    Cabo Verde </option>
                                                                <option value="Cambodia"
                                                                    <?php if($currency[$key] == 'Cambodia'): ?> selected <?php endif; ?>>
                                                                    Cambodia </option>
                                                                <option value="Cameroon"
                                                                    <?php if($currency[$key] == 'Cameroon'): ?> selected <?php endif; ?>>
                                                                    Cameroon </option>
                                                                <option value="Canada"
                                                                    <?php if($currency[$key] == 'Canada'): ?> selected <?php endif; ?>>
                                                                    Canada </option>
                                                                <option value="Central African Republic"
                                                                    <?php if($currency[$key] == 'Central African Republic'): ?> selected <?php endif; ?>>
                                                                    Central African Republic </option>
                                                                <option value="Chad"
                                                                    <?php if($currency[$key] == 'Chad'): ?> selected <?php endif; ?>>
                                                                    Chad </option>
                                                                <option value="Chile"
                                                                    <?php if($currency[$key] == 'Chile'): ?> selected <?php endif; ?>>
                                                                    Chile </option>
                                                                <option value="China"
                                                                    <?php if($currency[$key] == 'China'): ?> selected <?php endif; ?>>
                                                                    China </option>
                                                                <option value="Colombia"
                                                                    <?php if($currency[$key] == 'Colombia'): ?> selected <?php endif; ?>>
                                                                    Colombia </option>
                                                                <option value="Comoros"
                                                                    <?php if($currency[$key] == 'Comoros'): ?> selected <?php endif; ?>>
                                                                    Comoros </option>
                                                                <option value="Congo (Congo-Brazzaville)"
                                                                    <?php if($currency[$key] == 'Congo (Congo-Brazzaville)'): ?> selected <?php endif; ?>>
                                                                    Congo (Congo-Brazzaville) </option>
                                                                <option value="Costa Rica"
                                                                    <?php if($currency[$key] == 'Costa Rica'): ?> selected <?php endif; ?>>
                                                                    Costa Rica </option>
                                                                <option value="Croatia"
                                                                    <?php if($currency[$key] == 'Croatia'): ?> selected <?php endif; ?>>
                                                                    Croatia </option>
                                                                <option value="Cuba"
                                                                    <?php if($currency[$key] == 'Cuba'): ?> selected <?php endif; ?>>
                                                                    Cuba </option>
                                                                <option value="Cyprus"
                                                                    <?php if($currency[$key] == 'Cyprus'): ?> selected <?php endif; ?>>
                                                                    Cyprus </option>
                                                                <option value="Czechia (Czech Republic)"
                                                                    <?php if($currency[$key] == 'Czechia (Czech Republic)'): ?> selected <?php endif; ?>>
                                                                    Czechia (Czech Republic) </option>
                                                                <option
                                                                    value="Democratic Republic of the Congo (Congo-Kinshasa)"
                                                                    <?php if($currency[$key] == 'Democratic Republic of the Congo (Congo-Kinshasa)'): ?> selected <?php endif; ?>>
                                                                    Democratic Republic of the Congo (Congo-Kinshasa)
                                                                </option>
                                                                <option value="Denmark"
                                                                    <?php if($currency[$key] == 'Denmark'): ?> selected <?php endif; ?>>
                                                                    Denmark </option>
                                                                <option value="Djibouti"
                                                                    <?php if($currency[$key] == 'Djibouti'): ?> selected <?php endif; ?>>
                                                                    Djibouti </option>
                                                                <option value="Dominica"
                                                                    <?php if($currency[$key] == 'Dominica'): ?> selected <?php endif; ?>>
                                                                    Dominica </option>
                                                                <option value="Dominican Republic"
                                                                    <?php if($currency[$key] == 'Dominican Republic'): ?> selected <?php endif; ?>>
                                                                    Dominican Republic </option>
                                                                <option value="East Timor (Timor-Leste)"
                                                                    <?php if($currency[$key] == 'East Timor (Timor-Leste)'): ?> selected <?php endif; ?>>
                                                                    East Timor (Timor-Leste) </option>
                                                                <option value="Ecuador"
                                                                    <?php if($currency[$key] == 'Ecuador'): ?> selected <?php endif; ?>>
                                                                    Ecuador </option>
                                                                <option value="Egypt"
                                                                    <?php if($currency[$key] == 'Egypt'): ?> selected <?php endif; ?>>
                                                                    Egypt </option>
                                                                <option value="El Salvador"
                                                                    <?php if($currency[$key] == 'El Salvador'): ?> selected <?php endif; ?>>
                                                                    El Salvador </option>
                                                                <option value="Equatorial Guinea"
                                                                    <?php if($currency[$key] == 'Equatorial Guinea'): ?> selected <?php endif; ?>>
                                                                    Equatorial Guinea </option>
                                                                <option value="Eritrea"
                                                                    <?php if($currency[$key] == 'Eritrea'): ?> selected <?php endif; ?>>
                                                                    Eritrea </option>
                                                                <option value="Estonia"
                                                                    <?php if($currency[$key] == 'Estonia'): ?> selected <?php endif; ?>>
                                                                    Estonia </option>
                                                                <option value="Eswatini (formerly Swaziland)"
                                                                    <?php if($currency[$key] == 'Eswatini (formerly Swaziland)'): ?> selected <?php endif; ?>>
                                                                    Eswatini (formerly Swaziland) </option>
                                                                <option value="Ethiopia"
                                                                    <?php if($currency[$key] == 'Ethiopia'): ?> selected <?php endif; ?>>
                                                                    Ethiopia </option>
                                                                <option value="Fiji"
                                                                    <?php if($currency[$key] == 'Fiji'): ?> selected <?php endif; ?>>
                                                                    Fiji </option>
                                                                <option value="Finland"
                                                                    <?php if($currency[$key] == 'Finland'): ?> selected <?php endif; ?>>
                                                                    Finland </option>
                                                                <option value="France"
                                                                    <?php if($currency[$key] == 'France'): ?> selected <?php endif; ?>>
                                                                    France </option>
                                                                <option value="Gabon"
                                                                    <?php if($currency[$key] == 'Gabon'): ?> selected <?php endif; ?>>
                                                                    Gabon </option>
                                                                <option value="Gambia"
                                                                    <?php if($currency[$key] == 'Gambia'): ?> selected <?php endif; ?>>
                                                                    Gambia </option>
                                                                <option value="Georgia"
                                                                    <?php if($currency[$key] == 'Georgia'): ?> selected <?php endif; ?>>
                                                                    Georgia </option>
                                                                <option value="Germany"
                                                                    <?php if($currency[$key] == 'Germany'): ?> selected <?php endif; ?>>
                                                                    Germany </option>
                                                                <option value="Ghana"
                                                                    <?php if($currency[$key] == 'Ghana'): ?> selected <?php endif; ?>>
                                                                    Ghana </option>
                                                                <option value="Greece"
                                                                    <?php if($currency[$key] == 'Greece'): ?> selected <?php endif; ?>>
                                                                    Greece </option>
                                                                <option value="Grenada"
                                                                    <?php if($currency[$key] == 'Grenada'): ?> selected <?php endif; ?>>
                                                                    Grenada </option>
                                                                <option value="Guatemala"
                                                                    <?php if($currency[$key] == 'Guatemala'): ?> selected <?php endif; ?>>
                                                                    Guatemala </option>
                                                                <option value="Guinea"
                                                                    <?php if($currency[$key] == 'Guinea'): ?> selected <?php endif; ?>>
                                                                    Guinea </option>
                                                                <option value="Guinea-Bissau"
                                                                    <?php if($currency[$key] == 'Guinea-Bissau'): ?> selected <?php endif; ?>>
                                                                    Guinea-Bissau </option>
                                                                <option value="Guyana"
                                                                    <?php if($currency[$key] == 'Guyana'): ?> selected <?php endif; ?>>
                                                                    Guyana </option>
                                                                <option value="Haiti"
                                                                    <?php if($currency[$key] == 'Haiti'): ?> selected <?php endif; ?>>
                                                                    Haiti </option>
                                                                <option value="Honduras"
                                                                    <?php if($currency[$key] == 'Honduras'): ?> selected <?php endif; ?>>
                                                                    Honduras </option>
                                                                <option value="Hungary"
                                                                    <?php if($currency[$key] == 'Hungary'): ?> selected <?php endif; ?>>
                                                                    Hungary </option>
                                                                <option value="Iceland"
                                                                    <?php if($currency[$key] == 'Iceland'): ?> selected <?php endif; ?>>
                                                                    Iceland </option>
                                                                <option value="India"
                                                                    <?php if($currency[$key] == 'India'): ?> selected <?php endif; ?>>
                                                                    India </option>
                                                                <option value="Indonesia"
                                                                    <?php if($currency[$key] == 'Indonesia'): ?> selected <?php endif; ?>>
                                                                    Indonesia </option>
                                                                <option value="Iran"
                                                                    <?php if($currency[$key] == 'Iran'): ?> selected <?php endif; ?>>
                                                                    Iran </option>
                                                                <option value="Iraq"
                                                                    <?php if($currency[$key] == 'Iraq'): ?> selected <?php endif; ?>>
                                                                    Iraq </option>
                                                                <option value="Ireland"
                                                                    <?php if($currency[$key] == 'Ireland'): ?> selected <?php endif; ?>>
                                                                    Ireland </option>
                                                                <option value="Israel"
                                                                    <?php if($currency[$key] == 'Israel'): ?> selected <?php endif; ?>>
                                                                    Israel </option>
                                                                <option value="Italy"
                                                                    <?php if($currency[$key] == 'Italy'): ?> selected <?php endif; ?>>
                                                                    Italy </option>
                                                                <option value="Ivory Coast (Côte d'Ivoire)"
                                                                    <?php if($currency[$key] == "Ivory Coast (Côte d'Ivoire)"): ?> selected <?php endif; ?>>
                                                                    Ivory Coast (Côte d'Ivoire) </option>
                                                                <option value="Jamaica"
                                                                    <?php if($currency[$key] == 'Jamaica'): ?> selected <?php endif; ?>>
                                                                    Jamaica </option>
                                                                <option value="Japan"
                                                                    <?php if($currency[$key] == 'Japan'): ?> selected <?php endif; ?>>
                                                                    Japan </option>
                                                                <option value="Jordan"
                                                                    <?php if($currency[$key] == 'Jordan'): ?> selected <?php endif; ?>>
                                                                    Jordan </option>
                                                                <option value="Kazakhstan"
                                                                    <?php if($currency[$key] == 'Kazakhstan'): ?> selected <?php endif; ?>>
                                                                    Kazakhstan </option>
                                                                <option value="Kenya"
                                                                    <?php if($currency[$key] == 'Kenya'): ?> selected <?php endif; ?>>
                                                                    Kenya </option>
                                                                <option value="Kiribati"
                                                                    <?php if($currency[$key] == 'Kiribati'): ?> selected <?php endif; ?>>
                                                                    Kiribati </option>
                                                                <option value="Kosovo"
                                                                    <?php if($currency[$key] == 'Kosovo'): ?> selected <?php endif; ?>>
                                                                    Kosovo </option>
                                                                <option value="Kuwait"
                                                                    <?php if($currency[$key] == 'Kuwait'): ?> selected <?php endif; ?>>
                                                                    Kuwait </option>
                                                                <option value="Kyrgyzstan"
                                                                    <?php if($currency[$key] == 'Kyrgyzstan'): ?> selected <?php endif; ?>>
                                                                    Kyrgyzstan </option>
                                                                <option value="Laos"
                                                                    <?php if($currency[$key] == 'Laos'): ?> selected <?php endif; ?>>
                                                                    Laos </option>
                                                                <option value="Latvia"
                                                                    <?php if($currency[$key] == 'Latvia'): ?> selected <?php endif; ?>>
                                                                    Latvia </option>
                                                                <option value="Lebanon"
                                                                    <?php if($currency[$key] == 'Lebanon'): ?> selected <?php endif; ?>>
                                                                    Lebanon </option>
                                                                <option value="Lesotho"
                                                                    <?php if($currency[$key] == 'Lesotho'): ?> selected <?php endif; ?>>
                                                                    Lesotho </option>
                                                                <option value="Liberia"
                                                                    <?php if($currency[$key] == 'Liberia'): ?> selected <?php endif; ?>>
                                                                    Liberia </option>
                                                                <option value="Libya"
                                                                    <?php if($currency[$key] == 'Libya'): ?> selected <?php endif; ?>>
                                                                    Libya </option>
                                                                <option value="Liechtenstein"
                                                                    <?php if($currency[$key] == 'Liechtenstein'): ?> selected <?php endif; ?>>
                                                                    Liechtenstein </option>
                                                                <option value="Lithuania"
                                                                    <?php if($currency[$key] == 'Lithuania'): ?> selected <?php endif; ?>>
                                                                    Lithuania </option>
                                                                <option value="Luxembourg"
                                                                    <?php if($currency[$key] == 'Luxembourg'): ?> selected <?php endif; ?>>
                                                                    Luxembourg </option>
                                                                <option value="Madagascar"
                                                                    <?php if($currency[$key] == 'Madagascar'): ?> selected <?php endif; ?>>
                                                                    Madagascar </option>
                                                                <option value="Malawi"
                                                                    <?php if($currency[$key] == 'Malawi'): ?> selected <?php endif; ?>>
                                                                    Malawi </option>
                                                                <option value="Malaysia"
                                                                    <?php if($currency[$key] == 'Malaysia'): ?> selected <?php endif; ?>>
                                                                    Malaysia </option>
                                                                <option value="Maldives"
                                                                    <?php if($currency[$key] == 'Maldives'): ?> selected <?php endif; ?>>
                                                                    Maldives </option>
                                                                <option value="Mali"
                                                                    <?php if($currency[$key] == 'Mali'): ?> selected <?php endif; ?>>
                                                                    Mali </option>
                                                                <option value="Malta"
                                                                    <?php if($currency[$key] == 'Malta'): ?> selected <?php endif; ?>>
                                                                    Malta </option>
                                                                <option value="Marshall Islands"
                                                                    <?php if($currency[$key] == 'Marshall Islands'): ?> selected <?php endif; ?>>
                                                                    Marshall Islands </option>
                                                                <option value="Mauritania"
                                                                    <?php if($currency[$key] == 'Mauritania'): ?> selected <?php endif; ?>>
                                                                    Mauritania </option>
                                                                <option value="Mauritius"
                                                                    <?php if($currency[$key] == 'Mauritius'): ?> selected <?php endif; ?>>
                                                                    Mauritius </option>
                                                                <option value="Mexico"
                                                                    <?php if($currency[$key] == 'Mexico'): ?> selected <?php endif; ?>>
                                                                    Mexico </option>
                                                                <option value="Micronesia"
                                                                    <?php if($currency[$key] == 'Micronesia'): ?> selected <?php endif; ?>>
                                                                    Micronesia </option>
                                                                <option value="Moldova"
                                                                    <?php if($currency[$key] == 'Moldova'): ?> selected <?php endif; ?>>
                                                                    Moldova </option>
                                                                <option value="Monaco"
                                                                    <?php if($currency[$key] == 'Monaco'): ?> selected <?php endif; ?>>
                                                                    Monaco </option>
                                                                <option value="Mongolia"
                                                                    <?php if($currency[$key] == 'Mongolia'): ?> selected <?php endif; ?>>
                                                                    Mongolia </option>
                                                                <option value="Montenegro"
                                                                    <?php if($currency[$key] == 'Montenegro'): ?> selected <?php endif; ?>>
                                                                    Montenegro </option>
                                                                <option value="Morocco"
                                                                    <?php if($currency[$key] == 'Morocco'): ?> selected <?php endif; ?>>
                                                                    Morocco </option>
                                                                <option value="Mozambique"
                                                                    <?php if($currency[$key] == 'Mozambique'): ?> selected <?php endif; ?>>
                                                                    Mozambique </option>
                                                                <option value="Myanmar (Burma)"
                                                                    <?php if($currency[$key] == 'Myanmar (Burma)'): ?> selected <?php endif; ?>>
                                                                    Myanmar (Burma) </option>
                                                                <option value="Namibia"
                                                                    <?php if($currency[$key] == 'Namibia'): ?> selected <?php endif; ?>>
                                                                    Namibia </option>
                                                                <option value="Nauru"
                                                                    <?php if($currency[$key] == 'Nauru'): ?> selected <?php endif; ?>>
                                                                    Nauru </option>
                                                                <option value="Nepal"
                                                                    <?php if($currency[$key] == 'Nepal'): ?> selected <?php endif; ?>>
                                                                    Nepal </option>
                                                                <option value="Netherlands"
                                                                    <?php if($currency[$key] == 'Netherlands'): ?> selected <?php endif; ?>>
                                                                    Netherlands </option>
                                                                <option value="New Zealand"
                                                                    <?php if($currency[$key] == 'New Zealand'): ?> selected <?php endif; ?>>
                                                                    New Zealand </option>
                                                                <option value="Nicaragua"
                                                                    <?php if($currency[$key] == 'Nicaragua'): ?> selected <?php endif; ?>>
                                                                    Nicaragua </option>
                                                                <option value="Niger"
                                                                    <?php if($currency[$key] == 'Niger'): ?> selected <?php endif; ?>>
                                                                    Niger </option>
                                                                <option value="Nigeria"
                                                                    <?php if($currency[$key] == 'Nigeria'): ?> selected <?php endif; ?>>
                                                                    Nigeria </option>
                                                                <option value="North Macedonia (formerly Macedonia)"
                                                                    <?php if($currency[$key] == 'North Macedonia (formerly Macedonia)'): ?> selected <?php endif; ?>>
                                                                    North Macedonia (formerly Macedonia) </option>
                                                                <option value="Norway"
                                                                    <?php if($currency[$key] == 'Norway'): ?> selected <?php endif; ?>>
                                                                    Norway </option>
                                                                <option value="Oman"
                                                                    <?php if($currency[$key] == 'Oman'): ?> selected <?php endif; ?>>
                                                                    Oman </option>
                                                                <option value="Pakistan"
                                                                    <?php if($currency[$key] == 'Pakistan'): ?> selected <?php endif; ?>>
                                                                    Pakistan </option>
                                                                <option value="Palau"
                                                                    <?php if($currency[$key] == 'Palau'): ?> selected <?php endif; ?>>
                                                                    Palau </option>
                                                                <option value="Palestine State"
                                                                    <?php if($currency[$key] == 'Palestine State'): ?> selected <?php endif; ?>>
                                                                    Palestine State </option>
                                                                <option value="Panama"
                                                                    <?php if($currency[$key] == 'Panama'): ?> selected <?php endif; ?>>
                                                                    Panama </option>
                                                                <option value="Papua New Guinea"
                                                                    <?php if($currency[$key] == 'Papua New Guinea'): ?> selected <?php endif; ?>>
                                                                    Papua New Guinea </option>
                                                                <option value="Paraguay"
                                                                    <?php if($currency[$key] == 'Paraguay'): ?> selected <?php endif; ?>>
                                                                    Paraguay </option>
                                                                <option value="Peru"
                                                                    <?php if($currency[$key] == 'Peru'): ?> selected <?php endif; ?>>
                                                                    Peru </option>
                                                                <option value="Philippines"
                                                                    <?php if($currency[$key] == 'Philippines'): ?> selected <?php endif; ?>>
                                                                    Philippines </option>
                                                                <option value="Poland"
                                                                    <?php if($currency[$key] == 'Poland'): ?> selected <?php endif; ?>>
                                                                    Poland </option>
                                                                <option value="Portugal"
                                                                    <?php if($currency[$key] == 'Portugal'): ?> selected <?php endif; ?>>
                                                                    Portugal </option>
                                                                <option value="Qatar"
                                                                    <?php if($currency[$key] == 'Qatar'): ?> selected <?php endif; ?>>
                                                                    Qatar </option>
                                                                <option value="Romania"
                                                                    <?php if($currency[$key] == 'Romania'): ?> selected <?php endif; ?>>
                                                                    Romania </option>
                                                                <option value="Russia"
                                                                    <?php if($currency[$key] == 'Russia'): ?> selected <?php endif; ?>>
                                                                    Russia </option>
                                                                <option value="Rwanda"
                                                                    <?php if($currency[$key] == 'Rwanda'): ?> selected <?php endif; ?>>
                                                                    Rwanda </option>
                                                                <option value="Saint Kitts and Nevis"
                                                                    <?php if($currency[$key] == 'Saint Kitts and Nevis'): ?> selected <?php endif; ?>>
                                                                    Saint Kitts and Nevis </option>
                                                                <option value="Saint Lucia"
                                                                    <?php if($currency[$key] == 'Saint Lucia'): ?> selected <?php endif; ?>>
                                                                    Saint Lucia </option>
                                                                <option value="Saint Vincent and the Grenadines"
                                                                    <?php if($currency[$key] == 'Saint Vincent and the Grenadines'): ?> selected <?php endif; ?>>
                                                                    Saint Vincent and the Grenadines </option>
                                                                <option value="Samoa"
                                                                    <?php if($currency[$key] == 'Samoa'): ?> selected <?php endif; ?>>
                                                                    Samoa </option>
                                                                <option value="San Marino"
                                                                    <?php if($currency[$key] == 'San Marino'): ?> selected <?php endif; ?>>
                                                                    San Marino </option>
                                                                <option value="Sao Tome and Principe"
                                                                    <?php if($currency[$key] == 'Sao Tome and Principe'): ?> selected <?php endif; ?>>
                                                                    Sao Tome and Principe </option>
                                                                <option value="Saudi Arabia"
                                                                    <?php if($currency[$key] == 'Saudi Arabia'): ?> selected <?php endif; ?>>
                                                                    Saudi Arabia </option>
                                                                <option value="Senegal"
                                                                    <?php if($currency[$key] == 'Senegal'): ?> selected <?php endif; ?>>
                                                                    Senegal </option>
                                                                <option value="Serbia"
                                                                    <?php if($currency[$key] == 'Serbia'): ?> selected <?php endif; ?>>
                                                                    Serbia </option>
                                                                <option value="Seychelles"
                                                                    <?php if($currency[$key] == 'Seychelles'): ?> selected <?php endif; ?>>
                                                                    Seychelles </option>
                                                                <option value="Sierra Leone"
                                                                    <?php if($currency[$key] == 'Sierra Leone'): ?> selected <?php endif; ?>>
                                                                    Sierra Leone </option>
                                                                <option value="Singapore"
                                                                    <?php if($currency[$key] == 'Singapore'): ?> selected <?php endif; ?>>
                                                                    Singapore </option>
                                                                <option value="Slovakia"
                                                                    <?php if($currency[$key] == 'Slovakia'): ?> selected <?php endif; ?>>
                                                                    Slovakia </option>
                                                                <option value="Slovenia"
                                                                    <?php if($currency[$key] == 'Slovenia'): ?> selected <?php endif; ?>>
                                                                    Slovenia </option>
                                                                <option value="Solomon Islands"
                                                                    <?php if($currency[$key] == 'Solomon Islands'): ?> selected <?php endif; ?>>
                                                                    Solomon Islands </option>
                                                                <option value="Somalia"
                                                                    <?php if($currency[$key] == 'Somalia'): ?> selected <?php endif; ?>>
                                                                    Somalia </option>
                                                                <option value="South Africa"
                                                                    <?php if($currency[$key] == 'South Africa'): ?> selected <?php endif; ?>>
                                                                    South Africa </option>
                                                                <option value="South Korea"
                                                                    <?php if($currency[$key] == 'South Korea'): ?> selected <?php endif; ?>>
                                                                    South Korea </option>
                                                                <option value="South Sudan"
                                                                    <?php if($currency[$key] == 'South Sudan'): ?> selected <?php endif; ?>>
                                                                    South Sudan </option>
                                                                <option value="Spain"
                                                                    <?php if($currency[$key] == 'Spain'): ?> selected <?php endif; ?>>
                                                                    Spain </option>
                                                                <option value="Sri Lanka"
                                                                    <?php if($currency[$key] == 'Sri Lanka'): ?> selected <?php endif; ?>>
                                                                    Sri Lanka </option>
                                                                <option value="Sudan"
                                                                    <?php if($currency[$key] == 'Sudan'): ?> selected <?php endif; ?>>
                                                                    Sudan </option>
                                                                <option value="Suriname"
                                                                    <?php if($currency[$key] == 'Suriname'): ?> selected <?php endif; ?>>
                                                                    Suriname </option>
                                                                <option value="Sweden"
                                                                    <?php if($currency[$key] == 'Sweden'): ?> selected <?php endif; ?>>
                                                                    Sweden </option>
                                                                <option value="Switzerland"
                                                                    <?php if($currency[$key] == 'Switzerland'): ?> selected <?php endif; ?>>
                                                                    Switzerland </option>
                                                                <option value="Syria"
                                                                    <?php if($currency[$key] == 'Syria'): ?> selected <?php endif; ?>>
                                                                    Syria </option>
                                                                <option value="Taiwan"
                                                                    <?php if($currency[$key] == 'Taiwan'): ?> selected <?php endif; ?>>
                                                                    Taiwan </option>
                                                                <option value="Tajikistan"
                                                                    <?php if($currency[$key] == 'Tajikistan'): ?> selected <?php endif; ?>>
                                                                    Tajikistan </option>
                                                                <option value="Tanzania"
                                                                    <?php if($currency[$key] == 'Tanzania'): ?> selected <?php endif; ?>>
                                                                    Tanzania </option>
                                                                <option value="Thailand"
                                                                    <?php if($currency[$key] == 'Thailand'): ?> selected <?php endif; ?>>
                                                                    Thailand </option>
                                                                <option value="Togo"
                                                                    <?php if($currency[$key] == 'Togo'): ?> selected <?php endif; ?>>
                                                                    Togo </option>
                                                                <option value="Tonga"
                                                                    <?php if($currency[$key] == 'Tonga'): ?> selected <?php endif; ?>>
                                                                    Tonga </option>
                                                                <option value="Trinidad and Tobago"
                                                                    <?php if($currency[$key] == 'Trinidad and Tobago'): ?> selected <?php endif; ?>>
                                                                    Trinidad and Tobago </option>
                                                                <option value="Tunisia"
                                                                    <?php if($currency[$key] == 'Tunisia'): ?> selected <?php endif; ?>>
                                                                    Tunisia </option>
                                                                <option value="Turkey"
                                                                    <?php if($currency[$key] == 'Turkey'): ?> selected <?php endif; ?>>
                                                                    Turkey </option>
                                                                <option value="Turkmenistan"
                                                                    <?php if($currency[$key] == 'Turkmenistan'): ?> selected <?php endif; ?>>
                                                                    Turkmenistan </option>
                                                                <option value="Tuvalu"
                                                                    <?php if($currency[$key] == 'Tuvalu'): ?> selected <?php endif; ?>>
                                                                    Tuvalu </option>
                                                                <option value="Uganda"
                                                                    <?php if($currency[$key] == 'Uganda'): ?> selected <?php endif; ?>>
                                                                    Uganda </option>
                                                                <option value="Ukraine"
                                                                    <?php if($currency[$key] == 'Ukraine'): ?> selected <?php endif; ?>>
                                                                    Ukraine </option>
                                                                <option value="United Arab Emirates"
                                                                    <?php if($currency[$key] == 'United Arab Emirates'): ?> selected <?php endif; ?>>
                                                                    United Arab Emirates </option>
                                                                <option value="United Kingdom"
                                                                    <?php if($currency[$key] == 'United Kingdom'): ?> selected <?php endif; ?>>
                                                                    United Kingdom </option>
                                                                <option value="United States of America"
                                                                    <?php if($currency[$key] == 'United States of America'): ?> selected <?php endif; ?>>
                                                                    United States of America </option>
                                                                <option value="Uruguay"
                                                                    <?php if($currency[$key] == 'Uruguay'): ?> selected <?php endif; ?>>
                                                                    Uruguay </option>
                                                                <option value="Uzbekistan"
                                                                    <?php if($currency[$key] == 'Uzbekistan'): ?> selected <?php endif; ?>>
                                                                    Uzbekistan </option>
                                                                <option value="Vanuatu"
                                                                    <?php if($currency[$key] == 'Vanuatu'): ?> selected <?php endif; ?>>
                                                                    Vanuatu </option>
                                                                <option value="Vatican City"
                                                                    <?php if($currency[$key] == 'Vatican City'): ?> selected <?php endif; ?>>
                                                                    Vatican City </option>
                                                                <option value="Venezuela"
                                                                    <?php if($currency[$key] == 'Venezuela'): ?> selected <?php endif; ?>>
                                                                    Venezuela </option>
                                                                <option value="Vietnam"
                                                                    <?php if($currency[$key] == 'Vietnam'): ?> selected <?php endif; ?>>
                                                                    Vietnam </option>
                                                                <option value="Yemen"
                                                                    <?php if($currency[$key] == 'Yemen'): ?> selected <?php endif; ?>>
                                                                    Yemen </option>
                                                                <option value="Zambia"
                                                                    <?php if($currency[$key] == 'Zambia'): ?> selected <?php endif; ?>>
                                                                    Zambia </option>
                                                                <option value="Zimbabwe"
                                                                    <?php if($currency[$key] == 'Zimbabwe'): ?> selected <?php endif; ?>>
                                                                    Zimbabwe </option>
                                                            </select>
                                                        </div>
                                                        <div class="col">
                                                            <input type="text" class="form-control fs-14 h-50px"
                                                                value="<?php echo e($salary[$key]); ?>" placeholder="Enter salary"
                                                                id="" name="salary[]" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <label for=""
                                                        class="form-label fs-14 text-theme-primary fw-bold">Description</label>
                                                    <textarea class="form-control fs-14" name="description[]"><?php echo e($description[$key]); ?></textarea>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
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
                                    <?php endif; ?>
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
                                            <?php $__currentLoopData = $skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($row->id); ?>"
                                                    <?php if($candSkills != null): ?> <?php $__currentLoopData = $candSkills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php if($row->id == $ca->skill_id): ?>
                                                    Selected <?php endif; ?>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>><?php echo e($row->name); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                        <a href="<?php echo e(route('candidates.details')); ?>" class="fs-6 fw-normal">
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
        //     var href = '<?php echo e(route('candidates.profession.delete', '')); ?>';
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
        //             confirmButtonText: "<a class='text-white' id='delete-edu' href='<?php echo e(route('candidates.profession.delete', '')); ?>/" +
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/backendhostingla/public_html/webapp/erec/resources/views/candidates/professional.blade.php ENDPATH**/ ?>