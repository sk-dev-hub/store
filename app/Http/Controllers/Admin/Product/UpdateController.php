<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\UpdateRequest;
use App\Models\Product;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        
        $data = $request->validated();
        $product = $this->service->update($data, $product);

        return view('admin.product.show', compact('product'));
    }
}
