@extends('layouts.category')
@section('content')
<h1 class="text-center" style="color: white;">You are looking for: </h1>
<br>
@foreach($products as $product)

		<?php $string = substr($product->description, 0, 220); ?>
		<div class="col-sm-4">
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
					<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3">
						<img src="{{asset($product->image)}}" class="img-responsive" style="width:100%" alt="Image">
					</div>
					
					<div class="col-md-9 col-lg-9 col-sm-9 col-xs-9">
						<div class="descr"><?php echo $string."… " ?></div>
						<a href="{{asset('product/'.$product->id)}}" class="btn btn-primary"></a>
						<form action="" id="cart-form">
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