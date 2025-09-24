<?php

namespace EscolaLms\HeadlessH5P\Enums;

use ReflectionClass;

abstract class BasicEnum
{
    public static function getValues(): array
    {
        $reflection = new ReflectionClass(static::class);
        return array_values($reflection->getConstants());
    }

    public static function getKeys(): array
    {
        $reflection = new ReflectionClass(static::class);
        return array_keys($reflection->getConstants());
    }

    public static function asArray(): array
    {
        $reflection = new ReflectionClass(static::class);
        return $reflection->getConstants();
    }

    public static function hasValue($value): bool
    {
        return in_array($value, static::getValues(), true);
    }

    public static function hasKey(string $key): bool
    {
        return in_array($key, static::getKeys(), true);
    }
}