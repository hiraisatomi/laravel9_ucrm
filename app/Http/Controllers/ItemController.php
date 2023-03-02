<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Models\Item;
use Inertia\Inertia;

class ItemController extends Controller
{
    public function index()
    {
        return Inertia::render('Items/Index', [
            'items' => Item::select('id', 'name', 'price', 'is_selling')
            ->get()
        ]);
    }

    public function create()
    {
        return Inertia::render('Items/Create');
    }

    public function store(StoreItemRequest $request)
    {
        Item::create([
            'name' => $request->name,
            'memo' => $request->memo,
            'price' => $request->price,
        ]);

        return to_route('items.index')
        ->with([
            'message' => '登録しました！',
            'status' => 'success'
        ]);
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(UpdateItemRequest $request, Item $item)
    {
        //
    }

    public function destroy(Item $item)
    {
        //
    }
}
