<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use App\Wine;
use App\Manufacture;
use App\Country;
use App\WinesColor;
use App\WinesType;



class CategoryController extends Controller
{
    function show($id)
    {
    	$categories = Category::all();
    	$cat = Category::where('id', '=', $id)->first();
    	return view('category', compact('categories', 'cat'));
    }
	function wine()
	{
		$category = Category::where('id', '=', 1)->first();
		$products = Wine::paginate(9);
		$sale = Wine::where('inStock', '=', 1)->get();
		$manufactures = Manufacture::all();
		$countries = Country::all();
		$colors = WinesColor::all();
		$types = WinesType::all();

		return view('wine', compact('category', 'products', 'sale', 'manufactures', 'countries', 'colors', 'types'));
	}
	function gin()
	{
		$category = Category::where('id', '=', 3)->first();
		$products = Product::where('category_id', '=', 3)->paginate(9);
		$sale = Product::where('inStock', '=', 1)->get();
		$manufactures = Manufacture::all();
		$countries = Country::all();
		return view('gin', compact('category', 'products', 'manufactures', 'countries', 'colors', 'types'));
	}
	function konyak()
	{
		$category = Category::where('id', '=', 2)->first();
		$products = Product::where('category_id', '=', 2)->paginate(9);
		$sale = Product::where('inStock', '=', 1)->get();
		$manufactures = Manufacture::all();
		$countries = Country::all();
		return view('konyak', compact('category', 'products', 'manufactures', 'countries', 'colors', 'types'));
	}
	function whisky()
	{
		$category = Category::where('id', '=', 5)->first();
		$products = Product::where('category_id', '=', 5)->paginate(9);
		$sale = Product::where('inStock', '=', 1)->get();
		$manufactures = Manufacture::all();
		$countries = Country::all();
		return view('whisky', compact('category', 'products', 'manufactures', 'countries', 'colors', 'types'));
	}
	function rum()
	{
		$category = Category::where('id', '=', 4)->first();
		$products = Product::where('category_id', '=', 4)->paginate(9);
		$sale = Product::where('inStock', '=', 1)->get();
		$manufactures = Manufacture::all();
		$countries = Country::all();
		return view('rum', compact('category', 'products', 'manufactures', 'countries', 'colors', 'types'));
	}
}
