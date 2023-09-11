@extends('homepage.layouts.hometemplate')
@section('allproducts')
    <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <h1 class="fashion_taital"></h1>

                        <div class="fashion_section_2">
                            <div class="row">
                                @foreach ($allProducts as $products)
                                    <div class="col-lg-4 col-sm-4">

                                        <div class="box_main">
                                            <h4 class="shirt_text">{{ $products->name }}</h4>
                                            <p class="price_text">Price <span style="color: #262626;">$
                                                    {{ $products->price }}</span></p>
                                            <div class="tshirt_img"><img
                                                    src="{{ asset('images/products/' . $products->image) }}"></div>
                                            <div class="btn_main">
                                                {{-- all product theke click korle single product page a nebe and category wise product theke
                                                    add to cart click korleo singleproduct page a nia jabe.
                                                    --}}
                                                <div class="buy_bt"><a
                                                        href="{{ route('singleproduct', [$products->id, $products->name]) }}">Buy
                                                        Now</a></div>
                                                <div class="seemore_bt"><a href="#">See More</a></div>
                                            </div>
                                        </div>

                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>
                </div>



            </div>
            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                <i class="fa fa-angle-right"></i>
            </a>
        </div>
    </div>
@endsection
