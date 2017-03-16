jQuery(function($) {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder();

    $('.date-picker').datepicker({
        autoclose: true,
        todayHighlight: true
    }).next().on(ace.click_event, function () {
        $(this).prev().focus();
    });
    
    if(!ace.vars['touch']) {
        $('.chosen-select').chosen({allow_single_deselect: true});
        //resize the chosen on window resize

        $(window)
            .off('resize.chosen')
            .on('resize.chosen', function () {
                $('.chosen-select').each(function () {
                    var $this = $(this);
                    $this.next().css({'width': $this.parent().width()});
                })
            }).trigger('resize.chosen');
        //resize chosen on sidebar collapse/expand
        $(document).on('settings.ace.chosen', function (e, event_name, event_val) {
            if (event_name != 'sidebar_collapsed')
                return;
            $('.chosen-select').each(function () {
                var $this = $(this);
                $this.next().css({'width': $this.parent().width()});
            })
        });
    }
    
    /********************************/
    //add tooltip for small view action buttons in dropdown menu
    $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});

    //tooltip placement on right or left
    function tooltip_placement(context, source) {
            var $source = $(source);
            var $parent = $source.closest('table')
            var off1 = $parent.offset();
            var w1 = $parent.width();

            var off2 = $source.offset();
            //var w2 = $source.width();

            if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
            return 'left';
    }
    
    // load a language
    numeral.language('ina', {
        delimiters: {
            thousands: ',',
            decimal: '.'
        },
        abbreviations: {
            thousand: 'rb',
            million: 'jt',
            billion: 'M',
            trillion: 'T'
        },
        ordinal : function (number) {
            return '.';
        },
        currency: {
            symbol: 'Rp.'
        }
    });

    // switch between languages
    numeral.language('ina');

    $('.calx').calx();
    
    //=========================================    
    var linkHref;
    $('.do-master-validation').click(function(e){
        $('#master-modal').modal('show');
        linkHref = $(this).attr('href');
        return false;
    });
    
    $('#master-modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
    });
    
    $('#master-password-form').on('submit', function (e) {
        var form = $(this);

        $('#spinner').removeClass('hide');

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            dataType: 'json',
            success: function (data) {
                if (data !== false) {
                    $.gritter.add({
                        text: 'Verifikasi password master berhasil...',
                        class_name: 'gritter-success'
                    });
                    
                    window.location.href = linkHref;
                } else {
                    $.gritter.add({
                        text: 'Verifikasi password master gagal...',
                        class_name: 'gritter-error'
                    });
                }
                
                $('#spinner').addClass('hide');
                $('#master-modal').modal('hide');
            }
        });
        
        e.preventDefault();
    });

    $(document).on('click', '.btn-delete-attachment', function(){
        if (confirm('Dokumen akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                index = $(this).data('index') === undefined ? '' : $(this).data('index'),
                showUploadFile = $(this).data('upload') === undefined ? false : $(this).data('upload'),
                wrapper = $('#att_' + index),
                inputName = index == '' ? 'Attachment[file]' : 'Attachment['+ index +'][file]';

            $.ajax({
                url: baseUrl + '/attachment/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        if (showUploadFile) {
                            sb.append('<input name="'+ inputName +'" value="" type="hidden">');
                            sb.append('<input name="'+ inputName +'" type="file">');
                        }

                        wrapper.empty().append(sb.toString());
                    } else {
                        alert('Proses hapus dokumen gagal.');
                    }
                }
            });
        }
    });
    
});

$(document).ready(function(){     
    $.fn.setUppercase = function(){
        $(this).keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    };
    
    $.fn.numbersOnly = function(){
        return this.each(function(){
            $(this).keydown(function(e){
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
                // key == 188 => ,
                // key == 190 => .
                // key == 110 ==> . numpad
                // key == 173 => -
                return (key == 110 || key == 173 || key == 190 || key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) ||(key >= 48 && key <= 57) || (key >= 96 && key <= 105));
            });
        });
    };

    $.fn.exists = function (callback) {
        var args = [].slice.call(arguments, 1);

        if (this.length) {
            callback.call(this, args);
        }

        return this;
    };

    $(document).on('focus', '.uppercase', function(){
        $.each($('.uppercase'), function(){ $(this).setUppercase(); });
    });

    $(document).on('focus', '.numbersOnly', function(){
        $.each($('.numbersOnly'), function(){ $(this).numbersOnly(); });
    });

    $('.leave-page').exists(function () {
        $(this).click(function () {
            var url = $(this).data('url');
            if (confirm('Data belum tersimpan!\nApakah Anda yakin akan meninggalkan halaman ini?')) {
                window.location = url;
            }

            return false;
        });
    });
    
});