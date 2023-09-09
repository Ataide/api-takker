<?php
namespace App\Virtual\Resources;

/**
 * @OA\Schema(
 *     title="UserProfileResource",
 *     description="UserProfile resource",
 *     @OA\Xml(
 *         name="UserProfileResource"
 *     )
 * )
 */
class UserProfileResource
{

    /**
     * @OA\Property(
     *     title="data",
     *     description="Data wrapper"
     * )
     *
     * @var \App\Virtual\Models\User[]
     */
    private $data;

}
