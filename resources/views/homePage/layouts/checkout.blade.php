@extends('homepage.layouts.hometemplate')
@section('singleproduct')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6 ">
                <div class="card my-5">
                    <div class="card-body">
                        <h2>Your Shipping Address</h2>
                        Phone: {{ $shipping_address->phone }} <br>
                        Address: {{ $shipping_address->address }} <br>
                        PostalCode: {{ $shipping_address->postal_code }}
                    </div>
                </div>
            </div>

            <div class="col-6 ">
                <div class="card my-5">
                    <div class="card-body">
                        <h2>Your Products</h2>
                        <div class="table-responsive">
                            <table class="table ">

                                <thead>
                                    <tr>
                                        <th>Product image</th>

                                        <th> Product name</th>

                                        <th>Quantity</th>

                                        <th>Price</th>
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
                                            <td><img src="{{ asset('images/products/' . $product_image) }}"
                                                    style="height: 80px" alt=""></td>

                                            <td>{{ $product_name }}</td>

                                            <td>{{ $item->quantity }}</td>

                                            <td>{{ $item->price }}</td>

                                        </tr>

                                        @php
                                            $total = $total + $item->price;
                                        @endphp
                                    @endforeach

                                    @if ($total > 0)
                                        <tr>
                                            <td></td>
                                            <td>Total</td>
                                            <td class="font-weight-bold "> = ${{ $total }}</td>

                                        </tr>
                                    @endif
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row my-5 ">
            <form action="{{ route('placeorder') }}" method="POST">
                @csrf

                <input type="submit" value="Place Order" class="btn btn-primary mr-3">
            </form>

            <form action="" method="POST">
                @csrf

                <input type="submit" value="Cancel Order" class="btn btn-danger">
            </form>
        </div>

    </div>
@endsection
