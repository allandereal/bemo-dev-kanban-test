<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardColumnResource;
use App\Models\BoardColumn;
use Illuminate\Http\Request;

class BoardColumnsController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'filled']
        ]);

        $board_column = new BoardColumn;
        $board_column->title = $request->title;
        $board_column->save();

        return new BoardColumnResource($board_column);
    }

    public function delete($id)
    {
        BoardColumn::findOrFail($id)->delete();
        return $id;
    }
}
