<div class="latest-div">
    <!-- <link rel="stylesheet" type="text/css" href="styles/latest.css" />     -->
    <link rel="stylesheet" type="text/css" href="styles/responsive.css" />
    <style>
        .img-preview {
        }
        .post-img {
            object-fit: cover;
            width: 495px;
            height: 180px;
        }
    </style>
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
                            <!-- <div class="home_title"><span>Power Shift</span> Latest </div> -->
                            <div class="breadcrumbs">
                                <ul>
                                     <li><a href="{{route('homepage.index')}}">Home</a></li>

                                    <li>Latest</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- News -->
    <div class="news">
        <!-- Events Section -->
        <div class="container-full latest-events">
            <div class="container">
                <div class="top-content">
                    <h2>Events</h2>
                    <a href="{{ route('frontend.events') }}">
                        <p>View all</p>
                    </a>
                </div>

                <div class="row latest-row">
                    @forelse($events as $event)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img
                                class="card-img-top post-img"
                                src="{{'/'.$event->image}}"
                                alt="{{$event->title}}"
                            />
                            <p class="power-title">Power Shift Events</p>
                            <div class="container">
                                <div class="row">

                                     <div class="col-lg-3 col-md-3 col-sm-12 card-date pt-3"><span class="date-no">{!! htmlspecialchars_decode($event->date_from->format('d<\s\u\p>S</\s\u\p>')) !!}
                                    </span><p class="card-date pl-2">{{ \Carbon\Carbon::parse($event->date_from)->translatedFormat('M,Y')}} </p></div>
                                    <div class="col-md-9 col-sm-9 col-xs-9">
                                        <h5 class="card-title pt-3 pl-0">
                                            <a
                                                href="{{ route('frontend.event.details', $event->slug) }}"
                                            >
                                                {{ $event->titleExcerpt()}}
                                            </a>
                                        </h5>
                                        <div class="card-body pt-0 pl-0">
                                            <i
                                                class="fas fa-map-marker-alt"
                                            ></i>
                                            <a href="#">
                                                <span class="card-date">
                                                    {{ $event->location }}
                                                </span>
                                            </a>
                                            <div class="">
                                                <a
                                                    href="{{ route('frontend.event.details', $event->slug) }}"
                                                    class="btn btn-primary pt-1"
                                                    >View event</a
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No Upcoming Event</p>
                    @endforelse
                </div>
            </div>
        </div>

        <!-- End Events Section -->

        <!-- News Section -->
        <div class="container-full news-sec">
            <div class="container">
                <div class="top-content">
                    <h2>News</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'power-shift-in-the-news']) }}"> <p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($news as $new)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{'/'.$new->image}}"

                            alt="{{$new->title}}" />
                            <div class="card-body">
                                <p class="card-text-head">
                                    {{$new->category->name}}
                                </p>
                                <a
                                    href="{{route('frontend.blog.details',['category'=>$new->category->name,'slug'=>$new->slug])}}"
                                >
                                    <h5 class="card-title">
                                        {{$new->titleExcerpt()}}
                                    </h5></a
                                >
                                <div>
                                    <p class="card-text">
                                        <!-- {!!$new->body!!} -->
                                    </p>
                                </div>
                                <i class="fas fa-calendar-check"></i>
                                <a href="#">
                                    <span class="card-date"
                                                    >
                                                    {!! htmlspecialchars_decode($new->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                                                </span
                                                >
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
        <!-- End News Section -->

        <!-- Press Release section -->
        <div class="container-full press">
            <div class="container">
                <div class="top-content">
                    <h2>Press Release</h2>
                    <a href="{{ route('frontend.blog.categories',['categorySlug'=>'Press Releases']) }}"><p>View all</p></a>
                </div>
                <div class="row latest-row">
                    @forelse($PressRelease as $pr)
                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                        <div class="card">
                            <img class="card-img-top" src="{{"/".$pr->image}}"
                            alt="{{$pr->title}}" />
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
                                    <p class="card-text">
                                        <!-- {{$pr->excerpt()}} -->
                                    </p>
                                </a>
                                <i class="fas fa-calendar-check"></i>
                            <span class="card-date">
                                {!! htmlspecialchars_decode($pr->created_at->format('d<\s\u\p>S</\s\u\p> F, Y')) !!}
                            </span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No post found.</p>
                    @endforelse
                </div>
            </div>
        </div>
        <!-- End Press Release section -->
    </div>
</div>
