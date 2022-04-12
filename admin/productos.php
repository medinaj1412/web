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
	<div class="modal" id="modal-add" style="display: none;">		
		<div class="contenedor-datos">
			<button class="btn-close" onclick="hide_modal('modal-add')"><i class="fa fa-times" aria-hidden="true"></i></button>
			<p><b><span id="tipo-proceso">Nuevo</span> producto</b></p>
			<form id="form-add" enctype="multipart/form-data" >
				<input type="hidden" id="cod" name="cod">
				<label class="mt10">Nombre</label>
				<input type="text" placeholder="Nombre" id="nom" name="nom">
				<label class="mt10">Precio</label>
				<input type="number" placeholder="Precio" id="pre" name="pre">
				<label class="mt10">Categoria</label>
				<select class="select" name="cat" id="selC">
                    <option value="A">Seleccionar</option>
		<?php
			$sql="SELECT codcatpro,nomcatpro
			from catpro";
			$result=mysqli_query($conexion,$sql);
			while ($cat=mysqli_fetch_row($result)):
		?>
					<option value="<?php echo $cat[0] ?>"><?php echo $cat[1] ?></option>
		<?php
			endwhile;
		?>
					
				</select>
				<label class="mt10">Empaque</label>
				<select class="select" name="emp" id="selE">
                	<option value="A">Seleccionar</option>
		<?php
			$sql="SELECT codemp,nomemp from empaque";
			$result=mysqli_query($conexion,$sql);
			while ($emp=mysqli_fetch_row($result)):
		?>
					<option value="<?php echo $emp[0] ?>"><?php echo $emp[1] ?></option>
		<?php
			endwhile;
		?>
				</select>
				<br>
				<input type="file" name="imagen" id="imagen">
				<br>
				<button type="submit">Guardar</button>
			</form>
		</div>
	</div>
	<?php include("layouts/dashboard.php"); ?>
	<div class="contenedor-proc">
		<h3 class="mb10">Lista de productos</h3>
		<div class="contenedor-tabla">
			<table class="table ">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
						<th>Precio</th>
						<th>Categoria</th>
						<th>Empaque</th>
						<th>Opciones</th>
                    </tr>
                </thead>
                <tbody id="produc"></tbody>
            </table>
		</div>
		<button class="mt10 btn-normal" onclick="add_producto()">Agregar nuevo</button>
	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript" >
		var editar=false;
		$(document).ready(function(){
			buscar_productos();
			function buscar_productos(consulta){
	            $.ajax({
	                url:'servicios/list.php',
	                type:'POST',
	                dataType :'html',
	            })
	            .done(function(respuesta){
	                $('#produc').html(respuesta);
	            })
			}
			
			$(document).on('click', '.proc-delete', function(){
		        if (confirm('Estas seguro de querer eliminarlo?')) {
					let element = $(this)[0].parentElement.parentElement;					
					let id = $(element).attr('proID');
		            $.post('servicios/delete.php', { id }, function(response){
						console.log(response);
						alert(response.trim());
						window.location.reload();
		            });
		        }
			});
			$(document).on('click', '.proc-act', function() {
			    let element = $(this)[0].parentElement.parentElement;
			    let id = $(element).attr('proID');
		        $.post('servicios/single.php', { id }, function (response) {
		        	$("#tipo-proceso").text("Editar");
		        	show_modal('modal-add');
		            const task = JSON.parse(response);
		            $('#nom').val(task.nom);
		            $('#pre').val(task.pre);
					$('#cod').val(task.cod);
					$('#selC').val(task.cat);
					$('#selE').val(task.emp);
					editar=true;
		        });
			});
			$('#form-add').submit(function(e){
				var formData = new FormData(document.getElementById("form-add"));
				console.log(formData);
		        let url = editar === false ? 'servicios/add.php' : 'servicios/edit.php';
		        console.log(url);			
				$.ajax({
					url: url,
					type: "post",
					dataType: "html",
					data: formData,
					cache: false,
					contentType: false,
					processData: false,
					success:function(response){
						console.log(response);
		           	 	$('#form-add').trigger('reset');
				   		editar=false;
				   		alert(response.trim());
				   		window.location.reload();
					}
				});
				e.preventDefault();
		    });			
		});
		function add_producto(){
			$("#tipo-proceso").text("Nuevo");			
            $('#nom').val("");
            $('#pre').val("");
			$('#cod').val("");
			$('#selC').val("");
			$('#selE').val("");
			editar=false;
			show_modal('modal-add');
		}
	</script>
</body>
</html>