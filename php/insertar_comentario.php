
<!DOCTYPE html>

<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/index.css">
	<title>PHP Insertar Comentario</title>
</head>
<body>
	<center>
		<?php
		include '../conexion.php';

		$email=$_POST['email'];
		$nombre=$_POST['name'];
		$comentario=$_POST['coment'];

		$insertar = "INSERT INTO contactanos VALUES ('$nombre','$email','$comentario')";
		
		//$result = mysqli_query($conexion, $insertar);
		$result = $pdo->prepare($insertar);
		$result->execute();

		if(!$result)
		{
			//echo "No se pudo realizar la inserción";
			echo '<script language="javascript">';
				echo 'alert("No se pudo realizar la inserción")';
			echo '</script>';
		}
		else
		{
			//echo "Inserción exitosa";
			echo '<script language="javascript">';
				echo 'alert("Inserción exitosa")';
			echo '</script>';
		}

		
		//mysqli_close($conexion);
		$pdo = null;
		
		?>

		<br><br>
		<a href="../index.php"> <input type="button" name="regresar" value="Regresar"></a>
	</center>


</body>

</html>