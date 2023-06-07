<?php

namespace App\Http\Controllers\Sistema;

use App\Http\Requests\UsuariosRequest;
use App\Models\Usuario;
use App\Models\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    protected $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = $usuario;
    }

    public function index()
    {
        $usuarios = $this->usuario->join('roles_usuarios', 'usuarios.id', '=', 'roles_usuarios.usuarios_id')
            ->join('roles', 'roles_usuarios.roles_id', '=', 'roles.id')
            ->select('usuarios.*', 'roles.nome as role_name')
            ->get();

        $roles = Role::all();

        return view('sistema.usuarios.index', compact('usuarios', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();

        return view('sistema.usuarios.create', compact('roles'));
    }

    public function store(UsuariosRequest $request)
    {
        $data = $request->only(['nome', 'user', 'email', 'sexo', 'password', 'imagem', 'status']);
        $data['status'] = isset($data['status']) ? '1' : '0';

        if (isset($data['imagem']) && $data['imagem'] != null) {
            $path = '/img/usuarios/';

            $imageName = uniqid() . '-' . str_replace(" ", "-", trim($request->imagem->getClientOriginalName()));
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            $user = $this->usuario->create($data);
            $user->roles()->attach($request->roles);

            flash('Usuario cadastrado com sucesso!')->success();

            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function show($id)
    {
        $usuario = $this->usuario->findOrFail($id);

        return view('sistema.usuarios.show', compact('usuario'));
    }

    public function edit($id)
    {
        $usuario = $this->usuario->findOrFail($id);
        $roles = Role::all();

        $status = $usuario['status'] == 'Ativo' ? '1' : '0';

        return view('sistema.usuarios.edit', compact('usuario', 'roles', 'status'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only(['nome', 'imagem', 'sexo', 'status']);
        $data['status'] = isset($data['status']) ? '1' : '0';

        $usuarios = $this->usuario->findOrFail($id);

        if (isset($data['imagem']) && $data['imagem'] != null) {
            $path = '/img/usuarios/';

            // Excluir a imagem antiga do servidor
            $oldImage = $usuarios->image_path;
            if ($oldImage !== null) {
                unlink(public_path($oldImage));
            }

            $imageName = uniqid() . '-' . trim($request->imagem->getClientOriginalName());
            $request->imagem->storeAs($path, $imageName);
            $data['imagem'] = $imageName;
        }

        try {
            $usuarios->update($data);
            $usuarios->roles()->sync($request->roles);

            flash('Usuario atualizado com sucesso!')->success();

            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $usuarios = $this->usuario->findOrFail($id);

        $path = public_path('storage/img/usuarios/');
        $image_path = app_path($path . $usuarios->imagem);

        // Excluir a imagem do servidor
        $image = $usuarios->image_path;
        if ($image !== null) {
            unlink(public_path($image));
        }

        try {
            File::delete($image_path);

            $usuarios->delete();

            flash('Usuario removido com sucesso!')->success();

            return redirect()->route('usuarios.index');
        } catch (\Exception $e) {
            flash($e->getMessage())->warning();

            return redirect()->back();
        }
    }

    public function changePassword(Request $request, $id)
    {
        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {

            if (!Hash::check($request->newpassword, $hashedPassword)) {
                $this->usuario->where('id', $id)->update(['password' => $request->newpassword]);

                flash('Password atualizado com sucesso!')->success();
            } else {
                flash('O seu novo password não pode ser igual o antigo!')->warning();
            }
        }

        flash('Password antigo não é o mesmo!')->warning();

        return redirect()->back();
    }

    public function crop(Request $request)
    {
        $data = $request->only(['imagem']);

        $path = '/img/usuarios/';
        $file = $data['imagem'];
        $new_image_name = uniqid() . '-' . trim($request->imagem->getClientOriginalName());;
        $upload = $file->move(public_path($path), $new_image_name);

        if ($upload) {
            $this->usuario->create($data);
            return response()->json(['status' => 1, 'msg' => 'Imagem cortada com sucesso.', 'name' => $new_image_name]);
        }

        return response()->json(['status' => 0, 'msg' => 'Algo está errado, tente novamente mais tarde']);
    }

    public function multiDelete(Request $request)
    {
        $this->usuario->whereIn('id', $request->get('selected'))->delete();

        return response("Usuarios selecionados excluídos com sucesso.", 200);
    }
}
