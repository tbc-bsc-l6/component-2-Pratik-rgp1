<header class="header_section">
    <div class="container" style="padding:5px">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="#"><img width="140" src="images/logo.png" alt="something happened to the logo" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                  
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="blog_list.html">Latest</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.html">Contact</a>
                    </li>
                    <form class="form-inline">
                       
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn" style="background-color: #d7c083; margin-right:10px; color: #fff;"
                                    type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    
                    <li class="nav-item">
                        <a class="btn" id="logincss" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn" id="registercss" href="{{ route('register') }}">Register</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
