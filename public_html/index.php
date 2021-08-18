<?php
if( !session_id() ) @session_start();

function dd($something) 
{ // debug function
    echo '<pre>';
    echo var_dump($something);
    echo '</pre>'; //die;
}

//dd($_SERVER);

class Extrasens
{
    public $name;


    public function __construct($id)
    {
        $this->name = $this->generateNameExtrasen($id);
    }


    public function generateNameExtrasen($id)
    {
        return 'Extrasens_'.$id;
    }


    public function sayUserNumber() 
    {
        return rand(10, 99);
    }


    public function veracityLevelUp() 
    {
        $this->veracityLevel += 1;
    }
}


if (isset($_POST['user_send_ok'])){

    if(!isset($_SESSION['kwest']))
    {
        $_SESSION['iteration'] += 1;

        $_SESSION['kwest']['id'] += $_SESSION['iteration'];
        $_SESSION['kwest']['userNumber'] = NULL;


        for ($i = 1; $i <= 3 ; $i++)        
        {
            $ext = new Extrasens($i);
            
            $_SESSION['kwest'][$ext->name] = $ext->sayUserNumber();

        }
    }
}


if (isset($_POST['user_send_number']) && $_POST['user_number'] >= 10 && $_POST['user_number'] <= 99  ){

    $usnum = $_POST['user_number'];
    
    if (isset($_SESSION['kwest'])){
        foreach( $_SESSION['kwest'] as $extName => $extNum )
        {
            $_SESSION['kwest']['userNumber'] = $usnum;
    
            if ($extName == 'id' || $extName == 'userNumber')
            {
                continue;
            }
    
            if ($usnum == $extNum)
            {
                // BestResult
                $_SESSION['veracity'][$extName] += 1;
                //echo $extName . ': ' . $extNum . ' Угадал ваше число! <br>';
            } 
            else {
                // BadResult
               $_SESSION['veracity'][$extName] -= 1;
                //echo $extName . ': ' . $extNum . ' НЕ угадал...! <br>';
            }
        }
    }
    
    
    if ($_SESSION['kwest'] != NULL)
    {
        $_SESSION['history_kwests'][$_SESSION['iteration']] = $_SESSION['kwest'];
    }
    
    unset($_SESSION['kwest']);
}


//dd($_SESSION);


if (isset($_POST['ses_detroy'])){
    session_destroy();
    header('Location: /');
}

include 'home.view.php';
