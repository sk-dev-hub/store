<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Color;
use App\Models\Category;
use App\Models\Group;

class EditController extends BaseController
{
    public function __invoke(Product $product)
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();
        $groups = Group::all();


        return view('admin.product.edit', compact('product', 'colors', 'tags', 'categories', 'groups'));
    }
}
