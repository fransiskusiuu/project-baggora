(function ($) {

  /*------------------
    Preloader
  --------------------*/
  $(window).on('load', function() {

    $(".loader").fadeOut();
    $("#preloader").delay(300).fadeOut("slow");

  });

  /*------------------
		Modal Register & Login
	--------------------*/
  
  $("#register_form").on('submit', function(e){
    e.preventDefault();

    $.ajax({
        url:$(this).attr('action'),
        method:$(this).attr('method'),
        data:new FormData(this),
        processData:false,
        dataType:'json',
        contentType:false,
        beforeSend:function(){
            $(document).find('span.error-text').text('');
        },
        success:function(data){
            if(data.status == 0){
                $.each(data.error, function(prefix, val){
                    $('span.'+prefix+'_error').text(val[0]);
                });
            }else{
                $('#register_form')[0].reset();
                var alertBox = '<div class="alert alert-success" role="alert">' + data.msg + '</div>';
                $('.modal-body').prepend(alertBox);
                $('.alert-success').hide().slideDown(500);

                setTimeout(function(){
                  $('.alert-success').slideUp(500, function(){
                    $(this).remove();
                  });
                }, 2500);
            }
        }
    });
  });

  $(document).ready(function(){
    $('#login_form').on('submit', function(e){
        e.preventDefault();

        $.ajax({
            url: $(this).attr('action'),
            method: 'POST',
            data: $(this).serialize(),
            success: function(response){
                if(response.status === 'success'){
                    window.location.href = '/profile';
                } else {
                  var alertBox = '<div class="alert alert-danger" role="alert">' + response.message + '</div>';
                  $('.modal-body').prepend(alertBox);
                  $('.alert-danger').hide().slideDown(500);

                  setTimeout(function(){
                    $('.alert-danger').slideUp(500, function(){
                      $(this).remove();
                    });
                  }, 2500);
                }
            },
            error: function(jqXHR, textStatus, errorThrown){
                // Handle error
                console.log(textStatus, errorThrown);
            }
        });
    });
  })

  /*------------------
		Search model
	--------------------*/

  $('.search-trigger').on('click', function() {
		$('.search-model').fadeIn(400);
	});

	$('.search-close-switch').on('click', function() {
		$('.search-model').fadeOut(400,function(){
			$('#search-input').val('');
		});
	});

  /*-------------------
		Quantity change
	--------------------- */

  var proQty = $('.pro-qty');
  proQty.prepend('<span class="dec qtybtn"></span>');
  proQty.append('<span class="inc qtybtn"></span>');
  proQty.on('click', '.qtybtn', function () {
      var $button = $(this);
      var oldValue = $button.parent().find('input').val();
      if ($button.hasClass('inc')) {
          var newVal = parseFloat(oldValue) + 1;
      } else {
          if (oldValue > 0) {
              var newVal = parseFloat(oldValue) - 1;
          } else {
              newVal = 0;
          }
      }
      $button.parent().find('input').val(newVal);
  });

  /*-------------------
		Radio Btn
	--------------------- */

  $(".shipping-info .cs-item label").on('click', function () {
    $(".shipping-info .cs-item label").removeClass('active');
    $(this).addClass('active');
  });

  $(".checkout-form .diff-addr label").on('click', function () {
      $(this).toggleClass('active');
  });

  $(".payment-method ul li label").on('click', function () {
      $(this).toggleClass('active');
  });

  /*-------------------
		Footer
	--------------------- */

  $('#formNewsletter').on('submit', function(event){
    event.preventDefault();

    $.ajax({
        url: "/newsletter",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        success:function(data)
        {
            var toastEl = document.getElementById('liveToast-1');
            var toast = new bootstrap.Toast(toastEl);
            toast.show();
        },
        error:function(data)
        {
          var toastE2 = document.getElementById('liveToast-2');
          var toast = new bootstrap.Toast(toastE2);
          toast.show();
        }
    })
  });

  /*-------------------
		Kontak
	--------------------- */

  $('#kirimPesan').on('submit', function(e) {
    e.preventDefault();

    $.ajax({
        url: '/kirim-pesan',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
          var toastEl = document.getElementById('liveToast-3');
          var toast = new bootstrap.Toast(toastEl);
          toast.show();
        },
        error: function(response) {
            // Tampilkan pesan error
        }
    });
});


})(jQuery);