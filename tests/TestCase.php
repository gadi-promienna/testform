<?php
namespace Tests;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;
use Brain\Monkey;

abstract class TestCase extends PHPUnitTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        Monkey\setUp();
    }

    protected function tearDown(): void
    {
        Monkey\tearDown();
        parent::tearDown();
    }
}