
<!-- jQuery  -->




<footer class="footer footer-static footer-light navbar-border">
    <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2017</p>
</footer>

<!-- BEGIN VENDOR JS-->
{{--<script src="../../../app-assets/js/core/libraries/jquery.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/js/core/libraries/jquery.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/tether.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/tether.min.js')}}
{{--<script src="../../../app-assets/js/core/libraries/bootstrap.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/js/core/libraries/bootstrap.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/unison.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/unison.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/blockUI.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/blockUI.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/jquery.matchHeight-min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/jquery.matchHeight-min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/jquery-sliding-menu.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/jquery-sliding-menu.js')}}
{{--<script src="../../../app-assets/vendors/js/sliders/slick/slick.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/sliders/slick/slick.min.js')}}
{{--<script src="../../../app-assets/vendors/js/ui/screenfull.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/ui/screenfull.min.js')}}
{{--<script src="../../../app-assets/vendors/js/extensions/pace.min.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/vendors/js/extensions/pace.min.js')}}
<!-- BEGIN VENDOR JS-->

@yield('js')
<!-- BEGIN ROBUST JS-->
{{--<script src="../../../app-assets/js/core/app-menu.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/js/core/app-menu.js')}}
{{--<script src="../../../app-assets/js/core/app.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/js/core/app.js')}}
{{--<script src="../../../app-assets/js/scripts/ui/fullscreenSearch.js" type="text/javascript"></script>--}}
{{ Html::script('admin-panel/assets/js/scripts/ui/fullscreenSearch.js')}}




<!-- dropzone -->
{{ Html::script('admin-panel/assets/js/dropzone.js')}}
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->

<!-- END PAGE LEVEL JS-->
 
 {{ Html::script('admin-panel/assets/vendors/js/forms/icheck/icheck.min.js')}}
 {{ Html::script('admin-panel/assets/js/scripts/forms/checkbox-radio.js')}}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>

<script>
    var editor_config = {
        path_absolute : "/",
        selector: "textarea.my-editor",
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern"
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        relative_urls: false,
        file_browser_callback : function(field_name, url, type, win) {
            var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
            if (type == 'image') {
                cmsURL = cmsURL + "&type=Images";
            } else {
                cmsURL = cmsURL + "&type=Files";
            }

            tinyMCE.activeEditor.windowManager.open({
                file : cmsURL,
                title : 'Filemanager',
                width : x * 0.8,
                height : y * 0.8,
                resizable : "yes",
                close_previous : "no"
            });
        }
    };

    tinymce.init(editor_config);
</script>




</body>
</html>