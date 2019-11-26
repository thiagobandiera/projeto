<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Fluxo de Caixa</title>
</head>
<body>
	<h1>Fluxo de Caixa</h1>
	<br />
	Conta: {{ $conta->name }}
	<br />
	Saldo da conta: {{ number_format($conta->saldo_atual,2,',','.') }}
</body>
</html>