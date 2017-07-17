/**
/**
 * Created by Joko Hermanto on 14/01/2017.
 */

jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#working-plan-form'),
        programTbody = $('#table-program').find('tbody'),
        itemIndex = programTbody.find('tr').size();

    $('input[name="attr_type_code"]').click(function(){
        var selected = $(this).val();
        if (selected == 'PHDR') {
            $('#row-header').removeClass('hide').find('select').chosen();
            $('#row-sub-header').addClass('hide');
            $('#row-item').addClass('hide');
        } else if (selected == 'PSHDR') {
            $('#row-header').addClass('hide');
            $('#row-sub-header').removeClass('hide').find('select').chosen();
            $('#row-item').addClass('hide');
        } else {
            $('#row-header').addClass('hide');
            $('#row-sub-header').addClass('hide');
            $('#row-item').removeClass('hide');
        }
    });

    $('#attr_text').autocomplete({
        source: function(request, response){
            $.ajax({
                url: baseUrl + '/working-plan-attribute/ajax-search',
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
                                url: baseUrl + '/working-plan-attribute/ajax-create',
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
        delay: 1500,
        select: function(event, ui) {
            insertProgramRow(ui.item.id, ui.item.label);
            itemIndex++;
            $('.ui-autocomplete-input').val('');
            return false;
        }
    });

    $('.btn-insert').click(function(){
        var dropdownId = $(this).data('dropdown'),
            id = $('#' + dropdownId).val(),
            label = $('#' + dropdownId + ' option:selected').text();

        insertProgramRow(id, label);
        itemIndex++;
    });

    function insertProgramRow(id, label) {
        var programType = $('input[name="attr_type_code"]:checked').val();
        sb.append('<tr>');

        if (programType == 'PITEM') {
            sb.append('<td>');
                sb.append(label);
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input name="WorkingPlanDetail['+ itemIndex +'][working_plan_attribute_id]" type="hidden" value="'+ id +'">');
                sb.append('<div class="rnr">');
                    sb.append('<label class="radio-inline">');
                        sb.append('<input name="WorkingPlanDetail['+ itemIndex +'][wpd_rnr]" value="R" type="radio" checked> R');
                    sb.append('</label>');
                    sb.append('<label class="radio-inline">');
                        sb.append('<input name="WorkingPlanDetail['+ itemIndex +'][wpd_rnr]" value="NR" type="radio"> NR');
                    sb.append('</label>');
                sb.append('</div>');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input class="form-control" name="WorkingPlanDetail['+ itemIndex +'][wpd_location]" type="text" maxlength="100">');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input class="form-control" name="WorkingPlanDetail['+ itemIndex +'][wpd_pic]" type="text" maxlength="100">');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<input name="Attachment['+ itemIndex +'][file]" value="" type="hidden">');
                sb.append('<input name="Attachment['+ itemIndex +'][file]" type="file">');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<button type="button" class="btn btn-primary btn-xs btn-calendar" data-id="'+ id +'"><i class="ace-icon fa fa-table bigger-110 icon-only"></i></button>');
                sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove" data-id="'+ id +'"><i class="ace-icon fa fa-trash bigger-110 icon-only"></i></button>');
            sb.append('</td>');
        } else {
            sb.append('<td colspan="5">');
                sb.append('<input name="WorkingPlanDetail['+ itemIndex +'][working_plan_attribute_id]" type="hidden" value="'+ id +'">');
                sb.append('<strong>');
                    sb.append(label);
                sb.append('</strong>');
            sb.append('</td>');
            sb.append('<td>');
                sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
            sb.append('</td>');
        }

        sb.append('</tr>');

        programTbody.append(sb.toString());
        sb.clear();
    }

    $(document).on('click', '.btn-remove', function(){
        var id = $(this).data('id'),
            tr = $(this).closest('tr');

        if (id == null) {
            tr.remove();
        } else {
            $.ajax({
                url: baseUrl + '/working-plan/ajax-delete-detail',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        tr.remove();
                    }
                }
            });
        }
    });

    $(document).on('click', '.btn-remove-ajax', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                tr = $(this).closest('tr');

            $.ajax({
                url: baseUrl + '/working-plan-detail/ajax-delete',
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

    $(document).on('click', '.btn-calendar', function(){
        var id = $(this).data('id');
        $.ajax({
            url: baseUrl + '/working-plan/ajax-read-detail',
            dataType: "json",
            type: 'post',
            data: {id: id},
            success: function(data) {
                if (data !== false) {
                    $.each(data.progress, function(key, val){
                        $.each(val, function(key2, val2){
                            $('#p' + key + key2).val(val2);
                        });
                    });
                    $('#calendar-attribute-id').val(id);
                    $('#calendar-table').modal('show');
                }
            }
        });
    });

    $('body').on('beforeSubmit', '#calendar-form', function(e){
        var form = $(this);

        $.ajax({
            url: form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function (response) {
                if (response) {
                    jQuery('.close-modal').trigger('click');
                    $.gritter.add({
                        text: 'Progress berhasil disimpan...',
                        class_name: 'gritter-success'
                    });
                } else {
                    $.gritter.add({
                        text: 'Progress gagal disimpan...',
                        class_name: 'gritter-error'
                    });
                }
            }
        });
    }).on('submit', '#calendar-form', function (e) {
        e.preventDefault();
    });

    $('.modal').on('hidden.bs.modal', function(){
        $(this).find('form').trigger('reset');
    });

    $(document).on('click', '.btn-open-calendar', function(){
        var tr = $(this).closest('tr'),
            nextTr = tr.next();

        nextTr.toggle();
    });
});