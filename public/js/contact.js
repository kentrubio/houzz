$(document).ready(function () {

    function updateStateValues()
    {
        $.post( "update-state-values", {
            country_code: $('#address_country_code').val(),
            _token: $('input[name=_token]').val() }, function( response ) {

            var value = jQuery.parseJSON(response);
            // disable the state select before updating its values
            $("#address_state_code").attr('disabled', 'disabled');
            $("#address_state_code").html("");
            $("#address_state_code").append('<option value="0" selected>--- Select ---</option>');
            for ( var i = 1; i < value.length; i++ )
            {
                $("#address_state_code").append('<option value="' + value[i].code + '">' + value[i].name +'</option>');
            }

            $("#address_state_code").removeAttr('disabled');
        });
    }

    $('#address_country_code').change(function() {
        updateStateValues();
    });


});