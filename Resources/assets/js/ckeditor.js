import ClassicEditor from '../../../node_modules/@ckeditor/ckeditor5-build-classic/build/ckeditor'

(function ($) {
    "use strict";

    if ($('.ck-editor').length) {
        ClassicEditor
            .create(document.querySelector('.ck-editor'), {
                toolbar:{
                    items: [
                        'heading', '|',
                        'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                        'link', '|',
                        'outdent', 'indent', '|',
                        'bulletedList', 'numberedList', 'todoList', '|',
                        'code', 'codeBlock', '|',
                        'insertTable', '|',
                        'imageUpload', 'blockQuote', '|',
                        'undo', 'redo'
                    ],
                    shouldNotGroupWhenFull: true
                },
            })
            .catch(error => {
                console.log(error);
            });
    }
})
($)
