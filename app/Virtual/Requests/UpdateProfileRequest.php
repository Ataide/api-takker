<?php

namespace App\Virtual\Requests;

/**
 * @OA\Schema(
 *      title="UpdateProfileRequest",
 *      description="Update Profile request body data",
 *      @OA\Xml(
 *         name="UpdateProfileRequest"
 *     )
 * )
 */
class UpdateProfileRequest
{
    /**
     * @OA\Property(
     *      title="Amazon Token",
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
     * @var float
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
     * @var number
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
     * @var number
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

}
