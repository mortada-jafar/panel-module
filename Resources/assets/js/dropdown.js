(function($) {
    "use strict";

    $('body').on('click', function(event) {
        let dropdown = $(event.target).closest('.dropdown')
        //todo fix cond logic err mortada :)
        if (!$(dropdown).length || ($(event.target).closest('.dropdown-toggle').length && $(dropdown).find('.dropdown-box').first().hasClass('show'))) {
            $('.dropdown-box').removeClass('show')
        } else {
            $('.dropdown-box').removeClass('show')
            $(dropdown).find('.dropdown-box').first().addClass('show')
        }
    })
})($)
