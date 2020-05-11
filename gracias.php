<?php
session_start();
include 'conexion.php';

$arreglo = $_SESSION['carrito_sess'];
if(!isset($_SESSION['carrito_sess'])){
    header("Location: index.php");
}else{

    $total = 0;
    
    for($i=0; $i < count($arreglo); $i++){
        $total = $total + ($arreglo[$i]['Precio'] * $arreglo[$i]['Cantidad']); 
    }
    $fecha = date('Y-m-d h:m:s'); 
    $query =  "INSERT into ventas(total, fecha, no_sucursal) values(?, ? ,?)";
    $gsent  =  $pdo->prepare($query);
    
    try{
        $gsent -> execute([$total,$fecha,'1']);
    }catch (Exception $e){
        $pdo->rollback();
        throw $e;
    }
    
    
    $id_venta = $pdo->lastInsertId(); 
    $query = "INSERT into productos_venta(id_venta,id_producto,cantidad,precio,subtotal) values (?,?,?,?,?)";
    
    for($i=0; $i < count($arreglo); $i++){
        $gsent = $pdo->prepare($query);
        $gsent->execute([
            $id_venta,
            $arreglo[$i]['Id'],
            $arreglo[$i]['Cantidad'],
            $arreglo[$i]['Precio'],
            $arreglo[$i]['Cantidad'] * $arreglo[$i]['Precio']
        ]);
    }
    unset($_SESSION['carrito_sess']);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <script src="js/scrollreveal.js"></script>
    <title>Gracias</title>
</head>
<body>
<main>
    <center>
    <div class="inf thx"> ¡¡Gracias por tu compra!!</div>
            <div class="cont-form">
                <div class="img-check">
                    <img src="img/check-yes.png" alt="correcto">
                </div>
                <br><br>
                La compra se ha registrado exitosamente
                <br><br><br>
                <div class="cont cont-bt">
                    <a href="index.php"> <input class="btn" type="button" name="regresar" value="Volver a la tienda"></a>
            </div>
        </div>
    </center>
        

</main>

    
</body>
</html>