<?php

namespace App\Http\Controllers\API\v1;

use App\Helpers\BidStatus\Submitted;
use App\Http\Controllers\Controller;
use App\Http\Requests\Bid\IndexRequest;
use App\Http\Requests\Bid\StoreRequest;
use App\Http\Requests\Bid\UpdateRequest;
use App\Http\Resources\Bid\Bid as BidResource;
use App\Http\Resources\Bid\BidCollection;
use App\Models\Bid;

class BidController extends Controller
{
    /**
     * @OA\Get(
     *     path="/bids",
     *     operationId="Index",
     *     tags={"Bid"},
     *     summary="Список заявок",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Bid")
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
     *     )
     * )
     *
     * Display a listing of the resource.
     *
     * @param IndexRequest $request
     * @return BidCollection
     */
    public function index(IndexRequest $request): BidCollection
    {
        return new BidCollection($request->user()->bids);
    }

    /**
     * @OA\Post(
     *     path="/bids",
     *     operationId="Store",
     *     tags={"Bid"},
     *     summary="Создание заявки",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Bid")
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
     *         @OA\JsonContent(ref="#/components/schemas/BidRequest")
     *     )
     * )
     *
     * Store a newly created resource in storage.
     *
     * @param StoreRequest $request
     * @return BidResource
     */
    public function store(StoreRequest $request): BidResource
    {
        $bid = $request->user()->bids()->create($request->validated());
        $bid->changeStatus(new Submitted);
        return new BidResource($bid);
    }

    /**
     * @OA\Get(
     *     path="/bids/{bid}",
     *     operationId="Show",
     *     tags={"Bid"},
     *     summary="Просмотр конкретной заявки",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Bid")
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
     * @param Bid $bid
     * @return BidResource
     */
    public function show(Bid $bid): BidResource
    {
        return new BidResource($bid);
    }

    /**
     * @OA\Put(
     *     path="/bids/{bid}",
     *     operationId="Update",
     *     tags={"Bid"},
     *     summary="Редактирование заявки",
     *     security={{"Authorization": {}}},
     *     @OA\Response(
     *         response="200",
     *         description="Список объектов",
     *         @OA\JsonContent(ref="#/components/schemas/Bid")
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
     *         @OA\JsonContent(ref="#/components/schemas/BidRequest")
     *     )
     * )
     *
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Bid $bid
     * @return BidResource
     */
    public function update(UpdateRequest $request, Bid $bid): BidResource
    {
        $bid->update($request->validated());
        return new BidResource($bid);
    }

    /**
     * @OA\Delete(
     *     path="/bids/{bid}",
     *     operationId="Destroy",
     *     tags={"Bid"},
     *     summary="Удаление заявки",
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
     * @param Bid $bid
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Bid $bid)
    {
        return response($bid->delete(), 200);
    }
}
