
const deleteModal = document.getElementById('deleteModal')
if (deleteModal) {
  deleteModal.addEventListener('show.bs.modal', event => {
    
    const button = event.relatedTarget
    
    if(button.hasAttribute('idUsuario')){
        $('#idUsuario_Delete').val($(button).attr("idUsuario"))
        var elementDelete = $(button).attr("nombre") + " " + $(button).attr("apellido")

    }else if(button.hasAttribute('idDocente')){
        $('#idDocente_Delete').val($(button).attr("idDocente"))
        var elementDelete = $(button).attr("nombre") + " " + $(button).attr("apellido")   
    }

    document.getElementById('elementDelete').textContent = elementDelete   

  })
}



const updateModal = document.getElementById('updateModal')
if (updateModal) {
    updateModal.addEventListener('show.bs.modal', event => {
        
    const button = event.relatedTarget

    if(button.hasAttribute('idUsuario')){
        $('#inputIdUsuario').val($(button).attr("idUsuario"))
        $('#inputNombre').val($(button).attr("nombre"))
        $('#inputApellido').val($(button).attr("apellido"))
        $('#inputEmail').val($(button).attr("email"))    
        
        if($(button).attr("administrador") == 'Si'){
            $('#inputAdministrador').prop("checked",true);
        }else{
            $('#inputAdministrador').prop("checked",false);
        }

        if($(button).attr("activo") == 'Si'){
            $('#inputActivo').prop("checked",true);
        }else{
            $('#inputActivo').prop("checked",false);
        }
    }else if(button.hasAttribute('idDocente')){
        $('#inputIdDocente').val($(button).attr("idDocente"))
        $('#inputNombre').val($(button).attr("nombre"))
        $('#inputApellido').val($(button).attr("apellido"))
        $('#inputEmail').val($(button).attr("email"))    
        
        if($(button).attr("activo") == 'Si'){
            $('#inputActivo').prop("checked",true);
        }else{
            $('#inputActivo').prop("checked",false);
        }


    }
  })
}

