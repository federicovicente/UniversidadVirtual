$(document).ready(() =>{

    const iniciales = document.getElementById('btnIniciales').textContent;
    $('#form-registro').hide();
    $('#form-micuenta').hide();
    $('#form-acceso').show();

    if (iniciales == ""){
        $('#mi-cuenta-nav').hide();
        $('#iniciar-sesion-nav').show();
    }else{
        $('#mi-cuenta-nav').show();
        $('#iniciar-sesion-nav').hide();
        $('#form-acceso').hide();
        $('#form-micuenta').show();
    }

    $('#registro').click(() =>{
        $('#form-registro').fadeIn(500);
        $('#form-acceso').hide();
        $('#form-micuenta').hide();
    })

    $('#acceder').click(() =>{
        $('#form-registro').hide();
        $('#form-acceso').fadeIn(500);
        $('#form-micuenta').hide();
    })
})

function panelCupon(){
    const panel = document.getElementsByClassName("panel_cupon")[0];
    if (panel.style.visibility == "hidden") {
        panel.style.visibility = "visible";
    } 
}


function verificarCupon() {
    const descuento1 = '10offesba';
    const cuponIngresado = document.getElementById('cupon').value
    const cuponvalido = document.getElementById("avisocupon");
    const precioOriginal = document.getElementById("precioOriginal");
    const precioDescuento = document.getElementById("precioDescuento");
    if (cuponIngresado === descuento1) {
        cuponvalido.className = "alert alert-success";
        cuponvalido.textContent = "Cupón registrado!";
        precioOriginal.className = "preciotachado";
        precioOriginal.style.display = "block";
        precioDescuento.style.display = "block";
    } else {
        cuponvalido.className = "alert alert-danger";
        cuponvalido.textContent = "El cupón no es válido";
        precioOriginal.className = "precio";
        precioDescuento.style.display ="none";
    }
    cuponvalido.style.display = "block";
}


function mostrarLogin() {
    document.location.href = "/universidadVirtual/index.php?mostrarLogin=true";
}



    