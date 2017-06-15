/**
 * Created by User on 4/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#housekeeping-question-form'),
        subtitleDiv = $('#subtitleDiv');

    chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $('.addSubtitleButton').click(function(){
        currentSubtitleNo = takeNumber($(this).attr('id'), 8);
        subtitleNo = currentSubtitleNo;
        currentSubtitleNo++;
        newButton = "subtitle"+currentSubtitleNo;
        $(this).attr('id', newButton);
        insertSubtitle(subtitleNo);
    });

    function insertSubtitle(currentSubtitleNo) {
        sb.append('<div class="sDiv">');

        sb.append('<div class="form-group field-hqdetail-0-hqd_subtitle required">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_subtitle">Subtitle</label>');
        sb.append('<div class="col-md-9">');
        sb.append('<input id="hqdetail-'+currentSubtitleNo+'-hqd_subtitle" class="form-control" name="HqDetail['+currentSubtitleNo+'][hqd_subtitle]" maxlength="150" type="text">');
        sb.append('<span class="help-inline col-xs-12">');
        sb.append('<span class="middle">');
        sb.append('<div class="help-block"></div>');
        sb.append('</span>');
        sb.append('</span>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="form-group field-hqdetail-'+currentSubtitleNo+'-hqd_criteria_1">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_criteria_1">Kriteria Nilai 5</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control redactor" name="HqDetail['+currentSubtitleNo+'][hqd_criteria_1]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="form-group field-hqdetail-'+currentSubtitleNo+'-hqd_criteria_2">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_criteria_2">Kriteria Nilai 4</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control redactor" name="HqDetail['+currentSubtitleNo+'][hqd_criteria_2]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="form-group field-hqdetail-'+currentSubtitleNo+'-hqd_criteria_3">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_criteria_3">Kriteria Nilai 3</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control redactor" name="HqDetail['+currentSubtitleNo+'][hqd_criteria_3]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="form-group field-hqdetail-'+currentSubtitleNo+'-hqd_criteria_4">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_criteria_4">Kriteria Nilai 2</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control redactor" name="HqDetail['+currentSubtitleNo+'][hqd_criteria_4]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="form-group field-hqdetail-'+currentSubtitleNo+'-hqd_criteria_5">');
        sb.append('<label class="col-md-3 control-label no-padding-right" for="hqdetail-'+currentSubtitleNo+'-hqd_criteria_5">Kriteria Nilai 1</label>');
        sb.append('<div class="col-sm-9">');
        sb.append('<textarea class="form-control redactor" name="HqDetail['+currentSubtitleNo+'][hqd_criteria_5]" rows="5"></textarea>');
        sb.append('</div>');
        sb.append('</div>');

        sb.append('<div class="col-md-2 col-md-offset-10">');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove-subtitle">Hapus Subtitle</button>');
        sb.append('</div>');



        sb.append('<hr/>');
        sb.append('<hr/>');
        sb.append('</div>');
        subtitleDiv.append(sb.toString());
        generateRedactor();

        sb.clear();
    }

    function takeNumber(str , howLong){
        return str.substring(howLong);
    }

    function generateRedactor(){
        $('.redactor').redactor().removeClass('redactor');
    }

    $(document).on('click', '.btn-remove-subtitle', function(){
        $(this).closest('.sDiv').remove();
    });

    $(document).on('click', '.btn-remove-ajax-subtitle', function(){
        if (confirm('Data akan terhapus secara permanen. Teruskan?')) {
            var id = $(this).data('id'),
                controller = $(this).data('controller'),
                subtitle = $(this).closest('.sDiv');

            $.ajax({
                url: baseUrl + '/'+ controller +'/ajax-delete',
                dataType: "json",
                type: 'post',
                data: {id: id},
                success: function(data) {
                    if (data !== false) {
                        subtitle.remove();
                    } else {
                        alert('Proses hapus data gagal.');
                    }
                }
            });
        }
    });

});