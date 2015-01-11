<?php
/**
 * Created by PhpStorm.
 * User: seeb
 * Date: 1/11/15
 * Time: 12:53 PM
 */

class DatabaseRepository
{
    public function getTableDetails($tableName)
    {
        $columns = array();

        foreach ( Schema::getColumnListing($tableName) as $column ) {
            $columns[$column] = array(
                'type' => DB::connection()->getDoctrineColumn($tableName, $column)->getType()->getName()
            );
        }

        return $columns;
    }
}