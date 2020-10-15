<?php


namespace App\Swagger\Request;

/**
 * @OA\Schema(
 *     description="Параметры для авторизации",
 *     type="object",
 *     title="Auth Request"
 * )
 */
class AuthRequest
{
    /**
     * @OA\Property(
     *     title="email",
     *     description="email",
     *     format="string",
     *     example="firstexecutor@example.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="password",
     *     description="password",
     *     format="string",
     *     example="password"
     * )
     *
     * @var string
     */
    public $password;
}
