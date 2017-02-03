/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {

    $.get_branch_from_city = function (ciudad, url) {
        $.ajax({
            url: url,
            type: "get",
            data: {
                ciudad: ciudad
            },
            success: function (result) {
                $("#branch").html(result);
                if (typeof sucursalAutoFillOldVal !== 'undefined')
                    $("#sucursalAutoFill").select2().select2("val", sucursalAutoFillOldVal);
                else
                    $("#sucursalAutoFill").select2();
            }
        });
    }

    $.get_car_desc = function (carcode, url) {
        $.ajax({
            url: url,
            type: "get",
            data: {
                carcode: carcode
            },
            success: function (result) {
                $("#description").val(result);
            }
        });
    }

})(jQuery);
