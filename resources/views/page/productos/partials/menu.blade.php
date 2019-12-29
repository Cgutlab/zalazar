
	<div class="col s12 m12 l3">			
		<ul class="collapsible z-depth-0" id="productos-collapsible" data-collapsible="accordion">
			@foreach($familias as $f)
				<li>
					<div class="collapsible-header valign-wrapper {{ ($familia->id == $f->id)?'familia-active':'' }} " 
						 style=" display: flex;justify-content: space-between; align-items: center;" 
						 id="productos-collapsible-header">
						 <a href="{{action('SeccionProductoController@show', $f->id)}}" 
						 	style="color: #454545">{{$f->nombre}}
						 </a>  
						 @if($familia->id == $f->id) 
						 	<i class="material-icons right valign-wrapper">keyboard_arrow_down</i>
						 @else  
						 	<i class="material-icons right valign-wrapper">keyboard_arrow_right</i>   
						 @endif
					</div>
					@foreach($subfamilias as $s)
						@if($f->id == $s->familia_id)
							<div class="collapsible-body valign-wrapper" id="productos-collapsible-body" 
								@if($familia->id == $f->id) 
									style="display:block;"
								@endif>
								<a href="{{ action('SeccionProductoController@showProducto', ['id' => $s->id, 'tipo' => 'subfamilia']) }}"
									@if($activo == $s->id) 
										class="subfamilia-active" 
									@endif>
									{{ mb_strtoupper($s->nombre) }}
								</a>
							</div>
						@endif
					@endforeach
				</li>
			@endforeach
		</ul>
	</div>


