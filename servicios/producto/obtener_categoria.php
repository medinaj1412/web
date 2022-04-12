<?php 

include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$cod=$_POST['cod'];
$salida="";
$sql="SELECT catpro.nomcatpro,producto.nompro,producto.codcatpro FROM producto INNER JOIN catpro on producto.codcatpro=catpro.codcatpro WHERE producto.codpro='$cod'";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.="
        <a href='index.php'>INICIO</a>&nbsp;<span>/</span>
        <a href='busqueda.php?cat=".$fila['codcatpro']."'>".utf8_encode($fila['nomcatpro'])."</a>&nbsp;<span>/</span>
        <span class='nom-pro'>".utf8_encode($fila['nompro'])."</span>
    ";
    }
}
else{
    $salida.="No hay productos :(";

}
echo $salida;
$conexion->close();


?>