/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($) {



//function for document ready event
    $(function () {
        $(".jQueryUIDatepicker").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+0",
            maxDate: 0,
            onSelect: function (selected) {
                $(".jQueryUIDatepickerwithFutureDate").datepicker("option", "minDate", selected);
            }
        });
        $(".jQueryUIDatepickerwithFutureDate").datepicker({
            dateFormat: "yy-mm-dd",
            changeMonth: true,
            changeYear: true,
            yearRange: "-100:+100"
        });

    });

})(jQuery);
