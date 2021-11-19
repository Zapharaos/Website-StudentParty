function section(x) {
    test_nav();
    $('#add, #profil, #login, #signin, #base, #details, #reset_pwd, #coming, #forgot').css("display", "none");
    $('#'+x).css("display", "flex");
}

function jumpheader() {
    $("html, body").animate({scrollTop : 0}, 1500);
}

function show_details(x) {
    var element = $(x).find( ".about" )
    element.css( "display", "flex" );
    setTimeout(function(){
        element.css( "opacity", "1" );
        element.css( "max-height", "1000px" );
        }, 0);
}

function close_details(x) {
    var element = $(x).find( ".about" )
    element.css( "opacity", "0" );
    element.css( "max-height", "0" );
    setTimeout(function(){
        element.css( "display", "none" );
        }, 1000);
}

scroll_btn = document.getElementById("top_btn");
$(window).scroll(function() {
    if($(window).scrollTop() > 300) {
        scroll_btn.style.display = "block";
    } else {
        scroll_btn.style.display = "none";
    }
});

document.onreadystatechange = function() { 
    if (document.readyState !== "complete") { 
        document.querySelector("body").style.visibility = "hidden"; 
        document.querySelector("#loader").style.visibility = "visible"; 
    } else { 
        document.querySelector("#loader").style.display = "none"; 
        document.querySelector("body").style.visibility = "visible"; 
    } 
};


// PARTIE DU TP4
function test_email_forgotbutton() {
    var element = document.getElementById('forgot_input');
    if(element){
        var mail = $('input[name=forgot_email]').val();
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (regex.test(mail) ) {
            return "<p style='color:green;' >success : email valide<p/>";
        } else {
            return "<p style='color:red;'>erreur : email invalide</p>";
        }
    } else{
        return "<p style='color:red;'>erreur : pas de champ input</p>";
    }
}

x = test_email_forgotbutton();
document.getElementById('test_tp').innerHTML = x;
