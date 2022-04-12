<?php 

include '../conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
$salida="";
$cat=$_POST['cat'];
$sql="SELECT * FROM producto  where estado=1 and codcatpro='$cat'";
$resultado=mysqli_query($conexion,$sql);
if($resultado->num_rows > 0){
    while($fila=$resultado->fetch_assoc()){
        $salida.=
        "<div  class='producto'>
            <div class='cuerpo-producto'>
                <a href='producto.php?p=".$fila['codpro']."&cat=".$fila['codcatpro']."'>
                    <div class='img img-producto-main' style='background-image: url(assets/img/".$fila['nomimapro'].");'>
                    </div>
                    <div class='descripcion-rela'>
                        <p class='nombre-producto-rela'>".utf8_encode($fila['nompro'])."</p>
                        <p class='precio-rela'>S/. ".$fila['prepro']."</p>
                    </div>
                    <button type='button' class='anadir-carro'>Añadir al carrito</button>
                </a>
            </div>
        </div>";
    }
}
else{
    $salida.="No hay productos :(";

}
echo $salida;
$conexion->close();

?>