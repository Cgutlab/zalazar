

<!-- Cabecera de la página -->

<div id="dropdown1" class="dropdown-content" style="width: 300px !important; " id="login">
	<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" style="padding: 15px; width: 250px; height: 230px">
		@csrf
		<div class="col s6">
			<input placeholder="Usuario" name="username" type="text" class="validate" autocomplete="off">
		</div>

		<div class="col s6">
			<input placeholder="Contraseña" name="password" type="password" class="validate" >
		</div>

		<center>
			<div class='row' style="padding-top: 20px; ">
				<button style="background-color: #425E89; border: 1px solid #425E89;color:#FFFFFF ; width: 165px; height: 45px" id="btn-login" type='submit' name='btn_login' >ENVIAR</button>
			</div>
		</center>

	</form>
	<div class="divider"></div>
	<a id="login-cuenta" href="{{ route('register') }}"><h5 class="center" for="">CREAR UNA CUENTA NUEVA</h5></a>
</div>


<!-- Cabecera de la página -->

<div id="dropdown2" class="dropdown-content" style="width: 300px !important; " id="login">
	<form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}" style="padding: 15px; width: 250px; height: 230px">
		@csrf
		<div class="col s6">
			<input placeholder="Usuario" name="username" type="text" class="validate" autocomplete="off">
		</div>

		<div class="col s6">
			<input placeholder="Contraseña" name="password" type="password" class="validate" >
		</div>

		<center>
			<div class='row' style="padding-top: 20px; ">
				<button style="background-color: #425E89; border: 1px solid #425E89;color:#FFFFFF ; width: 165px; height: 45px" id="btn-login" type='submit' name='btn_login' >ENVIAR</button>
			</div>
		</center>

	</form>
	<div class="divider"></div>
	<a id="login-cuenta" href="{{ route('register') }}"><h5 class="center" for="">CREAR UNA CUENTA NUEVA</h5></a>
</div>

