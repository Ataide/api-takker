<?php
namespace App\Virtual\Models;

/**
 * @OA\Schema(
 *     title="Profile",
 *     description="Profile data has created when the user make a registration. This property have all properties inside the Settings and Preferences",
 *     @OA\Xml(
 *         name="Profile"
 *     )
 * )
 */
class Profile
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
     *      title="Amazon Token",
     *      description="Amazon Token retrieved before login with Amazon Account",
     *      example=""
     * )
     *
     * @var string
     */
    public $amz_token;

    /**
     * @OA\Property(
     *      title="Tap interval",
     *      description="In Seconds",
     *      example="6.2"
     * )
     * @var numeric
     */
    public $tap_interval;

    /**
     * @OA\Property(
     *      title="Auto stop after crash",
     *      description="Auto stop after crash",
     *      example="false"
     * )
     * @var boolean
     */
    public $auto_stop_after_crash;

    /**
     * @OA\Property(
     *      title="Auto resume search",
     *      description="Auto resume search",
     *      example="false"
     * )
     * @var boolean
     */
    public $auto_resume_search;

    /**
     * @OA\Property(
     *      title="Offer Lead Time",
     *      description="In Minutes",
     *      example="15"
     * )
     * @var numeric
     */
    public $offer_lead_time;

    /**
     * @OA\Property(
     *      title="Mininum Base Pay Type",
     *      description="Mininum Base Pay Type",
     *      example="Per Offer"
     * )
     * @var string
     */
    public $minimum_base_paytype;

    /**
     * @OA\Property(
     *      title="Minimum Base Pay value",
     *      description="In dollars",
     *      example="15"
     * )
     * @var numeric
     */
    public $minimum_base_payvalue;

    /**
     * @OA\Property(
     *      title="Start Offer Duration",
     *      description="",
     *      example="1:00"
     * )
     * @var string
     */
    public $offer_duration_start;

    /**
     * @OA\Property(
     *      title="End Offer Duration",
     *      description="",
     *      example="2:45"
     * )
     * @var string
     */
    public $offer_duration_end;

    /**
     * @OA\Property(
     *      title="Bot Working",
     *      description="Enable bot working",
     *      example="false"
     * )
     * @var boolean
     */
    public $working;

    /**
     * @OA\Property(
     *      title="TimeZone in Profile",
     *      description="",
     *      example="America/Brasilia"
     * )
     * @var string
     */
    public $timezone;

    /**
     * @OA\Property(
     *     title="Created at",
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
     *     title="Updated at",
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
     *     title="Deleted at",
     *     description="Deleted at",
     *     example="2020-01-27 17:50:45",
     *     format="datetime",
     *     type="string"
     * )
     *
     * @var \DateTime
     */
    private $deleted_at;

}
