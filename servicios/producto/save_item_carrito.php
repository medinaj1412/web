<?php
session_start();
include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

$response=new stdClass();
if (!isset($_SESSION['bioancestro-codusu'])) {
	$_SESSION['bioancestro-codusu']="0";
}
if ($_SESSION['bioancestro-codusu']=="0") {
	$carrito=[];
	if (isset($_SESSION['carrito'])) {
		$carrito=$_SESSION['carrito'];
	}
	$codpro=$_POST['codpro'];
	$sql="select * from producto
	where estado=1 and codpro=$codpro";
	$result=mysqli_query($conexion,$sql);
	if ($result) {
		$row=mysqli_fetch_array($result);
		$obj=new stdClass();
		$obj->codcar=count($carrito)+1;
		$obj->codpro=$row['codpro'];
		$obj->nompro=utf8_encode($row['nompro']);
		$obj->canpro=$_POST['canpro'];
		$obj->prepro=$row['prepro'];
		$obj->nomimapro=$row['nomimapro'];
		array_push($carrito,$obj);
		$_SESSION['carrito']=$carrito;
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->state=false;
		$response->detail="No se pudo agregar el producto";
	}
}else{
	$codpro=$_POST['codpro'];
	$sql="select * from producto
	where estado=1 and codpro=$codpro";
	$result=mysqli_query($conexion,$sql);
	$row=mysqli_fetch_array($result);
	$codusu=$_SESSION['bioancestro-codusu'];
	$canpro=$_POST['canpro'];
	$prepro=$row['prepro'];
	$sql="INSERT INTO carrito
	(codusu,codpro,canpro,prepro,feccrecar)
	values
	($codusu,$codpro,$canpro,$prepro,now())";
	$result=mysqli_query($conexion,$sql);
	if ($result) {
		$response->state=true;
		$response->detail="Producto agregado";
	}else{
		$response->sql=$sql;
		$response->state=false;
		$response->detail="No se pudo agregar el producto";
	}
}

$conexion->close();
echo json_encode($response);