@extends('homepage.layouts.hometemplate')
@section('singleproduct')



<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 ">
            <div class="card my-5">
                <div class="card-body">
                    <h2>Shipping Address</h2>

                    <form action="{{ route('addshippingaddress')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="" class="form-label">Phone Number</label>
                            <input type="text" name="phone"  class="form-control"  required>
                        </div>
    
                        <div class="form-group">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address"  class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="" class="form-label">Postal Code</label>
                            <input type="text" name="postal_code"  class="form-control" placeholder="code" required>
                        </div>

                        <input type="submit" value="Next" class="btn btn-primary">


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection