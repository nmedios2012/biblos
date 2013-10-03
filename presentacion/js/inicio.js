$(document).ready(inicializarEventos);

function inicializarEventos(){
    //Especifico de un id
    //$("#usuario").focus(pintar);
    //$("#usuario").blur(despintar);
    
    //Especificar por tipo de controles
    //$(":text").focus(pintar);
    //$(":text").blur(despintar);
    
    //especifico de hoja de estilo
    $(".logueando").focus(pintar);
    $(".logueando").blur(despintar);
    $("#enviar").click(controlar);
    enter();
    
}
function enter(){
    $('#formLogueo').each(function() {
        $('input').keypress(function(e) {
            // Enter pressed?
            if(e.which == 10 || e.which == 13) {
                controlar();
            }
        });
});
}

function despintar(){
    $(this).css("background","white");
    
    
    
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
function pintar(){
    
    $(this).css("background","green");
}
