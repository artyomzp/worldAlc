@extends('layouts.app')
@section('content')

<div class="container">
  <div class="row">
    <h2 class="text-center" style="color: white;">Мы рекомендуем</h2>
  </div>
  <div class="row recom">
  @foreach($products as $p)
  @if($p->recommended==true)
    <div class="col-md-3 col-lg-3">
      <div class="h3">{{$p->name}}</div>
      <img src="{{$p->image}}" alt="" class="img-responsive" >
      <h2>Цена: {{$p->price}}</h2>
    </div>
  @endif
  @endforeach
  </div>
</div><br><br>

<div class="container">    
  <div class="row">

    <div class="col-sm-4">
      <a href="{{url('/category/wine')}}">
      <div class="panel">
        <div class="panel-heading">Вино</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/winebg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>

    <div class="col-sm-4"> 
      <a href="{{url('/category/konyak')}}">
      <div class="panel">
        <div class="panel-heading">Коньяк</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/konyakbg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>

    <div class="col-sm-4"> 
      <a href="{{url('/category/gin')}}">
      <div class="panel">
        <div class="panel-heading">Джин</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/ginbg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>
  </div>
</div><br>

<div class="container">    
  <div class="row">

    <div class="col-sm-4">
      <a href="{{url('/category/rum')}}">
      <div class="panel">
        <div class="panel-heading">Ром</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/rumbg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>

    <div class="col-sm-4"> 
      <a href="{{url('/category/whisky')}}">
      <div class="panel">
        <div class="panel-heading">Виски</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/whiskybg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>

    <div class="col-sm-4"> 
      <a href="{{url('/home/about')}}">
      <div class="panel">
        <div class="panel-heading">О нас</div>
        <div class="panel-body"><img src="{{asset('/images/uploads/aboutbg.jpg')}}" class="img-responsive" style="width:100%" alt="Image"></div>
      </div>
      </a>
    </div>
  </div>
</div><br><br>
@endsection
