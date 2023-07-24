<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - Shop</title>
    <link rel="stylesheet" href="css/navbar-shop.css" />
    <script src="js/quantity.js"></script>
    <script src="js/popup.js"></script>
</head>

<body>
    @include('layouts/navbar-shop')
    
    <section class="shop-title" id="shop-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-12 product-title" hidden>
                        <h1>Shop</h1>
                    </div>
                    <div class="bottom-line" hidden></div>
                </div>
            </div>
        </div>
        <section class="shop mt-5">
        <form action="/shop" method="POST">
        @csrf
        <div class="row product-list">
            @foreach ($prodlist as $pl)
            <div class="col-md-4 mb-5 ">
                <section class="panel ">
                    <div class="pro-img-box boxshadow ">
                        <img src="img/{{$pl->image}}" alt="{{$pl->name}}" />
                        <!-- <a href="#" class="adtocart">
                            <i class="fa fa-shopping-cart"></i>
                        </a> -->
                    </div>
                    
                   
                    <div class="panel-body text-center">
                        <h4>
                            
                            <a href="#" class="pro-title">
                                {{$pl->name}}
                            </a>
                        </h4>
                        <p class="price"> ₱{{$pl->price}}</p>
                    </div>
                    <div class="panel-body text-center">Stock available: {{$pl->stock}}

                        <input type="number" style="width: 50px" min="0" max="99" class="order_{{$pl->product_id}}" name="order_{{$pl->product_id}}" value="0">
                    </div>
                    <div class="panel-body text-center">
                        <input type="submit" value="Add to cart" class="btn btn-success" />
                    </div>
                </section>
                
            </div>
            @endforeach
            <div class="pagination-prod">
            {{$prodlist -> links ('pagination::bootstrap-5')}}
            </div>
        </div>
        </form>
        </section>
        @include('layouts/footer')
       
</body>



</html>