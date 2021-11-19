function contact_open() {
    var x = $('#contact');
    x.css("max-height", "800px");
    x.css("visibility", "visible");
    x.css("transform", "scaleY(1)");
    $('#contact_open').css("display", "none");
}

function contact_close() {
    var x = $('#contact');
    x.css("max-height", "0");
    x.css("transition", "max-height 0.5s ease");
    x.css("visibility", "hidden");
    x.css("transform", "scaleY(0)");
    $('#contact_open').css("display", "block");
}