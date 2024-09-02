<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Company</title>
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('imgs/fav-icon.png')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet" />

    <!-- DataTable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/fixedheader/3.2.4/css/fixedHeader.bootstrap5.min.css" />
    <!-- DataTable -->
    <!-- font-awesome/6.1.1 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- font-awesome/6.1.1 -->
    <!-- slick slider -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="<?php echo e(asset('/dashboard/css/bootstrap.min.css')); ?>" />
    <?php echo \Livewire\Livewire::styles(); ?>

    <link rel="stylesheet" href="<?php echo e(asset('/dashboard/css/theme.css')); ?>" />
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <a id="backToTop"><i class="fa-solid fa-arrow-up-long"></i></a>
    
    
    <?php echo $__env->make('companypanel.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    

    <main class="bg-light position-relative">
        <div class="site__div"></div>
        <form id="msform" class="avatar-form" name="change_avatar" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="source" value="api" />
            <div class="cover-edit-box global_cover">
                <div class="cover_picture ">
                    
                    <form id="msform" class="avatar-form" name="change_avatar" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="source" value="api" />
                        <label class="-label" for="file">
                            <i class="fa-solid fa-camera"></i>
                        </label>
                        <input id="file" type="file" onchange="loadFile(event)" class="file-upload"
                            name="banner" />
                        
                        <?php if(isset(auth()->user()->banner)): ?>
                            <img src="<?php echo e(asset('storage/' . auth()->user()->banner)); ?>" alt="profile-img"
                                id="output">
                        <?php else: ?>
                            <img src="<?php echo e(asset('dashboard/images/Recruiter.png')); ?>" id="output" />
                        <?php endif; ?>
                    </form>
                </div>
            </div>
        </form>
        
        <div class="container margin-top-minus-all position-relative">
            <div class="row">
                
                <?php echo $__env->make('companypanel.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                

                
                <?php echo $__env->yieldContent('content', $slot ?? ''); ?>
                
            </div>
        </div>

        <!-- Modal Post job start -->
        <div class="modal fade" id="postJob" tabindex="-1" aria-labelledby="postJobLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header border-0 pb-0">
                        <div>
                            <h5 class="modal-title text_primary fw-600 fs-5" id="postJobLabel">
                                Post A Job
                            </h5>
                        </div>
                    </div>
                    <div class="modal-body">
                        <p class="text-dark fs-14 mb-3 fw-600">How Would You Like To Post Your Job?</p>
                        <?php
                            $post = \App\Models\Posts::where('comp_id', auth()->user()->company->id)
                                ->orderBy('post')
                                ->get();
                        ?>
                        <div class="position-relative mb-4">
                            <input type="checkbox" onchange="disabledDiv()" id="newPost" name="jobPost"
                                class="post-job-radio" checked>
                            <label for="newPost" class="post-job-box p-3 ">
                                <div class="fw-600 mb-2">Start With A New Post</div>
                                <div class="fs-14 text_grey_999">Use our posting tool to create your job.</div>
                            </label>
                        </div>
                        <?php if(count($post) > 0): ?>
                            <div class="position-relative">
                                <input type="checkbox" onchange="enableDiv()" id="previousTemplate" name="jobPost"
                                    class="post-job-radio">
                                <label for="previousTemplate" class="post-job-box p-3 ">
                                    <div class="fw-600 mb-2">Use A Previous Job As A Template</div>
                                    <div class="fs-14 text_grey_999">Copy a past job post and edit as needed.</div>
                                </label>
                            </div>
                        <?php endif; ?>

                        <div style="border: 1px dotted #ececec;" class="my-4"></div>
                        <div class="table-responsive table_height modal-table disable-div" disabled="disabled">
                            <table id="datatableModalNew" class="table table-striped table-payment display nowrap"
                                style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="no-filter"></th>
                                        <th>Your Job</th>
                                        <th>Date posted</th>
                                        <th>Location</th>
                                    </tr>
                                </thead>
                                <tbody id="existingJobTr">

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer" id="postExisting">
                        <a class="btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto"
                            href="<?php echo e(route('company.jobs.create')); ?>">Next</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Post job end -->

        <div id="app2" data-fetch-route="<?php echo e(route('fetch.messages')); ?>"
            data-connected="<?php echo e(route('company.connectedRecruiter')); ?>" data-send="<?php echo e(route('send.messages')); ?>">
            <global-chat :connected="connected" :messages="messages" :user="<?php echo e(auth()->user()); ?>"
                :route_fetch="'<?php echo e(route('fetch.messages')); ?>'"
                :route_fetch_indivisual="'<?php echo e(route('fetch.messages.individual')); ?>'"
                :route_send_messages="'<?php echo e(route('send.messages')); ?>'"
                :route_company_connectedRecruiter="'<?php echo e(route('company.connectedRecruiter')); ?>'"
                v-on:messagesent="addMessage"></global-chat>
        </div>
    </main>

    
    <?php echo $__env->make('companypanel.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    
    
    <script src=" <?php echo e(asset('/dashboard/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    
    
    <!-- select2 -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- select2 -->
    <!-- slick slider -->

    <!-- DataTable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.2.4/js/dataTables.fixedHeader.min.js"></script>
    <!-- DataTable -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js "
        integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg=="
        crossorigin=" anonymous " referrerpolicy="no-referrer "></script>
    <script src="<?php echo e(asset('/dashboard/js/theme.js')); ?>"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput-jquery.min.js"
        integrity="sha512-9WaaZVHSw7oRWH7igzXvUExj6lHGuw6GzMKW7Ix7E+ELt/V14dxz0Pfwfe6eZlWOF5R6yhrSSezaVR7dys6vMg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"
        integrity="sha512-6F1RVfnxCprKJmfulcxxym1Dar5FsT/V2jiEUvABiaEiFWoQ8yHvqRM/Slf0qJKiwin6IDQucjXuolCfCKnaJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(".readonly").on('keydown paste', function(e) {
            e.preventDefault();
        });
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        $(document).ready(function() {
            $('#title__search').on('input', function() {
                var searchText = $(this).val().toLowerCase();
                var $suggestions = $('.title_text_sugg');

                $suggestions.each(function() {
                    var suggestionText = $(this).text().toLowerCase();
                    if (suggestionText.includes(searchText)) {
                        $(this).show(); // Show the matching suggestion
                    } else {
                        $(this).hide(); // Hide non-matching suggestions
                    }
                });

                if (searchText === '') {
                    $('#title_suggetion').css('display', 'block'); // Display when input is empty
                } else {
                    $('#title_suggetion').css('display', 'block'); // Keep it displayed
                }
            });

            $(document).on('click', '.title_text_sugg', function() {
                var suggestionText = $(this).text();
                $('#title__search').val(suggestionText); // Update the input value

                // Delay the hiding of the suggestion div
                setTimeout(function() {
                    $('#title_suggetion').css('display', 'none');
                }, 200);
            });

            $('#title__search').on('blur', function() {
                // Delay the hiding of the suggestion div when the input loses focus
                setTimeout(function() {
                    $('#title_suggetion').css('display', 'none');
                }, 200);
            });
        });
    </script>
    <script>
        // start date range for mapview page

        $('#dateRangePicker').daterangepicker({
            autoUpdateInput: false,
            locale: {
                format: 'DD/MM/YYYY',
                cancelLabel: 'Clear'
            },
        });
        $('#dateRangePicker').on('apply.daterangepicker', function(ev, picker) {
            $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
            // Set the start date to #valid-upto
            $('#valid-upto').val(picker.startDate.format('DD/MM/YYYY'));
            // Set the end date to #valid-upto2
            $('#valid-upto2').val(picker.endDate.format('DD/MM/YYYY'));

            $('#smart-search').trigger('submit');
        });
        $('#dateRangePicker').on('cancel.daterangepicker', function(ev, picker) {
            $('#valid-upto').val('');
            $('#valid-upto2').val('');
            $(this).val('');
            $('#smart-search').trigger('submit');
        });


        // end date range for mapview page

        var btn = $('#backToTop');

        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show');
            } else {
                btn.removeClass('show');
            }
        });

        btn.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({
                scrollTop: 0
            }, '300');
        });
        // start tooltip init
        // var tooltipTriggerList = [].slice.call(
        //     document.querySelectorAll('[data-bs-toggle="tooltip"]')
        // );
        // var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
        //     return new bootstrap.Tooltip(tooltipTriggerEl);
        // });
        $(document).ready(function() {
            $('[data-bs-toggle="tooltip"]').tooltip();
        });
        // end tooltip init

        // start change cover photo
        var loadFile = function(event) {
            var image = document.getElementById("output");
            image.src = URL.createObjectURL(event.target.files[0]);
            event.preventDefault();
            var frmData = new FormData($(".avatar-form")[0]);
            $.ajax({
                    type: "POST",
                    url: "<?php echo e(route('company.profile.update')); ?>",
                    data: frmData,
                    dataType: "json",
                    encode: true,
                    contentType: false,
                    cache: false,
                    processData: false,
                })
                .done(function(data) {
                    successModal("Banner Has Been Successfully Updated...");
                }).fail(function(error) {
                    var errors = error.responseJSON;
                });
        };
        // end change cover photo
    </script>
    <script>
        function existingJobs() {
            // console.log(id);
            $.ajax({
                    url: "<?php echo e(route('fetch.existing.jobs')); ?>",
                    type: "GET",
                    // data: {
                    //     id: id,
                    // },
                    // dataType: "json",
                    // encode: true,
                }).done(function(data) {
                    console.log(data);
                    $('#datatableModalNew').DataTable().destroy();
                    $("#existingJobTr").html('');
                    var html = "";
                    $.each(data, function(index, val) {

                        html += "<tr id='newTr-" + val.id + "'>";
                        // html += "<input type='hidden' name='post_id' id='post_id' value='" + val['id'] +
                        //     "'>";
                        html +=
                            "<td><input type='radio' onclick='checkExistingId(" + val['id'] +
                            ")' name='checkPostId' class='communitymode check-box-table'></td>";
                        html += "<td>" + val['post'] + "</td>";
                        html += "<td>" + val['created_at'].slice(0, 10) + "</td>";
                        html += "<td>" + val['location'] + "</td>";
                        html += "</tr>";
                    });
                    $("#existingJobTr").html(html);
                    $(document).ready(function() {
                        var table = $("#datatableModalNew").DataTable({
                            "responsive": true,
                            "fixedHeader": true,
                            "paging": false,
                            "ordering": false,
                            "info": false,
                            "filter": true,
                            "searching": true,
                        });
                    });
                })
                .fail(function(error) {
                    console.log(error);
                    var errors = error.responseJSON;
                    console.log(errors);

                });
        }
        // check for new or existing job post
        function checkExistingId(id) {
            var html = "";
            html += "<a class = 'btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto'";
            html += "href='<?php echo e(route('company.existing.job', '')); ?>/" + id + "'>Next</a>";
            $('#postExisting').html(html);
            // console.log(html);
        }

        function enableDiv() {
            if ($("#previousTemplate").is(":checked")) {
                $(".modal-table").removeClass("disable-div");
            }
            var previousTemplate = document.getElementById('previousTemplate');

            if (previousTemplate.checked) {
                // alert("previousTemplate.");
                if ($('.communitymode').attr('checked') === true) {
                    // do something
                    var html = "";
                    html += "<a class = 'btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto'";
                    html += "href=''>Next</a>";
                    $('.modal-footer').html('');
                    $('.modal-footer').html(html);
                } else {
                    var html = "";
                    html += "<button disabled class = 'btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto'";
                    html += "href=''>Next</button>";
                    $('.modal-footer').html('');
                    $('.modal-footer').html(html);
                }
            }
        }

        function disabledDiv() {
            if ($("#newPost").is(":checked")) {
                $(".modal-table").addClass("disable-div");
            }
            var newPost = document.getElementById('newPost');

            if (newPost.checked) {
                // alert("newPost");
                var html = "";
                html += "<a class='btn_viewall btn_viewall fw-500 px-4 py-2 d-inline-block ms-auto'";
                html += "href='<?php echo e(route('company.jobs.create')); ?>'>Next</a>";
                $('.modal-footer').html('');
                $('.modal-footer').html(html);
            }
        }
        // end check for new or existing job post

        // start datepicker
        $(function() {
            $('.datepicker').datepicker({
                autoclose: true,
                format: 'yyyy-mm-dd'
            });
        });
        // end datepicker
        // start sidebar collapse functionality
        $('.not_collapsed').click(function() {
            if (!$(this).hasClass('collapsed')) {
                $('.collapse_button_parent').addClass('active__collapse_inner')
            } else {
                $('.collapse_button_parent').removeClass('active__collapse_inner')
            }
        });

        $(document).ready(function() {
            if ($('.collapse li').hasClass('active')) {
                $('.side_bar_menu .not_collapsed').removeClass('collapsed')
                $('.collapse_items .collapse').addClass('show')
                $('.side_bar_menu .collapse_button_parent ').addClass('active__collapse_inner')
            }

        });

        // $(document).ready(function(){
        //     if($('.collapse_button_parent').hasClass('active')){
        //         $('.not_collapsed').removeClass('collapsed')
        //         $('.collapse_items .collapse').addClass('show')
        //         $(this).addClass('active__collapse')
        //     }
        // });
        // end sidebar collapse functionality

        //phone
        var instance = $("[name=country_code]")
        // instance.intlTelInput();
        $(".mobile-number").intlTelInput({
            preferredCountries: ["es"],
            separateDialCode: true,
        });

        $(".mobile-number").on("focus", function() {
            var temp = $(".iti__selected-dial-code").html();
            $(".mobile-number").val(temp);
            // console.log($(".mobile-number").intlTelInput("getSelectedCountryData")) //get counrty code
        });

        var x = $(".mobile-number").intlTelInput("getSelectedCountryData").dialCode;
        console.log(x);
        $(".mobile-number").val("+" + x);
        // $(".mobile-number").intlTelInput({preferredCountries: ["es"],separateDialCode: true,});

        $(".mobile-number-full").keydown(function(e) {
            // console.log(e);
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) ||
                (e.keyCode >= 35 && e.keyCode <= 40)) {
                // console.log("check1");
                return;
            }
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
                // console.log("check2");
            }
        });
        //phone end

        $(document).ready(function() {
            $(".summernote").summernote({
                placeholder: "",
                tabsize: 2,
                height: 150,
            });
        });
    </script>

    <?php echo $__env->yieldContent('bottom_script'); ?>
    <?php echo \Livewire\Livewire::scripts(); ?>

