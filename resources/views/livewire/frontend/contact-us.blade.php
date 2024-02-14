<div>
    <link rel="stylesheet" type="text/css" href="styles/contact.css" />
    <link
        rel="stylesheet"
        type="text/css"
        href="styles/contact_responsive.css"
    />

    <div class="home">
        <div
            class="home_background parallax-window"
            data-parallax="scroll"
            style="
                background-image: linear-gradient(
                    rgba(0, 0, 0, 0.5),
                    rgba(0, 0, 0, 0.5)
                );
            "
            data-image-src="images/power2.jpg"
            data-speed="0.8"
        ></div>
        <div class="home_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="home_content">
                            <div class="breadcrumbs">
                                <ul>
                                    <li>
                                        <a href="{{ route('homepage.index') }}"
                                            >Home</a
                                        >
                                    </li>
                                    <li>Contact</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact -->

    <div class="contact">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-lg-6">
                    <div class="section_title">
                        <h2>Get in touch</h2>
                    </div>
                    <div class="contact_text"></div>
                    <ul class="contact_about_list">
                        <li>
                            <a href="tel:+254731808070">
                                <div class="contact_about_icon">
                                    <img src="images/phone-call.svg" alt="" />
                                </div>
                                <span>+254 731 808 070</span>
                            </a>
                        </li>
                        <li>
                            <a href="tel:+02004407113">
                                <div class="contact_about_icon">
                                    <img src="images/phone-call.svg" alt="" />
                                </div>
                                <span>+254 02 04 407 113</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@powershiftafrica.org">
                                <div class="contact_about_icon">
                                    <img src="images/envelope.svg" alt="" />
                                </div>
                                <span>info@powershiftafrica.org</span></a
                            >
                        </li>
                        <li>
                            <a
                                href="https://goo.gl/maps/KxsqzZXMhyz7Pqoo6"
                                target="_blank"
                                rel="noopener noreferrer"
                            >
                                <div class="contact_about_icon">
                                    <img src="images/placeholder.svg" alt="" />
                                </div>
                                <span
                                    >No: 5, Waridi Court, Rose Avenue, Kilimani,
                                    Nairobi</span
                                ></a
                            >
                        </li>
                    </ul>
                </div>

                <!-- Contact Form -->
                <div class="col-lg-6 form_col">
                    <div class="contact_form_container">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form
                            action="#"
                            id="contact_form"
                            class="contact_form"
                            wire:submit.prevent="send"
                        >
                            <div class="row">
                                <div class="col-md-6 input_col">
                                    <div class="input_container input_name">
                                        <input
                                            type="text"
                                            class="contact_input"
                                            wire:model="name"
                                            placeholder="Name"
                                            required="required"
                                        />
                                        @error('name')
                                        <span class="error text-danger">{{
                                            $message
                                        }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6 input_col">
                                    <div class="input_container">
                                        <input
                                            type="email"
                                            class="contact_input"
                                            wire:model="email"
                                            placeholder="E-mail"
                                            required="required"
                                        />
                                        @error('email')
                                        <span class="error text-danger">{{
                                            $message
                                        }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="input_container">
                                <input
                                    type="text"
                                    class="contact_input"
                                    wire:model="subject"
                                    placeholder="Subject"
                                    required="required"
                                />
                                @error('subject')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <div class="input_container">
                                <textarea
                                    class="contact_input contact_text_area"
                                    placeholder="Message"
                                    wire:model="message"
                                    required="required"
                                ></textarea>
                                @error('message')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <div class="input_container" wire:ignore>
                                {!! NoCaptcha::renderJs() !!} {!!
                                NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <span class="error text-danger">{{
                                    $message
                                }}</span>
                                @enderror
                            </div>
                            <button class="button contact_button subscribe-btn">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row map_row">
                <div class="col">
                    <div class="contact_map">
                        <div class="map">
                            <div id="google_map" class="google_map">
                                <div class="map_container">
                                    <iframe
                                        src="https://www.google.com/maps/d/embed?mid=11e_dxql1dXQRMOAfw5HXJqGa0f_6Gj1X&ehbc=2E312F"
                                        width="100%"
                                        height="480"
                                    ></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
