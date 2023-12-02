
const deleteModal = document.getElementById('deleteModal')
if (deleteModal) {
  deleteModal.addEventListener('show.bs.modal', event => {
    
    const button = event.relatedTarget
    
    let idUsuario = button.getAttribute('idUsuario')
    let nombre = button.getAttribute('nombre')
    let apellido = button.getAttribute('apellido')

    const modalBodyInput = deleteModal.querySelector('.modal-body input')
    modalBodyInput.value = idUsuario

    document.getElementById("nombreUsuario").innerHTML=nombre + " " + apellido
  })
}

const updateModal = document.getElementById('updateModal')
if (updateModal) {
    updateModal.addEventListener('show.bs.modal', event => {
        
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
    const inputActivo = document.getElementById('inputActivo')

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