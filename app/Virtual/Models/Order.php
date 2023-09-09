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

    public $user;
    
    /**
     * @OA\Property(
     *      title="duration",
     *      description="Product duration",
     *      example="Week"
     * )
     *
     * @var string
     */
    public $status;

    public $total_price;

    public $session_id;

}
