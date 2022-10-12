<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Product;

class ItemController extends Controller
{
    public function index()
    {
        $itemss = Item::all();
        $products = Product::all();

        return inertia('Item/Index', compact('itemss', 'products'));
    }
}
