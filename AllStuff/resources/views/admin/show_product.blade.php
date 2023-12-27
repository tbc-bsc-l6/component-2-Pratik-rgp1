<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type ="text/css">
        .div_center{
          margin:auto;
          width:80%; 
          border:2px  solid white;
          text-align:center;
          margin-top:30px;
        }
        .h2_font{
            font-size:30px;
            text-align:center;
            padding-top:10px;
        }
        .table_color{
            background-color:#AD9551;
        }
        .table_deg{
            padding:30px;
        }
    </style>

<script>
    function confirmDelete(ProductId) {
        var confirmDelete = confirm('Are you sure you want to delete this product ?');

        if (confirmDelete) {
            document.getElementById('delete-form-' + ProductId).submit();
        }
    }
</script>

  </head>
  <body>
    <div class="container-scroller">
    
     @include('admin.sidebar')
   
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapper">

        @if(session()->has('message'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
 
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
        
                {{session()->get('message')}}
    </div>
        @endif
        
        <h2 class="h2_font">All Products</h2>
        
        <table class="div_center">
            <tr class="table_color">
                <th class="table_deg">Product Name</th>
                <th class="table_deg">Category</th>
                <th class="table_deg">Description</th>
                <th class="table_deg">Price</th>
                <th class="table_deg">Discount Price</th>
                <th class="table_deg">Quantity</th>
                <th class="table_deg">Product Image</th>
                <th class="table_deg">Edit</th>
                <th class="table_deg">Delete</th>
            </tr>

            @foreach($product as $product)
            <tr>
                <td>{{$product->title}}</td>
                <td>{{$product->category}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->discounted_price}}</td>
                <td>{{$product->quantity}}</td>
                <td>
                    <img class="image" src="/product/{{$product->image}}" style="max-width: 100px; height: auto;">
                </td>
                <td>
                    <a class="btn btn-outline-secondary" href="{{url('update_product',$product->id)}}">Edit</a>
                </td>
                <td>
            <form id="delete-form-{{ $product->id }}" action="{{ url('delete_product', $product->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>
            <a class="btn btn-danger btn-delete" href="#" onclick="confirmDelete('{{ $product->id }}');">
            
    Delete
</a>
        </td>
            </tr>
            @endforeach

        </table>
</div>
</div> 
      @include('admin.script')
    
  </body>
</html>