<nav id="header" class=" z-depth-0">
	<div class="nav-wrapper z-depth-0 hide-on-med-and-down header-top">
		<div class="container">		
	        <ul id="nav-mobile" class="right hide-on-med-and-down header-top-ul" style=";height: 35px; display: flex; justify-content: center; align-items: center;">         
	        	@auth
					@if(\Auth::user()->tipo == 'vendedor' || \Auth::user()->tipo == 'cliente')
			            <li> <i style="color: #B0B0B0; margin-right: -10px" class="fas fa-sign-out-alt"></i> </li> 
						<li>
							<a style="padding-right: 10px !important; " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								CERRAR SESIÓN 
							</a>
						</li>
						
						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
							{{ csrf_field() }}
						</form>

			           	@else 	            	
			            	<li> <i style="color: #B0B0B0; margin-right: -10px" class="fas fa-user-circle"></i> </li>
			            	<li><a class="dropdown-login" href="#!" data-target="dropdown1" style="padding-right: 10px !important; "> ZONA PRIVADA </a></li> 
						@endif
				@endauth
				@guest
	            	<li> <i style="color: #B0B0B0; margin-right: -10px" class="fas fa-user-circle"></i> </li>
	            	<li><a class="dropdown-login" href="#!" data-target="dropdown1" style="padding-right: 10px !important; "> ZONA PRIVADA </a></li> 
		        @endguest
	            <li style="font-size: 25px !important; font-family: 'Montserrat' !important; margin-top: -4px">|</li>
	            <li><i class="fab fa-whatsapp"  style="margin-right: -15px; color: #4DC95C" ></i></li>
	            <li><a style="color: #505050" href="{{ 'https://wa.me/'.$numeroWs }}" target="_blank">{{ $whatsapp->descripcion }}</a></li>
	        </ul>
		</div>
	</div>
	<div class="nav-content">
		<a  @auth('web') href="{{ url('productos') }}" @else href="{{ url('/') }}"  @endauth  class="brand-logo">
			<img id="logo" src="{{ asset("images/logos/".$logos->file_image) }}" alt="" class="responsive-img">
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons" style="color: #3E3F41">menu</i></a>

		</a>
		<div class="hide-on-large-only	show-on-medium-and-down">
			<a href="{{ action('SeccionHomeController@busqueda') }}"   ><i class="material-icons" style="color: #3E3F41">search</i></a>
		</div>

		<form method="GET" action="{{action('SeccionHomeController@buscador')}}">
			<div class="col s12">
				<div class="col s2">

					<ul id="nav-mobile" class="right hide-on-med-and-down">
						<li>
				          <i style="color: #5C89C5; margin-top: 15%" class="material-icons prefix right">search</i>
				          <input id="icon_prefix" name="nombre" type="text" class="validate right " style="width: 40%; margin-top: 15%">
				      	</li>     
					</ul>
				</div>
		</form>
        	@auth
				@if(\Auth::user()->tipo == 'vendedor' || \Auth::user()->tipo == 'cliente')
					<div class="col s10">						
						<ul id="nav-mobile" class="right hide-on-med-and-down header-secciones" >
							<li><a href=" {{ url('/productos')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>Productos</a></li>
							<li><a href=" {{ url('/ofertas')}} " {{ (\Request::is('ofertas*'))?"id=seccion-active":"" }}>Ofertas</a></li>
							<li><a href=" {{ url('/privada/pedido')}} " {{ (\Request::is('privada/pedido*'))?"id=seccion-active":"" }}>Pedidos</a></li>
							<li><a href=" {{ url('listado')}} " {{ (\Request::is('listado*'))?"id=seccion-active":"" }}>Lista de Precios</a></li>      
							<li><a href=" {{ url('/historial')}} " {{ (\Request::is('historial*'))?"id=seccion-active":"" }}>Histórico de Compras</a></li>            
						</ul>
					</div>
				@endif
			@endauth

			@guest
				<div class="col s10">						
					<ul id="nav-mobile" class="right hide-on-med-and-down header-secciones" >
						<li><a href=" {{ url('/') }} " {{ (\Request::is('/'))?"id=seccion-active":"" }}>Inicio</a></li>
						<li><a href=" {{ url('/empresa')}} " {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>Empresa</a></li>
						<li><a href=" {{ url('/productos')}} " {{ (\Request::is('productos*'))?"id=seccion-active":"" }}>Productos</a></li>
						<li><a href=" {{ url('/catalogo')}} " {{ (\Request::is('catalogo*'))?"id=seccion-active":"" }}>Catálogo</a></li>
						<li><a href=" {{ url('/novedades')}} " {{ (\Request::is('novedades*'))?"id=seccion-active":"" }}>Novedades</a></li>      
						<li><a href=" {{ url('/contacto')}} " {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>Contacto</a></li>            
					</ul>
				</div>
			@endguest
			
		</div>
	</div>
</nav>

<ul class="sidenav" id="mobile-demo">
	@guest
		<li><a href=" {{ url('/') }} " {{ (\Request::is('/'))?"id=seccion-active":"" }}>INICIO</a></li>
		<li><a href=" {{ url('/empresa')}} " {{ (\Request::is('empresa*'))?"id=seccion-active":"" }}>EMPRESA</a></li>
		<li><a href=" {{ url('/catalogo')}} " {{ (\Request::is('catalogo*'))?"id=seccion-active":"" }}>CATÁLOGO</a></li>
		<li><a href=" {{ url('/productos')}} " {{ (\Request::is('venta*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
		<li><a href=" {{ url('/novedades')}} " {{ (\Request::is('novedades*'))?"id=seccion-active":"" }}>NOVEDADES</a></li>
		<li><a href=" {{ url('/contacto')}} " {{ (\Request::is('contacto*'))?"id=seccion-active":"" }}>CONTACTO</a></li>     
       	<li><a class="dropdown-login" href="#!" data-target="dropdown2" style="padding-right: 10px !important; "> ZONA PRIVADA </a></li> 

	@endguest

	@auth('web')
		<li><a href=" {{ url('/') }} " {{ (\Request::is('/'))?"id=seccion-active":"" }}>INICIO</a></li>
		<li><a href=" {{ url('/productos')}} " {{ (\Request::is('venta*'))?"id=seccion-active":"" }}>PRODUCTOS</a></li>
		<li><a href=" {{ url('/ofertas')}} " {{ (\Request::is('ofertas*'))?"id=seccion-active":"" }}>OFERTAS</a></li>
		<li><a href=" {{ url('pedidos')}} " {{ (\Request::is('pedidos*'))?"id=seccion-active":"" }}>PEDIDOS</a></li>
		<li><a href=" {{ url('listado')}} " {{ (\Request::is('listado*'))?"id=seccion-active":"" }}>LISTA DE PRECIOS</a></li>
		<li><a href=" {{ url('/historial')}} " {{ (\Request::is('historial*'))?"id=seccion-active":"" }}>HISTÓRICO DE COMPRAS</a></li> 	
		<li>
			<a style="padding-right: 10px !important; " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i style="color: #B0B0B0; margin-right: 0px" class="fas fa-sign-out-alt"></i>  CERRAR SESIÓN 
			</a>
		</li>
	@endauth
</ul>

