<?php
include '../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

$nombre =  $_POST['nom'];
$precio = $_POST['pre'];
$categoria = $_POST['cat'];
$empaque = $_POST['emp'];
$cod = $_POST['cod'];

$sql="update producto set nompro='$nombre',prepro='$precio', codcatpro='$categoria',codemp='$empaque'
where codpro=$cod";
$result=mysqli_query($conexion,$sql);
if(!$result){
    die("Error al actualizar producto");
}else{
    if ($_FILES['imagen']['tmp_name']!="") {
        $sql="select nomimapro from producto
		where codpro=$cod";
		$result=mysqli_query($conexion,$sql);
		$row=mysqli_fetch_array($result);
		$nomimapro_ant=$row['nomimapro'];
        $ruta_ant="../../assets/img/".$nomimapro_ant;

	    //Nombre que le pondremos a la imagen
        date_default_timezone_set("America/Lima");
        $fecha=date("Ymd-His", time());
        $nomimg=$fecha.".jpg";
        $ruta="../../assets/img/".$nomimg;
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
	        unlink($ruta_ant);
	        $sql="update producto set nomimapro='$nomimg'
			where codpro=$cod";
			$result=mysqli_query($conexion,$sql);
			echo "Producto actualizado";
		}else{
			echo "No se pudo actualizar la imagen";
		}
	}else{
		echo "Producto actualizado";
	}
}
?>