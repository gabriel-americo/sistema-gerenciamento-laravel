<?php

namespace App\Http\Controllers\Sistema;

use App\Models\Clientes;

use App\Http\Requests\ClientesRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Routing\Controller as Controller;

class ClientesController extends Controller
{
    protected $cliente;

    public function __construct(Clientes $cliente)
    {
        $this->cliente = $cliente;
    }

    public function index()
    {
        $clientes = $this->cliente->all();

        return view('sistema.clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('sistema.clientes.create');
    }

    public function store(ClientesRequest $request)
    {
        $dataCliente = $request->only(['nome', 'sobrenome', 'user', 'email', 'site', 'imagem', 'password', 'status']);
        $dataCobranca = $request->only(['nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas']);
        $dataEnvio = $request->only(['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios']);

        try
        {
            $dataCliente['status'] = isset($dataCliente['status']) ? '1' : '0';

            if (isset($dataCliente['imagem']) && $dataCliente['imagem'] != null) {
                $path = '/img/clientes/';

                $imageName = uniqid() . '-' . trim($request->imagem->getClientOriginalName());
                $request->imagem->storeAs($path, $imageName);
                $dataCliente['imagem'] = $imageName;
            }

            $cliente = $this->cliente->create($dataCliente);
            $cliente->enderecoCobranca()->create($dataCobranca);
            $cliente->enderecoEnvio()->create($dataEnvio);

            flash('Cliente cadastrado com sucesso!')->success();

            return redirect()->route('clientes.index');

        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            
            return redirect()->back();
        }
    }

    public function show($id)
    {
        $cliente = $this->cliente->findOrFail($id);

        return view('sistema.clientes.show', compact('cliente'));
    }

    public function edit($id)
    {
        $clientes = Clientes::join('endereco_cobrancas', 'endereco_cobrancas.clientes_id', '=', 'clientes.id')
        ->join('endereco_envios', 'endereco_envios.clientes_id', '=', 'clientes.id')
        ->select('clientes.*','endereco_cobrancas.*', 'endereco_envios.*')
        ->findOrFail($id);

        $checked = ($clientes['status'] == 'Ativo' ? 'checked="checked"' : '');
        $status = ($clientes['status'] == 'Ativo' ? '1' : '0');

        return view('sistema.clientes.edit', compact('clientes', 'checked', 'status'));
    }

    public function update(Request $request, $id)
    {
        $dataCliente = $request->only(['nome', 'sobrenome', 'user', 'email', 'site', 'imagem', 'password', 'status']);
        $dataCobranca = $request->only(['nome_cobrancas', 'sobrenome_cobrancas', 'cpf_cobrancas', 'cnpj_cobrancas', 'empresa_cobrancas', 'nascimento_cobrancas', 'sexo_cobrancas', 'rua_cobrancas', 'numero_cobrancas', 'complemento_cobrancas', 'bairro_cobrancas', 'cidade_cobrancas', 'cep_cobrancas', 'pais_cobrancas', 'estado_cobrancas', 'telefone_cobrancas', 'celular_cobrancas', 'email_cobrancas']);
        $dataEnvio = $request->only(['nome_envios', 'sobrenome_envios', 'empresa_envios', 'rua_envios', 'numero_envios', 'complemento_envios', 'bairro_envios', 'cidade_envios', 'cep_envios', 'pais_envios', 'estado_envios']);

        $clientes = $this->cliente->findOrFail($id);

        try
        {
            $dataCliente['status'] = (isset($dataCliente['status']) == '1' ? '1' : '0');

            if (isset($dataCliente['imagem']) && $dataCliente['imagem'] != null) {
                $path = '/img/clientes/';

                $imageName = uniqid() . '-' . trim($request->imagem->getClientOriginalName());
                $request->imagem->storeAs($path, $imageName);
                $dataCliente['imagem'] = $imageName;
            }

            $clientes->update($dataCliente);
            $clientes->enderecoCobranca()->update($dataCobranca);
            $clientes->enderecoEnvio()->update($dataEnvio);

            flash('Cliente atualizado com sucesso!')->success();

            return redirect()->route('clientes.index');

        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $clientes = $this->cliente->findOrFail($id);

        try
        {
            $path = public_path('storage/img/clientes/');
            $image_path = app_path($path.$clientes->imagem);

            File::delete($image_path);

            $clientes->delete();

            flash('Cliente removido com sucesso!')->success();

            return redirect()->route('clientes.index');

        } catch (\Exception $e) {
            flash($e->getMessage())->warning();
            
            return redirect()->back();
        }
    }

    public function multiDelete(Request $request) 
    {
        Clientes::whereIn('id', $request->get('selected'))->delete();

        return response("Clientes selecionados excluídos com sucesso.", 200);
    }
}
