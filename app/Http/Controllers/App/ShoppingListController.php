<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShoppingList;

class ShoppingListController extends Controller
{
    public function index()
    {
        $lists = ShoppingList::all();

        return inertia('ShoppingList/Index', compact('lists'));
    }

    public function show(ShoppingList $list)
    {
        $products = Product::all();

        $items = [
            ['product_id' => null,  'product' => 'Bier halen'],
            ['product_id' => 1,     'product' => null],
            ['product_id' => 2,     'product' => null]
        ];

        return inertia('ShoppingList/Show', compact('products', 'items'));
    }
}