</body>


<script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&libraries=places&language=en">
</script>
<script>
    google.maps.event.addDomListener(window, 'load', function() {
        var places = new google.maps.places.Autocomplete(document.getElementById('searchInput'));
        google.maps.event.addListener(places, 'place_changed', function() {
            var place = places.getPlace();
            var address = place.formatted_address;
            var latitude = place.geometry.location.lat();
            var longitude = place.geometry.location.lng();
            var latlng = new google.maps.LatLng(latitude, longitude);
            var geocoder = geocoder = new google.maps.Geocoder();
            var response = getAddress(latitude, longitude);
            console.log(response);
            geocoder.geocode({
                'latLng': latlng
            }, function(results, status) {
                if (status == google.maps.GeocoderStatus.OK) {
                    if (results[0]) {
                        for (let i = 0; i < results[0].address_components.length; i++) {

                            // if(results[0].address_components[i].types[0] == "administrative_area_level_1")
                            // {
                            //     var state =  results[0].address_components[i].long_name;
                            // }
                            if (results[0].address_components[i].types[0] != "undefine") {
                                if (results[0].address_components[i].types[0] ==
                                    "administrative_area_level_1") {
                                    var state = results[0].address_components[i].long_name;
                                }
                                if (results[0].address_components[i].types[0] == "locality") {
                                    var city = results[0].address_components[i].long_name;

                                } else if (results[0].address_components[i].types[0] ==
                                    "administrative_area_level_2") {
                                    var city = results[0].address_components[i].long_name;
                                }

                                if (results[0].address_components[i].types[0] ==
                                    "postal_code") {

                                    var pin = results[0].address_components[i].long_name;

                                }

                                if (pin == null) {

                                    if (results[0].address_components[i].types[0] ==
                                        "postal_code_suffix") {

                                        var pin = results[0].address_components[i].long_name;

                                    }


                                }
                            } else {
                                errorModal("Please Provide Proper Address with House Number");
                            }
                            // if(results[0].address_components[i].types[0] == "postal_code_suffix")
                            // {
                            //     var pin =  results[0].address_components[i].long_name;
                            // }
                        }
                        // console.log(results)
                        var address = results[0].formatted_address;

                        // var pin = results[0].address_components[results[0].address_components.length - 1].long_name;

                        var country = results[0].address_components[results[0]
                            .address_components.length - 2].long_name;
                        // var country = results[0].address_components[results[0].address_components.length - 3].long_name;
                        // var state = results[0].address_components[results[0].address_components.length - 4].long_name;
                        // var city = results[0].address_components[results[0].address_components.length - 6].long_name;
                        document.getElementById('country').value = country;
                        // console.log(city);
                        // document.getElementById('State').value = state;
                        document.getElementById('city').value = city;
                        // document.getElementById('zipCode').value = pin;
                        if (document.getElementById('zip_code') != undefined) {

                            document.getElementById('zip_code').value = pin;
                        } else {
                            document.getElementById('zip_code').value = null;
                        }
                        document.getElementById('latitude').value = latitude;
                        document.getElementById('longitude').value = longitude;

                        var myaddressvalue = document.getElementById('searchInput').value;
                        //    console.log(myaddressvalue);

                        // var myarr = myaddressvalue.split(",");

                        //    console.log(myarr[0]);

                        // document.getElementById('searchInput').value = myarr[0];

                        //         var geocoder = new google.maps.Geocoder();
                        //         var postalCode = pin;
                        //         geocoder.geocode({ 'address': pin }, function (results, status) {
                        //             console.log(google.maps.GeocoderStatus);
                        //             if (status == google.maps.GeocoderStatus.OK) {
                        //                 var address1 = results[0].formatted_address;
                        //                 var pin1 = results[0].address_components[results[0].address_components.length - 1].long_name;
                        //                 var country1 = results[0].address_components[results[0].address_components.length - 2].long_name;
                        //                 var state1 = results[0].address_components[results[0].address_components.length - 3].long_name;
                        //                 var city1 = results[0].address_components[results[0].address_components.length - 4].long_name;
                        //                 document.getElementById('txtCountry').value = country;
                        //                 document.getElementById('txtState').value = state;
                        //                 document.getElementById('txtCity').value = city;
                        //             }
                        //         });

                    }
                }
            });
        });
    });

    function getAddress(latitude, longitude) {
        return new Promise(function(resolve, reject) {
            var request = new XMLHttpRequest();

            var method = 'GET';
            var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=' + latitude + ',' + longitude +
                '&key=AIzaSyCR1isoqhNQsmPszCB5uW0kE_nCcmTbyw8&sensor=true';
            var async = true;

            request.open(method, url, async);
            request.onreadystatechange = function() {
                if (request.readyState == 4) {
                    if (request.status == 200) {
                        var data = JSON.parse(request.responseText);
                        console.log(data);
                        var address = data.results[0];
                        resolve(address);
                    } else {
                        reject(request.status);
                    }
                }
            };
            request.send();
        });
    };
