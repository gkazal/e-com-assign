@extends('home');
@section('orders')
    <h2>pending orders</h2>
    <div class="container">
        <div class="card ">

            <div class="table-responsive text-nowrap">
                <table class="table">

                    <thead class="table-light">
                        <tr>
                            <th>Serial</th>
                            <th>User Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Product Name</th>

                            <th>Quantity</th>
                            <th>Total Will Pay</th>
                            <th>Status</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody class="table-border">

                        <?php $sl = 1; ?>
                        @foreach ($pending_orders as $order)
                            <tr>
                                <td>{{ $sl++ }}</td>
                                <td>{{ $order->userid }}</td>
                                <td>{{ $order->shipping_phoneNumber }}</td>
                                <td>
                                    <ul>
                                        <li>
                                            Address: {{ $order->shipping_address }}
                                        </li>
                                        <li>
                                            PostalCode: {{ $order->shipping_postalcode }}
                                        </li>
                                    </ul>



                                </td>
                                @php
                                    $product_name = App\Models\Products::where('id', $order->product_id)->value('name');
                                    
                                @endphp
                                <td>{{ $product_name }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>{{ $order->total_price }}</td>

                                @if ($order->status == 'pending')
                                    <td><span class="badge bg-label-danger me-1">Pending</span></td>
                                @else
                                    <td><span class="badge bg-label-primary me-1">Approved</span></td>
                                @endif

                                <td>

                                    <a href="{{ route('acceptorder',$order->id) }}" class="btn  btn-success bx ">Confirm Order</a>

                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
