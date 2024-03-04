
<div>
    <style>
        .pdficon-img {
            object-fit: cover;
            width: 300px;
            height: 148px;
        }
        .media-subtitle {
            height: 40px !important;
            padding-top: 10px;
        }
        .pub_text {
            width: 65%;
        }

        .join_us>.container>div>p {
            color: white !important;
        }
        .join_us>.container>div:first-child{
            text-align: center
        }
        @media (min-width: 1300px) {
            .join_us>.container>div:first-child{
                width: 768px;
            }
        }

        @media only screen and (max-width: 600px){
            .join_us>.container>div:first-child {
                text-align: center;
                padding-top: 2em;
            }
            .join_us .container {
                margin-left: 0em;
                text-align: center;
                display: flex;
                flex-direction: column;
            }
            .joinUs_button {
                margin-top: 19px;
            }
        }

    </style>
<link rel="stylesheet" href="assets/css/homepage-slider.css" />
    <div class="homepage">
        <div class="home">
            <div class="home_slider_container">
                <div class="owl-carousel owl-theme">
                    @forelse ($sliders as $slider)
                        <div class="slide slide-{{$loop->index+1}}" style="background-image: url({{$slider->image}});">
                            <div class="slide-content">
                            </div>
                        </div>
                    @empty
                        <p>No slider found</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- 3 Boxes -->

        <div class="boxes">
            <div class="container">
                <div class="row">
                    @forelse ($sliders as $slider)
                        <div class="col-lg-3 col-sm-6 box_col">
                            <a href="{{$slider->link}}">
                                <div class="box working_hours slide-{{$loop->index+1}}-box">
                                    <div
                                        class="
                                            box_icon
                                            d-flex
                                            flex-column
                                            align-items-start
                                            justify-content-center
                                        "
                                    >
                                    <img
                                        class="box_icon"
                                        src="{{'/'.$slider->icon}}"
                                        alt="{{$slider->name}}"
                                        srcset=""
                                    />
                                    </div>
                                    <div class="box_title">
                                        {{$slider->name}}
                                    </div>
                                    <div class="box_text">
                                        {{$slider->text}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    @empty
                        <p>No data found</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- About -->

        <div class="about">
            <div class="container">
                <div class="row row-lg-eq-height">
                    <!-- About Content -->
                    @if(!empty($sectionOneData))
                    <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                        <div class="about_content">
                            <div class="about_text">
                                <h2 class="pb-3">
                                   {{$sectionOneData->name}}
                                </h2>
                                <p>
                                    {!!$sectionOneData->text!!}
                                </p>
                            </div>

                            <div class="about_button text-center">
                                <a href="{{$sectionOneData->link}}"
                                    >Read about us</a
                                >
                            </div>
                        </div>
                    </div>


                    <!-- About Image -->
                    <div
                        class="
                            col-lg-4 col-md-4 col-sm-4 col-xs-4
                            about_images
                            pl-3
                        "
                    >
                        <div class="about_image1">
                            <img src="{{'/'.$sectionOneData->image}}" alt="{{$sectionOneData->name}}" />
                        </div>

                        <div class="about_image2">
                            <img src="{{'/'.$sectionOneData->icon}}" alt="{{$sectionOneData->name}}" />
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- After about -->

        <div class="cta mt-3">
            <div
                class="cta_background parallax-window"
                data-parallax="scroll"
                style="
                    background-image: linear-gradient(
                        rgba(82, 70, 58, 0.4),
                        rgba(179, 104, 18, 0.6)
                    );
                "
                data-image-src="images/Pullman-Exacavators-Kenya.png"
                data-speed="0.8"
            ></div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        @if ($petition[0]->display)
                            <div class="cta_content text-center">
                                <h2 class="cta_h2 pb-3">
                                    {{ $this->petition[0]->title }}
                                </h2>
                                <p>{{$this->petition[0]->description}}</p>
                                <div class="cta_button pt-1" style="width:150px; margin-left: auto; margin-right: auto;">
                                    <a href="{{$this->petition[0]->petition_url}}">Contact Us</a>
                                </div>
                            </div>
                        @else
                            @if(!is_null($sectionTwoData))
                                <div class="cta_content text-center">
                                    <h2 class="cta_h2 pb-3">{{$sectionTwoData->name}}</h2>
                                    <p>{!!$sectionTwoData->text!!}</p>
                                    <div class="cta_button pt-1">
                                        <a href="{{$sectionTwoData->link}}">Read more</a>
                                    </div>
                                </div>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="container-full press">
            <div class="container">
            <div class="container text-center">
                <h2 class="styled-h2 media_title mb-5">Our Works</h2>
            </div>
                <div class="row latest-row">
                    @forelse($latestPressRelease as $pr)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                        <img class="card-img-top post-img" src='{{"/".$pr->image}}' alt="{{$pr->title}}"
                        width="330" height="247" alt="{{$pr->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$pr->category->name}}
                                </p>
                                <a
                                    href="{{route('frontend.blog.details',['category'=>$pr->category->name,'slug'=>$pr->slug])}}"

                                >
                                    <h6 class="card-title">
                                        {{$pr->titleExcerpt()}}
                                    </h6>
                                    <p class="readmore-sec2">
                                            <a
                                                href="{{route('frontend.blog.details',['category'=>$pr->category->name,'slug'=>$pr->slug])}}"
                                                class="btn btn-primary pt-1"
                                                >Read More
                                            </a>
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- JOIN US SECTION -->
        @if(!empty($sectionThreeData))
        <div>
            <div class="container-full join_us">
                <div class="container">
                    <div>
                      {!!$sectionThreeData->text!!}
                    </div>
                    <div class="joinUs_button mb-5">
                        <a
                            class="text-white pt-3"
                            href="{{ $sectionThreeData->link }}"
                            >Contact Us</a
                        >
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!--MEDIA SECTION  -->
        <div class="media container pt-5 media-pub">
            <div class="container text-center">
                <h2 class="styled-h2 media_title" style="color:black;">Media and Publications</h2>
                <div class="container p-3">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                            @forelse ($publications as $publication)
                            <div class="publication">
                                <div class="pub_img">
                                    <img
                                        class="pdficon-img"
                                        src="{{'/'.$publication->publication_image}}"
                                        alt=""
                                        srcset=""
                                        width="150px"
                                        height="180px"
                                    />
                                </div>
                                <div class="pub_text">
                                      <a href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}">
                                    <h3 class="media-subtitle">
                                      {{$publication->title}}
                                    </h3></a>
                                    <a
                                        href="{{route('frontend.publications.detail',['slug'=>$publication->slug])}}"
                                        class="btn btn-primary pt-1 publication-download-button"
                                    >
                                        Read More
                                    </a>
                                </div>
                            </div>
                            @empty Publications not found @endforelse
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 pub_videos">
                            <iframe
                                src="#"
                            >
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- SUBSCRIBE SECTION -->
        <div class="subscriber">
            <div class="container text-center">
                <div class="row">
                    <div class="col">
                        <div>
                            <h2 class="styled-h2">
                                Subscribe to our newsletter
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
                            <span class="error text-danger">{{
                                $message
                            }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/lib/jquery.min.js') }}"></script>
    <script>
        // check if mobile
        // check for window width changes events
        $(window).resize(function() {
          if ($(window).width() < 992) {
            $('.navbar-nav').removeClass('navbar-nav');
            $('.navbar-nav').addClass('navbar-nav-mobile');
           setMobile();
          } else{
            setDesktop();
          }
        });
        if ($(window).width() < 992) {
          setMobile();
        } else{
          setDesktop();
        }
        function setMobile(){
            console.log('mobile set up');
          $('.date-no').removeClass('date-no');
          $('.date-desktop').hide();
          $('.date-mobile').show();
          /* $('.card-title').hide(); */
          /* $('.fa-map-marker-alt').hide(); */
          /* $('.event-location').hide(); */
          $('.col-sm-4').css('width', 'auto');
          $('.col-sm-8').css('width', 'auto');
        }

        function setDesktop(){
            $('.date-desktop').show();
            $('.date-mobile').hide();
            $('.card-title').show();
            $('.fa-map-marker-alt').show();
            $('.event-location').show();
            $('.col-sm-4').css('width','33.33%');
        }
      </script>
</div>
