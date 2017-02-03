/**
 * Created by ekontiki89 on 19/10/15.
 */

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.apps = {
        update: function (id, status) {
            $('#action_form_'+id+ ' #status').val(status);
            $('#action_form_'+id).submit();
        },
        confirmation : function (selector) {
            $( selector === undefined ? '[data-toggle="confirmation"]' : selector ).confirmation({
                title:'¿Está seguro de marcar esta entrada?',
                popout:true,
                singleton:true,
                btnOkClass: 'btn-xs btn-success ',
                btnOkIcon: 'fa fa-check',
                btnOkLabel: 'Si',
                btnCancelClass: 'btn-xs btn-danger',
                btnCancelIcon: 'fa fa-times',
                btnCancelLabel: 'No',
                onConfirm: function () {
                    $('.btn').addClass('disabled');
                    if( $(this).data('btn-type') && $(this).data('btn-type') === 'update' ) {
                        apps.update($(this).data('entry-id'), $(this).data('status'));
                    }
                }
            });
        },
        setup: function () {
            this.confirmation();
        }
    };

    apps.setup();
    $("#datatable").DataTable({
        "language": {
            "url": "/bower_components/admin-lte/plugins/datatables/lang/spanish.json"
        }
    });
});