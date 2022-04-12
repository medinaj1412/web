<?php
session_start();
include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$response=new stdClass();
$cod=$_SESSION['bioancestro-codusu'];
$sel="SELECT * FROM carrito where codusu='$cod'";
$resul=mysqli_query($conexion,$sel);
$row=mysqli_fetch_array($resul);
if (mysqli_num_rows($resul)!=0) {
    $nom=$_POST['nom'];
    $ape=$_POST['ape'];
    $cel=$_POST['cel'];
    $dir=$_POST['dir'];
    $sli="UPDATE usuario SET nomusu='$nom',apeusu='$ape',celusu='$cel',dirusu='$dir' where codusu='$cod'";
    $res=mysqli_query($conexion,$sli);
    if($res){

    	$insped="INSERT INTO pedido(codped, codusu, feccreped, fecpagped,estado) VALUES ('','$cod',now(),'','1')";
        mysqli_query($conexion,$insped);
        $codpet=mysqli_insert_id($conexion);
        $sel="SELECT * FROM carrito where codusu='$cod'";
        $resul=mysqli_query($conexion,$sel);

        while($fila=$resul->fetch_assoc()){
            $codcar=$fila['codcar'];
            $codpro=$fila['codpro'];
            $candetped=$fila['canpro'];
            $predetped=$fila['prepro'];
            $preto=$candetped*$predetped;
            $q="INSERT INTO detped(coddetped, codped, codpro, candetped, predetped) VALUES ('','$codpet','$codpro','$candetped','$preto')";
            mysqli_query($conexion,$q);
            $d="DELETE FROM carrito WHERE codusu=$cod and codpro=$codpro";
            mysqli_query($conexion,$d);
        }

        $response->state=true;
        $response->detail="Compra procesada exitosamente";
    }else{
        
    	$response->state=false;
    	$response->detail="No se pudo agregar datos";
    }
}else{
    $response->state=false;
    $response->detail="El carrito esta vacío";
}
$conexion->close();
echo json_encode($response);
?>
