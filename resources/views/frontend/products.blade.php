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
                        <div class="product-section-container">

                            <h4 class="mb-3" id="product-section-subheading">{{ $category->category_name }}</h4>

                            <div class="products-container" id="dish-cards">
                                @foreach ($products as $product)
                                    @if ($product->product_cat === $category->category_name)
                                        <div class='p-2 recipe-category-cards'>
                                            <input type="hidden" name="id" value={{ $product->id }}>
                                            <article class="card h-100 position-relative">
                                                <div class="card-img-container" data-bs-toggle="modal"
                                                    data-bs-target="#product-modal"
                                                    data-prod_name="{{ $product->product_name }}"
                                                    data-prod_img="{{ $product->product_img }}"
                                                    data-prod_desc="{{ $product->product_desc }}"
                                                    data-prod_price="{{ $product->product_price }}">
                                                    <img src={{ asset($product->product_img) }} alt="" />
                                                </div>
                                                <div class="description" data-bs-toggle="modal"
                                                    data-bs-target="#product-modal"
                                                    data-prod_name="{{ $product->product_name }}"
                                                    data-prod_img="{{ $product->product_img }}"
                                                    data-prod_desc="{{ $product->product_desc }}"
                                                    data-prod_price="{{ $product->product_price }}">
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
                                                    class="card-button position-absolute bottom-0 start-0 p-1 px-2 w-100 d-flex justify-content-between">
                                                    <p>₱ <span>{{ $product->product_price }}.00</span></p>
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
    @push('scripts')
        <script>
            $(document).ready(function() {
                $(function() {
                    $('#product-modal').on('show.bs.modal', function(e) {
                        var button = $(e.relatedTarget);
                        var prod_name = button.data("prod_name");
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
    @endpush
