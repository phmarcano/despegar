<?php

namespace App\Routes;

use App\Exceptions\InvalidActionException;
use App\Exceptions\InvalidControllerException;
use \ReflectionException;
use \ReflectionClass;

class Router
{
    const CONTROLLER_NAMESPACE = '\\App\\Controller\\';
    const DEFAULT_CONTROLLER = 'Booking';
    const DEFAULT_ACTION = 'create';

    /**
     * @throws InvalidActionException
     * @throws InvalidControllerException
     * @throws ReflectionException
     */
    public function callController()
    {
        $controllerClassName = $this->getControllerClassName();
        $actionName = $this->getActionName();

        if (!class_exists($controllerClassName)) {
            throw new InvalidControllerException();
        }

        $controller = new $controllerClassName;
        $reflector = new ReflectionClass($controller);

        if (!$reflector->hasMethod($actionName)) {
            throw new InvalidActionException();
        }
        $method = $reflector->getMethod($actionName);
        return $method->invoke($controller);
    }

    /**
     * @return string
     */
    public function getControllerClassName(): string
    {
        if (!isset($_GET['controller'])) {
            $controller = self::DEFAULT_CONTROLLER;
        } else {
            $controller = ucfirst($_GET['controller']);
        }
        $controllerClassName = self::CONTROLLER_NAMESPACE . $controller . 'Controller';
        return $controllerClassName;
    }

    /**
     * @return string
     */
    public function getActionName(): string
    {
        if (!isset($_GET['action'])) {
            $action = self::DEFAULT_ACTION;
        } else {
            $action = strtolower($_GET['action']);
        }
        $actionName = $action . 'Action';
        return $actionName;
    }
}