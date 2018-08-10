(function($)
{
	$(function(){
		$.ajaxSetup({
		  headers: {
		    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		  }
		});
		//добавление товара в корзину
		$(".cart-form").submit(function(e){
			e.preventDefault();
			var formData = $(this).serialize();
			//{product_id:3, qty:1}
			$.ajax({
				type: 'POST',
				url: '/cart/add',
				data: formData,
				success: function(result){
					$('#cart .modal-body').html(result);
					$('#cart').modal();
				}
			});
		});
		//очистка корзины
		$('.clear-cart').click(function(e){
			e.preventDefault();
			$.ajax({
				type: 'POST',
				url: '/cart/clear',
				success: function(result){
					$('#cart .modal-body').html(result);
					$('#cart').modal();
				}
			})	
		});
		//удаление одного товара из корзины
		$('body').on('click', '.cart-del', function(e){
			e.preventDefault();
			var id = $(this).data('id');//$(this).attr('data-id')
			$.ajax({
				type: 'POST',
				url: '/cart/del',
				data: {product_id: id},
				success: function(result){
					$('#cart .modal-body').html(result);
					$('#cart').modal();
				}
			});
		});
		//изменение колличества товара в корзине
		$('body').on('input', '.product-qty', function(e){
			e.preventDefault();
			var id = $(this).data('id');//$(this).attr('data-id')
			var qty = $(this).val();
			$.ajax({
				type: 'POST',
				url: '/cart/edit',
				data: {product_id: id, product_qty: qty},
				success: function(result){
					$('#cart .modal-body').html(result);
					$('#cart').modal();
				}
			});
		});
	});
})(jQuery);