<?php

namespace App\Http\Controllers\App;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{
    public function index()
    {
        return User::with(['department:id,nombre', 'position:id,nombre'])->get();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:users,email,',
                'usuario' => 'required',
                'primerNombre' => 'required',
                'segundoNombre' => 'required',
                'primerApellido' => 'required',
                'segundoApellido' => 'required',
                'idDepartamento' => 'required',
                'idCargo' => 'required',
            ]);
        
            return User::create($request->all());
        } catch (ValidationException $e) {
            // Si la validación falla, devuelve los errores en formato JSON
            return response()->json($e->errors(), 422);
        }catch(Exception $e){
            return response()->json(['error' => 'Error temporal'], 422);
        }
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email,' . $id,
        ]);


        $user = User::findOrFail($id);

        // Verificar si el correo electrónico ha cambiado
        if ($user->email !== $request->email) {
            $existingUser = User::where('email', $request->email)->first();
            if ($existingUser) {
                return response()->json(['error' => 'El correo electrónico ya está en uso por otro usuario'], 422);
            }

            $user->email = $request->email;
        }

        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json($user);
   
    }


    public function delete(Request $request, $id)
    {
        $article = User::findOrFail($id);
        $article->delete();

        return 204;
    }
}
