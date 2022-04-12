<?php
include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

$nombre =  $_POST['nom'];
$descripcion = $_POST['des'];
$des=utf8_decode($descripcion);
$est = $_POST['est'];
$cod=$_POST['cod'];


$sql="update catpro set nomcatpro='$nombre',descatpro='$des', estado='$est'
where codcatpro=$cod";
$result=mysqli_query($conexion,$sql);
if(!$result){
    die("Error al actualizar producto");
}
echo "Producto actualizado";
	

?>