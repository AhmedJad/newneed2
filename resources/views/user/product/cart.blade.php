@extends('layouts.user.layout')
@section('title', 'Cart')
@section('content')
<!-------------- Cart --------------------->
<div class="cart">
    <h2 class="text-center mt-3">My Cart</h2>
    <!------------details Card ----------------->
    @foreach($cartProducts as $product)

    <div class="cardDetails mt-5 shadow p-3">
        <div class="row p-3">
            <div class="col-sm-12">
                <h6>ProductName : {{$product->name}} </h6>
            </div>
        </div>

        <div class="row p-3">
            <div class="col-sm-6">
                <h6>Price : {{$product->price}} </h6>
            </div>

            <div class="col-sm-6">
                <h6>Qty :{{$product->pivot->quantity}} </h6>
            </div>
        </div>

    </div>
    @endforeach

    <!------------End details Card ----------------->
</div>
<a href="{{back()}}">Back</a>
@endsection

@push('user-cart-style')
<style>
    .cart {
        position: relative;
        width: 480px;
        height: 500px;
        margin: 90px auto;
        border-radius: 20px !important;
        /*border: none !important;*/
        border-top: 5px solid #0CB6E0 !important;
        overflow-y: auto;
        background-color: rgba(212, 238, 241, .5) !important;

    }



    .cart p {
        color: blue;
    }

    .cart h2 {
        color: #0CB6E0;
    }

    /********************  cart details *********************/
    .cardDetails {
        border: 1px solid gray;
        border-radius: 15px !important;
        width: 85%;
        margin: auto;
        background-color: white;
    }

    .cart h5 {
        margin-top: 20%;
        color: rgb(150, 146, 146);
        cursor: pointer;
        padding-left: 8px;
    }

</style>
@endpush
