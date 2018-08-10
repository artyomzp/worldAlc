<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use App\Wine;


class CartController extends Controller
{
    public function add(Request $request){
    	$product = Product::find($request->product_id);
    	Cart::add($product, $request->qty);
    	return view('cart');
    }
    public function clear(){
    	Cart::clear();
    	return view('cart');
    }
    public function del(Request $request){
    	$id = $request->product_id;
    	Cart::del($id);
    	return view('cart');
    }
    public function edit(Request $request){
    	$id = $request->product_id;
    	$qty = $request->product_qty;
    	Cart::edit($id, $qty);
    	return view('cart');
    }
}
