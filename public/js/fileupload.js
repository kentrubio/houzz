$(document).ready(function () {
    $('div#dropzone-container').dropzone({
        method: 'post',
        autoProcessQueue: false,
        uploadMultiple: true,
        url: "{{ route('file-upload') }}",
        init: function () {
            var dz = this;
            $('#form-submit').click(function () {
                dz.processQueue();
            });
        }
    });

    $('.upload-choice').click(function () {
        var selected = $(this).attr('id');
        $('#upload-to').val(selected);
        selection();
    });

    selection();
});

function selection() {
    var selected = $('#upload-to').val();
    var collapsed = 'project';
    var step = 'Step 2: Tell us what you like about the photos.';
    if (selected == 'project') {
        collapsed = 'gallery';
        step = 'Step 2: Describe Photos';
    }
    $('.step2').html(step);
    $('#' + collapsed).removeClass('selected col-md-8');
    $('#' + collapsed).addClass('col-md-4');
    $('#' + selected).removeClass('col-md-4');
    $('#' + selected).addClass('selected col-md-8');

    $('#' + collapsed +'-section').hide();
    $('#' + selected +'-section').show();

    if(selected == 'project')
    {
        $('#dos-and-donts-section').show();
    }
    else
    {
        $('#dos-and-donts-section').hide();
    }

}