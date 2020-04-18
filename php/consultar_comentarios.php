<?php
	include '../conexion.php';
	$consulta = "SELECT * FROM contactanos";

	//$resultado = mysqli_query($conexion, $consulta);
	$resultado = $pdo->prepare($consulta);
	$resultado->execute();

	if(!$resultado)
	{
		//echo "No se pudo realizar la consulta";
		echo '<script language="javascript">';
			echo 'alert("No se pudo realizar la consulta")';
		echo '</script>';
	}

	$resultadoArray = $resultado->fetchAll();
	//var_dump($resultadoArray);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" href="../css/tabla.css">
	<title>PHP Insertar Comentario</title>
</head>
<body>
	

	<div class="table-users">
        <div class="header">
            Comentarios
        </div>
            <table cellspacing="0">
                <tr>
                    
                    <th>Nombre</th>
                    <th>Email</th>
                    <th width="230">Comentario</th>
                </tr>
				<?php
					foreach($resultadoArray as $dato):
				?>
                <tr>
					<td><?php echo $dato['nombre'] ?></td>
					<td><?php echo $dato['email'] ?></td>
					<td><?php echo $dato['comentario'] ?></td>
				</tr>
				<?php
					endforeach;
					$pdo = null;
				?>

            </table>
	</div>
	<center>
		<a href="../index.php"> <input type="button" name="regresar" value="Regresar"></a>
	</center>
	


</body>
</html>