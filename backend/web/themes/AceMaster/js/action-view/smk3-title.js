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
        currentSubtitleNo = takeNumber($(this).attr('id'), 8);
        currentSubtitleNo++;
        newButton = "subtitle"+currentSubtitleNo;
        $(this).attr('id', newButton);
        insertSubtitle(currentSubtitleNo);
    });

    $(document).on('click', ".addCriteriaButton", function(){
        currentSubtitleNo = takeNumber($(this).closest(".sDiv").attr('id'), 4);
        currentCriteriaNo = takeNumber($(this).attr('id'), 8);
        currentCriteriaNo++;
        newButton = "criteria"+currentCriteriaNo;
        $(this).attr('id', newButton);
        insertCriteria(currentSubtitleNo, currentCriteriaNo);
    });

    function insertSubtitle(currentSubtitleNo) {
        sb.append('<div id="sDiv'+currentSubtitleNo+'" class="sDiv">');
        sb.append('<div class="form-group">');
        sb.append('<label class="col-sm-3 control-label"> Sub-Judul SMK3</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<input class="form-control" name="Smk3Subtitle['+currentSubtitleNo+'][ssub_subtitle]" type="text">');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove-subtitle">Hapus Subtitle</button>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div id="criteriaDiv'+currentSubtitleNo+'">');
        sb.append('<div id="cDiv1" class="cDiv">');
        sb.append('<div class="form-group">');
        sb.append('<label class="col-sm-3 control-label">Kriteria</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control" name="Smk3Criteria['+currentSubtitleNo+']['+1+'][sctr_criteria]" rows="5"></textarea>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove-criteria">Hapus Kriteria</button>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<div class="row">');
        sb.append('<div class="col-xs-12 col-sm-4 col-sm-offset-8">');
        sb.append('<button id="criteria1" class="addCriteriaButton btn btn-info btn-sm col-sm-8" type="button">Tambah Kriteria</button>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('<hr/>');
        sb.append('</div>');
        subtitleDiv.append(sb.toString());
        sb.clear();
    }

    function takeNumber(str , howLong){
        return str.substring(howLong);
    }

    function insertCriteria(subtitleIndex, criteriaIndex) {
        criteriaDiv = $('#criteriaDiv'+subtitleIndex+'');
        sb.append('<div id="cDiv'+criteriaIndex+'" class="cDiv">');
        sb.append('<div class="form-group">');
        sb.append('<label class="col-sm-3 control-label">Kriteria</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control" name="Smk3Criteria['+subtitleIndex+']['+criteriaIndex+'][sctr_criteria]" rows="5"></textarea>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove-criteria">Hapus Kriteria</button>');
        sb.append('</div>');
        sb.append('</div>');
        sb.append('</div>');
        criteriaDiv.append(sb.toString());
        sb.clear();

    }

    $(document).on('click', '.btn-remove-subtitle', function(){
        $(this).closest('.sDiv').remove();
    });
    $(document).on('click', '.btn-remove-criteria', function(){
        $(this).closest('.cDiv').remove();
    });

    $(document).on('click', '.btn-remove-ajax', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                controller = $(this).data('controller');

                parent = $(this).closest('.parent');
            alert(controller);
            $.ajax({
                url: baseUrl + '/'+ controller +'/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        parent.remove();
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });
});