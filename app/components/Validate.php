<?php

namespace Components;


class Validate
{
    static public function sendUserNumber($post, $game)
    {
        
        $userNumber = $post['user_number'];

        if ($userNumber >= 10 && $userNumber <= 99)
        {
            $game->error = NULL;
            return $userNumber;
        }
        else 
        {
            
            return false;
        }
    }
}