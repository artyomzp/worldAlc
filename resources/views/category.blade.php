@extends('layouts.category')
@section('content')
	<div class="order">
	<h1 class="text-center">{{$cat->name}}</h1>
	<p class="proddescr">{!!$cat->description!!}</p>
	</div>
@endsection
@section('sidebar')
	@foreach($categories as $category)
		<p class="" ="category"><a href="{{url('/category/show'.$category->id)}}">{{$category->name}}</a></p>
	@endforeach
@endsection