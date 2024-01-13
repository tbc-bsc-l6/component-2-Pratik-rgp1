<!DOCTYPE html>
<html>
   <head>
   <base href ="/public">
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/AllStuff.png" type="">
      <title>AllStuff</title>
     
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
     
      <link href="home/css/style.css" rel="stylesheet"/>
  
      <link href="home/css/responsive.css" rel="stylesheet" />

      <style>
        body {
            /* background-color: #f8f9fa; */
            color: #495057;
        }

       

        .out-of-stock-heading {
            font-size: 2em;
            color: #dc3545; 
            margin-top:20px;
            margin-bottom: 150px;
        }
        .product-title{
            font-size: 1em;

        }

        .emoji {
            font-size: 1.3em;
            margin-right: 10px;
        }
    </style>

   </head>
   <body>
      <div class="hero_area">
        
        @include('home.header')
       
      </div>
     
     <div class="container mt-5">
            <div class="row">
                <div class="col-md-12 text-center">
                    <h1 class="product-title">Not found!!</h1>
                    <h2 class="out-of-stock-heading">
                        This product is currently out of stock
                        <span class="emoji">&#128557;</span>
                    </h2>
                </div>
            </div>
        </div>


      
      @include('home.footer')
     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      
      <script src="home/js/popper.min.js"></script>
      
      <script src="home/js/bootstrap.js"></script>
     
      <script src="home/js/custom.js"></script>

   </body>
</html>