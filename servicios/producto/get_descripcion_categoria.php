<?php 

include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$cat=$_POST['cat'];
$salida="";
$sql="SELECT descatpro FROM catpro where codcatpro='$cat'";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.="
        <p>".utf8_encode($fila['descatpro'])."</p>
    ";
    }
}
else{
    $salida.="No se encontro descripción para la categoria";

}
echo $salida;
$conexion->close();


?>