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
    <title>Bioancestro | Pedidos</title>
</head>
<body>
    <?php  include("layouts/_main-header.php"); ?>
    <div class="main-container">
        <h3 class="h3-main">Lista de pedidos</h3>
        <div class="contenedor-lista-pro">
            <?php
                $selped="SELECT p.codped,p.feccreped,SUM(det.predetped) as total,
                    CASE WHEN p.estado= 1 THEN
                        'Pendiente de Pago'
                    ELSE
                        CASE WHEN p.estado=2 THEN
                            'Por entregar'
                        ELSE
                            'Recibido'
                        END
                    END estadotext
                    FROM pedido as p INNER JOIN detped as det on p.codped=det.codped WHERE p.codusu=$codusu GROUP BY p.codped";
                $resultados=mysqli_query($conexion,$selped);
                while($row=mysqli_fetch_array($resultados)){
                    $codp=$row['codped'];
                
    ?> 
            <div class="acordion-item">

                <div class="acorderon-header ">
                        <div class="list-descripcion">
                            <p>Codigo del Pedido: <?php echo $row['codped']?></p>
                            <p>Fecha: <?php echo $row['feccreped']?></p>
                            <p>Precio: S/ <?php echo $row['total']?></p>
                            <p>Estado: <?php echo $row['estadotext']?></p>
                        </div>
                
                </div>
                
                <div class="acorderon-body"> 


  <?php
                $sep="SELECT * FROM  detped as det inner join producto as pro on det.codpro=pro.codpro WHERE det.codped=$codp ";
                $res=mysqli_query($conexion,$sep);
                while($rowres=mysqli_fetch_array($res)){
                
    ?> 
                    <div class="lista-pro" style="border:none;">
                        <div class="contenedor-img " style="border:none;"><img class="list-img" src="assets/img/<?php echo utf8_encode($rowres['nomimapro'])?>"></img></div>
                            <div class="list-descripcion">
                                <p><b><?php echo utf8_encode($rowres['nompro']);?></b></p>
                                <p>Cantidad: <?php echo $rowres['candetped'];?> kg</p>
                                <p>Precio: S/. <?php echo $rowres['predetped'];?></p>
                            </div>
                    </div>
                <?php } ?>
                </div>            
            </div>
    <?php  
                }
    ?>
        </div>
        <div class="detalle-pago">
            <h3 class="mt10">Método de pago</h3>
            <p>Para poder recibir su producto, deberá cancelar el monto del pedido al siguiente numero de cuenta:</p>
            <div class="mt10">
                <label><strong>Cuenta BCP:</strong> 191-15655678-075</label>
                <br>
                <label><strong>Representante:</strong> Diego Rojas</label>
            </div>
            <p class="mt10">Luego debe enviar la captura del voucher o comprobante de pago a nuestro correo <b>bioancestroventas@gmail.com</b> o al número de whatsapp <b>922 589 640</b>.</p>
        </div>
    </div>
    <?php include("layouts/_main-footer.php") ?>
<script src="js/modal.js"></script>
<script src="js/validar.js"></script>
<script type="text/javascript" src="js/main-animation.js"></script>
<script type="text/javascript">
    const acordionHeader=document.querySelectorAll(".acorderon-header");

    acordionHeader.forEach(acordionHeader=>{
        acordionHeader.addEventListener("click",event=>{
            acordionHeader.classList.toggle("active");
        });
    });
</script>
</body>
</html>