<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Product\Actions\UpdateProductAction;
use App\Containers\AppSection\Product\UI\API\Requests\UpdateProductRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Patch(
 *     path="/v1/products/{id}",
 *     summary="Update a product",
 *     tags={"Product"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Parameter(
 *         name="id",
 *         in="path",
 *         required=true,
 *         description="Product ID",
 *         @OA\Schema(type="string")
 *     ),
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="description", type="string"),
 *             @OA\Property(property="price", type="number", format="float"),
 *             @OA\Property(property="stock", type="integer")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Product updated",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     ),
 *     @OA\Response(
 *         response=404,
 *         description="Product not found"
 *     )
 * )
 */
final class UpdateProductController extends ApiController
{
    public function __invoke(UpdateProductRequest $request, UpdateProductAction $action): JsonResponse
    {
        $product = $action->run($request->id, $request->sanitizeInput([
            'name',
            'description',
            'price',
            'stock',
        ]));
        return Response::create($product, ProductTransformer::class)->ok();
    }
}
