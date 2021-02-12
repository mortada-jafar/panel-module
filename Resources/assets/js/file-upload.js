$(document).ready(function () {

    window.initFileUploader = function () {

        // $('.file-uploader').each(function (el) {
        //     console.log(el.attr('name'),'===============')
            $('.file-up').fileuploader({
                captions: 'fa',
                itemPrepend: false,
                addMore: true,
            });
        // });
    }
    initFileUploader();

    window.initNewFileUpload = function (el) {

        // $('.file-uploader').each(function (el) {
        //     console.log(el.attr('name'),'===============')
        $(el).fileuploader({
            captions: 'fa',
            itemPrepend: false,
            addMore: true,
        });
        // });
    }

});
