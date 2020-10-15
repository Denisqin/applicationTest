<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Доступ запрещен",
 *     type="object",
 *     title="AccessDenied"
 * )
 */
class AccessDenied
{
    /**
     * @OA\Property(
     *    title="message",
     *    description="У конкретного пользователя нет доступа к методу",
     *    format="string",
     *    example="Доступ запрещен"
     * )
     *
     * @var string
     */
    public $message;
}
