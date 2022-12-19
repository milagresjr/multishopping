<?php
$novasCategorias2 = \DB::select(\DB::raw("SELECT * FROM categories ORDER BY id DESC LIMIT 6"));
?>

<!--/grids-->
<div class="coupons" style="margin-bottom: -20px;">
    <div class="coupons-grids text-center">
        <div class="w3layouts_mail_grid">
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>ENTREGA GRÁTIS</h3>
                    <p>Entregas gratuitas em toda zona da cidade de Luanda.</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-headphones" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>SUPORTE 08h até 00h</h3>
                    <p>Atendimento e suporte das 08h até 00h.</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>DEVOLUÇÃO 2 DIAS</h3>
                    <p>As devoluções são feitas num período de 48horas.</p>
                </div>
            </div>
            <div class="col-md-3 w3layouts_mail_grid_left">
                <div class="w3layouts_mail_grid_left1 hvr-radial-out">
                    <i class="fa fa-money" aria-hidden="true"></i>
                </div>
                <div class="w3layouts_mail_grid_left2">
                    <h3>PAGAMENTO SEGURO</h3>
                    <p>Pag. na hora da entrega e por transferencia.</p>
                </div>
            </div>
            <div class="clearfix"> </div>
        </div>

    </div>
</div>
<!--grids-->


<!--/grids-->
<!--<div class="agile_last_double_sectionw3ls mb-5">
	<div class="col-md-6 multi-gd-img multi-gd-text ">
			<a href="womens.html"><img src="{{asset('images/bot_1.jpg')}}" alt=" "><h4>Flat <span>50%</span> offer</h4></a>

	</div>
	 <div class="col-md-6 multi-gd-img multi-gd-text ">
			<a href="womens.html"><img src="{{asset('images/bot_2.jpg')}}" alt=" "><h4>Flat <span>50%</span> offer</h4></a>
	</div>
	<div class="clearfix"></div>
</div>		-->
<!--/grids-->



<!-- footer -->
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="{{ route('home') }}"><span>Multi</span>Shopping </a></h2>
			<p>MultiShopping faz parte do grupo Multisocial Holding (MS Group) e a sua missão
                é ser a maior plataforma digital socialmente envolvente, intelectualmente interessante
                e emocionalmente fascinante.</p>
			<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter">
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4>Nossas <span>Informações</span> </h4>
					<ul style="color: #fff;">
						<li><a href="{{ route('home') }}">Home</a></li>
						<li><a href="#">Entrega e Devoluções</a></li>
						<li><a href="{{ route('politica_privacidade') }}">Política de Privacidade</a></li>
						<li><a href="#">Sobre Nós</a></li>
						<li><a href="#">Contactos</a></li>
                        <li><a href="{{ route('faq') }}">FAQ</a></li>
					</ul>
				</div>

				<div class="col-md-5 sign-gd-two">
                    @if(!Auth::guard('web')->user())
                    <h4>Mais <span>Informações</span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Telefone</h6>
								<p>+244 951772431</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Endreço de Email</h6>
								<p>Email :<a href="mailto:multisocial.geral@email.com"> multisocial.geral@gmail.com</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
                        <!--
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>

							<div class="w3-address-right">
								<h6>Location</h6>
								<p>Broome St, NY 10002,California, USA.

								</p>
							</div>

							<div class="clearfix"> </div>
						</div>
						-->
                        @else
                            <h4>Minha <span>Conta</span></h4>
                            <ul style="color: #fff;">
                                <li><a href="{{ route('mypedidos')  }}">Meus Pedidos</a></li>
                                <li><a href="{{ route('myaccount')  }}">Minha conta</a></li>
                                <li><a href="{{ route('view_cart')  }}">Carrinho</a></li>
                                <li><a href="{{ route('logout')  }}">Sair</a></li>
                            </ul>
                        @endif
					</div>
				</div>

				<div class="col-md-3  sign-gd">
					<h4>Novas <span>Categorias</span></h4>
                    <ul style="color: #fff;">
                        @if(isset($novasCategorias2))
                            @foreach($novasCategorias2 as $cat)
                            <li><a href="{{ route('product-category',$cat->id) }}">{{ $cat->nome }}</a></li>
                            @endforeach
                        @endif
                    </ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="clearfix"></div>
			<div class="agile_newsletter_footer">
					<div class="col-sm-6 newsleft">
				<h3>ASSINE NOSSA NEWSLETTER !</h3>
			</div>
			<div class="col-sm-6 newsright">
				<form action="{{ route('newsletter_store') }}" method="post">
                    @csrf
					<input type="email" placeholder="Informe seu email..." name="email" required="">
					<input type="submit" value="ENVIAR">
				</form>
			</div>

		<div class="clearfix"></div>
	</div>
		<p class="copy-right" style="color: #fff;">&copy 2022 Multishopping. Todos direitos reservados | By <a href="https://w3layouts.com/" target="_blank">w3layouts</a></p>
	</div>
