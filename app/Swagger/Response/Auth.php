<?php


namespace App\Swagger\Response;

/**
 * @OA\Schema(
 *     description="Авторизация",
 *     type="object",
 *     title="Auth Response"
 * )
 */
class Auth
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
     *     title="token",
     *     description="Токен",
     *     format="string",
     *     example="eyJ0eXAiOiJKV1QiLCJhtestSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMzBiZjg0MDM1NDY3MGE5OWI2ZDAwODVlMDNhMTE0YmNhYWU5ZWYtestYxNTgyNjUxYzA2NGQ1NWJjOWZmNmMyZmFjNTFiZDIiLCJpYXQiOjE1ODI3ODQwNDQsIm5iZiI6MtestNCwiZXhwIjoxNjE0NDA2NDQ0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.FvVt19HB0JUqbGKLDaKL7s1VxctqLw2AdqLJqUq3NzOMGzBaRfoqeFKJPwelUeQTheQuFkeM-G-94UxhrSn8QfNUxWy_ATL6xI720y6Vgp14VAu8E3oCzUmei086n5hx8gEGWIrzbfBtCPjBKiHxUv10vbtYZigFMBQlbgAtestqAGWBoP6VIRabYGO3RtPGP_mZbca89jISnBkKpXYiMbOlkt64Ae_PHdnGJa5EShKntu3zddwUhsX7T9EnSXmOWrJMzuQnTYo1DUsB1cfeizIwUvqqW3QDTHie5G_qWicU5_UeV6AZ4O1IMsUXogbfu-qlddtest4O61R2JTKrCZZhpwfCbe_eJxnb_63JJFXxsqUSqp7FEceQUYLxp5lZ1jQkKmmo_DcqFX1vMap4hcKVkNuu3tauw3TiZjHJM7tZJL6b_wUc7_Ua0MhYBPe7CcfN2D2Y1LBtestv2SVs16GGGHjigzf-zUWSaTbSE_QNqPkcg7Jk5WUX-4QoIpIaX5FRrzZbcvCIkKBJBCaAxFXOLae-cYjFoBU5DYg8JnrfK-uBoiVvJLZKlJG34CH8MFV8sjz8testoFdoN7Zku_PXTR3UD_pKi3xNiO04ZhVVOARMhWcFnfz0z4wn4YJK4nSF0zx7abkh04IEW7U"
     * )
     *
     * @var string
     */
    public $token;
}
