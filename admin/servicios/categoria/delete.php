<?php 
include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

if(isset($_POST['id'])){
	$id=$_POST['id'];

	

	$sql="delete from catpro where codcatpro='$id'";
	$result=mysqli_query($conexion,$sql);
	if(!$result){
	    die('error de query');
	}
	echo 'Producto eliminado';
}


?>