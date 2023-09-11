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

                            <form class=" p-5 " method="post" action="{{ route('admin.category.store') }}"
                                enctype="multipart/form-data">
                                @csrf                               

                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="category_name" class="form-control" id="name">
                                    <span class="text-danger">{{ $errors->first('category_name') }}</span>

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
                                <a href="{{ route('admin.category.index') }}" class="btn btn-danger">Cancel</a>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </body>

    </html>
@endsection
