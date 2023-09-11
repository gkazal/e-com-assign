@extends('homepage.layouts.hometemplate')
@section('singleproduct')

<div class="container">

    <div class="fashion_section_2">
        <div class="row">
          

            
                <div class="col-lg-4 col-sm-4">

                    <div class="box_main">
                        <h4 class="shirt_text">{{ $products->name }}</h4>
                        <p class="price_text">Price <span style="color: #262626;">$
                                {{ $products->price }}</span></p>
                        <div class="tshirt_img"><img src="{{ asset('images/products/' . $products->image) }}"></div>


                        {{-- single product theke add to cart korle addproducttocart a add hobe --}}
                        <div class="btn_main">
                            <form action="{{ route('addproducttocart') }}" method="POST">
                                @csrf
                                <input type="hidden" value="{{ $products->id }}" name="product_id">
                                <input type="hidden" value="{{ $products->price }}" name="price">
                                <input type="hidden" value="1" name="quantity">
                            
                                <div class="form-group">
                                    <label for="product_quantity">Quantity</label>
                                    <input type="number" value="1" min="1" name="product_quantity" id=""><br>
                                </div>
                            
                                <input class="btn btn-warning" type="submit" value="Add To Cart">
                            </form>
                        </div>
                    </div>

                </div>


        </div>
    </div>

</div>


@endsection