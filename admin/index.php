<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src="../js/jquery-3.4.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oxygen&display=swap" rel="stylesheet">    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="icon" href="../assets/web/icon.png">
	<title>Bioancestro | Administración</title>
</head>
<body class="login">
	<div class="contenedor-login">
        <form >
            <h3>Bienvenido</h3>
            <label class="mt10">Usuario</label>
            
            <input type="text" id="idUsuario" placeholder="Usuario">
            
            <label class="mt10">Contraseña</label>
            
            <input type="password" id="idContraseña" placeholder="Contraseña">
            
            <button type="button" class="mt10" onclick="login()">Iniciar Sesion</button>

        </form>
	</div>
    <script type="text/javascript">
        function login(){
            window.location.href="main.php";
        }
    </script>
</body>
</html>