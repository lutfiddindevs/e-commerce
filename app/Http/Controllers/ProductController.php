<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Order;
use App\Models\Cart;
use Session;

class ProductController extends Controller
{
    public function index() {
    	$data = Product::all();
    	return view('product', ['products' => $data]);
    }
    public function detail($id) {
        $data = Product::find($id);
        return view('detail', ['product' => $data]);
    }

    public function search(Request $req) {
    	$data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
    	return view('search', ['products' => $data]);
    } 

    public function addToCart(Request $req) {
    	if ($req->session()->has('user')) {
    		$cart = new Cart;
    		$cart->user_id = $req->session()->get('user')['id'];
    		$cart->product_id = $req->product_id;
    		$cart->save();
    		return redirect('/');
    	} else {
    		return redirect('/login');
    	}
    }

    public static function cartItem() {
    	$userID = Session::get('user')['id'];
    	return Cart::where('user_id',$userID)->count();
    }

    public function cartList() {
    	$userID = Session::get('user')['id'];
    	$products = DB::table('cart')
    	->join('products', 'cart.product_id', '=', 'products.id')
    	->where('cart.user_id', $userID)
    	->select('products.*', 'cart.id as cartId')
    	->get();

    	return view('cartlist', ['products' => $products]);
    }

    public function removeCart($id) {
    	Cart::destroy($id);
    	return redirect('cartlist');
    }

    public function orderNow() {
    	$userID = Session::get('user')['id'];
    	$total = DB::table('cart')
    	->join('products', 'cart.product_id', '=', 'products.id')
    	->where('cart.user_id', $userID)
    	->sum('products.price');

    	return view('ordernow', ['total' => $total]);
    }

    public function orderPlace(Request $req) {
    	$userID = Session::get('user')['id'];
    	$allCart = Cart::where('user_id', $userID)->get();
    	foreach ($allCart as $cart) {
    		$order = new Order;
    		$order->product_id = $cart['product_id'];
    		$order->user_id = $cart['user_id'];
    		$order->status = "pending";
    		$order->payment_method = $req->payment;
    		$order->payment_status = "pending";
    		$order->address = $req->address;
    		$order->save();
    		Cart::where('user_id', $userID)->delete();
    	}
    	return redirect('/');
    }

    public function myOrders() {
    	$userID = Session::get('user')['id'];
    	$orders = DB::table('orders')
    	->join('products', 'orders.product_id', '=', 'products.id')
    	->where('orders.user_id', $userID)
    	->get();

    	return view('myorders', ['orders' => $orders]);
    }
}
