<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;

class ListController extends Controller
{
    public function index()
    {
        $lists = [
            ['id' => 1, 'name' => 'List 1'],
            ['id' => 2, 'name' => 'List 2'],
            ['id' => 3, 'name' => 'List 3']
        ];

        return inertia('List/Index', compact('lists'));
    }
}
