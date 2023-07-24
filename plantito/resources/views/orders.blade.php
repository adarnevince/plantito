<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - My Orders</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
    @include('layouts/navbar-profile')
    @include('layouts/process')
    <div class="text-center" style="height:100vh;">
    <div class="mt-5">
    <h1><strong>My Orders</strong></h1>
    </div>
    @if (count($orders) > 0)
    <table class="table text-center boxshadow rowhover">
        <tr>
            <th>Order ID</th>
            <th>Time placed</th>
            <th>Status</th>
            <th>Total price</th>
            <th></th>
        </tr>
        @foreach ($orders as $o)
        <tr>
            <td>{{$o->order_id}}</td>
            <td>{{$o->time_placed}}</td>
            <td>{{$o->status}}</td>
            <td>₱{{$o->total_price}}</td>
            <td><a class="btn btn-success" href="/orderId={{$o->order_id}}">More info</a>
            @if ($o->status == 'Delivered')
            <span><a href="/orders/{{$o->order_id}}">Confirm Delivery</a></span>
            </td>
            @endif
        </tr>
        @endforeach
    </table>
    <a href="/completed-orders"><p class="text-start mx-5 my-5 pastorder"><b>View past orders</b></p></a>
    
    @else
    <h3>There are currently no ongoing orders. Visit our <a href="/shop">Shop!</a></h3>
    <img src="img/giphy.gif" width="50px" />

    <a href="/completed-orders"><p class="pastOrder"><b>View past orders</b></p></a>
    
    @endif
    
</div>
    </div>
    <div class="pagination-prod">
            {{$orders -> links ('pagination::bootstrap-5')}}
    </div>

    @include ('layouts/footer')
    

</body>

</html>