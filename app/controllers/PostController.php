<?php
namespace Controllers;



use Components\Validate;
use Components\Extrasens;
use Components\QueryFactory;

use Models\Posts;
use Models\DataBase;

// use Models\DataBaseSession;
use League\Plates\Engine;


class PostController extends MainController
{
    private $views;
    private $db;


    function __construct()
	{

		$this->views = new Engine('../app/views');
        $this->db = DataBase::CreateDB();

	}


    public function indexOld()
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


    public function index()
    {
        // Posts::sessionDestroy(true);
        
        $data = $this->db->get();

        if (isset($_POST['user_send_ok']))
        {
            $data = Posts::QuestStep_1($data);
            $this->db->insert($data);
        }


        if ( isset($_POST['user_send_number']) )
        {
            if ( Validate::sendUserNumber($_POST) )
            {
                // posts->Quest

                if (isset($data['Quest'])){
                    $data = Posts::QuestStep_3($data);
                    $this->db->insert($data);
                }
                
                if ( $data['Quest'] != NULL )
                {
                    $data = Posts::QuestHistory($data);
                    $this->db->insert($data);
                }
            } 
            else 
            {
                $data['Error'] = 'Ошибка! Введите 2-х значное число';
            }
        }


        Posts::sessionDestroy();
        
        // 

        echo $this->views->render('index.post', $data );
    }
}
