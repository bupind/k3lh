/**
 * Created by User on 4/3/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#ppucemsrb-parameter-report-form');

    $(document).on('change', '.ppu-emission-source-list', function(){
        var parameterList = $('#parameter-list');
            chimney = $('#ppues_chimney_name');
            position = $('#ppues_hole_position');
            height = $('#ppues_chimney_height');
            diameter = $('#ppues_chimney_diameter');
            fuelName = $('#ppues_fuel_name_code');
            capacity = $('#ppues_capacity');
            operationTime = $('#ppues_operation_time');

        if ($(this).val() !== '') {
            $.ajax({
                url: baseUrl + '/ppucems-report-bm/ajax-parameter',
                type: 'post',
                data: {ppu_emission_source_id: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data !== false) {
                        $.gritter.add({
                            text: 'Parameter ditemukan...',
                            class_name: 'gritter-success'
                        });

                        sb.append('<option value="">- Silahkan Pilih -</option>');

                        $.each(data['parameters'], function(i, obj){
                            sb.append('<option value="'+ obj.id +'">');
                            sb.append(obj.ppucemsrb_parameter_code);
                            sb.append('</option>');
                        });
                    } else {
                        $.gritter.add({
                            text: 'Parameter tidak ditemukan...',
                            class_name: 'gritter-error'
                        });

                        sb.append('<option value="">- Silahkan Pilih -</option>');
                    }

                    parameterList.empty().append(sb.toString()).trigger('chosen:updated');
                    sb.clear();
                }
            });

            $.ajax({
                url: baseUrl + '/ppu-emission-source/ajax-emission',
                type: 'post',
                data: {ppu_emission_source_id: $(this).val()},
                dataType: 'json',
                success: function (data) {
                    if (data !== false) {

                        $.each(data['parameters'], function(i, obj){
                            chimney.text(obj.ppues_chimney_name);
                            position.text(obj.ppues_hole_position);
                            height.text(obj.ppues_chimney_height);
                            diameter.text(obj.ppues_chimney_diameter);
                            fuelName.text(obj.ppues_fuel_name_code);
                            capacity.text(obj.ppues_capacity);
                            operationTime.text(obj.ppues_operation_time);
                        });
                    } else {

                        sb.append('<option value="">- Silahkan Pilih -</option>');
                    }

                    //chimney.empty().append(sb.toString()).trigger('chosen:updated');
                    //sb.clear();
                }
            });
        } else {
            alert('Pilihan salah.');
        }
    });
});