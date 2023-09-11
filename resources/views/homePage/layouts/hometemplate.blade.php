<!DOCTYPE html>
<html lang="en">

<head>
    <!-- basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- mobile metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <!-- site metas -->
    <title>Eflyer</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- bootstrap css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/bootstrap.min.css') }}">
    <!-- style css -->
    <link rel="stylesheet" type="text/css" href=" {{ asset('home/css/style.css') }}">
    <!-- Responsive-->
    <link rel="stylesheet" href="{{ asset('home/css/responsive.css') }}">
    <!-- fevicon -->
    <link rel="icon" href=" {{ asset('home/images/fevicon.png') }}" type="image/gif" />
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href=" {{ asset('home/css/jquery.mCustomScrollbar.min.css') }}">
    <!-- Tweaks for older IEs-->
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--  -->
    <!-- owl stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Poppins:400,700&display=swap&subset=latin-ext"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('home/css/owl.carousel.min.css') }}">
    <link rel="stylesoeet" href="{{ asset('home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
        media="screen">
</head>

<body>

    <!-- banner bg main start -->
    <div class="banner_bg_main">
        <!-- header top section start -->
        <div class="container">
            <div class="header_section_top">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="custom_menu">
                            <ul>
                                <li><a href="#">Best Sellers</a></li>
                                <li><a href="#">Gift Ideas</a></li>
                                <li><a href="#">New Releases</a></li>
                                <li><a href="#">Today's Deals</a></li>
                                <li><a href="#">Customer Service</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header top section start -->
        <!-- logo section start -->
        <div class="logo_section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="logo"><a href="index.html"><img src="{{ asset('home/images/logo.png') }}"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- logo section end -->


        <!-- header section start -->
        <div class="header_section">
            <div class="container">
                <div class="containt_main">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

                        {{-- home page a category show korar jonno HomepageController ar Categories function ar modde kaj hobe. 
                        home page ar majkhane jato kaj hobe sob alada route a set hobe and segulo sob clientController ar modde kaj hobe..
                        jamon home page ar majhe products category dara show hoice seta /category route a hoice and clientController ar modde kaj hoice       
                        --}}

                        <a href="{{ route('allproducts') }}">Home</a>
                        <a href="{{ route('pendingorders') }}">Your Orders</a>

                        @foreach ($allCategories as $categories)
                            {{-- ekane category name a click korle category name and id, slug dekhabe route ar maddome and seta, /category/id/slug route a dekhabe..
                             jemon AllCategory menu te books a click korle route a books name, id and slug show hobe and sei onujaye category.blade file ar ai..
                             books category id dara books ar name and books ar jato products ace segulo show hobe  ... 
                             and ai category id category.blade ar modde paice amra client controller ar modde category = findorfail(id) dia.
                            --}}
                            <a
                                href="{{ route('category', [$categories->id, $categories->category_name]) }}">{{ $categories->category_name }}</a>
                        @endforeach
                    </div>
                    <span class="toggle_icon" onclick="openNav()"><img
                            src="{{ asset('home/images/toggle-icon.png') }}"></span>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All Category
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            {{-- category show korar jonno --}}

                            @foreach ($allCategories as $categories)
                                <a class="dropdown-item"
                                    href="{{ route('category', [$categories->id, $categories->category_name]) }}">{{ $categories->category_name }}</a>
                            @endforeach

                        </div>

                    </div>
                    <div class="main">
                        <!-- Another variation with a button -->
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search this blog">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="button"
                                    style="background-color: #f26522; border-color:#f26522 ">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="header_box">
                        <div class="lang_box ">
                            <a href="#" title="Language" class="nav-link" data-toggle="dropdown"
                                aria-expanded="true">
                                <img src="{{ asset('home/images/flag-uk.png') }}" alt="flag" class="mr-2 "
                                    title="United Kingdom"> English <i class="fa fa-angle-down ml-2"
                                    aria-hidden="true"></i>
                            </a>
                            <div class="dropdown-menu ">
                                <a href="#" class="dropdown-item">
                                    <img src="{{ asset('home/images/flag-france.png') }}" class="mr-2"
                                        alt="flag">
                                    French
                                </a>
                            </div>
                        </div>
                        <div class="login_menu">
                            <ul>
                                <li><a href="#">
                                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                        <span class="padding_10">Cart</span></a>
                                </li>


                                <li>
                                    @if (Auth::check())
                                        <a href="#">
                                            
                                          <i class="fa fa-user ml-5" aria-hidden="true">
                                             <span>Hello, {{ Auth::user()->name }}</span>
                                          </i>
                                          @if (Auth::user())
                                          <form method="POST" action="{{ route('logout') }}">
                                             @csrf

                                             {{-- <a href="" type="submit" value="logout"> --}}
                                                <input class="btn btn-danger" type="submit" value="logout">
                                                {{-- <i class="fa fa-user ml-5" aria-hidden="true">logout</i> --}}
                                          
                                             {{-- </a> --}}
                                          </form>

                                          @endif

                                                                                   
                                        </a>
                                    @else
                                          <a href="{{ route('login') }}">
                                          <i class="fa fa-user ml-5" aria-hidden="true">Login</i>
                                       
                                          </a>
                                    @endif

                                       {{-- @if (Auth::check() && Auth::user()->user_type == 'user')
                                             <form method="POST" action="{{ route('logout') }}">
                                                   @csrf
                                                   <button class="dropdown-item" type="submit">
                                                      <i class="bx bx-power-off me-2"></i>
                                                      <span class="align-middle">Log Out</span>
                                                   </button>
                                             </form>
                                       @endif --}}

                                </li>

                                


                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('dashboard/assets/img/avatars/1.png') }}"
                                                            alt class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                {{-- check user or admin --}}
                                                @if (Auth::check() && Auth::user()->user_type == 'user')
                                                    <div class="flex-grow-1">
                                                        <h6>Hello, {{ Auth::user()->name }}</h6>
                                                        <p class="text-muted">Your are
                                                            {{ Auth::user()->user_type }}
                                                        </p>
                                                    </div>
                                                @endif


                                            </div>
                                        </a>
                                    </li>


                                    <li>

                                        @if (Auth::check() && Auth::user()->user_type == 'admin')
                                            <form method="POST" action="{{ route('logout') }}">
                                                @csrf
                                                <button class="dropdown-item" type="submit">
                                                    <i class="bx bx-power-off me-2"></i>
                                                    <span class="align-middle">Log Out</span>
                                                </button>
                                            </form>
                                        @else
                                            @csrf
                                            <a class="dropdown-item " href="{{ route('login') }}">LogIn</a>
                                        @endif
                                    </li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- header section end -->
        <!-- banner section start -->

        <!-- banner section end -->
    </div>
    <!-- banner bg main end -->

    {{-- start common part --}}

    {{-- <div class="fashion_section">
        <div id="main_slider" class="carousel slide" data-ride="carousel">
           <div class="carousel-inner">
              <div class="carousel-item active">
                 <div class="container">
                    <h1 class="fashion_taital">Man & Woman Fashion</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man T -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/tshirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/dress-shirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Woman Scart</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/women-clothes-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <h1 class="fashion_taital">Man & Woman Fashion</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man T -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/tshirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/dress-shirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Woman Scart</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/women-clothes-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="carousel-item">
                 <div class="container">
                    <h1 class="fashion_taital">Man & Woman Fashion</h1>
                    <div class="fashion_section_2">
                       <div class="row">
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man T -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/tshirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Man -shirt</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/dress-shirt-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                          <div class="col-lg-4 col-sm-4">
                             <div class="box_main">
                                <h4 class="shirt_text">Woman Scart</h4>
                                <p class="price_text">Price  <span style="color: #262626;">$ 30</span></p>
                                <div class="tshirt_img"><img src="{{ asset('home/images/women-clothes-img.png') }}"></div>
                                <div class="btn_main">
                                   <div class="buy_bt"><a href="#">Buy Now</a></div>
                                   <div class="seemore_bt"><a href="#">See More</a></div>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
           <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
           <i class="fa fa-angle-left"></i>
           </a>
           <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
           <i class="fa fa-angle-right"></i>
           </a>
        </div>
     </div> --}}

    <div class=" " style="margin-top: 200px;">
        @yield('allproducts')
        @yield('allcategory')
        @yield('singleproduct')
        @yield('userprofile')



    </div>

    {{-- end common part --}}




    <!-- footer section start -->
    <div class="footer_section layout_padding">
        <div class="container">
            <div class="footer_logo"><a href="index.html"><img src="{{ asset('home/images/footer-logo.png') }}"></a>
            </div>
            <div class="input_bt">
                <input type="text" class="mail_bt" placeholder="Your Email" name="Your Email">
                <span class="subscribe_bt" id="basic-addon2"><a href="#">Subscribe</a></span>
            </div>
            <div class="footer_menu">
                <ul>
                    <li><a href="#">Best Sellers</a></li>
                    <li><a href="#">Gift Ideas</a></li>
                    <li><a href="#">New Releases</a></li>
                    <li><a href="#">Today's Deals</a></li>
                    <li><a href="#">Customer Service</a></li>
                </ul>
            </div>
            <div class="location_main">Help Line Number : <a href="#">+1 1800 1200 1200</a></div>
        </div>
    </div>
    <!-- footer section end -->
    <!-- copyright section start -->
    <div class="copyright_section">
        <div class="container">
            <p class="copyright_text">© 2020 All Rights Reserved. Design by <a href="https://html.design">Free html
                    Templates</a></p>
        </div>
    </div>
    <!-- copyright section end -->
    <!-- Javascript files-->
    <script src="{{ asset('home/js/jquery.min.js') }}"></script>
    <script src="{{ asset('home/js/popper.min.js') }}"></script>
    <script src="{{ asset('home/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('home/js/jquery-3.0.0.min.js') }}"></script>
    <script src="{{ asset('home/js/plugin.js') }}"></script>
    <!-- sidebar -->
    <script src="{{ asset('home/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('home/js/custom.js') }}"></script>
    <script>
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }

        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }
    </script>
</body>

</html>
