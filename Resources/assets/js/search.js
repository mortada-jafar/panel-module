(function ($) {
    "use strict";

    $('.top-bar, .top-bar-boxed').find('.search').find('input').each(function () {
        $(this).on('focus', function () {
            $('.top-bar, .top-bar-boxed').find('.search-result').addClass('show')
        })

        $(this).on('focusout', function () {
            $('.top-bar, .top-bar-boxed').find('.search-result').removeClass('show')
        })
    })
    $('#search-input').keyup(function () {
        const q = $(this).val();
        let childHasTitle = false;
        let no_result = true;
        $('.parent-search-element').show();
        $('.child-search-element').show();
        $('#empty-search-element').hide();
        let i = 0;
        $('.parent-search-element').each(function () {
            if ($(this).data('title').includes(q)) {
                $(this).show();
                no_result = false;
                i += 1 + $(this).siblings('ul').children('.child-search-element').length;
            } else {
                $(this).siblings('ul').children('.child-search-element').each(function () {
                    if ($(this).data('title').includes(q)) {
                        childHasTitle = true;
                        $(this).show();
                        i += 2;
                        no_result = false;
                    } else {
                        $(this).hide();
                    }
                });

                if (!childHasTitle) {
                    $(this).hide();
                }
            }
            childHasTitle = false;
            if (i > 12) {
                // break;
            }
        });
        if (no_result) {
            $('#empty-search-element').show();
        }
        console.log(i)

    });
})($)
