<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Модель заказа",
 *     type="object",
 *     title="Order Model"
 * )
 */
class Order
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="ID Заказа",
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
     *     description="Название заказа",
     *     format="string",
     *     example="Ремонт"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *     title="description",
     *     description="описание заказа",
     *     format="string",
     *     example="Поклеить обои"
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *     title="price",
     *     description="Стоимость",
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
     *     description="Сколько требуется часов",
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
     *     description="Статус заказа",
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
     * @OA\Property(
     *     title="accepting_end_at",
     *     description="Дата окончания принятия заявок на заказ",
     *     format="string",
     *     example="2020-02-19"
     * )
     *
     * @var string
     */
    public $accepting_end_at;

    /**
     * @OA\Property(ref="#/components/schemas/User")
     *
     * @var object
     */
    public $customer;

    /**
     * @OA\Property(ref="#/components/schemas/User")
     *
     * @var object
     */
    public $executor;
}
