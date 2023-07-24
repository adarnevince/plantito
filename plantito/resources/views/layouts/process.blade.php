@foreach ($errors->all() as $error)
    <p id="notif" class="text-center"  style="background-color: red; color:white">{{$error}}</p> 
@endforeach
@if (Session::has('success'))
    <p id="notif" class="text-center"  style="background-color: green; color:white">{{Session::get('success')}}</p>
@elseif (Session::has('fail'))
    <p id="notif" class="text-center" style="background-color: red; color:white">{{Session::get('fail')}}</p>
@endif


