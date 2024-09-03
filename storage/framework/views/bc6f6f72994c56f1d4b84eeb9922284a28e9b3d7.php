

<?php $__env->startSection('page_title', 'E-Rec'); ?>

<?php $__env->startSection('head_style'); ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .hidden {
      display: none;
    }
  </style>
    <div class="col-xl-9 col-lg-8">
        <button class="mobile_menu_trigger d-lg-none btn_theme border-0 py-2 px-4 mb-3">
            <i class="fa-solid fa-right-left me-3"></i><span>Side Menu</span>
        </button>
        <div class="dashboard_content bg-white rounded_10 p-4">
            <div class="d-flex aling-items-center mb-3">
                <h2 class="fw-500 text_primary fs-5 align-self-center">Add New Job</h2>
                <?php if(session($key ?? 'error')): ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo session($key ?? 'error'); ?>

                    </div>
                <?php endif; ?>
            </div>
            <form class="dashboard-form needs-validation" method="post" action="<?php echo e(route('recruiter.jobs.store')); ?>"
                enctype="multipart/form-data" novalidate>
                <?php echo csrf_field(); ?>
                
                <div class="row gy-3">
                    <div class="col-md-6">
                        <div class="form-group position-relative">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Title*</label>
                            <input type="text" autocomplete="off" id="title__search" class="form-control fs-14 h-50px"
                                name="post" value="<?php echo e($post->post); ?>" required>
                            <div class="invalid-feedback">
                                Please enter title.
                            </div>
                            <div class="title_suggetion border shadow imran" id="title_suggetion">
                                <ol id="sortedListTitleSugg">
                                    <li class="title_text_sugg">911 Dispatcher</li>
                                    <li class="title_text_sugg">AI (Artificial Intelligence) Engineer</li>
                                    <li class="title_text_sugg">AI Engineer</li>
                                    <li class="title_text_sugg">AI Ethics Auditor</li>
                                    <li class="title_text_sugg">AI Ethics Auditor</li>
                                    <li class="title_text_sugg">AI Ethics Consultant</li>
                                    <li class="title_text_sugg">AI Language Model Developer</li>
                                    <li class="title_text_sugg">AI Language Model Developer</li>
                                    <li class="title_text_sugg">AI for Social Good Program Manager</li>
                                    <li class="title_text_sugg">AI for Social Good Program Manager</li>
                                    <li class="title_text_sugg">Accessibility Auditor</li>
                                    <li class="title_text_sugg">Accessibility Consultant</li>
                                    <li class="title_text_sugg">Accessibility Consultant</li>
                                    <li class="title_text_sugg">Account Executive</li>
                                    <li class="title_text_sugg">Accountant</li>
                                    <li class="title_text_sugg">Actor/Actress</li>
                                    <li class="title_text_sugg">Actuary</li>
                                    <li class="title_text_sugg">Actuary</li>
                                    <li class="title_text_sugg">Acupuncturist</li>
                                    <li class="title_text_sugg">Advertising Copywriter</li>
                                    <li class="title_text_sugg">Aerospace Engineer</li>
                                    <li class="title_text_sugg">Aerospace Engineer</li>
                                    <li class="title_text_sugg">Aging-in-Place Consultant</li>
                                    <li class="title_text_sugg">Aging-in-Place Consultant</li>
                                    <li class="title_text_sugg">Agricultural IoT Specialist</li>
                                    <li class="title_text_sugg">Agricultural IoT Specialist</li>
                                    <li class="title_text_sugg">Agricultural Scientist</li>
                                    <li class="title_text_sugg">Agricultural Technician</li>
                                    <li class="title_text_sugg">Agritech Data Analyst</li>
                                    <li class="title_text_sugg">Agritech Data Analyst</li>
                                    <li class="title_text_sugg">Agronomist</li>
                                    <li class="title_text_sugg">Air Traffic Controller</li>
                                    <li class="title_text_sugg">Air Traffic Controller</li>
                                    <li class="title_text_sugg">Aircraft Mechanic</li>
                                    <li class="title_text_sugg">Animal Shelter Manager</li>
                                    <li class="title_text_sugg">Appraiser</li>
                                    <li class="title_text_sugg">Aquatic Ecologist</li>
                                    <li class="title_text_sugg">Aquatic Ecologist</li>
                                    <li class="title_text_sugg">Architect</li>
                                    <li class="title_text_sugg">Architectural Technician</li>
                                    <li class="title_text_sugg">Art Director</li>
                                    <li class="title_text_sugg">Artist</li>
                                    <li class="title_text_sugg">Assistive Technology Designer</li>
                                    <li class="title_text_sugg">Assistive Technology Designer</li>
                                    <li class="title_text_sugg">Asteroid Prospector</li>
                                    <li class="title_text_sugg">Asteroid Prospector</li>
                                    <li class="title_text_sugg">Astronaut</li>
                                    <li class="title_text_sugg">Auditor</li>
                                    <li class="title_text_sugg">Augmented Reality (AR) Developer</li>
                                    <li class="title_text_sugg">Automation Engineer</li>
                                    <li class="title_text_sugg">Automation Specialist</li>
                                    <li class="title_text_sugg">Aviation Safety Inspector</li>
                                    <li class="title_text_sugg">Back-End Developer</li>
                                    <li class="title_text_sugg">Bias Mitigation Specialist</li>
                                    <li class="title_text_sugg">Bias Mitigation Specialist</li>
                                    <li class="title_text_sugg">Bicycle Infrastructure Designer</li>
                                    <li class="title_text_sugg">Bicycle Infrastructure Designer</li>
                                    <li class="title_text_sugg">Big Data Engineer</li>
                                    <li class="title_text_sugg">Biodegradable Materials Scientist</li>
                                    <li class="title_text_sugg">Biodegradable Materials Scientist</li>
                                    <li class="title_text_sugg">Biohacking Specialist</li>
                                    <li class="title_text_sugg">Biohacking Specialist</li>
                                    <li class="title_text_sugg">Biologist</li>
                                    <li class="title_text_sugg">Biomedical Engineer</li>
                                    <li class="title_text_sugg">Biomedical Scientist</li>
                                    <li class="title_text_sugg">Biotech Researcher</li>
                                    <li class="title_text_sugg">Blockchain Auditor</li>
                                    <li class="title_text_sugg">Blockchain Auditor</li>
                                    <li class="title_text_sugg">Blockchain Consultant</li>
                                    <li class="title_text_sugg">Blockchain Developer</li>
                                    <li class="title_text_sugg">Blockchain Developer</li>
                                    <li class="title_text_sugg">Blockchain Health Data Auditor</li>
                                    <li class="title_text_sugg">Blockchain Health Data Auditor</li>
                                    <li class="title_text_sugg">Blockchain Health Data Privacy Specialist</li>
                                    <li class="title_text_sugg">Blockchain Health Data Privacy Specialist</li>
                                    <li class="title_text_sugg">Blockchain Identity Manager</li>
                                    <li class="title_text_sugg">Blockchain Identity Manager</li>
                                    <li class="title_text_sugg">Blockchain Identity Verification Auditor</li>
                                    <li class="title_text_sugg">Blockchain Identity Verification Auditor</li>
                                    <li class="title_text_sugg">Blockchain Project Manager</li>
                                    <li class="title_text_sugg">Blockchain Supply Chain Manager</li>
                                    <li class="title_text_sugg">Blockchain Supply Chain Manager</li>
                                    <li class="title_text_sugg">Blockchain Voting Auditor</li>
                                    <li class="title_text_sugg">Blockchain Voting Auditor</li>
                                    <li class="title_text_sugg">Blockchain Voting Security Specialist</li>
                                    <li class="title_text_sugg">Blockchain Voting Security Specialist</li>
                                    <li class="title_text_sugg">Blockchain Voting System Developer</li>
                                    <li class="title_text_sugg">Blockchain Voting System Developer</li>
                                    <li class="title_text_sugg">Blockchain-based Identity and Digital Privacy:</li>
                                    <li class="title_text_sugg">Brand Manager</li>
                                    <li class="title_text_sugg">Business Analyst</li>
                                    <li class="title_text_sugg">Business Development Manager</li>
                                    <li class="title_text_sugg">Business Intelligence Analyst</li>
                                    <li class="title_text_sugg">Business Intelligence Analyst (BI Analyst)</li>
                                    <li class="title_text_sugg">Business Intelligence Developer</li>
                                    <li class="title_text_sugg">CAD Designer</li>
                                    <li class="title_text_sugg">CRM (Customer Relationship Management) Specialist</li>
                                    <li class="title_text_sugg">Call Center Supervisor</li>
                                    <li class="title_text_sugg">Cannabis Brand Ambassador</li>
                                    <li class="title_text_sugg">Cannabis Cultivator</li>
                                    <li class="title_text_sugg">Cannabis Extraction Technician</li>
                                    <li class="title_text_sugg">Carbon Farming Manager</li>
                                    <li class="title_text_sugg">Carbon Farming Manager</li>
                                    <li class="title_text_sugg">Carbon Pricing Specialist</li>
                                    <li class="title_text_sugg">Carbon Pricing Specialist</li>
                                    <li class="title_text_sugg">Carpenter</li>
                                    <li class="title_text_sugg">Cartographer</li>
                                    <li class="title_text_sugg">Cashier</li>
                                    <li class="title_text_sugg">Chatbot Designer</li>
                                    <li class="title_text_sugg">Chatbot Designer</li>
                                    <li class="title_text_sugg">Chef</li>
                                    <li class="title_text_sugg">Chef</li>
                                    <li class="title_text_sugg">Chemical Engineer</li>
                                    <li class="title_text_sugg">Chemist</li>
                                    <li class="title_text_sugg">Chief Data Officer (CDO)</li>
                                    <li class="title_text_sugg">Chief Information Officer (CIO)</li>
                                    <li class="title_text_sugg">Chief Information Security Officer (CISO)</li>
                                    <li class="title_text_sugg">Chief Operating Officer (COO)</li>
                                    <li class="title_text_sugg">Chief Technology Officer (CTO)</li>
                                    <li class="title_text_sugg">Choreographer</li>
                                    <li class="title_text_sugg">Circular Economy Consultant</li>
                                    <li class="title_text_sugg">Circular Economy Packaging Specialist</li>
                                    <li class="title_text_sugg">Circular Economy Packaging Specialist</li>
                                    <li class="title_text_sugg">Circular Economy Product Designer</li>
                                    <li class="title_text_sugg">Circular Fashion Consultant</li>
                                    <li class="title_text_sugg">Circular Fashion Consultant</li>
                                    <li class="title_text_sugg">City Planner</li>
                                    <li class="title_text_sugg">Civil Engineer</li>
                                    <li class="title_text_sugg">Civil Servant</li>
                                    <li class="title_text_sugg">Claims Adjuster</li>
                                    <li class="title_text_sugg">Clean Energy Transition Planner</li>
                                    <li class="title_text_sugg">Clean Energy Transition Planner</li>
                                    <li class="title_text_sugg">Climate Change Analyst</li>
                                    <li class="title_text_sugg">Clinical Engineer</li>
                                    <li class="title_text_sugg">Clinical Pharmacist</li>
                                    <li class="title_text_sugg">Clinical Research Associate</li>
                                    <li class="title_text_sugg">Clinical Social Worker</li>
                                    <li class="title_text_sugg">Cloud Administrator</li>
                                    <li class="title_text_sugg">Cloud Architect</li>
                                    <li class="title_text_sugg">Cloud Engineer</li>
                                    <li class="title_text_sugg">Cloud Security Engineer</li>
                                    <li class="title_text_sugg">Cloud Solutions Architect</li>
                                    <li class="title_text_sugg">Co-Living Space Manager</li>
                                    <li class="title_text_sugg">Co-Living Space Manager</li>
                                    <li class="title_text_sugg">Co-Working Space Coordinator</li>
                                    <li class="title_text_sugg">Co-Working Space Coordinator</li>
                                    <li class="title_text_sugg">Community Manager</li>
                                    <li class="title_text_sugg">Compensation Analyst</li>
                                    <li class="title_text_sugg">Competitive Intelligence Analyst</li>
                                    <li class="title_text_sugg">Compliance Officer (Cannabis)</li>
                                    <li class="title_text_sugg">Composer</li>
                                    <li class="title_text_sugg">Compounding Pharmacist</li>
                                    <li class="title_text_sugg">Computer Vision Engineer</li>
                                    <li class="title_text_sugg">Computer Vision Engineer</li>
                                    <li class="title_text_sugg">Conference Organizer</li>
                                    <li class="title_text_sugg">Conservation Scientist</li>
                                    <li class="title_text_sugg">Conservation Scientist</li>
                                    <li class="title_text_sugg">Construction Manager</li>
                                    <li class="title_text_sugg">Content Creator</li>
                                    <li class="title_text_sugg">Conversational AI Product Manager</li>
                                    <li class="title_text_sugg">Conversational AI Product Manager</li>
                                    <li class="title_text_sugg">Corporate Sustainability Officer</li>
                                    <li class="title_text_sugg">Counselor</li>
                                    <li class="title_text_sugg">Counselor</li>
                                    <li class="title_text_sugg">Court Reporter</li>
                                    <li class="title_text_sugg">Crisis Communication Manager</li>
                                    <li class="title_text_sugg">Crisis Communication Manager</li>
                                    <li class="title_text_sugg">Crisis Response Coordinator</li>
                                    <li class="title_text_sugg">Crisis Response Coordinator</li>
                                    <li class="title_text_sugg">Crisis Response Spokesperson</li>
                                    <li class="title_text_sugg">Crisis Response Spokesperson</li>
                                    <li class="title_text_sugg">Crypto Trader</li>
                                    <li class="title_text_sugg">Cryptocurrency Analyst</li>
                                    <li class="title_text_sugg">Customer Experience Manager</li>
                                    <li class="title_text_sugg">Customer Service Representative</li>
                                    <li class="title_text_sugg">Customer Support for Online Retail</li>
                                    <li class="title_text_sugg">Cybersecurity Analyst</li>
                                    <li class="title_text_sugg">Cybersecurity Analyst</li>
                                    <li class="title_text_sugg">Cybersecurity Manager</li>
                                    <li class="title_text_sugg">Data Analyst</li>
                                    <li class="title_text_sugg">Data Analyst</li>
                                    <li class="title_text_sugg">Data Analyst</li>
                                    <li class="title_text_sugg">Data Architect</li>
                                    <li class="title_text_sugg">Data Engineer</li>
                                    <li class="title_text_sugg">Data Engineer</li>
                                    <li class="title_text_sugg">Data Privacy Consultant</li>
                                    <li class="title_text_sugg">Data Privacy Consultant</li>
                                    <li class="title_text_sugg">Data Privacy Officer</li>
                                    <li class="title_text_sugg">Data Scientist</li>
                                    <li class="title_text_sugg">Data Scientist</li>
                                    <li class="title_text_sugg">Data Scientist</li>
                                    <li class="title_text_sugg">Database Administrator (DBA)</li>
                                    <li class="title_text_sugg">Database Developer</li>
                                    <li class="title_text_sugg">Decentralized Identity Advocate</li>
                                    <li class="title_text_sugg">Decentralized Identity Advocate</li>
                                    <li class="title_text_sugg">Demand Planner</li>
                                    <li class="title_text_sugg">Desktop Support Specialist</li>
                                    <li class="title_text_sugg">DevOps Engineer</li>
                                    <li class="title_text_sugg">Development Director</li>
                                    <li class="title_text_sugg">Digital Advertising Specialist</li>
                                    <li class="title_text_sugg">Digital Conference Manager</li>
                                    <li class="title_text_sugg">Digital Conference Manager</li>
                                    <li class="title_text_sugg">Digital Identity Architect</li>
                                    <li class="title_text_sugg">Digital Identity Architect</li>
                                    <li class="title_text_sugg">Digital Identity Blockchain Developer</li>
                                    <li class="title_text_sugg">Digital Identity for Voting Specialist</li>
                                    <li class="title_text_sugg">Digital Identity for Voting Specialist</li>
                                    <li class="title_text_sugg">Digital Marketing Specialist</li>
                                    <li class="title_text_sugg">Digital Marketing for E-commerce</li>
                                    <li class="title_text_sugg">Digital Nomad Consultant</li>
                                    <li class="title_text_sugg">Digital Nomad Health and Wellness Coach</li>
                                    <li class="title_text_sugg">Digital Nomad Health and Wellness Coach</li>
                                    <li class="title_text_sugg">Digital Nomad Travel Agent</li>
                                    <li class="title_text_sugg">Digital Nomad Travel Agent</li>
                                    <li class="title_text_sugg">Digital Voting Security Consultant</li>
                                    <li class="title_text_sugg">Digital Voting Security Consultant</li>
                                    <li class="title_text_sugg">Digital Workplace Consultant</li>
                                    <li class="title_text_sugg">Digital Workplace Consultant</li>
                                    <li class="title_text_sugg">Diplomat</li>
                                    <li class="title_text_sugg">Disability Rights Advocate</li>
                                    <li class="title_text_sugg">Disability Rights Advocate</li>
                                    <li class="title_text_sugg">Dispensary Manager</li>
                                    <li class="title_text_sugg">Document Review Specialist</li>
                                    <li class="title_text_sugg">Drone Pilot for Agriculture</li>
                                    <li class="title_text_sugg">Drone Pilot for Agriculture</li>
                                    <li class="title_text_sugg">Dropshipping Specialist</li>
                                    <li class="title_text_sugg">E-Learning Content Creator</li>
                                    <li class="title_text_sugg">E-Learning Content Creator</li>
                                    <li class="title_text_sugg">E-commerce Manager</li>
                                    <li class="title_text_sugg">ERP (Enterprise Resource Planning) Consultant</li>
                                    <li class="title_text_sugg">ESG (Environmental, Social, Governance) Specialist</li>
                                    <li class="title_text_sugg">ESG Investment Advisor</li>
                                    <li class="title_text_sugg">ESG Investment Advisor</li>
                                    <li class="title_text_sugg">Earth Observation Scientist</li>
                                    <li class="title_text_sugg">Earth Observation Scientist</li>
                                    <li class="title_text_sugg">Eco-Friendly Materials Engineer</li>
                                    <li class="title_text_sugg">Eco-Friendly Materials Engineer</li>
                                    <li class="title_text_sugg">Ecological Restoration Manager</li>
                                    <li class="title_text_sugg">Ecological Restoration Manager</li>
                                    <li class="title_text_sugg">EdTech Product Manager</li>
                                    <li class="title_text_sugg">EdTech Product Manager</li>
                                    <li class="title_text_sugg">Education Administrator</li>
                                    <li class="title_text_sugg">Elderly Care Coordinator</li>
                                    <li class="title_text_sugg">Elderly Care Coordinator</li>
                                    <li class="title_text_sugg">Election Security Consultant</li>
                                    <li class="title_text_sugg">Election Security Consultant</li>
                                    <li class="title_text_sugg">Electric Vehicle (EV) Charging Infrastructure Manager</li>
                                    <li class="title_text_sugg">Electric Vehicle (EV) Charging Infrastructure Manager</li>
                                    <li class="title_text_sugg">Electrical Engineer</li>
                                    <li class="title_text_sugg">Electrical Technician</li>
                                    <li class="title_text_sugg">Electrician</li>
                                    <li class="title_text_sugg">Embedded Systems Engineer</li>
                                    <li class="title_text_sugg">Emergency Management Director</li>
                                    <li class="title_text_sugg">Emergency Medical Technician (EMT)</li>
                                    <li class="title_text_sugg">Employee Relations Specialist</li>
                                    <li class="title_text_sugg">Energy Analyst</li>
                                    <li class="title_text_sugg">Energy Healer</li>
                                    <li class="title_text_sugg">Energy Policy Advocate</li>
                                    <li class="title_text_sugg">Energy Policy Advocate</li>
                                    <li class="title_text_sugg">Enterprise Architect</li>
                                    <li class="title_text_sugg">Environmental Compliance Manager</li>
                                    <li class="title_text_sugg">Environmental Compliance Specialist</li>
                                    <li class="title_text_sugg">Environmental Consultant</li>
                                    <li class="title_text_sugg">Environmental Consultant</li>
                                    <li class="title_text_sugg">Environmental Engineer</li>
                                    <li class="title_text_sugg">Environmental Remediation Specialist</li>
                                    <li class="title_text_sugg">Environmental Remediation Specialist</li>
                                    <li class="title_text_sugg">Ethical AI Consultant</li>
                                    <li class="title_text_sugg">Event Coordinator</li>
                                    <li class="title_text_sugg">Event Coordinator</li>
                                    <li class="title_text_sugg">Event Manager</li>
                                    <li class="title_text_sugg">Event Planner</li>
                                    <li class="title_text_sugg">Event Planner</li>
                                    <li class="title_text_sugg">Executive Director</li>
                                    <li class="title_text_sugg">Farmer</li>
                                    <li class="title_text_sugg">Fashion Buyer</li>
                                    <li class="title_text_sugg">Fashion Designer</li>
                                    <li class="title_text_sugg">Fashion Designer</li>
                                    <li class="title_text_sugg">Fashion Merchandiser</li>
                                    <li class="title_text_sugg">Fashion Stylist</li>
                                    <li class="title_text_sugg">Fashion Upcycling Artisan</li>
                                    <li class="title_text_sugg">Fashion Upcycling Artisan</li>
                                    <li class="title_text_sugg">Fiber Optic Technician</li>
                                    <li class="title_text_sugg">Film Director</li>
                                    <li class="title_text_sugg">Financial Analyst</li>
                                    <li class="title_text_sugg">Financial Consultant</li>
                                    <li class="title_text_sugg">Firefighter</li>
                                    <li class="title_text_sugg">Fisheries Manager</li>
                                    <li class="title_text_sugg">Fisheries Manager</li>
                                    <li class="title_text_sugg">Fitness App Developer</li>
                                    <li class="title_text_sugg">Fitness Technology Product Manager</li>
                                    <li class="title_text_sugg">Food Critic</li>
                                    <li class="title_text_sugg">Food Resilience Planner</li>
                                    <li class="title_text_sugg">Food Resilience Planner</li>
                                    <li class="title_text_sugg">Food Security Analyst</li>
                                    <li class="title_text_sugg">Food Security Analyst</li>
                                    <li class="title_text_sugg">Food Waste Reduction Coordinator</li>
                                    <li class="title_text_sugg">Food Waste Reduction Coordinator</li>
                                    <li class="title_text_sugg">Forest Technician</li>
                                    <li class="title_text_sugg">Forester</li>
                                    <li class="title_text_sugg">Freight Broker</li>
                                    <li class="title_text_sugg">Front-End Developer</li>
                                    <li class="title_text_sugg">Fulfillment Specialist</li>
                                    <li class="title_text_sugg">Full-Stack Developer</li>
                                    <li class="title_text_sugg">Fundraising Manager</li>
                                    <li class="title_text_sugg">GIS Analyst</li>
                                    <li class="title_text_sugg">GIS Developer</li>
                                    <li class="title_text_sugg">GIS and Remote Sensing Analyst</li>
                                    <li class="title_text_sugg">GIS and Remote Sensing Analyst</li>
                                    <li class="title_text_sugg">Game Artist</li>
                                    <li class="title_text_sugg">Game Designer</li>
                                    <li class="title_text_sugg">Game Developer</li>
                                    <li class="title_text_sugg">Game Producer</li>
                                    <li class="title_text_sugg">Game Tester</li>
                                    <li class="title_text_sugg">Geologist</li>
                                    <li class="title_text_sugg">Geospatial Project Manager</li>
                                    <li class="title_text_sugg">Geriatric Nurse</li>
                                    <li class="title_text_sugg">Geriatric Nurse</li>
                                    <li class="title_text_sugg">Gerontologist</li>
                                    <li class="title_text_sugg">Gerontologist</li>
                                    <li class="title_text_sugg">Government Affairs Specialist</li>
                                    <li class="title_text_sugg">Government Analyst</li>
                                    <li class="title_text_sugg">Grant Writer</li>
                                    <li class="title_text_sugg">Grant Writer</li>
                                    <li class="title_text_sugg">Graphic Designer</li>
                                    <li class="title_text_sugg">Graphic Designer</li>
                                    <li class="title_text_sugg">Green Bonds Analyst</li>
                                    <li class="title_text_sugg">Green Building Consultant</li>
                                    <li class="title_text_sugg">Green Finance Analyst</li>
                                    <li class="title_text_sugg">Green Finance Analyst</li>
                                    <li class="title_text_sugg">HR Consultant</li>
                                    <li class="title_text_sugg">HR Generalist</li>
                                    <li class="title_text_sugg">HR Manager</li>
                                    <li class="title_text_sugg">Health Data Analyst</li>
                                    <li class="title_text_sugg">Health Data Analyst</li>
                                    <li class="title_text_sugg">Health Information Manager</li>
                                    <li class="title_text_sugg">Health Policy Analyst</li>
                                    <li class="title_text_sugg">Health and Fitness Data Analyst</li>
                                    <li class="title_text_sugg">Healthcare Blockchain Architect</li>
                                    <li class="title_text_sugg">Healthcare Blockchain Architect</li>
                                    <li class="title_text_sugg">Healthcare Compliance Officer</li>
                                    <li class="title_text_sugg">Healthcare Consultant</li>
                                    <li class="title_text_sugg">Healthcare Data Security Analyst</li>
                                    <li class="title_text_sugg">Healthcare Data Security Analyst</li>
                                    <li class="title_text_sugg">Healthcare Technology Manager</li>
                                    <li class="title_text_sugg">Help Desk Analyst</li>
                                    <li class="title_text_sugg">Helpdesk Technician</li>
                                    <li class="title_text_sugg">Herbalist</li>
                                    <li class="title_text_sugg">Holistic Nutritionist</li>
                                    <li class="title_text_sugg">Horticulturist</li>
                                    <li class="title_text_sugg">Hospital Administrator</li>
                                    <li class="title_text_sugg">Hotel Manager</li>
                                    <li class="title_text_sugg">Hydroponic Farmer</li>
                                    <li class="title_text_sugg">Hydroponic Farmer</li>
                                    <li class="title_text_sugg">Hydroponic System Designer</li>
                                    <li class="title_text_sugg">Hydroponic System Designer</li>
                                    <li class="title_text_sugg">IT Asset Manager</li>
                                    <li class="title_text_sugg">IT Auditor</li>
                                    <li class="title_text_sugg">IT Budget Analyst</li>
                                    <li class="title_text_sugg">IT Business Analyst</li>
                                    <li class="title_text_sugg">IT Business Continuity Planner</li>
                                    <li class="title_text_sugg">IT Business Relationship Manager</li>
                                    <li class="title_text_sugg">IT Capacity Manager</li>
                                    <li class="title_text_sugg">IT Capacity Planner</li>
                                    <li class="title_text_sugg">IT Change Analyst</li>
                                    <li class="title_text_sugg">IT Change Manager</li>
                                    <li class="title_text_sugg">IT Communications Specialist</li>
                                    <li class="title_text_sugg">IT Compliance Analyst</li>
                                    <li class="title_text_sugg">IT Compliance Manager</li>
                                    <li class="title_text_sugg">IT Configuration Manager</li>
                                    <li class="title_text_sugg">IT Consultant</li>
                                    <li class="title_text_sugg">IT Consultant</li>
                                    <li class="title_text_sugg">IT Contracts Administrator</li>
                                    <li class="title_text_sugg">IT Director</li>
                                    <li class="title_text_sugg">IT Disaster Recovery Specialist</li>
                                    <li class="title_text_sugg">IT Governance Specialist</li>
                                    <li class="title_text_sugg">IT Knowledge Manager</li>
                                    <li class="title_text_sugg">IT Manager</li>
                                    <li class="title_text_sugg">IT Marketing Manager</li>
                                    <li class="title_text_sugg">IT Metrics Analyst</li>
                                    <li class="title_text_sugg">IT Operations Manager</li>
                                    <li class="title_text_sugg">IT Performance Analyst</li>
                                    <li class="title_text_sugg">IT Problem Manager</li>
                                    <li class="title_text_sugg">IT Process Improvement Manager</li>
                                    <li class="title_text_sugg">IT Procurement Manager</li>
                                    <li class="title_text_sugg">IT Procurement Specialist</li>
                                    <li class="title_text_sugg">IT Project Manager</li>
                                    <li class="title_text_sugg">IT Project Manager</li>
                                    <li class="title_text_sugg">IT Release Manager</li>
                                    <li class="title_text_sugg">IT Risk Manager</li>
                                    <li class="title_text_sugg">IT Service Catalog Manager</li>
                                    <li class="title_text_sugg">IT Service Delivery Manager</li>
                                    <li class="title_text_sugg">IT Service Desk Administrator</li>
                                    <li class="title_text_sugg">IT Service Desk Analyst</li>
                                    <li class="title_text_sugg">IT Service Desk Consultant</li>
                                    <li class="title_text_sugg">IT Service Desk Coordinator</li>
                                    <li class="title_text_sugg">IT Service Desk Director</li>
                                    <li class="title_text_sugg">IT Service Desk Engineer</li>
                                    <li class="title_text_sugg">IT Service Desk Manager</li>
                                    <li class="title_text_sugg">IT Service Desk Operator</li>
                                    <li class="title_text_sugg">IT Service Desk Representative</li>
                                    <li class="title_text_sugg">IT Service Desk Specialist</li>
                                    <li class="title_text_sugg">IT Service Desk Supervisor</li>
                                    <li class="title_text_sugg">IT Service Desk Team Lead</li>
                                    <li class="title_text_sugg">IT Service Desk Technician</li>
                                    <li class="title_text_sugg">IT Service Level Manager</li>
                                    <li class="title_text_sugg">IT Strategy Consultant</li>
                                    <li class="title_text_sugg">IT Support Specialist</li>
                                    <li class="title_text_sugg">IT Systems Analyst</li>
                                    <li class="title_text_sugg">IT Technical Writer</li>
                                    <li class="title_text_sugg">IT Trainer</li>
                                    <li class="title_text_sugg">IT Vendor Manager</li>
                                    <li class="title_text_sugg">IT Vendor Relations Manager</li>
                                    <li class="title_text_sugg">Illustrator</li>
                                    <li class="title_text_sugg">Impact Investing Advisor</li>
                                    <li class="title_text_sugg">Impact Investment Analyst</li>
                                    <li class="title_text_sugg">Impact Investment Portfolio Manager</li>
                                    <li class="title_text_sugg">Impact Investment Portfolio Manager</li>
                                    <li class="title_text_sugg">Incident Responder</li>
                                    <li class="title_text_sugg">Inclusive Design Specialist</li>
                                    <li class="title_text_sugg">Inclusive Design Specialist</li>
                                    <li class="title_text_sugg">Influencer</li>
                                    <li class="title_text_sugg">Insurance Agent</li>
                                    <li class="title_text_sugg">Insurance Broker</li>
                                    <li class="title_text_sugg">Interior Designer</li>
                                    <li class="title_text_sugg">Interior Designer</li>
                                    <li class="title_text_sugg">Interpreter</li>
                                    <li class="title_text_sugg">Inventory Analyst</li>
                                    <li class="title_text_sugg">Inventory Manager</li>
                                    <li class="title_text_sugg">Investment Banker</li>
                                    <li class="title_text_sugg">IoT (Internet of Things) Developer</li>
                                    <li class="title_text_sugg">IoT for Smart Cities Specialist</li>
                                    <li class="title_text_sugg">IoT for Smart Cities Specialist</li>
                                    <li class="title_text_sugg">Journalist</li>
                                    <li class="title_text_sugg">Judge</li>
                                    <li class="title_text_sugg">Laboratory Technician</li>
                                    <li class="title_text_sugg">Landscape Architect</li>
                                    <li class="title_text_sugg">Language Model Ethicist</li>
                                    <li class="title_text_sugg">Language Model Ethicist</li>
                                    <li class="title_text_sugg">Language Teacher</li>
                                    <li class="title_text_sugg">Lawyer/Attorney</li>
                                    <li class="title_text_sugg">Leasing Consultant</li>
                                    <li class="title_text_sugg">Legal Assistant</li>
                                    <li class="title_text_sugg">Legal Consultant</li>
                                    <li class="title_text_sugg">Legal Secretary</li>
                                    <li class="title_text_sugg">Legal Secretary</li>
                                    <li class="title_text_sugg">Legislative Assistant</li>
                                    <li class="title_text_sugg">Librarian</li>
                                    <li class="title_text_sugg">Linguist</li>
                                    <li class="title_text_sugg">Linux Administrator</li>
                                    <li class="title_text_sugg">Livestock Manager</li>
                                    <li class="title_text_sugg">Lobbyist</li>
                                    <li class="title_text_sugg">Localization Specialist</li>
                                    <li class="title_text_sugg">Logistics Coordinator</li>
                                    <li class="title_text_sugg">Logistics Manager</li>
                                    <li class="title_text_sugg">Loss Prevention Specialist</li>
                                    <li class="title_text_sugg">Machine Learning Engineer</li>
                                    <li class="title_text_sugg">Machine Learning Scientist</li>
                                    <li class="title_text_sugg">Machine Operator</li>
                                    <li class="title_text_sugg">Management Consultant</li>
                                    <li class="title_text_sugg">Manufacturing Technician</li>
                                    <li class="title_text_sugg">Marine Biologist</li>
                                    <li class="title_text_sugg">Marine Biologist</li>
                                    <li class="title_text_sugg">Marine Conservationist</li>
                                    <li class="title_text_sugg">Marine Conservationist</li>
                                    <li class="title_text_sugg">Marine Debris Removal Coordinator</li>
                                    <li class="title_text_sugg">Marine Debris Removal Coordinator</li>
                                    <li class="title_text_sugg">Market Research Analyst</li>
                                    <li class="title_text_sugg">Market Research Analyst</li>
                                    <li class="title_text_sugg">Market Research Manager</li>
                                    <li class="title_text_sugg">Marketing Manager</li>
                                    <li class="title_text_sugg">Marketing Strategist</li>
                                    <li class="title_text_sugg">Marriage and Family Therapist</li>
                                    <li class="title_text_sugg">Mason</li>
                                    <li class="title_text_sugg">Massage Therapist</li>
                                    <li class="title_text_sugg">Mayor</li>
                                    <li class="title_text_sugg">Mechanical Engineer</li>
                                    <li class="title_text_sugg">Media Relations Officer</li>
                                    <li class="title_text_sugg">Media Relations Officer</li>
                                    <li class="title_text_sugg">Medical Data Exchange Coordinator</li>
                                    <li class="title_text_sugg">Medical Data Exchange Coordinator</li>
                                    <li class="title_text_sugg">Medical Equipment Technician</li>
                                    <li class="title_text_sugg">Medical Practice Manager</li>
                                    <li class="title_text_sugg">Medical Researcher</li>
                                    <li class="title_text_sugg">Memory Care Specialist</li>
                                    <li class="title_text_sugg">Memory Care Specialist</li>
                                    <li class="title_text_sugg">Mental Health App Developer</li>
                                    <li class="title_text_sugg">Mental Health App Developer</li>
                                    <li class="title_text_sugg">Mental Health Tech Product Manager</li>
                                    <li class="title_text_sugg">Mental Health Tech Product Manager</li>
                                    <li class="title_text_sugg">Mobile App Developer</li>
                                    <li class="title_text_sugg">Mortgage Broker</li>
                                    <li class="title_text_sugg">Music Producer</li>
                                    <li class="title_text_sugg">Music Teacher</li>
                                    <li class="title_text_sugg">Musician</li>
                                    <li class="title_text_sugg">Natural Language Processing (NLP) Engineer</li>
                                    <li class="title_text_sugg">Natural Language Processing (NLP) Engineer</li>
                                    <li class="title_text_sugg">Natural Language Processing (NLP) Specialist</li>
                                    <li class="title_text_sugg">Naturopathic Doctor</li>
                                    <li class="title_text_sugg">Network Administrator</li>
                                    <li class="title_text_sugg">Network Administrator</li>
                                    <li class="title_text_sugg">Network Analyst</li>
                                    <li class="title_text_sugg">Network Architect</li>
                                    <li class="title_text_sugg">Network Engineer</li>
                                    <li class="title_text_sugg">Network Operations Center (NOC) Technician</li>
                                    <li class="title_text_sugg">Network Security Administrator</li>
                                    <li class="title_text_sugg">Network Security Engineer</li>
                                    <li class="title_text_sugg">Network Technician</li>
                                    <li class="title_text_sugg">Nonprofit Director</li>
                                    <li class="title_text_sugg">Nurse</li>
                                    <li class="title_text_sugg">Nutritionist</li>
                                    <li class="title_text_sugg">Ocean Cleanup Technician</li>
                                    <li class="title_text_sugg">Ocean Cleanup Technician</li>
                                    <li class="title_text_sugg">Oceanographer</li>
                                    <li class="title_text_sugg">Oceanographer</li>
                                    <li class="title_text_sugg">Online Course Designer</li>
                                    <li class="title_text_sugg">Online Mental Health Coach</li>
                                    <li class="title_text_sugg">Online Mental Health Coach</li>
                                    <li class="title_text_sugg">Online Tutor</li>
                                    <li class="title_text_sugg">Online Tutor</li>
                                    <li class="title_text_sugg">Paralegal</li>
                                    <li class="title_text_sugg">Paralegal</li>
                                    <li class="title_text_sugg">Paramedic</li>
                                    <li class="title_text_sugg">Park Ranger</li>
                                    <li class="title_text_sugg">Pastry Chef</li>
                                    <li class="title_text_sugg">Patent Examiner</li>
                                    <li class="title_text_sugg">Penetration Tester (Ethical Hacker)</li>
                                    <li class="title_text_sugg">Personal Health Tech Coach</li>
                                    <li class="title_text_sugg">Personal Health Tech Coach</li>
                                    <li class="title_text_sugg">Personal Trainer</li>
                                    <li class="title_text_sugg">Pharmaceutical Sales Representative</li>
                                    <li class="title_text_sugg">Pharmacist</li>
                                    <li class="title_text_sugg">Pharmacist</li>
                                    <li class="title_text_sugg">Pharmacologist</li>
                                    <li class="title_text_sugg">Pharmacy Manager</li>
                                    <li class="title_text_sugg">Pharmacy Technician</li>
                                    <li class="title_text_sugg">Physical Therapist</li>
                                    <li class="title_text_sugg">Physical Therapist</li>
                                    <li class="title_text_sugg">Physician</li>
                                    <li class="title_text_sugg">Physicist</li>
                                    <li class="title_text_sugg">Pilot</li>
                                    <li class="title_text_sugg">Pilot</li>
                                    <li class="title_text_sugg">Plant Manager</li>
                                    <li class="title_text_sugg">Plumber</li>
                                    <li class="title_text_sugg">Police Officer</li>
                                    <li class="title_text_sugg">Political Analyst</li>
                                    <li class="title_text_sugg">Political Campaign Manager</li>
                                    <li class="title_text_sugg">Power Plant Operator</li>
                                    <li class="title_text_sugg">Precision Agriculture Specialist</li>
                                    <li class="title_text_sugg">Precision Agriculture Specialist</li>
                                    <li class="title_text_sugg">Privacy Compliance Officer</li>
                                    <li class="title_text_sugg">Privacy Compliance Officer</li>
                                    <li class="title_text_sugg">Process Engineer</li>
                                    <li class="title_text_sugg">Procurement Specialist</li>
                                    <li class="title_text_sugg">Production Supervisor</li>
                                    <li class="title_text_sugg">Professor</li>
                                    <li class="title_text_sugg">Program Manager</li>
                                    <li class="title_text_sugg">Property Manager</li>
                                    <li class="title_text_sugg">Psychologist</li>
                                    <li class="title_text_sugg">Public Policy Advisor</li>
                                    <li class="title_text_sugg">Public Relations Crisis Specialist</li>
                                    <li class="title_text_sugg">Public Relations Crisis Specialist</li>
                                    <li class="title_text_sugg">Public Relations Specialist</li>
                                    <li class="title_text_sugg">Public Transit Planner</li>
                                    <li class="title_text_sugg">Public Transit Planner</li>
                                    <li class="title_text_sugg">QA (Quality Assurance) Tester</li>
                                    <li class="title_text_sugg">QA Analyst</li>
                                    <li class="title_text_sugg">QA Tester</li>
                                    <li class="title_text_sugg">Quality Assurance Manager</li>
                                    <li class="title_text_sugg">Quality Control Inspector</li>
                                    <li class="title_text_sugg">Quality Control Inspector</li>
                                    <li class="title_text_sugg">Quantified Self Consultant</li>
                                    <li class="title_text_sugg">Quantified Self Consultant</li>
                                    <li class="title_text_sugg">Quantum Algorithm Researcher</li>
                                    <li class="title_text_sugg">Quantum Cryptographer</li>
                                    <li class="title_text_sugg">Quantum Hardware Engineer</li>
                                    <li class="title_text_sugg">Quantum Physicist</li>
                                    <li class="title_text_sugg">Quantum Software Developer</li>
                                    <li class="title_text_sugg">Radiologist</li>
                                    <li class="title_text_sugg">Real Estate Agent</li>
                                    <li class="title_text_sugg">Real Estate Developer</li>
                                    <li class="title_text_sugg">Recruitment Specialist</li>
                                    <li class="title_text_sugg">Recycling Coordinator</li>
                                    <li class="title_text_sugg">Regenerative Agriculture Consultant</li>
                                    <li class="title_text_sugg">Regenerative Agriculture Consultant</li>
                                    <li class="title_text_sugg">Regulatory Affairs Specialist</li>
                                    <li class="title_text_sugg">Regulatory Affairs Specialist</li>
                                    <li class="title_text_sugg">Remote Collaboration Tools Specialist</li>
                                    <li class="title_text_sugg">Remote Collaboration Tools Specialist</li>
                                    <li class="title_text_sugg">Remote Customer Support</li>
                                    <li class="title_text_sugg">Remote HR Manager</li>
                                    <li class="title_text_sugg">Remote HR Manager</li>
                                    <li class="title_text_sugg">Remote Learning Facilitator</li>
                                    <li class="title_text_sugg">Remote Learning Facilitator</li>
                                    <li class="title_text_sugg">Remote Project Manager</li>
                                    <li class="title_text_sugg">Remote Sensing Data Engineer</li>
                                    <li class="title_text_sugg">Remote Sensing Data Engineer</li>
                                    <li class="title_text_sugg">Remote Sensing Specialist</li>
                                    <li class="title_text_sugg">Remote Sensing Specialist</li>
                                    <li class="title_text_sugg">Remote Sensing Specialist</li>
                                    <li class="title_text_sugg">Remote Software Developer</li>
                                    <li class="title_text_sugg">Remote Team Leader</li>
                                    <li class="title_text_sugg">Remote Team Leader</li>
                                    <li class="title_text_sugg">Remote Work Consultant</li>
                                    <li class="title_text_sugg">Remote Work Consultant</li>
                                    <li class="title_text_sugg">Renewable Energy Policy Analyst</li>
                                    <li class="title_text_sugg">Renewable Energy Policy Analyst</li>
                                    <li class="title_text_sugg">Renewable Energy Project Developer</li>
                                    <li class="title_text_sugg">Renewable Energy Project Developer</li>
                                    <li class="title_text_sugg">Renewable Energy Specialist</li>
                                    <li class="title_text_sugg">Reputation Management Consultant</li>
                                    <li class="title_text_sugg">Reputation Management Consultant</li>
                                    <li class="title_text_sugg">Research Scientist</li>
                                    <li class="title_text_sugg">Responsible Tech Advocate</li>
                                    <li class="title_text_sugg">Responsible Tech Advocate</li>
                                    <li class="title_text_sugg">Restaurant Manager</li>
                                    <li class="title_text_sugg">Restaurant Server</li>
                                    <li class="title_text_sugg">Retail Sales Associate</li>
                                    <li class="title_text_sugg">Retail Salesperson</li>
                                    <li class="title_text_sugg">Risk Analyst</li>
                                    <li class="title_text_sugg">Risk Manager</li>
                                    <li class="title_text_sugg">Robotics Engineer</li>
                                    <li class="title_text_sugg">Robotics Programmer</li>
                                    <li class="title_text_sugg">Robotics Technician</li>
                                    <li class="title_text_sugg">Rocket Engineer</li>
                                    <li class="title_text_sugg">SAP Consultant</li>
                                    <li class="title_text_sugg">SEO Specialist</li>
                                    <li class="title_text_sugg">Sales Associate</li>
                                    <li class="title_text_sugg">Sales Manager</li>
                                    <li class="title_text_sugg">Sales Representative</li>
                                    <li class="title_text_sugg">Satellite Image Analyst</li>
                                    <li class="title_text_sugg">Satellite Image Analyst</li>
                                    <li class="title_text_sugg">School Principal</li>
                                    <li class="title_text_sugg">Security Consultant</li>
                                    <li class="title_text_sugg">Security Engineer</li>
                                    <li class="title_text_sugg">Security Information and Event Management (SIEM) Analyst
                                    </li>
                                    <li class="title_text_sugg">Security Operations Center (SOC) Analyst</li>
                                    <li class="title_text_sugg">Self-Sovereign Identity Architect</li>
                                    <li class="title_text_sugg">Self-Sovereign Identity Architect</li>
                                    <li class="title_text_sugg">Shipping and Receiving Clerk</li>
                                    <li class="title_text_sugg">Smart City Data Analyst</li>
                                    <li class="title_text_sugg">Smart City Data Analyst</li>
                                    <li class="title_text_sugg">Smart City Solutions Architect</li>
                                    <li class="title_text_sugg">Smart City Solutions Architect</li>
                                    <li class="title_text_sugg">Smart Farming Technology Engineer</li>
                                    <li class="title_text_sugg">Smart Farming Technology Engineer</li>
                                    <li class="title_text_sugg">Social Media Manager</li>
                                    <li class="title_text_sugg">Social Worker</li>
                                    <li class="title_text_sugg">Software Engineer</li>
                                    <li class="title_text_sugg">Software Engineer</li>
                                    <li class="title_text_sugg">Soil Conservation Technician</li>
                                    <li class="title_text_sugg">Soil Conservation Technician</li>
                                    <li class="title_text_sugg">Soil Health Specialist</li>
                                    <li class="title_text_sugg">Soil Health Specialist</li>
                                    <li class="title_text_sugg">Soil Microbiologist</li>
                                    <li class="title_text_sugg">Soil Microbiologist</li>
                                    <li class="title_text_sugg">Solar Panel Technician</li>
                                    <li class="title_text_sugg">Solutions Architect</li>
                                    <li class="title_text_sugg">Sommelier</li>
                                    <li class="title_text_sugg">Sound Engineer</li>
                                    <li class="title_text_sugg">Sous Chef</li>
                                    <li class="title_text_sugg">Space Mining Engineer</li>
                                    <li class="title_text_sugg">Space Mining Equipment Operator</li>
                                    <li class="title_text_sugg">Space Mining Equipment Operator</li>
                                    <li class="title_text_sugg">Space Mission Planner</li>
                                    <li class="title_text_sugg">Space Resource Extraction Specialist</li>
                                    <li class="title_text_sugg">Space Resource Extraction Specialist</li>
                                    <li class="title_text_sugg">Space Resource Geologist</li>
                                    <li class="title_text_sugg">Space Resource Geologist</li>
                                    <li class="title_text_sugg">Space Scientist</li>
                                    <li class="title_text_sugg">Space Tour Guide</li>
                                    <li class="title_text_sugg">Space Tourism Experience Designer</li>
                                    <li class="title_text_sugg">Space Tourism Marketing Manager</li>
                                    <li class="title_text_sugg">Space Tourism Pilot</li>
                                    <li class="title_text_sugg">Space Tourism Safety Officer</li>
                                    <li class="title_text_sugg">Spacecraft Systems Engineer</li>
                                    <li class="title_text_sugg">Stage Manager</li>
                                    <li class="title_text_sugg">Store Manager</li>
                                    <li class="title_text_sugg">Structural Engineer</li>
                                    <li class="title_text_sugg">Substance Abuse Counselor</li>
                                    <li class="title_text_sugg">Supplier Relationship Manager</li>
                                    <li class="title_text_sugg">Supplier Relationship Manager</li>
                                    <li class="title_text_sugg">Supply Chain Blockchain Analyst</li>
                                    <li class="title_text_sugg">Supply Chain Blockchain Analyst</li>
                                    <li class="title_text_sugg">Supply Chain Continuity Planner</li>
                                    <li class="title_text_sugg">Supply Chain Continuity Planner</li>
                                    <li class="title_text_sugg">Supply Chain Manager</li>
                                    <li class="title_text_sugg">Supply Chain Resilience Manager</li>
                                    <li class="title_text_sugg">Supply Chain Resilience Manager</li>
                                    <li class="title_text_sugg">Supply Chain Risk Analyst</li>
                                    <li class="title_text_sugg">Supply Chain Risk Analyst</li>
                                    <li class="title_text_sugg">Supply Chain Tokenization Expert</li>
                                    <li class="title_text_sugg">Supply Chain Tokenization Expert</li>
                                    <li class="title_text_sugg">Support Specialist</li>
                                    <li class="title_text_sugg">Surgeon</li>
                                    <li class="title_text_sugg">Sustainability Manager</li>
                                    <li class="title_text_sugg">Sustainability Reporting Analyst</li>
                                    <li class="title_text_sugg">Sustainable Agriculture Advisor</li>
                                    <li class="title_text_sugg">Sustainable Agriculture Advisor</li>
                                    <li class="title_text_sugg">Sustainable Bond Issuer</li>
                                    <li class="title_text_sugg">Sustainable Bond Issuer</li>
                                    <li class="title_text_sugg">Sustainable Energy Analyst</li>
                                    <li class="title_text_sugg">Sustainable Fashion Designer</li>
                                    <li class="title_text_sugg">Sustainable Fashion Designer</li>
                                    <li class="title_text_sugg">Sustainable Finance Manager</li>
                                    <li class="title_text_sugg">Sustainable Investment Banker</li>
                                    <li class="title_text_sugg">Sustainable Investment Banker</li>
                                    <li class="title_text_sugg">Sustainable Mobility Analyst</li>
                                    <li class="title_text_sugg">Sustainable Mobility Analyst</li>
                                    <li class="title_text_sugg">Sustainable Packaging Compliance Manager</li>
                                    <li class="title_text_sugg">Sustainable Packaging Compliance Manager</li>
                                    <li class="title_text_sugg">Sustainable Packaging Designer</li>
                                    <li class="title_text_sugg">Sustainable Supply Chain Manager</li>
                                    <li class="title_text_sugg">Sustainable Textile Engineer</li>
                                    <li class="title_text_sugg">Sustainable Textile Engineer</li>
                                    <li class="title_text_sugg">Sustainable Transportation Planner</li>
                                    <li class="title_text_sugg">Sustainable Transportation Planner</li>
                                    <li class="title_text_sugg">Systems Administrator</li>
                                    <li class="title_text_sugg">Systems Administrator</li>
                                    <li class="title_text_sugg">Systems Analyst</li>
                                    <li class="title_text_sugg">Systems Engineer</li>
                                    <li class="title_text_sugg">Systems Integration Engineer</li>
                                    <li class="title_text_sugg">Systems Security Administrator</li>
                                    <li class="title_text_sugg">Tax Specialist</li>
                                    <li class="title_text_sugg">Teacher</li>
                                    <li class="title_text_sugg">Technical Support Engineer</li>
                                    <li class="title_text_sugg">Telecommunications Engineer</li>
                                    <li class="title_text_sugg">Telecommunications Sales</li>
                                    <li class="title_text_sugg">Telehealth Coordinator</li>
                                    <li class="title_text_sugg">Telehealth Nurse</li>
                                    <li class="title_text_sugg">Telehealth Technician</li>
                                    <li class="title_text_sugg">Telemedicine Doctor</li>
                                    <li class="title_text_sugg">Telemedicine Software Developer</li>
                                    <li class="title_text_sugg">Telepsychiatrist</li>
                                    <li class="title_text_sugg">Telepsychiatrist</li>
                                    <li class="title_text_sugg">Teletherapy Counselor</li>
                                    <li class="title_text_sugg">Test Automation Engineer</li>
                                    <li class="title_text_sugg">Textile Designer</li>
                                    <li class="title_text_sugg">Textile Recycling Specialist</li>
                                    <li class="title_text_sugg">Textile Recycling Specialist</li>
                                    <li class="title_text_sugg">Tour Guide</li>
                                    <li class="title_text_sugg">Training and Development Manager</li>
                                    <li class="title_text_sugg">Translator</li>
                                    <li class="title_text_sugg">Transparency and Traceability Specialist</li>
                                    <li class="title_text_sugg">Transparency and Traceability Specialist</li>
                                    <li class="title_text_sugg">Travel Agent</li>
                                    <li class="title_text_sugg">Treasury Analyst</li>
                                    <li class="title_text_sugg">Truck Driver</li>
                                    <li class="title_text_sugg">Tutor</li>
                                    <li class="title_text_sugg">UX/UI Designer</li>
                                    <li class="title_text_sugg">Underwriter</li>
                                    <li class="title_text_sugg">Urban Agriculture Educator</li>
                                    <li class="title_text_sugg">Urban Agriculture Educator</li>
                                    <li class="title_text_sugg">Urban Agriculture Entrepreneur</li>
                                    <li class="title_text_sugg">Urban Agriculture Entrepreneur</li>
                                    <li class="title_text_sugg">Urban Agriculture Specialist</li>
                                    <li class="title_text_sugg">Urban Agriculture Specialist</li>
                                    <li class="title_text_sugg">Urban Climate Adaptation Coordinator</li>
                                    <li class="title_text_sugg">Urban Climate Adaptation Coordinator</li>
                                    <li class="title_text_sugg">Urban Planner</li>
                                    <li class="title_text_sugg">Urban Resilience Planner</li>
                                    <li class="title_text_sugg">Urban Resilience Planner</li>
                                    <li class="title_text_sugg">Utilities Engineer</li>
                                    <li class="title_text_sugg">VR/AR Content Creator</li>
                                    <li class="title_text_sugg">VR/AR Developer</li>
                                    <li class="title_text_sugg">VR/AR Game Designer</li>
                                    <li class="title_text_sugg">VR/AR Game Designer</li>
                                    <li class="title_text_sugg">VR/AR Product Manager</li>
                                    <li class="title_text_sugg">VR/AR Product Manager</li>
                                    <li class="title_text_sugg">VR/AR UX Designer</li>
                                    <li class="title_text_sugg">Vertical Farming Specialist</li>
                                    <li class="title_text_sugg">Vertical Farming Specialist</li>
                                    <li class="title_text_sugg">Veterinarian</li>
                                    <li class="title_text_sugg">Veterinary Technician</li>
                                    <li class="title_text_sugg">Video Game Developer</li>
                                    <li class="title_text_sugg">Virtual Assistant</li>
                                    <li class="title_text_sugg">Virtual Event Moderator</li>
                                    <li class="title_text_sugg">Virtual Event Moderator</li>
                                    <li class="title_text_sugg">Virtual Event Producer</li>
                                    <li class="title_text_sugg">Virtual Event Producer</li>
                                    <li class="title_text_sugg">Virtual Event Technology Specialist</li>
                                    <li class="title_text_sugg">Virtual Event Technology Specialist</li>
                                    <li class="title_text_sugg">Virtual Personal Trainer</li>
                                    <li class="title_text_sugg">Virtual Reality (VR) Developer</li>
                                    <li class="title_text_sugg">Virtual Team Facilitator</li>
                                    <li class="title_text_sugg">Virtual Team Facilitator</li>
                                    <li class="title_text_sugg">Virtual Trade Show Organizer</li>
                                    <li class="title_text_sugg">Virtual Trade Show Organizer</li>
                                    <li class="title_text_sugg">Virtualization Engineer</li>
                                    <li class="title_text_sugg">Visual Merchandiser</li>
                                    <li class="title_text_sugg">VoIP Engineer</li>
                                    <li class="title_text_sugg">Volunteer Coordinator</li>
                                    <li class="title_text_sugg">Voting System Security Analyst</li>
                                    <li class="title_text_sugg">Voting System Security Analyst</li>
                                    <li class="title_text_sugg">Water Pollution Analyst</li>
                                    <li class="title_text_sugg">Water Pollution Analyst</li>
                                    <li class="title_text_sugg">Wearable Health Tech Developer</li>
                                    <li class="title_text_sugg">Wearable Health Tech Developer</li>
                                    <li class="title_text_sugg">Wearable Technology Developer</li>
                                    <li class="title_text_sugg">Web Developer</li>
                                    <li class="title_text_sugg">Web Developer</li>
                                    <li class="title_text_sugg">Wedding Planner</li>
                                    <li class="title_text_sugg">Welder</li>
                                    <li class="title_text_sugg">Wellness Coach</li>
                                    <li class="title_text_sugg">Wildlife Biologist</li>
                                    <li class="title_text_sugg">Wildlife Biologist</li>
                                    <li class="title_text_sugg">Wildlife Rehabilitator</li>
                                    <li class="title_text_sugg">Wind Turbine Technician</li>
                                    <li class="title_text_sugg">Windows Administrator</li>
                                    <li class="title_text_sugg">Wireless Communication Specialist</li>
                                    <li class="title_text_sugg">Wireless Network Engineer</li>
                                    <li class="title_text_sugg">Yoga Instructor</li>
                                    <li class="title_text_sugg">Zookeeper</li>
                                </ol>



                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Category*</label>
                            <select data-placeholder='Please Select Category' name="category" id="class_id"
                                class="select2-multiple form-select fs-14  h-50px" required onchange="testFillBox()">
                                <option></option>
                                <?php if($data != null): ?>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option value="<?php echo e($row['id']); ?>" 
                                            <?php echo e($row['id'] == $selected_job->id ? 'selected' : ''); ?>>
                                            <?php echo e($row['title']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please select Category.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="name" class="form-label fs-14 text-theme-primary fw-bold">Job Type*</label>
                            <select data-placeholder='Please Select Job Type'
                                class="select2-multiple form-select fs-14 h-50px" name="job_type" required>
                                <option></option>
                                <option value="Apprenticeship" <?php if($post->job_type == 'Apprenticeship'): ?> selected <?php endif; ?>>
                                    Apprenticeship</option>
                                <option value="Casual" <?php if($post->job_type == 'Casual'): ?> selected <?php endif; ?>>Casual</option>
                                <option value="Contract" <?php if($post->job_type == 'Contract'): ?> selected <?php endif; ?>>Contract
                                </option>
                                <option value="Full Time" <?php if($post->job_type == 'Full Time'): ?> selected <?php endif; ?>>Full Time
                                </option>
                                <option value="Internship" <?php if($post->job_type == 'Internship'): ?> selected <?php endif; ?>>Internship
                                </option>
                                <option value="Part Time" <?php if($post->job_type == 'Part Time'): ?> selected <?php endif; ?>>Part Time
                                </option>
                                <option value="Trainee" <?php if($post->job_type == 'Trainee'): ?> selected <?php endif; ?>>Trainee</option>
                                
                            </select>
                            <div class="invalid-feedback">
                                Please select Job Type.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="experience"
                                class="form-label fs-14 text-theme-primary fw-bold">Experience*</label>
                            
                            <select data-placeholder='Please Select Experience' class="select2-multiple form-select"
                                name="experience" required>
                                <option></option>
                                <option value="6 Months" <?php if($post->experience == '6 Months'): ?> selected <?php endif; ?>>6 Months
                                </option>
                                <option value="1+ Year" <?php if($post->experience == '1+ Year'): ?> selected <?php endif; ?>>1+ Year
                                </option>
                                <option value="2+ Years" <?php if($post->experience == '2+ Years'): ?> selected <?php endif; ?>>2+ Years
                                </option>
                                <option value="3+ Years" <?php if($post->experience == '3+ Years'): ?> selected <?php endif; ?>>3+ Years
                                </option>
                                <option value="4+ Years" <?php if($post->experience == '4+ Years'): ?> selected <?php endif; ?>>4+ Years
                                </option>
                                <option value="5+ Years" <?php if($post->experience == '5+ Years'): ?> selected <?php endif; ?>>5+ Years
                                </option>
                                <option value="6+ Years" <?php if($post->experience == '6+ Years'): ?> selected <?php endif; ?>>6+ Years
                                </option>
                                <option value="More than 10 Years" <?php if($post->experience == 'More than 10 Years'): ?> selected <?php endif; ?>>More
                                    then 10 Years
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Experience.
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group gender-labels">
                            <label for="gender" class="form-label fs-14 text-theme-primary fw-bold">Gender*</label>
                            <br>

                            <input type="radio" class="btn-check" name="gender" id="others" value="Others"
                                autocomplete="off" <?php if($post->gender == 'Others'): ?> checked <?php endif; ?>>
                            <label class="btn btn-outline-primary fs-14" for="others">Nonbinary</label>

                            <input type="radio" class="btn-check" name="gender" id="male" value="Male"
                                autocomplete="off" <?php if($post->gender == 'Male'): ?> checked <?php endif; ?>>
                            <label class="btn btn-outline-primary fs-14" for="male">Male</label>

                            <input type="radio" class="btn-check" name="gender" id="female" value="Female"
                                autocomplete="off" <?php if($post->gender == 'Female'): ?> checked <?php endif; ?>>
                            <label class="btn btn-outline-primary fs-14" for="female">Female</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="offer_salary" class="form-label fs-14 text-theme-primary fw-bold"> Base
                                Salary*</label>
                            <input type="number" class="form-control fs-14 h-50px" name="offer_salary"
                                value="<?php echo e($post->offer_salary); ?>" required>
                            <div class="invalid-feedback">
                                Please enter Base Salary.
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="qualification"
                                class="form-label fs-14 text-theme-primary fw-bold">Qualification*</label>
                            
                            <select data-placeholder='Please Select Qualification' class="select2-multiple form-select"
                                name="qualification" required>
                                <option></option>
                                <option value="High School" <?php if($post->qualification == 'High School'): ?> selected <?php endif; ?>>High School
                                </option>
                                <option value="Tertiary" <?php if($post->qualification == 'Tertiary'): ?> selected <?php endif; ?>>Tertiary
                                </option>
                                <option value="Diploma" <?php if($post->qualification == 'Diploma'): ?> selected <?php endif; ?>>Diploma
                                </option>
                                <option value="Under Graduate" <?php if($post->qualification == 'Under Graduate'): ?> selected <?php endif; ?>>Under
                                    Graduate</option>
                                <option value="Post Graduate" <?php if($post->qualification == 'Post Graduate'): ?> selected <?php endif; ?>>Post
                                    Graduate</option>
                                <option value="Masters" <?php if($post->qualification == 'Masters'): ?> selected <?php endif; ?>>Masters
                                </option>
                                <option value="Doctorate" <?php if($post->qualification == 'Doctorate'): ?> selected <?php endif; ?>>Doctorate
                                </option>
                            </select>
                            <div class="invalid-feedback">
                                Please select Qualification.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="location" class="form-label fs-14 text-theme-primary fw-bold">Location*</label>
                            
                            <input id="searchInput" value="<?php echo e($post->location); ?>"
                                class="controls form-control input-login searchInput" name="address" type="text"
                                placeholder="" required autocomplete="off">
                            <input type="hidden" id="latitude" value="" name="lat" />
                            <input type="hidden" id="longitude" value="" name="lng" />
                            <input type="hidden" id="country" value="" name="country" />
                            <input type="hidden" id="city" value="" name="city" />
                            <input type="hidden" id="zip_code" value="" name="zip_code" />
                            <div class="invalid-feedback">
                                Please enter Location.
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label for="expiry_date" class="form-label fs-14 text-theme-primary fw-bold">Job Closing
                                Date*</label>
                            <div class="position-relative">
                                <input type="text" class="form-control fs-14 h-50px datepickerJob readonly"
                                    name="expiry_date" id="expiry_date"
                                    value="<?php echo e(\Carbon\Carbon::parse($post->expiry_date)->isoFormat('DD-MM-YYYY')); ?>"
                                    required>
                                <label class="calender-icon d-block" for="expiry_date"> <i class="far fa-calendar-alt"
                                        aria-hidden="true"></i> </label>
                                <div class="invalid-feedback">
                                    Please select Job Closing Date
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="key_responsibility" class="form-label fs-14 text-theme-primary fw-bold">Key
                                Responsibility*</label>
                            <textarea class="form-control fs-14 h-50px summernote" id="key_responsibility" name="key_responsibility" required><?php echo e(strip_tags($post->key_responsibility)); ?></textarea>
                            <div class="invalid-feedback">
                                Please enter Key Responsibility
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="skill_exp" class="form-label fs-14 text-theme-primary fw-bold">Skills &
                                Experience*</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="skill_exp" required><?php echo e(strip_tags($post->skill_exp)); ?></textarea>
                            <div class="invalid-feedback">
                                Please enter Skills & Experience
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="description" class="form-label fs-14 text-theme-primary fw-bold">Job
                                Description*</label>
                            <textarea class="form-control fs-14 h-50px summernote" name="description" required><?php echo e(strip_tags($post->description)); ?></textarea>
                            <div class="invalid-feedback">
                                Please enter Job Description
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="" class="form-label fs-14 text-theme-primary fw-bold">Job
                                Duties*</label>
                            <select name="skill[]" id="skill" class="editSkillsJob form-select fs-14  h-50px"
                                required multiple>
                                
                                <?php $__currentLoopData = $skill; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->id); ?>"
                                        <?php $__currentLoopData = $post->skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $col): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($row->id == $col->id): ?>
                            selected
                            <?php endif; ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>>
                                        <?php echo e($row->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback">
                                Please enter Job Duties
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="banner" class="form-label fs-14 text-theme-primary fw-bold">Job
                                Banner*</label>
                            <input type="hidden" value="<?php echo e($post->banner); ?>" name="existingBanner">
                            <input type="file" class="form-control fs-14 h-50px" name="banner"
                                accept=".png, .jpg, .jpeg">
                            <div style="font-size: 12px;">please upload 840 x 200 size image</div>
                            <div class="invalid-feedback">
                                Please upload Job Banner
                            </div>
                        </div>
                        <div class="form-group">
                            <img src="<?php echo e(asset('public/storage/' . $post->banner)); ?>" alt="plus-circle"
                                width="150px" style="" height="70px">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="company" class="form-label fs-14 text-theme-primary fw-bold">Company
                                Name</label>
                            <select name="comp_id" id="company" data-placeholder="Please Select Company"
                                class="form-select select2-multiple fs-14 h-50px">
                                <option></option>
                                <?php $__currentLoopData = $recruiter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($row->company->id); ?>"
                                        <?php if($row->company->id == $post->comp_id): ?> selected <?php endif; ?>>
                                        <?php echo e($row->company->name); ?>

                                    </option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide Company Name
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group set-cross-icon">
                            <label for="test_attached" class="form-label fs-14 text-theme-primary fw-bold">Will this Job
                                require testing by the candidate?</label>
                            <select class="form-select select2-multiple fs-14 h-50px" onchange="enableField()"
                                data-placeholder="Please Select Option" name="test_attached" id="test_attached"
                                required>
                                <option></option>
                                <option value="1" <?php if($post->test_attached == '1'): ?> Selected <?php endif; ?>>Yes</option>
                                <option value="0" <?php if($post->test_attached == '0'): ?> Selected <?php endif; ?>>No</option>

                            </select>
                            <div class="invalid-feedback">
                                Please provide Job require testing
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group set-cross-icon" id="testBox">
                            <label for="test_id" class="form-label fs-14 text-theme-primary fw-bold">Attach a
                                test*</label>
                            <select name="test_id" class="select2-multiple form-control fs-14  h-50px">
                                <option selected disabled value="">Select Test</option>
                                <?php if($test_id != null): ?>
                                    <?php $__currentLoopData = $test_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        
                                        <option value="<?php echo e($row['number']); ?>"
                                            <?php if($post->test_id == $row['number']): ?> Selected <?php endif; ?>>
                                            <?php echo e($row['name']); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </select>
                            <div class="invalid-feedback">
                                Please provide Attach a test
                            </div>
                        </div>
                    </div>
                    <div id="createtest" class="hidden">
                        <a id="g" href="">Add a new test</a>
                    </div>
                    <!-- <div class="col-md-6">
                        <div class="form-group set-cross-icon" id="criteria">
                            <label for="criteria" class="form-label fs-14 text-theme-primary fw-bold">Test Passing
                                Criteria</label>
                            <select name="criteria" class="select2-multiple form-control fs-14 h-50px">
                                <option disabled value="">Select Test Passing Criteria</option>
                                <option value="50+" <?php if($post->criteria == '50+'): ?> Selected <?php endif; ?>>50+</option>
                                <option value="60+" <?php if($post->criteria == '60+'): ?> Selected <?php endif; ?>>60+</option>
                                <option value="70+" <?php if($post->criteria == '70+'): ?> Selected <?php endif; ?>>70+</option>
                                <option value="80+" <?php if($post->criteria == '80+'): ?> Selected <?php endif; ?>>80+</option>
                                <option value="90+" <?php if($post->criteria == '90+'): ?> Selected <?php endif; ?>>90+</option>
                            </select>
                            <div class="invalid-feedback">
                                Please Select Test Passing Criteria
                            </div>
                        </div>
                    </div> -->
                    <div class="col-12">
                        <div class="form-group">
                            <button type="submit" class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ">
                                Post A Job </button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('bottom_script'); ?>
    <script>
        if ($('#test_attached').val() == '1') {

            $('#testBox').removeClass('d-none');
            $('#criteria').removeClass('d-none');
        } else {
            $('#testBox').addClass('d-none');
            $('#criteria').addClass('d-none');

        }

        function enableField() {
      // console.log($('#test_attached').val());
      if ($('#test_attached').val() == '1') {

        $('#testBox').removeClass('d-none');
        $('#criteria').removeClass('d-none');
        
        var id = $('#class_id').val();
        var user_id = $('#user_id').val();
     
        
            $.ajax({
                url: '<?php echo e(route('recruiter.get.testCreate')); ?>',
                method: 'GET',
                data: {
                    id: id,  // Parameters to send along with the request
                    user_id: user_id
                },
                success: function(response) {
                    console.log("ll",response.length)
                    if(response.length == 0)
                    {
                        console.log("ssss22");
                        document.getElementById('createtest').classList.remove('hidden');
                        $('#g').html('<a href="<?php echo e(route('recruiter.exam.create')); ?>">Add a new test</a></div>')
                    }
                },
            });
            
      } else {
          
        document.getElementById('createtest').classList.add('hidden');

        $('#testBox').addClass('d-none');
        $('#criteria').addClass('d-none');

      }
    }

        function testFillBox() {
            var id = $('#class_id').val();
            var href = "<?php echo e(route('recruiter.get.testCreate', ':id')); ?>";
            href = href.replace(':id', id);
            console.log(href);
            $.ajax({
                    type: 'GET',
                    url: href,
                    crossDomain: true,
                }).done(function(data) {
                    console.log(data);
                    html = "";
                    html +=
                        "<label for='class_id' class='form-label fs-14 text-theme-primary fw-bold'>Attach a test*</label>";
                    html += "<select name='test_id' onchange='assign_test()'";
                    html += "id='assign_test' class='select2-multiple form-control fs-14  h-50px'>";
                    html += "<option selected disabled value=''>Select Test</option>";
                    $.each(data, function(index, value) {
                        html += "<option value='" + value['number'] + "'>" + value['name'] + "</option>";
                    });
                    html += "</select>";
                    $('#testBox').html('');
                    $('#testBox').html(html);
                })
                .fail(function(error) {
                    var errors = error.responseJSON;
                    console.log(errors);

                });
        }

        $(function() {
            var date = new Date();
            $('.datepickerJob').datepicker({
                startDate: date,
                autoclose: true,
                format: 'dd-mm-yyyy'
            });
        });

        var last_valid_selection = null;

        $('#skill').change(function(event) {

            if ($(this).val().length > 10) {

                $(this).val(last_valid_selection);
            } else {
                last_valid_selection = $(this).val();
            }
        });
    </script>
    <script>
        $.fn.select2.amd.require(['select2/selection/search'], function(Search) {
        var oldRemoveChoice = Search.prototype.searchRemoveChoice;
    
        Search.prototype.searchRemoveChoice = function() {
            oldRemoveChoice.apply(this, arguments);
            this.$search.val('');
        };
    
        $('.editSkillsJob').select2({
            placeholder: "Please Select Skills",
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            maximumSelectionLength: 6
            // allowClear: true
        });
    
    });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('recruterpanel.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\erec\resources\views/recruterpanel/pages/jobs/postAnExisting/create.blade.php ENDPATH**/ ?>