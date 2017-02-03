/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

(function ($, global) {
    global.getClases = function (locacion_id, id = false) {
        if(id)
            var data = {'locacion_id':locacion_id, 'id': id};
        else
            var data = {'locacion_id':locacion_id};
        $.ajax({
            url: urlToGetClases,
            type: 'post',
            data: data,
            headers: {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                jQuery('#clase_container').html(response);
            },
            error: function (error) {
                console.log(error.responseText);
            }
        });
    };
})(jQuery, window);

