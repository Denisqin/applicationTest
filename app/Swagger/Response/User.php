<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Модель пользователя",
 *     type="object",
 *     title="User Model"
 * )
 */
class User
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="ID пользователя",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     title="name",
     *     description="Имя пользователя",
     *     format="string",
     *     example="Ivan"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="email",
     *     description="email он же логин",
     *     format="string",
     *     example="example@example.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *     title="created_at",
     *     description="Дата и время создания",
     *     format="string",
     *     example="2020-02-19 09:28:57"
     * )
     *
     * @var string
     */
    public $created_at;

    /**
     * @OA\Property(
     *     title="updated_at",
     *     description="Дата и время обновления",
     *     format="string",
     *     example="2020-02-19 09:28:57"
     * )
     *
     * @var string
     */
    public $updated_at;

    /**
     * @OA\Property(
     *     title="role",
     *     description="Роль",
     *     format="string",
     *     example="customer(заказчик)/ executor(исполнитель)"
     * )
     *
     * @var string
     */
    public $role;
}
