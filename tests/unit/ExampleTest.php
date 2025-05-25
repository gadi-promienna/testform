<?php
namespace Tests;
use Brain\Monkey;

class ExampleTest extends TestCase
{
    public function testBasicExample()
    {
        Monkey\Functions\when('wp_create_nonce')->justReturn('mock_nonce');
        
        $this->assertTrue(true);
    }
}
