<?php


namespace App\Swagger;

/**
 * @OA\Info(
 *    title="Биг намбрз",
 *    version="1.0.0",
 * )
 * @OA\Tag(
 *     name="Auth",
 *     description="Авторизация"
 * )
 * @OA\Tag(
 *     name="Order",
 *     description="Заказы"
 * )
 * @OA\Tag(
 *     name="Bid",
 *     description="Заявки"
 * )
 * @OA\Server(
 *     description="API Server",
 *     url="http://localhost/api"
 * )
 * @OA\SecurityScheme(
 *     type="apiKey",
 *     in="header",
 *     name="Authorization",
 *     securityScheme="Authorization",
 * )
 */

class MainInfo
{

}
