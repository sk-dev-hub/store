<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Product\ProductMinResource;
use App\Http\Resources\Product\ProductImageResource;
use App\Http\Resources\Group\GroupResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $products = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'old_price' => $this->old_price,
            'count' => $this->count,
            'image_url' => $this->imageUrl,
            'is_published' => $this->is_published,
            'colors' => $this->colors,
            'product_images' => ProductImageResource::collection($this->productImages),
            'category' => new CategoryResource($this->category),
            'group_products' => ProductMinResource::collection($products),


        ];
    }
}
