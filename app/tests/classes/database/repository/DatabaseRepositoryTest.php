<?php
/**
 * Created by PhpStorm.
 * User: seeb
 * Date: 1/11/15
 * Time: 1:03 PM
 */

namespace Tests;

use Tests\Fixtures\Loader;

class DatabaseRepositoryTest extends TestCase
{
    /**
     * @test
     */
    public function getTableDetailsReturnsColumnsAndDefinitions()
    {
        Loader::createTable('countries');

        $repository = new \DatabaseRepository();

        $this->assertEquals(
            array(
                'id' => array(
                    'type' => 'integer'
                )
            ),
            $repository->getTableDetails('countries')
        );
    }
}
