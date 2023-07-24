<html lang="en">
<head>
    @include('layouts/head')
	<title>Plantito - Login</title>
	<link rel="stylesheet" href="css/login.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="main">  
		<input type="checkbox" id="chk" aria-hidden="true">
			<div class="login">
				<form action="/profile" method="POST">
                @csrf
					<label for="chk" aria-hidden="true" id="login" class="labelone">Login</label>
                    
                    <div class="col-lg-12 mt-5">
                        <div class="form-floating">
                        <input type="email" class="form-control regForm" id="emailFloat_login" name="email" placeholder="Email" required>
                        <label for="emailFloat_login" class="formLabel">Email:</label>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="form-floating">
                        <input type="password" class="form-control regForm" id="passFloat_login" name="password" placeholder="Password" required>
                        <label for="passFloat_login" class="formLabel">Password:</label>
                        </div>
                    </div>
					<button>Login</button>
                    
                    @include('layouts/process')
                
                    <div class="col-lg-12">

                        <small class="mt-5"><a href="/home" style="text-decoration:none; color:black"><img src="img/left-arrow.png" style="width: 10px" class="mb-1"/> Go back to homepage</a></small>
                    </div>
				</form>
			</div>

			<div class="signup">
				<form action="/login" method="POST">
                @csrf
					<label for="chk" aria-hidden="true" id="aReg" class="labelone">Not registered yet?</label>

                    <div class="col-lg-12">
                        <div class="form-floating">
                        <input type="text" class="form-control regForm" id="nameFloat" name="first_name" placeholder="First name" required>
                        <label for="nameFloat" class="formLabel">First name:</label>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="form-floating">
                        <input type="text" class="form-control regForm" id="nameFloat" name="last_name" placeholder="Last name" required>
                        <label for="nameFloat" class="formLabel">Last name:</label>
                        </div>
                    </div>

                    <div class="col-lg-12 mt-2">
                        <div class="form-floating">
                        <input type="email" class="form-control regForm" id="emailFloat" name="email" placeholder="Email" required>
                        <label for="emailFloat" class="formLabel">Email:</label>
                        </div>
                    </div>

					<div class="col-lg-12 mt-2">
                        <div class="form-floating">
                        <input type="password" class="form-control regForm" id="passFloat" name="password" placeholder="Password" required>
                        <label for="passFloat" class="formLabel">Password:</label>
                        </div>
                    </div>
                    <div class="mb-4">
					<button>Sign up</button>
                    </div>

                    <hr>
                    <div class="col-lg-12">
                    <small class="text-light">By clicking Sign up, you agree to the terms of use.</small>
                    </div>
				</form>
			</div>
	</div>
</body>
</html>