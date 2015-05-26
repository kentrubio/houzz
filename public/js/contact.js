$(document).ready(function () {

    function updateStateValues()
    {
        if ($('#country_code').val() == 0)
        {
            $("#state_code").html("");
            $("#state_code").append('<option value="0" selected>--- Select ---</option>');
        }

        $.post( "update-state-values", {
            country_code: $('#country_code').val(),
            _token: $('input[name=_token]').val() }, function( response ) {

            var value = jQuery.parseJSON(response);
            // disable the state select before updating its values
            $("#state_code").attr('disabled', 'disabled');
            $("#state_code").html("");
            $("#state_code").append('<option value="0" selected>--- Select ---</option>');
            for ( var i = 1; i < value.length; i++ )
            {
                $("#state_code").append('<option value="' + value[i].code + '">' + value[i].name +'</option>');
            }

            $("#state_code").removeAttr('disabled');
        });
    }

    $('#country_code').change(function() {
        updateStateValues();
    });

    updateStateValues();

});