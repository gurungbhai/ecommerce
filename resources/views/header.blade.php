<?php 
  use App\Http\Controllers\ProductController;
use Illuminate\Contracts\Session\Session;

$total=0;
if (session()->has('user')) {
  $total= ProductController::cartItem();
}
  
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">E-Comm</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home </a></li>
        @if(session()->has('user'))
        <li><a href="/myorder">Order </a></li>
        @endif
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if(session()->has('user'))
        <li><a href="cartlist">Cart({{$total}})</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" href="#"  data-toggle="dropdown" >
            {{session()->get('user')['name']}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="logout">Logout</a></li>
            <li><a class="dropdown-item" href="#">change password</a></li>
            
          </ul>
        </li>
        @else
        <li><a href="login">Login</a></li>
        <li><a href="register">Register</a></li>
        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>