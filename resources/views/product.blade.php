@extends('master')
@section('content')
<div class="custon-product">
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner ">
  @foreach ($products as $item)
    <div class="item {{$item['id']==1?'active':''}}">
    <a href="detail/{{$item['id']}}">
      <img class="slider-img" src="{{$item['gallery']}}">
      <div class="carousel-caption slider-text">
        <h5>{{$item['name']}}</h5>
        <p>{{$item['description']}}</p>
      </div>
    </div>
    </a>
   @endforeach
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<div class="trending-wrapper">
<h3>trending Products</h3>
@foreach ($products as $item)
<div class="item {{$item['id']==1?'active':''}}">
    <div class="trending-item">
    <a href="detail/{{$item['id']}}">
      <img class="trending-image" src="{{$item['gallery']}}">
      <div class="">
        <h5>{{$item['name']}}</h5>
      </div>
    </div>
    </a>
   @endforeach

</div>

</div>
@endsection