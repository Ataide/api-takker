<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="AuthLoginRequest",
 *      description="Login request body data",
 *      required={"email", "password"},
 *      @OA\Xml(
 *         name="AuthLoginRequest"
 *     )
 * )
 */
class AuthLoginRequest
{

    /**
     * @OA\Property(
     *      title="email",
     *      example="john@example.com",
     *
     *
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="password",
     *      example="123456",
     *
     * )
     *
     * @var string
     */
    public $password;

}
