jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#ppa-form'),
        laborParent = $('#labor-parent').children('div').clone(),
        laborIndex = $('.labor-widget').length;

    $(document).on('change', '.sector-list', function(){
        var powerPlantList = $('#power-plant-list');

        if ($(this).val() !== '') {
            $.ajax({
                url: baseUrl + '/power-plant/ajax-plant',
                type: 'post',
                data: {sector_id: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data !== false) {
                        $.gritter.add({
                            text: 'Pembangkit Listrik ditemukan...',
                            class_name: 'gritter-success'
                        });

                        $.each(data['power_plants'], function(i, obj){
                            sb.append('<option value="'+ obj.id +'">');
                            sb.append(obj.pp_name);
                            sb.append('</option>');
                        });
                    } else {
                        $.gritter.add({
                            text: 'Pembangkit Listrik tidak ditemukan...',
                            class_name: 'gritter-error'
                        });

                        sb.append('<option value="">- Silahkan Pilih -</option>');
                    }

                    powerPlantList.empty().append(sb.toString()).trigger('chosen:updated');
                    sb.clear();
                }
            });
        } else {
            alert('Pilihan salah.');
        }
    });

    $('#btn-add-labor').click(function(){
        var cloneElm = laborParent.clone();

        $('#labor-append').append(cloneElm.html(function(i, oldHtml){
            return oldHtml.replace(/PpaLaboratorium\[0\]/g, 'PpaLaboratorium['+ laborIndex +']')
                        .replace(/PpaLaboratoriumTest\[0\]/g, 'PpaLaboratoriumTest['+ laborIndex +']')
                        .replace(/index\=\"0\"/g, 'index="'+ laborIndex +'"');
        })).append('<hr />');

        laborIndex++;
    });

    $(document).on('click', '.btn-add-accreditation', function(){
        var table = $(this).parent().parent().next().next(), // need to find more elegant way to get table object
            tbody = table.find('tbody'),
            dataLaborIndex = $(this).data('labor-index'),
            accrIndex = tbody.find('tr').length;

        sb.append('<tr>');
            sb.append('<td>');
                sb.append('<input type="text" class="form-control uppercase" maxlength="50" name="PpaLaboratoriumAccreditation['+ dataLaborIndex +']['+ accrIndex +'][lacc_number]" />');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input type="text" class="form-control krajee-datepicker" name="PpaLaboratoriumAccreditation['+ dataLaborIndex +']['+ accrIndex +'][lacc_end_date]" />');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input type="text" class="form-control" maxlength="255" name="PpaLaboratoriumAccreditation['+ dataLaborIndex +']['+ accrIndex +'][lacc_remark]" />');
            sb.append('</td>');
        sb.append('</tr>');

        tbody.append(sb.toString());
        
        sb.clear();

        $('.krajee-datepicker').kvDatepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: 'true'
        });

        return false;
    });

    $(document).on('click', '.btn-remove-ajax', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                tr = $(this).closest('tr');

            $.ajax({
                url: baseUrl + '/ppa-laboratorium-accreditation/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        tr.remove();
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });

    $(document).on('click', '.btn-delete-laboratorium', function(){
        if (confirm('Laboratorium dan data terkait akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                widget = $(this).closest('.widget-box');

            $.ajax({
                url: baseUrl + '/ppa-laboratorium/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        widget.remove();
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }

        return false;
    });
});