<!DOCTYPE html>
<html lang="en">
  <head>

  <base href="/public">
    @include('admin.css')

    <style type="text/css">
        .div_center{
            text-align:center;
            padding-top:40px;
        }

        .h2_font{
            font-size:30px;
            padding-bottom:30px;
        }

        .text_color{
            color:black;
        }
        .center{
            margin:auto;
            width:50%;
            margin-top:30px;
            text-align:center;
            border:2px solid #AD9551;    
        }
        label{
            display:inline-block;
            width:200px;
        }
        .div_product{
            padding-bottom:15px;
        }
    
    </style>
  </head>
  <body>
    <div class="container-scroller">
    
     @include('admin.sidebar')
   
      @include('admin.header')

      <div class="main-panel">
        <div class="cont-wrapper">

        @if(session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
 
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
        
                {{session()->get('message')}}
    </div>
        @endif
        
            <div class="div_center">
                <h2 class="h2_font">Update product</h2>

                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="div_product">
                <label>Product Name:</label>
                <input class="text_color" type="text" name="title" placeholder="product name" required="" value="{{$product->title}}">    
            </div>

            <div class="div_product">
                <label>Product Description:</label>  
                <input class="text_color" type="text" name="description" placeholder="short description" required="" value="{{$product->description}}">    
            </div>
            <div class="div_product">
                
                <label>Product Price:</label>
                <input class="text_color" type="number" name="price" placeholder="product price in rupees" required="" value="{{$product->price}}">    
            </div>

            <div class="div_product">
                <label>Discount Price:</label>
                <input class="text_color" type="number" name="dis_price" placeholder="discount price in rupees" value="{{$product->discounted_price}}">    
            </div>

            <div class="div_product">
                <label>Product Quantity:</label>
                <input class="text_color" type="number" min="0" name="quantity" placeholder="quantity" required="" value="{{$product->quantity}}">    
            </div>
            
            <div class="div_product">
    <label>Product Category:</label>
    <select class="text_color" name="category" >
        <option value="" selected="">Update category</option>
        @foreach($categories as $category)
            <option value="{{ $category->category_name }}" {{ $product->category_name == $category->category_name ? 'selected' : '' }}>
                {{ $category->category_name }}
            </option>
        @endforeach
    </select>
</div>


            <div class="div_product">
                <label> Current Product Image:</label>
                <img src="/product/{{$product->image}}" style="max-width: 85px; height: auto;">
            </div>

            <div class="div_product">
                <label> Change Product Image:</label>
                <input type="File" name="image">
            </div>

            <div class="div_product">
          <input type="Submit" value="Update product" class="btn btn-danger">   
    </div>

    </form>
    </div>
    </div>  
</div>
</div>  
  @include('admin.script')
    
</body>
</html>