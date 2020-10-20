/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

            function alertaRoja(){
                alert("¡ALERTA ROJA!");
            }
            function Redirect(site) {
               window.location.href = site;
            }
            function noticia(site){
                site=0;
                window.location.href = "noticia.php";
            }

function validacionRegistrarse() {

    email = document.getElementById("emailRegistrarse").value;
    if (!(/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(email))) {
        alert("correo invalido");
        return false;
    }
    
    usuario = document.getElementById("usuarioRegistrarse").value;
    if (usuario == null || usuario.length == 0 || /^\s+$/.test(usuario)) {
        alert("agrege un usuario");
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
   
    alert("Usted esta registrado" );

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
   
    alert("Inicio de sesion exitoso" );

}
