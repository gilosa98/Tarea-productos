<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Administrador</title>
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <script src="https://kit.fontawesome.com/5637dd924f.js" crossorigin="anonymous"></script>
    <script src="./scripts.js"></script> 
</head>
<body>
<div class="header">
<h1>Administrador</h1>
</div>

<?php 
include "../conexion.php";
?>


<section class="listaResultados">
    <form method="post" action="index_xt.php"> 
    <div class = "ingreso">

        <div class="titulo">Login</div>
       
        <div class="icono"><i class="fas fa-user"></i></div>
        <div class="datos"><input type="text" name="un" class= "campo" placeholder="usuario" /></div>

        <div class="icono"><i class="fas fa-key"></i></div>
        <div class="datos"><input type="password" name="pw" class= "campo" placeholder="contraseña" /></div>

        <div class="icono"></div>
        <div class="datos">
            <button type="submit" class="boton">Ingresar</button>
        </div>


       
    </div>
    </form>
</section>

</body>
</html>