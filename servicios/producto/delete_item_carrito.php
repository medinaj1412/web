<?php
session_start();
include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

$response=new stdClass();
$codcar=$_POST['codcar'];
if ($_SESSION['bioancestro-codusu']=="0") {
	$carrito=$_SESSION['carrito'];
	$newcarrito=[];
	for ($i=0; $i < count($carrito); $i++) { 
		if ($carrito[$i]->codcar!=$codcar) {
			$obj=new stdClass();
			$obj->codcar=$i+1;
			$obj->codpro=$carrito[$i]->codpro;
			$obj->nompro=$carrito[$i]->nompro;
			$obj->canpro=$carrito[$i]->canpro;
			$obj->prepro=$carrito[$i]->prepro;
			$obj->nomimapro=$carrito[$i]->nomimapro;
			array_push($newcarrito,$obj);
		}
	}
	$_SESSION['carrito']=$newcarrito;
	$response->state=true;
}else{
	$sql="delete from carrito where codcar=$codcar";
	$result=mysqli_query($conexion,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto eliminado";
	}else{
		$response->state=false;
		$response->detail="No se pudo eliminar el producto";
		$response->sql=$sql;
	}
}

$conexion->close();
echo json_encode($response);