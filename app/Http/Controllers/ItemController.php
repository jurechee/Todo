<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->name = $request->item["name"];
        $newItem->save();

        return $newItem;
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);

        //check is the item is completed if is complete ? set to true if is not : set to false
        $item->completed = $request->item['completed'] ? true : false;
        $item->completed_at = $request->item['completed'] ?  Carbon::now() : null;

        $item->save();

        return $item;
    }

    public function destroy($id)
    {
        $item = Item::findOrfail($id);

        $item->delete();

        return "Item successfully deleted";
    }
}
