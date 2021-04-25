@extends('layouts.user.layout')
@section('title', 'Login')
@section('content')
<div class="container-fluid bg" style="background: url('/images/user-auth-background.jpeg');background-size: cover; height: 100vh;position: relative;">
    <div class="row overlay justify-content-center align-items-center">
        <form action="/user/login" method="post" class="form row mt-5">
            @csrf
            <!-----------logo----------------->
            <div class="col-12 mb-5">
                <svg height="40" width="100%" class="logo">
                    <linearGradient id="MyGradient">
                        <stop offset="5%" stop-color="#87CCA6" />
                        <stop offset="95%" stop-color="#0CB6E0" />
                    </linearGradient>
                    <text x="140" y="30" fill="url(#MyGradient)">Needeg</text>
                </svg>
            </div>
            <!-----------------sign in by Google -------------------->
            <div class="col-sm-6 mb-4">
                <button type="submit" class="btn google w-100 shadow rounded"><i class="fab fa-google-plus-g"></i>Sign in with Google</button>
            </div>

            <!---------------- sign in by facebook ------------------->
            <div class="col-sm-6 mb-4">
                <button type="submit" class="btn btn-primary w-100 shadow rounded" style="background-color: #355391;"><i class="fab fa-facebook-square"></i> Sign in with Facebook</button>
            </div>

            <!----------------email ---------------------------->
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                <input  name="email" value="{{old('email')}}" type="email" class="form-control {{Session::has('error')?'is-invalid':''}}" placeholder="Email" aria-label="email" aria-describedby="addon-wrapping">
            </div>
            @if(Session::has("error"))
            <div class="error text-danger">
                {{Session::get("error")}}
            </div>
            @endif
            <!-------------- password-------------------------->
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input name="password" value="{{old('password')}}" type="password" class="form-control" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>

            <div class="d-grid">
                <button type="submit" style="background-color: #0CB6E0;" class="btn btn-primary shadow rounded">Sign In</button>
            </div>

            <div class="mt-2 signup">
                Don't Have an account ? <a href="/user/register">create account</a>
            </div>

        </form>

    </div>
</div>
@endsection
@push("user-login-style")
<style>
    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
    }

    .overlay .form {
        background-color: white;
        width: 480px;
        padding: 80px 15px 90px 15px;
    }

    .overlay .form button {
        border: none;

    }

    .overlay .form .fab {
        font-size: 20px;
    }

    .google {
        background-color: white;
        color: black;
    }

    .fa-google-plus-g {
        color: rgb(223, 17, 17);
    }

    .logo text {
        font-weight: bold;
        font-size: 40px;

    }

    .signup {
        color: gray;
    }

    .signup a {
        color: rgb(10, 95, 134);
        font-weight: bold;
        text-decoration: none;
    }

    .error {
        margin-top: -13px;
        margin-bottom: 30px;
    }


</style>
@endpush
