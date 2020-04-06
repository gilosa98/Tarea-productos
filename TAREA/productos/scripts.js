function abrirModal(){
    document.getElementById("vModal").style.display="block";
    document.getElementById("msj").innerHTML="";

}

function cerrarModal(){
    document.getElementById("vModal").style.display="none";

}

function subirFoto(id){
    window.location.assign("subirFotos.php?id="+id);
}

function validarFormulario(){
    var flag = false;
    for (var i=1; i<3; i++){
    if (document.getElementById("c"+i).value == "") flag = true;
    }
    if (flag){
    document.getElementById("msj").innerHTML="Los incisos de nombre, descripción y precio tienen que estar llenados";
    }else{
    document.getElementById("msj").innerHTML="";
    document.getElementById("f2").submit();
   }
}