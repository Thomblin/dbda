<?php

class HomeController extends BaseController
{

    public function showOverview()
    {
        $tables = DB::select("show tables");

        array_walk($tables, function (&$table) {
            $table = (array)$table;
            $table = current($table);
        });

        return View::make('pages.overview', array(
            'tables' => $tables
        ));
    }

}
