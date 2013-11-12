$(document).ready(inicializarEventos);

function inicializarEventos(){
    
}

function controlar(){
   $("#mensaje").empty();

    if ($("#usuario").val().match(/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/)){
       
        $("#formLogueo").submit();
       
       
   }
   else{
       $("#mensaje").html("Usuario y/o contraseña equivocada");
   }
}



