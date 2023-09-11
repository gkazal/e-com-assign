@extends('homepage.layouts.hometemplate')
@section('allcategory')
    <div class="container">

        <h1 class="fashion_taital">{{ $category->category_name }}</h1>

        <div class="fashion_section_2">
            <div class="row">

                {{-- category wise product show korar jonno clientcontroller ar categoryPage ar modde kaj hoice,
                and products data category id dia show hobe..
                 hometemplate ar modde route dia j kaj gulo hocce segulo amra ClientController ar modde kaj korbo..
                --}}
                @foreach ($products as $products)
                    <div class="col-lg-4 col-sm-4">

                        <div class="box_main">
                            <h4 class="shirt_text">{{ $products->name }}</h4>
                            <p class="price_text">Price <span style="color: #262626;">$
                                    {{ $products->price }}</span></p>
                            <div class="tshirt_img"><img src="{{ asset('images/products/' . $products->image) }}"></div>


                            <div class="btn_main">
                              
                                    <div class="buy_bt"><a href="{{ route('singleproduct', [$products->id, $products->name]) }}">Buy Now</a></div>


                                <div class="seemore_bt"><a href="#">See More</a></div>
                            </div>
                        </div>

                    </div>
                @endforeach


            </div>
        </div>

    </div>
@endsection
