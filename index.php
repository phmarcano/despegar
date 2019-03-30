<?php

require "vendor/autoload.php";

use Dotenv\Dotenv;
use App\Routes\Router;

$dotenv = new Dotenv(__DIR__, '.env');
$dotenv->load();

$router = new Router();
$content= $router->callController();
require "src/Views/layout.php";

