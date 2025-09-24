<?php

namespace EscolaLms\HeadlessH5P\Settings\Facades;

class AdministrableConfig
{
    private static array $configs = [];

    public static function registerConfig(string $key, array $rules, $default = null): void
    {
        self::$configs[$key] = [
            'rules' => $rules,
            'default' => $default,
        ];
    }

    public static function getConfig(string $key, $default = null)
    {
        if (isset(self::$configs[$key])) {
            return config($key, self::$configs[$key]['default']);
        }
        
        return config($key, $default);
    }

    public static function getAllConfigs(): array
    {
        return self::$configs;
    }
}