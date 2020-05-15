<?php
session_start();
include 'conexion.php';

function insertar_fun($arreglo, $pdo){
    $total =    0;
    
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
return $id_venta;
}



if(!isset($_SESSION['carrito_sess'])){
    header("Location: index.php");
}elseif (isset($_POST['rfc'])) {
    if(!isset($_SESSION['carrito_sess'])){header("Location: index.php");}
    //datos provenientes de facturar.php
    $last_venta = insertar_fun($_SESSION['carrito_sess'],$pdo);

    $query =  "INSERT into facturas(rfc, razon_social, pais, estado, ciudad, codigo_postal, colonia, numero_exterior, numero_interior, referencia, email, id_venta, no_sucursal) values(?,?,?,?,?,?,?,?,?,?,?,?,?)";
    $gsent  =  $pdo->prepare($query);
    try{
        $gsent -> execute([
            $_POST['rfc'],
            $_POST['rs'],
            $_POST['pais'],
            $_POST['estado'],
            $_POST['cd'],
            $_POST['cp'],
            $_POST['col'],
            $_POST['noEx'],
            $_POST['noIn'],
            $_POST['ref'],
            $_POST['email'],
            $last_venta,
            1
            ]);
    }catch (Exception $e){
        $pdo->rollback();
        throw $e;
    }
    unset($_SESSION['carrito_sess']);

}else{
    //datos provenientes de insertar_compra.php
    $last_venta =  insertar_fun($_SESSION['carrito_sess'],$pdo);
    unset($_SESSION['carrito_sess']);
}
$tipo_de_venta = $_GET['tipo'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
    <link rel="stylesheet" href="css/popup.css">
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
                    <a href="imprimir.php?tipo=<?php echo $tipo_de_venta; ?>&num=<?php echo $last_venta;?>" target="_blank"> <input class="btn" type="button" name="regresar" value="Abrir PDF"></a>
                </div>
                <div class="cont cont-bt">
                    <a href="index.php"> <input class="btn" type="button" name="regresar" value="Volver a la tienda"></a>
                </div>
        </div>
    </center>
        

</main>

    
</body>
</html>