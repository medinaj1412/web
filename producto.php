<?php
session_start();
include 'servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/producto.css">
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/web/icon.png">
    <title>Bioancestro | Producto</title>
</head>
<body>
    <?php include("layouts/_pantalla-carga.php"); ?>
    <?php include("layouts/modales-ingreso.php") ?>
    <?php include("layouts/_main-header.php") ?>
    <section class="migajas">
        <div class="contenedor-migaja" id="contenedor-migaja">
            <a href="index.php">Inicio </a><span>/</span>
            <a href="#"> bebidas </a><span>/</span>
            <span class="nom-pro"> vino </span>
        </div>
    </section>
    <main class="main-producto">
        <div class="contenedor-producto">
            <div class="producto" id="producto">
                <?php include('layouts/producto.php'); ?>
            </div>
            <div class="botones-p">
                <span>DESCRIPCIÓN</span>
            </div>
            <div class="descripcion" id="descripcion">
                
            </div>
            <div class="relacionados">
                <h3><i class="fa fa-hand-o-right" aria-hidden="true"></i> PRODUCTOS RELACIONADOS</h3>
                <div class="contenedor-productos" id="contenedor-productos"></div>
            </div>
        </div>
    </main>        
    <?php include('layouts/_main-suscripcion.php'); ?>   
    <?php include("layouts/_main-footer.php") ?>
    <script src="js/modal.js"></script>
    <script src="js/validar.js"></script>
    <script type="text/javascript" src="js/main-animation.js"></script>
    <script type="text/javascript">
        var p="<?php echo $_GET['p']; ?>";
        var cat="<?php echo $_GET['cat']; ?>";
        obtener_categoria(p);
        obtener_producto_relacionado(cat);
        descripcion_categoria(cat);
        function obtener_categoria(cod){
            $.ajax({
                url:'servicios/producto/obtener_categoria.php',
                type:'POST',
                data:{cod:cod},
            })
            .done(function(respuesta){
                //console.log(respuesta);
                $('#contenedor-migaja').html(respuesta);
            })
        }    
        function descripcion_categoria(cat){
            $.ajax({
                url:'servicios/producto/get_descripcion_categoria.php',
                type:'POST',
                data:{cat:cat},
            })
            .done(function(respuesta){
                //console.log(respuesta);
                $('#descripcion').html(respuesta);
            })
        }
        function obtener_producto_relacionado(cat){
            $.ajax({
                url:'servicios/producto/get_product_relacionados.php',
                type:'POST',
                data:{cat:cat},
            })
            .done(function(respuesta){
                //console.log(respuesta);
                $('#contenedor-productos').html(respuesta);
                resize_img_main();
            });
        }
        function save_carrito(codpro){
            show_carga();
            $.ajax({
                url:'servicios/producto/save_item_carrito.php',
                type:'POST',
                data:{
                    codpro:codpro,
                    canpro:document.getElementById("cantidadproducto").value
                },
                success:function (respuesta){
                    //console.log(respuesta);
                    let response=JSON.parse(respuesta);
                    alert(response.detail);
                    if (response.state) {
                        window.location.reload();
                    }else{
                        hide_carga();
                    }
                }
            });
        }
    </script>
</body>
</html>