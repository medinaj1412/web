<?php
    $cod=$_GET['p'];
    $sql="SELECT catpro.nomcatpro,producto.nompro,producto.prepro,
    producto.nomimapro,producto.codcatpro ,producto.codpro
    FROM producto INNER JOIN catpro on producto.codcatpro=catpro.codcatpro WHERE producto.codpro='$cod'";
    $resultado=mysqli_query($conexion,$sql);
    if($resultado->num_rows > 0){
        while($fila=$resultado->fetch_assoc()){
?>
            <div class='imagen'><img src='assets/img/<?php echo $fila['nomimapro']; ?>' ></div>
            <div class='informacion'>
                <p class='nombre'><?php echo utf8_encode($fila['nompro']);?></p>
                <p class='precio'>S/. <?php echo $fila['prepro'];?></p>
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
                <button type='button' class='btn-anadir' onclick='save_carrito(<?php echo $fila['codpro'];?>)'>Añadir al carrito</button>
                <br>
                <p class='texto-cat'>Categorias: <a href='busqueda.php?cat=<?php echo $fila['codcatpro'];?>'> <?php echo utf8_encode($fila['nomcatpro']);?></a></p>
            </div>
<?php
        }
    }