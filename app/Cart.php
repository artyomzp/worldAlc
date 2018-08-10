<?php

namespace App;

use Session;

class Cart
{
    public static function add($product, $qty)
    {
        if($product->salePrice!=null){
            $prod = $product->salePrice;
        }
        else {$prod = $product->price;}
    	if(Session::get('cart.p'.$product->id))
    	{
    		$qtyOld = Session::get('cart.p'.$product->id.'.qty');
    		Session::put('cart.p'.$product->id.'.qty', $qty+$qtyOld);
    	}
        else {
            Session::put('cart.p'.$product->id.'.name', $product->name);
            Session::put('cart.p'.$product->id.'.image', $product->image);
            Session::put('cart.p'.$product->id.'.price', $prod);
            Session::put('cart.p'.$product->id.'.id', $product->id);
            Session::put('cart.p'.$product->id.'.qty', $qty);
        }
    	self::totalSum();
    	
    }
    public static function totalSum(){
    	$sum=0;
    	foreach(Session::get('cart') as $p){
                $sum+=$p['price']*$p['qty'];
    	}
    	Session::put('totalSum', $sum);
    }
    public static function clear()
    {
    	Session::forget('cart');
    	Session::forget('totalSum');
    }
    public static function del($id)
    {
    	Session::forget('cart.p'.$id);
    	self::totalSum();
    }
    public static function edit($id, $qty)
    {
    	Session::put('cart.p'.$id.'.qty', $qty);
    	self::totalSum();
    }
}
