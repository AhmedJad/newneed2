@extends('layouts.user.layout')
@section('content')
<div class="container-fluid bg" style="background: url('/images/user-auth-background.jpeg');background-size: cover; height: 100vh;position: relative;">
    <div class="row overlay justify-content-center align-items-center">

        <form method="post" action="/user/register" class="form row mt-5">
            @csrf
            <!---------------Logo----------------->
            <div class="col-12 mb-5">
                <svg height="40" width="100%" class="logo">
                    <linearGradient id="MyGradient">
                        <stop offset="5%" stop-color="#87CCA6" />
                        <stop offset="95%" stop-color="#0CB6E0" />
                    </linearGradient>
                    <text x="140" y="30" fill="url(#MyGradient)">Needeg</text>
                </svg>
            </div>

            <!---------------name ------------->

            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-user"></i></span>
                <input name="name" value="{{old('name')}}" type="text" class="form-control {{$errors->has('name')?'is-invalid':''}}" placeholder="Name" aria-label="name" aria-describedby="addon-wrapping">
            </div>
            @error('name')
            <div class="error text-danger">
                {{$message}}
            </div>
            @enderror

            <!----------------email------------------->
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-envelope"></i></span>
                <input name="email" value="{{old('email')}}" type="email" class="form-control {{$errors->has('email')?'is-invalid':''}}" placeholder="Email" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            @error('email')
            <div class="error text-danger">
                {{$message}}
            </div>
            @enderror
            <!---------------phone--------------------->
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-phone-alt"></i></span>
                <input name="phone" type="text" value="{{old('phone')}}" class="form-control {{$errors->has('phone')?'is-invalid':''}}" placeholder="Phone" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            @error('phone')
            <div class="error text-danger">
                {{$message}}

            </div>
            @enderror
            <!---------------password ------------------->
            <div class="input-group flex-nowrap mb-3">
                <span class="input-group-text" id="addon-wrapping"><i class="fas fa-key"></i></span>
                <input name="password" type="password" value="{{old('password')}}" class="form-control {{$errors->has('password')?'is-invalid':''}}" placeholder="Password" aria-label="Username" aria-describedby="addon-wrapping">
            </div>
            @error('password')
            <div class="error text-danger">
                {{$message}}
            </div>
            @enderror
            <div class="d-grid">
                <button type="submit" style="background-color: #0CB6E0;" class="btn btn-primary shadow rounded">Sign Up</button>
            </div>

            <div class="mt-2 signup">
                Already Have an account ? <a href="/user/login">Sign In</a>
            </div>

        </form>

    </div>
</div>
@endsection
@push('user-register-style')
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
        color: rgb(6, 82, 117);
        font-weight: bold;
        text-decoration: none;
    }


    .error {
        margin-top: -13px;
        margin-bottom: 30px;
    }

</style>
@endpush
