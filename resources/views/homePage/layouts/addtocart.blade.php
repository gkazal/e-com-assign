@extends('homepage.layouts.hometemplate')
@section('singleproduct')
    <h2>add to cart page</h2>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    
    <div class="row justify-content-center">
        <div class="col-10 ">
            <div class="card my-5">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table ">

                            <thead>
                                <tr>
                                    <th>Product image</th>

                                    <th> Product name</th>

                                    <th>Quantity</th>

                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total = 0;
                                @endphp

                                @foreach ($cart_items as $item)
                                    <tr>
                                        {{-- product id dia product name, image get korlam --}}
                                        @php
                                            $product_name = App\Models\Products::where('id', $item->product_id)->value('name');
                                            $product_image = App\Models\Products::where('id', $item->product_id)->value('image');
                                            
                                        @endphp
                                        <td><img src="{{ asset('images/products/' . $product_image) }}" style="height: 80px"
                                                alt=""></td>

                                        <td>{{ $product_name }}</td>

                                        <td>{{ $item->quantity }}</td>

                                        <td>{{ $item->price }}</td>
                                        <td><a href="{{ route('removecartitem', $item->id) }}" class="btn btn-warning"
                                                onclick="return confirm('Are You sure want to delete..?')">Remove</a></td>

                                    </tr>

                                    @php
                                        $total = $total + $item->price;
                                    @endphp
                                @endforeach

                                @if ($total > 0)
                                
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td>Total</td>
                                    <td class="font-weight-bold "> = ${{ $total }}</td>
                                    <td><a href="{{ route('shippingaddress') }}" class="btn btn-success ">Checkout</a></td>
                                                                    
                                </tr>
                                    
                                @endif
                            </tbody>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
