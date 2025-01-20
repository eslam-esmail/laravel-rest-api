<?php

namespace App\Http\Controllers;

use App\Http\Actions\Product\ListProductsAction;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request, ListProductsAction $listProductsAction): \Illuminate\Http\Resources\Json\AnonymousResourceCollection
    {
        $products = $listProductsAction->execute($request);

        return ProductResource::collection($products);
    }
}
