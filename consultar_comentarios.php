<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/index.css">
	<title>PHP Insertar Comentario</title>
</head>
<body>
	<center>
		<?php
		include 'conexion.php';

		
		$consulta = "SELECT * FROM contactanos";

		$resultado = mysqli_query($conexion, $consulta);

		if(!$resultado)
		{
			echo "No se pudo realizar la consulta";
		}

		echo "<table border='2'>";
		echo "<tr>";
		echo "<th>Nombre</th>";
		echo "<th>Email</th>";
		echo "<th>Comentario</th>";

		while ($columna = mysqli_fetch_array($resultado)) 
		{
			echo "<tr>";
			echo "<td>".$columna['nombre']."</td><td>".$columna['email']."</td><td>".$columna['comentario']."</td>";
			echo "</tr>";
		}

		echo "</table>";

		mysqli_close($conexion);

		?>

		<br><br>
		<a href="index.html"> <input type="button" name="regresar" value="Regresar"></a>
	</center>


</body>
</html>