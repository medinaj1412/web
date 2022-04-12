<?php
	$sql="select * from producto
    where estado=1";    
    if (isset($_GET['cat'])) {
        $codcatpro=$_GET['cat'];
        $sql.=" and codcatpro = $codcatpro";
    }
    if (isset($_GET['text'])) {
        $text=utf8_decode($_GET['text']);
        $sql.=" and nompro LIKE '%$text%'";
    }
	$result=mysqli_query($conexion,$sql);
	while($row=mysqli_fetch_assoc($result)){
?>
    <div class="producto">
        <div class="cuerpo-producto">
            <a href="producto.php?p=<?php echo $row['codpro'];?>&cat=<?php echo $row['codcatpro']?>">
                <div class="img img-producto-main" style="background-image: url('assets/img/<?php echo $row['nomimapro']; ?>'); ">
                </div>
            <div class="descripcion">
                <p class="nombre-producto"><?php echo utf8_encode($row['nompro']);?></p>
                <p class="precio">S/. <?php echo $row['prepro'];?></p>
            </div>
            <button type="button" class="anadir-carro">Añadir al carrito</button>
            </a>
        </div>
    </div>
<?php 
    }
    if(mysqli_num_rows($result)==0){
        echo "Ups, aún no tenemos resultados para esta búsqueda.";
    }
?>