<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="mt-5" style="background-color: white;">
  <div class="row">
     <div class="col-md-4"></div>
       <div class="col-md-4">
        <div class="">
          <div class="row">
            <div class="col-3"></div>
            <div class="col-5">
              <div class="text-center"> 
               <img src="{{ asset('assets/web_images/logo.png') }}" class="rounded-circle mx-auto" width="200px">
              </div>
            </div>
            <div class="col-4"></div>
           </div>
          <div class="mt-4">
            <h3 class="text-center">Login</h3>
          </div>
          <div class="card-body">
              <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        
              <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                   @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                
              </div>
              <div class="form-group">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
              </div>
              <button type="submit" class="btn btn-block btn-success">Submit</button>
              
               @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
             </form>
          </div>
        </div>
       </div>
     <div class="col-md-4"></div>
  </div>
</div>
</body>
</html>
