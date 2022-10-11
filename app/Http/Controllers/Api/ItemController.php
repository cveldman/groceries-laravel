<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());

        return response()->json([
            'id' => $item->id,
            'product' => $item->product
        ]);
    }
    public function destroy(Item $item)
    {
        $item->delete();
    }
}
