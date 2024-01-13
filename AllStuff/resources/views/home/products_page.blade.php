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
          .av_products {
            /* max-width: 800px; */
            margin: 5px auto;
            background-color: #fff;
            padding: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        </style>

   </head>
   <body>
      <div class="hero_area">
        
        @include('home.header')
       
      </div>
     
      <div class="av_products" style="text-align:center;">
      <h2 style="color: #333; font-size: 36px; margin-top: 20px;">
    Our <span style="color: #ff5733;">Products</span>                  
</h2>

               </div>
      <form id="sort-form" action="{{route('product.sort') }}" method="GET">
    @csrf
    <div class="col-lg-12">
        <div class="sorting-form" style="text-align:end;">
            <select id="sort-by" name="short-by" onchange="this.form.submit()" style="margin-right:120px;">
                <option value="hidden" style="display:none;">Sort by</option>  
                <option value="discount">Discounts</option>
                <option value="title">A-z</option>
                <option value="highToLow">High to Low</option>
                <option value="lowToHigh">Low to High</option>
            </select> 
        </div>
    </div>
    
</form>

      @include('home.product')
      
      @include('home.footer')
     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      
      <script src="home/js/popper.min.js"></script>
      
      <script src="home/js/bootstrap.js"></script>
     
      <script src="home/js/custom.js"></script>

      <script>
    document.getElementById('sort-button').addEventListener('click', function() {
        document.getElementById('sort-form').submit();
    });
</script>

   </body>
</html>