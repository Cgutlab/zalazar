@extends('adm.layouts.app')
@extends('adm.layouts.navbar')
<div style="margin-top: -1.7%" >
	@extends('adm.layouts.sidebar')
</div>



@include('adm.layouts.script')
<script>
    $(document).ready(function(){
        $('.collapsible').collapsible();
    });
</script>

</body>
</html>