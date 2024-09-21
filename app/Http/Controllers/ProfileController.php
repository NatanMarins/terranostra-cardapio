<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class ProfileController extends Controller
{

    public function show()
    {

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        $empresaId = Auth::user()->empresa_id;
        $empresa = Empresa::where('id', $empresaId)->get()->first();

        // Carrega a view
        return view('profile.show', compact('empresa'), ['user' => $usuario]);
    }


    public function edit(){

        $user = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('profile.edit', ['user' => $user]);
    }


    public function update(Request $request, User $usuario) {

        $usuario = User::where('id', Auth::id())->first();
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
        ]);

        // Atualiza os dados do usuário
        $usuario->name = $validatedData['name'];
        $usuario->email = $validatedData['email'];
        
        // Atualizar checkbox
        $usuario->situacao = $request->has('situacao');
        $usuario->save();

        return redirect()->route('profile.show', ['user' => $usuario])->with('success', 'Perfil editado com sucesso!');
    }


    public function editFoto()
    {

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('profile.edit-foto', ['user' => $usuario]);
    }


    public function updateFoto(Request $request)
    {

        $usuario = Auth::user();

        // Validar o upload
        $request->validate([
            'foto_perfil' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ]);

        if ($request->hasFile('foto_perfil')) {
            // Deletar a foto de perfil anterior, se existir
            if ($usuario->foto_perfil) {
                Storage::disk('public')->delete($usuario->foto_perfil);
            }

            // Armazenar a nova foto de perfil
            $file = $request->file('foto_perfil');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $path = $file->storeAs('uploads', $fileName, 'public');

            // Atualizar o caminho da foto de perfil no banco de dados
            $usuario->foto_perfil = $path;
            $usuario->save();
        }

        return redirect()->route('profile.show')->with('success', 'Foto de perfil atualizada com sucesso!');
    }


    public function editPassword(){

    }
}