</div>
<!-- //footer -->


<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<!-- JQUERY -->

<!-- JQUERY -->


<script src="{{ asset('js/responsiveslides.min.js') }}"></script>
<script>
    // You can also use "$(window).load(function() {"
    $(function () {
        // Slideshow 4
        $("#slider3").responsiveSlides({
            auto: true,
            pager: true,
            nav: false,
            speed: 500,
            namespace: "callbacks",
            before: function () {
                $('.events').append("<li>before event fired.</li>");
            },
            after: function () {
                $('.events').append("<li>after event fired.</li>");
            }
        });
    });
</script>

<script src="{{ asset('js/modernizr.custom.js') }}"></script>
	<!-- Custom-JavaScript-File-Links -->
	<!-- cart-js -->
	<script src="{{ asset('js/minicart.min.js') }}"></script>
<script>
	// Mini Cart
	paypal.minicart.render({
		action: '#'
	});

	if (~window.location.search.indexOf('reset=true')) {
		paypal.minicart.reset();
	}
</script>

	<!-- //cart-js -->

<script type='text/javascript'>//<![CDATA[
    $(window).load(function(){
        $( "#slider-range" ).slider({
            range: true,
            min: 0,
            max: 9000,
            values: [ 1000, 7000 ],
            slide: function( event, ui ) {  $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
            }
        });
        $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) + " - $" + $( "#slider-range" ).slider( "values", 1 ) );

    });//]]>

</script>
<script type="text/javascript" src="{{ asset('js/jquery-ui.js') }}"></script>

<!-- script for responsive tabs -->
<script src="{{ asset('js/easy-responsive-tabs.js') }}"></script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->
<!-- stats -->
	<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
	<script src="{{ asset('js/jquery.countup.js') }}"></script>
	<script>
		$('.counter').countUp();
	</script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear'
				};
			*/

			$().UItoTop({ easingType: 'easeOutQuart' });

			});
	</script>
<!-- //here ends scrolling icon -->


<!-- js -->
<script type="text/javascript" src="{{ asset('js/jquery-2.1.4.min.js') }}"></script>
<!-- //js -->
<script src="{{ asset('js/modernizr.custom.js') }}"></script>
<!-- Custom-JavaScript-File-Links -->
<!-- cart-js -->
<script src="{{ asset('js/minicart.min.js') }}"></script>
<script>
    // Mini Cart
    paypal.minicart.render({
        action: '#'
    });

    if (~window.location.search.indexOf('reset=true')) {
        paypal.minicart.reset();
    }
</script>

<!-- //cart-js -->
<!-- single -->
<script src="{{ asset('js/imagezoom.js') }}"></script>
<!-- single -->

<!-- script for responsive tabs -->
<script src="{{ asset('js/easy-responsive-tabs.js') }}"></script>
<script>
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#verticalTab').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- FlexSlider -->
<script src="{{ asset('js/jquery.flexslider.js') }}"></script>
<script>
    // Can also be used with $(document).ready()
    $(window).load(function() {
        $('.flexslider').flexslider({
            animation: "slide",
            controlNav: "thumbnails"
        });
    });
</script>
<!-- //FlexSlider-->
<!-- //script for responsive tabs -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{ asset('js/move-top.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/jquery.easing.min.js') }}"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".scroll").click(function(event){
            event.preventDefault();
            $('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function() {
        /*
         var defaults = {
         containerID: 'toTop', // fading element id
         containerHoverID: 'toTopHover', // fading element hover id
         scrollSpeed: 1200,
         easingType: 'linear'
         };
         */

        $().UItoTop({ easingType: 'easeOutQuart' });

    });
</script>
<!-- //here ends scrolling icon -- >

<script type="text/javascript" src="{{ asset('js/carrinho.js') }}"></script>

<!-- for bootstrap working -->
<script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script>

<script>
/*	var form = $('#form-cad');
    form.on('submit',function(event){
        event.preventDefault();

        $.ajax({
            url: "{{ route('cadastrar_cliente') }}",
            method: 'POST',
            data: $('#form-cad').serialize(),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            success: function(data)
			{
                //alert('Foiiiiiiii');
				if(data.success){
                    alert('Usuario cadastrado com sucesso!');
                }else{
                    alert('Erro ao cadastra usuario!');
                }
            }
        });
    });
*/
    function execModal()
    {
        alert('Modildo');
    }
    $('#modal').modal('show');
</script>
<?php
    if(isset($_SESSION['acesso_neg']))
    {
        echo "<script>$('#myModal').modal('show')</script>";
        unset($_SESSION['acesso_neg']);
    }
    if(isset($_SESSION['cad_error']))
    {
        echo "<script>$('#myModal2').modal('show')</script>";
        unset($_SESSION['cad_error']);
    }

?>
</body>
</html>
