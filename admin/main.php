<?php
include '../servicios/conexion.php';
$cn=new conexion();
$conexion=$cn->getconection();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../assets/web/icon.png">
	<title>Bioancestro | Admin</title>
</head>
<body>
	<?php include("layouts/dashboard.php"); ?>
	<div class="contenedor-proc">
		<h3 class="mb10">Lista de pedidos</h3>
		<div class="contenedor-tabla">
			<table class="table ">
                <thead>
                    <tr>
                        <th>Cod. Pedido</th>
                        <th>Usuario</th>
                        <th>Monto</th>
						<th>Fecha pedido</th>
						<th>Fecha pago</th>
						<th>Estado</th>
                    </tr>
                </thead>
                <tbody id="pedido" >
				
				
				
				</tbody>
            </table>
		</div>
		<button class="mt10 btn-normal"  id="guardar">Guardar cambios</button>



	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript" >

$(document).ready(function(){
	
			buscar_productos();
			
			function buscar_productos(consulta){
	            $.ajax({
	                url:'servicios/pedido/list.php',
	                type:'POST',
	                dataType :'html',
	            })
	            .done(function(respuesta){
	                $('#pedido').html(respuesta);
	            })
			}




			

			$(document).on('click', '#guardar', function(){
				
				let array=$('.class-guardar');
				let array_enviar=[];
				for(var i=0;i<array.length;i++){
					let array_aux=[];
					array_aux.push(array[i].value);
					array_aux.push(array[i].dataset.id);
					array_enviar.push(array_aux)

				}			
					
					console.log(array_enviar);
					
		          $.post('servicios/pedido/guardar.php', { array_enviar }, function(response){
						console.log(response);
						window.location.reload();
					});
				});
		  
				
							


			
		
		
		
		
		});





	</script>
</body>
</html>