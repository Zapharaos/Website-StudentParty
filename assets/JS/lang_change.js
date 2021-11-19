// select de la langue demandée
$('#mbPOCControlsLangDrop').val(lang_name).change();

// si changement dans le select, alors redirection dans la bonne langue
var langue = document.getElementById("mbPOCControlsLangDrop");
langue.addEventListener("change", function() {
    var url = "index.php?lang=" + lang_two;
    document.location.href= url; 
});

var order = document.getElementById("order");
order.addEventListener("change", function() {
    var order = $('#order').val();
    var url = "index.php?lang=" + lang_name + "&show=base&order=" + order;
    document.location.href= url; 
});