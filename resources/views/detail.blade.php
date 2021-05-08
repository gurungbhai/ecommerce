@extends('master')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <img class="detail-img" src="{{$products['gallery']}}" alt="">
        
        </div>
        <div class="col-sm-6">
            <a href="/">Back</a>
            <h2>{{$products['name']}}</h2>
            <h2>price:{{$products['price']}}</h2>
            <h3>Detail: {{$products['description']}}</h3>
            <h4>Category: {{$products['category']}}</h4>
            <br>
            <form action="/add_to_cart" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{$products['id']}}">        
                <button class='btn btn-primary'>ADD to Cart</button>
                <br>
                <br>
                <br>
                </form>
                <button class='btn btn-success'>Buy Now</button>
        </div>

    
    </div>
</div>
@endsection