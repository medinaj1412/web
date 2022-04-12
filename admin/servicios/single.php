<?php 

include '../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$id=$_POST['id'];
$sql="select * from producto where codpro='$id'";
$result=mysqli_query($conexion,$sql);
if(!$result){
    die('consulta fallida');
}
$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'nom'=> $row['nompro'],
        'pre'=>$row['prepro'],
        'cat'=>$row['codcatpro'],
        'emp'=>$row['codemp'],
        'cod'=>$row['codpro']
    );
}
$jsonstring= json_encode($json[0]);
echo $jsonstring;


?>