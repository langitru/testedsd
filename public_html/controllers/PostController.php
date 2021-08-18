<?php
include __DIR__ . '/../components/Extrasens.php';
include __DIR__ . '/../models/Posts.php';


class PostController
{
    static function index()
    {
        if (isset($_POST['user_send_ok'])){

            if(!isset($_SESSION['kwest']))
            {
                Posts::saveKwest1step();
        
                Extrasens::askExrasens();
            }
        }

        
        if (isset($_POST['user_send_number']) && $_POST['user_number'] >= 10 && $_POST['user_number'] <= 99  ){

            if (isset($_SESSION['kwest'])){
                Posts::saveKwest3step();
            }
            
            if ($_SESSION['kwest'] != NULL)
            {
                Posts::saveKwestHistory();
            }
            
        }

        Posts::sessionDestroy();

        include __DIR__ . '/../views/home.view.php';
    }
}
