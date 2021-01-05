/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function alertaRoja() {
    alert("¡ALERTA ROJA!");
}
function Redirect(site) {
    window.location.href = site;
}
function noticia(site) {
    site = 0;
    window.location.href = "noticia.php";
}
function like(x) {
    x.classList.toggle("bi-suit-heart-fill");
    var count = document.getElementById("likeCounter").innerHTML;
    document.getElementById("likeCounter").innerHTML = count + 1;
}

function indexCat(site) {
    site = 0;
    window.location.href = "noticia.php";
}


function validacionRegistrarse() {

    email = document.getElementById("emailRegistrarse").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))) {
        alert("correo invalido");
        return false;
    }

    usuario = document.getElementById("usuarioRegistrarse").value;
    if (usuario == null || usuario.length == 0 || pass.length > 15 || /^\s+$/.test(usuario)) {
        alert("agrege un usuario con menos de 15 caracteres");
        return false;
    }

    telefono = document.getElementById("telefonoRegistrarse").value;
    if (!(/^\d{10}$/.test(telefono))) {
        alert("numero de telefono no valido");
        return false;
    }

    pass = document.getElementById("contraseñaRegistrarse").value;
    if (pass == null || pass.length < 8 || /^[a-zA-Z0-9]+$/.test(pass)) {
        alert("agrege una contraseña valida");
        return false;
    }

    pass2 = document.getElementById("contraseñaConfirmarRegistrarse").value;
    if (pass2 != pass) {
        alert("confirme correctamente su contraseña");
        return false;
    }

    alert("Usted esta registrado");

}

function validacionInicioSesion() {

    email = document.getElementById("emailIniciarSesion").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))) {
        alert("correo no registrado");
        return false;
    }

    usuario = document.getElementById("usuarioIniciarSesion").value;
    if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
        alert("usuario incorrecto");
        return false;
    }

    pass = document.getElementById("contraseñaIniciarSesion").value;
    if (pass == null || pass.length < 8 || /^[a-zA-Z0-9]+$/.test(pass)) {
        alert("contraseña incorrecta");
        return false;
    }

    alert("Inicio de sesion exitoso");

}

function validacionConfig() {
    
    usuario = document.getElementById("UsuarioConfig").value;
    if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
        alert("usuario no valido");
        return false;
    }    
    
    email = document.getElementById("mailCofig").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))) {
        alert("correo no valido");
        return false;
    }

    pass = document.getElementById("contraConfig").value;
    if (pass == null || pass.length < 8 || /^[a-zA-Z0-9]+$/.test(pass)) {
        alert("contraseña no valida");
        return false;
    }
    
    pass2 = document.getElementById("confirmarContraConfig").value;
    if (pass2 != pass) {
        alert("confirme correctamente su contraseña");
        return false;
    }
    
    nombreConfig = document.getElementById("nombreConfig").value;
    if (nombreConfig == null || nombreConfig.length == 0 || nombreConfig == " " ||/^\s+$/.test(nombreConfig)) {

    }
    else {
        if (!(/^[A-Z]+$/i.test(nombreConfig))) {
            alert("El nombre solo acepta letras");
            return false;
        }
    }

    apellidoPaConfig = document.getElementById("apellidoPaConfig").value;
    if (apellidoPaConfig == null || apellidoPaConfig.length == 0 || apellidoPaConfig == " " ||/^\s+$/.test(apellidoPaConfig)) {
            
    }
    else {
        if (!(/^[A-Z]+$/i.test(apellidoPaConfig))) {
            alert("El apellido paterno solo acepta letras");
            return false;
        }
    }
    
    apellidoMaConfig = document.getElementById("apellidoMaConfig").value;
    if (apellidoMaConfig == null || apellidoMaConfig.length == 0 || apellidoMaConfig == " " ||/^\s+$/.test(apellidoMaConfig)) {

    }
    else {
        if (!(/^[A-Z]+$/i.test(apellidoMaConfig))) {
            alert("El apellido materno solo acepta letras");
            return false;
        }
    }
    
    TelefonoConfig = document.getElementById("TelefonoConfig").value;
    if (!(/^\d{10}$/.test(TelefonoConfig))) {
        alert("numero de telefono no valido");
        return false;
    }    

    alert("los datos se an actualizado");

}

function BajaUsuariro(){
    var ask = window.confirm("Seguro que quiere dar de baja su cuenta?");
    if (ask) {
        window.alert("Su cuenta a sido dada de baja.");

        window.location.href = "index.php";

    }
}
function ventanaNueva(documento){	
	window.open(documento,'nuevaVentana','width=500, height=600');
}

function CrearSeccion() {
    nombreSeccion = document.getElementById("nombreSeccion").value;
    if (nombreSeccion == null || nombreSeccion.length == 0 || nombreSeccion == " " || /^\s+$/.test(nombreSeccion)) {
        alert("escriba una nombre para la seccion");
        return false;
    }

    posicionSeccion = document.getElementById("posicionSeccion").value;
    if (posicionSeccion == null || posicionSeccion.length == 0 || posicionSeccion == " " || isNaN(posicionSeccion) || /^\s+$/.test(posicionSeccion)) {
        alert("escriba una posicion valida para la seccion");
        return false;
    }

    alert("seccion creada exitosamente");
}
    
function BajaSeccion() {
    var ask = window.confirm("Seguro que quiere dar de baja esta seccion?");
    if (ask) {
        window.alert("La seccion a sido dada de baja.");

        window.close();

    }
}

function publicarNoticia() {
    var ask = window.confirm("Seguro que quiere publicar esta noticia?");
    if (ask) {
        window.alert("La noticia se a publicado.");

        window.location.href = "HomeEditor.php";

    }
}

function RegresarNoticia() {
    var ask = window.confirm("Seguro que quiere regresar esta noticia?");
    if (ask) {
        window.alert("La noticia se a regresado a su autor.");

        window.location.href = "HomeEditor.php";

    }
}

function salirDeAquí() {
  var request = new XMLHttpRequest();
  request.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText);
    }
  };
  request.open("GET", "cerrarSesión.php", true);
  request.send();
}


