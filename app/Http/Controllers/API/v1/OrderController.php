<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\OrderStatus\Published;
use App\Helpers\OrderStatus\Waiting;
use App\Http\Controllers\Controller;
use App\Http\Requests\Order\GetForExecutor;
use App\Http\Requests\Order\IndexRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Http\Resources\Order\OrderCollection;
use App\Http\Resources\Order\Order as OrderResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * @OA\Get(
     *     path="/executors/orders",
     *     operationId="GetForExecutor",
     *     tags={"Order"},
     *     summary="Список заказов для исполнителя",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибка валидации",
     *         @OA\JsonContent(ref="#/components/schemas/Validator")
     *     ),
     *     @OA\Parameter(
     *         description="1) Видит все заказы (Не добавлять в запрос),
    2) Может видеть Заказы на которые он подал заявки (filter = submitted),
    3) Может видеть Заказы на исполнение (filter = inWork)",
     *         in="path",
     *         name="filter",
     *         required=false,
     *         @OA\Schema(
     *           type="string"
     *         ),
     *         example="submitted"
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @param GetForExecutor $request
     * @return OrderCollection
     */
    public function getForExecutor(GetForExecutor $request): OrderCollection
    {
        return Order::getForExecutor($request);
    }

    /**
     * @OA\Get(
     *     path="/orders",
     *     operationId="Index",
     *     tags={"Order"},
     *     summary="Список заказов",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибка валидации",
     *         @OA\JsonContent(ref="#/components/schemas/Validator")
     *     ),
     *     @OA\Parameter(
     *         description="accepting = Прием заявок,
    consideration = Рассмотрение заявок,
    waiting = Ожидание исполнения заказа,
    completed = Завершен",
     *         in="path",
     *         name="filter",
     *         required=false,
     *         @OA\Schema(
     *           type="string"
     *         ),
     *         example="accepting"
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @param IndexRequest $request
     * @return OrderCollection
     */
    public function index(IndexRequest $request): OrderCollection
    {
        return Order::filterCollection($request);
    }

    /**
     * @OA\Post(
     *     path="/orders",
     *     operationId="Store",
     *     tags={"Order"},
     *     summary="Создание заказа",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибка валидации",
     *         @OA\JsonContent(ref="#/components/schemas/Validator")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OrderRequest")
     *     )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return OrderResource
     */
    public function store(StoreRequest $request): OrderResource
    {
        $order = $request->user()->orders()->create($request->validated());
        $order->changeStatus(new Published);
        return new OrderResource($order);
    }

    /**
     * @OA\Get(
     *     path="/orders/{order}",
     *     operationId="Show",
     *     tags={"Order"},
     *     summary="Просмотр конкретного заказа",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     )
     * )
     *
     * Display the specified resource.
     *
     * @param Order $order
     * @return OrderResource
     */
    public function show(Order $order): OrderResource
    {
        return new OrderResource($order);
    }

    /**
     * @OA\Put(
     *     path="/orders/{order}",
     *     operationId="Update",
     *     tags={"Order"},
     *     summary="Редактирование заказа",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Order")
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Ошибка валидации",
     *         @OA\JsonContent(ref="#/components/schemas/Validator")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/OrderRequest")
     *     )
     * )
     *
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Order $order
     * @return OrderResource
     */
    public function update(UpdateRequest $request, Order $order): OrderResource
    {
        $order->update($request->validated());

        if (isset($request['status'])) {
            $order->userChangeStatus($request['status']);
        }

        if (isset($request['executor_id'])) {
            $order->changeStatus(new Waiting);
        }
        return new OrderResource($order);
    }

    /**
     * @OA\Delete(
     *     path="/orders/{order}",
     *     operationId="Destroy",
     *     tags={"Order"},
     *     summary="Удаление заказа",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Удалено"
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthenticated.",
     *         @OA\JsonContent(ref="#/components/schemas/Unauthenticated")
     *     ),
     *     @OA\Response(
     *         response="403",
     *         description="AccessDenied",
     *         @OA\JsonContent(ref="#/components/schemas/AccessDenied")
     *     )
     * )
     *
     * Remove the specified resource from storage.
     * @param Order $order
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Order $order)
    {
        return response($order->delete(), 200);
    }
}
