@extends('layouts.frontend')

@section('content')

{{-- <section class="login-section bg-grad-sharp pt-lg-5">
    <div class="container pt-5">
        <div class="row">
            <div class="col-lg-6 d-md-flex align-items-center justify-content-center d-none">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" class="img-fluid">
            </div>
            <div class="col-lg-6">
                <form id="login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="card card-login mx-auto my-5 border-0 shadow-lg bg-transparents">
                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <span>{{ $message }}</span>
                            </div>
                            @endif
                            <h3 class="login-account"><span>Login To Your Account</span>
                            </h3>
                            <div class="form-group">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input class="form-control" id="email" name="email" type="email" placeholder="Email" autofocus/>
                                @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group position-relative">
                                <label for="password" class="form-label">Password<span class="text-danger">*</span></label>
                                <input class="form-control" id="password" name="password" type="password" placeholder="Password"/><i toggle="#password-field" class="fi fi-rr-eye-crossed pass-eye-icon toggle-password"></i>
                                @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="login-buttons">
                                <button type="submit" class="btn login-button btn-block font-weight-bold">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section> --}}

<main class="page-height">
    <section class="login-page-section">
      <div class="wave">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
          <path fill="#3b8ff3" fill-opacity="1" d="M0,96L48,101.3C96,107,192,117,288,117.3C384,117,480,107,576,90.7C672,75,768,53,864,48C960,43,1056,53,1152,80C1248,107,1344,149,1392,170.7L1440,192L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>
      </div>
      <div class="container">
        <div class="login-page-items">
          <div class="login-items">
            <div class="row no-gutters">
              <div class="col-lg-6">
                <div class="card-login mx-auto my-5 border-0  bg-transparents">
                    <div class="form-class">
                        <h3 class="login-title">Login To Your Account</h3>
                        <div class="body-form-info">
                            <form id="login" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class=" form-group col-md-12 form-group ">
                                    <label class="form-label" for="email">Email:</label>
                                    <input id="email" class="form-input form-control" type="email" placeholder="Email" name="email" autofocus>
                                </div>
                                <div class="form-group col-md-12">
                                    <label class="form-label" for="password">Password:</label>
                                    <input id="password" class="form-input form-control" autocomplete="new-password" placeholder="Password" type="password" name="password">
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn login-button btn-block font-weight-bold">Login</button>
                                </div>
                            </form>
                        </div>
                    </div>
                  </div>          
              </div>
              <div class="col-lg-6">
                <div class="overlay-items">
                  <div class="overlay-panel">
                    <img src="{{ asset('images/login-vector.png') }}"  alt="Logo" class="img-fluid login-img">
                  </div>
                  <div class="overlay">
                    <h4 class="overlay-title">College Management System </h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</main>

{{-- <div class="w-full max-w-xs mx-auto">
    <form method="POST" action="{{ route('login') }}" class="bg-white shadow rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="emailaddress">
                Email Address
            </label>
            <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email" id="emailaddress" placeholder="email@example.com">
            @error('email')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                Password
            </label>
            <input class="shadow appearance-none border @error('password') border-red-500 @enderror rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="password" id="password" placeholder="******************">
            @error('password')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label class="block text-gray-500 font-bold">
                <input class="mr-2 leading-tight" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                <span class="text-sm">
                    Remember Me
                </span>
            </label>
        </div>
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                Sign In
            </button>
        </div>
    </form>
</div> --}}

<script>
    $("#login").validate({
        errorClass: "invalid-input",
        rules: {
            email: { required: true, noSpace : true , email_regex  : /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/i },
            password: { required: true },
        },
        messages: {
            email: "Please Enter Email",
            password: "Please Enter Password",
        },
        submitHandler: function(form) {
            showLoader()
            form.submit();
        }
    });
</script>

@endsection