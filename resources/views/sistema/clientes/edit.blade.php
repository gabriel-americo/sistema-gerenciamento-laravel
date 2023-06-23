@extends('sistema.template.master')

@section('content')

<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
    <div class="d-flex flex-column flex-column-fluid">
        <div id="kt_app_toolbar" class="app-toolbar py-3 py-lg-6">
            <div id="kt_app_toolbar_container" class="app-container container-xxl d-flex flex-stack">
                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">Atualização</h1>

                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                        <li class="breadcrumb-item text-muted">
                            <a href="#" class="text-muted text-hover-primary">Usuário</a>
                        </li>

                        <li class="breadcrumb-item">
                            <span class="bullet bg-gray-400 w-5px h-2px"></span>
                        </li>

                        <li class="breadcrumb-item text-muted">Atualização</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="app-content flex-column-fluid">
            <div class="app-container container-xxl">
                <div class="card mb-5 mb-xl-10">
                    <div class="card-header border-0">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Editar Usuário</h3>
                        </div>
                    </div>

                    <form class="form" enctype="multipart/form-data" action="{{ route('usuarios.update', $usuarios->id) }}" method="POST">
                        <div class="card-body border-top p-9">
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Imagem do Perfil</label>
                                <div class="col-lg-8">
                                    <div class="image-input image-input-outline" data-kt-image-input="true" style="background-image: url({{ asset('/assets/media/avatars/blank.png') }}">
                                        <div class="image-input-wrapper w-125px h-125px" style="background-image: url({{ asset('/assets/media/avatars/blank.png') }}"></div>
                                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="change" data-bs-toggle="tooltip" title="" data-bs-original-title="Adicionar imagem">
                                            <i class="bi bi-pencil-fill fs-7"></i>
                                            <input type="file" name="imagem" accept=".png, .jpg, .jpeg">
                                            <input type="hidden" name="avatar_remove">
                                        </label>
    
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="" data-bs-original-title="Cancelar imagem">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
    
                                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow" data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="" data-bs-original-title="Remover imagem">
                                            <i class="bi bi-x fs-2"></i>
                                        </span>
                                    </div>
    
                                    <div class="form-text">Tipos de arquivo permitidos: png, jpg, jpeg.</div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="nome" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nome" value="{{ $clientes->nome }}">
                                            @error('nome')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Sobrenome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="sobrenome" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nome" value="{{ $clientes->sobrenome }}">
                                            @error('sobrenome')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Usuario</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="user" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Usuario" value="{{ $clientes->user }}">
                                            @error('user')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">E-mail</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="email" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="E-mail" value="{{ $clientes->email }}">
                                            @error('email')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Site</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="site" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Site" value="{{ $clientes->site }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="separator separator-dashed my-10"></div>
    
                            <h3 class="text-dark font-weight-bold mb-10">Endereço de Cobrança:</h3>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="nome_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nome" value="{{ $clientes->nome_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Sobrenome</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="sobrenome_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Sobrenome" value="{{ $clientes->sobrenome_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">CPF</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cpf_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="CPF" value="{{ $clientes->cpf_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">CNPJ</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cnpj_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="CNPJ" value="{{ $clientes->cnpj_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Empresa</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="empresa_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Empresa" value="{{ $clientes->empresa_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Nascimento</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="date" name="nascimento_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nascimento" value="{{ $clientes->nascimento_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Sexo</label>
                                <div class="col-lg-8 fv-row">
                                    <select name="sexo_cobrancas" aria-label="Sexo" data-control="select2" data-placeholder="Sexo" class="form-select form-select-solid form-select-lg select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                        <option value="">Sexo</option>
                                        <option value="M" @if($clientes->sexo_cobrancas == "M") selected @endif>Masculino</option>
                                        <option value="F" @if($clientes->sexo_cobrancas == "F") selected @endif>Feminino</option>
                                    </select>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">CEP</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cep_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="CEP" value="{{ $clientes->cep_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Rua</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="rua_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Rua" value="{{ $clientes->rua_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Número</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="numero_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Número" value="{{ $clientes->numero_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Bairro</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="bairro_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Bairro" value="{{ $clientes->bairro_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Complemento</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="complemento_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Complemento" value="{{ $clientes->complemento_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Cidade</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cidade_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Cidade" value="{{ $clientes->cidade_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Estado</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="estado_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Estado" value="{{ $clientes->estado_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">País</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="pais_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="País" value="{{ $clientes->pais_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Telefone</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="telefone_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Telefone" value="{{ $clientes->telefone_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">Celular</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="celular_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Celular" value="{{ $clientes->celular_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label required fw-bold fs-6">E-mail</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="email_cobrancas" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="E-mail" value="{{ $clientes->email_cobrancas }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="separator separator-dashed my-10"></div>
    
                            <h3 class="text-dark font-weight-bold mb-10">Endereço de Envio:</h3>
                            
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Nome</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="nome_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Nome" value="{{ $clientes->nome_envios }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="row mb-6">
                                    <label class="col-lg-4 col-form-label fw-bold fs-6">Sobrenome</label>
                                    <div class="col-lg-8">
                                        <div class="row">
                                            <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                                <input type="text" name="sobrenome_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Sobrenome" value="{{ $clientes->sobrenome_envios }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
    
                                <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">CEP</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cep_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="CEP" value="{{ $clientes->cep_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Rua</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="rua_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Rua" value="{{ $clientes->rua_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Número</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="numero_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Número" value="{{ $clientes->numero_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Complemento</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="complemento_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Complemento" value="{{ $clientes->complemento_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Bairro</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="bairro_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Bairro" value="{{ $clientes->bairro_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Cidade</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="cidade_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Cidade" value="{{ $clientes->cidade_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Empresa</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="empresa_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Empresa" value="{{ $clientes->empresa_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Estado</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="estado_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="Estado" value="{{ $clientes->estado_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-6">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">País</label>
                                <div class="col-lg-8">
                                    <div class="row">
                                        <div class="col-lg-12 fv-row fv-plugins-icon-container">
                                            <input type="text" name="pais_envios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" placeholder="País" value="{{ $clientes->pais_envios }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row mb-0">
                                <label class="col-lg-4 col-form-label fw-bold fs-6">Ativar</label>
                                <div class="col-lg-8 d-flex align-items-center">
                                    <div class="form-check form-check-solid form-switch fv-row">
                                        <input class="form-check-input w-45px h-30px" type="checkbox" name="status" {{ $checked }} value="{{ $status }}>
                                        <label class="form-check-label" for="ativar"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-footer d-flex justify-content-end py-6 px-9">
                            <button type="reset" class="btn btn-light btn-active-light-primary me-2">Resetar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>

                        @csrf
                        @method("PUT")
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection