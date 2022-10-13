<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductResource extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {

        $products = array();
    foreach ($this->resource as $product) {

        $catdiscount = ($product['category'] == "insurance") ? 30 : (($product['sku'] == "000003") ? 15 : 0);
        $price = ($product['price']-($product['price'] * ($catdiscount/100)));
        $discount = ( $catdiscount != 0) ? "$catdiscount".'%' : "null";

         
        $products[] = array(
            'sku' => $product['sku'],
            'name' => $product['name'],
            'category' => $product['category'],
            'price' => [
                'original' => $product['price'],
                'final' => "$price",
                'discount_percentage' => $discount,
                'last_page' => 'EUR'
            ]
        );
    }
    return $products;
    }
         
    
}
