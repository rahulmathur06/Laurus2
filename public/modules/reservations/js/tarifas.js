/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($, global) {

    $.getDetails = function (type) {
        var tarifa_id = document.getElementById('tarifa_id');
        if (tarifa_id === null)
            var data = {type: type};
        else
            var data = {type: type, tarifa_id: tarifa_id.value};
        
        if(type == 3 || type == 4){
            document.getElementById('details_tab').click();
            $('#precios_tab').hide();
        }
        else
            $('#precios_tab').show();

        $.ajax({
            url: urlToGetDetail,
            type: 'post',
            data: data,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                jQuery('#enviar').show();
                jQuery('#details-content').html(response);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    };

    //function to format input as money
    global.formatCurrency = function (element, event) {

        //variable declarations
        var currency, modifiedCurrency, hasDot, lengthDiff,
                selectionStart = element.selectionStart,
                selectionEnd = element.selectionEnd;

        //proceed if pressed key is allowed
        if (isKeyAllowed(event) && element.value.trim()) {

            currency = element.value;

            hasDot = currency.search(/\./g);

            switch (hasDot) {
                case - 1:
                    currency += '.00';
                    break;
                case 0 :
                    currency = '0' + currency;
                    break;
            }

            //modify the currency
            modifiedCurrency = '$' + currency.replace(/,|\$/g, "").replace(/(\d)(?=(\d{3})+\.)/g, "$1,").replace(/(\.\d{2}).*/g, "$1");

            //calculate the length differnce in currency throughout the process
            lengthDiff = modifiedCurrency.length - currency.length;

            //Set modified currency
            $(element).val(modifiedCurrency);

            //reset the cursor to its previous position
            if (lengthDiff > 0) {
                element.setSelectionRange(selectionStart + lengthDiff, selectionEnd + lengthDiff);
            } else {
                element.setSelectionRange(selectionStart, selectionEnd);
            }
        }
    };

    //function to format final input as money 
    global.checkFormat = function (element) {

        var value = element.value;
        if (value.trim()) {

            var hasDot = value.search(/\./g);
            switch (hasDot) {
                case - 1:
                    value += '.00';
                    break;
                case 0:
                    value = '0' + value;
                    break;
                case 1:
                    value = '$0' + value.replace(/\$/g, '');
                    break;
                case value.length - 1:
                    value += '00';
                    break;
            }

            if (value.search(/\$/g) === -1)
                value = '$' + value;

            jQuery(element).val(value);
            jQuery(element).siblings('input').val(value.replace(/,|\$/g, ''));
        }
    };

    //Check if the pressed key is allowed.
    global.isKeyAllowed = function (event) {
        var allowedKeys = [8, 46, 37, 38, 39, 40, 9];
        if ((event.keyCode < 58 && event.keyCode > 47) || (event.keyCode < 106 && event.keyCode > 95) || allowedKeys.indexOf(event.keyCode) !== -1) {
            return true;
        } else {
            return false;
        }
    };

//function for document ready event
    $(function () {
        $.getDetails(document.getElementById('tipo').value);
    });

})(jQuery, window);

function fakeCheckbox() {
    $('span.checkbox').on('click', function () {
        $(this).children('i').toggleClass('fa-check-square-o fa-square-o');
    });
}
