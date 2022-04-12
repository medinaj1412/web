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
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="assets/web/icon.png">
    <title>Bioancestro</title>
</head>
<body>
    <?php include("layouts/modales-ingreso.php") ?>
    <?php include("layouts/_main-header.php") ?>
    <main>
        <section class="carrusel">
            <div class="atras botones"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            <div class="adelante botones"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
            <div class="img-carru" style="background-image: url(assets/web/1.jpg);"></div>
            <div class="content-titulos">
                <h1 class="h1-animate" id="text-2">Variedad de productos para tu mesa</h1>
                <h1 class="h1-animate" id="text-1">Entrega bajo los protocolos de bioseguridad</h1>
            </div>
        </section>
        <section class="destacados">
            <h3> <i class="fa fa-hand-o-right" aria-hidden="true"></i> LOS DESTACADOS</h3>
            <div class="contenedor-productos" id="contenedor-productos">
                
            </div>
        </section>        
        <section class="wallper">
            <div class="img"></div>
        </section>   
        <?php include('layouts/_main-suscripcion.php'); ?>      
    </main>
    <?php include("layouts/_main-footer.php") ?>
    <script src="js/modal.js"></script>
    <script src="js/validar.js"></script>
    <script type="text/javascript" src="js/main-animation.js"></script>
    <script  type="text/javascript">
        /*agregado 15/07/2020*/
        $(buscar_productos());
        function buscar_productos(consulta){
            $.ajax({
                url:'servicios/producto/get_all_product.php',
                type:'POST',
                dataType :'html',
                data:{consulta:consulta},
            })
            .done(function(respuesta){
                ////console.log(respuesta);
                $('#contenedor-productos').html(respuesta);
                resize_img_main();
            })
        }        
        var imagenes=['assets/web/1.jpg','assets/web/2.jpg'];
        var cont=0;
        document.getElementById("text-1").style.opacity=1;

        
        function carrousel(contenedor){
        	contenedor.addEventListener('click',e=>{
        		let atras=contenedor.querySelector('.atras'),
        		delante =contenedor.querySelector('.adelante'),
        		img=contenedor.querySelector('.img-carru'),
        		tgt=e.target;
        		if(tgt==atras){
        			if (cont>0) {
        				img.style.backgroundImage="url("+imagenes[cont - 1]+")";
        				cont--;
        			}else{
        				img.style.backgroundImage="url("+imagenes[imagenes.length -1]+")";
        				cont=imagenes.length -1;
        			}
        		}else if(tgt==delante){
        			if (cont < imagenes.length -1) {
        				img.style.backgroundImage="url("+imagenes[cont + 1]+")";
        				cont++;
        			}else{
        				img.style.backgroundImage="url("+imagenes[0]+")";
        				cont=0;
        			}
        		}
                var ar=document.getElementsByClassName("h1-animate");
                for (var i = 0; i < ar.length; i++) {
                    ar[i].style.opacity=0;
                }
                document.getElementById("text-"+(cont+1)).style.opacity=1;
        	});
        }
        document.addEventListener("DOMContentLoaded",()=>{
        	let contenedor = document.querySelector('.carrusel');
        	carrousel(contenedor);
        });
    </script>
</body>
</html>