

<?php $__env->startSection('content'); ?>
    <style>
        button.swal2-confirm.swal2-styled {
            background: transparent;
            color: var(--primary-color);
            border: 1px solid var(--primary-color);
            border-radius: 4px;
            padding: 10px 30px;
            cursor: pointer;
        }

        button.swal2-confirm.swal2-styled:hover {
            background-color: var(--primary-color);
            color: #fff;
        }

        .swal2-styled.swal2-confirm:focus {
            box-shadow: none;
        }
        
        /* HTML: <div class="loader"></div> */
        .loader_payment {
          width: 50px;
          aspect-ratio: 1;
          border-radius: 50%;
          padding: 6px;
          background:
            conic-gradient(from 135deg at top,currentColor 90deg, #0000 0) 0 calc(50% - 4px)/17px 8.5px,
            radial-gradient(farthest-side at bottom left,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) top right/50%  50% content-box content-box,
            radial-gradient(farthest-side at top        ,#0000 calc(100% - 6px),currentColor calc(100% - 5px) 99%,#0000) bottom   /100% 50% content-box content-box;
          background-repeat: no-repeat;
          animation: l11 1s infinite linear;
        }
        @keyframes  l11{ 
          100%{transform: rotate(1turn)}
        }
        .loader_payment_container {
            background-color: #00000059;
            width: 100%;
            height: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 999999;
      
        }
    </style>
    <!--<div class="loader__formsubmit" style="display: none;">-->
    <!--    <div></div>-->
    <!--</div>-->
    <div id="payment_loader" class='loader_payment_container d-none justify-content-center align-items-center'>
        <div class='loader_payment'>
        
        </div>
    </div>
    <section class="light-bg subcription_banner">
        <div class="container ">
            <div class="row justify-content-center align-items-center ">
                <div class="col-lg-8 text-center">
                    <h1 class="mb-0 fs-48 text-center fw-bold mb-4">
                        Package Payment
                    </h1>
                    <p class="mb-0 ">
                        Please add the package <?php echo e($pkg->name); ?> - <?php if($pkg->time_interval == 'year'): ?>
                            Yearly
                        <?php else: ?>
                            Monthly
                        <?php endif; ?> Package Payment. Our subscription packages offer great value
                        for money.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container ">
            <div class="row justify-content-center mt-minus-115 gy-5">
                <div class="col-lg-8">
                    <div class="card package border-color-blue drop-shadow">
                        <div class="payment__box">
                            <div class="d-flex align-items-center justify-content-between flex-wrap ">
                                <div>
                                    <h2 class="bronze ">
                                        <?php echo e($pkg->name); ?>

                                    </h2>
                                    <?php if($pkg->price == 90): ?>
                                    <h3 class='payment__title d-flex align-items-center'>$99<span
                                            class='ms-2 text-white-hover'>/ <?php echo e($pkg->time_interval); ?></span></h3>
                                    <?php elseif($pkg->price == 272): ?>
                                    <h3 class='payment__title d-flex align-items-center'>$299<span
                                            class='ms-2 text-white-hover'>/ <?php echo e($pkg->time_interval); ?></span></h3>
                                    <?php elseif($pkg->price == 454): ?>
                                    <h3 class='payment__title d-flex align-items-center'>$499<span
                                            class='ms-2 text-white-hover'>/ <?php echo e($pkg->time_interval); ?></span></h3>
                                    <?php endif; ?>

                                    <div style="font-size:14px;font-style:italic">Note: The pricing of our packages is inclusive of 10% (GST) tax.
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-lg-8">
                    <div class="payment_box payment_tabs mb-5">
                        
                        <div>
                            <ul class="nav nav-tabs border-0" id="myTab" role="tablist">
                                <li class="nav-item flex-w50" role="presentation">
                                    <button class="nav-link active w-100" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        <img src="<?php echo e(asset('/images/cards_one.svg')); ?>" alt="" class='img-fluid'>
                                    </button>
                                </li>
                                <li class="nav-item flex-w50 border-right-0 align-self-end" role="presentation">
                                    <button class="nav-link w-100" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <img src="<?php echo e(asset('/images/card_two.svg')); ?>" alt="" class='img-fluid'>
                                    </button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                    aria-labelledby="home-tab">
                                    <div class="py-5 px-4">
                                        <h3 class='fs-2 mb-5'>Payment Detail</h3>
                                        
                                        <form id="payment-form" class="mt-4"
                                            data-stripe-publishable-key="<?php echo e(env('STRIPE_KEY')); ?>" data-cc-on-file="false">
                                            <?php echo csrf_field(); ?>
                                            
                                            <input type="hidden" name="package" value="<?php echo e($pkg->slug); ?>"
                                                id="payment_amount">
                                            <div class="row gy-4">
                                                <input type="hidden" name="stripe_packageId" value="">
                                                
                                                <input type="email" hidden id='emailCard'
                                                    name="<?php echo e(auth()->user()->email); ?>" class='form-control payment-input'
                                                    placeholder='John@mail.com'>
                                                
                                                
                                                <div class="col-12">
                                                    <label for="holder_first_name" class='mb-2'>Name on card</label>
                                                    <div class="position-relative">
                                                        <input type="text" id='holder_first_name'
                                                            name="holder_first_name" class='form-control payment-input'
                                                            placeholder='John Smith'>
                                                        <div class="position-absolute input_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.222"
                                                                height="16.999" viewBox="0 0 15.222 16.999">
                                                                <g id="Icon_feather-user" data-name="Icon feather-user"
                                                                    transform="translate(0.5 0.5)">
                                                                    <path id="Path_1227" data-name="Path 1227"
                                                                        d="M20.222,27.833V26.055A3.555,3.555,0,0,0,16.666,22.5H9.555A3.555,3.555,0,0,0,6,26.055v1.778"
                                                                        transform="translate(-6 -11.833)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                    <path id="Path_1228" data-name="Path 1228"
                                                                        d="M19.111,8.055A3.555,3.555,0,1,1,15.555,4.5,3.555,3.555,0,0,1,19.111,8.055Z"
                                                                        transform="translate(-8.444 -4.5)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="hold_card_num" class='mb-2'>Card number</label>
                                                    <div class="position-relative">
                                                        <input id="hold_card_num" name="hold_card_num" type="tel"
                                                            class="form-control payment-input card-number cc-number"
                                                            autocomplete="cc-number" placeholder="•••• •••• •••• ••••"
                                                            required>
                                                        <div class="position-absolute input_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="23.764"
                                                                height="17.555" viewBox="0 0 23.764 17.555">
                                                                <g id="Icon_feather-credit-card"
                                                                    data-name="Icon feather-credit-card"
                                                                    transform="translate(0.5 0.5)">
                                                                    <path id="Path_1239" data-name="Path 1239"
                                                                        d="M3.569,6H22.194a2.069,2.069,0,0,1,2.069,2.069V20.486a2.069,2.069,0,0,1-2.069,2.069H3.569A2.069,2.069,0,0,1,1.5,20.486V8.069A2.069,2.069,0,0,1,3.569,6Z"
                                                                        transform="translate(-1.5 -6)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                    <path id="Path_1240" data-name="Path 1240"
                                                                        d="M1.5,15H24.264"
                                                                        transform="translate(-1.5 -8.791)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="expiryDate" class='mb-2'>Expiry date</label>
                                                    <div class="position-relative">
                                                        <input id="cc-exp" type="tel" name="stripe_expiryMonth"
                                                            class="payment-input input-lg form-control cc-exp stripe_expiryMonth"
                                                            autocomplete="cc-exp" placeholder="•• / ••" required>
                                                        <div class="position-absolute input_icon">
                                                            <svg id="calendar4" xmlns="http://www.w3.org/2000/svg"
                                                                width="19.543" height="19.543"
                                                                viewBox="0 0 19.543 19.543">
                                                                <path id="Path_1267" data-name="Path 1267"
                                                                    d="M17.1,3.471H2.443A1.221,1.221,0,0,0,1.221,4.693V18.129A1.221,1.221,0,0,0,2.443,19.35H17.1a1.221,1.221,0,0,0,1.221-1.221V4.693A1.221,1.221,0,0,0,17.1,3.471ZM2.443,2.25A2.443,2.443,0,0,0,0,4.693V18.129a2.443,2.443,0,0,0,2.443,2.443H17.1a2.443,2.443,0,0,0,2.443-2.443V4.693A2.443,2.443,0,0,0,17.1,2.25Z"
                                                                    transform="translate(0 -1.029)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                                <path id="Path_1268" data-name="Path 1268"
                                                                    d="M17.1,3.471H2.443A1.221,1.221,0,0,0,1.221,4.693V5.914h17.1V4.693A1.221,1.221,0,0,0,17.1,3.471ZM2.443,2.25A2.443,2.443,0,0,0,0,4.693V7.136H19.543V4.693A2.443,2.443,0,0,0,17.1,2.25Z"
                                                                    transform="translate(0 -1.029)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                                <path id="Path_1269" data-name="Path 1269"
                                                                    d="M7.361,0a.611.611,0,0,1,.611.611v.611a.611.611,0,0,1-1.221,0V.611A.611.611,0,0,1,7.361,0ZM18.354,0a.611.611,0,0,1,.611.611v.611a.611.611,0,1,1-1.221,0V.611A.611.611,0,0,1,18.354,0Z"
                                                                    transform="translate(-3.086 0)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="cvv_card" class='mb-2'>CVV number</label>
                                                    <div class="position-relative">
                                                        <input id="cvv_card" name="stripe_secNo" type="tel"
                                                            class="form-control payment-input input-lg cc-cvc card-cvc"
                                                            autocomplete="off" placeholder="•••" required>
                                                        <div class="position-absolute input_icon">
                                                            <svg id="lock" xmlns="http://www.w3.org/2000/svg"
                                                                width="16.183" height="22.748"
                                                                viewBox="0 0 16.183 22.748">
                                                                <g id="Group_1884" data-name="Group 1884"
                                                                    transform="translate(5.875 11.203)">
                                                                    <g id="Group_1883" data-name="Group 1883">
                                                                        <path id="Path_1234" data-name="Path 1234"
                                                                            d="M10.211,8.509A2.2,2.2,0,0,0,8.6,7.881,2.221,2.221,0,0,0,7.231,11.8v1.566a1.432,1.432,0,1,0,2.863,0V11.8a2.221,2.221,0,0,0,.117-3.291ZM9.5,11.139a.79.79,0,0,0-.294.618v1.609a.543.543,0,1,1-1.086,0V11.757a.79.79,0,0,0-.294-.618h0a1.323,1.323,0,0,1-.495-1.1A1.336,1.336,0,0,1,8.624,8.769h.038a1.333,1.333,0,0,1,.837,2.37Z"
                                                                            transform="translate(-6.441 -7.88)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1886" data-name="Group 1886"
                                                                    transform="translate(0.166)">
                                                                    <g id="Group_1885" data-name="Group 1885">
                                                                        <path id="Path_1235" data-name="Path 1235"
                                                                            d="M16.132,9.009V5.776a5.776,5.776,0,0,0-11.552,0V9a8.1,8.1,0,0,0-2.146,4.028.444.444,0,0,0,.871.178,7.2,7.2,0,1,1,0,2.9.444.444,0,0,0-.871.178,8.086,8.086,0,1,0,13.7-7.282Zm-3.021-1.95a8.081,8.081,0,0,0-5.509,0V5.776a2.755,2.755,0,1,1,5.509,0Zm2.133,1.165A8.1,8.1,0,0,0,14,7.444V5.776a3.643,3.643,0,0,0-7.286,0V7.443a8.059,8.059,0,0,0-1.244.776V5.776a4.887,4.887,0,1,1,9.774,0Z"
                                                                            transform="translate(-2.425)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1888" data-name="Group 1888"
                                                                    transform="translate(13.339 14.217)">
                                                                    <g id="Group_1887" data-name="Group 1887">
                                                                        <path id="Path_1236" data-name="Path 1236"
                                                                            d="M12.45,10.13a.444.444,0,1,0,.13.314A.448.448,0,0,0,12.45,10.13Z"
                                                                            transform="translate(-11.691 -10)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1890" data-name="Group 1890"
                                                                    transform="translate(7.652 8.53)">
                                                                    <g id="Group_1889" data-name="Group 1889">
                                                                        <path id="Path_1237" data-name="Path 1237"
                                                                            d="M14.1,10.718A6.133,6.133,0,0,0,8.135,6a.444.444,0,0,0,0,.889,5.221,5.221,0,0,1,5.1,4.033.444.444,0,0,0,.865-.2Z"
                                                                            transform="translate(-7.691 -6)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1892" data-name="Group 1892"
                                                                    transform="translate(0 14.217)">
                                                                    <g id="Group_1891" data-name="Group 1891">
                                                                        <path id="Path_1238" data-name="Path 1238"
                                                                            d="M2.774,10H2.753a.444.444,0,1,0,0,.889h.021a.444.444,0,0,0,0-.889Z"
                                                                            transform="translate(-2.309 -10)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="position-absolute input_icon icon_2" tabindex="0"
                                                            data-bs-toggle="tooltip"
                                                            title="Your CVV is the three-digit number available on the back side of your debit card.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 13 13">
                                                                <g id="Group_1968" data-name="Group 1968"
                                                                    transform="translate(-1219 -1131)">
                                                                    <circle id="Ellipse_30" data-name="Ellipse 30"
                                                                        cx="6.5" cy="6.5" r="6.5"
                                                                        transform="translate(1219 1131)" fill="#4dc1ba" />
                                                                    <path id="List"
                                                                        d="M.444-6.468H1.3A1.19,1.19,0,0,1,2.627-7.714a1.222,1.222,0,0,1,1.326,1.3c0,1.206-.967,1.426-2.1,1.426H1.56L1.6-3.418h.788l.03-.947c1.4,0,2.4-.6,2.4-2.054a2,2,0,0,0-2.2-2.054A1.969,1.969,0,0,0,.444-6.468ZM2.587-1.992a.6.6,0,0,0-.6-.618.609.609,0,0,0-.618.618.609.609,0,0,0,.618.618A.6.6,0,0,0,2.587-1.992Z"
                                                                        transform="translate(1223 1142.423)"
                                                                        fill="#fff" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center mt-5">
                                                    <button type="button" id="submit-form" class="btn_viewall">
                                                        <?php if($pkg->price == 90): ?>
                                                        Pay $99.00 AUD
                                                        <?php elseif($pkg->price == 272): ?>
                                                        Pay $299.00 AUD
                                                        <?php elseif($pkg->price == 454): ?>
                                                        Pay $499.00 AUD
                                                        <?php endif; ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="12" viewBox="0 0 18 12">
                                                            <g id="Group_688" data-name="Group 688"
                                                                transform="translate(18) rotate(90)">
                                                                <path id="Path_5027" data-name="Path 5027"
                                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                    transform="translate(5)" fill="#fff" />
                                                                <path id="Path_5028" data-name="Path 5028"
                                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                    transform="translate(0 0)" fill="#fff" />
                                                                <path id="Path_5029" data-name="Path 5029"
                                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                    transform="translate(5 0)" fill="#fff" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="py-5 px-4">
                                        <h3 class='fs-2 mb-5'>Payment Details</h3>
                                        <form>
                                            <div class="row gy-4">
                                                <div class="col-12">
                                                    <label for="nameCard" class='mb-2'>Name on card</label>
                                                    <div class="position-relative">
                                                        <input type="text" id='nameCard'
                                                            class='form-control payment-input' placeholder='John Stevens'>
                                                        <div class="position-absolute input_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="15.222"
                                                                height="16.999" viewBox="0 0 15.222 16.999">
                                                                <g id="Icon_feather-user" data-name="Icon feather-user"
                                                                    transform="translate(0.5 0.5)">
                                                                    <path id="Path_1227" data-name="Path 1227"
                                                                        d="M20.222,27.833V26.055A3.555,3.555,0,0,0,16.666,22.5H9.555A3.555,3.555,0,0,0,6,26.055v1.778"
                                                                        transform="translate(-6 -11.833)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                    <path id="Path_1228" data-name="Path 1228"
                                                                        d="M19.111,8.055A3.555,3.555,0,1,1,15.555,4.5,3.555,3.555,0,0,1,19.111,8.055Z"
                                                                        transform="translate(-8.444 -4.5)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label for="cardNumber" class='mb-2'>Card number</label>
                                                    <div class="position-relative">
                                                        <input type="text" id='cardNumber'
                                                            class='form-control payment-input'
                                                            placeholder='ABCD 4567 IJKL 8912'>
                                                        <div class="position-absolute input_icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="23.764"
                                                                height="17.555" viewBox="0 0 23.764 17.555">
                                                                <g id="Icon_feather-credit-card"
                                                                    data-name="Icon feather-credit-card"
                                                                    transform="translate(0.5 0.5)">
                                                                    <path id="Path_1239" data-name="Path 1239"
                                                                        d="M3.569,6H22.194a2.069,2.069,0,0,1,2.069,2.069V20.486a2.069,2.069,0,0,1-2.069,2.069H3.569A2.069,2.069,0,0,1,1.5,20.486V8.069A2.069,2.069,0,0,1,3.569,6Z"
                                                                        transform="translate(-1.5 -6)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                    <path id="Path_1240" data-name="Path 1240"
                                                                        d="M1.5,15H24.264"
                                                                        transform="translate(-1.5 -8.791)" fill="none"
                                                                        stroke="#4dc1ba" stroke-linecap="round"
                                                                        stroke-linejoin="round" stroke-width="1" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="expiryDate" class='mb-2'>Expiry date</label>
                                                    <div class="position-relative">
                                                        <input type="date" id='expiryDate'
                                                            class='form-control payment-input' placeholder='John Stevens'>
                                                        <div class="position-absolute input_icon">
                                                            <svg id="calendar4" xmlns="http://www.w3.org/2000/svg"
                                                                width="19.543" height="19.543"
                                                                viewBox="0 0 19.543 19.543">
                                                                <path id="Path_1267" data-name="Path 1267"
                                                                    d="M17.1,3.471H2.443A1.221,1.221,0,0,0,1.221,4.693V18.129A1.221,1.221,0,0,0,2.443,19.35H17.1a1.221,1.221,0,0,0,1.221-1.221V4.693A1.221,1.221,0,0,0,17.1,3.471ZM2.443,2.25A2.443,2.443,0,0,0,0,4.693V18.129a2.443,2.443,0,0,0,2.443,2.443H17.1a2.443,2.443,0,0,0,2.443-2.443V4.693A2.443,2.443,0,0,0,17.1,2.25Z"
                                                                    transform="translate(0 -1.029)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                                <path id="Path_1268" data-name="Path 1268"
                                                                    d="M17.1,3.471H2.443A1.221,1.221,0,0,0,1.221,4.693V5.914h17.1V4.693A1.221,1.221,0,0,0,17.1,3.471ZM2.443,2.25A2.443,2.443,0,0,0,0,4.693V7.136H19.543V4.693A2.443,2.443,0,0,0,17.1,2.25Z"
                                                                    transform="translate(0 -1.029)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                                <path id="Path_1269" data-name="Path 1269"
                                                                    d="M7.361,0a.611.611,0,0,1,.611.611v.611a.611.611,0,0,1-1.221,0V.611A.611.611,0,0,1,7.361,0ZM18.354,0a.611.611,0,0,1,.611.611v.611a.611.611,0,1,1-1.221,0V.611A.611.611,0,0,1,18.354,0Z"
                                                                    transform="translate(-3.086 0)" fill="#4dc1ba"
                                                                    fill-rule="evenodd" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="CvvNumber" class='mb-2'>CVV number</label>
                                                    <div class="position-relative">
                                                        <input type="text" id='CvvNumber'
                                                            class='form-control payment-input' placeholder='***'>
                                                        <div class="position-absolute input_icon">
                                                            <svg id="lock" xmlns="http://www.w3.org/2000/svg"
                                                                width="16.183" height="22.748"
                                                                viewBox="0 0 16.183 22.748">
                                                                <g id="Group_1884" data-name="Group 1884"
                                                                    transform="translate(5.875 11.203)">
                                                                    <g id="Group_1883" data-name="Group 1883">
                                                                        <path id="Path_1234" data-name="Path 1234"
                                                                            d="M10.211,8.509A2.2,2.2,0,0,0,8.6,7.881,2.221,2.221,0,0,0,7.231,11.8v1.566a1.432,1.432,0,1,0,2.863,0V11.8a2.221,2.221,0,0,0,.117-3.291ZM9.5,11.139a.79.79,0,0,0-.294.618v1.609a.543.543,0,1,1-1.086,0V11.757a.79.79,0,0,0-.294-.618h0a1.323,1.323,0,0,1-.495-1.1A1.336,1.336,0,0,1,8.624,8.769h.038a1.333,1.333,0,0,1,.837,2.37Z"
                                                                            transform="translate(-6.441 -7.88)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1886" data-name="Group 1886"
                                                                    transform="translate(0.166)">
                                                                    <g id="Group_1885" data-name="Group 1885">
                                                                        <path id="Path_1235" data-name="Path 1235"
                                                                            d="M16.132,9.009V5.776a5.776,5.776,0,0,0-11.552,0V9a8.1,8.1,0,0,0-2.146,4.028.444.444,0,0,0,.871.178,7.2,7.2,0,1,1,0,2.9.444.444,0,0,0-.871.178,8.086,8.086,0,1,0,13.7-7.282Zm-3.021-1.95a8.081,8.081,0,0,0-5.509,0V5.776a2.755,2.755,0,1,1,5.509,0Zm2.133,1.165A8.1,8.1,0,0,0,14,7.444V5.776a3.643,3.643,0,0,0-7.286,0V7.443a8.059,8.059,0,0,0-1.244.776V5.776a4.887,4.887,0,1,1,9.774,0Z"
                                                                            transform="translate(-2.425)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1888" data-name="Group 1888"
                                                                    transform="translate(13.339 14.217)">
                                                                    <g id="Group_1887" data-name="Group 1887">
                                                                        <path id="Path_1236" data-name="Path 1236"
                                                                            d="M12.45,10.13a.444.444,0,1,0,.13.314A.448.448,0,0,0,12.45,10.13Z"
                                                                            transform="translate(-11.691 -10)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1890" data-name="Group 1890"
                                                                    transform="translate(7.652 8.53)">
                                                                    <g id="Group_1889" data-name="Group 1889">
                                                                        <path id="Path_1237" data-name="Path 1237"
                                                                            d="M14.1,10.718A6.133,6.133,0,0,0,8.135,6a.444.444,0,0,0,0,.889,5.221,5.221,0,0,1,5.1,4.033.444.444,0,0,0,.865-.2Z"
                                                                            transform="translate(-7.691 -6)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                                <g id="Group_1892" data-name="Group 1892"
                                                                    transform="translate(0 14.217)">
                                                                    <g id="Group_1891" data-name="Group 1891">
                                                                        <path id="Path_1238" data-name="Path 1238"
                                                                            d="M2.774,10H2.753a.444.444,0,1,0,0,.889h.021a.444.444,0,0,0,0-.889Z"
                                                                            transform="translate(-2.309 -10)"
                                                                            fill="#4dc1ba" />
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                        </div>
                                                        <div class="position-absolute input_icon icon_2" tabindex="0"
                                                            data-bs-toggle="tooltip"
                                                            title="Your CVV is the three-digit number available on the back side of your debit card.">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="13"
                                                                height="13" viewBox="0 0 13 13">
                                                                <g id="Group_1968" data-name="Group 1968"
                                                                    transform="translate(-1219 -1131)">
                                                                    <circle id="Ellipse_30" data-name="Ellipse 30"
                                                                        cx="6.5" cy="6.5" r="6.5"
                                                                        transform="translate(1219 1131)" fill="#4dc1ba" />
                                                                    <path id="List"
                                                                        d="M.444-6.468H1.3A1.19,1.19,0,0,1,2.627-7.714a1.222,1.222,0,0,1,1.326,1.3c0,1.206-.967,1.426-2.1,1.426H1.56L1.6-3.418h.788l.03-.947c1.4,0,2.4-.6,2.4-2.054a2,2,0,0,0-2.2-2.054A1.969,1.969,0,0,0,.444-6.468ZM2.587-1.992a.6.6,0,0,0-.6-.618.609.609,0,0,0-.618.618.609.609,0,0,0,.618.618A.6.6,0,0,0,2.587-1.992Z"
                                                                        transform="translate(1223 1142.423)"
                                                                        fill="#fff" />
                                                                </g>
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 text-center mt-5">
                                                    <button type='button' class="btn_viewall">
                                                        <?php if($pkg->price == 90): ?>
                                                        Pay $99.00 AUD
                                                        <?php elseif($pkg->price == 272): ?>
                                                        Pay $299.00 AUD
                                                        <?php elseif($pkg->price == 454): ?>
                                                        Pay $499.00 AUD
                                                        <?php endif; ?>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                            height="12" viewBox="0 0 18 12">
                                                            <g id="Group_688" data-name="Group 688"
                                                                transform="translate(18) rotate(90)">
                                                                <path id="Path_5027" data-name="Path 5027"
                                                                    d="M6,7a.908.908,0,0,1-.7-.3l-5-5A.967.967,0,0,1,.3.3.967.967,0,0,1,1.7.3l5,5a.967.967,0,0,1,0,1.4A.908.908,0,0,1,6,7Z"
                                                                    transform="translate(5)" fill="#fff" />
                                                                <path id="Path_5028" data-name="Path 5028"
                                                                    d="M1,7a.908.908,0,0,1-.7-.3.967.967,0,0,1,0-1.4l5-5A.967.967,0,0,1,6.7.3a.967.967,0,0,1,0,1.4l-5,5A.908.908,0,0,1,1,7Z"
                                                                    transform="translate(0 0)" fill="#fff" />
                                                                <path id="Path_5029" data-name="Path 5029"
                                                                    d="M1,18a.945.945,0,0,1-1-1V1A.945.945,0,0,1,1,0,.945.945,0,0,1,2,1V17A.945.945,0,0,1,1,18Z"
                                                                    transform="translate(5 0)" fill="#fff" />
                                                            </g>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
    <script src="<?php echo e(asset('/js/jquery-3.6.0.min.js')); ?>"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"
        integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw=="
        crossorigin="anonymous"></script>

    <script>
        jQuery(function($) {
            $('.cc-number').payment('formatCardNumber');
            $('.cc-cvc').payment('formatCardCVC');
        });

        $('#cc-exp').keypress(function() {
            var dInput = this.value;
            console.log(dInput);
        });
        $(document).ready(function() {
            $('.cc-exp').mask('00/00', {
                reverse: false
            });
        });
    </script>
    <script>
        var StripeToken = "";
        // var payment_method = document.getElementById('payment_method');
        $(document).ready(function() {
            $("#submit-form").click(function(event) {
                card_name = $("#holder_name").val();
                card_number = $("#hold_card_num").val();
                card_cvv = $("#cvv_card").val();
                mystr = $('.stripe_expiryMonth').val();
                payment_method = $('#payment_method').val();
                var myarr = mystr.split("/");
                var card_exp_month = myarr[0];
                var card_exp_year = myarr[1];
                
                // Start a loader
                var element = document.getElementById('payment_loader');
                element.classList.remove('d-none');
                element.classList.add('d-flex');
                        
                if (card_name == "" || card_number == "" || card_exp_month == "" || card_exp_year == "" ||
                    card_cvv == "") {
                    if (card_name == "") {
                        errorModal("Card Holder Name field is required");
                    }
                    if (card_number == "") {
                        errorModal("Card Holder Number field is required");
                    }
                    if (card_exp_month == "") {
                        errorModal("Expiry Month field is required");
                    }
                    if (card_exp_year == "") {
                        errorModal("Expiry Year field is required");
                    }
                    if (card_cvv == "") {
                        errorModal("Card CVV field is required");
                    }
                    
                    // Stop the loader
                    var element = document.getElementById('payment_loader');
                    element.classList.remove('d-flex');
                    element.classList.add('d-none');

                } else {
                    if (payment_method == 'eway') {
                        var formData = $('#payment-form').serialize();
                        
                        // console.log(formData);
                        $.ajax({
                                type: "POST",
                                url: "<?php echo e(route('subscriptionSuccess')); ?>",
                                data: formData,
                                dataType: "json",
                                encode: true,
                            })
                            .done(function(data) {
                                console.log("111");
                                // Stop the loader
                                var element = document.getElementById('payment_loader');
                                element.classList.remove('d-flex');
                                element.classList.add('d-none');
                
                                var errors = data.responseJSON;
                                if (errors) {
                                    console.log(errors);
                                } else {
                                    if (data.type = 'eway') {
                                        window.location = data.url;
                                    } else {
                                        location.reload();
                                    }
                                    // $("#success-message").html("");
                                    // successModal(data.message);
                                }

                                // window.location.href = "<?php echo e(route('dashboard')); ?>";
                                // window.location.href = "<?php echo e(route('successPayment')); ?>";
                            })
                            .fail(function(error) {
                                console.log("222");
                                // Stop the loader
                                var element = document.getElementById('payment_loader');
                                element.classList.remove('d-flex');
                                element.classList.add('d-none');
                                
                                console.log(error.responseText);

                            });
                    } else {
                        console.log("333");
                        $("#submit-form").prop('disabled', true);
                        $(".load-loader").append("<div class='loader' id='loader'></div> ");
                        $("#submit-form > span").css("display", "none");
                        var $form = $("#payment-form"),
                            inputSelector = ['input[type=email]', 'input[type=password]',
                                'input[type=text]', 'input[type=file]',
                                'textarea'
                            ].join(', '),
                            $inputs = $form.find('.required').find(inputSelector),
                            $errorMessage = $form.find('div.error'),
                            valid = true;
                        $errorMessage.addClass('hide');
                        $('.has-error').removeClass('has-error');
                        $inputs.each(function(i, el) {
                            var $input = $(el);
                            if ($input.val() === '') {
                                $input.parent().addClass('has-error');
                                $errorMessage.removeClass('hide');
                                event.preventDefault();
                            }
                        });
                        if (!$form.data('cc-on-file')) {
                            event.preventDefault();
                            Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                            Stripe.createToken({
                                number: $('#hold_card_num').val(),
                                cvc: $('#cvv_card').val(),
                                exp_month: card_exp_month,
                                exp_year: card_exp_year
                            }, stripeResponseHandler);
                        }


                        function stripeResponseHandler(status, response) {
                            let isChecked = $('#customCheck').is(':checked');
                            if (response.error) {
                                var element = document.getElementById('payment_loader');
                                element.classList.remove('d-flex');
                                element.classList.add('d-none');
                                $(".loader").css("display", "none");
                                $("#submit-form > span").css("display", "block");
                                $("#submit-form").prop('disabled', false);
                                // errorModal(response.error.message);
                                console.log(response.error.code);
                                if (response.error.code == 'incorrect_number') {
                                    errorModal('Card number is invalid...');
                                }
                                if (response.error.code == 'invalid_expiry_month' || response.error.code ==
                                    'invalid_expiry_year') {
                                    errorModal('Expiry date is invalid...');
                                }
                                // if (response.error.code == 'invalid_expiry_year') {
                                //     errorModal('Expiry year is invalid...');
                                // }
                                if (response.error.code == 'invalid_cvc') {
                                    errorModal('CVV number is invalid...');
                                }

                            } else {
                                /* token contains id, last4, and card type */
                                if (1 + 1 == 2) {
                                    // console.log('okaaa');
                                    var token = response['id'];
                                    console.log(token);
                                    StripeToken = token;
                                    console.log(StripeToken);
                                    var $form_new = $("#payment-form");
                                    $form_new.append(
                                        "<input type='hidden' name='stripeToken' id='STRIPETOKEN' value='" +
                                        token + "'/>");

                                    newcardHoldername = $("#holder_first_name").val() + ' ' + $(
                                        "#holder_last_name").val();

                                    // console.log(newcardHoldername);

                                    var formData = {
                                        card_name: newcardHoldername,
                                        card_number: $("#hold_card_num").val(),
                                        card_exp_month: card_exp_month,
                                        card_exp_year: card_exp_year,
                                        card_cvv: $("#cvv_card").val(),
                                        plan_id: "<?php echo e($pkg->id); ?>",
                                        plan_stripe_id: "<?php echo e($pkg->stripe_price_id); ?>",
                                        price: "<?php echo e($pkg->price); ?>",
                                        payment_mode: 'stripe',
                                        email: $("#emailCard").val(),
                                        stripeToken: token,
                                        _token: $("input[name=_token]").val(),
                                    };
                                    // console.log(formData);
                                    $.ajax({
                                            type: "POST",
                                            url: "<?php echo e(route('subscriptionSuccess')); ?>",
                                            data: formData,
                                            dataType: "json",
                                            encode: true,
                                        })
                                        .done(function(data) {
                                            var errors = data.responseJSON;
                                            if (errors) {
                                                console.log(errors);
                                            } else {
                                                $("#success-message").html("");
                                                // $("#emailCard").html("");
                                                $("#holder-name").html("");
                                                $("#holder-number").html("");
                                                $("#holder-exp-month").html("");
                                                $("#holder-exp-year").html("");
                                                $("#holder-cvv").html("");
                                                $(".loader").css("display", "none");
                                                $("#submit-form").prop('disabled', false);
                                                $("#submit-form > span").css("display", "block");
                                                // successModal(data.message);
                                            }

                                            // window.location.href = "<?php echo e(route('dashboard')); ?>";
                                            window.location.href = "<?php echo e(route('successPayment')); ?>";
                                        })
                                        .fail(function(error) {
                                            console.log(error.responseText);
                                            if (error.responseText) {
                                                $(".loader").css("display", "none");
                                                $("#submit-form > span").css("display", "block");
                                                $("#submit-form").prop('disabled', false);
                                                errorModal(
                                                    "Customer Does not exist with this Card Number");
                                            }
                                            var errors = error.responseJSON;
                                            console.log(errors); {
                                                $("#card_number").addClass("has-error");
                                                $("#holder-number").html("");
                                                $("#holder-number").append(
                                                    '<div class="help-block">' + errors.errors
                                                    .card_number + "</div>"
                                                );
                                            }
                                            if (!errors.errors.card_number) {
                                                $("#holder-number").html("");
                                            }

                                            if (errors.errors.card_exp_month) {
                                                $("#card_exp_month").addClass("has-error");
                                                $("#holder-exp-month").html("");
                                                $("#holder-exp-month").append(
                                                    '<div class="help-block">' + errors.errors
                                                    .card_exp_month + "</div>"
                                                );
                                            }
                                            if (!errors.errors.card_exp) {
                                                $("#holder-exp-month").html("");
                                            }
                                            if (errors.errors.card_exp_year) {
                                                $("#card_exp_year").addClass("has-error");
                                                $("#holder-exp-year").html("");
                                                $("#holder-exp-year").append(
                                                    '<div class="help-block">' + errors.errors
                                                    .card_exp_year + "</div>"
                                                );
                                            }
                                            if (!errors.errors.card_exp) {
                                                $("#holder-exp-year").html("");
                                            }
                                            if (errors.errors.card_cvv) {
                                                $("#card_cvv").addClass("has-error");
                                                $("#holder-cvv").html("");
                                                $("#holder-cvv").append(
                                                    '<div class="help-block">' + errors.errors
                                                    .card_cvv + "</div>"
                                                );
                                            }
                                            if (!errors.errors.card_cvv) {
                                                $("#holder-cvv").html("");
                                            }
                                            $("#submit-form > span").css("display", "block");
                                            $("#submit-form").prop('disabled', false);
                                            errorModal(response.error.message);

                                        });
                                    event.preventDefault();

                                } else {
                                    $(".loader").css("display", "none");
                                    $("#submit-form > span").css("display", "block");
                                    $("#submit-form").prop('disabled', false);
                                    // errorModal("Please accept Terms & Conditions...");
                                }
                            }
                        }

                    }

                }
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\Rameez Ali\Pictures\new1\erec\resources\views/subscription/payment.blade.php ENDPATH**/ ?>