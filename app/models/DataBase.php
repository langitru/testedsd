<?php
namespace Models;

use Models\DataBaseSession;


class DataBase
{
    public static function CreateDB()
    {
        return new DataBaseSession();
    }
}