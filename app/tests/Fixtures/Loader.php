<?php
/**
 * Created by PhpStorm.
 * User: seeb
 * Date: 1/11/15
 * Time: 12:15 PM
 */

namespace Tests\Fixtures;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;

class Loader
{
    public static function createTable($name)
    {
        $class = __NAMESPACE__ . ucfirst($name);

        \Schema::dropIfExists($name);

        if ( class_exists($class) && $class instanceof Repository ) {
            $class::create();
        } else {
            \Schema::create($name, function (Blueprint $table) {
                $table->increments('id');
            });
        }
    }
}