<div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.5.1/js/swiper.min.js"></script>
    <link
        rel="stylesheet"
        href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />

    <style>
        .styled-h2 {
            color: #ee1c25;
        }

        .swiper-slide {
            flex-shrink: 0;
            width: 25%;
            height: 100%;
            position: relative;
            transition-property: transform;
        }

        @media only screen and (min-width: 1300px) {
            .about-image img {
                width: 450px;
                height: 250px;
                margin-top: 13px;
            }

            .about.goals {
                padding-top: 0px;
            }

            .about_text p {
                padding-right: 0;
            }
            .about_text > ul {
                columns: 2;
                -webkit-columns: 2;
                -moz-columns: 2;
            }
        }

        @media only screen and (max-width: 768px) {
            .about_text > p {
                /* width: 333px; */
            }
            .join_us > .container > div > p {
                margin-left: -30px;
            }
        }

        @media only screen and (max-width: 480px) {
            .swiper-button-next:after,
            .swiper-button-prev:after {
                font-size: 15px;
            }
            .subscribe .subscribe-btn {
                margin-right: 50px;
            }
        }
        .swiper-button-prev,
        .swiper-button-next {
            color: #3f3d3d;
        }
        @media only screen and (max-width: 480px) {
            .subscribe .subscribe-btn {
                margin-right: 0px;
            }
        }
    </style>

    <div class="super_container">
        <div class="home">
            <div
                class="about-us home_background parallax-window"
                style="
                    background-image: linear-gradient(
                        rgba(0, 0, 0, 0.5),
                        rgba(0, 0, 0, 0.5)
                    );
                "
                data-parallax="scroll"
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
                                            <a
                                                href="{{
                                                    route('homepage.index')
                                                }}"
                                                >Home</a
                                            >
                                        </li>

                                        <li>Who we are1</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="about aboutpage">
            <div class="container mb-3">
                @if(!is_null($whoWeAre))

                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-7 col-md-12">
                        <div class="about-title">
                            <h2>{{$whoWeAre->name}}...</h2>
                        </div>
                        <div class="about_text">{!!$whoWeAre->text!!}</div>
                    </div>

                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="about-image">
                            <img
                                src="{{'/'.$whoWeAre->image}}"
                                alt="{{$whoWeAre->name}}"
                            />
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
        <div class="about-text">
            <div class="container-full">
                <div class="row">
                    <div class="col-lg-12">
                        @if(!is_null($foundingDirector))
                        <div class="text-center font-weight-bolder">
                            {!!$foundingDirector->text!!}
                        </div>
                        @endif
                    </div>
                    <!-- About Content -->
                </div>
            </div>
        </div>
        <div class="about mission">
            <div class="container">
                <div class="row">
                    <!-- About Content -->
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @if(!is_null($ourMission))
                        <div class="about_text">
                            <img
                                src="{{'/'.$ourMission->icon}}"
                                alt="{{$ourMission->name}}"
                                srcset=""
                            />
                            <h2>{{$ourMission->name}}</h2>
                            {!!$ourMission->text!!}
                        </div>
                        @endif
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        @if(!is_null($ourVision))
                        <div class="about_text">
                            <img
                                src="{{'/'.$ourVision->icon}}"
                                alt="{{$ourVision->name}}"
                                srcset=""
                            />
                            <h2>{{$ourVision->name}}</h2>
                            {!!$ourVision->text!!}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- GOALS -->
        <div class="about goals">
            <div class="container-full">
                <div class="container">
                    <div class="row ml-4">
                        <div class="about_text">
                            @if (!is_null($ourGoals))
                            <img
                                src="{{'/'.$ourGoals->icon}}"
                                alt="{{$ourGoals->name}}"
                                srcset=""
                            />
                            <h2>{{$ourGoals->name}}</h2>
                            {!!$ourGoals->text!!} @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PARTNERS SECTION  -->
        <div class="container-full partners pt-2 mb-4">
            <div class="container text-center">
                <h2 class="styled-h2 media_title" style="color: #111112">
                    Clients
                </h2>
            </div>
            <!-- Top content -->
            <div class="swiper-container partners-slider">
                <div class="swiper-wrapper">
                    @if(!is_null($partners)) @forelse ($partners as $partner)
                    <div class="swiper-slide slide">
                        <img
                            src="{{'/'.$partner->image}}"
                            alt="{{$partner->name}}"
                        />
                    </div>
                    @empty
                    <p>No partner found.</p>
                    @endforelse @endif
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </div>

    <!-- SUBSCRIBE SECTION -->
    <div class="subscriber">
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    <div>
                        <h2 class="styled-h2" style="color: #111112">
                            Subscribe to our newsletter1
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <!-- Service -->
                <div class="col-lg-12 col-md-12 service_col text-center">
                    <div class="subscribe">
                        @if(Session::has('message'))
                        <div class="alert alert-success" role="alert">
                            {{Session::get('message')}}
                        </div>
                        @endif
                        <form
                            class="form-horizontal"
                            wire:submit.prevent="mailchimpSubscribe"
                        >
                            <input
                                class="name mr-1"
                                wire:model="name"
                                type="text"
                                placeholder="Name"
                                required
                            />
                            @error('name')
                            <span class="error text-danger">{{
                                $message
                            }}</span>
                            @enderror
                            <input
                                class="mail mr-1"
                                wire:model="email"
                                type="email"
                                placeholder="Email address"
                                required
                            />

                            <button type="submit" class="subscribe-btn">
                                Subscribe
                            </button>
                        </form>
                        @error('email')
                        <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper(".partners-slider", {
            centeredSlides: false,
            autoplay: {
                delay: 2000,
            },
            loop: true,
            slidesPerView: 6,
            spaceBetween: 0,
            breakpoints: {
                0: {
                    slidesPerView: 1,
                },
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 4,
                },
                1024: {
                    slidesPerView: 6,
                },
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
</div>
