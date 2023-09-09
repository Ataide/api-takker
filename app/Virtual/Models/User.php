<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="User",
 *     description="User model",
 *     @OA\Xml(
 *         name="User"
 *     )
 * )
 */
class User
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
     *     title="Username",
     *     description="Username",
     *     format="int64",
     *     example="John Doe"
     * )
     *
     * @var string
     */
    public $name;

    /**
     * @OA\Property(
     *      title="User Email",
     *      description="Email address",
     *      example="user@example.com"
     * )
     *
     * @var string
     */
    public $email;

    /**
     * @OA\Property(
     *      title="Email verified",*
     *      example="null"
     * )
     *
     * @var \DateTime
     */
    public $email_verified_at;

    /**
     * @OA\Property(
     *     title="CreatedAt",
     *     description="Created at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $created_at;

    /**
     * @OA\Property(
     *     title="UpdatedAt",
     *     description="Updated at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @OA\Property(
     *     title="UserProfile",
     *     description="Profile data has created when the user make a registration. This property have all properties inside the Settings and Preferences, and "
     * )
     *
     * @var \App\Virtual\Models\Profile
     */
    public $profile;

    /**
     * @OA\Property(
     *     title="AmazonTokens",
     *     description=""
     * )
     *
     *
     * @var \App\Virtual\Models\AmzTokens[]
     */
    public $amz_tokens;

}
