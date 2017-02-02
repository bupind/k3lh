jQuery(document).ready(function () {
    $('.file-input-image').ace_file_input({
        no_file:'No File ...',
        btn_choose:'Choose',
        btn_change:'Change',
        droppable:true,
        onchange:null,
        thumbnail:false, //| true | large
        //whitelist:'png|jpg|jpeg'
        //blacklist:'exe|php'
        //onchange:''
        //
    });
});