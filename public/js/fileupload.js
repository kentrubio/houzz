$(document).ready(function(){
    $("div#dropzone-container").dropzone({
        method:"post",
        autoProcessQueue: false,
        uploadMultiple: true,
        url: "{{ route('file-upload') }}",
        init:function(){
            var dz = this;
            $('#form-submit').click(function(){
                dz.processQueue();
            });
        }
    });
});