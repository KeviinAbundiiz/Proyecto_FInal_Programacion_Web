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
	<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<link rel="stylesheet" href="../css/tabla.css">
	<script src="../js/scrollreveal.js"></script>
	<title>PHP Insertar Comentario</title>
</head>
<body>
	

	<div class="table-users">
        <div class="header">
            Comentarios
        </div>
            <table cellspacing="0">
                <tr class="rowComentarios">
                    
                    <th>Nombre</th>
                    <th>Email</th>
                    <th width="230">Comentario</th>
                </tr>
				<?php
					foreach($resultadoArray as $dato):
				?>
                <tr class="rowComentarios">
					<td class="tabla-comentario"><?php echo $dato['nombre'] ?></td>
					<td class="tabla-comentario"><?php echo $dato['email'] ?></td>
					<td class="tabla-comentario"><?php echo $dato['comentario'] ?></td>
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
	<br><br><br>
	
		<script>
			window.sr = ScrollReveal();

			sr.reveal('.header',{
				duration: '3000',
				origin: 'left',
				distance: '100px'
			});

			sr.reveal('.rowComentarios',{
				duration: '3000',
				origin: 'bottom',
				distance: '100px'
			}); 
		</script>

</body>
</html>