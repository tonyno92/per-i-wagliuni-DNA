<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CheckDBTest extends TestCase
{
    public function setUp(): void
    {   
        //Execute at boot
        parent::setUp();
    }

    public function tearDown(): void
    {
        // Execute at the end of each test
        parent::tearDown();
    }

    public function testConnection()
    {
        echo "\nActive migration : " . DB::table('migrations')->count() . "\n";
        $this->assertTrue(DB::table('migrations')->count() > 0);
    }
    
}
