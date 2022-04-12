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
    <title>Bioancestro | Carrito</title>
</head>
<body>
    <?php include("layouts/_pantalla-carga.php"); ?>
    <?php include("layouts/modales-ingreso.php") ?>
    <?php include("layouts/_main-header.php") ?>
    <main class="content-main">
        <h3 class="mt10">Costo de envío</h3>
        <p class="mt10">El costo de reparto se calcula según el distrito o ciudad donde se encuentre.</p>
        <p class="mt10">Los pedidos podrán ser llevados a su domicilio, centro de trabajo o ser recogidos por usted en nuestra sucursal central en la <b>av. Aviación 338 - La Victoria</b>.</p>
        <h3 class="mt20">¿Cómo comprar?</h3>
        <p class="mt10">Busca tu producto en nuestra plataforma https://www.bioancestro.pe, por medio nuestro catálogo de categorías o banners publicitarios.</p>
        <p class="mt10">Agregar al carrito de compras el producto que te interese haciendo clic en el botón <b>"Añadir al carrito”</b>, luego puedes continuar buscando otros productos que necesites.</p>
        <p class="mt10">Si ya tienes todos los productos que necesitas, haz clic en el ícono de <b>"Carrito"</b> y luego Ver dentro de esta opción para continuar con la compra. Estando ahí, podrás eliminar los productos que desees.</p>
        <p class="mt10">Luego de completar los datos requeridos tendras que <b>"Procesar la compra"</b>. Como último paso mira el resumen de tu compra y realiza el pago a los numeros de cuenta indicados.</p>
    </main>        
    <?php include("layouts/_main-footer.php") ?>
<script src="js/modal.js"></script>
<script src="js/validar.js"></script>
<script type="text/javascript" src="js/main-animation.js"></script>
</body>
</html>