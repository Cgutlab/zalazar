
<div class="slider" id="slider-home">
	<ul class="slides">
		@forelse($sliders as $s)
		<li>
			<img src="{{ asset('images/sliders/'.$s->file_image) }}" class="img-responsive" style="position: absolute;"> 
			<img src="{{ asset('images/sliders/capa.png') }}" style="position: absolute; mix-blend-mode: multiply;">        
			<div class="caption center-align" id="caption-sliders" style="padding-top: 7%">
				<div id="titulo-caption">
					{!! $s->titulo !!}
				</div>
				<div id="descripcion-caption">
					{!! $s->descripcion !!}	
				</div>
			</div>
		</li>
		@empty
		@endforelse
	</ul>
</div>


 