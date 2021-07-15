<?php

namespace App\Http\Controllers;

use App\Models\BoardColumn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Spatie\DbDumper\Databases\Sqlite;

class HomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function databaseExport()
    {
        $filename = 'kanban-dump.sql';
        Sqlite::create()
            ->setDbName(database_path('database.sqlite'))
            ->dumpToFile($filename);

        return Response::download($filename);
    }
}
