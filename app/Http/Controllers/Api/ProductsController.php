<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Api\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ProductsController extends Controller
{
    public function index()
    {
        foreach (Product::all() as $product) {
            return response()->json([
                "id"=>$product->id,
                "name"=>$product->name,
                "description"=>$product->description,
                "price"=>$product->price,

            ]);
        }
    }

   
    
    public function store(Request $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return response()->json(['id' => $product->id, 'message'=>'Product added']);
    }
        
    

    public function delete(Request $request, $id)
    {
        $product = Product::find($id);
        $product->delete();
        return response()->json([
        "message"=> 'Product removed',

]);
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();
        return response()->json([
            "id"=>$product->id,
            "name"=>$product->name,
            "description"=>$product->description,
            "price"=>$product->price,
        
    ]);
    }
}
