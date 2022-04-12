<?php 
    include '../../servicios/conexion.php';
    $cn=new conexion();
    $conexion=$cn->getconection();

    if ($_FILES['imagen']['tmp_name']!="") {
        //Nombre que le pondremos a la imagen
        date_default_timezone_set("America/Lima");
        $fecha=date("Ymd-His", time());
        $nomimg=$fecha.".jpg";
        $ruta="../../assets/img/".$nomimg;
        if(move_uploaded_file($_FILES['imagen']['tmp_name'],$ruta)){
            $nombre=$_POST['nom'];
            $categoria=$_POST['cat'];
            $empaque=$_POST['emp'];
            $precio=$_POST['pre'];
            $sql="INSERT INTO producto(codpro, nompro, prepro, codcatpro, codemp, nomimapro, esppro, estado) VALUES ('','$nombre','$precio','$categoria','$empaque','$nomimg',1,1)";
            $result=mysqli_query($conexion,$sql);
            if(!$result){
                die("No se pudo agregar el producto");
            }
            echo "Producto agregado";
        }else{
            echo "No se pudo guardar la imagen";
        }
    }else{
        echo "Debe cargar una imagen";
    }
 ?>