<?php
namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="AuthRegisterRequest",
 *      description="Register request body data",
 *      @OA\Xml(
 *         name="AuthRegisterRequest"
 *     )
 * )
 */
class AuthRegisterRequest
{

    /**
     * @OA\Property(
     *      title="name",
     *      example="John Doe",
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="email",
     *      example="john@example.com",
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      example="123456"
     * )
     *
     * @var string
     */
    public $password;

    /**
     * @OA\Property(
     *      title="password_confirmation",
     *      example="123456"
     * )
     *
     * @var string
     */
    public $password_confirmation;

}
