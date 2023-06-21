                    /*JQuery*/
//efeito fadeIn 

$(document).ready(function(){
    $(".btn").focus(function(){
        $("#div1").fadeIn();
        $("#div2").fadeIn("slow"); //duração do efeito
        $("#div3").fadeIn(8000); //duração em milissegundos
    });
});