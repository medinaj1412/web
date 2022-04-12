<?php

if (!isset($_SESSION['bioancestro-codusu'])) {
    $_SESSION['bioancestro-codusu']="0";
}
$text='';
if (isset($_GET['text'])) {
    $text=$_GET['text'];
}
    $carrito=[];
    if (isset($_SESSION['carrito'])) {
        $carrito=$_SESSION['carrito'];
    }else{
        if (isset($_SESSION['bioancestro-codusu']) && $_SESSION['bioancestro-codusu']!="0") {
            $codusu=$_SESSION['bioancestro-codusu'];
            $sql="select * from carrito car
            inner join producto pro
            on car.codpro=pro.codpro
            where car.codusu=$codusu";
            $result=mysqli_query($conexion,$sql);
            while ($row=mysqli_fetch_array($result)) {
                $obj=new stdClass();
                $obj->codcar=$row['codcar'];
                $obj->codpro=$row['codpro'];
                $obj->nompro=utf8_encode($row['nompro']);
                $obj->canpro=$row['canpro'];
                $obj->prepro=$row['prepro'];
                $obj->nomimapro=$row['nomimapro'];
                $obj->feccrecar=$row['feccrecar'];
                array_push($carrito, $obj);
            }
        }
    }

    $q="select * from catpro ";
    $resul=mysqli_query($conexion,$q);
?>
<header>
    <div class="navbar">
        <div class="navbar-contenedor">
            <div class="navbar-enlace">
                <a href="#" class="delivery">ENVÍOS A NIVEL NACIONAL</a>
                <!--
                <a href="#" class="barra-left">Ofertas</a>
                <a href="#" class="barra-left">Mi Cuenta</a>-->
                <?php
                if (isset($_SESSION['bioancestro-codusu']) && $_SESSION['bioancestro-codusu']!="0") {
                echo 
                '<a href="#" onclick="ctrl_menu()" class="barra-left"><i class="fa fa-user" aria-hidden="true"></i> '.$_SESSION['bioancestro-corusu'].'</a>
                <div class="menu-usuario" style="display:none;" id="ctrl-menu">
                    <div class="content-menu">
                        <a class="item-menu" href="pedido.php"><i class="fa fa-list-ul" aria-hidden="true"></i> Pedidos</a>
                        <a class="item-menu" href="_logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a>
                    </div>
                </div>';
                }else{
                echo
                '<a href="#" id="login"  class="barra-left"><i class="fa fa-sign-in" aria-hidden="true"></i> Iniciar Sesión</a>';
                }
                ?>
            </div>
            <div class="navbar-text">
                <span><i class="fa fa-phone" aria-hidden="true"></i> Llámanos al 922589640</span>
            </div>
        </div>
    </div>
    <div class="navbar-main">
        <div class="navbar-main-contenedor">
            <div class="navbar-img">
                <a href="index.php">
                    <img src="assets/web/logo.png" alt="">
                </a>
            </div>            
            <div class="ctrl-links" onclick="show_links()"><i class="fa fa-bars" aria-hidden="true"></i></div>
            <div class="navbar-links" id="ctrl-links">
                <a href="index.php">INICIO</a>
                <a href="busqueda.php">PRODUCTOS</a>
                <a href="comocomprar.php">CÓMO COMPRAR</a>
                <a href="ventaspormayor.php">VENTAS POR MAYOR</a>
                <a href="indexx.php">SERVICIO AL CLIENTE</a>
            </div>
        </div>
    </div>
    <div class="navbar-bottom">
        <div class="navbar-bottom-contenedor">
            <div class="contenedor-buton">
                <button type="button" onclick="show_filtros()" class="btn-menu"><i class="fa fa-bars" aria-hidden="true"></i> NUESTROS PRODUCTOS</button>
                <div class="contenedor-cat" id="contenedor-cat" >
                    <ul>
                    <?php
                        while ($fila=mysqli_fetch_array($resul)) { 
                    ?>
                        <li><a href="busqueda.php?cat=<?php echo$fila['codcatpro']?>"><?php echo $fila['nomcatpro']; ?></a></li>
                    <?php
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <form class="contenedor-search" action="busqueda.php" method="GET">
                <input type="search" name="text" id="buscar" value="<?php echo $text; ?>" placeholder="Ingresa una o varias palabras..." class="search">
                <button type="submit" class="btn-buscar" ><i class="fa fa-search" aria-hidden="true"></i></button>
            </form>
            <div class="contenedor-carrito">
                
                        <a href="carrito.php">
                <div class="body-carrito">
                    <div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
                    <div class="detalle">
                        <span class="span-max">Mi carrito</span>
                        <span class="span-min"><span id="numitemscart"><?php echo count($carrito); ?></span> items</span>
                    </div>
                </div>
                        </a>
            </div>
        </div>
    </div>
</header>