import validate from 'jquery-validation'

(function ($) {
    (function (factory) {
        if (typeof define === "function" && define.amd) {
            define(["jquery", "../jquery.validate"], factory);
        } else if (typeof module === "object" && module.exports) {
            module.exports = factory(require("jquery"));
        } else {
            factory(jQuery);
        }
    }(function ($) {

        /*
         * Translated default messages for the jQuery validation plugin.
         * Locale: FA (Persian; فارسی)
         */
        $.extend($.validator.messages, {
            required: "تکمیل این فیلد اجباری است.",
            remote: "لطفا این فیلد را تصحیح کنید.",
            email: "لطفا یک ایمیل صحیح وارد کنید.",
            url: "لطفا آدرس صحیح وارد کنید.",
            step: $.validator.format("لطفا یک عدد از ضریب {0} وارد کنید."),
            date: "لطفا تاریخ صحیح وارد کنید.",
            dateFA: "لطفا یک تاریخ صحیح وارد کنید.",
            dateISO: "لطفا تاریخ صحیح وارد کنید (ISO).",
            number: "لطفا عدد صحیح وارد کنید.",
            digits: "لطفا تنها رقم وارد کنید.",
            creditcard: "لطفا کریدیت کارت صحیح وارد کنید.",
            equalTo: "لطفا مقدار برابری وارد کنید.",
            extension: "لطفا مقداری وارد کنید که",
            alphanumeric: "لطفا مقدار را عدد (انگلیسی) وارد کنید.",
            maxlength: $.validator.format("لطفا بیشتر از {0} حرف وارد نکنید."),
            minlength: $.validator.format("لطفا کمتر از {0} حرف وارد نکنید."),
            rangelength: $.validator.format("لطفا مقداری بین {0} تا {1} حرف وارد کنید."),
            range: $.validator.format("لطفا مقداری بین {0} تا {1} حرف وارد کنید."),
            max: $.validator.format("لطفا مقداری کمتر از {0} وارد کنید."),
            min: $.validator.format("لطفا مقداری بیشتر از {0} وارد کنید."),
            minWords: $.validator.format("لطفا حداقل {0} کلمه وارد کنید."),
            maxWords: $.validator.format("لطفا حداکثر {0} کلمه وارد کنید.")
        });
        return $;
    }));


    $.validator.addMethod(
        "regex",
        function (start, element, regexp) {

            regexp = regexp.substring(1, regexp.length - 1);
            var re = new RegExp(regexp);

            return this.optional(element) || re.test(start);
        },
        "Please check your input."
    )
    $.validator.addMethod(
        "persian_alpha",
        function (value, element) {

            var regexp = "^[\u0621-\u0628\u062A-\u063A\u0641-\u0642\u0644-\u0648\u064E-\u0651\u0655\u067E\u0686\u0698\u0020\u2000-\u200F\u2028-\u202F\u06A9\u06AF\u06BE\u06CC\u0629\u0643\u0649-\u064B\u064D\u06D5\\s]+$";
            regexp = regexp.substring(1, regexp.length - 1);
            var re = new RegExp(regexp);

            return this.optional(element) || re.test(value);
        },
        'حروف وارد شده باید فارسی باشد.'
    )

    var last = function (array) {
        return array[array.length - 1];
    };

    $.validator && $.validator.setDefaults({
        ignore: "",
        validClass: "",
        onkeyup: function (element) {
            var parent = $(element).closest('.label-field');
            if ($(element).valid()) {
                $(element).removeClass('invalid');
                parent.removeClass('has-error');
                // parent.next('label.error').remove();
                // parent.find('label.error').remove();
            } else {
                $(element).addClass('invalid');
                parent.addClass('has-error');
            }
        },
        highlight: function (element) {
            $(element).closest('.label-field').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.label-field').removeClass('has-error');
        },
        errorElement: 'div',
        errorPlacement: function (error, element) {
            var parent = $(element).closest('.label-field');
            parent.addClass('has-error');
            element.addClass('invalid');
            error.appendTo(parent);
        }

    });

})($)
