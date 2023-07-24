<html lang="en">

<head>
    @include('layouts/head')
    <title>ADMIN - Order Info</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>
<body>
    @include('layouts/navbar-admin')
    @include('layouts/process')
    <div class="text-center">
        <h1><b>Order Info</b></h1>
    </div>
    <div class="container-fluid">
        <div class="left-line">
        <p>Order ID: {{$order_info->order_id}}({{$order_info->time_placed}})</p>
        <h2>Items Ordered</h2>
        </div>
        <div class="row">
            <table class="table text-center boxshadow">
                <tr>
                    <th>Item</th>
                    <th>Info</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total Amount:</th>
                </tr>
                @foreach ($ordered_products as $op)
                <tr>
                    <td><img src="img/{{$op->image}}" width="120px" /></td>
                    <td>Name: {{$op->name}}</td>
                    <td>Price: ₱{{$op->price}}</td>
                    <td class="{{($op->quantity >= $op->stock) ? 'red' : ''}}">
                        Quantity:
                        {{$op->quantity}} (In Stock: {{$op->stock}})
                    </td>
                    <td>₱{{$op->price * $op->quantity}}</td>
                </tr>
                @endforeach
            </table>
    </div>
    <div class="text-end mx-3 my-3">
    <h3><b>Subtotal: ₱{{$total}}</b></h3>
    </div>

    <div class="text-center">
    <h2>Update Status</h2>
    
    <p>Status: <i>{{$order_info->status}}</i></p>
    @if ($order_info->status == 'Waiting')
    <div class="container">
    <div class="row">
    <form action="/admin-AcceptUserOrdersId={{$order_info->order_id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="submit" class="btn btn-success" value="Accept Order" />
    </form>
    @endif

    @if ($order_info->status != 'Cancelled' and $order_info->status != 'Received')
    @if ($order_info->status != 'Waiting')
    <form action="/admin-UpdateUserOrdersId={{$order_info->order_id}}" method="POST">
        @csrf
        @method('PUT')
        <select name="new_status">
            <option value="Preparing">Preparing</option>
            <option value="Waiting for Delivery">Waiting for Delivery</option>
            <option value="Delivering">Delivering</option>
            <option value="Delivered">Delivered</option>
        </select><br>
        <div class="mt-3">
        <input type="submit" class="btn btn-primary" value="Update Status" />
        </div>
    </form>
    @endif
    <form action="/admin-CancelUserOrdersId={{$order_info->order_id}}" method="POST">
        @csrf
        @method('PUT')
        <input type="submit" class="btn btn-danger" value="Cancel Order">
    </form>
    </div>
    </div>
    </div>
    @endif
    </div>

</body>
</html>