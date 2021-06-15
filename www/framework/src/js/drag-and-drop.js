$("#draggable-elmt").draggable();
$("#dropzone").droppable({
    drop: function(event, ui) {
        $(this).css('background', 'rgb(0,200,0)');
    },
    over: function(event, ui) {
        $(this).css('background', 'orange');
    },
    out: function(event, ui) {
        $(this).css('background', 'cyan');
    }
});