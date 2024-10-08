<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('assets/admin/fonts/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('assets/admin/dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="{{asset('assets/admin/fonts/SansPro/SansPro.min.css')}}" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Log</b>in</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    @if (session('success'))
    <div id="alert-success" class="alert alert-success alert-dismissible fade show col-md-8" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div id="alert-error" class="alert alert-danger alert-dismissible fade show col-md-8" role="alert">
        {{ session('error') }}
    </div>
@endif

    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>
     
      <form action="{{route('front.login')}}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        @error('username')
            <span class="text-danger mb-3">{{$message}} </span>
          @enderror
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        @error('password')
        <span class="text-danger mb-3">{{$message}} </span>
      @enderror
        <div class="row">
          
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
          </div>
          <div class="col-12 d-flex justify-content-end">
            <a href="{{route('front.showsignup')}}" style="tab-size: 12px">Register</a>
          </div>
          <!-- /.col -->
        </div>
      </form>

      {{-- <div class="social-auth-links text-center mb-3">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> --}}
      <!-- /.social-auth-links -->

      {{-- <p class="mb-1">
        <a href="#">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> --}}
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>


<script>
  // Auto-hide messages after 3 seconds
  setTimeout(function() {
      var successAlert = document.getElementById('alert-success');
      var errorAlert = document.getElementById('alert-error');
      
      if (successAlert) {
          successAlert.style.opacity = '0';
          setTimeout(function() { successAlert.remove(); }, 600);
      }
      
      if (errorAlert) {
          errorAlert.style.opacity = '0';
          setTimeout(function() { errorAlert.remove(); }, 600);
      }
  }, 3000);
</script>


</body>
</html>
