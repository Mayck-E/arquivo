$(document).ready(function(){
    $("button").click(function(){
        $("div").animate({
            left: '300px',
            opacity: '0.5',
            height: '320px',
            width: '250px'
        });
        $("p").show();
    })
})