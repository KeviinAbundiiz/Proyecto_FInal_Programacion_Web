<?php
session_start();
$arreglo = $_SESSION['carrito_sess'];

for($i=0; $i < count($arreglo); $i++){
    if($arreglo[$i]['Id'] == $_POST['id'] ){
        $arreglo[$i]['Cantidad'] = $_POST['cantidad'];
        $_SESSION['carrito_sess'] = $arreglo;
        break;

    }
}
echo "se actualiza";
?>