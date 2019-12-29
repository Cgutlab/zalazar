
Has recibido un pedido de : {{ $cliente }}

<p>
Pedido nro: {{ $pedido }}
</p>


<table class="center">
<thead>
  <tr>
      <th>Descripción</th>
      <th>Cantidad</th>
      <th>Monto</th>
  </tr>
</thead>

<tbody>
	@foreach($articulos as $a)
  	  <tr>
	    <td>{{ $a->descripcion }}</td>
	    <td>{{ $a->pivot->cantidad }}</td>
	    <td>{{ $a->precio - $a->oferta}}</td>
	  </tr>
	@endforeach
</tbody>
<tfoot>
	<tr>
		<td colspan="2">Total</td>
		<td>{{ $monto }}</td>
	</tr>
</tfoot>
</table>

<p>
Mensaje: {{ $mensaje }}
</p>