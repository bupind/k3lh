jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        skkoTbody = $('#table-skko').find('tbody'),
        buttonName = "addButton"+skkoTbody.find('tr').size(),
        form = $('#skko-form');

    $('.addButtonClass').attr('id', buttonName);

    $('.addButtonClass').click(function(){
        totalRow = $('#add').val();
        currentSkkoNo = takeNumber($(this).attr('id'), 9);
        for(i=0; i<totalRow; i++) {
            currentSkkoNo++;
            insertDetail(currentSkkoNo);
        }
        newButton = "addButton" + currentSkkoNo;
        $(this).attr('id', newButton);
    });

    function insertDetail(skkoIndex){
        skkoIndex = skkoIndex-1;
        sb.append('<tr>');

        sb.append('<td class="text-center">');
        sb.append(skkoIndex+1);
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<div class="field-skkodetail-'+skkoIndex+'-skko_number required">');
        sb.append('<input id="skkodetail-'+skkoIndex+'-skko_number" class="form-control" name="SkkoDetail['+skkoIndex+'][skko_number]" maxlength="100" type="text">');
        sb.append('<span class="help-block">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<div class="field-skkodetail-'+skkoIndex+'-skko_date required">');
        sb.append('<input id="skkodetail-'+skkoIndex+'-skko_date" class="krajee-datepicker form-control" name="SkkoDetail['+skkoIndex+'][skko_date]" type="text">');
        sb.append('<span class="help-block">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</td>');

        sb.append('<td>');
        sb.append(' <input name="Attachment['+skkoIndex+'][file]" type="hidden">');
        sb.append('<input name="Attachment['+skkoIndex+'][file]" type="file">');
        sb.append('</td>');

        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');

        sb.append('</tr>');


        skkoTbody.append(sb.toString());

        sb.clear();

        $('.krajee-datepicker').kvDatepicker({
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