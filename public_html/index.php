<?php
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

use Components\Router;

new Router();