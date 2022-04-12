<?php 

include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$cod=$_POST['cod'];
$salida="";
$sql="SELECT catpro.nomcatpro,producto.nompro,producto.prepro,
producto.nomimapro,producto.codcatpro ,producto.codpro
FROM producto INNER JOIN catpro on producto.codcatpro=catpro.codcatpro WHERE producto.codpro='$cod'";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.="
        <div class='imagen'><img src='assets/img/".$fila['nomimapro']."' ></div>
        <div class='informacion'>
            <p class='nombre'>".utf8_encode($fila['nompro'])."</p>
            <p class='precio'>S/. ".$fila['prepro']."</p>
            <div class='div-flex'>
                <label>Cantidad (kg):</label>
                <select id='cantidadproducto'>
                    <option value='0.5'>1/2 kg</option>
                    <option value='1' selected>1 kg</option>
                    <option value='5'>5 kg</option>
                    <option value='10'>10 kg</option>
                </select>
            </div>
            <br>
            <button type='button' class='btn-anadir' onclick='save_carrito(".$fila['codpro'].")'>Agregar al carrito</button>
            <br>
            <p class='texto-cat'>Categorias: <a href='busqueda.php?cat=".$fila['codcatpro']."'> ".utf8_encode($fila['nomcatpro'])."</a></p>
        </div>
    ";
    }
}
else{
    $salida.="No hay productos :(";

}
echo $salida;
$conexion->close();
?>