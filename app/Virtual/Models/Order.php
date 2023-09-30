<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Order",
 *     description="Order Model",
 *     @OA\Xml(
 *         name="Order"
 *     )
 * )
 */
class Order
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
    public $id;

    /**
     * @OA\Property(
     *     title="user_id",
     *     description="user_id",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    public $user_id;

    /**
     * @OA\Property(
     *     title="product_id",
     *     description="product_id",
     *     format="int64",
     *     example=2
     * )
     *
     * @var integer
     */
    public $product_id;

    /**
     * @OA\Property(
     *      title="status",
     *      description="Order status",
     *      example="pending"
     * )
     *
     * @var string
     */
    public $status;

    /**
     * @OA\Property(
     *     title="total_price",
     *     description="total_price",*
     *     example=2
     * )
     *
     * @var number
     */
    public $total_price;

    /**
     * @OA\Property(
     *     title="session_id",
     *     description="session_id given by stripe api",
     *     example=2
     * )
     *
     * @var string
     */
    public $session_id;

}
