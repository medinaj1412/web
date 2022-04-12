<?php 
include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

$esta=$_POST['array_enviar'];
foreach( $esta as $v){

    

$sql="update pedido set estado='$v[0]'
where codped='$v[1]'";
$result=mysqli_query($conexion,$sql);


    
}






?>