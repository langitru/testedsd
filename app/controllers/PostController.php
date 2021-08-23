<?php
namespace Controllers;


use Components\Extrasens;
use Components\Validate;
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
        if (isset($_POST['user_send_ok']))
        {

            if(!isset($_SESSION['kwest']))
            {
                Posts::saveKwest1step();
        
                Extrasens::askExrasens();
            }
        }

        if ( isset($_POST['user_send_number']) )
        {
            if ( Validate::sendUserNumber($_POST) )
            {

                if (isset($_SESSION['kwest'])){
                    Posts::saveKwest3step();
                }
                
                if ($_SESSION['kwest'] != NULL)
                {
                    Posts::saveKwestHistory();
                }
            } 
            else 
            {
                $_SESSION['Error'] = 'Ошибка! Введите 2-х значное число';
            }
        }


        Posts::sessionDestroy();
        
        $data = [

        ];

        echo $this->views->render('index.post', $data );
    }
}
