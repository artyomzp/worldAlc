@extends('layouts.category')
@section('content')
	@foreach($products as $product)
		<?php $string = substr($product->description, 0, 160); ?>
		<div class="col-md-4 col-lg-4 col-sm-12 col-xs-12">
			<div class="panel">
			<div class="panel-heading goods">{{$product->name}}</div>
				<div class="row">

					<div class="panel-body">
					<div class="panel-content price">Цена: 
					@if($product->inStock != null)
						<span class="line">{{$product->price}}</span>
						<span class="price">{{$product->salePrice}}</span>
						<span class="logo"><img src="{{asset('/images/uploads/sale.png')}}" alt=""></span>
					@else
						{{$product->price}}
					@endif
					</div>
					<div class="col-md-5 col-lg-5 col-sm-5 col-xs-5">
						<img src="{{asset($product->image)}}" class="img-responsive konyak" style="width:100%" alt="Image">
					</div>
					
					<div class="col-md-7 col-lg-7 col-sm-7 col-xs-7">
						<div class="descr"><?php echo $string."… " ?></div>
						<a href="{{asset('product/'.$product->id)}}" class="btn btn-primary"></a>
						<form action=""class="cart-form">
						<input type="number" name="qty" value="1" min="1" style="width: 40px; margin-right: 10px; border-radius: 4px;">
						<input type="hidden" name="product_id" value="{{$product->id}}">
						<input type="submit" value="Добавить в корзину" class="btn btn-warning">
						</form>
					</div>
					</div>
				</div>
			</div>
		</div>
	@endforeach
	{{$products->links()}}
@endsection
@section('sidebar')
	{!!Form::open(array('action'=>'FilterController@filterProduct', 'class'=>'filter'))!!}
		<h4>Производители</h4>
		@foreach($manufactures as $manufacture)
		<input type="checkbox" value="{{$manufacture->id}}" name="manId[]"> {{$manufacture->name}}<br>
		@endforeach
		<h4>Страны</h4>
		@foreach($countries as $country)
		<input type="checkbox" value="{{$country->id}}" name="countryId[]"> {{$country->name}}<br>
		@endforeach
		<br>
		<input type="submit" value="Применить фильтры" class="btn btn-warning">
	{!!Form::close()!!}
@endsection