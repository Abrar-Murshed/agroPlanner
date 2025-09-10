<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')

    <style type="text/css">
        table
        {
            border: 2px solid skyblue;
            text-align: center;
        }

        th
        {
            background-color: skyblue;
            padding: 10px;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .table_center
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>    

  </head>
  <body>
    @include('admin.header')

    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

       <div class="table_center">   
            <table>
                <tr>
                    <th>Customer Name</th>
                    <th>Number</th>
                    <th>Address</th>
                    <th>Product title</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Status</th>
                </tr>

                @forelse($data as $order)
                    <tr>
                        <td>{{ $order->name }}</td>
                        <td>{{ $order->phone }}</td>
                        <td>{{ $order->rec_address ?? '—' }}</td>

                        <td>{{ optional($order->product)->title }}</td>
                        <td>{{ optional($order->product)->price }}</td>
                        <td>
                            @if(optional($order->product)->image)
                                <img width="150" src="{{ asset('products/'.$order->product->image) }}" alt="Product image">
                            @endif
                        </td>
                        <td>{{ $order->status ?? '—' }}</td>
                    </tr>
                @empty
                    <tr><td colspan="7">No orders yet.</td></tr>
                @endforelse

            </table>

        </div>    

          </div>  
      </div>
    </div>
    <!-- JavaScript files-->
    <script src="admincss/vendor/jquery/jquery.min.js"></script>
    <script src="admincss/vendor/popper.js/umd/popper.min.js"> </script>
    <script src="admincss/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="admincss/vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="admincss/vendor/chart.js/Chart.min.js"></script>
    <script src="admincss/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="admincss/js/charts-home.js"></script>
    <script src="admincss/js/front.js"></script>
  </body>
</html>
