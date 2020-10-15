<?php


namespace App\Swagger\Request;

/**
 * @OA\Schema(
 *     description="Параметры для заказа",
 *     type="object",
 *     title="Order Request"
 * )
 */
class BidRequest
{
    /**
     * @OA\Property(
     *     title="order_id",
     *     description="id Заказа (ИСПОЛЬЗУЕТСЯ В МЕТОДЕ СОЗДАНИЯ)",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $order_id;

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
}
