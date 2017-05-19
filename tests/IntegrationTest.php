<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class IntegrationTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllDivision()
    {
        $this->json('GET', '/api/states/')
            ->seeJson([
                'name' => 'Yangon',
            ]);
    }

    public function testGetById()
    {
        $this->json('GET', '/api/states?id=MMR010')

            ->seeJson([
                'name' => 'Mandalay',
            ]);

    }

    public function testGetByNamee()
    {
        $this->json('GET', '/api/states?name=mandalay')

            ->seeJson([
                'name' => 'Mandalay',
            ]);

    }

    public function testGetByIdInclude()
    {
        $this->json('GET', '/api/states?id=MMR010&include=towns')
            ->seeJson([
                'name' => 'Mandalay',
                'name' => 'Aungmyaythazan Town'
            ]);

    }
    public function testOnlyGetChildDivision()
    {
        $this->json('GET', '/api/states?id=MMR010&get=towns')
            ->seeJson([
                'name' => 'Aungmyaythazan Town'
            ]);

    }

    public function testGetDivisonWithRest()
    {
        $this->json('GET', '/api/states/MMR010')
            ->seeJson([
                'name' => 'Mandalay'
            ]);

    }

    public function testGetsubDivisionWithRest(){
        $this->json('GET', '/api/states/MMR010/towns')
            ->seeJson([
                'name' => 'Mandalay Town'
            ]);
    }



}
