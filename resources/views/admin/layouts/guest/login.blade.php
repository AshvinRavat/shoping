<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
           <div class="card">
              <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                <form action="{{ route('admin.login') }}" method="post">
                  @csrf
                <div class="input-group mb-3">
                  <input type="email"
                    id="email" 
                    name="email" 
                    class="form-control @error('email')
                      is-invalid
                    @enderror" 
                    placeholder="Email">
                  <div class="input-group-append">
                      <div class="input-group-text">
                        <i class="fa-solid fa-envelope"></i>
                      </div>
                  </div>
                  @error('email')
                    <span class="is-invalid invalid-feedback">
                      {{ $message }}
                    </span>
                  @enderror
                </div>
                <div class="input-group mb-3">
                  <input type="password" 
                    name="password"
                    class="form-control"
                    @error('password')
                      is-invalid
                    @enderror 
                    placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <i class="fa-solid fa-lock"></i>
                    </div>
                  </div>
                </div>
                @error('password')
                    <span class="invalid-feedback">
                      {{ $message }}
                    </span>
                @enderror
                <div class="row">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="remember">
                      <label for="remember">
                        Remember Me
                      </label>
                    </div>
                  </div>
                  <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                  </div>
                </div>
              </form>
          </div>
        </div>
      </div>
  </body>
</html>
