<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>Implementando MVC</title>
	</head>
<body>
	<h1>Clientes</h1>
	<table>
		<tr>
			<th>ID</th>
			<th>Cliente</th>
		</tr>
		<?php foreach ($clientes as $cliente): ?>
		<tr>
			<td><?php echo $cliente->id; ?></td>
			<td><?php echo $cliente->nome; ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>