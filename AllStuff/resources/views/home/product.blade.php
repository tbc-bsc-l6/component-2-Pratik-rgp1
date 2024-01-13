<section class="product_section layout_padding" style="margin-top:-50px;">
         <div class="container">
        

            <div class="row">
           
               @foreach($product as $products)
               <div class="col-sm-6 col-md-4 col-lg-4">
                  <div class="box">
                     <div class="option_container">
                        <div class="options">
                           <a href="{{url('product_details',$products->id)}}" class="option1">
                          View
                           </a>
                           <form method="POST" action="{{ url('add_to_cart', $products->id) }}">
    @csrf
    <button type="submit" class="option2">Add to Cart</button>
</form>
                        </div>
                     </div>
                     <div class="img-box">
                        <img src="product/{{$products->image}}" alt="">
                     </div>
                     <div class="detail-box">
                        <h6>
                          {{$products->title}}
                        </h6>

                        @if($products->discounted_price!=null)
                        <h6>
                          Rs.{{$products->discounted_price}}
                        </h6>

                        <h6 style="text-decoration:line-through; color:red">
                           Rs.{{$products->price}}
                        </h6>
                        @else
                        <h6>
                           Rs.{{$products->price}}
                        </h6>
                        @endif
                  </div>
               </div>
            </div>
            @endforeach
            
            <span style="padding-top:20px;">
            {!!$product->withQueryString()->links('pagination::bootstrap-5')!!}
            </span>
         </div>
      </section>
      <script>
    document.addEventListener("DOMContentLoaded", function(event) {
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo(0, scrollpos);
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };
</script>
      <script>
    document.getElementById('sort-button').addEventListener('click', function() {
        document.getElementById('sort-form').submit();
    });
</script>
     
     