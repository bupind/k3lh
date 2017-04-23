jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#roadmap-form'),
        targetTbody = $('#table-target').find('tbody'),
        programTbody = $('#table-program').find('tbody'),
        targetIndex = targetTbody.find('tr').size(),
        itemIndex = programTbody.find('tr').size();

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

    $('#target_attr_text').autocomplete({
        source: function(request, response){
            $.ajax({
                url: baseUrl + '/roadmap-k3l-attribute/ajax-search',
                dataType: "json",
                type: 'post',
                data: {
                    term: request.term,
                    type: 'TGT'
                },
                success: function(data) {
                    if (data !== false) {
                        response(data);
                    } else {
                        if (confirm('Data tidak ditemukan. Tambahkan data ini ke database?')) {
                            $.ajax({
                                url: baseUrl + '/roadmap-k3l-attribute/ajax-create',
                                type: 'post',
                                data: {attr_type_code: 'TGT', attr_text: request.term},
                                dataType: 'json',
                                success: function (data) {
                                    if (data !== false) {
                                        insertTargetRow(data.attribute.id, request.term);
                                        targetIndex++;
                                    } else {
                                        $.gritter.add({
                                            text: 'Tambah attribute gagal...',
                                            class_name: 'gritter-error'
                                        });
                                    }

                                    $('.ui-autocomplete-input').val('');
                                }
                            });
                        }
                    }
                }
            });
        },
        minLength: 3,
        select: function(event, ui) {
            insertTargetRow(ui.item.id, ui.item.label);
            targetIndex++;
            $('.ui-autocomplete-input').val('');
            return false;
        }
    });

    $('#program_attr_text').autocomplete({
        source: function(request, response){
            $.ajax({
                url: baseUrl + '/roadmap-k3l-attribute/ajax-search',
                dataType: "json",
                type: 'post',
                data: {
                    term: request.term,
                    type: $('input[name="attr_type_code"]:checked').val()
                },
                success: function(data) {
                    if (data !== false) {
                        response(data);
                    } else {
                        if (confirm('Data tidak ditemukan. Tambahkan data ini ke database?')) {
                            $.ajax({
                                url: baseUrl + '/roadmap-k3l-attribute/ajax-create',
                                type: 'post',
                                data: {attr_type_code: $('input[name="attr_type_code"]:checked').val(), attr_text: request.term},
                                dataType: 'json',
                                success: function (data) {
                                    if (data !== false) {
                                        insertProgramRow(data.attribute.id, request.term);
                                        itemIndex++;
                                    } else {
                                        $.gritter.add({
                                            text: 'Tambah attribute gagal...',
                                            class_name: 'gritter-error'
                                        });
                                    }

                                    $('.ui-autocomplete-input').val('');
                                }
                            });
                        }
                    }
                }
            });
        },
        minLength: 3,
        select: function(event, ui) {
            insertProgramRow(ui.item.id, ui.item.label);
            itemIndex++;
            $('.ui-autocomplete-input').val('');
            return false;
        }
    });

    function insertTargetRow(id, label) {
        sb.append('<tr>');
            sb.append('<td>');
                sb.append(label);
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input name="RoadmapK3lTarget['+ targetIndex +'][roadmap_k3l_attribute_id]" type="hidden" value="'+ id +'">');
                sb.append('<input class="form-control" name="RoadmapK3lTarget['+ targetIndex +'][target_value]" type="text">');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
            sb.append('</td>');
        sb.append('</tr>');

        targetTbody.append(sb.toString());
        sb.clear();
    }

    function insertProgramRow(id, label) {
        var programType = $('input[name="attr_type_code"]:checked').val();

        sb.append('<tr>');

        if (programType == 'PITEM') {
            sb.append('<td>');
                sb.append(label);
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input name="RoadmapK3lItem['+ itemIndex +'][roadmap_k3l_attribute_id]" type="hidden" value="'+ id +'">');
                sb.append('<input type="text" class="form-control krajee-datepicker" name="RoadmapK3lItem['+ itemIndex +'][item_value_when]" />');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<textarea class="form-control" name="RoadmapK3lItem['+ itemIndex +'][item_value_where]"></textarea>');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<textarea class="form-control" name="RoadmapK3lItem['+ itemIndex +'][item_value_who]"></textarea>');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<textarea class="form-control" name="RoadmapK3lItem['+ itemIndex +'][item_value_how_many]"></textarea>');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input type="hidden" data-format="0" data-cell="B'+ itemIndex +'" data-formula="A'+ itemIndex +'" name="RoadmapK3lItem['+ itemIndex +'][item_value_how_much]" />');
                sb.append('<input class="form-control text-right" data-format="0,0" data-cell="A'+ itemIndex +'" name="RoadmapK3lItem['+ itemIndex +'][item_value_how_much_display]" type="text">');
            sb.append('</td>');
        } else {
            sb.append('<td colspan="6">');
                sb.append('<input name="RoadmapK3lItem['+ itemIndex +'][roadmap_k3l_attribute_id]" type="hidden" value="'+ id +'">');
                sb.append('<strong>');
                    sb.append(label);
                sb.append('</strong>');
            sb.append('</td>');
        }

        sb.append('<td>');
            sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');
        sb.append('</tr>');

        programTbody.append(sb.toString());

        sb.clear();

        $('.krajee-datepicker').kvDatepicker({
            format: "dd-mm-yyyy",
            autoclose: true,
            todayHighlight: 'true'
        });

        form.calx('update').calx('calculate');
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