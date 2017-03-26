jQuery(document).ready(function () {

    $(document).on('change', '.param-list', function(){
        var qs2 = $('#ppabareportbm-ppabar_qs_2_display'),
            unit = $('#ppabareportbm-ppabar_param_unit_code');

        if ($(this).val() !== '') {
            if ($(this).val() === 'PH') {
                qs2.prop('disabled', false);
            } else {
                qs2.val('').prop('disabled', true);
            }

            if ($(this).val() === 'DBT' || $(this).val() === 'PRD') {
                unit.prop('disabled', false).trigger("chosen:updated");
            } else {
                unit.val('').prop('disabled', true).trigger("chosen:updated");
            }
        }

    });

    $('.param-list').trigger('change');
});