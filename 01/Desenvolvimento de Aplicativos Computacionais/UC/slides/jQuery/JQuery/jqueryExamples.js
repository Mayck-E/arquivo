//Seletores
$(document).ready(function(){
    $("button").click(function(){
        $("p").hide();
    });
})

//ocultar e mostrar elementos
$(document).ready(function(){
    $("#hide").click(function(){
        $("p").hide();
    });
})

$(document).ready(function(){
    $("#show").click(function(){
        $("p").show();
    });
})


/*eventos em Jquery*/
$(document).ready(function(){
    $(".ex1").click(function(){
        $(".ex1").hide();
    });
})

$(document).ready(function(){
    $(".ex2").dbclick(function(){
        $(".ex2").hide();
    });
})

$(document).ready(function(){
    $(".ex3").mouseleave(function(){
        $(".ex3").hide();
    });
})


/*eventos2*/
$(document).ready(function(){
    $(".nome").focus(function(){
        $(".nome").css("background-color", "#cccccc");
    });


    $(".nome").blur(function(){
        $(".nome").css("background-color", "#ffffff");
    });
});