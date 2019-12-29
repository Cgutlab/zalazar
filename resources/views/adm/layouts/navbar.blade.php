	<nav>
		<div class="nav-wrapper nav-admin">
			<ul id="nav-mobile" class="right hide-on-med-and-down">
				<li><span style="color: #6F6F6F; padding-right: 20px" > BIENVENIDO, {{ strtoupper(Auth::user()->username) }} </span></li>
				<li>
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						Cerrar Sesión
					</a>
				</li>
			</ul>
		</div>
	</nav>
	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: one;">
		{{ csrf_field() }}
	</form>