<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador</title>
</head>
<body>
<?php
// checamos si se ha enviado el formulario
if (isset($_POST["un"])){
    // rescatamos un y pw
    $un = $_POST["un"];
    $pw = $_POST["pw"];

    include "../conexion.php";

    //hacemos un query para buscar esta combinación de username y password
    $sql =  "select * from giovanni_admin where un='$un' and pw = PASSWORD('$pw')";
    $rs = ejecutar($sql);

    //checamos si el recordset tiene un dato
    if (mysqli_num_rows($rs) == 0){
        //devolvemos a la página index con un querystring de error
        echo '<script language="javascript">';
        echo 'window.location.assign("index.php?error=login");';
        echo '</script>';
    }else{
        //creamos la sesión de administrador
        $datos = mysqli_fetch_array($rs);
        $_SESSION["administrador"] = $datos["usuario"];

        //redireccionamos a la página productos
        echo '<script language="javascript">';
        echo 'window.location.assign("../productos/index.php");';
        echo '</script>';

    }

}else{
    //redireccioamos a index
    echo '<script language="javascript">';
    echo 'window.location.assign("index.php");';
    echo '</script>';
}
?>
    
</body>
</html>