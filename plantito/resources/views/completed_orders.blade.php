<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - Completed Orders</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />

</head>

<body>
    @include('layouts/navbar-profile')
    @include('layouts/process')
    <div class="text-center mt-5">
    <h1><b>Completed Orders</b></h1>
    </div>

    <table class="table text-center boxshadow rowhover">
        <tr>
            <th>Order ID</th>
            <th>Time Placed</th>
            <th>Status</th>
            <th>Total Price</th>
            <th>More Info</th>
        </tr>
        @foreach ($orders as $o)
        <tr>
            <td>{{$o->order_id}}</td>
            <td>{{$o->time_placed}}</td>
            <td>{{$o->status}}</td>
            <td>₱{{$o->total_price}}</td>
            <td><a href="/orderId={{$o->order_id}}" class="btn btn-success">More Info</a></td>
        </tr>
        @endforeach
    </table>
    <div class="container mt-4">
    <a href="/orders" class="links"><img src="img/left-arrow.png" width="15px" /><b> Go back to Orders</b></a>
    </div>
    @include('layouts/footer')
</body>

</html>