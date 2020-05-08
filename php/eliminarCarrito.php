<?php

// Funcionamiento: Se meten los los productos al arreglo guardado en la sesion, menos el producto
// que se desea eliminar
session_start();
$arreglo = $_SESSION['carrito_sess'];

for($i=0; $i < count($arreglo); $i++){
    //metemos a arreglo de sesion a todos menos al ID que queremos buscar
    if($arreglo[$i]['Id'] != $_POST['id']){
        $arregloNuevo[] = array(
            'Id' => $arreglo[$i]['Id'],
            'Nombre' => $arreglo[$i]['Nombre'],
            'Precio' => $arreglo[$i]['Precio'],
            'Imagen' => $arreglo[$i]['Imagen'],
            'Cantidad' => $arreglo[$i]['Cantidad']
        ); 
    }
}
if(isset($arregloNuevo)){
    $_SESSION['carrito_sess'] = $arregloNuevo;
}else{
    // quiere decir que el registro a eliminar es el unico que habia en carrito
    
    unset($_SESSION['carrito_sess']);
}
echo "Listo, se eliminó procuto";

?>