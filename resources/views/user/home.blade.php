@extends('layouts.user.layout')
@section('title', 'Home')
@section('content')
<div class="home container">
    <h3 class="mt-4">Latest Products : </h3>
    <div class="row mt-4 popular_movies">
        @foreach($products as $product)
        <div class="col-sm-4 d-flex flex-column m-3 card">
            <img src="/images/user-auth-background.jpeg" width="100%" height="300">
            <h5 class=" fw-bold mt-4 mb-0 text-center">{{$product->name}}</h5>
            <h6 class=" fw-bold mt-4">Price : {{$product->price}}</h6>
            <p class="text-end"><a href="/user/products/{{$product->id}}">see more</a> </p>
        </div>
        @endforeach
    </div>
</div>
@endsection
@push('user-home-style')
<style>
    .card {
        background-color: white;
        position: relative;
        width: 300px !important;
        padding: 0;
        border-radius: 25px;
    }

    .card img {
        border-radius: 25px 25px 0 0;
    }

    .card h5,
    .card h6 {
        padding-left: 15px;
    }

    .card p {
        padding-right: 12px;
        color: rgb(17, 135, 253);
        cursor: pointer;

    }

    .card:hover {

        opacity: 0.7;
    }
    .home a{
        text-decoration:none;
    }
</style>
@endpush
