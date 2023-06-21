//janela de alerta ao carregar a página
function alertFunction(){
    alert("Atenção página carregada!!!");
    document.body.style.backgroundColor = "grey";
}

//alterar a cor do texto com o evento mouse sobre 
function cor(){
    document.getElementById("color").style.color = "green";
}

/*janela de confirmação*/
function winConfirm(){
    var x;

    if(confirm("Confirma sua inscrição?") == true){
        x = "Você acabou  de se inscrever! Aguarde nosso contato";
    }else{
        x = "Você não confirmou sua inscrição!";
    }

    document.getElementById("status").innerHTML = x;
}


//abrir nova janela modalidades
function openWin(){
    window.open("popUp.html");
}
function openWinResize(){    
    window.open("popUp.html", "_blank", "width=300", "heigth=300");
}

function printPage(){
    window.print();
}

//Desativando o botão
function disableElement(){
    document.getElementById("btn01").disabled = true
}

function openWin(){    
    window.open("desativabotao.html", "_self");
}   