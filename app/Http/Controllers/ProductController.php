<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    //
    public function index(Request $request)
    {
        $products  = Product::all();
        if ($request->input('category'))$params = $request->input('category');
        if ($request->input('price'))$params = $request->input('price');
        if (!$request->input('category') and !$request->input('price'))$params = "";
       
        $search = ($request->input('category')) ? "category" : (($request->input('price')) ? "price" : "");
        $sproduct = $products
                ->filter(
                    fn(Product $product) => Str::contains($product->$search, $params) 
                );

                
          
         if($sproduct->isEmpty())  return new ProductResource($products);
         
         return new ProductResource($sproduct);
   
}

}
