<?php
    session_start();
   // printf(session_status());
    include 'conexion.php';

    if(isset($_SESSION['carrito_sess'])){
        //si existe, buscamos si ya esta agregado el producto
       // printf("entra");
        if(isset($_GET['equiposId'])){
            $arreglo = $_SESSION['carrito_sess'];
            $encontro = false;
            $numero = 0;    
         //   printf("entra2");
            for($i=0;$i < count($arreglo);$i++){
                if($arreglo[$i]['Id'] == $_GET['equiposId']){
                    $encontro = true;
                    $numero = $i;
                }
            }
            if($encontro == true){
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
                $_SESSION['carrito_sess'] = $arreglo;
            }else{
                //No estaba el registro
                $nombre = "";
                $precio = "";
                $imagen = "";
    
                $query  = 'SELECT * FROM equipos WHERE id='. $_GET['equiposId']; 
                $gsent = $pdo->prepare($query);
                $gsent->execute();
                
                $resultado = $gsent->fetch();
    
                //printf($query);
                //var_dump($resultado);
                 $nombre = $resultado['nombre'];
                 $precio = $resultado['precio'];
                 $imagen = $resultado['imagen'];
                
                 $arregloNuevo = array(
                     'Id' => $_GET['equiposId'],
                     'Nombre' => $nombre,
                     'Precio' => $precio,
                     'Imagen' => $imagen,
                     'Cantidad' => 1
                );
                array_push($arreglo,$arregloNuevo);
                $_SESSION['carrito_sess'] = $arreglo;

            }
        }
    }else{
        //creamos variable de sesion
        if(isset($_GET['equiposId'])){
           
            $nombre = "";
            $precio = "";
            $imagen = "";

            $query  = 'SELECT * FROM equipos WHERE id='. $_GET['equiposId']; 
            $gsent = $pdo->prepare($query);
            $gsent->execute();
            
            $resultado = $gsent->fetch();

            //printf($query);
            var_dump($resultado);
             $nombre = $resultado['nombre'];
             $precio = $resultado['precio'];
             $imagen = $resultado['imagen'];
            
             $arreglo[]= array(
                 'Id' => $_GET['equiposId'],
                 'Nombre' => $nombre,
                 'Precio' => $precio,
                 'Imagen' => $imagen,
                 'Cantidad' => 1
            );
            $_SESSION['carrito_sess'] = $arreglo;
        }   
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <script src="js/scrollreveal.js"></script>
    <title>Carrito compras</title>
</head>
<body>
    
    <header>    
        <input type="checkbox" id="btn-menu">
        <label class="label-fix" for="btn-menu"><img class="img-fix" src="img/menu.png" alt="menu" width="40" height="40"></label> 
        <img class="img-fix" src="img/dell.png" id="dell" width="40" height="40">   
            <section id="menu">
                <ul>
                    <div class="logo">
                        <img class="img-fix" src="img/dell.png" width="40" height="40">
                    </div>
                    <a href="mision.html">Misión</a>
                    <a href="vision.html">Visión</a>
                    <a href="factura.html">Facturación</a>
                    <a href="acercadenosotros.html">Acerca de Nosotros</a>
                    <a class="carrito" href="index.php">Home</a>
                </ul>
            </section>
    </header>   

    <div class="contact">
        <h1>
            Carrito de compras
        </h1>
    </div>

    <div class="table-users">
        <div class="header">
            Contenido del carrito
        </div>
            <table cellspacing="0">
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>

            <?php 
                if(isset($_SESSION['carrito_sess'])){
                    $arregloCarrito = $_SESSION['carrito_sess']; 
                   // var_dump($arregloCarrito);
                    for($i=0; $i < count($arregloCarrito); $i++ ){
            ?>
                <tr>
                    <td><img src="img/<?php echo $arregloCarrito[$i]['Imagen'];?>" alt="" /></td>
                    <td class="tabla-carrito"><?php echo $arregloCarrito[$i]['Nombre'];?></td>
                    <td class="tabla-carrito"><i class="fas fa-dollar-sign"></i> <?php echo $arregloCarrito[$i]['Precio'];?></td>
                    <td><?php echo $arregloCarrito[$i]['Cantidad'];?></td>
                    <td><i class="fas fa-dollar-sign"></i> <?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'];?></td>
                </tr>
            <?php 
                    } 
                }
            ?>


            </table>
    </div>
    <script>
			window.sr = ScrollReveal();
			
			sr.reveal('.table-users',{
				duration: '3000',
				origin: 'bottom',
				distance: '100px'
			}); 

			sr.reveal('.contact',{
				duration: '3000',
				origin: 'left',
				distance: '100px'
			}); 
		</script>
</body>
</html>