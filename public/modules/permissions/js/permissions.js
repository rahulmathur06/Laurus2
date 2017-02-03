/**
 * Created by ekontiki89 on 15/07/15.
 */
$(".permission").on("change", function () {
    var data   = $(this).is(':checked');
    var value  = $(this).val();
    assign_permission(data, value);
    $('.select_menu').each(function(index, element){
        markIfSelectsAll(element);
    });
});

function select_all(menu_id, data, type='menu'){
    assign_permission(data,menu_id,type);
    $(".checkbox_"+menu_id).prop('checked', data);
}

function assign_permission(data, value,type = 'single'){
    var form   = $('#form_permission');
    var url    = form.attr('action');
    var method = $("input[name=_method]").val();
    var token  = $("input[name=_token]").val();

    $.ajax({
        type: "POST",
        url: url,
        data: {data: data, value: value, _method: method, _token :token, type:type},
        success: function(affectedRows) {
            $('.success').show();
            setTimeout(function() {
                $('.success').fadeOut('slow');
            }, 500);

            console.log(affectedRows);

        }
    });
}

function markIfSelectsAll(element){
    if($('.checkbox_'+element.id+':checked').length == $('.checkbox_'+element.id).length)
        element.checked = true;
    else
        element.checked = false;
}

$(function(){
    $('.select_menu').each(function(index, element){
        markIfSelectsAll(element);
    });
});


