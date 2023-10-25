$(document).ready(function () {
    $('#example').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'excel', 'pdf', 'print'
        ]
    });
});


// Buscador

// Varibles

barSearch =     document.getElementById("busqueda");
inputSearch =   document.getElementById("inputSearch");
resultSearch =  document.getElementById("boxSearch");

// Función para mostrar el buscador

document.getElementById("inputSearch").addEventListener("keyup", buscador_interno);

function buscador_interno(){
    
    filter = inputSearch.value.toUpperCase();
    li = resultSearch.getElementsByTagName("li");

    // Recorriendo los elementos a filtrar mediante los "li"

    for( i = 0; i < li.length; i++){

        a = li[i].getElementsByTagName("a")[0];
        textValue = a.textContent || a.innerText;
        
        if(textValue.toUpperCase().indexOf(filter) > -1){

            li[i].style.display = "";
            resultSearch.style.display = "block";

            if(inputSearch.value === ""){
                resultSearch.style.display = "none";
            }

        }else{
            li[i].style.display = "none";
        }
    }
}

// Ejecución de Funciones
