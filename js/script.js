$(document).ready(() =>{
    $('#form-registro').hide();
    $('#form-acceso').show();

    $('#registro').click(() =>{
        $('#form-registro').fadeIn(500);
        $('#form-acceso').hide();
    })

    $('#acceder').click(() =>{
        $('#form-registro').hide();
        $('#form-acceso').fadeIn(500);
    })
})

if (location.href.includes("index.php")){
const wrapper = document.querySelector(".wrapperfv");
const carousel = document.querySelector(".carouselfv");
const firstCardWidth = carousel.querySelector(".cardfv").offsetWidth;
const arrowBtns = document.querySelectorAll(".wrapperfv i");
const carouselChildrens = [...carousel.children];
let isDragging = false, isAutoPlay = false, startX, startScrollLeft, timeoutId;
// Get the number of cards that can fit in the carousel at once
let cardPerView = Math.round(carousel.offsetWidth / firstCardWidth);
// Insert copies of the last few cards to beginning of carousel for infinite scrolling
carouselChildrens.slice(-cardPerView).reverse().forEach(card => {
    carousel.insertAdjacentHTML("afterbegin", card.outerHTML);
});
// Insert copies of the first few cards to end of carousel for infinite scrolling
carouselChildrens.slice(0, cardPerView).forEach(card => {
    carousel.insertAdjacentHTML("beforeend", card.outerHTML);
});
// Scroll the carousel at appropriate postition to hide first few duplicate cards on Firefox
carousel.classList.add("no-transition");
carousel.scrollLeft = carousel.offsetWidth;
carousel.classList.remove("no-transition");
// Add event listeners for the arrow buttons to scroll the carousel left and right
arrowBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        carousel.scrollLeft += btn.id == "left" ? -firstCardWidth : firstCardWidth;
    });
});
const dragStart = (e) => {
    isDragging = true;
    carousel.classList.add("dragging");
    // Records the initial cursor and scroll position of the carousel
    startX = e.pageX;
    startScrollLeft = carousel.scrollLeft;
}
const dragging = (e) => {
    if (!isDragging) return; // if isDragging is false return from here
    // Updates the scroll position of the carousel based on the cursor movement
    carousel.scrollLeft = startScrollLeft - (e.pageX - startX);
}
const dragStop = () => {
    isDragging = false;
    carousel.classList.remove("dragging");
}
const infiniteScroll = () => {
    // If the carousel is at the beginning, scroll to the end
    if (carousel.scrollLeft === 0) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.scrollWidth - (2 * carousel.offsetWidth);
        carousel.classList.remove("no-transition");
    }
    // If the carousel is at the end, scroll to the beginning
    else if (Math.ceil(carousel.scrollLeft) === carousel.scrollWidth - carousel.offsetWidth) {
        carousel.classList.add("no-transition");
        carousel.scrollLeft = carousel.offsetWidth;
        carousel.classList.remove("no-transition");
    }
    // Clear existing timeout & start autoplay if mouse is not hovering over carousel
    clearTimeout(timeoutId);
    if (!wrapper.matches(":hover"));
}
const autoPlay = () => {
    if (window.innerWidth < 800 || !isAutoPlay) return; // Return if window is smaller than 800 or isAutoPlay is false
    // Autoplay the carousel after every 2500 ms
    timeoutId = setTimeout(() => carousel.scrollLeft += firstCardWidth, 2500);
}
autoPlay();
carousel.addEventListener("mousedown", dragStart);
carousel.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);
carousel.addEventListener("scroll", infiniteScroll);
wrapper.addEventListener("mouseenter", () => clearTimeout(timeoutId));
wrapper.addEventListener("mouseleave", autoPlay);
}


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

