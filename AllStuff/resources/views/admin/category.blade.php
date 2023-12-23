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
    
    </style>
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
        </div>
      </div>
  </body>
</html>