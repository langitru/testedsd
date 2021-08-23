<?php
namespace Models;


class Posts
{
    public static function saveKwest1step()
    {
        if(!isset($_SESSION['kwest']))
        {
            $_SESSION['iteration'] += 1;
    
            $_SESSION['kwest']['id'] += $_SESSION['iteration'];
            $_SESSION['kwest']['userNumber'] = NULL;
        }
    }


    public static function saveKwest2step($ext)
    {
        $_SESSION['kwest'][$ext->name] = $ext->sayUserNumber();
    }


    public static function saveKwest3step()
    {
        foreach( $_SESSION['kwest'] as $extName => $extNum )
        {
            $_SESSION['kwest']['userNumber'] = $_POST['user_number'];
    
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

    
    public static function saveKwestHistory()
    {
        $_SESSION['history_kwests'][$_SESSION['iteration']] = $_SESSION['kwest'];
        unset($_SESSION['kwest']);
    }


    public static function sessionDestroy()
    {
        if (isset($_POST['ses_detroy'])){
            session_destroy();
            header('Location: /');
        }
        
    }
}
