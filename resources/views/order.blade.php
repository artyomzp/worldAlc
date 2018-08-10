@include('layouts.headergoods')

<div class="container-fluid ">
	<div class="row order">
		<h1 class="text-center">Ваши покупки</h1>
	</div>
	<div class="row order">
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
		<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 content">
			@include('cart')
		</div>
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
	</div>
	<div class="row order">
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
		<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 center content">
			@if (Auth::guest())
			<p><a href="{{ url('/login') }}">Login</a> or <a href="{{ url('/register') }}">Registration</a></p>
		@endif
		@if (count($errors) > 0)
  			<div class="alert alert-danger">
    		<ul>
      			@foreach ($errors->all() as $error)
       			 	<li>{{ $error }}</li>
      			@endforeach
    		</ul>
  			</div>
		@endif
		</div>
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
	</div>
	<div class="row order">
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
		<div class="col-sm-12 col-xs-12 col-md-8 col-lg-8 center content">
			<form action="/checkout/complete" method="POST">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="name">Your Name</label>
					<input type="text" name="name" id="name" class="form-control" value="{{$user->name or ''}}">
				</div>

				<div class="form-group">
					<label for="email">Your Email</label>
					<input type="text" name="email" id="email" class="form-control" value="{{$user->email or ''}}">
				</div>

				<div class="form-group">
					<label for="phone">Your Phone</label>
					<input type="text" name="phone" id="phone" class="form-control" value="">
				</div>

				<div class="form-group">
					<label for="address">Your Address</label>
					<input type="textarea" name="address" id="address" class="form-control" value="">
				</div>

				<label class="radio-inline">
					<input type="radio" name="payment" value="cash" checked> Cash
				</label>

				<label class="radio-inline">
					<input type="radio" name="payment" value="card"> Card
				</label>
				<br>
				<input type="submit" value="SEND" class="btn btn-success">
			</form>
		<div class=".hidden-sm .hidden-xs col-md-2 col-lg-2"></div>
		</div>
	</div>
</div>
@include('layouts.footer')