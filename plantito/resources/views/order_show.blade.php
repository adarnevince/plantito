<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - Order Details</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
@include('layouts/navbar-profile')
    <div class="container">
        <div class="text-center mt-5">
        <h1><b>Order Details</b></h1>
        <div class="bottom-line"></div>
        </div>
        
        <!-- Progress Bar -->
        <div class="main-progress">
        
        <div class="container px-1 px-md-5 ">
        <div class="container ">
                <a href="/orders" class="links"><img src="img/left-arrow.png" width="20px" /> Back to Orders</a>
            </div>
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">#{{$order_info->order_id}} ({{$order_info->time_placed}})</span></h5>
            </div>
            <div class="d-flex flex-column">
                <p>Status: <span>{{$order_info->status}}</span></p>
            </div>
            @if ($order_info->status == 'Delivered')

            <form action="/order-received={{$order_info->order_id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-primary" value="Received Order" />
            </form>
            @endif
            @if ($order_info->status == 'Waiting')
            <form action="/order-cancelled={{$order_info->order_id}}" method="POST">
                @csrf
                @method('PUT')
                <input type="submit" class="btn btn-danger" value="Cancel Order" />
            </form>
            @endif
        </div>
        <!-- Add class 'active' to progress -->
        <div class="row d-flex justify-content-center">
            
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                @if ($order_info->status == 'Waiting')
                <li class="step0">Order Processed</li>
                <li class="step0">Waiting for Delivery</li>
                <li class="step0">Delivering</li>
                <li class="step0">Delivered</li>
                @endif
            
                @if ($order_info->status == 'Accepted')
                <li class="active step0">Order Processed</li>
                <li class="step0">Waiting for Delivery</li>
                <li class="step0">Delivering</li>
                <li class="step0">Delivered</li>
                @endif

                @if ($order_info->status == 'Waiting for Delivery')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                <li class="step0">Delivering</li>
                <li class="step0">Delivered</li>
                @endif

                @if ($order_info->status == 'Delivering')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                <li class="active step0">Delivering</li>
                <li class="step0">Delivered</li>
                @endif

                @if ($order_info->status == 'Delivered' or $order_info->status == 'Received')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                <li class="active step0">Delivering</li>
                <li class="active step0">Delivered</li>
                @endif
                
                
                
                
                <!-- @if ($order_info->status == 'Waiting for Delivery')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                @else
                <li class="step0">Waiting for Delivery</li>
                @endif

                @if ($order_info->status == 'Delivering')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                <li class="active step0">Delivering</li>
                @else
                <li class="step0">Delivering</li>
                @endif

                @if ($order_info->status == 'Delivered' or $order_info->status == 'Received')
                <li class="active step0">Order Processed</li>
                <li class="active step0">Waiting for Delivery</li>
                <li class="active step0">Delivering</li>
                <li class="active step0">Delivered</li>
                @else
                <li class="step0">Delivered</li>
                @endif -->
            </ul>
            </div>
        </div>
    </div>
</div>
</div>
        <div class="mb-3">
            <h2>Items Ordered</h2>
        </div>
        
        
        <div class="row">
            <div class="col-lg-12">
                <table class="table text-center boxshadow">
                    <tr>
                        <th>Item</th>
                        <th>Info</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Item Total</th>
                    </tr>
                    @foreach ($ordered_products as $op)
                    <tr>
                        <td><img src="/img/{{$op->image}}" width="100px"/></td>
                        <td><b>{{$op->name}}</b></td>
                        <td>{{$op->quantity}}</td>
                        <td>₱{{$op->price}}</td>
                        <td>₱{{$op->price * $op->quantity}}</td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <div class="text-end mt-4">
            <h3><b>Total: ₱{{$total}}</b></h3>
            </div>
            @if ($order_info->status == 'Received' and $order_info->status == 'Cancelled')
            <div class="text-start">
            <h3><a href="/completed-orders"><img src="img/left-arrow.png" width="100px"/>Back</a></h3>
            </div>
            @endif
    </div>
</div>
    @include('layouts/footer')
</body>

</html>
