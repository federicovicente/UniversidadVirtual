
const deleteModal = document.getElementById('deleteModal')
if (deleteModal) {
  deleteModal.addEventListener('show.bs.modal', event => {
    // Button that triggered the modal
    const button = event.relatedTarget
    // Extract info from data-bs-* attributes
    let idUsuario = button.getAttribute('idUsuario')
    let nombre = button.getAttribute('nombre')
    let apellido = button.getAttribute('apellido')

    const modalBodyInput = deleteModal.querySelector('.modal-body input')
    modalBodyInput.value = idUsuario

    document.getElementById("nombreUsuario").innerHTML=nombre + " " + apellido
  })
}

