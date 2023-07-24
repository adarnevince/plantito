<html lang="en">

<head>
    @include("layouts/head")
    <title>ADMIN - New Product</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>

<body>
    @include("layouts/navbar-admin")
    @include("layouts/process")
    <div class="left-line mx-5 my-3">
    <h1>New Product</h1>
    </div>
    
    <div class="container">
    <form action="/admin-products" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
        <label>Name: </label>
        <input type="text" name="name"></input></div><br>
        <div><label>Price: </label>
        <input type="number" name="price"></input></div><br>
        <div><label>Stock: </label>
        <input type="number" name="stock"></input></div><br>
        <div><label>Upload photo: </label>
        <input type="file" name="image"></input></div><br>
        
        <input type="submit" class="btn btn-success">
    </form>

</div>
</body>

</html>