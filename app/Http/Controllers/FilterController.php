<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Country;
use App\Manufacture;
use App\Category;
use App\WinesColor;
use App\WinesType;



class FilterController extends Controller
{

    public function filterwine(Request $request){
			$manid = $request->input('manId');
			$countryid = $request->input('countryId');
			$colorid = $request->input('colorId');
			$typeid = $request->input('typeId');

			$countries = Country::all();
			$manufactures = Manufacture::all();
			$colors = WinesColor::all();
			$types = WinesType::all();

			//Поиск по 4 фильтрам
			if($manid && $countryid && $colorid && $typeid)
			{
				$wines = Wine::whereIn('manufacture_id',$manid)->whereIn('country_id', $countryid)->whereIn('color_id', $colorid)->whereIn('type_id', $typeid)->get();
			}

			//Поиск по 3 фильтрам
			elseif(!$manid && $countryid && $colorid && $typeid)
			{
				$wines = Wine::whereIn('country_id', $countryid)->whereIn('color_id', $colorid)->whereIn('type_id', $typeid)->get();
			}
			elseif($manid && !$countryid && $colorid && $typeid)
			{
				$wines = Wine::whereIn('manufacture_id', $manid)->whereIn('color_id', $colorid)->whereIn('type_id', $typeid)->get();
			}
			elseif($manid && $countryid && !$colorid && $typeid)
			{
				$wines = Wine::whereIn('country_id', $countryid)->whereIn('manufacture_id', $manid)->whereIn('type_id', $typeid)->get();
			}
			elseif($manid && $countryid && $colorid && !$typeid)
			{
				$wines = Wine::whereIn('country_id', $countryid)->whereIn('manufacture_id', $manid)->whereIn('manufacture_id', $manid)->get();
			}
			
			//Поиск по 2 фильтрам
			elseif(!$manid && !$countryid && $colorid && $typeid)
			{
				$wines = Wine::whereIn('color_id', $colorid)->whereIn('type_id', $typeid)->get();
			}
			elseif(!$manid && $countryid && !$colorid && $typeid)
			{
				$wines = Wine::whereIn('country_id', $countryid)->whereIn('type_id', $typeid)->get();
			}
			elseif(!$manid && $countryid && $colorid && !$typeid)
			{
				$wines = Wine::whereIn('color_id', $colorid)->whereIn('country_id', $countryid)->get();
			}
			elseif($manid && $countryid && !$colorid && !$typeid)
			{
				$wines = Wine::whereIn('manufacture_id', $manid)->whereIn('country_id', $countryid)->get();
			}
			elseif($manid && !$countryid && $colorid && !$typeid)
			{
				$wines = Wine::whereIn('manufacture_id', $manid)->whereIn('color_id', $colorid)->get();
			}
			elseif($manid && !$countryid && !$colorid && $typeid)
			{
				$wines = Wine::whereIn('manufacture_id', $manid)->whereIn('type_id', $typeid)->get();
			}

			//Поиск по 1 фильтру
			elseif(!$manid && !$countryid && !$colorid && $typeid)
			{
				$wines = Wine::whereIn('type_id', $typeid)->get();
			}
			elseif(!$manid && !$countryid && $colorid && !$typeid)
			{
				$wines = Wine::whereIn('color_id', $colorid)->get();
			}
			elseif($manid && !$countryid && !$colorid && !$typeid)
			{
				$wines = Wine::whereIn('manufacture_id', $manid)->get();
			}
			elseif(!$manid && $countryid && !$colorid && !$typeid)
			{
				$wines = Wine::whereIn('country_id', $countryid)->get();
			}
			else
				$wines = [];
		
			return view('filtersearch', compact('wines', 'colors','types', 'countries', 'manufactures'));
    	}

    	public function filterProduct(Request $request){
			$manid = $request->input('manId');
			$countryid = $request->input('countryId');

			$countries = Country::all();
			$manufactures = Manufacture::all();
			$colors = WinesColor::all();
			$types = WinesType::all();
			$categories = Category::all();

			//Поиск по 2 фильтрам
			if($manid && $countryid)
			{
				$wines = Product::whereIn('manufacture_id',$manid)->whereIn('country_id', $countryid)->get();
			}
			
			//Поиск по 1 фильтру
			if($manid && !$countryid)
			{
				$wines = Product::whereIn('manufacture_id', $manid)->get();
			}
			elseif(!$manid && $countryid)
			{
				$wines = Product::whereIn('country_id', $countryid)->get();
			}

			else
			$wines = [];
		
			return view('filtersearch', compact('wines', 'colors','types', 'countries', 'manufactures'));
    	}
}
