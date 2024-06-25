<?php

namespace App\Services;

use App\Dtos\UserDto;
use App\Models\User;

class UserService
{
    public function index()
    {
        return User::with(['department:id,nombre', 'position:id,nombre'])
        ->where("activo","=",true)->orderBy('created_at','desc')->get();
    }

    public function show($id)
    {
        return User::find($id);
    }

    public function store(UserDto $dto)
    {
        return User::create([
            'usuario' => $dto->usuario,
            'email' => $dto->email,
            'primerNombre' => $dto->primerNombre,
            'segundoNombre' => $dto->segundoNombre,
            'primerApellido' => $dto->primerApellido,
            'segundoApellido' => $dto->segundoApellido,
            'idDepartamento' => $dto->idDepartamento,
            'idCargo' => $dto->idCargo,
            'cedula'=>$dto->cedula,
            'activo' => $dto->activo,
        ]);
    }


    public function update(string $user, UserDto $dto)
    {
        $user = User::findOrFail($user);
        // die();
        $user->update([
            'usuario' => $dto->usuario,
            'email' => $dto->email,
            'primerNombre' => $dto->primerNombre,
            'segundoNombre' => $dto->segundoNombre,
            'primerApellido' => $dto->primerApellido,
            'segundoApellido' => $dto->segundoApellido,
            'idDepartamento' => $dto->idDepartamento,
            'idCargo' => $dto->idCargo,
            'activo' => $dto->activo
        ]);

        return $user;
    }
}