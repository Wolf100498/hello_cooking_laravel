    @extends('layouts.frontend')

    @section('title', 'HelloCooking - Products')

    @section('content')
        @if (session('message'))
            <div x-data="{ open: true }" x-init='setTimeout(() => open = false, 2000)' x-show="open"
                x-transition.duration.600ms class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="container" id="filter">
            <div class="d-flex gap-2">
                <form action="" method="GET" id="search-">
                    <div class="input-group">
                        <input type="text" name="search" id="search-input" class="form-control" placeholder="Search..."
                            value=''>
                        <button class="btn" id="product-search-btn" type="submit">
                            <RiSearch2Line />
                            <span class="btn-name">Search</span>
                        </button>
                    </div>
                </form>
                <form action="" onchange="submit()">
                    <select class="btn" id="product-filter-btn" name="category" <RiFilter2Fill />
                    <option selected>Filter</option>
                    @foreach ($optionsCategory as $category)
                        <option>{{ $category->category_name }}</option>
                    @endforeach
                    </select>
                </form>

            </div>
            <section id="products-section">
                <div class="container">

                    @foreach ($categories as $category)
                        <div class="product-section-container {{ $category }}">

                            <h4 class="mb-3" id="product-section-subheading">{{ $category->category_name }}</h4>

                            <div class="products-container" id="dish-cards">
                                @foreach ($products as $product)
                                    @if ($product->product_cat === $category->category_name)
                                        <div class='p-2 recipe-category-cards'>
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <article class="card h-100 position-relative">
                                                <div class="card-img-container" onclick="alert({{ $product->id }})">
                                                    <img src={{ asset($product->product_img) }} alt="" />
                                                </div>
                                                <div class="description" onclick="alert({{ $product->id }})">
                                                    <div class="line line1 mb-1">
                                                        <h5>{{ $product->product_name }} </h5>
                                                    </div>
                                                    <div class="hash">
                                                        <p>
                                                            {{ $product->product_desc }}
                                                        </p>
                                                    </div>
                                                </div>
                                                <div
                                                    class="card-button position-absolute bottom-0 start-0 p-1 pe-2 w-100 d-flex justify-content-end">
                                                    <a href={{ route('recipes.addtocart', ['id' => $product->id]) }}
                                                        class="btn btn-success btn-sm"><i
                                                            class="fa-solid fa-cart-plus"></i></a>
                                                </div>
                                            </article>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>

    @endsection
