<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
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

    public function add($product_id)
    {
        $cart = new Cart;
        $user = Auth::user();
        $cart->user_id = 1;
        $cart->product_id = $product_id;
        $cart->save();
        return response()->json(['message'=>'Product added'], 201);
    }

    public function delete($product)
    {
        $product = Product::find($id);

    }


}
