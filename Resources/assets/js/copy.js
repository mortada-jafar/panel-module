(function ($) {
    "use strict";

    // Copy original code
    $('body').on('click', '.copyable', function () {
        let options = {
            delay: 0,
            theme: 'tooltipster-borderless'
        }
        const el=$(this);
        let text = el.text();
        var aux = document.createElement("input");


        aux.setAttribute("value", text);
        document.body.appendChild(aux);
        aux.select()
        aux.setSelectionRange(0, 99999) // used for mobile phone
        document.execCommand("copy");
        el.tooltipster('content', 'کپی شد').tooltipster('show');
        setTimeout(
            function() {
                el.tooltipster('hide').tooltipster('content', 'کپی');
            }, 1000);
        aux.remove()
    })
})($)
