<?php
/**
 * Created by PhpStorm.
 * User: seeb
 * Date: 1/11/15
 * Time: 12:13 PM
 */

namespace Tests\Fixtures;

use Illuminate\Support\Facades\DB;

class Countries implements Repository
{
    public static function create()
    {
        \Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
        });
    }
}