@extends('layouts.frontend')

@section('title', 'HelloCooking - Home')

@section('content')
    @if (session('message'))
        <div x-data="{ open: true }" x-init='setTimeout(() => open = false, 2000)' x-show="open" x-transition.duration.600ms
            class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container-modified" id="hero-main">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                @foreach ($heroSlides = App\Models\HeroSlide::all() as $key => $heroSlide)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <img src={{ $heroSlide->image }} class="d-block w-100" alt="...">
                    </div>
                @endforeach
            </div>
            <div class="col-lg-5 d-flex flex-column align-items-start justify-content-center" id="hero-left">
                <h1>
                    "A well-stocked pantry is the key to easy and convenient home
                    cooking."
                </h1>
                <p class="d-none d-sm-block">
                    There is nothing quite like home-cooked meals, but sometimes we
                    don't have the time or energy to cook from scratch.
                </p>
                <a id="hero-left-btn" href={{ route('recipes.index') }}>
                    Order Now
                </a>
            </div>
        </div>
    </div>

    <section id="category">
        <div class="container">
            <div class="categories-container">
                @foreach ($categories as $category)
                    @if ($category->category_status == 'show')
                        <a class="category-card"
                            href={{ route('recipes.index', ['category' => $category->category_name]) }}>
                            <div class="card rounded-3 p-0 h-100">
                                <div class="card-body">
                                    <img src="{{ $category->category_img }}" alt="">
                                    <p class="text-center">{{ $category->category_name }}</p>
                                </div>
                            </div>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <section>
        <div class="container">
            <div class="featured-product-container">
                <div class="featured-content">
                    <article class="featured-text">
                        <h3>Looking for some healthy and delicious recipes to try out?</h3>
                        <p>Check out our featured recipes section for some great ideas!</p>
                    </article>
                    <div class="featured-products">
                        @foreach ($features as $feature)
                            <div class='p-2 recipe-category-cards'>
                                <input type="hidden" name="id" value={{ $feature->product->id }}>
                                <article class="card h-100 position-relative">
                                    <div class="card-img-container" data-bs-toggle="modal" data-bs-target="#product-modal"
                                        data-prod_name="{{ $feature->product->product_name }}"
                                        data-prod_img="{{ $feature->product->product_img }}"
                                        data-prod_desc="{{ $feature->product->product_desc }}"
                                        data-prod_price="{{ $feature->product->product_price }}">
                                        <img src={{ asset($feature->product->product_img) }} alt="" />
                                    </div>
                                    <div class="description" data-bs-toggle="modal" data-bs-target="#product-modal"
                                        data-prod_name="{{ $feature->product->product_name }}"
                                        data-prod_img="{{ $feature->product->product_img }}"
                                        data-prod_desc="{{ $feature->product->product_desc }}"
                                        data-prod_price="{{ $feature->product->product_price }}">
                                        <div class="line line1 mb-1">
                                            <h5>{{ $feature->product->product_name }}</h5>
                                        </div>
                                        <div class="hash">
                                            <p>
                                                {{ $feature->product->product_desc }}
                                            </p>
                                        </div>

                                    </div>
                                    <div
                                        class="card-button position-absolute bottom-0 start-0 p-1 px-2 w-100 d-flex justify-content-between">
                                        <p>₱ <span>{{ $feature->product->product_price }}.00</span></p>
                                        <a href="{{ route('home.addtocart', ['id' => $feature->product->id]) }}"
                                            class="btn btn-success btn-sm ms-full"><i class="fa-solid fa-cart-plus"></i></a>
                                    </div>
                                </article>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="reasons">
        <div class="container">
            <h2 class="text-center">Reasons You'll Love Us More</h2>
            <div class="reasons-cont">
                <div class="reasons-card">
                    <div class="reason-card-content">
                        <div class="reason-card-text">
                            <h4>Customer Satisfaction</h4>
                            <p>
                                We provide excellent customer service, offer high-quality
                                products, and continuously improve our operations.
                            </p>
                        </div>
                        <div class="reason-img-container">
                            <img src={{ asset('imgs/icon/stars.png') }} alt="" />
                        </div>
                    </div>
                </div>
                <div class="reasons-card">
                    <div class="reason-card-content">
                        <div class="reason-card-text">
                            <h4>Easy Access</h4>
                            <p>
                                Typically designed for use on mobile devices and are often
                                used for productivity or entertainment purposes.
                            </p>
                        </div>
                        <div class="reason-img-container">
                            <img src={{ asset('imgs/icon/booking.png') }} alt="" />
                        </div>
                    </div>
                </div>
                <div class="reasons-card">
                    <div class="reason-card-content">
                        <div class="reason-card-text">
                            <h4>Healthy</h4>
                            <p>
                                Healthy and pre-portioned food products are food products
                                that are low in calories, fat, and sugar, and high in
                                nutrients.
                            </p>
                        </div>
                        <div class="reason-img-container">
                            <img src={{ asset('imgs/icon/apple.png') }} alt="" />
                        </div>
                    </div>
                </div>
                <div class="reasons-card">
                    <div class="reason-card-content">
                        <div class="reason-card-text">
                            <h4>Fast</h4>
                            <p>
                                Designed to save you time and hassle, so you can get back to
                                your life.
                            </p>
                        </div>
                        <div class="reason-img-container">
                            <img src={{ asset('imgs/icon/clock.png') }} alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="comment-section">
        <div class="container-fluid">
            <h3 class="text-center mb-5">
                Cook it. Love it. Tag it #HelloCookingPics
            </h3>
            <div class="comment-container">
                <div class="card-">
                    <div class="comment-card-img-container">
                        <img src="{{ asset('imgs/comments/peopleeating (1).jpg') }}" alt="" />
                    </div>
                    <div class="card-body">
                        <p class="comment-card-username">Claire_Princess29</p>
                        <p class="comment-card-hashtag">#HelloCookingPics</p>
                        <p class="card-text">
                            I was really happy to find out that I could order healthy
                            food online. It's super easy and convenient, and I love
                            knowing that I'm eating healthy meals.
                        </p>
                    </div>
                </div>
                <div class="card-">
                    <div class="comment-card-img-container">
                        <img src="{{ asset('imgs/comments/peopleeating (16).jpg') }}" alt="" />
                    </div>
                    <div class="card-body">
                        <p class="comment-card-username">twinningsis</p>
                        <p class="comment-card-hashtag">#HelloCookingPics</p>
                        <p class="card-text">
                            I really appreciate being able to order healthy food
                            online. It's so easy and convenient, and I know that I'm
                            getting quality ingredients that are good for me.
                        </p>
                    </div>
                </div>
                <div class="card-">
                    <div class="comment-card-img-container">
                        <img src="{{ asset('imgs/comments/peopleeating (15).jpg') }}" alt="" />
                    </div>
                    <div class="card-body">
                        <p class="comment-card-username">letsgohealthhype5468</p>
                        <p class="comment-card-hashtag">#HelloCookingPics</p>
                        <p class="card-text">
                            I love being able to order pre-portioned healthy food!
                            It's so easy and convenient, and I know that I'm getting
                            exactly what I need to stay healthy.
                        </p>
                    </div>
                </div>
                <div class="card-">
                    <div class="comment-card-img-container">
                        <img src="{{ asset('imgs/comments/comments (2).jpg') }}" alt="" />
                    </div>
                    <div class="card-body">
                        <p class="comment-card-username">Hidalgo Family</p>
                        <p class="comment-card-hashtag">#HelloCookingPics</p>
                        <p class="card-text">
                            Pre-portioned food is easy and convenient to order. It
                            eliminates food waste and is a great way to manage your
                            food budget. I can have my family involve in the kitchen.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <section id="faq">
        <div class="container">
            <h3 class="text-center mb-4">Frequently Ask Questions</h3>
            <div class="faq-accordion">


            </div>
        </div>
    </section>
    <div class="modal fade product-modal" id="product-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="" id="prod-img" alt="">
                </div>
                <div class="modal-body">
                    <h3 id="prod-name" class="mb-2"></h3>
                    <p class="mb-1">Good for 2 persons</p>
                    <p class="mb-1">₱ <span id="prod-price"></span>.00</p>
                    <p id="prod-desc" class="mb-1"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

