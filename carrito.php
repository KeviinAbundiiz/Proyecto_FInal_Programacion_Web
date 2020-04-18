<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tabla.css">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <link rel="stylesheet" href="css/fontawesome-free-5.13.0-web/css/all.css">
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
            Users
        </div>
            <table cellspacing="0">
                <tr>
                    <th>Picture</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th width="230">Comments</th>
                </tr>

                <tr>
                    <td><img src="https://i.picsum.photos/id/1005/100/100.jpg" alt="" /></td>
                    <td>Jane Doe</td>
                    <td>jane.doe@foo.com</td>
                    <td>01 800 2000</td>
                    <td>Lorem ipsum dolor sit amet, consectetur adipisicing elit. </td>
                </tr>

                <tr>
                    <td><img src="https://i.picsum.photos/id/1027/100/100.jpg" alt="" /></td>
                    <td>John Doe</td>
                    <td>john.doe@foo.com</td>
                    <td>01 800 2000</td>
                    <td>Blanditiis, aliquid numquam iure voluptatibus ut maiores explicabo ducimus neque, nesciunt rerum perferendis, inventore.</td>
                </tr>

                <tr>
                    <td><img src="https://i.picsum.photos/id/64/100/100.jpg" alt="" /></td>
                    <td>Jane Smith</td>
                    <td>jane.smith@foo.com</td>
                    <td>01 800 2000</td>
                    <td> Culpa praesentium unde pariatur fugit eos recusandae voluptas.</td>
                </tr>
                
                <tr>
                    <td><img src="https://i.picsum.photos/id/1025/100/100.jpg" alt="" /></td>
                    <td>John Smith</td>
                    <td>john.smith@foo.com</td>
                    <td>01 800 2000</td>
                    <td>Aut voluptatum accusantium, eveniet, sapiente quaerat adipisci consequatur maxime temporibus quas, dolorem impedit.</td>
                </tr>
            </table>
    </div>
    
</body>
</html>