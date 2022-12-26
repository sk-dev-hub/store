<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Group $group)
    {
        return view('admin.group.show' ,compact('group'));
    }
}
