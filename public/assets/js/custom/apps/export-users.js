"use strict";
var KTModalExportUsers = function() {
    const t = document.getElementById("kt_modal_export_users"),
        e = t.querySelector("#kt_modal_export_users_form"),
        n = new bootstrap.Modal(t);
    return {
        init: function() {
            ! function() {
                var o = FormValidation.formValidation(e, {
                    fields: {
                        format: {
                            validators: {
                                notEmpty: {
                                    message: "O formato do arquivo é obrigatório"
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger,
                        bootstrap: new FormValidation.plugins.Bootstrap5({
                            rowSelector: ".fv-row",
                            eleInvalidClass: "",
                            eleValidClass: ""
                        })
                    }
                });
                const i = t.querySelector('[data-kt-users-modal-action="submit"]');
                i.addEventListener("click", (function(t) {
                    t.preventDefault(), o && o.validate().then((function(t) {
                        console.log("validated!"), "Valid" == t ? (i.setAttribute("data-kt-indicator", "on"), i.disabled = !0, setTimeout((function() {
                            i.removeAttribute("data-kt-indicator"), Swal.fire({
                                text: "A lista de usuários foi exportada com sucesso!",
                                icon: "success",
                                buttonsStyling: !1,
                                confirmButtonText: "OK, entendi!",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then((function(t) {
                                t.isConfirmed && (n.hide(), i.disabled = !1)
                            }))
                        }), 2e3)) : Swal.fire({
                            text: "Parece que foram detectados alguns erros, tente novamente.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }))
                })), t.querySelector('[data-kt-users-modal-action="cancel"]').addEventListener("click", (function(t) {
                    t.preventDefault(), Swal.fire({
                        text: "Tem certeza de que deseja cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Sim, cancele!",
                        cancelButtonText: "Não, volte",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then((function(t) {
                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                            text: "Seu formulário não foi cancelado!.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }))
                })), t.querySelector('[data-kt-users-modal-action="close"]').addEventListener("click", (function(t) {
                    t.preventDefault(), Swal.fire({
                        text: "Tem certeza de que deseja cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "Sim, cancele!",
                        cancelButtonText: "Não, volte",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light"
                        }
                    }).then((function(t) {
                        t.value ? (e.reset(), n.hide()) : "cancel" === t.dismiss && Swal.fire({
                            text: "Seu formulário não foi cancelado!.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "OK, entendi!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        })
                    }))
                }))
            }()
        }
    }
}();
KTUtil.onDOMContentLoaded((function() {
    KTModalExportUsers.init()
}));