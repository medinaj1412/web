var modal = document.getElementById("myModal");
var btn = document.getElementById("login");
var span = document.getElementById('close');
var btnm=document.getElementById('regis');
var btnr=document.getElementById('loginr');
var modals = document.getElementById("myModals");
var spans=document.getElementById('closes');
btn.onclick = function() {
  modal.style.display = "block";
}
span.onclick = function() {
  modal.style.display = "none";
}
btnm.onclick=function(){
    modal.style.display = "none";
    modals.style.display="block";
}
spans.onclick=function(){
    modals.style.display="none";
}
btnr.onclick=function(){   
    modals.style.display="none";
    modal.style.display = "block";
}
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "block";
  }
  else if (event.target == modals) {
    modals.style.display = "block";
  }
}