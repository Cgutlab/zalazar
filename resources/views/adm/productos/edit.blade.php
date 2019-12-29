@include('adm.productos.partials.header')
					<a class="breadcrumb">Editar</a>
				</div>

				<h5>Productos</h5>					
				<div class="divider"></div>
				<div class="col s12">

					<form method="POST"  enctype="multipart/form-data" action="{{action('ProductoController@update', $producto->id)}}" class="col s12 m8 offset-m2 xl10 offset-xl1">
						{{ csrf_field() }}    
						{{ method_field('PUT')}}  

						<div class="row">
							<h5>Editar</h5>					
							<div class="divider"></div>

							<div class="input-field col s8">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="descripcion"  value="{{$producto->descripcion}}" >
								<label for="icon_prefix">Descripción</label>
							</div>


							<div class="input-field col s3">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="file_image"  value="{{$producto->file_image}}" >
								<label for="icon_prefix">Imagen</label>
							</div>

							<div class="input-field col s1">
								<label for="icon_prefix">.jpg</label>
							</div>

							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<select class="materialSelect" id="familia" name="familia_id" required>
									@foreach ($familias as $f )
									<option value="{{ $f->id }}" @if($f->id == $producto->familia_id) selected @endif >{{ ucwords($f->nombre) }} </option>
									@endforeach
								</select>
							</div>
							<div class="input-field col s6">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<select class="materialSelect" id="subfamilia" name="subfamilia_id">
									@foreach ($subfamilias as $s )
									<option value="{{ $s->id }}" @if($s->id == $producto->subfamilia_id) selected @endif >{{ ucwords($s->nombre) }} </option>
									@endforeach
								</select>
							</div>


							<div class="input-field col s4">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="codigo"  value="{{$producto->codigo}}" >
								<label for="icon_prefix">Código</label>
							</div>

							<div class="input-field col s1 center" >
							    <p>
							      <label>
							        <input type="checkbox" id="check-oferta" value="{{ ($producto->oferta > 0)?'1':'0' }}" checked="{{ ($producto->oferta > 0)?'checked':'' }}"/>
							        <span></span>
							      </label>
							    </p>
							</div>

							<div class="input-field col s3">
								<input id="icon_prefix" type="text" class="validate oferta-input" name="oferta" value="{{$producto->oferta}}" >
								<label for="icon_prefix">Oferta</label>
							</div>


							<div class="input-field col s4">
								<i class="material-icons prefix">keyboard_arrow_right</i>
								<input id="icon_prefix" type="text" class="validate" name="orden" value="{{$producto->orden}}" >
								<label for="icon_prefix">Orden</label>
							</div>



						</div>
						<div class="row">
							

							<div class="right">
								<a href="{{ action('ProductoController@index') }}" class="waves-effect waves-light btn btn-color">Cancelar</a>
								<button class="btn waves-effect waves-light btn-color" type="submit" name="action">Submit
									<i class="material-icons right">send</i>
								</button>
							</div>
						</div>
					</form>

				</div>
			</div>
		</div>
	</div>
</main>

@include('adm.layouts.script')

<script>


	$(document).ready(function(){		
		M.AutoInit();
		$('.collapsible').collapsible();
		$('select').formSelect();  

		$('#check-oferta').click(function(){
			var value = $(this).val();
			if(value == '1'){				
				$(this).val('0');
				$('.oferta-input').attr('disabled','disabled');
			}else{
				$(this).val('1');
				$('.oferta-input').removeAttr('disabled');
			}
		});
	});
	


	 $(document).on("change", '#familia', function () {
        var subfamiliasURL = "{{ url('adm/productos/select/subfamilias')}}";

        $.get(subfamiliasURL,
                {option: $(this).val()},
                function (data) {
                    var model = $('#subfamilia');
                    model.empty();
                    //model.append("<option value='1'>Ninguna</option>");
                    $.each(data, function (index, element) {
                        model.append("<option value='" + element.id + "'>" + element.nombre + "</option>");

                    });
                    $('select').formSelect();  

                }
        );

    });
</script>


</body>

</html>