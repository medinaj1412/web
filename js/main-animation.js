function resize_img_main(){
    var ar=document.getElementsByClassName("img-producto-main");
    var width=document.getElementsByClassName("img-producto-main")[0].offsetWidth;
    for (var i = 0; i < ar.length; i++) {
        ar[i].style.height=width+"px";
    }
}
if (document.getElementsByClassName("img-producto-main")[0]) {
    window.addEventListener('resize',function(){
        resize_img_main();
    });
}
function ctrl_menu(){
	if(document.getElementById("ctrl-menu").style.display=="none"){
		document.getElementById("ctrl-menu").style.display="block";
	}else{
		document.getElementById("ctrl-menu").style.display="none";
	}
}
$('#btn-login').click(function(e){
    if(validarLogin()==false){
        return false;
    }
    const postData = {
        email:$('#correoL').val(),
        password:$('#contrasenaL').val()
    };
    let url='servicios/login/login.php';
    $.post(url, postData, function (data) {
        let response=JSON.parse(data);
        console.log(response);
        if(response.state){
            window.location.reload();
        }else{
            alert(response.detail);
        }                
    });
    e.preventDefault();
});
$('#btn-registrar').click(function(e){
    if(validarRegistro()==false){
        return false;
    }
    const postData = {
        dni:$('#dni').val(),
        email:$('#correo').val(),
        password:$('#contrasena').val()
    };
    let url='servicios/login/registrar.php';
    $.post(url, postData, function (data) {
        let response=JSON.parse(data);
        if(response.state){
            window.location.reload();
        }else{
            alert(response.detail);
        }                
    });
    e.preventDefault();
});
function show_links(){
    if(document.getElementById("ctrl-links").style.display=="none" ||
        document.getElementById("ctrl-links").style.display==""){
        document.getElementById("ctrl-links").style.display="flex";
    }else{
        document.getElementById("ctrl-links").style.display="none";
    }
}


function show_filtros(){
    if(document.getElementById("contenedor-cat").style.display=="none" ||
    document.getElementById("contenedor-cat").style.display==""){
        
        document.getElementById("contenedor-cat").style.display="block";
    }
    else if(document.getElementById("contenedor-cat").style.display=="block"){
        document.getElementById("contenedor-cat").style.display="none";
    }
}

function show_carga(){
    document.getElementById("modal-carga").style.display="block";
}
function hide_carga(){
    document.getElementById("modal-carga").style.display="none";
}