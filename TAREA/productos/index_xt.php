<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
<?php
if (isset($_POST["productos"])){
    $productos = $_POST["productos"];
    $descripcion = $_POST["descripcion"];
    $precio = $_POST["precio"];
    $tituloFoto = $_FILES["foto"]["name"];
    $tipo = $_FILES["foto"]["type"];
    $tamano = round($_FILES["foto"]["size"]/1024);
    include "../conexion.php";
    if($tituloeFoto = $_FILES["foto"]["name"] == ""){
    $sql = "insert into giovanni_producto (productos, descripcion, precio) values('$productos', '$descripcion', '$precio')";
    $nada = ejecutar($sql);
    echo "<script language='javascript'>";
    echo "window.location.assign('index.php');";
    echo "window.alert('Producto ingresado en la base de datos.');";
    echo "</script>";
    }else{
        $error = 0; 

        if ($tipo != "image/jpeg" && $tipo != "image/jpg" && $tipo != "image/png"){
            $error = 1;

        }else if ($tamano > 500000){
            $error = 2;
        }

        if ($error != 0) {
            echo "<script language='javascript'>";
            echo "window.location.assign('index.php?error=".$error."');";
            echo "</script>";

        } else {
            $idProducto = "select max(idProducto) from giovanni_producto";
            $nombreFinal = $producto."_".$tituloFoto;
            $archivoParaSubir = $ruta.$nombreFinal;
            $temp = $_FILES["foto"]["tmp_name"]; 
            
            if (move_uploaded_file($temp, $archivoParaSubir)){
                $sql = "insert into giovanni_producto (productos, descripcion, precio) values('$productos', '$descripcion', '$precio')";
                $nada = ejecutar($sql);

                $sql_mode = "insert into giovanni_fotoProductos (idProducto, foto) values((select max(idProducto) from giovanni_producto), '$nombreFinal')";
                $nada = ejecutar($sql_mode);
                
                echo "<script language='javascript'>";
                echo "window.location.assign('index.php?foto=yes');";
                echo "window.alert('Producto ingresado en la base de datos.');";
                echo "</script>";

            }else{
                echo "<script language='javascript'>";
                echo "window.location.assign('index.php?error=3');";
                echo "</script>";
            }

        }

    }

}else{
    echo "<script language='javascript'>";
    echo "window.location.assign('index.php');";
    echo "</script>";
}
?>
    
</body>
</html>