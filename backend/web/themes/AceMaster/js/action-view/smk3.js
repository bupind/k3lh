/**
 * Created by User on 7/2/2017.
 */
jQuery(document).ready(function () {
    var baseUrl = $('#baseUrl').val(),
        sb = new StringBuilder(),
        form = $('#budget-monitoring-form'),
        monitorTbody = $('#table-monitor').find('tbody'),
        monitorIndex = monitorTbody.find('tr').size();
    chr = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';


    $('[data-rel=tooltip]').tooltip();

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

    $('#addButton').click(function(){
        totalRow = $('#add').val();
        for(i=0; i<totalRow; i++){
            insertRow();
            monitorIndex++;
            assignFormula();
            form.calx('update').calx('calculate');
        }
    });

    assignFormula();
    assignFormula2();
    assignMonthFormula();
    assignMonthFormula2();

    function assignFormula() {
        $('#bmd_total').attr('data-formula', 'SUM(A0:A' + monitorIndex + ')');
        $('#bmv_total_jan').attr('data-formula', 'SUM(B0:B' + monitorIndex + ')');
        $('#bmv_total_feb').attr('data-formula', 'SUM(C0:C' + monitorIndex + ')');
        $('#bmv_total_mar').attr('data-formula', 'SUM(D0:D' + monitorIndex + ')');
        $('#bmv_total_apr').attr('data-formula', 'SUM(E0:E' + monitorIndex + ')');
        $('#bmv_total_may').attr('data-formula', 'SUM(F0:F' + monitorIndex + ')');
        $('#bmv_total_jun').attr('data-formula', 'SUM(G0:G' + monitorIndex + ')');
        $('#bmv_total_jul').attr('data-formula', 'SUM(H0:H' + monitorIndex + ')');
        $('#bmv_total_aug').attr('data-formula', 'SUM(I0:I' + monitorIndex + ')');
        $('#bmv_total_sep').attr('data-formula', 'SUM(J0:J' + monitorIndex + ')');
        $('#bmv_total_oct').attr('data-formula', 'SUM(K0:K' + monitorIndex + ')');
        $('#bmv_total_nov').attr('data-formula', 'SUM(L0:L' + monitorIndex + ')');
        $('#bmv_total_dec').attr('data-formula', 'SUM(M0:M' + monitorIndex + ')');
    }

    function assignMonthFormula(){
        $('#bmv_total_month_jan').attr('data-formula', 'O1');
        $('#bmv_total_month_feb').attr('data-formula', 'O2+P1');
        $('#bmv_total_month_mar').attr('data-formula', 'P2+Q1');
        $('#bmv_total_month_apr').attr('data-formula', 'Q2+R1');
        $('#bmv_total_month_may').attr('data-formula', 'R2+S1');
        $('#bmv_total_month_jun').attr('data-formula', 'S2+T1');
        $('#bmv_total_month_jul').attr('data-formula', 'T2+U1');
        $('#bmv_total_month_aug').attr('data-formula', 'U2+V1');
        $('#bmv_total_month_sep').attr('data-formula', 'V2+W1');
        $('#bmv_total_month_oct').attr('data-formula', 'W2+X1');
        $('#bmv_total_month_nov').attr('data-formula', 'X2+Y1');
        $('#bmv_total_month_dec').attr('data-formula', 'Y2+Z1');
    }

    function assignFormula2() {
        $('#bmv_total_jan1').attr('data-formula', 'SUM(BBB0:BBB' + monitorIndex + ')');
        $('#bmv_total_feb1').attr('data-formula', 'SUM(CCC0:CCC' + monitorIndex + ')');
        $('#bmv_total_mar1').attr('data-formula', 'SUM(DDD0:DDD' + monitorIndex + ')');
        $('#bmv_total_apr1').attr('data-formula', 'SUM(EEE0:EEE' + monitorIndex + ')');
        $('#bmv_total_may1').attr('data-formula', 'SUM(FFF0:FFF' + monitorIndex + ')');
        $('#bmv_total_jun1').attr('data-formula', 'SUM(GGG0:GGG' + monitorIndex + ')');
        $('#bmv_total_jul1').attr('data-formula', 'SUM(HHH0:HHH' + monitorIndex + ')');
        $('#bmv_total_aug1').attr('data-formula', 'SUM(III0:III' + monitorIndex + ')');
        $('#bmv_total_sep1').attr('data-formula', 'SUM(JJJ0:JJJ' + monitorIndex + ')');
        $('#bmv_total_oct1').attr('data-formula', 'SUM(KKK0:KKK' + monitorIndex + ')');
        $('#bmv_total_nov1').attr('data-formula', 'SUM(LLL0:LLL' + monitorIndex + ')');
        $('#bmv_total_dec1').attr('data-formula', 'SUM(MMM0:MMM' + monitorIndex + ')');
    }

    function assignMonthFormula2(){
        $('#bmv_total_month_jan1').attr('data-formula', 'OOO1');
        $('#bmv_total_month_feb1').attr('data-formula', 'OOO2+PPP1');
        $('#bmv_total_month_mar1').attr('data-formula', 'PPP2+QQQ1');
        $('#bmv_total_month_apr1').attr('data-formula', 'QQQ2+RRR1');
        $('#bmv_total_month_may1').attr('data-formula', 'RRR2+SSS1');
        $('#bmv_total_month_jun1').attr('data-formula', 'SSS2+TTT1');
        $('#bmv_total_month_jul1').attr('data-formula', 'TTT2+UUU1');
        $('#bmv_total_month_aug1').attr('data-formula', 'UUU2+VVV1');
        $('#bmv_total_month_sep1').attr('data-formula', 'VVV2+WWW1');
        $('#bmv_total_month_oct1').attr('data-formula', 'WWW2+XXX1');
        $('#bmv_total_month_nov1').attr('data-formula', 'XXX2+YYY1');
        $('#bmv_total_month_dec1').attr('data-formula', 'YYY2+ZZZ1');

    }
    function insertRow() {
        sb.append('<tr>');
        sb.append('<td>');
        sb.append('<input class="form-control" name="BudgetMonitoringDetail['+monitorIndex+'][bmd_no_prk]" type="text">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input class="form-control" name="BudgetMonitoringDetail['+monitorIndex+'][bmd_program]" type="text">');
        sb.append('</td>');
        sb.append('<td>');
        sb.append('<input data-format="0,0" data-cell="AA'+(monitorIndex)+'" class="form-control numbersOnly" name="BudgetMonitoringDetail['+monitorIndex+'][bmd_value_display]" type="text">');
        sb.append('<input data-formula="AA'+(monitorIndex)+'" data-format="0" data-cell="A'+(monitorIndex)+'" class="form-control numbersOnly" name="BudgetMonitoringDetail['+monitorIndex+'][bmd_value]" type="hidden">');
        sb.append('</td>');
        for(j=1; j<=12; j++) {
            sb.append('<td>');
            sb.append('<input data-format="0,0" data-cell="'+chr.charAt(j)+''+chr.charAt(j)+''+(monitorIndex)+'" class="form-control numbersOnly" name="BudgetMonitoringMonth['+monitorIndex+'][' + j + '][bmv_plan_value_display]" type="text">');
            sb.append('<input data-formula="'+chr.charAt(j)+''+chr.charAt(j)+''+(monitorIndex)+'" data-format="0" data-cell="'+chr.charAt(j)+''+(monitorIndex)+'" class="form-control numbersOnly" name="BudgetMonitoringMonth['+monitorIndex+'][' + j + '][bmv_plan_value]" type="hidden">');
            sb.append('</td>');
        }
        sb.append('<td>');
        sb.append('<button type="button" class="btn btn-xs btn-danger btn-remove">Hapus</button>');
        sb.append('</td>');
        sb.append('</tr>');
        monitorTbody.append(sb.toString());
        sb.clear();

        form.calx('update').calx('calculate');
    }

    $(document).on('click', '.btn-remove', function(){
        $(this).closest('tr').remove();
        form.calx('update').calx('calculate');
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