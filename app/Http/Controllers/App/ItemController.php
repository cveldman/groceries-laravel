<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Item;

class ItemController extends Controller
{
    public function index()
    {
        $itemss = Item::all();

        return inertia('Items/Index', compact('itemss'));
    }
}
