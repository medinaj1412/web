function validarRegistro() {
  var email, pass, expresion, dni;
  email = document.getElementById("correo").value;
  dni = document.getElementById("dni").value;

  pass = document.getElementById("contrasena").value;


  var abe = /[a-z]/;
  expresion = /\w+@\w+\.+[a-z]/;
  if (email == "" || pass == "" || dni==""){
    alert("complete todos los campos");
    return false;
  }

  else if (email.length > 50) {
    alert("El correo es demasiado largo");
    return false;
  }
  else if (!expresion.test(email)) {
    alert("El correo es invalido");
        return false;
  }
  else if (pass.length > 60) {
    alert("El password es demasiado largo 20 caracteres como maximo");
    
    return false;
  }

  
  else if (dni.length > 8 || dni.length < 8) {
      alert("El dni es demasiado  corto");
      return false;
    }
  
  else if (isNaN(dni)) {
    alert("El dni es tiene que ser numeros");
    return false;
  }

}
function validarLogin() {
  pass = document.getElementById("contrasenaL").value;
  email = document.getElementById("correoL").value;
  expresion = /\w+@\w+\.+[a-z]/;
  if (email == "" || pass == "" ){
    alert("Complete todos los campos");
    return false;
  }
  else if (email.length > 50) {
    alert("El correo es demasiado largo");
    return false;
  }
  else if (!expresion.test(email)) {
    alert("El correo es inválido");
    return false;
  }
  else if (pass.length > 60) {
    alert("El password es demasiado largo, 20 caracteres como máximo");    
    return false;
  }
}


function validarDatos() {
  var  nom, ape,cel,dir;
  
  nom = document.getElementById("nombre").value;
  ape = document.getElementById("apellido").value;
  cel = document.getElementById("celular").value;
  dir = document.getElementById("direccion").value;
  

  var abe = /[a-z]/;
  if ( nom == "" || ape == "" ){
    alert("complete todos los campos");
    return false;
  }
  

  else if (nom.length > 50) {
    alert("El nombre es demasiado largo");
    return false;
  }
  else if (!abe.test(nom)) {
    alert("El nombre es invalido");
    return false;
  }

  else if (ape.length > 50) {
    alert("El apellido es demasiado largo");
    return false;
  }


  var abe = /[a-z]/;
  if (  cel == ""|| dir==""){
    alert("complete todos los campos");
    return false;
  }
  else if (dir.length > 50) {
    alert("La direccion es demasiado largo");
    return false;
  }


  else if (cel.length > 9 || cel.length < 9) {
    alert("El celular es invalido");
    return false;
  }
  
  else if (isNaN(cel)) {
    alert("El celular tiene que ser numeros");
    return false;
  }
  
  

}






function validarDirCel() {
  var  cel,dir;
  

  cel = document.getElementById("celular").value;
  dir = document.getElementById("direccion").value;

  var abe = /[a-z]/;
  if (  cel == ""|| dir==""){
    alert("complete todos los campos");
    return false;
  }
  else if (dir.length > 50) {
    alert("La direccion es demasiado largo");
    return false;
  }


  else if (cel.length > 9 || cel.length < 9) {
    alert("El celular es demasiado  corto");
    return false;
  }
  
  else if (isNaN(cel)) {
    alert("El celular tiene que ser numeros");
    return false;
  }
  

}