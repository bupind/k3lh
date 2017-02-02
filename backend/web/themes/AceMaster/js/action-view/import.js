jQuery(document).ready(function () {
    $('.file-input-multiple').ace_file_input({
        style: 'well',
        btn_choose: 'Click to choose files',
        btn_change: null,
        no_icon: 'ace-icon fa fa-cloud-upload',
        droppable: true,
        thumbnail: 'small',
        preview_error: function (filename, error_code) {}
    }).on('change', function(){
        /*
        $.each($(this).data('ace_input_files'), function(i, file){
            alert(file);
        });
        */
    });
});