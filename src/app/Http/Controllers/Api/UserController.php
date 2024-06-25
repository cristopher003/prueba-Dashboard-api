<?php

namespace App\Http\Controllers\Api;

use App\Dtos\UserDto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\UserService;
use Exception;
use Illuminate\Validation\ValidationException;


class UserController extends Controller
{

    public function __construct(
        protected UserService $service
    )
    {}

    public function index()
    {
        return $this->service->index();
    }

    public function show($id)
    {
        return $this->service->show($id);
    }


    public function store(UserRequest $request)
    {
        try {
            $user = $this->service->store(
                UserDto::fromApiRequest($request),
            );

          
             return UserResource::make($user);

        } catch (ValidationException $e) {
            // Si la validación falla, devuelve los errores en formato JSON
            return response()->json($e->errors(), 422);
        }catch(Exception $e){
            return response()->json(['error' => 'Error temporal','msg'=>$e->getMessage()], 422);
        }
    }

    public function update(UserRequest $request,string $user)
    {
        $user = $this->service->update(
            $user,
            UserDto::fromApiRequest($request),
        );

        return UserResource::make($user);
    }


    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update(['activo' => false]);

        return UserResource::make($user);
    }
}
