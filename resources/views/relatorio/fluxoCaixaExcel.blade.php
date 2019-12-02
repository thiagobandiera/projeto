<table width="100%" style="width:100%" border="1">
	<thead>
		<tr>
			<th>Data</th>
			<th>Descrição</th>
			<th>Valor</th>
			<th>Tipo</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($conta->transacoes as $transacoes)
			<tr>
				<td>{{ date("d/m/Y", strtotime($transacoes->data)) }}</td>
				<td>{{ $transacoes->descricao }}</td>
				<td>R$ {{ number_format($transacoes->valor,2,',','.') }}</td>
				<td>{{ ($transacoes->tipo == 'I') ? 'Receita' : 'Despesa' }}</td>
			</tr>
		@endforeach
	</tbody>
</table>