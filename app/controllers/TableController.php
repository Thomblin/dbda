<?php

class TableController extends BaseController
{

    public function getTables()
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

    public function getTableDetails($tableName)
    {
        $repository = new DatabaseRepository();

        return json_encode($repository->getTableDetails($tableName));
    }
}
