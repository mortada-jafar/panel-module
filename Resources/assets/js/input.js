(function ($) {
    "use strict";


    window.auto_grow = function auto_grow(element) {
        element.style.height = "5px";
        element.style.height = (element.scrollHeight) + "px";
    }
    $('.label-field textarea').each(function (index) {
        $(this).height($(this)[0].scrollHeight);
    });
    $('.label-field').click(function () {
        $(this).find('.input').focus();
    });

    $('body').on('focus', '.label-field .input', function () {
        $('.label-field').removeClass('focused');
        $(this).parents('.label-field').addClass('focused');
    });

    $('body').on('blur', '.label-field .input', function () {
        $(this).parents('.label-field').removeClass('focused');
        if ($(this).val()) {
            $(this).closest('.label-field').find('label').addClass('fade');
        } else {
            $(this).closest('.label-field').find('label').removeClass('fade');
        }
    });

    $('.form-group.form-group-default .checkbox, .form-group.form-group-default .radio').hover(function () {
        $(this).parents('.form-group').addClass('focused');
    }, function () {
        $(this).parents('.form-group').removeClass('focused');
    });

    $('body').on('change', '.nowDateCheckbox', function () {
        if ($(this).prop('checked')) {
            $(this).parents('.label-field').find("> .input").val('---').attr('disabled', true);
        } else {
            $(this).parents('.label-field').find("> .input").val('').attr('disabled', false);
        }
    });


})($)
