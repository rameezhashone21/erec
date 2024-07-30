@extends('layouts.app')

@section('content')
    <main>
        <div class="pt-5"></div>
        <section class="banner bg-img-none pt-lg-5 pt-3 h-auto">
            <div class="container">
                <div class="row row-cols-1">
                    <h3 class="text-center mb-4 fw-500 primary-color fs-1">Anti-Spam Policy</h3>
                    {{-- <h3 class="fw-500 primary-color fs-5">Terms And Conditions</h3> --}}
                    <p style="font-size: 14px;">This statement applies to those E-REC Group Pty Ltd products, websites,
                        documents, and services that display or link to this notice (“Services”). E-REC Group Pty Ltd
                        prohibits the use of the Services in any manner associated with the transmission, distribution or
                        delivery of any unsolicited bulk or unsolicited commercial email (“Spam”). You may not use any
                        Services to send Spam. You also may not deliver Spam or cause Spam to be delivered to any of E-REC
                        Group Pty Ltd’s Services or customers.</p>

                    <p style="font-size: 14px;">In addition, email sent, or caused to be sent, to or through the Services may
                        not:</p>

                    <p style="font-size: 14px;">use or contain invalid or forged headers;</p>
                    <p style="font-size: 14px;">use or contain invalid or non-existent domain names;</p>
                    <p style="font-size: 14px;">employ any technique to otherwise misrepresent, hide or obscure any
                        information in identifying the point of origin or the transmission path;</p>
                    <p style="font-size: 14px;">use other means of deceptive addressing;</p>
                    <p style="font-size: 14px;">use a third-party’s internet domain name, or be relayed from or through a
                        third party’s equipment, without permission of the third party;</p>
                    <p style="font-size: 14px;">contain false or misleading information in the subject line or otherwise
                        contain false or misleading content;</p>
                    <p style="font-size: 14px;">fail to comply with additional technical standards described below; or</p>
                    <p style="font-size: 14px;">otherwise violate the applicable terms of us for the Services.</p>
                    <p style="font-size: 14px;">E-REC Group Pty Ltd does not authorize the harvesting, mining or collection
                        of email addresses or other information from or through the Services. E-REC Group Pty Ltd does not
                        permit or authorize others to use the Services to collect, compile or obtain any information about
                        E-REC Group Pty Ltd’s customers or subscribers, including but not limited to subscriber email
                        addresses, which are E-REC Group Pty Ltd’s confidential and proprietary information. Use of the
                        Services is also subject to the applicable Privacy Policy.</p>

                    <p style="font-size: 14px;">E-REC Group Pty Ltd does not permit or authorize any attempt to use the
                        Services in a manner that could damage, disable, overburden or impair any aspect of any of the
                        Services, or that could interfere with any other party’s use and enjoyment of any Service.</p>

                    <p style="font-size: 14px;">If E-REC Group Pty Ltd believes that unauthorized or improper use is being
                        made of any Service, it may, without notice, take such action as it, in its sole discretion, deems
                        appropriate, including blocking messages from a particular internet domain, mail server or IP
                        address. E-REC Group Pty Ltd may immediately terminate any account on any Service which it
                        determines, in its sole discretion, is transmitting or is otherwise connected with any email that
                        violates this policy.</p>

                    <p style="font-size: 14px;">Nothing in this policy is intended to grant any right to transmit or send
                        email to, or through, the Services. Failure to enforce this policy in every instance does not amount
                        to a waiver of E-REC Group Pty Ltd’s rights.</p>

                    <p style="font-size: 14px;">Unauthorized use of the Services in connection with the transmission of
                        unsolicited email, including the transmission of email in violation of this policy, may result in
                        civil, criminal, or administrative penalties against the sender and those assisting the sender.</p>

                </div>
            </div>
        </section>

    </main>
@endsection
