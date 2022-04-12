<?php
    for ($i=0; $i < count($carrito); $i++) { 
?>
        <div class="lista-pro">
            <div class="contenedor-img">
                <img class="list-img" src="assets/img/<?php echo $carrito[$i]->nomimapro;?>"></img></div>
            <div class="list-descripcion">
                <h3><?php echo $carrito[$i]->nompro;?></h3>
                <div class="div-flex flex-car">
                    <label class="lbl-sty-car">Cantidad:&nbsp;</label><label><?php echo $carrito[$i]->canpro.' kg';?></label>
                </div>  
                <div class="div-flex flex-car">
                    <label class="lbl-sty-car">Precio:&nbsp;</label><label>S/. <?php echo round($carrito[$i]->prepro*$carrito[$i]->canpro,2);?></label>
                </div>
<?php
        if (isset($carrito[$i]->feccrecar)) {
            echo
                '<div class="div-flex flex-car">
                    <label class="lbl-sty-car">Fecha:&nbsp;</label><label>'.$carrito[$i]->feccrecar.'</label>
                </div>';
        }
?>
            </div>
            <div class="list-buton">
                <div class="delete-btn" onclick="delete_producto(<?php echo $carrito[$i]->codcar; ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i></div>
            </div>       
        </div>
<?php
    }
    if (count($carrito)==0) {
        echo "<label>Carrito vacio</label>";
    }
?>   
    



