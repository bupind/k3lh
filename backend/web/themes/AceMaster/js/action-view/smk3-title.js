/**
 * Created by User on 4/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#smk3-title-form'),
        subtitleDiv = $('#subtitleDiv');

    chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $('.addSubtitleButton').click(function(){
        currentSubtitleNo = takeNumber($(this).attr('id'), 8, 9);
        currentSubtitleNo++;
        newButton = "subtitle"+currentSubtitleNo;
        $(this).attr('id', newButton);
        insertSubtitle(currentSubtitleNo);
    });

    $(document).on('click', ".addCriteriaButton", function(){
        currentCriteriaNo = takeNumber($(this).attr('id'), 9, 10);
        currentSubtitleNo = takeNumber($(this).attr('id'), 8, 9);
        currentCriteriaNo++;
        newButton = "criteria"+currentSubtitleNo+currentCriteriaNo;
        $(this).attr('id', newButton);
        insertCriteria(currentSubtitleNo, currentCriteriaNo);
    });

    function insertSubtitle(currentSubtitleNo) {
        sb.append('<div class="form-group">');
        sb.append('<label for="subtitle" class="col-sm-3 control-label"> Sub-Judul SMK3 '+currentSubtitleNo+' </label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<input class="form-control" name="Smk3Subtitle['+currentSubtitleNo+'][ssub_subtitle]" type="text">');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div id="criteriaDiv'+currentSubtitleNo+'">');
        sb.append('<div class="form-group">');
        sb.append('<label for="criteria'+1+'" class="col-sm-3 control-label">Kriteria '+currentSubtitleNo+'.'+1+'</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control" name="Smk3Criteria['+currentSubtitleNo+']['+1+'][sctr_criteria]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div class="row">');
        sb.append('<div class="col-xs-12 col-sm-4 col-sm-offset-8">');
        sb.append('<button id="criteria'+currentSubtitleNo+'1" class="addCriteriaButton btn btn-info btn-sm col-sm-8" type="button">Tambah Kriteria</button>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<hr/>');
        subtitleDiv.append(sb.toString());
        sb.clear();
    }

    function takeNumber(str , start, end){
        return str.substring(start, end);
    }

    function insertCriteria(subtitleIndex, criteriaIndex) {
        criteriaDiv = $('#criteriaDiv'+subtitleIndex+'');
        sb.append('<div class="form-group">');
        sb.append('<label for="criteria'+criteriaIndex+'" class="col-sm-3 control-label">Kriteria '+subtitleIndex+'.'+criteriaIndex+'</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control" name="Smk3Criteria['+subtitleIndex+']['+criteriaIndex+'][sctr_criteria]" rows="5"></textarea>');
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