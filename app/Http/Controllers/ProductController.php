<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $request){
        $ValidatedProduct = $request -> validate([
        'category_id' => 'required|exists:categories,id',
        'name'=>'required|string',
        'description'=>'required|string',
        'price'=>'required|numeric|min:0',
        'stock'=>'required|integer|min:0'
        ]);
        $product = Product::create($ValidatedProduct);
        return $product;
    }

    public function show(Product $product){
        return $product;
    }

    public function update(Request $request,Product $product){
        $ValidatedUpdateParams = $request ->validate([
            'category_id' => 'sometimes|exists:categories,id',
        'name'=>'sometimes|string',
        'description'=>'sometimes|string',
        'price'=>'sometimes|numeric|min:0',
        'stock'=>'sometimes|integer|min:0'
        ]);

        $product -> update($ValidatedUpdateParams);
        return $product;

    }

    public function destroy(Product $product){
        $product ->delete();
        return response() -> noContent();
    }
}
