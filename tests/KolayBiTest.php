<?php

namespace Cenksen\Kolaybi\Tests;

use Cenksen\Kolaybi\KolayBiClient;
use Orchestra\Testbench\TestCase;

class KolayBiTest extends TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            \Cenksen\Kolaybi\KolayBiServiceProvider::class,
        ];
    }

    protected function getPackageAliases($app)
    {
        return [
            'KolayBi' => \Cenksen\Kolaybi\Facades\KolayBi::class,
        ];
    }

    public function testCreateProduct()
    {
        $client = new KolayBiClient();
        $response = $client->createProduct([
            'name' => 'Test Product',
            'code' => 'TEST001',
            'quantity' => 1,
            'price' => 100,
        ]);

        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
    }

}
