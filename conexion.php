
<?php



$link = 'mysql:host=localhost;dbname=id13245444_dell';

$usuario = 'id13245444_root';

$pass = 'ProgramacionWeb123*'; 



try {

    $pdo = new PDO($link, $usuario, $pass);

    

    //echo 'conectado';

  



} catch (PDOException $e) {

    print "¡Error!: " . $e->getMessage() . "<br/>";

    die();

}

