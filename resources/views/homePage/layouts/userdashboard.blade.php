@extends('homepage.layouts.userprofile')
@section('pendingorders')


<div class="container">
    <div class="row ">
        <h2>Approved Orders </h2>

        <table class="table">
            <tr>
                <th>Product Id</th>
                <th>Image</th>

                <th>status</th>
            </tr>
            @foreach ($approved_orders as $order)
                <tr>
                    @php
                        $product_name = App\Models\Products::where('id', $order->product_id)->value('name');
                        $product_image = App\Models\Products::where('id', $order->product_id)->value('image');
                        
                    @endphp
                    <td>
                        {{ $product_name }}
                    </td>
                    
                        <td><img src="{{ asset('images/products/' . $product_image) }}" style="height: 80px"
                            alt=""></td>

                    
                    <td>
                        {{ $order->status }}
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>

@endsection