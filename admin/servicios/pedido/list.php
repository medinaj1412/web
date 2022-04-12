<?php 

include '../../../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$salida="";
$sql="SELECT p.codped,u.nomusu,SUM(det.predetped) as total,
p.feccreped,p.fecpagped,p.estado,
                    CASE WHEN p.estado= 1 THEN
                        'por pagar'
                        WHEN p.estado=2 THEN
                        'por entregar'
                         WHEN p.estado=3 THEN
                            'recibido'
                         
                    ELSE
                        case WHEN p.estado=4 THEN
                            'cancelado'
                       else
                            'error'
                        END
                    END estadotext FROM pedido as p 
INNER JOIN detped as det on p.codped=det.codped 
INNER JOIN usuario as u on u.codusu=p.codusu  GROUP BY p.codped";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.=
        "
        
        
        <tr >
            <td>".$fila['codped']."</td>
            <td>".utf8_encode($fila['nomusu'])."</td>
            <td>".$fila['total']."</td>
            <td>".utf8_encode($fila['feccreped'])."</td>
            <td>".utf8_encode($fila['fecpagped'])."</td>
            <td> <p class='pil'  cID=".$fila['codped'].">".utf8_encode($fila['estadotext'])."</p>
            <select  id='selEs' data-id='".$fila['codped']."' class='class-guardar'   > 
            <option value='".$fila['estado']."'>".$fila['estadotext']."</option>
            <option value='1'>por pagar</option>
            <option value='2'>por entregar</option>
            <option value='3'>entregado</option>
            <option value='4'>cancelado</option>
            
            </select></td>
            
        </tr>
        
        </form>";
    }
}
else{
    $salida.="Aún no existe pedido :(";
}
echo $salida;
$conexion->close();

?>