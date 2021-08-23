<?php
if( !session_id() ) @session_start();

require '../vendor/autoload.php';

include __DIR__ . '/../app/helpers/debag.php';

use Controllers\PostController;


$post = new PostController();

$post->index();
