<?php


namespace App\Swagger\Request;

/**
 * @OA\Schema(
 *     description="Параметры для заказа",
 *     type="object",
 *     title="Order Request"
 * )
 */
class OrderRequest
{
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
     * @OA\Property(
     *     title="status",
     *     description="Статус (consideration, completed). ИСПОЛЬЗУЕТСЯ ТОЛЬКО ДЛЯ МЕТОДА ОБНОВЛЕНИЯ",
     *     format="string",
     *     example="completed"
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *     title="executor_id",
     *     description="ID исполнителя для назначения на заказ.  ИСПОЛЬЗУЕТСЯ ТОЛЬКО ДЛЯ МЕТОДА ОБНОВЛЕНИЯ",
     *     format="integer",
     *     example=1
     * )
     *
     * @var integer
     */
    public $executor_id;
}
