<?php

namespace App\Dtos;

use App\Http\Requests\UserRequest;
use Exception;

class UserDto
{

    public function __construct(
        public readonly string $usuario,
        public readonly string $email,
        public readonly string $primerNombre,
        public readonly string $segundoNombre,
        public readonly string $primerApellido,
        public readonly string $segundoApellido,
        public readonly string $idDepartamento,
        public readonly string $idCargo,
        public readonly string $cedula,
        public readonly bool $activo,

    )
    {
    }

    public static function fromApiRequest(UserRequest $request): UserDto
    {
        // var_dump($request);
        try {
            return  new self(
                usuario: $request->validated('usuario'),
                email: $request->validated('email'),
                primerNombre: $request->validated('primerNombre'),
                segundoNombre: $request->validated('segundoNombre'),
                primerApellido: $request->validated('primerApellido'),
                segundoApellido: $request->validated('segundoApellido'),
                idDepartamento: $request->validated('idDepartamento'),
                idCargo: $request->validated('idCargo'),
                cedula: $request->validated('cedula'),
                activo: $request->validated('activo')
            );
        } catch(Exception $e){
            return response()->json(['error' => 'Error temporal','msg'=>$e->getMessage()], 422);
        }
    }
}