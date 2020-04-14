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

		$email=$_POST['email'];
		$nombre=$_POST['name'];
		$comentario=$_POST['coment'];


		
		$insertar = "INSERT INTO contactanos VALUES ('$nombre','$email','$comentario')";
		
		$result = mysqli_query($conexion, $insertar);

		if(!$result)
		{
			echo "No se pudo realizar la inserción";
		}
		else
		{
			echo "Inserción exitosa";
		}

		
		mysqli_close($conexion);

		
		?>

		<br><br>
		<a href="index.html"> <input type="button" name="regresar" value="Regresar"></a>
	</center>


</body>
</html>