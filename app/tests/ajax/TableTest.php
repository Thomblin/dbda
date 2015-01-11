<?php
/**
 * Created by PhpStorm.
 * User: seeb
 * Date: 1/11/15
 * Time: 11:05 AM
 */

namespace Tests;

class TableTest extends TestCase
{
    /**
     * @test
     */
    public function getTableDetailsReturnsColumnsOfTable()
    {
        \Tests\Fixtures\Loader::createTable('countries');

        $crawler = $this->client->request('GET', self::HTTP_HOST . '/table/details/countries');

        $this->assertTrue($this->client->getResponse()->isOk());

        $this->assertEquals(
            json_encode(array('id' => array('type' => 'integer'))),
            $this->client->getResponse()->getContent()
        );
    }
}
