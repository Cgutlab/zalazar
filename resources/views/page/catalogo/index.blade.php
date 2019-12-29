@extends('app')

@section('content')


<body>

	@if($catalogo->link != null)

 		<iframe src="{{ $catalogo->link }}" style="width: 100%; height: 600px;"></iframe>

	@else
		
		<p>No tenemos actualmente catálogos disponibles</p>

	@endif
	@endsection

	@include('layouts.script')

</body>
</html>


