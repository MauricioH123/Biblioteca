function validacionInicio(form){
    function validacionUsuario(resultado){
        if(resultado == ""){
            return "Necesitas escribir el nombre de usuario.\n";
        }else{
            return "";
        }
    }

    function validacionContraseña(resultado){
        if(resultado == ""){
            return "Necesitas escribir la contraseña.\n"
        }else{
            return "";
        }
    }

    let mensajeError = validacionUsuario(form.usuario.value);
    mensajeError += validacionContraseña(form.contraseña.value);

    if(mensajeError == ""){
        return true;
    }else{
        alert(mensajeError);
        return false;
    }
}