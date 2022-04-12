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
    <main class="carrito">
        <h3 class="h3-main">Mi carrito</h3>
        <div class="contenedor-lista-pro">
            <?php include("layouts/main-lista-productos-carrito.php") ?>
        </div>
        <div class="contenedor-datos">
            <p class="mt10"><b>IMPORTANTE:</b> El pago se realizará a cualquiera de los números de cuenta mostrados después de procesar la compra.</p>
            <?php 
            if (isset($_SESSION['bioancestro-codusu']) && $_SESSION['bioancestro-codusu']!="0") {
                $cod=$_SESSION['bioancestro-codusu'];
                $s="SELECT * FROM usuario where codusu=$cod";
                $result=mysqli_query($conexion,$s);
                $row=mysqli_fetch_array($result);
                if($row['nomusu']=="" || $row['apeusu']==""){
                    ?>
            <h4 class="mt10">Datos de envío</h4>
            <form action="" >
                <label>Nombres</label>  
                <input type="text" placeholder="Nombres" id="nombre" value="<?php echo utf8_encode($row['nomusu']); ?>">
                <label>Apellidos</label>  
                <input type="text" placeholder="Apellidos" id="apellido" value="<?php echo utf8_encode($row['apeusu']); ?>">
                <label>Celular</label>  
                <input type="text" placeholder="Celular" id="celular" value="<?php echo $row['celusu']; ?>">
                <label>Dirección de envío</label>  
                <input type="text" placeholder="Dirección" id="direccion" value="<?php echo utf8_encode($row['dirusu']); ?>">
                <button type="submit" class="btn-pr" value="procesar compra..." id="btn-reg-dat"  >Procesar compra</button>
            </form>
            <?php
                }else{
            ?>
            <h4 class="mt10">Datos de envío</h4>
            <form action="" >
                <label>Celular</label>  
                <input type="text" placeholder="Celular" id="celular" value="<?php echo $row['celusu']; ?>">               <label>Dirección de envío</label>  
                <input type="text" placeholder="Dirección" id="direccion" value="<?php echo utf8_encode($row['dirusu']); ?>">
                <button type="submit" class="btn-pr" value="procesar compra..."  id="btn-reg-dat-dir"  >Procesar compra</button>
            </form>                
            <?php
                }
            }
            elseif(isset($_SESSION['bioancestro-codusu']) && $_SESSION['bioancestro-codusu']=="0"){                
            ?>
                <button type="submit" class="btn-pr" id="procesar" onclick="mostrarmensaje()">Procesar compra</button>
            <?php
            }
            ?>
        </div>
    </main>        
    <?php include("layouts/_main-footer.php") ?>
<script src="js/modal.js"></script>
<script src="js/validar.js"></script>
<script type="text/javascript" src="js/main-animation.js"></script>
<script type="text/javascript">
    function mostrarmensaje(){
        alert('Debe iniciar sesión');
    }
    $('#btn-reg-dat').click(function(e){
        if(validarDatos()==false){
            return false;
        }
        const postData = {
            nom:$('#nombre').val(),
            ape:$('#apellido').val(),
            cel:$('#celular').val(),
            dir:$('#direccion').val()
            
        };
        console.log(postData);
        let url='servicios/usuario/update_datos.php';
        //console.log(url);
        $.post(url, postData, function (data) {
            let response=JSON.parse(data);
            if(response.state){
                alert(response.detail);
                window.location.replace("./pedido.php");
            }else{
                alert(response.detail);
            }

                           
        });
        e.preventDefault();
    });
    $('#btn-reg-dat-dir').click(function(e){
        if(validarDirCel()==false){
            return false;
        }
        const postData = {
            cel:$('#celular').val(),
            dir:$('#direccion').val(),
            
        };
        console.log(postData);
        let url='servicios/usuario/update_datos_dir.php';
        //console.log(url);
        $.post(url, postData, function (data) {
            let response=JSON.parse(data);
            if(response.state){
                alert(response.detail);
                window.location.replace("./pedido.php");
            }else{
                alert(response.detail);
            }                           
        });
        e.preventDefault();
    });
    function delete_producto(codcar){
        const postData = {
            codcar:codcar         
        };
        let url='servicios/producto/delete_item_carrito.php';
        $.post(url, postData, function (data) {
            let response=JSON.parse(data);
            if(response.state){
                window.location.reload();
            }else{
                alert(response.detail);
            }                           
        });
    }
</script>
</body>
</html>