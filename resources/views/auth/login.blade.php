@extends('layouts.app')

@section('content')
<body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form method="POST" action="{{ route('login') }}">
                        @csrf
              <h1>Login Form</h1>
              <div>
                <input type="text"  placeholder="Email or UserName" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" />
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
              <div>
                <a><button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button></a>
                    
                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}"> Lost your password? </a>
                 @endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="{{route('register')}}" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-car"></i></i> Rent Car Admin</h1>
                  <p>©2016 All Rights Reserved. Rent Car Admin is a Bootstrap 4 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    </body>
@endsection
