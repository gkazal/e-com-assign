@extends('admin.layouts.template');

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    </head>

    <body>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">


                    <div class="card">
                        <div class="card-body">

                            <form class=" p-5 " method="post" action="{{ route('admin.user.store') }}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group">
                                    <label for="" class="form-label">Choose User Type</label>
                                    <select class="form-select" name="user_type" aria-label="Default select example">
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('user_type') }}</span>

                                </div>

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="name">
                                    <span class="text-danger">{{ $errors->first('name') }}</span>

                                </div>

                                <div class="mb-3">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" name="phone" class="form-control" id="phone">
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>

                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                                    <span class="text-danger">{{ $errors->first('password') }}</span>

                                </div>

                                <div class="mb-3">
                                    <label for="address" class="form-label">Address *</label>
                                    <input type="text" name="address" class="form-control" id="address">
                                    <span class="text-danger">{{ $errors->first('address') }}</span>

                                </div>

                                <div class="form-group mb-3">
                                    <label for="" class="form-label">Choose status</label>
                                    <select class="form-select" name="status" aria-label="Default select example">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                    <span class="text-danger">{{ $errors->first('status') }}</span>

                                </div>




                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.user.index') }}" class="btn btn-danger">Cancel</a>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>
@endsection
