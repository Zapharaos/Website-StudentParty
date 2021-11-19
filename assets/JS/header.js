function nav() {
    var hide = document.getElementById('hide');
    var h = $('header');
    var s = $('#side');
    var r = $('#rest');
    if (hide.style.display === "none" || hide.style.display === "") {
        // sidebar
        s.css( "max-width", "250px" );
        s.css( "transition", "max-width 0.5s" );
        s.css( "border-left", "solid 5px black" );
        // header
        h.css("filter", "blur(2px)");
        h.css("opacity", "0.5");
        h.css("transition", "opacity 0.5s, blur 0.5s");
        // rest
        r.css( "filter", "blur(2px)" );
        r.css( "opacity", "0.5" );
        r.css( "transition", "opacity 0.5s, blur 0.5s" );
        r.css( "height", "88%" );
        r.css( "overflow", "hidden" );
        r.css( "pointer-events", "none" );
        // hide
        hide.style.display = "flex";
    } else {
        // sidebar
        s.css( "max-width", "0" );
        s.css( "transition", "max-width 0.5s" );
        s.css( "border-left", "none" );
        // header
        h.css("filter", "blur(0px)");
        h.css("opacity", "1");
        h.css("transition", "opacity 0.5s, blur 0.5s");
         // rest
        r.css( "filter", "blur(0px)" );
        r.css( "opacity", "1" );
        r.css( "transition", "opacity 0.5s, blur 0.5s" );
        r.css( "height", "auto" );
        r.css( "overflow", "visible" );
        r.css( "pointer-events", "auto" );
        // hide
        setTimeout(function(){
			hide.style.display = "none";}
		, 500);
  }
}

function test_nav(){
    if ($("#side").css("max-width") === "250px") {
        nav();
    }
}

function home() {
    if ($("#side").css("max-width") !== "250px") {
        var url = "index.php?lang=" + lang_name + "&show=base";
        document.location.href= url; 
    }
}

function ctest() {
    var testfav = document.getElementById('testfav');
    testfav.style.display = 'none';
}