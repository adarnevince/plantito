<html lang="en">

<head>
    @include('layouts/head')
    <title>ADMIN - Ongoing Orders</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />

</head>

<body>
    @include('layouts/navbar-admin')
    @include('layouts/process')
    <div class="text-center mt-3" >
        <h1><b>Ongoing Orders</b></h1>
    </div>
    <table class="table boxshadow rowhover">
        <tr>
            <th>Status</th>
            <th>Order ID</th>
            <th>User ID</th>
            <th>Time Placed</th>
            <th>Amount (₱)</th>
            <th></th>
        </tr>
        @foreach ($orders as $o)
        <tr>
            <td>{{$o->status}}</td>
            <td>{{$o->order_id}}</td>
            <td>{{$o->user_id}} <a href="/admin-viewUserId={{$o->user_id}}" class="links">(User info)</a></td>
            <td>{{$o->time_placed}}</td>
            <td>₱{{$o->total_price}}</td>
            <td><a href="/admin-UserOrdersId={{$o->order_id}}" class="btn btn-success">View Products</a></td>
        </tr>
        @endforeach
    </table>
    <div>
    <a href="/admin-CompletedOrders"  class="bottom-link my-5 mx-5">Show Completed Orders</a>
    </div>

    <div class="pagination-prod">
            {{$orders -> links ('pagination::bootstrap-5')}}
    </div>
</body>
</html>