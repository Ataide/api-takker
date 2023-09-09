<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserSyncRequest;
use App\Models\AmzTokens;
use App\Models\Profile;
use Auth;
use Illuminate\Http\Request;
use Response;

class UserProfile extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/me",*
     *      tags={"Profile"},
     *      summary="Get user profile",
     *      description="Returns user profile",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/User")
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function index()
    {
        $user = Auth::user();
        $user_profile = $user->load(['profile', 'amz_tokens']);
        return $user_profile;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/update-profile",
     *     operationId="update",
     *     tags={"Profile"},
     *     summary="Update a current user profile and Settings",
     *      @OA\RequestBody(
     *          required=false,
     *          @OA\JsonContent(ref="#/components/schemas/UpdateProfileRequest")
     *      ),
     *      @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="String",
     *               example="Profile updated successfully"),*
     *          )
     *       ),
     *       @OA\Response(
     *          response=422, description="Validation errors",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="integer",
     *               example="The tap interval field must be a number."),
     *             @OA\Property(
     *               property="errors",
     *               type="object",
     *               @OA\Property(
     *                  property="tap_interval",
     *                  type="array",
     *                      @OA\Items(example="The tap interval field must be a number")
     *               )
     *             )
     *          )
     *       ),
     *
     * )
     */
    public function update(UpdateProfileRequest $request)
    {
        $request->validated();

        $user = Auth::user();

        $profile = Profile::where('user_id', $user->id)->first();

        $profile->fill($request->validated());

        $profile->save();

        return Response::json(["message" => "Profile updated successfully"]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * @OA\Post(
     *     path="/api/amz-sync",
     *     tags={"Amazon Sync"},
     *     summary="User sync with amazon account",
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(
     *              title="body",
     *              required={"link"},
     *            @OA\Property(
     *              property="link",
     *              type="string",
     *              example="Magical link from Amazon account"),
     *          )
     *      ),
     *     @OA\Response(
     *          response=200, description="Success",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="string",
     *               example="Amazon Sync successfully"),*
     *          )
     *     ),
     *     @OA\Response(
     *          response=422, description="Validation errors",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               title="url",
     *               type="integer",
     *               example="The link field is required."),
     *             @OA\Property(
     *               property="errors",
     *               type="object",
     *               @OA\Property(
     *                  property="link",
     *                  type="array",
     *                      @OA\Items(example="The link field is required.")
     *               )
     *             )
     *        )
     *      ),
     * )
     */
    public function sync(UserSyncRequest $request)
    {
        $request->validated();

        $link = $request->input('link');

        $amzTokens = new AmzTokens();

        $fake_response = ['amzToken' => 'amzTokenFakeFromRequest', "amzRefreshToken" => "amzRefreshTokenFakeFromRequest"];

        $amzTokens->amz_token = $fake_response['amzToken'];
        $amzTokens->amz_refresh_token = $fake_response['amzRefreshToken'];
        $amzTokens->user_id = Auth::user()->id;
        $amzTokens->save();

        return Response::json(['success' => "Successfully", "link" => $link, 'amzTokens' => $amzTokens]);
    }
}
