<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Модель заявки",
 *     type="object",
 *     title="Bid Model"
 * )
 */
class Bid
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="ID заявки",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $id;

    /**
     * @OA\Property(
     *     title="description",
     *     description="описание",
     *     format="string",
     *     example="Поклею обои, стаж 2 года"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="price",
     *     description="Предложите свою стоимость",
     *     format="string",
     *     example="5250"
     * )
     *
     * @var string
     */
    public $price;

    /**
     * @OA\Property(
     *     title="timelimit",
     *     description="Предложите свое время",
     *     format="string",
     *     example="5"
     * )
     *
     * @var string
     */
    public $timelimit;

    /**
     * @OA\Property(
     *     title="status",
     *     description="Статус заявки",
     *     format="string",
     *     example="completed"
     * )
     *
     * @var string
     */
    public $status;

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
     * @OA\Property(ref="#/components/schemas/Order")
     *
     * @var object
     */
    public $order;

    /**
     * @OA\Property(ref="#/components/schemas/User")
     *
     * @var object
     */
    public $executor;
}