</script>

<script>
    $.fn.select2.amd.require(['select2/selection/search'], function(Search) {
        var oldRemoveChoice = Search.prototype.searchRemoveChoice;

        Search.prototype.searchRemoveChoice = function() {
            oldRemoveChoice.apply(this, arguments);
            this.$search.val('');
        };

        $(".select2-multiple").select2({
            placeholder: "Select",
            allowClear: "true",
            placeholder: function() {
                $(this).data('placeholder');
            },
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        });

        $("#jobCategory").select2({
            placeholder: "Select",
            allowClear: "true",
            placeholder: function() {
                $(this).data('placeholder');
            },
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        });

        $("#category").select2({
            placeholder: "Select",
            allowClear: "true",
            placeholder: function() {
                $(this).data('placeholder');
            },
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        });

        // $("#jobCategory").select2({
        //   placeholder: "Select",
        //   allowClear: "true",
        //   placeholder: function() {
        //     $(this).data('placeholder');
        //   },
        //   sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
        // });

        $('.editSkills').select2({
            placeholder: "Please Select Skills",
            sorter: data => data.sort((a, b) => a.text.localeCompare(b.text)),
            // allowClear: true
        });


    });


    $("#editABN .editABN").click(function() {
        $("#editABN #saveBtn").click(function() {
            $("#editABN .txt-editor").hide();
            $("#editABN .text").text($("#editABN .txt-editor").val()).show();
            $("#editABN .editABN").show();
            $(this).hide();
            $("#editABN #cancel-btn").hide()
        }).show();
        $("#editABN #cancel-btn").click(function() {
            $("#editABN .editABN").show();
            $("#editABN #saveBtn").hide();
            $(this).hide();
            $("#editABN .txt-editor").val($("#editABN .text").text()).hide();
            $("#editABN .text").show();
        }).show();
        $(this).hide();
        $("#editABN .txt-editor").show().focus();
        $("#editABN .text").hide();
    })

    $("#editIndustry .editIndustry").click(function() {
        $("#editIndustry #saveBtn2").click(function() {
            $("#editIndustry .txt-editor").hide();
            $("#editIndustry .text").text($("#editIndustry .txt-editor").val()).show();
            $("#editIndustry .editIndustry").show();
            $(this).hide();
            $("#editIndustry #cancel-btn-2").hide()
        }).show();
        $("#editIndustry #cancel-btn-2").click(function() {
            $("#editIndustry .editIndustry").show();
            $("#editIndustry #saveBtn2").hide();
            $(this).hide();
            $("#editIndustry .txt-editor").val($("#editIndustry .text").text()).hide();
            $("#editIndustry .text").show();
        }).show();
        $(this).hide();
        $("#editIndustry .txt-editor").show().focus();
        $("#editIndustry .text").hide();
    })

    $(".editCSize").click(function() {
        $("#editCSize .text").hide();
        $("#editCSize .text-editor").show();
        $("#cancel-btn-3").show().click(function() {
            $(this).hide();
            $('#saveBtn3').hide();
            $("#editCSize .text-editor").hide();
            $("#editCSize .text-editor #cSizeTo").val($("#editCSize .text.one").text());
            $("#editCSize .text-editor #cSizeFrom").val($("#editCSize .text.two").text());
            $('.editCSize').show();
            $("#editCSize .text").show();
        });
        $("#editCSize #cSizeTo").focus();
        $("#saveBtn3").show().click(function() {
            $(".editCSize").show();
            $(this).hide();
            $("#editCSize .text").show();
            $("#editCSize .text-editor").hide();
            $('#cancel-btn-3').hide();
            $("#editCSize .text.one").text($("#editCSize .text-editor #cSizeTo").val());
            $("#editCSize .text.two").text($("#editCSize .text-editor #cSizeFrom").val());
        });
        $(this).hide();
    });


    $(".editName").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $(".editphone").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $(".editWeb").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });




    $(".editType").click(function() {
        $("#editType .text").hide();
        $("#editType .txt-editor").show();
        $("#editType .txt-editor").focus();
        $("#saveBtn4").show().click(function() {
            $(".editType").show();
            $(this).hide();
            $('#cancel-btn-4').hide();
            $("#editType .txt-editor").hide();
            $("#editType .text").text($("#editType .txt-editor").val()).show();
        });
        $("#cancel-btn-4").show().click(function() {
            $(this).hide();
            $('#saveBtn4').hide();
            $("#editType .txt-editor").val($("#editType .text").text()).hide();
            $('.editType').show();
            $("#editType .text").show();
        });
        $(this).hide();
    });

    $(".editFounded").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $("#save").click(function() {
        var markup = $(".click2edit").summernote("code");
        $(".click2edit").summernote("destroy");
    });

    $(".editSpecialties").click(function() {
        $("#editSpecialties .text").hide();
        $("#summernote-specialties").css('display', 'block').focus();
        $("#summernote-specialties").val($("#summernote-specialties").val().trim());
        $('#cancel-btn-5').show().click(function() {
            $(this).hide();
            $('#saveBtn5').hide();
            $("#editSpecialties #summernote-specialties").css('display', 'none').val($(
                "#editSpecialties .text").text());
            $('.editSpecialties').show();
            $("#editSpecialties .text").show();
        });
        $('#saveBtn5').show().click(function() {
            $("#editSpecialties #summernote-specialties").css('display', 'none');
            $('.editSpecialties').show();
            $(this).hide();
            $('#cancel-btn-5').hide();
            $("#editSpecialties .text").text($("#editSpecialties #summernote-specialties").val())
                .show();
        });
        $(this).hide();
    });

    $(".editLinkedIn").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $(".editTwitter").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $(".editFacebook").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    $(".editHQ").click(function() {
        $(this).parent().siblings(".text").hide();
        $(this).parent().siblings(".txt-editor").show();
        $(this).parent().siblings(".txt-editor").focus();
    });

    // $(".editSkill").click(function() {
    //     $("#editSkill .text").hide();
    //     $("#editSkill .txt-editor").show().focus();
    //     $("#editSkill #saveBtn9").click(function() {
    //         $("#editSkill .text").show();
    //         $("#editSkill #cancelBtn9").hide();
    //         $("#editSkill .txt-editor").hide();
    //         $(this).hide();
    //         $('.editSkill').show();
    //         const items = document.querySelector('#editSkill .select2-selection__rendered')
    //         const spans = Array.from(items.querySelectorAll('li > span')).map((span) =>
    //             `<li><a>${span.innerText}</a></li>`).join("")
    //         $("#editSkill .tags").html(spans);
    //     }).show();
    //     $("#editSkill #cancelBtn9").click(function() {
    //         $("#editSkill .text").show();
    //         $("#editSkill #saveBtn9").hide();
    //         $("#editSkill .txt-editor").hide();
    //         $(this).hide();
    //         $('.editSkill').show();
    //     }).show();
    //     $(this).hide();
    // });

    // $("#saveBtn9").click(function() {
    //     $(".editSkill").show();
    //     $(this).hide();
    // });

    $(".editAbout").click(function() {
        $("#editAbout .text").hide();
        $("#summernote-about").css('display', 'block').focus();
        $("#summernote-about").val($("#summernote-about").val().trim());
        $('.characters-about').show();
        $('#saveBtn6').show().click(function() {
            $(".editAbout").show();
            $('#cancel-btn-6').hide();
            $(this).hide();
            $("#editAbout .text").text($("#summernote-about").val()).show();
            $("#summernote-about").css('display', 'none');
            $('.characters-about').hide();
        });
        $('#cancel-btn-6').show().click(function() {
            $(this).hide();
            $('#saveBtn6').hide();
            $("#summernote-about").css('display', 'none').val($("#editAbout .text").text());
            $('.editAbout').show();
            $("#editAbout .text").show();
            $('.characters-about').hide();
        });
        $(this).hide();

        var textareaValLen = $('.descriptionTextareaCompany').val().length;
        $('#descriptionCharacters').text(200 - textareaValLen);
        var maxLength = 200;
        $('.descriptionTextareaCompany').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#descriptionCharacters').text(textlen);
        });
    });
    $(".editTagline").click(function() {
        $("#summernote-tagline").val($("#summernote-tagline").val().trim());
        $("#editTagline .text").hide();
        $("#summernote-tagline").css('display', 'block').focus();
        $('.characters-tagline').show();
        $('#saveBtntagline').show().click(function() {
            $(".editTagline").show();
            $('#cancel-btn-tagline').hide();
            $(this).hide();
            $("#editTagline .text").text($("#summernote-tagline").val()).show();
            $("#summernote-tagline").css('display', 'none');
            $('.characters-tagline').hide();
        });
        $('#cancel-btn-tagline').show().click(function() {
            $(this).hide();
            $('#saveBtntagline').hide();
            $("#summernote-tagline").css('display', 'none').val($("#editTagline .text").text());
            $('.editTagline').show();
            $("#editTagline .text").show();
            $('.characters-tagline').hide();
        });
        $(this).hide();

        var textareaValLen = $('.tagline-company-textarea').val().length;
        $('#taglineCharacters').text(100 - textareaValLen);
        var maxLength = 100;
        $('.tagline-company-textarea').keyup(function() {
            var textlen = maxLength - $(this).val().length;
            $('#taglineCharacters').text(textlen);
        });

    });

    $(".editMission").click(function() {
        $("#editMission .text").hide();
        $("#summernote-missionNote").val($("#summernote-missionNote").val().trim());
        $("#summernote-missionNote").css('display', 'block').focus();
        $("#saveBtn7").show().click(function() {
            $("#cancel-btn-7").hide();
            $(".editMission").show();
            $(this).hide();
            $("#editMission .text").text($("#summernote-missionNote").val()).show();
            $("#summernote-missionNote").css('display', 'none');
        });
        $("#cancel-btn-7").show().click(function() {
            $(this).hide();
            $('#saveBtn7').hide();
            $("#summernote-missionNote").css('display', 'none').val($("#editMission .text").text());
            $('.editMission').show();
            $("#editMission .text").show();
        });
        $(this).hide();
    });
    $(".editVision").click(function() {
        $("#editVision .text").hide();;
        $("#summernote-whatWeDo").css('display', 'block').focus();
        $("#summernote-whatWeDo").val($("#summernote-whatWeDo").val().trim());
        $("#saveBtn8").show().click(function() {
            $("#cancel-btn-8").hide();
            $(".editVision").show();
            $(this).hide();
            $("#editVision .text").text($("#summernote-whatWeDo").val()).show();
            $("#summernote-whatWeDo").css('display', 'none');
        });
        $("#cancel-btn-8").show().click(function() {
            $(this).hide();
            $('#saveBtn8').hide();
            $("#summernote-whatWeDo").css('display', 'none').val($("#editVision .text").text());
            $('.editVision').show();
            $("#editVision .text").show();
        });
        $(this).hide();
    });
    $('#resetButton').click(() => {
        $('#search_job input[type=checkbox]').prop('checked', false);
        $('#search_job input[type=text]').val('');

        let url = "<?php echo e(route('company.map')); ?>";
        document.location.href = url;
    })

    function errorModal(error) {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: error,
            footer: "",
        });
    }

    function successModal(message) {
        Swal.fire("Thank You!", message, "success");
    }

    // ChatBox start
    $('#chatBox').click(function() {
        $('#chatBoxList').toggle(200);
        $(".fa-chevron-down, .fa-chevron-up").toggleClass("fa-chevron-down fa-chevron-up");
    })

    $('.chat-top .fa-plus').click(function() {
        $(this).toggleClass('fa-plus fa-minus');
        let messageBottom = $('.message-bottom');
        $(this).closest('.chat-top').siblings('.message-bottom').toggle(200);
        console.log('close')
        // $(this).closest.('.chat-top').siblings('.message-bottom').toggle(200);
        // console.log($(this).closest('.chat-top').siblings('.message-bottom').toggle(200));
        // $(messageBottom).toggle(200);
    });


    function closeMsgBox(id) {
        console.log(id);
        var id = id;
        $('#chatBoxSingle' + id).remove();
    }

    function MinMsgBox(id) {
        var x = $('#message-bottom-' + id).css('display');
        if (x == "none") {
            $("#min-" + id).removeClass('fa-plus');
            $("#min-" + id).addClass('fa-minus');
            $('#message-bottom-' + id).css('display', 'block');
        } else {
            $("#min-" + id).removeClass('fa-minus');
            $("#min-" + id).addClass('fa-plus');
            $('#message-bottom-' + id).css('display', 'none')
        }
    }



    // function openBox(id) {
    //     console.log(id);
    //     $.ajax({
    //             url: "<?php echo e(route('fetch.messages.individual')); ?>",
    //             type: "GET",
    //             data: {
    //                 id: id,
    //             },
    //             // dataType: "json",
    //             // encode: true,
    //         }).done(function(data) {
    //             console.log(data);
    //             var html = "";
    //             html += "<div id='chatBoxSingle-"+id+"' class='col-md-4' >";
    //             html += "<div class='chat__box__single'>";
    //                 html += "<div class='chat-top fs-14 px-2 pt-2'>";
    //                     html += "<div class='d-flex align-items-center'>";
    //                         html += "<div class='me-2'>";
    //                         html += "<img";
    //                         html +=
    //                             " src='https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg'";
    //                         html += " alt=''";
    //                         html += " class='profile_thumb rounded-50'";
    //                         html += "/>";
    //                         html += "</div>";
    //                     html += "<div>";
    //                 html += "<div>"+data['comp_rec']['recruiter']['name']+"</div>";
    //                 html += "<div style='font-size: 12px; color: #999'>Active now</div>";
    //                 html += "</div>";
    //                     html += "<div";
    //                     html += " class='ms-auto d-flex align-items-center'";
    //                     html += " style='gap: 6px'";
    //                     html += " >";
    //                     html += "<i class='fa-solid fa-plus'></i>";
    //                     html += "<i class='fa-solid fa-xmark' id ='"+id+"'></i>";
    //                     html += "</div>";
    //                 html += "</div>";
    //             html += "<div class='message-bottom'>";
    //                 html += "<div class='messages'>";
    //                     html += "<div ";
    //                     html += " class='";
    //                     html += " fs-14 ";
    //                     html += " day ";
    //                     html += " d-flex ";
    //                     html += " align-items-center ";
    //                     html += " justify-content-center ";
    //                     html += " align-items-center ";
    //                     html += " my-2 ";
    //                     html += "'";
    //                     html += ">";
    //                     html += "<div class='day_border'></div>";
    //                     html += "<div class='px-2'>THURSDAY</div>";
    //                     html += "<div class='day_border'></div>";
    //                     html += "</div>";
    //                 $.each(data['message'], function(index, val) {
    //                     html += "<div class='d-flex align-items-start mb-2 px-2'>";

    //                     html += "<div class='me-2'>";
    //                     html += "<img ";
    //                     html +=
    //                         "src='https://check.hostingladz.com/webapp/Erec/storage/candidateAvatar/img/2022-11-25_.113.85714285714_.jpg'";
    //                     html += " alt=''";
    //                     html += "class='profile_thumb rounded-50'";
    //                     html += "/>";
    //                     html += "</div>";

    //                     html += "<div>";
    //                     html += "<div ";
    //                     html += "class='d-flex fs-14 align-items-center mb-2'";
    //                     html += "style='gap: 8px'";
    //                     html += ">";
    //                     html += "<div>"+val['user']['company']['name']+":</div>";
    //                     html += "<div style='font-size: 12px; color: #999'>12:19 PM</div>";
    //                     html += "</div>";
    //                     html += "<div style='font-size: 12px; color: #999'>";
    //                     html += val['message'];
    //                     html += "</div>";
    //                     html += "</div>";
    //                     html += "</div>";
    //                 });
    //                 html += "<div class='border-top'>";
    //                 html += "<div class='message_send d-flex px-2 mt-3' style='gap: 6px'>";
    //                     html += "<div class='flex-grow-1'>";
    //                     html += "<textarea";
    //                     html += " placeholder='Write message...'";
    //                     html += " id='btn-input'";
    //                     html += " v-model='newMessage'";
    //                     html += " @keyup.enter='sendMessage'";
    //                     html += " ></textarea>";
    //                     html += " </div>";
    //                 html += " <div>";
    //                 html += " <button";
    //                 html += " type='button'";
    //                 html += " class='send-message'";
    //                 html += " @click='sendMessage'";
    //                 html += " >";
    //                 html += " <i class='fa-solid fa-paper-plane' id='btn-chat'></i>";
    //                 html += " </button>";
    //                 html += " </div>";
    //                 html += " </div>";
    //                 html += " </div>";
    //             html += " </div>";
    //             html += "</div>";
    //             // html += "</div>";
    //             // html += "</div>";
    //             // html += "</div>";
    //             $("#message-box").append(html);

    //         })
    //         .fail(function(error) {
    //             console.log(error);
    //             var errors = error.responseJSON;
    //             console.log(errors);

    //         });
    // }
    $('#chatBoxPerson-0').click(function() {
        $('#chatBoxSingle-0').removeClass('d-none');
    })
    $('#chatBoxPerson-1').click(function() {
        $('#chatBoxSingle-1').removeClass('d-none');
    })
    // ChatBox end
