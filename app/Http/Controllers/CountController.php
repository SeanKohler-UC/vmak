<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CountController extends Controller
{
    /**
     * @param $tables
     * @return array
     */
    public function counts($tables): array
    {
        $tables = explode('-', $tables);
        $counts = [];

        foreach ($tables as $table) {
            $counts[$table] = DB::table($table)->count();
        }

        return $counts;
    }
}
