/**
 * Created by User on 5/6/2017.
 */
/**
 * Created by User on 10/5/2017.
 */
jQuery(document).ready(function () {
    var sb = new StringBuilder(),
        form = $('#beyond-obedience-comdev-form'),
        bocTbody = $('#table-boc').find('tbody'),
        baseUrl = $('#baseUrl').val(),
        bocIndex = bocTbody.find('tr').size();



    $('#addButton').click(function(){
        totalRow = $('#add').val();
        for(i=0; i<totalRow; i++){
            insertRow();
            bocIndex++;
        }
    });

    function insertRow() {
        sb.append('<tr>');

        sb.append('<td class="center"> '+(bocIndex+1)+' </td>');
        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_program required">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_program" class="form-control" name="BocDetail['+bocIndex+'][bocd_program]" maxlength="255" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_public_income_display">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_public_income_display" class="form-control numbersOnly text-right" name="BocDetail['+bocIndex+'][bocd_public_income_display]" data-cell="BB'+bocIndex+'" data-format="'+bocIndex+','+bocIndex+'" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_public_income required">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_public_income" class="form-control" name="BocDetail['+bocIndex+'][bocd_public_income]" data-cell="B'+bocIndex+'" data-formula="BB'+bocIndex+'" data-format="'+bocIndex+'" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_impact_display">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_impact_display" class="form-control numbersOnly text-right" name="BocDetail['+bocIndex+'][bocd_impact_display]" data-cell="CC'+bocIndex+'" data-format="'+bocIndex+','+bocIndex+'" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_impact required">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_impact" class="form-control" name="BocDetail['+bocIndex+'][bocd_impact]" data-cell="C'+bocIndex+'" data-formula="CC'+bocIndex+'" data-format="'+bocIndex+'" value="" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_effort_display">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_effort_display" class="form-control numbersOnly text-right" name="BocDetail['+bocIndex+'][bocd_effort_display]" data-cell="DD'+bocIndex+'" data-format="'+bocIndex+','+bocIndex+'" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_effort required">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_effort" class="form-control" name="BocDetail['+bocIndex+'][bocd_effort]" data-cell="D'+bocIndex+'" data-formula="DD'+bocIndex+'" data-format="'+bocIndex+'" value="" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_budget_display">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_budget_display" class="form-control numbersOnly text-right" name="BocDetail['+bocIndex+'][bocd_budget_display]" data-cell="EE'+bocIndex+'" data-format="'+bocIndex+','+bocIndex+'" type="text">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_budget required">');
        sb.append('<input id="bocdetail-'+bocIndex+'-bocd_budget" class="form-control" name="BocDetail['+bocIndex+'][bocd_budget]" data-cell="E'+bocIndex+'" data-formula="EE'+bocIndex+'" data-format="'+bocIndex+'" value="" type="hidden">');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<div class="field-bocdetail-'+bocIndex+'-bocd_unit_code"> ');
        sb.append('<select id="bocdetail-'+bocIndex+'-bocd_unit_code" class="input-big form-control" name="BocDetail['+bocIndex+'][bocd_unit_code]">');
        sb.append('</select>');
        sb.append('<div class="help-block"></div>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');

        sb.append('</tr>');
        bocTbody.append(sb.toString());
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
        var bocdList = $('#bocdetail-'+bocIndex+'-bocd_unit_code');

        $.ajax({
            url: baseUrl + '/beyond-obedience-comdev/ajax-codeset',
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

                bocdList.empty().append(sb.toString()).trigger('chosen:updated');
                sb.clear();
            }
        });
    }

});