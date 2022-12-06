<?php

namespace App\Service;

use App\Http\Requests\Admin\Product\StoreRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Db;
use App\Models\Product;
use App\Models\ProductTag;
use App\Models\ProductColors;




class ProductService{

    public function store(StoreRequest $request ,$data){

        try {

            Db::beginTransaction();
           
            // проверка на существование
            if(isset( $data['tags'])){
                $tagsIds = $data['tags'];
                unset($data['tags']);
            }

            if(isset($data['colors'])){
                $colorsIds = $data['colors'];
                unset($data['colors']);
            }

            if($request->hasFile('preview_img')){

                $data['preview_img'] = Storage::disk('public')->put('/images/product',  $data['preview_img']);
                
            }

            
            $product = Product::firstOrCreate([
                'name' => $data['name']                 //проверка на уникальность по названию товара
            ], $data);

            // if(isset($tagIds)){
            //     $product->tags()->attach($tagIds);     //альтернативный способ
            // }

            if(isset($tagsIds)){
                foreach ($tagsIds as $tagId){
                    ProductTag::firstOrCreate([
                        'product_id' => $product->id,
                        'tag_id' => $tagId,
                    ]);
                };
            }

            if(isset($colorsIds)){
                foreach ($colorsIds as $colorId){
                    ProductColors::firstOrCreate([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                    ]);
                };
            }


            Db::commit();

        } catch (\Exception $exception) {
            Db::rollback();
            abort( 500 );
        }
    }

    public function update($data, $product){

        try {
            Db::beginTransaction();

            // проверка на существование тегов
            if(isset( $data['tags'])){
                $tagIds = $data['tags'];
                unset($data['tags']);
            }
    
            // проверка на существование тегов
            if(isset( $data['colors'])){
                $colorIds = $data['colors'];
                unset($data['colors']);
            }

            if(isset($data['preview_img'])){
                $data['preview_img'] = Storage::disk('public')->put('/images/product',  $data['preview_img']);
            }
 
            $product->update($data);

            if(isset($tagIds)){
                $product->tags()->sync($tagIds);
            }

            if(isset($colorIds)){
                $product->colors()->sync($colorIds);
            }

            Db::commit();

        } catch (\Exception $exception) {
            Db::rollback();
            abort( 500 );
        }
        
        return $product;

    }



}