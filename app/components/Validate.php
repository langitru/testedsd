<?php

namespace Components;


class Validate
{
    static public function sendUserNumber($post)
    {
        if ($post['user_number'] >= 10 && $post['user_number'] <= 99)
        {
            
            
            unset($_SESSION['Error']);
            return $post['user_number'];


        }
        else 
        {
            
            //dd(gettype($post['user_number']));
            
            // dd( $post['user_number']);


            return false;
        }

    }



}