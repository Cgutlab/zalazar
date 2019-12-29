
<script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/materialize.min.js')}}"></script>
<script src="{{asset('alertify/alertify.min.js')}}"></script>

<script>

	$(document).ready(function(){  
    	$('.collapsible').collapsible();
    	$('.sidenav').sidenav();
		$('.dropdown-trigger').dropdown({
			constrainWidth: false,
			closeOnClick: false,
			hover: true
		});
		$('.dropdown-login').dropdown({
			constrainWidth: false,
			closeOnClick: false,
		});
	});

</script>
