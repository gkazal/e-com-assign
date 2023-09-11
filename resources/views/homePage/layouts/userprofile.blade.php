@extends('homepage.layouts.hometemplate')
@section('userprofile')

<h2>Welcome Mr. {{  Auth::user()->name  }}</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="box_main" style=" border: 2px solid rgb(218, 179, 6)" >
                <ul>
                    <li><a href="{{ route('userdashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('pendingorders') }}">Pending Orders</a></li>
                    <li><a href="">Total Orders</a></li>
                    {{-- <li><a href="">Logout</a></li> --}}
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item" type="submit">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </button>
                    </form>

                </ul>

            </div>

        </div>
        <div class="col-lg-8">

            <div class="box_main">
                @yield('dashboard')
                @yield('pendingorders')

                
            </div>

        </div>
    </div>
</div>

@endsection