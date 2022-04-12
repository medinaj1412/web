<?php 

include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$salida="";
$sql="SELECT * FROM catpro ";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.=
        "<tr catID=".$fila['codcatpro'].">
            <td>".$fila['codcatpro']."</td>
            <td>".utf8_encode($fila['nomcatpro'])."</td>
            <td>".utf8_encode($fila['descatpro'])."</td>
            <td>".utf8_encode($fila['estado'])."</td>
            <td class='td-flex'>
                <button class='btn-normal-td cat-act' title='Editar'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                <button class='btn-normal-td cat-delete' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i></button>
            </td>
        </tr>";;
    }
}
else{
    $salida.="No hay productos :(";
}
echo $salida;
$conexion->close();

?>