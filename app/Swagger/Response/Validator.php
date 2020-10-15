<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Валидация",
 *     type="object",
 *     title="Validator"
 * )
 */
class Validator
{
    /**
     * @OA\Property(
     *    title="message",
     *    description="Ошибка валидации",
     *    format="string",
     *    example="The given data was invalid."
     * )
     *
     * @var string
     */
    public $message;
}
