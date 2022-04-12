<?php 
session_start();
include '../conexion.php';$cn=new conexion();$conexion=$cn->getconection();$response=new stdClass();
$cor=$_POST['email'];
$pas=$_POST['password'];    
$sql="SELECT * from usuario where corusu='$cor' and estado=1";
$result=mysqli_query($conexion,$sql);
if(mysqli_num_rows($result) > 0){
    $row=mysqli_fetch_array($result);
    if ($pas==$row['pasusu']) {
        if (isset($_SESSION['carrito'])) {
            $carrito=[]; $carrito=$_SESSION['carrito']; $codusu=$row['codusu'];
            for ($i=0; $i < count($carrito); $i++) { 
                $codpro=$carrito[$i]->codpro; $canpro=$carrito[$i]->canpro;$prepro=$carrito[$i]->prepro;
                $sql="INSERT INTO carrito
                (codusu,codpro,canpro,prepro,feccrecar)
                values
                ($codusu,$codpro,$canpro,$prepro,now())";
                $result=mysqli_query($conexion,$sql);
            } }
        session_unset();
        $response->state=true;
        $_SESSION['bioancestro-codusu']=$row['codusu'];
        $_SESSION['bioancestro-corusu']=$row['corusu'];
    }else{
        $response->state=false;
        $response->detail="Contraseña incorrecta";}
}else{
    $response->state=false;
    $response->detail="Correo no existe";}
mysqli_close($conexion);
echo json_encode($response);
?>

