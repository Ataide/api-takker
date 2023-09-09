<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    /**
     * @OA\Post(
     *     path="/api/register",
     *     tags={"Authentication"},
     *     summary="Register a new user",*
     *     @OA\Parameter(
     *         name="name",
     *         in="query",
     *         description="User's name",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *      @OA\Parameter(
     *         name="password_confirmation",
     *         in="query",
     *         description="User's password confirmation",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AuthRegisterRequest")
     *      ),
     *
     *
     *     @OA\Response(
     *          response="201",
     *          description="User registered successfully",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="token",
     *               type="string",
     *               example="This field is a token that will be used to authenticate"
     *             ),
     *             @OA\Property(
     *               property="user",
     *               type="App\Virtual\Models\User",*
     *             ),
     *          )),
     *     @OA\Response(
     *          response=422,
     *          description="Validation errors",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="integer",
     *               example="The email has already been taken."),
     *             @OA\Property(
     *               property="errors",
     *               type="object",
     *               @OA\Property(
     *                  property="email",
     *                  type="array",
     *                      @OA\Items(example="The email has already been taken.")
     *               )
     *             )
     *          )
     *       ),
     * )
     */
    public function register(Request $request): JsonResponse
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user_profile = Profile::create(['user_id' => $user->id]);

        Auth::login($user);

        $token = $user->createToken('api-takker-token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ], 201);

    }

    /**
     * @OA\Post(
     *     path="/api/login",
     *     tags={"Authentication"},
     *     summary="Login a user with credentials",*
     *
     *     @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="User's email",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *     @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="User's password",
     *         required=true,
     *         @OA\Schema(type="string")
     *     ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/AuthLoginRequest")
     *      ),
     *
     *      @OA\Response(
     *          response="200",
     *          description="User authentication successfully",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="token",
     *               type="string",
     *               example="This field is a token that will be used to authenticate"
     *             ),
     *             @OA\Property(
     *               property="user",
     *               type="App\Virtual\Models\User",*
     *             ),
     *          )),
     *          @OA\Response(
     *              response=422,
     *              description="Validation errors",
     *              @OA\JsonContent(
     *                  @OA\Property(
     *                      property="message",
     *                      type="integer",
     *                      example="These credentials do not match our records."),
     *                  @OA\Property(
     *                      property="errors",
     *                      type="object",
     *                  @OA\Property(
     *                      property="email",
     *                      type="array",
     *                      @OA\Items(example="These credentials do not match our records.")
     *               )
     *             )
     *          )
     *       ),
     * )
     */
    public function login(LoginRequest $request): JsonResponse
    {
        $request->authenticate();

        $user = $request->user();

        $user->tokens()->delete();

        $token = $user->createToken('api-takker-token');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
