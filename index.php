<?php

	include_once 'conexion.php';

	$query  = 'SELECT * FROM `equipos` ';

	$gsent  =  $pdo->prepare($query);

	$gsent->execute();



	$resultado = $gsent->fetchAll();

	//var_dump($resultado);

?>





<!DOCTYPE html>

<html>

	<head>

		<meta charset="utf-8">

		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

		<link rel="stylesheet" type="text/css" href="css/estilo.css">

		<link rel="stylesheet" href="css/popup.css">

		<link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">

		<script src="js/scrollreveal.js"></script>

		



		<title>Página principal</title>

	</head>

	<body>

		

		<header>    

			<input type="checkbox" id="btn-menu">

			<label for="btn-menu"><img src="img/menu.png" alt="menu" width="40" height="40"></label> 

			<img src="img/dell.png" id="dell" width="40" height="40">   

				<section id="menu">

					<ul>

						<div class="logo">

							<img  src="img/dell.png" width="40" height="40">

						</div>

						<a href="mision.html">Misión</a>

						<a href="vision.html">Visión</a>

						<!-- 
							<a href="factura.php">Facturación</a>						
						-->

						<a href="acercadenosotros.html">Acerca de Nosotros</a>

						<a class="carrito" href="carrito.php">Carrito</a>

					</ul>

				</section>

		</header>



		<!-- Equipos Escritorio -->

		<div class="contact">

			<h1>

				Equipos de escritorio

			</h1>

		</div>



		<main>

			<?php

			foreach($resultado as $dato):

				if($dato['tipo'] == 'escritorio'){

			?>

			<div class="con">

				<div class="pcImg">

					<img src="img/<?php echo $dato['imagen'];?>">

				</div>

				<div class="texto">

					<p align="justify">

						<?php echo $dato['nombre'];?>

						<br>

						<b><i class="fas fa-dollar-sign"></i>  <?php echo $dato['precio']; ?> MXN</b> 
						<br>
						<span>Iva: $ <?php echo $dato['precio'] * 0.16; ?></span>
						<br>

						<?php echo $dato['descripcion'];?>

					</p>

				</div>

				<div class="botones-con">

					<button id="btn-abrir-popup<?php echo $dato['id']-1 ?>" class="btn-abrir-popup">Caracteristicas</button>

					<button id="btn-comprar">

						<a class="btn-compra-fix" href="carrito.php?equiposId=<?php echo $dato['id']?> "><i class="fas fa-shopping-cart"></i></a>

					</button>

				</div>

			</div>

			<?php 

				}

			endforeach 

			?>

		</main>



		<!-- Equipos portatiles -->

		<div class="contact">

			<h1>

				Equipos Portatiles

			</h1>

		</div>



		<main>

			<?php

			foreach($resultado as $dato):

				if($dato['tipo'] == 'laptop'){

			?>

			<div class="con">

				<div class="pcImg">

					<img src="img/<?php echo $dato['imagen'];?>">

				</div>

				<div class="texto">

					<p align="justify">

						<?php echo $dato['nombre'];?>

						<br>

						<b> <i class="fas fa-dollar-sign"></i> <?php echo $dato['precio']; ?> MXN</b>
						<br>
						<span>Iva: $ <?php echo $dato['precio'] * 0.16; ?></span>
						<br>

						<?php echo $dato['descripcion'];?>

					</p>

				</div>

				<div class="botones-con">

					<button id="btn-abrir-popup<?php echo $dato['id']-1?>" class="btn-abrir-popup">Caracteristicas</button>

					<button id="btn-comprar">

						<a class="btn-compra-fix" href="carrito.php?equiposId=<?php echo $dato['id']?> "><i class="fas fa-shopping-cart"></i></a>

					</button>

				</div>

			</div>

			<?php 

				}

			endforeach 

			?>

		</main>





		<!-- Contactanos contenedor -->

		<div class="contact">

			<h1>

				Contactanos...

			</h1>

		</div>



		<main class="comentarios">

			<div class="formulario">

				<form action="php/insertar_comentario.php" method="post" >

					<div class="cont-input">

						<label for="name">Nombre</label>

						<input type="text" name="name" id="name" placeholder="Nombre completo" required>

					</div>

					<div class="cont-input">

						<label for="email">Email</label>

						<input type="email" name="email" id="email" placeholder="Correo electronico" required>

					</div>

					<div class="cont-input">

						<textarea name="coment" id="coment" cols="30" rows="10" placeholder="Escribir comentario"  required> </textarea>

					</div>

					

					<div class="cont-input">

						<input type="submit" value="Subir">

						<input type="reset" value="Borrar">	

						<a href="php/consultar_comentarios.php"> <input type="button" name="regresar" value="Ver Comentarios"></a>				

					</div>

				</form>

			</div>

		<div class="imgComentario"></div>

		</main>





		<!--### AQUI INICIAN LOS POP UPS XD -->

		<?php

		foreach($resultado as $dato):

		?>

		<div class="overlay" id="overlay<?php echo $dato['id']-1 ?>">

			<div class="popup" id="popup<?php echo $dato['id']-1 ?>">

				<a href="#" id="btn-cerrar-popup<?php echo $dato['id']-1 ?>" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>

				<h3>Caracteristicas</h3>

				<h4><?php echo $dato['nombre'];?></h4>

				<div class="pcImg">

					<img class="popupImg"src="img/<?php echo $dato['imagen'];?>">

				</div>

				<ul style="list-style-type:none;">

					<li><b>CPU:</b> <?php echo $dato['cpu']?></li>

					<li><b>GPU:</b> <?php echo $dato['gpu']?></li>

					<li><b>Resolución:</b> <?php echo $dato['resolucion']?></li>

					<li><b>Peso:</b> <?php echo $dato['peso']?></li>

					<li><b>Color:</b> <?php echo $dato['color']?></li>

				</ul>

			

			</div>

		</div>



		<?php

		endforeach;

		$pdo = null;

		?>

		<!--### AQUI TERMINAN LOS POP UPS XD -->



		<footer>Integrantes del Equipo 4: Abundis Morales Kevin Leonel, Bibiano Cortes Marko Alan, 

			Caballero Patricio Cristóbal y Tolentino Bracamontes Abril Clarisa

		</footer>

		<script src="js/popup.js"></script>

		<script>

			window.sr = ScrollReveal();

			

			sr.reveal('header',{

				duration: '2000',

				origin: 'left',

				distance: '100px'

			});



			

			sr.reveal('main',{

				duration: '3000',

				origin: 'bottom',

				distance: '100px'

			}); 



			sr.reveal('.contact',{

				duration: '3000',

				origin: 'left',

				distance: '100px'

			}); 

			sr.reveal('footer',{

				duration: '3000',

				origin: 'left',

				distance: '100px'

			}); 

		</script>

	</body>

	</html>

