<?php
namespace Controllers;



use Components\Validate;

use Models\DataBase;
use Models\Game;

use League\Plates\Engine;


class PostController extends MainController
{
    private $views;
    private $db;
    private $game;


    function __construct()
	{
		$this->views = new Engine('../app/views');
        $this->db = DataBase::CreateDB();
	}


    public function Index()
    {
        $this->db->sessionDestroy();

        $game = $this->db->load();

        if ( $game == NULL )
        {
            $game = new Game(4);

            $this->db->save($game);
        }


        if ( isset($_POST['user_send_ok']) )
        {
            $game->StartRound();

            $this->db->save($game);
        }


        echo $this->views->render('index.post', ['game' => $game] );
    }


    public function Number()
	{
        $this->db->sessionDestroy();

        $game = $this->db->load();

        $game->StartRound();

        $this->db->save($game);

        if ( isset($_POST['user_send_number']) )
        {
            if ( Validate::sendUserNumber( $_POST, $game ) )
            {
                $game->PushUserNumber($_POST['user_number']);
                $this->db->save($game);

                header('Location: /');
            }
            else
            {
                $game->error = 'Ошибка! Введите 2-х значное число';
                $this->db->save($game);
            }
        }
		
		echo  $this->views->render('userNumber.post',  ['game' => $game] );
	}


	public static function Error($numberError)
	{
		echo  $this->views->render($numberError.'.post');
	}
}
