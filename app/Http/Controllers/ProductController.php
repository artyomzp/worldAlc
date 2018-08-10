<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Wine;
use App\Category;
use App\Order;
use App\OrderItem;
use Validator;
use Auth;
use Mail;
use App\Cart;

class ProductController extends Controller
{
    function show($id)
    {
        $categories = Category::all();
        $products = Product::where('id', '=', $id)->first();//->get()
        return view('oneproduct',  compact('products', 'categories'));
    }
    function order()
    {
        $user = Auth::user()?Auth::user():null;
 		return view('order', compact('user'));
    }
    function complete(Request $request)
    {
        //сохранить заказ в БД
        $this->validate($request, [
        'email' => 'required|max:50|email',
        'name' => 'required|max:30',
        'phone' => 'required|max:30',
        'address' => 'required|max:100',
        'payment' => 'required',
         ]);// проверка ввода с формы

        $order = new Order;
        $order->totalSum = session('totalSum');
        $order->email = $request->email;
        $order->name = $request->name;
        $order->phone = $request->phone;
        $order->address = $request->address;
        $order->payment = $request->payment;
        $order->save();

        foreach (session('cart') as $product) 
        {
            $item = new OrderItem;
            $item->order_id = $order->id;
            $item ->product_id = $product['id'];
            $item->qty = $product['qty'];
            $item->price = $product['price'];
            $item->save();
        }
        // Отправить письма с подтверждениями
        Mail::send('mail.admin', compact('order'), function($m){
            $m->from('wizzard.zp@gmail.com');
            $m->to('wizzard.zp@gmail.com')->subject('New Order');
        });
        Mail::send('mail.user', compact('order'), function($m) use($order){
            $m->from('wizzard.zp@gmail.com');
            $m->to($order->email)->subject('Your Order on My site');
        });
        
        // Покахать спасибо
        Cart::clear();

        return redirect('/')->with('success','Buy more');
    }
}
