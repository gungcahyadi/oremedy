<script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    $('.editor-textarea').each(function(e){
        CKEDITOR.replace(this,{
            filebrowserBrowseUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&akey={{ md5('goestoe_ari_2905') }}&fldr=',
            filebrowserUploadUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=2&editor=ckeditor&akey={{ md5('goestoe_ari_2905') }}&fldr=',
            filebrowserImageBrowseUrl : '{{url("ckeditor")}}/filemanager/dialog.php?type=1&editor=ckeditor&akey={{ md5('goestoe_ari_2905') }}&fldr='
        });
    });
</script>