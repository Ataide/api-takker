<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="AmzTokens",
 *     description="A amazon token taken from the Bot.",
 *     @OA\Xml(
 *         name="AmzTokens"
 *     )
 * )
 */
class AmzTokens
{
    /**
     * @OA\Property(
     *      title="Amazon Token",
     *      description="",
     *      example=""
     * )
     *
     * @var string
     */
    public $amz_token;

    /**
     * @OA\Property(
     *      title="Amazon Refresh Token",
     *      description="",
     *      example=""
     * )
     *
     * @var string
     */
    public $amz_refresh_token;
}
