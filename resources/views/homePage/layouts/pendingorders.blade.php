@extends('homepage.layouts.userprofile')
@section('pendingorders')
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h2>Pending Orders</h2>

    <table class="table">
        <tr>
            <th>Product Id</th>
            <th>Price</th>
        </tr>
        @foreach ($pending_orders as $order)
            <tr>
                @php
                    $product_name = App\Models\Products::where('id',$order->product_id)->value('name');
                    
                @endphp
                <td>
                    {{ $product_name }}
                </td>
                <td>
                    {{ $order->total_price }}
                </td>
            </tr>
        @endforeach
    </table>
@endsection
