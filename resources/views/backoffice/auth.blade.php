<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.top')
</head>

<body class="bg-gradient-login">
  <!-- Login Content -->
  <div class="container-login">
    <div class="row justify-content-center">
      <div class="col-xl-4 col-lg-12 col-md-9" style="margin-top: 100px">
        <div class="card shadow-sm my-5">
          <div class="card-body p-0">
            <div class="row">
              <div class="col-lg-12">
                <div class="login-form">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                  </div>
                  <form action="{{ route('login-process') }}" method="POST">
                    @csrf
                    @if (session('status'))
                      <div class="text-center alert alert-success">
                      {{ session('status') }}
                      </div>
                    @elseif(session('statusErr'))
                      <div class="text-center alert alert-danger">
                      {{ session('statusErr') }}
                      </div>
                    @endif
                    <div class="form-group">
                      <label for="">Username</label>
                      <input type="text" class="form-control" id="username" name="username"
                        placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                      <label for="">Password</label>
                      <input type="password" class="form-control"  placeholder="Password" name="password" id="password">
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                        <input type="checkbox" class="custom-control-input" id="customCheck">
                        <label class="custom-control-label" for="customCheck" id="show">Show Password</label>
                      </div>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary btn-block" type="submit">Login</button>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                  </div>
                  <div class="text-center">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Login Content -->
  @include('layout.bottom')
  <script>
    $(document).ready(function () {
          $('#show').click(function () {
              var passwordField = $('#password');
              var passwordFieldType = passwordField.attr('type');

              if (passwordFieldType === 'password') {
                  passwordField.attr('type', 'text');
              } else {
                  passwordField.attr('type', 'password');
              }
          });
      });
  </script>
</body>

</html>