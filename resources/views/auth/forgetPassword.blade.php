<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forgot Password</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <main class="login-form">
        <div class="cotainer">
            <div class="row justify-content-center">
                <div id="highlighted" class="hl-basic hidden-xs">
                    <div class="container-fluid">
                      <div class="row">
                        <div class="col-sm-9 col-sm-offset-3 col-md-9 col-md-offset-3 col-lg-10 col-lg-offset-2">
                          <h1>Forgot Password</h1>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="content" class="interior-page">
                    <div class="container-fluid">
                      <div class="row">
                        <!--Sidebar-->
                        <div class="col-sm-3 col-md-3 col-lg-2 sidebar equal-height interior-page-nav hidden-xs">
                         
                        </div>
                  
                        <!--Content-->
                        <div class="col-sm-9 col-md-9 col-lg-10 content equal-height">
                          <div class="content-area-right">
                            @if (Session::has('message'))
                                    <div class="alert alert-success" role="alert">
                                        {{ Session::get('message') }}
                                    </div>
                             @endif 
                             <form action="{{ route('forget.password.post') }}" method="POST">
                             @csrf
                            <div class="row">
                              <div class="col-md-5 forgot-form">
                                <p>Please enter your email address below and we will send you information to change your password.</p>
                                <label class="label-default" for="un">Email Address</label> 
                                <input   id="email_address"  class="form-control" type="email" name="email"
                                required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif<br>
                                <button id="mybad" type="submit" class="btn btn-primary" role="button"> FORGOT</button>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               
            </div>
        </div>
    </main>
</body>

</html>
