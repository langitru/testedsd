<?php

namespace Models;


interface DataBaseInterface
{
    public function save($data);
    public function load();
}

class DataBaseSession implements DataBaseInterface
{
    public function save($game)
    {
        $_SESSION['game'] = serialize($game);
    }


    public function load()
    {
        return unserialize($_SESSION['game']);
    }


    public function sessionDestroy($destroy = false)
    {
        if (isset($_POST['ses_detroy']) || $destroy === true) {
            session_destroy();
            header('Location: /');
        }
    }
}
