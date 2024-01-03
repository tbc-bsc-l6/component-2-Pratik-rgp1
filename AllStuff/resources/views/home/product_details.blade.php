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
     
      <link href="home/css/style.css" rel="stylesheet" />
  
      <link href="home/css/responsive.css" rel="stylesheet" />

      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

   </head>
   <body>
      <div class="hero_area">
        
        @include('home.header')   
      </div>
      <div class="col-sm-6 col-md-4 col-lg-4" style="margin:auto; width:50%; padding:30px;">
                  
                     <div class="img-box" style="padding-bottom:10px;">
                        <img src="product/{{$product->image}}" alt=""  class="img-thumbnail" data-toggle="modal" data-target="#imageModal" onclick="showImageDescription('{{$product->image}}', '{{$product->description}}')>
                     </div>
                     <div class="detail-box" >
                        <h5 style="padding-top:15px;">
                          {{$product->title}}
                        </h5>

                        @if($product->discounted_price!=null)
                        <h6 style="text-decoration:line-through; color:red">
                       
                        Rs.{{$product->price}}
                        <h6>
                            Price
                          Rs.{{$product->discounted_price}}
                        </h6>

                        </h6>
                        @else
                        <h6>
                            <br>
                           Rs.{{$product->price}}
                        </h6>
                        @endif

                        <h6>Product Category : {{$product->category}}</h6>
                        <h6>Product Description : {{$product->description}}</h6>
                        <h6>Available Quantity : {{$product->quantity}}</h6>

                        <form method="POST" action="{{ url('add_to_cart', $product->id) }}">
                           @csrf
                           <button type="submit" class="fas fa-cart-plus" style="height:40px; padding-top:20px;padding-bottom:20px; border:2px solid black;">Add to Cart</button>
                        <!-- <a href="{{url('add_to_cart',$product->id)}}" class="btn btn-primary" style="background-color: #FF5733;"> -->
                        
<!-- </a> -->
</form>
                  </div>
               </div>
            </div>
      

            <div id="imageModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>
         <div class="modal-body">
            <img id="modalImage" src="" alt="" class="img-fluid">
            <p id="imageDescription"></p>
         </div>
      </div>
   </div>
</div>
      @include('home.footer')

     
      <script src="home/js/jquery-3.4.1.min.js"></script>
      
      <script src="home/js/popper.min.js"></script>
      
      <script src="home/js/bootstrap.js"></script>
     
      <script src="home/js/custom.js"></script>

      <script>
   function showImageDescription(imageSrc, description) {
      $('#modalImage').attr('src', 'product/' + imageSrc);
      $('#imageDescription').text(description);
   }
</script>

   </body>
</html>