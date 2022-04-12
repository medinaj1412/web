<?php 
include '../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

if(isset($_POST['id'])){
	$id=$_POST['id'];

	$sql="select nomimapro from producto where codpro=$id";
	$resulta=mysqli_query($conexion,$sql);
	$row=mysqli_fetch_array($resulta);
	$ruta="../../assets/img/".$row['nomimapro'];
	unlink($ruta);

	$sql="delete from producto where codpro='$id'";
	$result=mysqli_query($conexion,$sql);
	if(!$result){
	    die('error de query');
	}
	echo 'Producto eliminado';
}


?>