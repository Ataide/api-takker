<?php

namespace App\Http\Controllers\Api;

use App\Enums\OrderStatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckoutRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UserSyncRequest;
use App\Models\AmzTokens;
use App\Models\Order;
use App\Models\Product;
use App\Models\Profile;
use Auth;
use Http;
use Illuminate\Http\Request;
use Response;
use Stripe\Stripe;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        $user_profile = $user->load(['profile']);
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

        $bot_response = Http::post('https://amazon-bot.natanieldev.space/client/register', [
            'link' => $link,
        ]);

        $jsonData = $bot_response->json();

        $amzTokens->amz_token = $jsonData['amzAccessToken'];
        $amzTokens->amz_refresh_token = $jsonData['amzRefreshToken'];
        $amzTokens->user_id = Auth::user()->id;
        $amzTokens->save();

        return Response::json(['success' => "Successfully", "link" => $link, 'amzTokens' => $amzTokens]);
    }

    public function checkout(CheckoutRequest $request)
    {
        $request->validated();

        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));

        $product_id = request()->only('product_id');

        $user = Auth::user();

        $product = Product::find($product_id)->first();

        $lineItems = [];

        $lineItems[] = [
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => $product->name,
                    'description' => $product->description,

                ],
                'unit_amount' => $product->price * 100,
            ],
            'quantity' => 1,
        ];

        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => route('checkout.success', [], true) . "?session_id={CHECKOUT_SESSION_ID}",
            'cancel_url' => route('checkout.cancel', [], true),
        ]);

        $order = new Order();
        $order->user_id = $user->id;
        $order->product_id = $product->id;
        $order->status = OrderStatusEnum::Pending;
        $order->total_price = $product->price;
        $order->session_id = $session->id;
        $order->save();

        return Response::json(['message' => "Successfully", "url" => $session->url]);

    }

    public function success(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET_KEY'));
        $sessionId = $request->get('session_id');

        try {
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            if (!$session) {
                throw new NotFoundHttpException();
            }

            $order = Order::where('session_id', $session->id)->first();
            if (!$order) {
                throw new NotFoundHttpException();
            }

            if ($order->status === OrderStatusEnum::Pending) {
                $order->status = OrderStatusEnum::Active;
                $order->save();
            }

            return Response::json(['message' => "Successfully", "session_id" => $session->id, "payment_status" => $session->payment_status, 'status' => $session->status]);

            // return view('product.checkout-success', compact('customer'));
        } catch (\Exception $e) {
            throw new NotFoundHttpException();
        }

    }

    public function cancel()
    {

    }
}
