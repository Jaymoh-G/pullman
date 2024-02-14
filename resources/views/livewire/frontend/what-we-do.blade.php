<!-- <link rel="stylesheet" type="text/css" href="styles/renewable energy.css" /> -->
<link rel="stylesheet" type="text/css" href="styles/responsive.css" />
<link rel="stylesheet" type="text/css" href="styles/pages.css" />

<div class="home whatwedo-page">
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
                                <li>What we do</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="energy resilience what-we-do">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 text-center">
                <h2>We are the best at what we do</h2>
                <p class="pb-3">
                    PSA’s mission is to mobilise climate action in Africa,
                    amplify African voices through increased visibility in media
                    and public communications, and leveraging this voice
                    internationally. As part of our work, PSA is helping to
                    build a dedicated group of African civil society
                    organisations that will engage the Africa Renewable Energy
                    Initiative (AREI) to ensure it delivers the proposed 10GW of
                    new and additional renewable energy generation capacity by
                    2020 and mobilise the African potential to generate at least
                    300GW by 2030.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 1 -->
<div class="container-full section2 section1">
    <div class="container">
        <div class="row">
            <div class="climate-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img src="images/climate change.png" alt="" srcset="" />
                <h2>Multilateral climate negotiations</h2>
                <p>
                    Civil society engagement in climate negotiations is
                    important in advancing the needs of the people
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'multilateral-climate-negotiations'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
            <div class="energy-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <i class="fas fa-fire box-icon"></i>
                <h2>Renewable Energy</h2>
                <p>
                    Investing in reliable, affordable, distributed,
                    people-centred, and modern power systems is important in
                    ensuring that Africa makes the most of the benefits
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'renewable-energy'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
        </div>
    </div>
</div>

<!-- SECTION 2  -->
<div class="container-full section2">
    <div class="container">
        <div class="row">
            <div class="climate-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img
                    src="images/sustainable development.png"
                    alt=""
                    srcset=""
                />
                <h2>Sustainable Development</h2>
                <p>
                    Climate change presents one of the most significant risks to
                    Africa’s sustainable development objectives
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'sustainable-development'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
            <div class="energy-box col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <img src="images/climate resilience.png" alt="" srcset="" />
                <h2>Climate Resilience</h2>
                <p>
                    Extreme weather events caused by changing climate conditions
                    are affecting many communities in Africa
                </p>
                <a
                    href="{{route('frontend.whatWeDo.page',['slug'=>'climate-resilience'])}}"
                    class="btn text-white"
                    >Learn More</a
                >
            </div>
        </div>
    </div>
</div>

<!-- About fossil fuel -->
<div class="whatwedo-cta">
    <div class="cta-content">
        <h2>About fossil fuel project</h2>
        <p>
            The main cause of the climate emergency is fossil fuels. This global
            initiative seeks to phase out fossil fuels and support a just
            transition. Phasing out fossil fuel production, and fast-tracking
            progress towards safer and more cost-effective alternatives, will
            require unprecedented international cooperation in three main areas
            – non-proliferation, global disarmament and a peaceful, just
            transition
        </p>
        <p>
            <a
                style="color: white"
                href="/latest/blog/why-the-world-needs-a-fossil-fuel-treaty"
                >Read more</a
            >
        </p>
    </div>
</div>

<!-- GET IN TOUCH SECTION -->
<div class="get-in-touch">
    <div class="container text-center">
        <div class="row">
            <div class="col-lg-9">
                <p>
                    Looking to partner with a think-tank for cutting-edge
                    analysis and solutions
                </p>
            </div>
            <div class="col-lg-3">
                <a href="{{ route('frontend.contactUs') }}">
                    <button class="btn btn-primary pt-1">
                        Get In Touch
                        <i class="pl-1 fas fa-chevron-right text"></i></button
                ></a>
            </div>
        </div>
    </div>
</div>
