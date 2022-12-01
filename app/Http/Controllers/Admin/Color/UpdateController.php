<?php

namespace App\Http\Controllers\Admin\Color;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Color\UpdateRequest;
use App\Models\Color;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $reqest, Color $color)
    {
        $data = $reqest->validated();
        $color->update($data);

        return redirect()->route('admin.color.index', compact('color'));
    }
}
