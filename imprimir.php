<?php
include 'conexion.php';
if(isset($_GET['tipo'])){
    if($_GET['tipo'] == 'venta'){
        $tipo = 'Venta';
    }else{ $tipo = 'Facturación'; }
}else{header('Location: index.php');}
$id_venta = $_GET['num'];

$query = "SELECT equipos.nombre, productos_venta.cantidad, productos_venta.precio, productos_venta.subtotal from equipos, productos_venta WHERE productos_venta.id_producto = equipos.id AND productos_venta.id_venta = $id_venta";
$gsent  =  $pdo->prepare($query);
$gsent->execute();
$num_equipos =  $gsent->rowCount();
$resultado = $gsent->fetchAll();

//Agregamos la libreria tFPDF
require('tfpdf/tfpdf.php');
$pdf = new tFPDF(); //Creamos un objeto de la librería
 
$pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
$pdf->AddFont('DejaVu','B','DejaVuSansCondensed-Bold.ttf',true);

$pdf->AddPage(); //Agregamos una Pagina
$pdf->SetFont('DejaVu','B',14);
//Agregamos texto en una celda de 40px ancho y 10px de alto, Con Borde, Sin salto de linea y Alineada a la derecha
$pdf->Image('img/dell-black.png',10,10,10,10,'PNG'); 
$pdf->Cell(10,10,'',1,0,'L'); 
$pdf->Cell(180,10,'Dell México S.A. de C.V., filial de la multinacional Dell Inc',1,1,'L');
$pdf->SetFont('DejaVu','B',12); 
$pdf->Cell(190,10,'Fecha: '.date('Y-m-d h:m:s'),1,1,'R'); 

$pdf->SetFont('DejaVu','',12);
$pdf->Cell(190,10,'Se imprime datos de la: '.$tipo,1,1,'C'); 

$pdf->SetFont('DejaVu','',12);
$pdf->Cell(95,10,'Equipos comprados: '.$num_equipos,1,0,'L'); 
$pdf->Cell(95,10,'Número de compra: '.$id_venta,1,0,'R'); 

$pdf->Ln(15);
$pdf->SetFont('DejaVu','B',14);
    $pdf->Cell(190,10,'Carrito de Compra',1,1,'C'); 
$pdf->SetFont('DejaVu','B',10);
$pdf->Cell(47.5,10,'Nombre',1,0,'L');
$pdf->Cell(47.5,10,'Cantidad',1,0,'L');
$pdf->Cell(47.5,10,'Precio',1,0,'L');
$pdf->Cell(47.5,10,'Subtotal',1,1,'L');

$pdf->SetFont('DejaVu','',10);

foreach($resultado as $dato){
    $pdf->Cell(47.5,10,$dato['nombre'],1,0,'L');
    $pdf->Cell(47.5,10,$dato['cantidad'],1,0,'L');
    $pdf->Cell(47.5,10,'$'.$dato['precio'],1,0,'L');
    $pdf->Cell(47.5,10,'$'.$dato['subtotal'],1,1,'L');
}


$query = "SELECT ventas.total from ventas WHERE ventas.id = $id_venta";
$gsent  =  $pdo->prepare($query);
$gsent->execute();
$resultado = $gsent->fetchAll();


$pdf->SetFont('DejaVu','B',10);

$pdf->Cell(47.5,10,'',1,0,'L');
$pdf->Cell(47.5,10,'',1,0,'L');
$pdf->Cell(47.5,10,'',1,0,'L');
$pdf->Cell(47.5,10,'Total: $'.$resultado[0]['total'],1,0,'L');


$pdf->Ln(15);

if($_GET['tipo'] != 'venta'){
   // $pdf->AddPage(); //Agregamos una Pagina-
    $pdf->SetFont('DejaVu','B',14);
    $pdf->Cell(190,10,'Datos de la '.$tipo,1,1,'C'); 

    $query = "SELECT * FROM `facturas` WHERE id_venta = $id_venta";
    $gsent  =  $pdo->prepare($query);
    $gsent->execute();
    $resultado = $gsent->fetchAll();
        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'RFC: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['rfc'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'Razón Social: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['razon_social'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'País: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['pais'],1,1,'C');
        
        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'Estado: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['estado'],1,1,'C');
        
        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'Ciudad: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['ciudad'],1,1,'C');
        
        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'C.P.: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['codigo_postal'],1,1,'C');
        
        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'Colonia: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['colonia'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'No. Exterior: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['numero_exterior'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'No. Interior: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['numero_interior'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,20,'Referencia: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,20,$resultado[0]['referencia'],1,1,'C');

        $pdf->SetFont('DejaVu','B',10);
        $pdf->Cell(47.5,10,'E-mail: ',1,0,'L');
        $pdf->SetFont('DejaVu','',10);
        $pdf->Cell(142.5,10,$resultado[0]['email'],1,1,'C');
    

}
$pdf->Output(); //Mostramos el PDF creado
?>