
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

    if(button.hasAttribute('idUsuario')){}
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
  })
}


const updateModalDocente = document.getElementById('updateModalDocente')
if (updateModalDocente) {
    updateModalDocente.addEventListener('show.bs.modal', event => {
        
    const button = event.relatedTarget
    
    let idUsuario = button.getAttribute('idUsuario')
    let nombre = button.getAttribute('nombre')
    let apellido = button.getAttribute('apellido')
    let email = button.getAttribute('email')
    let administrador = button.getAttribute('administrador')
    let activo = button.getAttribute('activo')

    const inputIdUsuario = document.getElementById('inputIdUsuario')
    const inputNombre = document.getElementById('inputNombre')
    const inputApellido = document.getElementById('inputApellido')
    const inputEmail = document.getElementById('inputEmail')
    const inputAdministrador = document.getElementById('inputAdministrador')
    const inputActivo =  document.getElementById('inputActivo')

    inputIdUsuario.value = idUsuario;
    inputNombre.value = nombre;
    inputApellido.value = apellido;
    inputEmail.value = email;

    if(administrador === 'Si'){
        inputAdministrador.checked = true;
    }else{
        inputAdministrador.checked = false;
    }

    if(activo === 'Si'){
        inputActivo.checked = true;
    }else{
        inputActivo.checked = false;
    }
  })
}

