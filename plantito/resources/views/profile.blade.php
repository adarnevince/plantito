<html lang="en">

<head>
    @include('layouts/head')
    <title>Plantito - My Profile</title>
    <link rel="stylesheet" href="css/navbar-profile.css" />
    <link rel="stylesheet" href="css/profile.css" />
</head>

<body>
    @include('layouts/navbar-profile')
    <section class="profile">
    
    <div class="container-xl">
    <div class="row">
        <div class="col-xl-4">
           
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                   
                    <img class="img-account-profile rounded-circle mb-2" src="" alt="">
                  
                    <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div>
                   
                    <button class="btn btn-primary" type="button">Upload new image</button>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
           
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                        <div class="mb-3">
                            <p class="small mb-1">User ID: {{$user->user_id}}</p>
                            
                        </div>
                       
                        <div class="row gx-3 mb-3">
                            
                            <div class="col-md-6">
                                <p class="small mb-1" >First name: {{$user->first_name}}</p>
                                
                            </div>
                          
                            <div class="col-md-6">
                                <p class="small mb-1">Last name: {{$user->last_name}}</p>
                                
                            </div>
                        </div>
                       
                        <div class="row gx-3 mb-3">
                           
                            <div class="col-md-6">
                                <p class="small mb-1" >Email address: {{$user->email}} </p>
                                
                            </div>
                            <div class="col-md-6">
                                <p class="small mb-1" >Contact #: ~ </p>
                                
                            </div>
                        </div>
                        </div>
                        
                   
                </div>
            </div>
        </div>
    </div>
</div>

    </section>
    @include('layouts/footer')
</body>
</html>