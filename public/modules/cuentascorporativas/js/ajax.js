/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.apps = {
        mark: function (url) {
            $.ajax({
                url: url,
                type:'POST',
                data: { _method: 'POST'},
                statusCode:{
                    202: function(e){
                        console.log(e);
                        swal({   title: "Error al Marcar",
                                 text: e.msg,
                                 type: "error",
                                 showCancelButton: false,
                                 closeOnConfirm: true,
                                 showLoaderOnConfirm: false }
                             );
                    },
                    200: function(e){
                        swal({  title: "Exito",
                            text: e.msg,
                            type: "success",
                            showCancelButton: false,
                            closeOnConfirm: true,
                            showLoaderOnConfirm: false
                        },function(){
                            window.location.reload();
                        });
                    },
                    203: function(e){
                        swal({  title: "Oops!",
                            text: e.msg,
                            type: "error",
                            showCancelButton: false,
                            closeOnConfirm: true,
                            showLoaderOnConfirm: false
                        });
                    }
                }
            });

        },
        confirmation : function (selector) {
            $( selector === undefined ? '[data-toggle="confirmation"]' : selector ).confirmation({
                title:'¿Está seguro de marcar este registro.?',
                popout:true,
                singleton:true,
                btnOkClass: 'btn-xs btn-success ',
                btnOkIcon: 'fa fa-check',
                btnOkLabel: 'Si',
                btnCancelClass: 'btn-xs btn-danger',
                btnCancelIcon: 'fa fa-times',
                btnCancelLabel: 'No',
                onConfirm: function () {

                    if( $(this).data('btn-type') && $(this).data('btn-type') === 'mark' ) {
                        apps.mark($(this).data('url'));

                    }
                }
            });
        },
        setup: function () {
            this.confirmation();
        }
    };

    apps.setup();
    
    jQuery('#ejecutiva_id').change(function () {
        document.getElementById("executive_id_hidden").value = this.value;
    });
    jQuery('#nombre').change(function () {
        document.getElementById("empresa_name").value = this.value;
    });
    jQuery(".jQueryUIDate").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        yearRange: "0:+100",
        minDate: 0
    });
    // data tables
    jQuery('#datatable_altered').DataTable({
        //"paging": false,
        "ordering": false,
        "info": false,
        "filter": false
        
    });
    jQuery('#limite_duplicate').val('$' + ((jQuery('#limite').val() + '.00').replace(/(\d)(?=(\d{3})+\.)/g, "$1,")));
});
