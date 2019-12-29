
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>  
<script type="text/javascript" charset="utf8" src="{{ asset('DataTables/datatables.js') }}"></script>

<script>

	$(document).ready(function(){  
    	$('.collapsible').collapsible();
    	$('.sidenav').sidenav();
		$('.dropdown-trigger').dropdown({
			constrainWidth: false,
			closeOnClick: false,
			hover: true
		});
		$('.dropdown-buscador').dropdown({
			constrainWidth: false,
			closeOnClick: false,
		});


	    $('#table').DataTable( {
	        columnDefs: [
	            {
	                targets: [ 0, 1, 2 ],
	                className: 'mdl-data-table__cell--non-numeric'
	            }
	        ],
	        "language": {
				"sProcessing":     "Procesando...",
				"sLengthMenu":     "Mostrar _MENU_ registros",
				"sZeroRecords":    "No se encontraron resultados",
				"sEmptyTable":     "Ningún dato disponible en esta tabla",
				"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
				"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
				"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
				"sInfoPostFix":    "",
				"sSearch":         "Buscar:",
				"sUrl":            "",
				"sInfoThousands":  ",",
				"sLoadingRecords": "Cargando...",
				"oPaginate": {
					"sFirst":    "Primero",
					"sLast":     "Último",
					"sNext":     "Siguiente",
					"sPrevious": "Anterior"
				},
				"oAria": {
					"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
					"sSortDescending": ": Activar para ordenar la columna de manera descendente"
				}
            },
            "order": [[ 0, 'asc' ]]
	    });

	});

</script>
