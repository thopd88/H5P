<?php

namespace EscolaLms\HeadlessH5P\Tests;

trait CreatesUsers
{
    protected function createUser(array $attributes = [])
    {
        // Simple user creation helper
        // You can implement this based on your User model
        return factory(config('auth.providers.users.model'))->create($attributes);
    }

    protected function createUsers(int $count, array $attributes = [])
    {
        return factory(config('auth.providers.users.model'), $count)->create($attributes);
    }
}