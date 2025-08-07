<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Product\Actions\CreateProductAction;
use App\Containers\AppSection\Product\UI\API\Requests\CreateProductRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;


/**
 * @OA\Post(
 *     path="/v1/products",
 *     summary="Create a new product",
 *     tags={"Product"},
 *     security={{"bearerAuth":{}}},
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             required={"name","description","price","stock"},
 *             @OA\Property(property="name", type="string"),
 *             @OA\Property(property="description", type="string"),
 *             @OA\Property(property="price", type="number", format="float"),
 *             @OA\Property(property="stock", type="integer")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Product created",
 *         @OA\JsonContent(ref="#/components/schemas/Product")
 *     )
 * )
 */
final class CreateProductController extends ApiController
{
    public function __invoke(CreateProductRequest $request, CreateProductAction $action): JsonResponse
    {
        $product = $action->run($request->sanitizeInput([
            'name',
            'description',
            'price',
            'stock',
        ]));
        return Response::create($product, ProductTransformer::class)->created();
    }
}
