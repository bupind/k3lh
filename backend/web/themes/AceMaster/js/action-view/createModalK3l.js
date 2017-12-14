jQuery(document).ready(function () {
    var sb = new StringBuilder();

    // =====================
    // MATURITY LEVEL TITLE
    // =====================
    $('#maturity-level-k3l-title-modal').on('show.bs.modal', function(event){
        var button = $(event.relatedTarget);
        var modelName = button.data('model-name');
        var modal = $(this);

        modal.find('#model-name').val(modelName);
    }).on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });

    jQuery('body').on('beforeSubmit', 'form#maturity-level-k3l-title-form', function (e) {

        var form = $(this);
        var modelName = form.find('#model-name').val();

        form.find('i').removeClass('hide');

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data !== false) {
                    $.gritter.add({
                        text: 'Tambah data judul berhasil...',
                        class_name: 'gritter-success'
                    });

                    var inputWrapper = $('#input-maturity-level-k3l-title-wrapper'),
                        sb = new StringBuilder();

                    sb.append('<input type="hidden" name="'+ modelName +'[maturity_level_k3l_title_id]" value="'+ data['id'] +'" />');
                    sb.append('<input type="text" value="'+ data['title_text'] +'" name="title_text" class="col-xs-12" readonly />');
                    inputWrapper.html(sb.toString());

                } else {
                    $.gritter.add({
                        text: 'Tambah data judul gagal...',
                        class_name: 'gritter-error'
                    });
                }

                form.find('i').addClass('hide');
                $('#maturity-level-k3l-title-modal').modal('hide');
            }
        });
    }).on('submit', 'form#maturity-level-k3l-title-form', function (e) {
        e.preventDefault();
    });
});