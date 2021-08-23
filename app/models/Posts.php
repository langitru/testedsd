<?php
namespace Models;

use Components\Extrasens;

class Posts
{
    public static function saveQuest1step()
    {
        if(!isset($_SESSION['quest']))
        {
            $_SESSION['iteration'] += 1;
    
            $_SESSION['quest']['id'] += $_SESSION['iteration'];
            $_SESSION['quest']['userNumber'] = NULL;

            Extrasens::askExrasens();
        }
    }


    public static function saveQuest2step($ext)
    {
        $_SESSION['quest'][$ext->name] = $ext->sayUserNumber();
    }


    public static function saveQuest3step()
    {
        foreach( $_SESSION['quest'] as $extName => $extNum )
        {
            $_SESSION['quest']['userNumber'] = $_POST['user_number'];
    
            if ($extName == 'id' || $extName == 'userNumber')
            {
                continue;
            }
    
            if ($_POST['user_number'] == $extNum)
            {
                // BestResult
                $_SESSION['veracity'][$extName] += 1;
            } 
            else {
                // BadResult
                $_SESSION['veracity'][$extName] -= 1;
            }
        }
    }

    
    public static function saveQuestHistory()
    {
        $_SESSION['history_quests'][$_SESSION['iteration']] = $_SESSION['quest'];
        unset($_SESSION['quest']);
    }


    public static function sessionDestroy()
    {
        if (isset($_POST['ses_detroy'])){
            session_destroy();
            header('Location: /');
        }
        
    }
}
