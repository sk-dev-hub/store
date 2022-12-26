<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.group.create');
    }
}
