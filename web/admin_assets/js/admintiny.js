$(document).ready(function(){
    initializeTinyMce();

});
function initializeTinyMce(){
    tinymce.init({
        selector: ".mm-mce textarea",
        language : 'ru',
        browser_spellcheck: true,
        branding: false,
        statusbar: false,
        extended_valid_elements : "i",
        custom_elements: "i",
        width: '100%',
        height: 400,
        autoresize_min_height: 100,
        autoresize_max_height: 700,
        keep_styles : false,
        plugins: [
            'advlist autolink link image lists charmap print preview autoresize',
            'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
            'table contextmenu emoticons paste textcolor code'
        ],
        toolbar1: "styleselect formatselect fontselect fontsizeselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify  | table | subscript superscript",
        toolbar2: "cut copy paste | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor | insertdatetime preview | forecolor backcolor | mybutton custom_media textfooter_btn",
        setup: function(editor) {


        }
    });


}

