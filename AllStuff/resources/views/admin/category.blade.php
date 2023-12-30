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
    
    </style>

<script>
    function confirmDelete(categoryId) {
        var confirmDelete = confirm('Are you sure you want to delete this product   ?');

        if (confirmDelete) {
            document.getElementById('delete-form-' + categoryId).submit();
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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
 
  <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">x</button>
        
                {{session()->get('message')}}
    </div>
        @endif
            <div class="div_center">
                <h2 class="h2_font">Add Category</h2>

                <form action="{{url('/add_category')}}" method="POST">
                    @csrf
                    <input class="text_color" type="text" name="category" placeholder="write category name">
                    <input type="Submit" class="btn btn-primary" name="submit" value="Add Category">
                </form>
            </div>
            <table class="center">
            <tr>
                <td>Category Name</td>
                <td>Action</td>
            </tr>

            @foreach($data as $category)
    <tr>
        <td>{{ $category->category_name }}</td>
        <td>
            <form id="delete-form-{{ $category->id }}" action="{{ url('delete_category', $category->id) }}" method="POST" style="display: none;">
                @csrf
                @method('DELETE')
            </form>

            <a class="btn btn-danger" href="#" onclick="confirmDelete('{{ $category->id }}');">
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