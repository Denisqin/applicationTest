<?php


namespace App\Swagger\Request;


/**
 * @OA\Schema(
 *     description="Параметры для получения заказов исполнителя",
 *     type="object",
 *     title="GetForExecutor"
 * )
 */
class GetForExecutor
{
    /**
     * @OA\Property(
     *     title="filter",
     *     description="1) Видит все заказы (Не добавлять в запрос),
    2) Может видеть Заказы на которые он подал заявки (filter = submitted),
    3) Может видеть Заказы на исполнение (filter = inWork)",
     *     format="string",
     *     example="submitted/ inWork"
     * )
     *
     * @var string
     */
    public $filter;
}
