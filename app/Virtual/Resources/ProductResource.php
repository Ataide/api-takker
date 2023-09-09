<?php
namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="ProductResource",
 *     description="UserProfile resource",
 *     @OA\Xml(
 *         name="ProductResource"
 *     )
 * )
 */
class ProductResource
{
    /**
     * @OA\Property(
     *     title="message",
     *     description="Simple message from api.",
     *     example="Success operation"
     * )
     *
     * @var string
     */
    private $message;

    /**
     * @OA\Property(
     *     title="data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\Product[]
     */
    private $data;

}
