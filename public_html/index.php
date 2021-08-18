<?php
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

use Controllers\PostController;
//include 'helpers/debag.php';


PostController::index();
