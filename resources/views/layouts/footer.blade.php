<div id="cart" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ваша корзина</h4>
          </div>
          <div class="modal-body">
            @include('cart')
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
            <button type="button" class="btn btn-danger clear-cart">Очистить корзину</button>
            <a href="{{asset('order')}}" class="btn btn-primary">Оформить заказ</a>
          </div>
        </div>
      </div>
    </div>
<footer class="container-fluid text-center">
  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	<ul class=" nav navbar-left">
	   <h3>Категории</h3>
       <li><a href="{{url('/category/wine')}}">Вино</a></li>
       <li><a href="{{url('/category/gin')}}">Джин</a></li>
       <li><a href="{{url('/category/konyak')}}">Коньяк</a></li>
       <li><a href="{{url('/category/whisky')}}">Виски</a></li>
       <li><a href="{{url('/category/rum')}}">Ром</a></li>
	</ul>
  </div>

  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2677.3523794779403!2d35.122144015990514!3d47.85213837920177!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dc672604387edb%3A0x39d24dbefb9d5616!2z0KDQtdC60L7RgNC00L3QsCDQstGD0LvQuNGG0Y8sIDIwLCDQl9Cw0L_QvtGA0ZbQttC20Y8sINCX0LDQv9C-0YDRltC30YzQutCwINC-0LHQu9Cw0YHRgtGMLCA2OTAwMA!5e0!3m2!1suk!2sua!4v1527317125135" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
  </div>

  <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
	<ul class="nav navbar-right">
	   <h3>Контакты</h3>
       <li><a href="{{url('/home/about')}}">О нас</a></li>
       <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
       <li><a href="#"><i class="fab fa-twitter-square"></i></a></li>
       <li><a href="#"><i class="fab fa-instagram"></i></a></li>
  </ul>
  </div>
</footer>
    <script src="{{asset('js/app.js')}}"></script>
    <script src="{{asset('slick/slick.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>

   	<script type="text/javascript">
    $(document).ready(function(){
              $('.recom').slick({
                  slidesToShow: 3,
                  slidesToScroll: 1,
                  autoplay: true,
                  autoplaySpeed: 2000,
                  responsive: [
                    {
                      breakpoint: 600,
                      settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      }
                    },
                    {
                      breakpoint: 480,
                      settings: {
                      slidesToShow: 1,
                      slidesToScroll: 1,
                      }
                    },
                  ]
                });
    });
</script>
</body>
</html>