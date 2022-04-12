<?php 

include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();

    $nombre=$_POST['nom'];
    $descripcion=$_POST['des'];
    $des=utf8_decode($descripcion);
    $estado=$_POST['est'];
    
    
    $sql="INSERT INTO catpro(codcatpro, nomcatpro, descatpro, estado) VALUES ('','$nombre','$des','$estado')";
    $result=mysqli_query($conexion,$sql);
    if(!$result){
        die("No se pudo agregar el producto");
    }
    echo "Producto agregado";
 
 ?>