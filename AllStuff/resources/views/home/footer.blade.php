<footer>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="full">
                <div class="logo_footer">
                    <a href="#"><img width="210" src="images/logo.png" alt="#" /></a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-7">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget_menu">
                                <h3>Menu</h3>
                                <ul>
                                    <li><a href="/">Home</a></li>
                                    <li><a href="/about">About</a></li>
                                    <li><a href="/">Services</a></li>
                                    <li><a href="/contact">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="widget_menu">
                                <h3>Account</h3>
                                <ul>
                                    <li><a href="#">Account</a></li>
                                    @guest
                <!-- Non-authenticate users -->
                <li><a href="{{ route('login') }}">Login</a></li>
                <li><a href="{{ route('register') }}">Register</a></li>
            @endguest
            
            @auth
               
            @endauth
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="widget_menu">
                    <p><strong>ADDRESS:</strong> Kathmandu</p>
                        <!-- <p><strong>TELEPHONE:</strong> +91 987 654 3210</p> -->
                        <p><strong>EMAIL:</strong> allstuff32@gmail.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

         </div>
      </footer>