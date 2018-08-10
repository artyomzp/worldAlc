<h1>New Order</h1>
<table class="table">
		<thead>
			<tr>
				<th>Картинка</th>
				<th>Название</th>
				<th>Кол-во</th>
				<th>Цена</th>
				<th>Сумма</th>
			</tr>
		</thead>
		<tbody>
			@foreach(session('cart') as $p)
			<tr>
				<td><img src="{{asset($p['image'])}}" alt="" style="width: 50px;"></td>
				<td>{{$p['name']}}</td>
				<td>{{$p['qty']}}</td>
				<td>{{$p['price']}}</td>
				<td>{{$p['price']*$p['qty']}}</td>
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
	<h2>Info</h2>
	Email: {{$order->email}} <br>
	Name: {{$order->name}} <br>
	Address: {{$order->address}} <br>
	Payment: {{$order->payment}} <br>
