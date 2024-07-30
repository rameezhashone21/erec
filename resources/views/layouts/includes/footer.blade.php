<footer class="">
    <div class="footer-top">
        <div class="container">
            <div class="row py-5">
                <div class="col-md-4 pt-5">
                    <div class="company">
                        <a href="{{ route('index') }}"><img class="img-fluid mb-5" src="{{ asset('images/logo.png') }}"
                                alt="" style='height: 70px;'></a>
                        <ul>
                            <li>

                                <a href="https://www.google.com/maps/place/2%2F24+Victory+Parade,+Toronto+NSW+2283,+Australia/@-33.0140679,151.5957149,17z/data=!3m1!4b1!4m5!3m4!1s0x6b7324a485d344a1:0x5c7c86eaba25b73b!8m2!3d-33.0140724!4d151.5979036"
                                    target="_blank" class="d-flex ">
                                    <span>
                                        <i class="fas fa-map-marker-alt"></i>
                                    </span>
                                    <span>
                                        New South Wales
                                        Office - Level 2, 24 Victory Pde, Toronto, NSW 2283</a>

                                </span>
                            </li>
                            <li>
                                <a href="tel:1300 335 388">
                                    <i class="fas fa-phone"></i>
                                    <span>1300 335 388 </span>
                                </a>
                            </li>
                            <li>
                                <a href="mailto: info@mail.e-rec.com.au">
                                    <i class="fas fa-envelope"></i>
                                    <span> info@mail.e-rec.com.au</span>

                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2 pt-5 mt-4">
                    <h4 class="mb-3">Job Categories</h4>
                    <ul id="implode">
                        {{-- <li><a href="">UI/UX Design</a></li>
                        <li><a href="">Web Development</a></li>
                        <li><a href="">Mobile Development</a></li>
                        <li><a href="">IT Consultancy</a></li>
                        <li><a href="">Database Security</a></li>
                        <li><a href="">QA Testing</a></li> --}}
                    </ul>
                </div>
                <div class="col-md-2 pt-5 mt-4">
                    <h4 class="mb-3">Usefull Links</h4>
                    <ul>
                        <li><a href="{{ route('subscription') }}">Pricing</a></li>
                        <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms & Conditions </a></li>
                        <li><a href="{{ route('endUserAgreement') }}">End User Service Agreement</a></li>
                        <li><a href="{{ route('professionalServicesStandard') }}">Professional Services Standard</a>
                        </li>
                        <li><a href="{{ route('antiSpamPolicy') }}">Anti-Spam Policy</a></li>
                        <li><a href="{{ route('cancellationPolicy') }}">Cancellation Policy</a></li>
                        <li><a href="{{ route('copyright') }}">Copyright</a></li>
                        {{-- <li><a href="">FAQ's</a></li> --}}
                    </ul>
                </div>
                @php
                    $socials = \App\Models\SociaLink::first();
                @endphp
                <div class="col-md-4 pt-5 mt-4">
                    <div class="soclial-icons">
                        <h4 class="mb-3">Follow Social Media To Find Out More</h4>
                        <ul>
                            <li><a href="{{ $socials->facebook_link }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a></li>
                            <li><a href="{{ $socials->inst_link }}" target="_blank"><i
                                        class="fab fa-instagram"></i></a>
                            </li>
                            <li><a href="{{ $socials->youtube_link }}" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            </li>
                            <li><a href="{{ $socials->linkedin_link }}" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        </ul>
                    </div>
                    <h4 class="mt-5 mb-3">Subscription For More Information</h4>
                    <form class="d-flex" id="subscription">
                        @csrf
                        <input type="text" name="user" id="subscriptionEmail" placeholder="Your email address…"
                            autocomplete="off" required>
                        <button type="submit" class="btn default-btn">Subscribe now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright py-3">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <p>Copyright © E-REC 2022 - 2030 All Rights Reserved</p>
                </div>
                <div class="col-6 text-end">
                    <ul>
                        <li><a href="{{ route('policy') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms') }}">Terms and Conditions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

@section('bottom_script')
    <script>
        $('#subscription').on('submit', function(e) {
            e.preventDefault();
            var userFormData = $(this).serialize();
            console.log(userFormData);
            $.ajax({
                    type: "POST",
                    url: "{{ route('subscriber') }}",
                    data: userFormData,
                    dataType: "json",
                    encode: true,
                }).done(function(data) {
                    $("#subscriptionEmail").val('');
                    successModal(data.data);
                })
                .fail(function(error) {
                    var errors = error.responseJSON;
                    $("#subscriptionEmail").val('');
                    // errorModal(errors.errors.user);
                    errorModal('You already subscribed with this email try another email');
                });
        });
    </script>
@endsection
