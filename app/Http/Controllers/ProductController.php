<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/products",*
     *      tags={"Products"},
     *      summary="Get products list",
     *      description="Returns a list of products",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              ref="#/components/schemas/ProductResource",*
     *            )
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
        $products = Product::all();

        return response()->json(
            ["message" => "Success operation", "data" => $products],
            Response::HTTP_OK
        );

    }

    /**
     * @OA\Post(
     *     path="/api/products",
     *     operationId="storeProduct",
     *     tags={"Products"},
     *     summary="Create a new product.",
     *      @OA\RequestBody(
     *          required=false,
     *          @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateProductRequest")
     *      ),
     *      @OA\Response(
     *          response=201, description="Product created successfully",
     *          @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="String",
     *               example="Product created successfully"),
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
     * )
     */
    public function store(CreateOrUpdateProductRequest $request)
    {
        $this->authorize('store', Product::class);

        $fields = $request->validated();
        $product = Product::create($fields);

        return response()->json(
            ["message" => "Product successfully created", "data" => $product],
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * @OA\Put(
     *      path="/products/{id}",
     *      operationId="updateProduct",
     *      tags={"Products"},
     *      summary="Update existing product",
     *      description="Returns updated product data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CreateOrUpdateProductRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *         @OA\JsonContent(
     *             @OA\Property(
     *               property="message",
     *               type="string",
     *               example="Product successfully updated"
     *             ),
     *             @OA\Property(
     *               property="data",
     *               type="object",
     *               ref="#/components/schemas/Product",
     *             )
     *          )
     *       ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function update(CreateOrUpdateProductRequest $request, Product $product)
    {
        $this->authorize('update', $product);

        $fields = $request->validated();
        $product->update($fields);

        return response()->json(
            ['message' => "Product successfully updated", "data" => $product],
            Response::HTTP_OK
        );
    }

    /**
     * @OA\Delete(
     *      path="/products/{id}",
     *      operationId="deleteProduct",
     *      tags={"Products"},
     *      summary="Delete existing product",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Product id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(Product $product)
    {
        $this->authorize('delete', $product);

        $product->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
