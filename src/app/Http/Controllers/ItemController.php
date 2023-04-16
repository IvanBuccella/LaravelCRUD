<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getAll($pageNumber = 1)
    {
        $items = ItemResource::collection(
            Item::orderBy('name', 'ASC')
                ->orderBy('id', 'DESC')
                ->skip(($pageNumber - 1) * 5)
                ->take(5)->get()
        );
        return response()->json($items);
    }

    public function getOne($id)
    {
        $item = Item::find($id);

        if (!$item) {
            return response()->json("Cannot find the specified item.", 400);
        }

        return response()->json(ItemResource::make($item));
    }

    public function create(Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $validatedData = $validator->validate();

        $item       = new Item();
        $item->name = $validatedData["name"];

        if (!$item->save()) {
            return response()->json("Cannot save the item.", 500);
        }

        return response()->json("Item successfully created!");
    }

    public function update($id, Request $request)
    {
        $validator = validator($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $validatedData = $validator->validate();

        $item = Item::find($id);
        if (!$item) {
            return response()->json("Cannot find the spcified item.", 500);
        }

        $item->name = $validatedData["name"];

        if (!$item->save()) {
            return response()->json("Cannot update the item.", 500);
        }

        return response()->json("Item successfully updated!");
    }

    public function delete($id)
    {
        $item = Item::find($id);
        if (!$item) {
            return response()->json("Cannot find the spcified item.", 500);
        }

        if (!$item->delete()) {
            return response()->json("Cannot update the item.", 500);
        }

        return response()->json("Item successfully deleted!");
    }
}
