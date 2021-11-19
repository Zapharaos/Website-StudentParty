function edit_show(x) {
    $(x).css("max-height", "800px");
    $(x).css("transition", "max-height 0.5s ease");
    $(x).css("transform", "scaleY(1)");
    $(x).css("transform-origin", "0% 0% 0%");
    $(x).css("transition", "transform 0.5s ease");
}

function edit_close(x){
    $(x).css("max-height", "0");
    $(x).css("transition", "max-height 0.5s ease");
    $(x).css("transform", "scaleY(0)");
    $(x).css("transform-origin", "50% 50% 0%");
}

function edit_btn_show(x){
    $(x).css("display", "block");
}

function edit_btn_close(x){
    $(x).css("display", "none");
}

function edit(show, close, show_btn, close_btn, show_other, close_other) {
    edit_close(close);
    if ($(close).css("max-height")==="800px"){
        if (close==='#info' && show_other==='#edit_info_open') {
            edit_btn_close(close_other);
            edit_btn_show(show_other);
            edit_show(show);
        } else if (close==='#pwd' && show_other==='#edit_pwd_open') {
            edit_btn_close(close_other);
            edit_btn_show(show_other);
            edit_show(show);
        }
    } else {
        edit_show(show);
    }

    edit_btn_close(close_btn);
    edit_btn_show(show_btn);
}