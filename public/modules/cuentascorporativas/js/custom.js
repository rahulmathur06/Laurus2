/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($, global, document) {

    //function get data of cities according to the states
    global.get_city_from_state = function (stateid, url) {
        $.ajax({
            url: url,
            type: "get",
            data: {
                stateid: stateid
            },
            success: function (result) {
                $("#ciudads").html(result);
                $("#direccion_ciudad").select2();
            }
        });
    };

    //Function to disable all the enterprise credit fields if checkbox is not checked
    global.collapseIfCreditNotRequired = function (element) {
        if ($(element).is(':checked')) {
            //$('#collapsibleIfCreditNotRequired').slideDown();
            $('#collapsibleIfCreditNotRequired').find('input, select').attr('disabled', false);
        } else
            //$('#collapsibleIfCreditNotRequired').slideUp();
            $('#collapsibleIfCreditNotRequired').find('input, select').attr('disabled', true);
    };

    //Function to insert filename in fake upload box
    global.after_logo_select = function () {
        var uploadedFile = jQuery('#logo')[0].files[0];
        $('#logo-duplicate').val(uploadedFile.name);
        $('#logo_popover #logo_popover_content').html('<img class="img-thumbnail" alt="Cinque Terre" width="304" height="236" id="logo_popover_img">');
        document.getElementById('logo_popover_img').src = URL.createObjectURL(uploadedFile);
        $('#toggle_popover').removeClass('disabled disabled_advanced');
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
            jQuery('#limite').val(value.replace(/,|\$/g, ''));
        }
    };

    //Check if the pressed key is allowed.
    global.isKeyAllowed = function (event) {
        var allowedKeys = [8, 46, 37, 38, 39, 40];
        if ((event.keyCode < 58 && event.keyCode > 47) || (event.keyCode < 106 && event.keyCode > 95) || allowedKeys.indexOf(event.keyCode) !== -1) {
            return true;
        } else {
            return false;
        }
    };

    /*
     * 
     * @returns {undefined}
     */
    global.updateEnterpriseStatus = function (status) {
        $('#enterprise_status').val(status);
        $('#enterpriseAuthorizationForm').submit();
    };

    /*
     * Function jQuery(document).ready()
     * 
     * Specify all the functions triggered on the document load and common on 
     * both edit and create screen
     */

    $(function () {
        $(".select2").select2();
        global.collapseIfCreditNotRequired(jQuery('#requiere_credito'));
        $('#telefono2, #telefono1').inputmask({
            mask: "(###) ###-####",
            greedy: false,
            definitions: {'#': {validator: "[0-9]", cardinality: 1}}
        });
        $('#toggle_popover').popover({
            html:true,
            title: 'Empresa Logo',
            container: 'body',
            placement: 'top',
            trigger: 'click',
            content: function(){
                return $('#logo_popover').html();
            }
        }).click(function(){
            $(this).children('i').toggleClass('fa-eye fa-eye-slash');
        });
    });

})(jQuery, window, document);
