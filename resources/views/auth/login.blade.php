@extends('layers.credintials')

@section('content')
<div class="d-lg-flex half">
    <div class="bg order-1 order-md-2"
        style="background: linear-gradient(to right, #ff0099c2, #493240),url('https://images.pexels.com/photos/3945313/pexels-photo-3945313.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');">

    </div>
    <div class="contents order-2 order-md-1">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7">
                    <h3>Login to <strong>Reelgood</strong></h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group first">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" id="email" placeholder="your-email@gmail.com"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            
                        </div>
                        <div class="form-group last mb-3">
                            <label for="password">Password</label>
                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="d-flex mb-5 align-items-center">
                            <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <div class="control__indicator"></div>
                            </label>
                            <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span>
                        </div>

                        <input type="submit" value="Log In" class="btn btn-block btn-primary">

                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
