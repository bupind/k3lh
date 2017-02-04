/**
 * Created by User on 4/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#smk3-title-form'),
        titleIndex = $('div.addTitleItem').length+1;
        subtitleIndex = $('.addSubtitleItem').length+1;
        criteriaIndex = $('#addCriteriaItem').length;
        titleDiv = $('#titleDiv');
        subtitleDiv = $('#subtitleDiv');
        criteriaDiv = $('.criteriaDiv');

    chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $('#addTitleButton').click(function(){
        insertTitle();
        //titleIndex++;
    });

    $('#addSubtitleButton').click(function(){
        subtitleIndex++;
        insertSubtitle();
    });

    $('#addCriteriaButton').click(function(){
        //criteriaIndex++;
        insertCriteria();
    });


    function insertTitle() {
        sb.append(titleIndex);
        titleDiv.append(sb.toString());
        sb.clear();
    }

    function insertSubtitle() {
        subtitleDiv.append(sb.toString());
        sb.clear();
    }

    function takeNumber(str ,howLong){
        return str.substring(howLong);
    }

    function insertCriteria() {
        sb.append(takeNumber());
        sb.append('<div class="criteriaDiv">');
        sb.append('<div id="addCriteriaItem" class="form-group">');
        sb.append('<label for="criteria'+criteriaIndex+'" class="col-sm-3 control-label">Kriteria '+titleIndex+'.'+subtitleIndex+'.'+criteriaIndex+'</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea id="criteria" class="form-control" name="Smk3Criteria['+criteriaIndex+'][sctr_criteria]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('</div>');
        criteriaDiv.append(sb.toString());
        sb.clear();

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
                        form.calx('update').calx('calculate');
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });
});