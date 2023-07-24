<html lang="en">

<head>
    @include('layouts/head')
    <title>ADMIN - Users</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
</head>
<body>
    @include('layouts/navbar-admin')
    @include('layouts/process')
    <div class="container mt-5">
    <h2><b>User Info</b></h2>
    <div class="left-line mb-5">
    <ul>
        <li>User ID: {{$user->user_id}}</li>
        <li>First Name: {{$user->first_name}}</li>
        <li>Last Name: {{$user->last_name}}</li>
        <li>Email address: {{$user->email}}</li>
    </ul>
    </div>
    
    <h3><b>Order History</b></h3>
    <table class="table text-center boxshadow">
        <tr>
            <th>Status</th>
            <th>Order ID</th>
            <th>Time Placed</th>
        </tr>
        @foreach ($orders as $o)
        <tr>
            
            <td>{{$o -> status}}</td>
            <td>{{$o -> order_id}}</td>
            <td>{{$o -> time_placed}}</td>
           
        </tr>
        @endforeach
    </table>
    <div class="pagination-prod">
            {{$orders -> links ('pagination::bootstrap-5')}}
    </div>
</div>
</body>

</html>
