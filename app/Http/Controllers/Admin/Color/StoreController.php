<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\StoreRequest;
use App\Models\Color;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $reqest)
    {
        $data = $reqest->validated();
        Color::firstOrCreate($data);

        return redirect()->route('admin.color.index');
    }
}
