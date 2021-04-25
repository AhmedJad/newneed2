@extends('layouts.user.layout')
@section('title', 'Product')
@section('content')
<div class="container-fluid">
    <div class="row bg-light">

        <div class="col-md-3 column p-5">
            <img src="/images/user-auth-background.jpeg" width="100%" height="400">
        </div>

        <div class="col-md-7 sec_column text-dark p-5 mt-4">
            <h1>{{$product->name}}</h1>
            <h6>{!!$product->description!!}</h6>
            <h5 class="mt-4">Price :{{$product->price}}</h5>
            <div class="d-flex mt-5">
                <h6>Qty : </h6>
                <input id="quantity" type="number" min="1" max="5" value="1">
            </div>
            <button id="add-to-cart" onclick="addToCard()" class="btn btn-primary mt-5">
                <span id="add-to-cart-text">Add To Cart</span>
                <div id="spinner" style="display:none" class="mx-auto spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </button>
        </div>
    </div>

    <div style="display:none" id="success-message" class="text-center" role="alert">
        Added <span> </span> Items To Cart Successfully <a href="/user/products/show-cart" class="alert-link">Show Cart</a>
    </div>
</div>
@endsection
@push('user-product-style')
<style>
    input[type="number"] {
        height: 25px;
        margin-left: 6px;
    }

    span {
        font-weight: bold;
        font-size: 20px;
    }

    #add-to-cart {
        min-width: 200px;
        max-width: 200px;
    }
    #success-message{
        color:white;
    }
</style>
@endpush
@push('user-product-js')
<script>
    function addToCard() {
        $("#add-to-cart-text").css("display", "none");
        $("#spinner").css("display", "block");
        $.post("/user/products/add-to-cart", {
                "_token": "{{ csrf_token() }}"
                , product_id: "{{$product->id}}"
                , quantity: $("#quantity").val()
            }
            , function(data, status) {
                $("#add-to-cart-text").css("display", "block");
                $("#spinner").css("display", "none");
                $("#add-to-cart").attr("disabled", "disabled");
                $("#success-message").css("display", "block");
            });
    }

</script>
@endpush
