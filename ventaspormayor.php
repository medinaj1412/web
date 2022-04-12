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
        <h3 class="mt10">Precios a granel disponibles para ingredientes a granel</h3>
        <p class="mt10">¿Necesita grandes cantidades de ingredientes? <b>¡Bioancestro puede ayudar!</b></p>
        <p class="mt10">Podemos ofrecer grandes cantidades de toda nuestra selección de ingredientes.</p>
        <h3 class="mt20">¿Por qué al por mayor?</h3>
        <p class="mt10"><b>¡Compre más ahorre más!</b></p>
        <p class="mt10">Al comprar grandes cantidades de nuestros ingredientes, puede:</p>
        <ul class="mt10">
            <li class="li-lista">- Obtenga <b>precios exclusivos</b> solo disponibles en pedidos al por mayor.</li>
            <li class="li-lista">- Haga que un <b>especialista en ingredientes</b> lo ayude personalmente.</li>
            <li class="li-lista">- ¡Recibe los documentos técnicos necesarios y más!</li>
        </ul>
        <h3 class="mt20">¿Cómo puedo recibir precios al por mayor?</h3>
        <p class="mt10">Complete el siguiente formulario y un representante se pondrá en contacto con usted en breve.</p>
        <div class="form-venta-mayor">
            <label class="mt10">Nombre</label>
            <br>
            <input type="text" id="idNombre" placeholder="Nombre">
            <br>
            <label class="mt10">Dirección</label>
            <br>
            <input type="text" id="idDireccion" placeholder="Dirección">
            <br>
            <label class="mt10">Celular</label>
            <br>
            <input type="text" id="idCelular" placeholder="Celular">
            <br>
            <label class="mt10">Correo</label>
            <br>
            <input type="text" id="idCorreo" placeholder="Correo">
            <br>
            <label class="mt10">¿Cual es el producto a consultar?</label>
            <br>
            <textarea id="idConsulta" placeholder="Consulta"></textarea>
            <br>
            <div class="div-flex">
                <input type="checkbox" id="idConfirmacion">
                <label class="label-form" for="idConfirmacion">Doy mi consentimiento para recibir comunicaciones de Bioancestro sobre productos, servicios y marketing.</label>
            </div>
            <button class="mt10" onclick="send_mail()">Enviar consulta</button>
        </div>
    </main>        
    <?php include("layouts/_main-footer.php") ?>
<script src="js/modal.js"></script>
<script src="js/validar.js"></script>
<script type="text/javascript" src="js/main-animation.js"></script>
<script type="text/javascript">    
    function send_mail(){
        show_carga();
        $.ajax({
            url:'servicios/usuario/_suscribirse.php',
            type:'POST',
            data:{
                nomusu:document.getElementById("idNombre").value,
                dirusu:document.getElementById("idDireccion").value,
                celusu:document.getElementById("idCelular").value,
                corusu:document.getElementById("idCorreo").value,
                conusu:document.getElementById("idConsulta").value,
                aceptar:document.getElementById("idConfirmacion").checked
            },
            success:function (respuesta){
                //console.log(respuesta);
                let response=JSON.parse(respuesta);
                alert(response.detail);
                hide_carga();
            }
        });
    }
</script>
</body>
</html>