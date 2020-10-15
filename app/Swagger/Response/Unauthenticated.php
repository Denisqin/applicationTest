<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Не авторизован",
 *     type="object",
 *     title="Unauthenticated"
 * )
 */
class Unauthenticated
{
    /**
     * @OA\Property(
     *    title="message",
     *    description="Ошибка авторизации",
     *    format="string",
     *    example="Unauthenticated."
     * )
     *
     * @var string
     */
    public $message;
}
