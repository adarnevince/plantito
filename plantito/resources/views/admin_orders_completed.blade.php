<html lang="en">

<head>
    @include('layouts/head')
    <title>ADMIN - Completed Orders</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
    @include('layouts/navbar-admin')
    @include('layouts/process')
    <div class="text-center">
        <h1><b>Order History</b></h1>
        <table class="table boxshadow rowhover">
            <tr>
                <th>Status</th>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Time Placed</th>
                <th>Total Price</th>
                <th></th>
            </tr>
            @foreach ($orders as $o)
            <tr>
                <td>{{$o->status}}</td>
                <td>{{$o->order_id}}</td>
                <td>{{$o->user_id}} <a href="/admin-viewUserId={{$o->user_id}}">(View User Info)</a></td>
                <td>{{$o->time_placed}}</td>
                <td>₱{{$o->total_price}}</td>
                <td><a href="/admin-UserOrdersId={{$o->order_id}}" class="btn btn-success">View Products</a></td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="container mt-4">
    <a href="/admin-UserOrders" class="links"><img src="img/left-arrow.png" width="15px" /><b> Go back to Orders</b></a>
    </div>
</body>
</html>