<?php

namespace App\Containers\AppSection\Product\UI\API\Controllers;

use Apiato\Support\Facades\Response;
use App\Containers\AppSection\Product\Actions\GetAllProductsAction;
use App\Containers\AppSection\Product\UI\API\Requests\ListProductsRequest;
use App\Containers\AppSection\Product\UI\API\Transformers\ProductTransformer;
use App\Ship\Parents\Controllers\ApiController;
use Illuminate\Http\JsonResponse;

/**
 * @OA\Info(
 *     title="Apiato API Documentation",
 *     version="1.0.0",
 *     description="Swagger UI for testing Apiato APIs"
 * )
 *
 * @OA\Server(
 *     url="http://localhost",
 *     description="Local server"
 * )
 *
 * @OA\SecurityScheme(
 *     securityScheme="bearerAuth",
 *     type="http",
 *     scheme="bearer",
 *     bearerFormat="JWT"
 * )
 *
 * @OA\Get(
 *     path="/v1/products",
 *     summary="List all products",
 *     tags={"Product"},
 *     security={{"bearerAuth":{}}},
 *     @OA\Response(
 *         response=200,
 *         description="Successful operation",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/Product"))
 *         )
 *     )
 * )
 */
final class ListProductsController extends ApiController
{
    public function __invoke(ListProductsRequest $request, GetAllProductsAction $action): JsonResponse
    {
        try {
            $products = $action->run();
            return Response::create($products, ProductTransformer::class)->ok();
        } catch (\Throwable $th) {
            return Response::error($th->getMessage(), $th->getCode() ?: 500);
            
        }
      
    }
}
