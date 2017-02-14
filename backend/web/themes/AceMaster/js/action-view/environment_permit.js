/**
 * Created by User on 11/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        environmentTbody = $('#table-environment-permit').find('tbody'),
        buttonName = "addButton"+environmentTbody.find('tr').size(),
        form = $('#environment-permit-form');

    $('.addButtonClass').attr('id', buttonName);

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

    $('.addButtonClass').click(function(){
        totalRow = $('#add').val();
        currentSubtitleNo = takeNumber($(this).attr('id'), 9);
        for(i=0; i<totalRow; i++) {
            currentSubtitleNo++;
            insertDetail(currentSubtitleNo);
        }
        newButton = "addButton" + currentSubtitleNo;
        $(this).attr('id', newButton);
    });

    function insertDetail(subtitleIndex){
        sb.append('<tr>');
        sb.append('<td>');
        sb.append(subtitleIndex);
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input class="form-control" name="EnvironmentPermitDetail['+subtitleIndex+'][ep_document_name]" type="text" >');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input class="form-control" name="EnvironmentPermitDetail['+subtitleIndex+'][ep_institution]" type="text">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input id="date'+subtitleIndex+'" placeholder="Tanggal" name="EnvironmentPermitDetail['+subtitleIndex+'][ep_date]" type="text" class="form-control">');
        sb.append('</td>');
        currentDate = "#date"+subtitleIndex;
        sb.append('<td>');
        sb.append('<input name="EnvironmentPermitDetail['+subtitleIndex+'][ep_limit_capacity]" data-cell="AA'+subtitleIndex+'" data-formula="A'+subtitleIndex+'" value="" type="hidden">');
        sb.append('<input data-cell="A'+subtitleIndex+'" data-format="0,0" class="form-control" name="EnvironmentPermitDetail['+subtitleIndex+'][ep_limit_capacity_display]" type="text">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input name="EnvironmentPermitDetail['+subtitleIndex+'][ep_realization_capacity]" data-cell="BB'+subtitleIndex+'" data-formula="B'+subtitleIndex+'" value="" type="hidden">');
        sb.append('<input data-cell="B'+subtitleIndex+'" data-format="0,0" class="form-control" name="EnvironmentPermitDetail['+subtitleIndex+'][ep_realization_capacity_display]" type="text">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input name="Attachment['+subtitleIndex+'][file]" type="hidden">');
        sb.append('<input name="Attachment['+subtitleIndex+'][file]" type="file">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');
        sb.append('</tr>');
        environmentTbody.append(sb.toString());
        form.calx('update').calx('calculate');
        sb.clear();

        $(currentDate).kvDatepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: 'true'
        });
    }

    function takeNumber(str , howLong){
        return str.substring(howLong);
    }

    $(document).on('click', '.btn-remove', function(){
        $(this).closest('tr').remove();
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
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });


});