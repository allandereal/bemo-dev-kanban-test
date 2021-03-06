<?php

namespace App\Http\Controllers;

use App\Http\Resources\BoardCardResource;
use App\Models\BoardCard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BoardCardController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'title' => ['required', 'filled'],
            'board_column_id' => ['required', 'filled'],
        ]);

        $board_card= new BoardCard;
        $board_card->title = $request->title;
        $board_card->description = $request->description;
        $board_card->board_column_id = $request->board_column_id;
        $board_card->save();

        return new BoardCardResource(BoardCard::findOrFail($board_card->id));
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required'],
        ]);

        $updates = ['updated_at' => now()];

        if ($request->has('title')){
            $updates['title'] = $request->title;
        }

        if ($request->has('description')){
            $updates['description'] = $request->description;
        }

        BoardCard::findOrfail($request->id)->update($updates);

        return new BoardCardResource(BoardCard::findOrFail($request->id));
    }
}
