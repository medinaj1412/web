<?php 

include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$id=$_POST['id'];
$sql="select * from catpro where codcatpro='$id'";
$result=mysqli_query($conexion,$sql);
if(!$result){
    die('consulta fallida');
}
$json=array();
while($row=mysqli_fetch_array($result)){

    $json[]=array(
        'cod'=> $row['codcatpro'],
        'nom'=> utf8_encode($row['nomcatpro']),
        'des'=> utf8_encode($row['descatpro']),
        'est'=> $row['estado']
        
    );
}
$jsonstring= json_encode($json[0]);
echo $jsonstring;


?>