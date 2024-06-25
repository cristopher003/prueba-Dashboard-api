<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
      
        return [
            'id' => $this->id,
            'usuario' => $this->usuario ,
            'email' => $this->email ,
            'primerNombre' => $this->primerNombre ,
            'segundoNombre' => $this->segundoNombre ,
            'primerApellido' => $this->primerApellido ,
            'segundoApellido' =>$this->segundoApellido  ,
            'idDepartamento' => $this->idDepartamento ,
            'idCargo' =>$this->idCargo,
            'cedula' => $this->cedula ,
            'activo' =>$this->activo  ,
         ];
    }
}