@endsection


@section('scripts')
    <script>
        const data = [{
                question: "What inspired you to create a company that offers healthy food delivery?",
                answer: "I was inspired to create this company because I was tired of eating unhealthy food. I wanted to make a difference in theworld by providing healthy food to people who want to live a healthy lifestyle."
            },
            {
                question: "What sets your company apart from other food delivery companies?",
                answer: "Our company is unique because we offer healthy food options   are pre-portioned and come with one-of-a-kind recipes."
            },
            {
                question: "What are some of the unique features of your company?",
                answer: "We offer a unique recipe service that is pre-portioned and easy to use. Our customers are always our top priority and we work hard to ensure their satisfaction. Our website is fast and easy to use, making it a great resource for busy families."
            },
            {
                question: "Why do you believe that healthy food delivery is important?",
                answer: "There are a few reasons why healthy food delivery is important. First, it can help people who are unable to cook for themselves or do not have time to prepare meals. Second, it can help people who have dietary restrictions or are on special diets. Third, it can help people who live in areas where there are not many healthy food options."
            },
            {
                question: "How long does it take for the delivery?",
                answer: "The delivery will take at least 5 hours from placing depending on the location you are located and the delivery channel you used."
            },
            {
                question: "How do I know if my order is delivered?",
                answer: "You will receive an email or text confirmation once the order has been delivered!"
            },
            {
                question: "Will I get a refund for a missing, damaged and poor quality items?",
                answer: "If an item is confirmed to be missing, damaged and/or poor quality from your order, you may send us a message on help@hellocooking.com and on our social media accounts."
            },

        ];

        const faqContainers = document.querySelector(".faq-accordion");
        const faq = () => {
            return (faqContainers.innerHTML = data.map((content, index) => {
                return `
<div class="faq-qa">
<input type="checkbox"
name="question${index}"
id="question${index}"
class="question-checkbox"
/>
<label for="question${index}">
${content.question}
<i class="fa-solid fa-circle-chevron-right"></i>
</label>
<div class="faq-answer-container">
<p>${content.answer}</p>
</div>
</div>
`;
            }).join(''));
        };
        faq();

        $(document).ready(function() {
            $(function() {
                $('#product-modal').on('show.bs.modal', function(e) {
                    var button = $(e.relatedTarget);
                    var prod_name = button.data('prod_name');
                    var prod_price = button.data('prod_price');
                    var prod_desc = button.data('prod_desc');
                    var prod_img = button.data('prod_img');
                    var modal = $(this);
                    modal.find('#prod-name').text(prod_name);
                    modal.find('#prod-desc').text(prod_desc);
                    modal.find('#prod-img').attr('src', prod_img);
                    modal.find('#prod-price').text(prod_price);
                });
            });
        });
    </script>
@endsection
