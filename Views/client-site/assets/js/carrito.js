let carritob = document.querySelector("#carrito");
let carti2 = document.querySelector(".cart");


let isEnable = false;

function open() {
    carti2.style.height="500px"; 
    carti2.style.border="4px solid #CD8001"  
    isEnable = true;
}

function close() {
    carti2.style.height="0"; 
    carti2.style.border="0"    
    isEnable = false;
}

function toggle(val) {
    !val ? open() : close();
}


carritob.onclick= () => {
    toggle(isEnable)
};



let scrollTop = 0; 

window.addEventListener('wheel', (e) => {
    
    scrollTop += e.deltaY;

    if (scrollTop <= 0) {
        carti2.style.top = "130px";
        scrollTop = 0;
    } else {
        carti2.style.top = "90px";
    }
});

