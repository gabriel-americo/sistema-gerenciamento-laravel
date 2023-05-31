"use strict";

var KTSweetAlert2Delete = function () {

    var initDemos = function () {
        $('.sweetalert-delete').click(function (e) {
            e.preventDefault();
            var form = this;
            swal.fire({
                title: 'Você tem certeza?',
                text: "Você não podera reverter essa ação!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, delete isso!',
                cancelButtonText: 'Não, cancelar!',
                reverseButtons: true,
                buttonsStyling: !1,
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.submit();
                } else if (result.dismiss === 'cancel') {
                    swal.fire(
                        'Cancelado',
                        'Seu arquivo está salvo :)',
                        'error'
                    )
                }
            });
        });
    };

    return {
        init: function () {
            initDemos();
        },
    };
}();

$(document).ready(function () {
    KTSweetAlert2Delete.init();
})
