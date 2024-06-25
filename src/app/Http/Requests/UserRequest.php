<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class UserRequest extends FormRequest
{
    public function rules(): array
    {
           // Obtenemos el id del usuario a editar
           $id = $this->route('user');

           // Definimos las reglas de validación
           $rules = [
               'usuario' => ['required', 'max:80'],
               'email' => ['required', 'email', 'unique:users,email,' . $id],
               'primerNombre' => ['required', 'max:80'],
               'segundoNombre' => ['required', 'max:80'],
               'primerApellido' => ['required', 'max:80'],
               'segundoApellido' => ['required', 'max:80'],
               'idDepartamento' => ['required', 'max:80'],
               'idCargo' => ['required', 'max:80'],
               'cedula' => ['required', 'max:10'],
               'activo' => [''],
           ];
   
           // Si la petición es para editar un usuario
           if ($this->isMethod('put')) {
               // Quitamos la regla 'required' del campo 'email' para permitir que esté vacío si no se modifica
               $rules['email'] = ['email', 'unique:users,email,' . $id];
           }
   
           return $rules;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ValidationException($validator, response()->json($validator->errors(), 422));
    }
}