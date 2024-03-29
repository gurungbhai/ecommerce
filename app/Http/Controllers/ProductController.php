<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\order;
# use Illuminate\Contracts\Session\Session;
use Session;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    function index()
    {
        $data=Product::all();
        return view('product',['products'=>$data]);
    }
    function detail($id)
    {
        $data= Product::find($id);
        return view('detail',['products'=>$data]);
    }
    function search(Request $req)
    {
        $data=Product::
        Where('name','like', '%'.$req->input('query').'%')
        ->get();
        return view("search",['products'=>$data]);
    }
    function addtoCardt(Request $req)
    {
        if($req->session()->has('user'))
        {
            $cart =new cart;
            $cart->user_id=$req->session()->get('user')['id'];
            $cart->product_id=$req->product_id;
            $cart->save();
            return redirect("");
        }
        else{
            return redirect('login');
        }
        
    }
    static function cartItem()
    {
        $userId=session()->get('user')['id'];
        return Cart::Where('user_id',$userId)->count();
    }
    function cartlist()
    {
        $userId=session()->get('user')['id'];
        $products=DB::table('cart')
        ->join('products','cart.product_id',"=",'products.id')
        ->where('cart.user_id',$userId)
        ->select('products.*','cart.id as cart_id')
        ->get();

        return view('cartlist',['products'=>$products]);
    }
    function removecart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }
    function ordernow()
    {
        $userId=session()->get('user')['id'];
        $total= $products=DB::table('cart')
        ->join('products','cart.product_id',"=",'products.id')
        ->where('cart.user_id',$userId)
        ->sum('products.price');
        return view('ordernow',['total'=>$total]);
    }
    function orderplace(Request $req)
    {
        $userId=session()->get('user')['id'];
        $allcart=Cart::where('user_id',$userId)->get();
        foreach($allcart as $cart)
        {
            $order= new order;
            $order->product_id=$cart['product_id'];
            $order->user_id=$cart['user_id'];
            $order->status='pending';
            $order->payment_method=$req->payment;
            $order->payment_status="pending";
            $order->payment_method=$req->payment;
            $order->address=$req->address;
            $order->save();
            Cart::where('user_id',$userId)->delete();   
        }
        $req->input();
        return redirect("/");

    }
    function myorder()
    {
        $userId=session()->get('user')['id'];
        $orders=DB::table('orders')
        ->join('products','orders.product_id',"=",'products.id')
        ->where('orders.user_id',$userId)
        ->get();
        return view('myorder',['orders'=>$orders]);
    }

}
