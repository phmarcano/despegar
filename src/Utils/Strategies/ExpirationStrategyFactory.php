<?php

namespace App\Utils\Strategies;

use App\Exceptions\UnsupportedStrategyException;

class ExpirationStrategyFactory
{
    public static function createStrategy(string $strategyName): ExpirationDayStrategyInterface
    {
        if (!self::isStrategySupported($strategyName)) {
            throw new UnsupportedStrategyException();
        }
        $availableStrategies = self::getSupportedStrategies();
        return new $availableStrategies[$strategyName];
    }

    private static function getSupportedStrategies(): array
    {
        return [
            'BusinessDay' => 'App\Utils\Strategies\BusinessDayStrategy',
            'LastBusinessDay' => 'App\Utils\Strategies\LastBusinessDayStrategy',
            'LastBusinessDay25' => 'App\Utils\Strategies\LastBusinessDay25Strategy',
            'NormalDay' => 'App\Utils\Strategies\NormalDayStrategy',
        ];
    }

    public static function isStrategySupported(string $strategyName): bool
    {
        $supportedStrategies = self::getSupportedStrategies();
        return isset($supportedStrategies[$strategyName]);
    }
}