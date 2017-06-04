/**
 * Created by User on 10/5/2017.
 */
jQuery(document).ready(function () {
    var sb = new StringBuilder(),
        form = $('#beyond-obedience-program-form'),
        bopTbody = $('#table-bop').find('tbody'),
        baseUrl = $('#baseUrl').val(),
        bopIndex = bopTbody.find('tr').size();



    $('#addButton').click(function(){
        totalRow = $('#add').val();
        for(i=0; i<totalRow; i++){
            insertRow();
            bopIndex++;
        }
    });

    function insertRow() {
        sb.append('<tr>');

        sb.append('<td class="center"> '+(bopIndex+1)+' </td>');
        sb.append('<td>');
        sb.append('<div class="field-bopdetail-'+bopIndex+'-bopd_program required">');
        sb.append('<input id="bopdetail-'+bopIndex+'-bopd_program" class="form-control" name="BopDetail['+bopIndex+'][bopd_program]" maxlength="255" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<div class="field-bopdetail-'+bopIndex+'-bopd_result_display">');
        sb.append('<input id="bopdetail-'+bopIndex+'-bopd_result_display" class="form-control numbersOnly text-right" name="BopDetail['+bopIndex+'][bopd_result_display]" data-cell="BB'+bopIndex+'" data-format="0,0" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-bopdetail-'+bopIndex+'-bopd_result required">');
        sb.append('<input id="bopdetail-'+bopIndex+'-bopd_result" class="form-control" name="BopDetail['+bopIndex+'][bopd_result]" data-cell="B'+bopIndex+'" data-formula="BB'+bopIndex+'" data-format="0" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<div class="field-bopdetail-'+bopIndex+'-bopd_unit_code"> ');
        sb.append('<select id="bopdetail-'+bopIndex+'-bopd_unit_code" class="input-big form-control" name="BopDetail['+bopIndex+'][bopd_unit_code]">');
        sb.append('</select>');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');

        sb.append('</tr>');
        bopTbody.append(sb.toString());
        sb.clear();

        form.calx('update').calx('calculate');
        updateDropdown();
    }

    $(document).on('click', '.btn-remove', function(){
        $(this).closest('tr').remove();
        form.calx('update').calx('calculate');
    });

    $(document).on('click', '.btn-remove-ajax', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                controller = $(this).data('controller'),
                tr = $(this).closest('tr');

            $.ajax({
                url: baseUrl + '/'+ controller +'/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        tr.remove();
                        form.calx('update').calx('calculate');
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });

    function updateDropdown(){
        var bopdList = $('#bopdetail-'+bopIndex+'-bopd_unit_code');

        $.ajax({
            url: baseUrl + '/beyond-obedience-program/ajax-codeset',
            type: 'post',
            data: {cset_name: 'BOP_UNIT_CODE'},
            dataType: 'json',
            success: function (data) {
                if (data !== false) {
                    $.each(data['codesets'], function (i, obj) {
                        sb.append('<option value="' + obj.cset_code + '">');
                        sb.append(obj.cset_value);
                        sb.append('</option>');
                    });
                } else {
                    sb.append('<option value="">- Silahkan Pilih -</option>');
                }

                bopdList.empty().append(sb.toString()).trigger('chosen:updated');
                sb.clear();
            }
        });
    }

});