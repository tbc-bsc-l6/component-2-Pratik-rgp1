<!DOCTYPE html>
<html lang="en">
  <head>
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
                <h2 class="h2_font">Add product</h2>

                <form action="{{url('/add_product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                <div class="div_product">
                <label>Product Name:</label>
                <input class="text_color" type="text" name="title" placeholder="product name" required="">    
            </div>

            <div class="div_product">
                <label>Product Description:</label>  
                <input class="text_color" type="text" name="description" placeholder="short description" required="">    
            </div>
            <div class="div_product">
                
                <label>Product Price:</label>
                <input class="text_color" type="number" name="price" placeholder="product price" required="">    
            </div>

            <div class="div_product">
                <label>Discount Price:</label>
                <input class="text_color" type="number" name="dis_price" placeholder="discount price">    
            </div>

            <div class="div_product">
                <label>Product Quantity:</label>
                <input class="text_color" type="number" min="0" name="quantity" placeholder="quantity" required="">    
            </div>
            
            <div class="div_product">
                <label>Product Category:</label>
             <select class="text_color" name="category" required="">
                      <option value="" selected="" >Add a category here</option>
                      @foreach($category as $category)
                <option value="{{$category->category_name}}">{{$category->category_name}}</option>
                @endforeach
             </select>    
            </div>

            <div class="div_product">
                <label>Product Image:</label>
             <input type="File" name="image" required="">
            </div>

            <div class="div_product">
          <input type="Submit" value="Add product" class="btn btn-danger">   
    </div>

    </form>
    </div>
    </div>  
</div>
</div>  
  @include('admin.script')
    
</body>
</html>