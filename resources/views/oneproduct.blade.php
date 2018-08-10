@extends('layouts.category')
@section('content')
		<div class="order">
			<h1 class="text-center">{{$products->name}}</h1>
				<img src="{{asset($products->image)}}" alt="">
				<p> ЦЕНА:
					@if($products->inStock != null)
						<span class="line">{{$products->price}}</span>
						<span class="price">{{$products->salePrice}}</span>
						<span class="logo"><img src="{{asset('/images/uploads/sale.png')}}" alt=""></span>
					@else
						<span class="price">{{$products->price}}</span>
					@endif
				</p>
				<p>{!!$products->description!!}</p>
				<form action="" class="cart-form">
					<input type="number" name="qty" value="1" min="1" style="width: 40px; margin-right: 10px; border-radius: 4px;">
					<input type="hidden" name="product_id" value="{{$products->id}}">
					<input type="submit" value="Добавить в корзину" class="btn btn-warning">
				</form><br>
			</div>
		</div>
	</div>
@endsection
@section('sidebar')
	@foreach($categories as $category)
	<p class="category"><a href="{{url('/category/show'.$category->id)}}">{{$category->name}}</a></p>
	@endforeach
@endsection