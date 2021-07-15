<?php

namespace App\Http\Controllers;

use App\Models\BoardColumn;
use Illuminate\Http\Request;

class BoardColumnsController extends Controller
{
    public function create(Request $request)
    {
        $board_column = new BoardColumn;
        $board_column->title = $request->title;
        $board_column->save();
        return json_encode([
            'id' => $board_column->id,
            'title' => $board_column->title,
        ]);
    }

    public function delete($id)
    {
        BoardColumn::findOrFail($id)->delete();
        return $id;
    }
}
