<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - Shop</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
    @include('layouts/navbar-profile')
    <div class="container vh mt-5">
    <div class="mb-5">
    <h2><b>Your order has been placed!</b></h1>
    </div>
    <div class="left-line">
    <p>Order ID: {{$order->order_id}}</p>
    
    </div>
    <a href="/orders">Go to My Orders</a>
    </div>
    
    @include('layouts/footer')
</body>

</html>