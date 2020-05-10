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

    <title>Insertar Compra</title>

</head>

<body>



    <main>

        <div class="inf"> Confirmación de compra </div>



        <form action="">

         <div class="cont-form">

             <br><br>



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

            <br><br>

        </div>

        <div class="cont cont-bt">

            <a href="carrito.php"> <input class="btn" type="button" name="regresar" value="Regresar"></a>

        </div>

        <div class="cont cont-bt">

            <input type="submit" value="Confirmar compra" class="btn">

        </div>


    </form>



</main>

<!--
<div id="con-btn-regresar">
    <a href="carrito.php"> <input type="button" name="regresar" value="Regresar"></a>
</div>-->






<br><br><br>



<script src="js/jquery-3.4.1.min.js"></script>

<script>

    $(document).ready(function(){

        $("#deslizarBoton").click(function(){

            $("#panel").slideToggle();

        });



    });

</script>







</body>

</html>













