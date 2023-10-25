document.getElementById("reg-s").addEventListener("click", register);

document.getElementById("inicio-s").addEventListener("click", log);


var cont = document.querySelector(".cont-log-reg");
var login = document.querySelector(".cont-log");
var reg = document.querySelector(".cont-reg");
var caja_log = document.querySelector(".caja-login");
var caja_reg = document.querySelector(".caja-reg");




function register(){
    reg.style.display="block";
    cont.style.left="410px";
    login.style.display="none";
    caja_reg.style.opacity="0";
    caja_log.style.opacity="1";
}

function log(){
    reg.style.display="none";
    cont.style.left="10px";
    login.style.display="block";
    caja_reg.style.opacity="1";
    caja_log.style.opacity="0";
}