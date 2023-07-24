<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - Confirm Order</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
    
</head>

<body>
    @include('layouts/navbar-profile')
    <section class="pt-5 pb-5">
  <div class="container">
    <div class="row w-100">
        <div class="col-lg-12 col-md-12 col-12">
            <h3 class="display-5 mb-2 text-center">Confirm your order</h3>
            <form action="/shop-checkout" method="POST">
            @csrf
            
            <table id="shoppingCart" class="table table-condensed table-responsive">
                <thead>
                    <tr>
                        <th style="width:60%">Product</th>
                        <th style="width:12%">Price</th>
                        <th style="width:10%">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                @for ($i = 0; $i < count($product); $i++)
                @if ($added_item[$i] > 0)
                    <tr>
                        <td data-th="Product">
                            <div class="row">
                                <div class="col-md-3 text-left">
                                
                                    <img src="img/{{$product[$i]->image}}" alt="{{$product[$i]->name}}" class="img-fluid d-none d-md-block rounded mb-2 shadow " width="80px">
                                </div>
                                <div class="col-md-9 text-left mt-sm-2">
                                    <h4>Product Name</h4>
                                    <p class="font-weight-light">{{$product[$i]->name}}</p>
                                </div>
                            </div>
                        </td>
                        <td data-th="Price">₱{{$product[$i]->price * $added_item[$i]}}</td>
                        <td data-th="Quantity">
                            <p>{{$added_item[$i]}}</p>
                        </td>
                        @endif
                        <input type="text" name="order_{{$product[$i]->product_id}}" value="{{$added_item[$i]}}" hidden />
                        @endfor
                    </tr>
                    
                </tbody>
            </table>
            <div class="float-right text-right">
                <h4>Subtotal:</h4>
                <h1>₱{{$total}}</h1>
            </div>
        </div>
    </div>
    <div class="row mt-4 align-items-center">
        <div class="col-sm-2 order-md-2 text-right">
            <input type="submit" class="btn btn-success mb-4 btn-lg" value="Place Order" />
        </div>
        <div class="col-sm-10 mb-3 mb-m-1 order-md-1 text-md-left">
            <!-- <a href="/shop">
                <img src="img/left-arrow.png" width="10px" /></i> Continue Shopping</a> -->
        </div>
    </div>
</div>
</section>

</body>

</html>