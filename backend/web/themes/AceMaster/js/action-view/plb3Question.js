/**
 * Created by User on 19/4/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('plb3-question-form');


    $(document).on('change', '.form-type-list', function(){
        var plb3QuestionTypeList = $('#plb3-question-type');

        if ($(this).val() !== '') {
            $.ajax({
                url: baseUrl + '/plb3-question/ajax-question-type',
                type: 'post',
                data: {plb3_form_type_code: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data !== false) {
                        $.gritter.add({
                            text: 'Tipe Pertanyaan ditemukan...',
                            class_name: 'gritter-success'
                        });

                        $.each(data['question_types'], function(i, obj){
                            sb.append('<option value="'+ obj.cset_code +'">');
                            sb.append(obj.cset_value);
                            sb.append('</option>');
                        });
                    } else {
                        $.gritter.add({
                            text: 'Tipe Pertanyaan tidak ditemukan...',
                            class_name: 'gritter-error'
                        });

                        sb.append('<option value="">- Silahkan Pilih -</option>');
                    }

                    plb3QuestionTypeList.empty().append(sb.toString()).trigger('chosen:updated');
                    sb.clear();
                }
            });
        } else {
            alert('Pilihan salah.');
        }
    });
});