</script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
<script>
    function fitTextTitle(id) {
        var value = $("#para-" + id).html();
        console.log(value);
        $("#search-title").val(value);
    }
    const searchLogic = function() {

        $("#search-title-search").append("");
        // $("#search-title-search").addClass('d-none');

        formData = {
            value: $(this).val(),
        }
        // console.log(formData);
        $.ajax({
            type: "GET",
            url: "<?php echo e(route('search.Keyword')); ?>",
            data: {
                value: $('#search-title').val(),
                for: $('#for').val(),
            },
            dataType: "json",
            encode: true,
        }).done(function(data) {
            $("#search-title-search").removeClass('d-none');
            $("#search-title-search").html('');
            html = '';
            // if (data['can'] == null && data['rec'] == null && data['comp'] == null && data['job'] == null) {
            //     $("#search-title-search").html("No Record Found");
            // } else {
            if (data['can'].length == 0 && data['rec'].length == 0 && data['comp'].length == 0 && data[
                    'job'].length == 0) {
                // $("#search-title-search").html("No Record Found");
                if ($("#for").val() == 'post') {
                    if (data['job'].length == 0) {
                        $("#search-title-search").html("No Record Found");
                    }
                } else if ($("#for").val() == 'users') {
                    if (data['can'].length == 0 && data['rec'].length == 0 && data['comp'].length == 0) {
                        $("#search-title-search").html("No Record Found");
                    }
                }
            } else {
                // console.log("check");
                if (data['can'] != null) {
                    $.each(data['can'], function(index, value) {
                        html +=
                            "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='<?php echo e(asset('storage/')); ?>/" +
                            value['user']['avatar'] +
                            "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='<?php echo e(route('candidate.detail', '')); ?>/" +
                            value['slug'] + "' id='para-" +
                            value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")''>" +
                            value['first_name'] + "</a></div>";
                    });
                }
                if (data['rec'] != null) {
                    $.each(data['rec'], function(index, value) {
                        html +=
                            "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='<?php echo e(asset('storage/')); ?>/" +
                            value['avatar'] +
                            "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='<?php echo e(route('recruiter.detail', '')); ?>/" +
                            value['slug'] + "' id='para-" +
                            value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")''>" +
                            value['name'] + "</a></div>";
                    });
                }
                if (data['comp'] != null) {
                    $.each(data['comp'], function(index, value) {
                        html +=
                            "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='<?php echo e(asset('storage/')); ?>/" +
                            value['logo'] +
                            "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='<?php echo e(route('job.details', '')); ?>/" +
                            value['slug'] + "' id='para-" +
                            value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")''>" +
                            value['name'] + "</a></div>";
                    });
                }
                if (data['job'] != null) {
                    $.each(data['job'], function(index, value) {
                        html +=
                            "<div class='d-flex align-items-center border-bottom py-2' style='gap:0 6px;'> <img src='<?php echo e(asset('storage/')); ?>/" +
                            value['banner'] +
                            "' style='width: 40px; height: 40px; border-raduis: 50%; object-fit: cover;' /><a href='<?php echo e(route('job.listing.details', '')); ?>/" +
                            value['slug'] + "' id='para-" +
                            value['id'] + "' onclick='fitTextTitle(" + value['id'] +
                            ")''>" +
                            value['post'] + "</a></div>";
                    });
                }
                if ($("#search-title").val().length == 0) {
                    $("#search-title-search").addClass('d-none');
                }
                $("#search-title-search").append(html);
            }
            this.value = "";
        });
    }
    const getInterval = setInterval(() => {
        if ($('#search-title').length) {
            $('#search-title').unbind("keydown", searchLogic);
            $('#search-title').on("keydown", searchLogic);
        }
    }, 1000);

    $(function() {
        $("#showDiv").on("click", function(a) {
            // $("#search-title-search").addClass("d-none");
            a.stopPropagation()
        });
        $(document).on("click", function(a) {
            if ($(a.target).is("#search-title-search") === false) {
                $("#search-title-search").addClass("d-none");
            }
        });
    });
</script>

</html>
<?php /**PATH C:\Users\Rameez Ali\Pictures\new1\erec\resources\views/companypanel/layout/app.blade.php ENDPATH**/ ?>