<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreItemRequest;
use App\Models\Item;

class ItemController extends Controller
{
    public function store(StoreItemRequest $request)
    {
        $item = Item::create($request->validated());

        return response()->json($item);
    }
    public function destroy(Item $item)
    {
        $item->delete();
    }
}
