$('#trumbowyg').trumbowyg({
    btns: [
        ['viewHTML', 'formatting', 'strong', 'em', 'del', 'superscript', 'subscript', 'link', 'insertImage', 'justifyLeft', 'justifyCenter', 'justifyRight', 'justifyFull', 'unorderedList', 'orderedList', 'horizontaleRule', 'removeformat', 'foreColor', 'backColor', 'emoji', 'fontfamily', 'fontsize', 'historyUndo', 'historyRedo', 'indent', 'outdent', 'insertAudio', 'lineheight', 'table', 'fullscreen']
    ],
    plugins: {
        resizimg: {
            minSize: 64,
            step: 16,
        }
    }
});  