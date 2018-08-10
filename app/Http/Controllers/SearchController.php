<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;
use App\Product;
use App\Wine;

class SearchController extends Controller
{
    public function search(Request $request)
{
        	$search=$request->searchform;   
        	$search='%'.$search.'%';
        	$products=Product::where('name','like', $search)->paginate(6);
       	 return view('search',['products'=>$products,'id'=>0]);
}

}
