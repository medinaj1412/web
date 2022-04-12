<?php 

include '../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$salida="";
$sql="select * from producto pro
inner join catpro cp
on pro.codcatpro=cp.codcatpro
inner join empaque emp
on pro.codemp=emp.codemp
order by pro.codpro";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.=
        "<tr proID=".$fila['codpro'].">
            <td>".$fila['codpro']."</td>
            <td>".utf8_encode($fila['nompro'])."</td>
            <td>".$fila['prepro']."</td>
            <td>".utf8_encode($fila['nomcatpro'])."</td>
            <td>".utf8_encode($fila['nomemp'])."</td>
            <td class='td-flex'>
                <button class='btn-normal-td proc-act' title='Editar'><i class='fa fa-pencil' aria-hidden='true'></i></button>
                <button class='btn-normal-td proc-delete' title='Eliminar'><i class='fa fa-trash' aria-hidden='true'></i></button>
            </td>
        </tr>";
    }
}
else{
    $salida.="No hay productos :(";
}
echo $salida;
$conexion->close();

?>