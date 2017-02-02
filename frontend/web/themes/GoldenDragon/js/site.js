/**
 * Created by Joko Hermanto on 08/10/2016.
 */
$(document).ready(function () {
    $.fn.setUppercase = function(){
        $(this).keyup(function(){
            $(this).val($(this).val().toUpperCase());
        });
    };

    $.fn.numbersOnly = function(){
        return this.each(function(){
            $(this).keydown(function(e){
                var key = e.charCode || e.keyCode || 0;
                // allow backspace, tab, delete, arrows, numbers and keypad numbers ONLY
                // key == 188 => ,
                // key == 190 => .
                // key == 173 => -
                return (key == 173 || key == 190 || key == 8 || key == 9 || key == 46 || (key >= 37 && key <= 40) ||(key >= 48 && key <= 57) || (key >= 96 && key <= 105));
            });
        });
    };

    $.fn.exists = function (callback) {
        var args = [].slice.call(arguments, 1);

        if (this.length) {
            callback.call(this, args);
        }

        return this;
    };

    $('.uppercase').exists(function () {
        $.each($('.uppercase'), function(){ $(this).setUppercase(); });
    });

    $('.numbersOnly').exists(function () {
        $.each($('.numbersOnly'), function(){ $(this).numbersOnly(); });
    });

    $(document).on('click', '.tblock-trigger', function(){

        var blockId = $(this).data('block-id'),
            row = $('#' + blockId);

        $.each($('.tblock-active'), function(){
            $(this).removeClass('tblock-active').addClass('tblock-closed');
        });
        row.removeClass('tblock-closed').addClass('tblock-active');

        return false;
    });

    $('#news-ticker').bxSlider({
        ticker: true,
        speed: 20000,
        slideMargin: 10
    });

    // text blink
    function blink(selector, speed){
        $(selector).fadeOut(speed, function(){
            $(this).fadeIn(speed, function(){
                blink(this, speed);
            });
        });
    }
    blink('.blinkme', 'slow');
});