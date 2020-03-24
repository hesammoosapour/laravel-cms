<script src="https://cdn.tiny.cloud/1/7iiinbz7p2f3dvvcqvqhqxs9goplxdjmpzyvg1ofue1xm09k/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
{{--<script>--}}
{{--    tinymce.init({--}}
{{--         selector: 'textarea',--}}
{{--         plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker',--}}
{{--         toolbar: 'a11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table',--}}
{{--        toolbar_mode: 'floating',--}}
{{--         tinycomments_mode: 'embedded',--}}
{{--        tinycomments_author: 'Author name',--}}
{{--    });--}}
{{--  </script>--}}


<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern ",
            "a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker"

        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media 11ycheck addcomment showcomments casechange checklist code formatpainter pageembed permanentpen table",
        toolbar_mode: 'floating',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        relative_urls: true,
        file_browser_callback: function (field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file: cmsURL,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                resizable: "yes",
                close_previous: "no"
            });
        }
        // file_picker_callback: function (callback, value, meta) {
        //             let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
        //             let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;
        //
        //             let type = 'image' === meta.filetype ? 'Images' : 'Files',
        //                 url  = editor_config.path_absolute + 'laravel-filemanager?editor=tinymce5&type=' + type;
        //
        //             tinymce.activeEditor.windowManager.openUrl({
        //                 url : url,
        //                 title : 'Filemanager',
        //                 width : x * 0.8,
        //                 height : y * 0.8,
        //                 onMessage: (api, message) => {
        //                     callback(message.content);
        //                 }
        //             });
        //         }
        //     };
    };

    tinymce.init(editor_config);
</script>
