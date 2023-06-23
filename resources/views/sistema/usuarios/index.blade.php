@extends('sistema.template.master')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">

    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Usuários</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">Usuários</li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Lista</li>
                    </ul>
                </div>
            </div>
        </div>

        <div id="kt_app_content" class="app-content flex-column-fluid">
            <div id="kt_app_content_container" class="app-container container-xxl">
                <div class="card">
                    <div class="card-header border-0 pt-6">
                        <div class="card-title">
                            <div class="d-flex align-items-center position-relative my-1">
                                <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                        <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor" />
                                    </svg>
                                </span>

                                <input type="text" data-kt-user-table-filter="search" class="form-control form-control-solid w-250px ps-14" placeholder="Buscar Usuário" />
                            </div>
                        </div>

                        <div class="card-toolbar">
                            <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                                <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Filtro
                                </button>

                                <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                    <div class="px-7 py-5">
                                        <div class="fs-5 text-dark fw-bold">Opções de Filtros</div>
                                    </div>

                                    <div class="separator border-gray-200"></div>

                                    <div class="px-7 py-5" data-kt-user-table-filter="form">
                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Funções:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Selecione uma opção" data-allow-clear="true" data-kt-user-table-filter="role" data-hide-search="true">
                                                <option></option>
                                                @foreach($roles as $role)
                                                <option value="{{ $role->nome }}">{{ $role->nome }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-10">
                                            <label class="form-label fs-6 fw-semibold">Status:</label>
                                            <select class="form-select form-select-solid fw-bold" data-kt-select2="true" data-placeholder="Selecione uma opção" data-allow-clear="true" data-kt-user-table-filter="status" data-hide-search="true">
                                                <option></option>
                                                <option value="1">Ativo</option>
                                                <option value="2">Desativado</option>
                                            </select>
                                        </div>

                                        <div class="d-flex justify-content-end">
                                            <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_export_users">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1" transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                            <path d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z" fill="currentColor" />
                                            <path opacity="0.3" d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Export
                                </button>

                                <a href="{{ route('usuarios.create') }}" class="btn btn-primary">
                                    <span class="svg-icon svg-icon-2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                        </svg>
                                    </span>
                                    Novo Registro
                                </a>
                            </div>

                            <div class="d-flex justify-content-end align-items-center d-none" data-kt-user-table-toolbar="selected">
                                <div class="fw-bold me-5"><span class="me-2" data-kt-user-table-select="selected_count"></span>Selecionado</div>
                                <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Deletar Selecionado</button>
                            </div>

                            <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered mw-650px">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h2 class="fw-bold">Exportar Usuários</h2>
                                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-kt-users-modal-action="close">
                                                <span class="svg-icon svg-icon-1">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                        <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                            <form id="kt_modal_export_users_form" class="form" action="#">
                                                <div class="fv-row mb-10">
                                                    <label class="fs-6 fw-semibold form-label mb-2">Selecione Funções:</label>

                                                    <select name="role" data-control="select2" data-placeholder="Selecione uma função" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        @foreach($roles as $role)
                                                        <option value="{{ $role->nome }}">{{ $role->nome }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="fv-row mb-10">
                                                    <label class="required fs-6 fw-semibold form-label mb-2">Selecione o formato:</label>
                                                    <select name="format" data-control="select2" data-placeholder="Selecione um formato" data-hide-search="true" class="form-select form-select-solid fw-bold">
                                                        <option></option>
                                                        <option value="excel">Excel</option>
                                                        <option value="pdf">PDF</option>
                                                    </select>
                                                </div>

                                                <div class="text-center">
                                                    <button type="reset" class="btn btn-light me-3" data-kt-users-modal-action="cancel">Discard</button>
                                                    <button type="submit" class="btn btn-primary" data-kt-users-modal-action="submit">
                                                        <span class="indicator-label">Enviar</span>
                                                        <span class="indicator-progress">Please wait...
                                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body py-4">
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table">
                            <thead>
                                <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                                    <th class="w-10px pe-2">
                                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                            <input class="form-check-input" type="checkbox" data-kt-check="true" data-kt-check-target="#kt_table_users .form-check-input" value="1" />
                                        </div>
                                    </th>
                                    <th class="min-w-125px">Dados Pessoal</th>
                                    <th class="min-w-125px">Usuario</th>
                                    <th class="min-w-125px">Função</th>
                                    <th class="min-w-125px">Status</th>
                                    <th class="min-w-125px">Data de Cadastro</th>
                                    <th class="text-end min-w-100px">Ações</th>
                                </tr>
                            </thead>

                            <tbody class="text-gray-600 fw-semibold">
                                @foreach($usuarios as $usuario)
                                <tr>
                                    <td>
                                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" value="{{ $usuario->id }}" />
                                        </div>
                                    </td>

                                    <td class="d-flex align-items-center">
                                        <div class="symbol symbol-circle symbol-50px overflow-hidden me-3">
                                            <a href="{{ route('usuarios.show', $usuario->id) }}">
                                                <div class="symbol-label">
                                                    <img src="{{ $usuario->imagem ? asset('storage/img/usuarios/' . $usuario->imagem) : asset('assets/media/avatars/blank.png') }}" alt="{{ $usuario->nome }}" class="w-100" />
                                                </div>
                                            </a>
                                        </div>

                                        <div class="d-flex flex-column">
                                            <a href="{{ route('usuarios.show', $usuario->id) }}" class="text-gray-800 text-hover-primary mb-1">{{ $usuario->nome }}</a>
                                            <span>{{ $usuario->email }}</span>
                                        </div>
                                    </td>

                                    <td>{{ $usuario->user }}</td>
                                    <td>{{ $usuario->role_name }}</td>
                                    <td>
                                        <div class="badge {{ $usuario->status == 'Ativo' ? 'badge-light-success' : 'badge-light-danger' }}">
                                            {{ $usuario->status }}
                                        </div>
                                    </td>
                                    <td>{{ $usuario->created_at ? $usuario->created_at->format('d M Y, g:i a') : 'N/A' }}</td>

                                    <td class="text-end">
                                        <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Ações
                                            <span class="svg-icon svg-icon-5 m-0">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                                                </svg>
                                            </span>
                                        </a>
                                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4" data-kt-menu="true">
                                            <div class="menu-item px-3">
                                                <a href="{{ route('usuarios.edit', $usuario->id) }}" class="menu-link px-3">Editar</a>
                                            </div>

                                            <form class="menu-item px-3 sweetalert-delete" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST">
                                                @csrf
                                                @method("DELETE")
                                                <button class="menu-link px-3 button-delete" type="submit">Deletar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('ajax-status')

<script src="{{ asset('/assets/js/custom/apps/export-users.js') }}"></script>
<script src="{{ asset('/assets/js/custom/account/settings/signin-methods.js') }}"></script>

<script type="text/javascript">
"use strict";
    var KTUsersList = function() {
    var tableName = "usuarios";
    var e, t, n, r, o = document.getElementById("kt_table"),
        c = () => {},
        l = () => {
            const c = o.querySelectorAll('[type="checkbox"]');
            t = document.querySelector('[data-kt-user-table-toolbar="base"]'), n = document.querySelector('[data-kt-user-table-toolbar="selected"]'), r = document.querySelector('[data-kt-user-table-select="selected_count"]');
            const s = document.querySelector('[data-kt-user-table-select="delete_selected"]');
            c.forEach((e => {
                e.addEventListener("click", (function() {
                    setTimeout((function() {
                        a()
                    }), 50)
                }))
            })), s.addEventListener("click", (function() {
                Swal.fire({
                    text: "Tem certeza de que deseja excluir os "+ tableName +" selecionados?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Sim, deletar!",
                    cancelButtonText: "Não, cancelar",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
                }).then((function(t) {

                    var selected = [];
                    $('#kt_table .form-check-input:checked').each(function() {
                        selected.push($(this).val());
                    });

                    if (t.isConfirmed) {
                        $.ajax({
                            type: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: '{{ route('usuarios.multi-delete') }}',
                            data: {
                            'selected': selected
                            },
                            success: function (response, textStatus, xhr) {
                                Swal.fire({
                                    icon: 'success',
                                    title: response,
                                    showDenyButton: false,
                                    showCancelButton: false,
                                    confirmButtonText: 'OK'
                                }).then((result) => {
                                    window.location='/' + tableName
                                });
                            }
                        });
                    }

                    t.value ? Swal.fire({
                        text: "Você excluiu todos os "+ tableName +" selecionados!.",
                        icon: "success",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, eu entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    }).then((function() {
                        c.forEach((t => {
                            t.checked && e.row($(t.closest("tbody tr"))).remove().draw()
                        }));
                        o.querySelectorAll('[type="checkbox"]')[0].checked = !1
                    })).then((function() {
                        a(), l()
                    })) : "cancel" === t.dismiss && Swal.fire({
                        text: "Os "+ tableName +" selecionados não foram excluídos.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, eu entendi!",
                        customClass: {
                            confirmButton: "btn fw-bold btn-primary"
                        }
                    })
                }))
            }))
        };

    const a = () => {
        const e = o.querySelectorAll('tbody [type="checkbox"]');
        let c = !1,
            l = 0;
        e.forEach((e => {
            e.checked && (c = !0, l++)
        })), c ? (r.innerHTML = l, t.classList.add("d-none"), n.classList.remove("d-none")) : (t.classList.remove("d-none"), n.classList.add("d-none"))
    };

    return {
        init: function() {
            o && (o.querySelectorAll("tbody tr").forEach((e => {
                const t = e.querySelectorAll("td"),
                    n = t[2].innerText.toLowerCase();
                let r = 0,
                    o = "minutes";
                const c = moment().subtract(r, o).format();
                t[0].setAttribute("data-order", c);
            })), (e = $(o).DataTable({
                info: !1,
                order: [],
                pageLength: 10,
                lengthChange: !1,
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }]
            })).on("draw", (function() {
                l(), c(), a()
            })), l(), document.querySelector('[data-kt-user-table-filter="search"]').addEventListener("keyup", (function(t) {
                e.search(t.target.value).draw()
            })), document.querySelector('[data-kt-user-table-filter="reset"]').addEventListener("click", (function() {
                document.querySelector('[data-kt-user-table-filter="form"]').querySelectorAll("select").forEach((e => {
                    $(e).val("").trigger("change")
                })), e.search("").draw()
            })), c(), (() => {
                const t = document.querySelector('[data-kt-user-table-filter="form"]'),
                    n = t.querySelector('[data-kt-user-table-filter="filter"]'),
                    r = t.querySelectorAll("select");
                n.addEventListener("click", (function() {
                    var t = "";
                    r.forEach(((e, n) => {
                        e.value && "" !== e.value && (0 !== n && (t += " "), t += e.value)
                    })), e.search(t).draw()
                }))
            })())
        }
    }
}();

KTUtil.onDOMContentLoaded((function() {
    KTUsersList.init()
}));
</script>

@endsection
