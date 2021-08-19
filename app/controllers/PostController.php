<?php
namespace Controllers;


use Components\Extrasens;
use Models\Posts;
use League\Plates\Engine;


class PostController
{
    private $views;


    function __construct()
	{
		$this->views = new Engine('../app/views');;
	}


    public function index()
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

        if (isset($_POST['ses_detroy'])){
            Posts::sessionDestroy();
        }
        

        echo $this->views->render('index.post', [] );
    }
}
