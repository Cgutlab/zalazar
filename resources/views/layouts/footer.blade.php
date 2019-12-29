<footer class="page-footer" id="footer" style="position: relative;">

		<div class="row" style="margin:0;">

			<div class="col s12 m12 l3" style="padding: 5% 10%" >

				<a href="{{ url('/') }}" class="brand-logo">

					<img id="logo-footer" class="img-responsive" src="{{ asset('images/logos/'.$logos->file_image) }}" alt="">

				</a>

			</div>

			<div class="col s12 m12 l9" style="padding-top: 3%">

				<div class="col s12 m12 l5 offset-l2 footer-text">

					<div class="row">

						<span id="nombre-footer">SITE MAP</span>

					</div>

					<div class="row">

						<div class="col s12 m6">

							<a href=" {{ url('/')}} " >INICIO</a>

						</div>

						<div class="col s12 m6">

							<a href=" {{ url('catalogo')}} " >CATÁLOGO</a>

						</div>

					</div>

					<div class="row">

						<div class="col s12 m6">

						<a href=" {{ url('empresa')}} " >EMPRESA</a>

						</div>

						<div class="col s12 m6">

							<a href=" {{ url('/novedades')}} " >NOVEDADES</a>

						</div>

					</div>

					<div class="row">

						<div class="col s12 m6">

						<a href=" {{ url('/productos')}} " >PRODUCTOS</a>

						</div>

						<div class="col s12 m6">

							<a href=" {{ url('contacto')}} " >CONTACTO</a>

						</div>

					</div>

				</div>

				

				<div class="col s12 m12 l4 offset-l1 footer-contact">

					<span id="nombre-footer">CONTACTO</span>

					<ul style="margin-top: 2%;">

						<li class="footer-text" >

							<div class="row">

								<div class="col s1 footer-icon">

									<i class="fas fa-envelope"></i>

								</div>
								<div class="col s10">

									<a href="mailto:{{ $email->descripcion }}">{{ $email->descripcion }}</a> 

								</div>
							</div>

							<div class="row">

								<div class="col s1 footer-icon">

									<i class="fas fa-phone-volume"></i>

								</div>

								<div class="col s10">

									<span>Teléfono y Fax:</span>

								</div>

								<div class="col s10">

									<a href="tel:{{ $telefono_fax->descripcion }}">{{ $telefono_fax->descripcion }}</a>

								</div>
							</div>

							<div class="row">


								<div class="col s9 offset-s1" >

									<span>Teléfono:</span>

								</div>

								<div class="col s9 offset-s1">

									<a href="tel:{{ $telefono->descripcion }}">{{ $telefono->descripcion }}</a>

								</div>	
							</div>		


							<div class="row">
	

								<div class="col s1 footer-icon">

									<i class="fab fa-whatsapp"  style="color: #4DC95C;" ></i>

								</div>


								<div class="col s10">

									<span>Whatsapp:</span>

								</div>

								<div class="col s10">

									<a href="{{ 'https://wa.me/'.$numeroWs }}" target="_blank">{{ $whatsapp->descripcion }}</a></li>

								</div>

							</div>

						</li>

					</ul>

				</div>

			</div> 

		</div>

		<div class="divider" style="width: 90%; margin-left: 6%; background: #A4A4A4; height: 2px;"></div>

		<div class="row" style="margin:0;">

			<div class="col s12" id="osole-span" >

				<span class="right ">BY OSOLE</span>

			</div>

		</div>

</footer>

