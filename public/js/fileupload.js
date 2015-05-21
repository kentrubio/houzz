$(document).ready(function () {
    $('div#dropzone-container').dropzone({
        method: 'post',
        autoProcessQueue: false,
        uploadMultiple: true,
        parallelUploads:50,
        url: "/file-upload",
        sending: function (file, xhr, formData) {

            formData.append("_token", $("input[name=_token]").val());

            $('.form-data').each(function(){
                var name = $(this).attr('name');
                var val = $(this).val();
                formData.append(name, val);
            });

        },
        init: function () {
            var dz = this;
            $("#form-submit").click(function (e) {
                $(this).html('Uploading...');
                e.preventDefault();
                dz.processQueue();
            });
        },
        success: function (file, response) {
            $(this).html('Upload');

        }
    });
    $('.upload-choice').click(function () {
        var selected = $(this).attr('id');
        $('#upload-to').val(selected);
        selection();
    });
    $('#keywords').tagsInput({
        'width': '100%',
        'height': '50px',
        'interactive': true,
        'defaultText': '',
        'delimiter': [',']
    });
    $('select#select-project').change(function () {
        if ($(this).val() === '0') {
            $('div#create-project').show();
        }else{
            $('div#create-project').hide();
        }
    });
    $('select#select-ideabook').change(function () {
        if ($(this).val() === '0') {
            $('div#create-ideabook').show();
        }else{
            $('div#create-ideabook').hide();
        }
    });

    selection();
});

function selection() {
    var selected = $('#upload-to').val();
    var collapsed = 'project';
    var step = 'Step 2: Tell us what you like about the photos.';
    if (selected == 'project') {
        collapsed = 'ideabook';
        step = 'Step 2: Describe Photos';
    }
    $('.step2').html(step);
    $('#' + collapsed).removeClass('selected col-md-8');
    $('#' + collapsed).addClass('col-md-4');
    $('#' + selected).removeClass('col-md-4');
    $('#' + selected).addClass('selected col-md-8');

    $('#' + collapsed + '-section').hide();
    $('#' + selected + '-section').show();

    if (selected == 'project') {
        $('#dos-and-donts-section').show();
    }
    else {
        $('#dos-and-donts-section').hide();
    }

}