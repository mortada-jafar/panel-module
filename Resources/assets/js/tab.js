(function($) {
    "use strict";

    // Show tab content
    $('body').on('click', 'a[data-toggle="tab"]', function(key, el) {
        // Set active tab nav
        $(this).siblings('a[data-toggle="tab"]')
            .removeClass('active')
        $(this).addClass('active')

        // Set active tab content
        let elementId = $(this).attr('data-target')
        $(elementId).siblings('.tab-content__pane')
            .removeClass('active')
        $(elementId).addClass('active')
    })
})($)
