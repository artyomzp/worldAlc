@if(session('cart'))
	<table class="table cart">
		<thead>
			<tr>
				<th>Картинка</th>
				<th>Название</th>
				<th>Кол-во</th>
				<th>Цена</th>
				<th>Сумма</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach(session('cart') as $p)
			<tr>
				<td><img src="{{asset($p['image'])}}" alt="" style="width: 50px; height: 100px;"></td>
				<td>{{$p['name']}}</td>
				<td><input type="number" value="{{$p['qty']}}" min="1" class="product-qty" data-id="{{$p['id']}}"></td>
				<td>{{$p['price']}}</td>
				<td>{{$p['price']*$p['qty']}}</td>
				<td><a href="#" class="cart-del" data-id="{{$p['id']}}"><i class="fas fa-trash-alt"></i></a></td>
			</tr>
			@endforeach
		</tbody>
		<tfoot>
			<tr>
				<td colspan=4 class='text-right'>Total:</td>
				<td colspan=2>{{session('totalSum')}}</td>
			</tr>
		</tfoot>
	</table>

@else
<p>Ваша корзина пустая</p>
@endif