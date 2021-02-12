import * as tail from 'tail.select/js/tail.select';

window.tail = tail;

(function (factory) {
    if (typeof (define) == "function" && define.amd) {
        define(function () {
            return function (tail) {
                factory(tail);
            };
        });
    } else {
        if (typeof (window.tail) != "undefined" && window.tail) {
            factory(window.tail);
        }
    }
}(function (tail) {
    tail.strings.register("fa", {
        all: "همه",
        none: "هیچ کدام",
        empty: "گزینه ای موجود نیست",
        emptySearch: "گزینه ای پیدا نشد",
        limit: "نمی توانید گزینه های بیشتری را انتخاب کنید",
        placeholder: "گزینه ای را انتخاب کنید ...",
        placeholderMulti: "انتخاب تا: محدود کردن گزینه ها ...",
        search: "بنویسید برای جستجو...",
        disabled: "این قسمت غیرفعال است"
    });
    return tail;
}));
(function ($) {
    "use strict";

    window.initTailSelect = function (forceInit = false) {
        $('.select-tail').each(function (index, el) {
            const isImageAble = $(this).data('imageable');
            const onChange = $(this).data('change');
            const init = $(this).data('init');
            if (forceInit || init) {
                let tSelect = tail(el, {
                    width: "100%",
                    deselect: 'true',
                    locale: "fa",
                    search: true,
                    cbLoopItem: isImageAble == 1 ? function (item, optgroup, search, root) {
                        var imgEL = `<div class=" flex items-center">
                                            <div class="w-10 h-10 flex-none image-fit rounded-md overflow-hidden">
                                                <img  src="${$(item.option).data("img")}">
                                            </div>
                                            <div class="ms-1">
                                                <div class="font-medium">${item.value}</div>
                                            </div>
                                        </div>`;

                        var newItem = document.createElement('li');
                        var className = "dropdown-option ";
                        className += item.selected ? "selected" : "";
                        newItem.className = className
                        newItem.innerHTML = imgEL;
                        return newItem;
                    } : undefined,
                });
                $(this).on("change", function () {
                    eval(onChange);
                });
            }
        });
    }

    initTailSelect();
})($)
