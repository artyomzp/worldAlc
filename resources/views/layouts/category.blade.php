@include('layouts.headergoods')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2 col-lg-2 hidden-xs hidden-sm">
			@yield('sidebar')
		</div>
		<div class="col-sm-9">
			@yield('content')
		</div>
		<div class="col-md-2 col-lg-2 hidden-xs hidden-sm"></div>
	</div>
</div>
@include('layouts.footer')
