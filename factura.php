<?php

session_start();

include 'conexion.php';



?>



<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Facturación</title>

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

                <a href="acercadenosotros.html">Acerca de Nosotros</a>

                <a href="index.php">Página Principal</a>

            </ul>

        </section>

    </header>





    <main>

        

        <div class="inf"> Información de Facturación</div>

        
        <form action="">

            <div class="cont-form">

                <p class="inf obl"><span>*</span>Información obligatoria</p>

                <div class="cont">

                    <label for="noSuc"><span>*</span>Número de sucursal: </label>

                    <input type="text" name="noSuc" id="noSuc" placeholder="XXXX-XXXX-XXXX" maxlength="12" required>

                </div>

                
                <div class="cont">

                    <label for="ticket"><span>*</span>Número de ticket: </label>

                    <input type="text" name="ticket" id="ticket" placeholder="XXXX-XXXX-XXXX" maxlength="12" required>

                </div>

                <div class="cont">

                    <label for="rfc"><span>*</span>RFC: </label>

                    <input type="text" name="rfc" id="rfc" placeholder="AXXX9231724XX"
                    maxlength="13" required>

                </div>



                <div class="cont">

                    <label for="rs">Razón Social: </label>

                    <input type="text" name="rs" id="rs" placeholder="Organizacion S.A. de C.V." maxlength="50">

                </div>

                <div class="cont cont-pais">

                    <label for="pais"><span>*</span>País: </label>

                    <input type="text" name="pais" id="pais" placeholder="País" maxlength="50" required>

                </div>

                <div class="cont cont-est">

                    <label for="estado"><span>*</span>Estado: </label>

                    <input type="text" name="estado" id="estado" placeholder="Estado" maxlength="50" required>

                </div>





                <div class="cont cont-cd">

                    <label for="cd"><span>*</span>Ciudad: </label>

                    <input type="text" name="cd" id="cd" placeholder="Escriba Ciudad" maxlength="50" required>

                    

                </div>



                

                <div class="cont cont-cp">

                    <label for="cp"><span>*</span>Código Postal: </label>

                    <input type="number" name="cp" id="cp" placeholder="Escriba C.P." maxlength="10" required>

                    

                </div>

                

                <div class="cont">

                    <label for="col"><span>*</span>Colonia: </label>

                    <input type="text" name="col" id="col" placeholder="Escriba Colonia" maxlength="50" required>

                    

                </div>

                <div class="cont cont-ex">

                    <label for="noEx"><span>*</span>Número Exterior: </label>

                    <input type="number" name="noEx" id="noEx" placeholder="Número" maxlength="10" required>

                    

                </div>

                <div class="cont cont-in">

                    <label for="noIn"><span>*</span>Número Interior: </label>

                    <input type="number" name="noIn" id="noIn" placeholder="Número" maxlength="10" required>

                    

                </div>

                

                <div class="cont">

                    <label for="dir">Referencia: </label>

                    <input type="text" name="dir" id="dir" placeholder="Escriba una referencia" maxlength="100">

                </div>



                <div class="cont">

                    <label for="email"><span>*</span>Correo electrónico: </label>

                    <input type="email" name="email" id="email" placeholder="E-mail" maxlength="50" required>

                </div>

                <div id="deslizarBoton"> Mostrar Carrito </div>

                <div id="panel">

                    <table>

                        <tr>   

                            <th>Equipo</th>

                            <th>Precio</th>

                            <th>Cantidad</th>

                            <th>Subtotal</th>

                        </tr>

                        <?php 

                            if(isset($_SESSION['carrito_sess'])){

                                $arregloCarrito = $_SESSION['carrito_sess'];

                                $total = 0;

                                for($i = 0; $i < count($arregloCarrito); $i++){

                                    $total = $total + ($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad']);

                        ?>

                        <tr>   

                            <td>

                                <?php echo $arregloCarrito[$i]['Nombre'];?>

                            </td>

                            <td>

                                $<?php echo $arregloCarrito[$i]['Precio'];?>

                            </td>

                            <td>

                            <?php echo $arregloCarrito[$i]['Cantidad'];?>

                            </td>

                            <td>

                                $<?php echo number_format($arregloCarrito[$i]['Precio'] * $arregloCarrito[$i]['Cantidad'],2,'.','');?>

                            </td>

                        </tr>



                        <?php        

                                }

                            }

                        ?>

                        <tr>

                            <th></th>

                            <th></th>

                            <th>Total: </th>

                            <th style="border-bottom: 2px solid rgb(0,133,195);">

                                $ <?php 

                                    if(isset($total)){

                                        echo number_format($total,2,'.',''); 

                                    }else{

                                        echo "No hay productos";

                                    }                                

                                ?>

                            </th>

                            

                        </tr>

                    </table>

                </div>



                <div class="cont cont-bt">

                    <input type="reset" value="Reiniciar" class="btn">

                </div>

                <div class="cont cont-bt">

                    <input type="submit" value="Subir" class="btn">

                </div>

            </div>

        </form>





    </main>

    <script src="js/jquery-3.4.1.min.js"></script>

    <script>

        $(document).ready(function(){

            $("#deslizarBoton").click(function(){

                $("#panel").slideToggle();

            });



        });

    </script>

    <footer>Integrantes del Equipo 4: Abundis Morales Kevin Leonel, Bibiano Cortes Marko Alan, Caballero Patricio Cristóbal y Tolentino Bracamontes Abril Clarisa</footer>

    

</body>

</html>