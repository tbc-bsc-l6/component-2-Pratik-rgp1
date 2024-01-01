<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
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
          width:100%;
            padding:20px;
        }
        </style>
  </head>
  <body>
    <div class="container-scroller">
    
     @include('admin.sidebar')
   
      @include('admin.header')

      <div class="main-panel">
        <div class="content-wrapdper">
          <h2 class="h2_font">All Orders</h2>
                <table class="div_center">
                  <tr class="table_color">
                    <th class="table_deg">Name</th>
                    <th class="table_deg">Email</th>
                    <th class="table_deg">Address</th>
                    <th class="table_deg">Phone</th>
                    <th class="table_deg">Product Name</th>
                    <th class="table_deg">Quantity</th>
                    <th class="table_deg">Price</th>
                    <th class="table_deg">Payment Status</th>
                    <th class="table_deg">Delivery Status</th>
                    <th class="table_deg">Image</th>
                  </tr>

                  @foreach($order as $order)
                  <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                    <img class="image" src="/product/{{$order->image}}" style="width: 100px; height: auto;">
                </td>
                  </tr>
                  @endforeach
                </table>
</div>
            </div>
      
      @include('admin.script')
</div>
    
  </body>
</html>