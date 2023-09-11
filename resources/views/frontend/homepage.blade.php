@extends('home');
@section('homepage')
    <div class="container">
                
                <div class="row">
                    <div class="col-md-4">
                        <h2 class="card-header">All Products</h2>
                        
                    </div>
                    <div class="col-md-4">
                        <li class="menu-item d-flex align-items-center mt-3">
    
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Sorted by Category
                            </a>
                            
                                <ul class="dropdown-menu">
                                    @foreach ($allCategories as $category)

                                        <li><a class="dropdown-item" href="">{{$category->category_name}}</a></li>

                                    @endforeach
                                </ul>

                        </li>
                    </div>
                </div>


            @foreach ($allProducts as $product)
                <div class="container mt-5 mb-5">
                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div class="row p-2 bg-white border rounded">
                                <div class="col-md-3 mt-1"><img class="img-fluid img-responsive rounded product-image"
                                        src="{{ asset('images/products/' . $product->image) }}"></div>
                                <div class="col-md-6 mt-1">
                                    <h5>{{ $product->name }}</h5>


                                    <p class="text-justify text-truncate para mb-0">{{ $product->description }}<br><br></p>
                                </div>
                                <div class="align-items-center align-content-center col-md-3 border-left mt-1">
                                    <div class="d-flex flex-row align-items-center">
                                        <h4 class="mr-1">${{ $product->price }}</h4><span
                                            class="strike-text">${{ $product->price }}</span>
                                    </div>
                                    <h6 class="text-success">Free shipping</h6>
                                    <div class="d-flex flex-column mt-4">
                                        <button class="btn btn-primary btn-sm" type="button">Details</button>
                                        <button class="btn btn-outline-primary btn-sm mt-2" type="button">Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach


    </div>
@endsection
