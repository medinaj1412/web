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
				<label class="mt10">Descripcion</label>
                <input type="text" placeholder="Descripcion" name="des" id="des">
				<label class="mt10">Estado</label>
				<input type="number" placeholder="Estado" id="est" name="est">
                <br>
				<button type="submit" id="guardar" onclick="validar()">Guardar</button>
			</form>
		</div>
	</div>
	<?php include("layouts/dashboard.php"); ?>
	<div class="contenedor-proc">
		<h3 class="mb10">Lista de Categorias</h3>
		<div class="contenedor-tabla">
			<table class="table ">
                <thead>
                    <tr>
                        <th>cod. Categoria</th>
                        <th>Nombre</th>
						<th>Descripcion</th>
						<th>Estado</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody id="cate"></tbody>
            </table>
		</div>
		<button class="mt10 btn-normal" onclick="add_producto()">Agregar nuevo</button>
	</div>
	<script type="text/javascript" src="js/main-scripts.js"></script>
	<script type="text/javascript" >
		
		$(document).ready(function(){
            let editar=false;
			buscar_productos();
			function buscar_productos(consulta){
	            $.ajax({
	                url:'servicios/categoria/list.php',
	                type:'POST',
	                dataType :'html',
	            })
	            .done(function(respuesta){
	                $('#cate').html(respuesta);
	            })
            }
            



			$(document).on('click', '.cat-delete', function(){
		        if (confirm('Estas seguro de querer eliminarlo?')) {
					let element = $(this)[0].parentElement.parentElement;					
					let id = $(element).attr('catID');
		            $.post('servicios/categoria/delete.php', { id }, function(response){
						console.log(response);
						alert(response.trim());
						window.location.reload();
		            });
		        }
            });
            







            $('#form-add').submit(function (e) {
				if(validar()==false){
            return false;
        }
            const postData = {
            nom: $('#nom').val(),
            des: $('#des').val(),
            est: $('#est').val(),
            cod: $('#cod').val()
        };
        
        let url = editar === false ?  'servicios/categoria/add.php' : 'servicios/categoria/edit.php';
        console.log(postData);
        
        $.post(url, postData, function (response) {
            console.log(response);
            buscar_productos();
            $('#form-add').trigger('reset');
            alert(response);
            window.location.reload();
            editar=false;
        });
        e.preventDefault();
    });




            $(document).on('click', '.cat-act', function () {
        let element = $(this)[0].parentElement.parentElement;
        let id = $(element).attr('catID');
        console.log(id);


        $.post('servicios/categoria/single.php', { id }, function (response) {

            $("#tipo-proceso").text("Editar");
		    show_modal('modal-add');
            const task = JSON.parse(response);
            $('#cod').val(task.cod);
            $('#nom').val(task.nom);
		    $('#des').val(task.des);
			$('#est').val(task.est);
            editar=true;
            
        });


    });



});
		function add_producto(){
			$("#tipo-proceso").text("Nuevo");			
            $('#nom').val("");
            $('#des').val("");
			$('#est').val("");
			
			editar=false;
			show_modal('modal-add');
		}



		function validar() {
  nom = document.getElementById("nom").value;
  des = document.getElementById("des").value;
  est = document.getElementById("est").value;
  if (nom == "" || des == "" || est == ""){
    alert("Complete todos los campos");
    return false;
  }
  
}
	</script>
</body>
</html>