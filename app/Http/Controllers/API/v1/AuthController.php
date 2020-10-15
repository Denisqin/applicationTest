<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/login",
     *     operationId="SignIn",
     *     tags={"Auth"},
     *     summary="авторизация",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Успешная авторизация",
     *         @OA\JsonContent(ref="#/components/schemas/Auth")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибка валидации",
     *         @OA\JsonContent(ref="#/components/schemas/Validator")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/AuthRequest")
     *     )
     * )
     *
     * @param LoginRequest $request
     * @return UserResource|\Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $user = Auth::user();
            $user['token'] = $user->createToken('application')->accessToken;
            return new UserResource($user);
        } else {
            $data = [
                'status' => false,
                'message' => 'Неверные даннные',
            ];
            return response()->json($data, 422);
        }
    }
}
