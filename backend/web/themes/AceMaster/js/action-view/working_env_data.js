jQuery(document).ready(function () {
    var sb = new StringBuilder(),
        form = $('#working-env-data-form'),
        wedTbody = $('#table-work-env-data').find('tbody'),
        baseUrl = $('#baseUrl').val(),
        wedIndex = wedTbody.find('tr').size();



    $('#addButton').click(function(){
        totalRow = $('#add').val();
        for(i=0; i<totalRow; i++){
            insertRow();
            wedIndex++;
        }
    });

    function insertRow() {
        sb.append('<tr>');

        sb.append('<td>');
        sb.append('<div class="field-wevdetail-'+wedIndex+'-wevd_parameter required">');
        sb.append('<input id="wevdetail-'+wedIndex+'-wevd_parameter" class="form-control" name="WevDetail['+wedIndex+'][wevd_parameter]" maxlength="5'+wedIndex+'" type="text">');
        sb.append('<span class="help-block">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</td>');
        
        sb.append('<td>');
        sb.append('<div class="field-wevdetail-'+wedIndex+'-wevd_unit_code required">');
        sb.append('<select id="wevdetail-'+wedIndex+'-wevd_unit_code" class="input-big form-control" name="WevDetail['+wedIndex+'][wevd_unit_code]">');
        sb.append('</select>');
        sb.append('<span class="help-block">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</td>');
        
        sb.append('<td>');
        sb.append('<div class="field-wevdetail-'+wedIndex+'-wevd_qs_display">');
        sb.append('<input id="wevdetail-0-wevd_qs_display" class="form-control numbersOnly text-right" name="WevDetail['+wedIndex+'][wevd_qs_display]" data-cell="BB'+wedIndex+'" data-format="0,0" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-wevdetail-'+wedIndex+'-wevd_qs required">');
        sb.append('<input id="wevdetail-'+wedIndex+'-wevd_qs" class="form-control" name="WevDetail['+wedIndex+'][wevd_qs]" data-cell="B'+wedIndex+'" data-formula="BB'+wedIndex+'" data-format="0" value="" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<div class="field-wevdetail-'+wedIndex+'-wevd_test_result">');
        sb.append('<input id="wevdetail-'+wedIndex+'-wevd_test_result" class="form-control" name="WevDetail['+wedIndex+'][wevd_test_result]" maxlength="255" type="text">');
        sb.append('<span class="help-block">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');

        sb.append('</tr>');
        wedTbody.append(sb.toString());
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
        var wedList = $('#wevdetail-'+wedIndex+'-wevd_unit_code');

        $.ajax({
            url: baseUrl + '/working-env-data/ajax-codeset',
            type: 'post',
            data: {cset_name: 'WEDD_UNIT_CODE'},
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

                wedList.empty().append(sb.toString()).trigger('chosen:updated');
                sb.clear();
            }
        });
    }

});