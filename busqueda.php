<?php
session_start();
include 'servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
?>
<!DOCTYPE>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/web/icon.png">
    <title>Bioancestro | Búsqueda</title>
</head>
<body>
    <?php include("layouts/modales-ingreso.php") ?>
    <?php include('layouts/_main-header.php') ?>
     <main><!--seccion de main-->    
        <section class="destacados">
    <?php 
        if(isset($_GET['text'])){
    ?>
            <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Resultado para "<?php echo $_GET['text']; ?>"</h3>
            <div class="contenedor-productos" id="contenedor-productos">                
            </div>
    <?php
        }else{
            if (isset($_GET['cat'])) {
            $codcatpro=$_GET['cat'];
            $sql="select nomcatpro from catpro where codcatpro=$codcatpro";
            $result=mysqli_query($conexion,$sql);
            $rowcatpro=mysqli_fetch_assoc($result);
        ?>
    <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Búsqueda por categoría "<?php echo utf8_encode($rowcatpro['nomcatpro']); ?>"</h3>
    <?php 
            }else{
    ?>
    <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i>&nbsp;Productos disponibles</h3>
    <?php
            }
        }
    ?>       
            <section class="contenedor-productos">
                <?php include('layouts/main-lista-productos.php'); ?>
            </section>
        </div>
    </div>
    </main>
    <?php include('layouts/_main-footer.php'); ?>
    <script src="js/main-animation.js"></script>
    <script src="js/modal.js"></script>
    <script src="js/validar.js"></script>
    <script type="text/javascript">
        $(resize_img_main());
    </script>
</body>
</html>