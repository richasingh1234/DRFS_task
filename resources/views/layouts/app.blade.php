<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Dashbaord</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <style>
.d{
     border: 1px solid green;
     border-radius: 10px;
  }
.solid{
  height: 50px;
  width: 50px;
  border: 2px solid green;
  border-radius: 100%;
  display: inline-block;
  line-height:50px;
  }
.dot {
  height: 50px;
  width: 50px;
  border: 2px dotted green;
  border-radius: 100%;
  display: inline-block;
  line-height:50px;
}
</style>
    </head>
    <body>

        <div class="" style="background-color: white;">
            <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
                <h5 class="my-0 mr-md-auto font-weight-normal">
                    <img src="{{ asset('assets/web_images/logo.png') }}" class="rounded-circle mx-auto" width="50px">
                </h5>
                <nav class="my-2 my-md-0 mr-md-3">
                    <a class="p-2 text-dark" href="{{ route('child.index') }}"><i class="fa fa-home"></i> Home</a>
                    <a class="p-2 text-dark" href="{{ route('state.create') }}">State</a>
                    <a class="p-2 text-dark" href="{{ route('district.create') }}">District</a>
                    <a class="p-2 text-dark" href="{{ route('child.index') }}" >Child</a>
                </nav>
                @guest

                <a  href="{{ route('login') }}">{{ __('Login') }}</a>

                @if (Route::has('register'))

                <a href="{{ route('register') }}">{{ __('Register') }}</a>

                @endif
                @else
                <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out" aria-hidden="true"></i>    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                </a>

                @endguest
            </div>
            <br>
            @yield('content')
        </div>
    </body>
</html>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
