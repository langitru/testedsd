<?php
if( !session_id() ) @session_start();

include 'helpers/debag.php';
include 'controllers/PostController.php';

PostController::index();
