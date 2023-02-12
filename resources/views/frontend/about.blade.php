@extends('layouts.frontend')

@section('title', 'HelloCooking - About')


@section('content')
    <section id="about-section-hero">
        <video autoplay loop muted plays-inline id="hero-bg-video">
            <source
                src="{{ asset('imgs/video/stock-footage-autumn-harvest-of-different-vegetables-and-root-crops-background-of-vegetables.webm') }}" />
        </video>
        <div id="wave"></div>
    </section>

    <section id="about-section-wwa">
        <div class="container wwa-container-1">
            <div class="wwa-content">
                <h3 class="wwa-sub-title">Who we are</h3>
                <h1 class="wwa-content-title">Hello Cooking</h1>
                <p>
                    We provide convenience in cooking. We make sure that you enjoy
                    your all-time favorite dishes in a healthier and easiest way. We
                    save you time and money. You don't have to spend time going to the
                    grocery store, buying ingredients, and cooking. We can help you
                    save time and money.
                </p>
            </div>
        </div>
        <div class="container wwa-container2">
            <div class="row">
                <div class="col-lg-6 col-md-12 mb-md-3">
                    <div class="wwa-container2-content">
                        <h2 class="mb-2">Fresh</h2>
                        <p>
                            Hello Cooking ensures every produce are fresh and
                            well-prepared before you consume it. We can provide you with
                            healthy meals. We make sure that you get the best and
                            healthiest food options. You don't have to worry about cooking
                            and preparing your meal because we've got you covered.
                        </p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="wwa-container2-img">
                        <img src="{{ asset('imgs/comments/about (2).jpg') }}" alt="" />
                    </div>
                </div>
            </div>
            <div class="row mb-5">
                <div class="col-lg-6 col-md-12">
                    <div class="wwa-container2-img">
                        <img src="{{ asset('imgs/comments/about (1).jpg') }}" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 order-first order-lg-last order-md-first mb-md-3">
                    <div class="wwa-container2-content ms-lg-auto ms-md-0">
                        <h2 class="mb-2">Tasty</h2>
                        <p>
                            Every dish are personally prepared by the finest chefs in the
                            country to satisfy your taste buds. We provide you with a wide
                            variety of food choices. You can browse through our website
                            and see for yourself the wide variety of food options that we
                            can provide you with.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="team-section">
        <div class="container">
            <h2 class="text-center mb-5">Our Team</h2>
            <div class="members-container d-flex justify-content-center flex-wrap mt-3">
                <div class="members-card mx-5">
                    <div class="members-img-container">
                        <img src="{{ asset('imgs/profile/Untitled design (4).png') }}" alt="" />
                        <div class="members-bg"></div>
                    </div>
                    <p>Ruel Lobo</p>
                    <span>Developer</span>
                </div>
                <div class="members-card mx-5 mt-5 mt-md-0 mt-lg-0 mt-xxl-0">
                    <div class="members-img-container">
                        <img src="{{ asset('imgs/profile/Untitled.png') }}" alt="" />
                        <div class="members-bg"></div>
                    </div>
                    <p>Daisy Cancio</p>
                    <span>Ui/Ux</span>
                </div>
            </div>
        </div>
    </section>
@endsection
