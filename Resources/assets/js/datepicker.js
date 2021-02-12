import persianDate from 'persian-date'

window.persianDate = persianDate;
import 'persian-datepicker/dist/js/persian-datepicker.min.js'

(function ($) {
    "use strict";

    // Daterangepicker
    window.initDatePicker = function () {

        $('.datepicker').each(function () {
            var name = $(this).attr('name');
            var dateType = $(this).data('date-type');
            $(this).pDatepicker({
                responsive: true,
                format: "DD/MM/YY",
                calendarType: dateType,
                altField:'#'+`${name}-alt`.replace(/[!"#$%&'()*+,.\/:;<=>?@[\\\]^`{|}~]/g,'\\$&'),
                altFieldFormatter: function (unix) {
                    var d = new Date(unix);
                    return +d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
                }
            });
        })
        $('.nowDateCheckbox').each(function () {
            if ($(this).prop('checked')) {
                $(this).parents('.label-field').find("> .input").val('---').attr('disabled', true).attr('readonly', true);
            }
        });
    }

    initDatePicker();

})($)
