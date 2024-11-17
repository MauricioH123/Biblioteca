function validacionRegistro(form){
    function validacionUsuario(resultado){
        if(resultado == ""){
            return "No se aceptan valores vacios.\n"
        }else if(resultado.length < 9 || resultado.length > 50){
            return "El nombre de usuario no debe ser menor a 9 caracteres o mayor de 50.\n"
        }else{
            return ""
        }
    }

    function validacionContraseña(resultado){
        if(resultado == ""){
            return "No se aceptan valores vacios.\n"
        }else if(resultado.length < 6){
            return "La contraseña debe tener al menos 7 caracteres"
        }else if(!/[a-z]/.test(resultado) || !/[A-Z]/.test(resultado) || !/[0-9]/.test(resultado)){
            return "La contraseña debe contener al menos una letra minúscula, una letra mayúscula y un número.\n"
        } else{
            return "";
        }
    }

    function validacionNombre(resultado){
        if(resultado == ""){
            return "No se aceptan valores vacios,\n"
        }else if(resultado.length < 9 || resultado.length > 50){
            return "El nombre de usuario no debe ser menor a 9 caracteres o mayor de 50.\n"
        }else{
            return ""
        }
    }

    function validacionApellido(resultado){
        if(resultado == ""){
            return "No se aceptan valores vacios.\n"
        }else if(resultado.length < 9 || resultado.length > 50){
            return "El nombre de usuario no debe ser menor a 9 caracteres o mayor de 50.\n"
        }else{
            return ""
        }
    }

    let mensajeError = validacionUsuario(form.usuario.value);
    mensajeError += validacionContraseña(form.contraseña.value);
    mensajeError += validacionNombre(form.nombre.value);
    mensajeError += validacionApellido(form.apellido.value);

    if(mensajeError == ""){
        return true;
    }else{
        alert(mensajeError);
        return false;
    }
}

