<?php

namespace App\Http\Controllers\Admin\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class EditController extends Controller
{
    public function __invoke(Group $group)
    {
        return view('admin.group.edit', compact('group'));
    }
}
