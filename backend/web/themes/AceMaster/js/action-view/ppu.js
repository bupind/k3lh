/**
 * Created by User on 17/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#ppu-form');

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
});