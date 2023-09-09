<?php
namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *     title="CreateOrUpdateProductRequest",
 *     description="Product Request",
 *     required={"name", "description", "price"},
 *     @OA\Xml(
 *         name="CreateOrUpdateProductRequest"
 *     )
 * )
 */
class CreateOrUpdateProductRequest
{
    /**
     * @OA\Property(
     *      title="name",
     *      description="Product name",
     *      example="One-Time Payment"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="description",
     *      description="Product description",
     *      example="One full week of premium services."
     * )
     *
     * @var string
     */
    public $description;

    /**
     * @OA\Property(
     *      title="price",
     *      description="Product price",
     *      example="30"
     * )
     *
     * @var float
     */
    public $price;

    /**
     * @OA\Property(
     *      title="duration",
     *      description="Product duration",
     *      example="Week"
     * )
     *
     * @var string
     */
    public $duration;

}
