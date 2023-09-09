<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Product",
 *     description="Product Model",
 *     @OA\Xml(
 *         name="Product"
 *     )
 * )
 */
class Product
{
    /**
     * @OA\Property(
     *     title="id",
     *     description="id",
     *     format="int64",
     *     example=1
     * )
     *
     * @var integer
     */
    private $id;

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
