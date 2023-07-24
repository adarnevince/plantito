<html lang="en">

<head>
    @include("layouts/head")
    <title>ADMIN - Products</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
    @include("layouts/navbar-admin")
    @include("layouts/process")
    <div class="text-center mt-5">
    <h1><b>Products</b></h1>
    </div>
    <div class="mx-3">
    <a class="btn btn-success" href="/admin-newproduct">Add new product</a>
    </div>
    <div class="text-center boxshadow mt-3">
    <table class="table">
        <tr>
            <th>Product ID</th>
            <th>Image</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Restock</th>
        </tr>
        @foreach ($products as $p)
        <tr>
            <td>{{$p->product_id}}</td>
            <td><img src="/img/{{$p->image}}" style="width: 120px" /></td>
            <td>{{$p->name}}</td>
            <td>₱{{$p->price}}</td>
            <td>{{$p->stock}}</td>
            <td>
                <form action="/admin-RestockProductId={{$p->product_id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="number" name="stock_change" value="0" style="width: 50px" />
                    <input type="submit" class="btn btn-success" value="Restock" />
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>
</body>

</html>