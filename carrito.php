<?php
    // Iniciamos la sessión
    session_start();
   // printf(session_status());
    include 'conexion.php';
    //Preguntamos si exita una session con el nombre de carrito_sess, si no pasamos al Else
    //carrito_sess es una varaible de session de tipo array, donde se guardaran una lista de equipos
    if(isset($_SESSION['carrito_sess'])){
        //si existe, buscamos si ya esta agregado el producto
       // printf("entra");
       //preguntamos si se recibe la variable equiposId por metodo GET
        if(isset($_GET['equiposId'])){
            //Copiamos a variables temporales
            $arreglo = $_SESSION['carrito_sess'];
            $encontro = false;
            $numero = 0;    
         //   printf("entra2");
         //recorremos el arreglo de productos del carrito y buscamos si ya existe un producto con esa id
            for($i=0;$i < count($arreglo);$i++){
                //aqui preguntamos
                if($arreglo[$i]['Id'] == $_GET['equiposId']){
                    //ponemos la bandera encontroa true y guardamos la posicion del arreglo en numero
                    $encontro = true;
                    $numero = $i;
                    
                }
            }
            //Dos posibilidades, el producto  ya esta dentro del carrito o no esta dentro
            // Si entontró un producto con la misma Id en el arreglo del carrito
            // Solo le aumentamos +1 en su variable cantidad
            if($encontro == true){
                //numero es la posicion que encontramos
                $arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
                //actualizamos la session metiendo otravez el arreglo
                $_SESSION['carrito_sess'] = $arreglo;
    
            }else{
                // la variable de session (array carrito_sess) no tiene el producto
                //lo tenemos que agregar
                $nombre = "";
                $precio = "";
                $imagen = "";
                //query para consultar los datos de la BD
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
                // recordemos que $arreglo contiene la lista de productos (Contenido del carrito, vea linea 14 ) mientras
                // ArregloNuevo contiene unicamente los datos de un producto, el cual queremos agregar al carrito
                // metemos al elemento nuevo ($arregloNuevo) al carrito($arreglo) con array_push
                array_push($arreglo,$arregloNuevo);
                // regresamos los datos del carrito actualizados a la variable de session original.
                $_SESSION['carrito_sess'] = $arreglo;

            }
        }
    }else{
        //Dentro de este else creamos variable de sesion
        //Siginifica que es la primera vez que agregamos al carrito
        // Comprobamos que se envio la variable GET (equposId)
        // EL cual contiene la id del producto a agregar al carrito
        if(isset($_GET['equiposId'])){
            //Variables temporales
            $nombre = "";
            $precio = "";
            $imagen = "";
            // query del equipo de computo
            $query  = 'SELECT * FROM equipos WHERE id='. $_GET['equiposId']; 
            $gsent = $pdo->prepare($query);
            $gsent->execute();
            //Damos formato al resultado
            $resultado = $gsent->fetch();

            //printf($query);
           // var_dump($resultado);
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
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="css/popup.css">
    
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
<center>
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
                    <th>Remover</th>
                </tr>

            <?php 
                if(isset($_SESSION['carrito_sess'])){
                    $arregloCarrito = $_SESSION['carrito_sess']; 
                   // var_dump($arregloCarrito);
                    for($i=0; $i < count($arregloCarrito); $i++ ){
            ?>
                <tr>
                    <td>
                        <img class ="img-table" src="img/<?php echo $arregloCarrito[$i]['Imagen'];?>" alt="" />
                    </td>
                    <td class="tabla-carrito">
                        <?php echo $arregloCarrito[$i]['Nombre'];?>
                    </td>
                    <td class="tabla-carrito">
                        <i class="fas fa-dollar-sign"></i> 
                        <?php echo $arregloCarrito[$i]['Precio'];?>
                    </td>
                    <td>
                        <div class="quantity">
                            <input class="txtCantidad" 
                            data-precio="<?php echo $arregloCarrito[$i]['Precio'];?>"
                            data-id="<?php echo $arregloCarrito[$i]['Id'];?>"
                            type="number"
                            min="1" 
                            max="100" 
                            step="1" 
                            value="<?php echo $arregloCarrito[$i]['Cantidad'];?>">
                        </div>
                    </td>
                    <td class="cant<?php echo $arregloCarrito[$i]['Id'];?>"> 
                        <?php echo $arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'];?>
                    </td>
                    <td>
                        <a class="btn-compra-fix btnEliminar" href=""  data-id="<?php echo $arregloCarrito[$i]['Id']; ?>">
                            <button id="btn-comprar">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </a>
					
                    </td>
                </tr>
            <?php 
                    } 
                }
            ?>


            </table>
    </div>
    <a href="index.php"> <input type="button" name="regresar" value="Regresar"></a>
</center>

    <script src="js/scrollreveal.js"></script>
    <script src="js/jquery-3.4.1.min.js"></script>

    <!-- Script para eliminar elementos del carrito, estamos usando JQuery(Una libreria JS 
    que Agiliza y "facilita" (Notese las comillas en facilita xdxdxd) la implemtenacion de código en JS) y Ajax( Ajax No es un lenguaje 
    de programacion, si no un conjunto de tecnologias para facilitar la comunicación y realizar 
    pedidos a un servidor, php por ejemplo).., o algo asi entendi ;v -->
    <script>
        //creamos funcion anonima para comprobar si la pagina esta lista
        $(document).ready(function(){
            //dentro creamos otra funcion anonima para borrar el elemento, 
            //cuando se presiona un boton (<a></a>) obtentemos la id del producto
            //Con el parametro data-id= el cual le asinamos la id del producto con php
            $(".btnEliminar").click(function(){
                //prevenimos que el objeto (la etiqueta <a>) 
                //realize la tarea de reedirecionar o recargar la pagina
                event.preventDefault(); 
                //obtenemos id
                var id = $(this).data('id');
                //alert(id);
                //obtenemos el boton
                var boton = $(this);
                //realizamos una peticion Ajax, usando 
                $.ajax({
                    method:'POST',
                    //gracias a  Ajax  podemos realizar la eliminación sin que nos redirecione 
                    // a la página eliminarCarrito.php, solo utizamos, en caso de ser necesaro, 
                    //lo que se recibe en la funcion anonima dentro de .done
                    url:'php/eliminarCarrito.php',
                    data: {
                        id:id
                    }
                    //cuando termine 
                }).done(function(respuesta){
                    alert(respuesta);
                    //al recibir la confirmación de eliminacion, borramos el elmento de forma visual
                    // buscamos al padre del boton, el recuadro(td) luego  a su padre del td, osea toda la fila (tr)
                    // y los borramos 
                    boton.parent('td').parent('tr').remove();
                }); 
            });
            // Se Calcula de precio(subtotal del producto) con respecto a la cantidad asiganda
            //.keyup responde a cualquier cambio en la etiqueta input[numero]
            $(".txtCantidad").keyup(function(){
                var cantidad = $(this).val();
                var precio =$(this).data('precio');
                var id =$(this).data('id');
                //si el input esta vacio, se imprime "-"
                if(cantidad == ''){
                    $(".cant"+id).text('-');
                }else{
                    //Se realiza la multi
                    var multi = parseFloat(cantidad)*parseFloat(precio).toFixed(2);
                    //se imprime y cambia, pero solo en el frontend, 
                    // se necesita que se actualiza el arreglo carrito con la cantidad
                    $(".cant"+id).text('$'+multi);

                    $.ajax({
                        method:'POST',
                        url:'php/actualizarCarrito.php',
                        data: {
                            id:id,
                            cantidad:cantidad
                        }
                        
                    }).done(function(respuesta){
                       // alert(respuesta);
                    });
                }

            });
        });
    </script>

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