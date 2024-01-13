<header class="header_section">
    <div class="container" style="padding:6px">
        <nav class="navbar navbar-expand-lg custom_nav-container">

            <a class="navbar-brand"><img width="140" src="images/logo.png" alt="something happened to the logo" /></a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/products_page">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('show_cart')}}">Cart</a>
                    </li>

                    <!-- search products -->
                    <li class="nav-item">
                        <form class="form-inline my-2 my-lg-0" action="{{ url('product_search') }}" method="GET">
                            @csrf
                            <div class="input-group">
                                
                                <input type="text" class="form-control mr-sm-2" name="search" placeholder="Search for products" aria-label="Search" value="{{ request('search') }}" style="width:300px;">
                                <div class="input-group-append">    
                                <button class="btn" style="background-color: #d7c083; color: #fff;" type="submit" value="search">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </button>
                                </div>
                                
                            </div>
                        </form>
                    </li>

                    @if(Route::has('login'))
                    @auth
                    <x-app-layout>

                       
                        </x-app-layout>

                    @else
                    <li class="nav-item">
                            <a class="btn" id="logincss" href="{{ route('login') }}">Login</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="btn" id="registercss" href="{{ route('register') }}">Register</a>
                        </li> -->
                        
                        @endauth
                        @endif
                </ul>
            </div>
        </nav>
    </div>
</header>
