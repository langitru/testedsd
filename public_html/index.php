<?php
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

use Controllers\PostController;


$post = new PostController();
$post->index();
