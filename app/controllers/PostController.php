<?php
namespace Controllers;



use Components\Validate;
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
        if (isset($_POST['user_send_ok']))
        {
            Posts::saveQuest1step();
        }


        if ( isset($_POST['user_send_number']) )
        {
            if ( Validate::sendUserNumber($_POST) )
            {

                if (isset($_SESSION['quest'])){
                    Posts::saveQuest3step();
                }
                
                if ($_SESSION['quest'] != NULL)
                {
                    Posts::saveQuestHistory();
                }
            } 
            else 
            {
                $_SESSION['error'] = 'Ошибка! Введите 2-х значное число';
            }
        }


        Posts::sessionDestroy();
        
        $data = $_SESSION;

        echo $this->views->render('index.post', $data );
    }
}
