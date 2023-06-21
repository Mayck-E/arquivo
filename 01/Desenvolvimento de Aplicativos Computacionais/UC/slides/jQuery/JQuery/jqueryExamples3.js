//efeito fadeOut 

$(document).ready(function(){
    $(".btn").click(function(){
        $("#div1").fadeOut();
        $("#div2").fadeOut("slow"); //duração do efeito tbm é possível usar o fast para rápido
        $("#div3").fadeOut(8000); //duração em milissegundos
    });
});