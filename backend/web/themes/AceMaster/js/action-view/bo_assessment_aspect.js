/**
 * Created by User on 10/5/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        criteriaDiv = $('#criteriaDiv');

    $('.addCriteriaButton').click(function(){
        currentCriteriaNo = takeNumber($(this).attr('id'), 8);
        currentCriteriaNo++;
        newButton = "criteria"+currentCriteriaNo;
        $(this).attr('id', newButton);
        insertCriteria(currentCriteriaNo);
    });

    function insertCriteria(criteriaIndex){
        criteriaIndex = criteriaIndex-1;
        sb.append('<div class="cDiv">');
        sb.append('<div class="form-group field-boascriteria-'+criteriaIndex+'-boas_description">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="boascriteria-'+criteriaIndex+'-boas_description">Deskripsi Kriteria</label>');
        sb.append('<div class="col-md-9">');
        sb.append('<textarea class="form-control redactor" name="BoasCriteria['+criteriaIndex+'][boas_description]" rows="5"></textarea>');
        sb.append('<span class="help-inline col-xs-12">');
        sb.append('<span class="middle">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div class="form-group field-boascriteria-'+criteriaIndex+'-boas_value required">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="boascriteria-'+criteriaIndex+'-boas_value">Nilai Kriteria</label>');
        sb.append('<div class="col-md-9">');
        sb.append('<input id="boascriteria-'+criteriaIndex+'-boas_value" class="col-xs-10 col-md-5 numbersOnly text-right" name="BoasCriteria['+criteriaIndex+'][boas_value]" type="text">');
        sb.append('<span class="help-inline col-xs-12">');
        sb.append('<span class="middle">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div class="col-xs-9 col-xs-offset-3">');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove-criteria">Hapus Kriteria</button>');
        sb.append('</div>');
        sb.append('</div>');
        criteriaDiv.append(sb.toString());
        generateRedactor();

        sb.clear();
    }

    function generateRedactor(){
        $('.redactor').redactor().removeClass('redactor');
    }

    function takeNumber(str , howLong){
        return str.substring(howLong);
    }

    $(document).on('click', '.btn-remove-criteria', function(){
        $(this).closest('.cDiv').remove();
    });

    $(document).on('click', '.btn-remove-ajax-criteria', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                controller = $(this).data('controller'),
                criteria = $(this).closest('.cDiv');

            $.ajax({
                url: baseUrl + '/'+ controller +'/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        criteria.remove();
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });


});