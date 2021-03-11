<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

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
}
