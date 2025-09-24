<?php

namespace EscolaLms\HeadlessH5P\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Add any setup logic needed for your tests
    }

    protected function getPackageProviders($app)
    {
        return [
            // Add your service providers here
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // Perform environment setup
    }
}