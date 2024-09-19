<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function show(){

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('profile.show', ['user' => $usuario]);
        
    }


    public function edit(){

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('profile.edit', ['user' => $usuario]);
        
    }


    public function update(){
        
    }


    public function editFoto(){

        // Recuperar do banco de dados as informações do usuário logado
        $usuario = User::where('id', Auth::id())->first();

        // Carrega a view
        return view('profile.edit-foto', ['user' => $usuario]);

    }


    public function updateFoto(Request $request){
        
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

            //dd($user);

        }

        return redirect()->back()->with('success', 'Foto de perfil atualizada com sucesso!');

    }
}
