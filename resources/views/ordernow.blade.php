@extends('master')
@section('content')
<div class="custom-product">
    <div class="col-sm-10">
    <table class="table">
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Amount</td>
            <td>${{$total}}</td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td>Tax</td>
            <td>0</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Delivery</td>
            <td>$ 10</td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td>Total Amount</td>
            <td>${{$total+10}}</td>
            </tr>
        </tbody>
    </table>
    <form action="/orderplace" method="Post">
    @csrf
        <div class="mb-3">
           
            <textarea name="address" class="form-control" placeholder="enter your address"></textarea>
        </div>
        <div class="mb-3">
            <label for="payment" class="form-label">Payment Method</label>
            
        </div>
        <div class="mb-3 form-check">
            <input type="radio" value="cash" name="payment" class="form-check-input" ><span>online payment</span>
            <input type="radio" value="cash" name="payment" class="form-check-input" ><span>Emi payment</span>
            <input type="radio" value="cash" name="payment" class="form-check-input" ><span>Payment on delievery</span>
            
        </div>
        <button type="submit" class="btn btn-primary">Order Now</button>
</form>
   </div>
</div>
@endsection